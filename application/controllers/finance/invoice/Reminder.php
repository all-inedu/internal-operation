<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reminder extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('finance/Invoice_model', 'inv');
        $this->load->model('finance/InvoiceDetail_model', 'invdtl');
        $this->load->model('Menus_model', 'menu');

        $empl_id = $this->session->userdata('empl_id');
        if (empty($empl_id)) {
            redirect('/');
        } else {
            $data['empl_id'] = $empl_id;
            $data['menus'] = $this->menu->showId($empl_id, 1);
            $this->load->view('templates/h-io', $data);
            // echo json_encode($data);
        }
    }

    public function index()
    {
        function orderByDueDate($a, $b)
        {
            $ad = strtotime($a['due_date']);
            $bd = strtotime($b['due_date']);
            return ($ad - $bd);
        }
        $date = date('Y-m');
        $data['date'] = $this->input->get('month') ? $this->input->get('month') : $date;
        $fullpayment = $this->inv->dueDateReminder($this->input->get('month') ? $this->input->get('month') : $date);
        $data['fullpayment_rev'] = $this->inv->totalInvoice($this->input->get('month') ? $this->input->get('month') : $date, 'received');
        $data['tot_fullpayment_rev'] = $this->inv->totalInvoice($this->input->get('month') ? $this->input->get('month') : $date);
        $installment = $this->invdtl->dueDateReminder($this->input->get('month') ? $this->input->get('month') : $date);
        $data['installment_rev'] = $this->invdtl->totalInvoice($this->input->get('month') ? $this->input->get('month') : $date, 'received');
        $data['tot_installment_rev'] = $this->invdtl->totalInvoice($this->input->get('month') ? $this->input->get('month') : $date);

        $data['reminder'] = array_merge($fullpayment, $installment);
        usort($data['reminder'], 'orderByDueDate');
        $this->load->view('templates/s-io');
        $this->load->view('finance/invoice/due-date-reminder', $data);
        $this->load->view('templates/f-io');
    }

    public function store()
    {
        $date_now = new DateTime(date('Y-m-d'));
        $due_date = new DateTime($this->input->post('due_date'));
        $diff = $date_now->diff($due_date);
        $type = $due_date > $date_now ? '-' . $diff->d : '+' . $diff->d;
        $data = [
            'id' => $this->input->post('id'),
            'method' => $this->input->post('method'),
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'type' => 'Reminder H' . $type,
            'program' => $this->input->post('program'),
            'due_date' => date('d F Y', strtotime($this->input->post('due_date'))),
            'diff' => $type
        ];

        if ($data['method'] == 'Installment') {
            $this->invdtl->updateReminderStatus($data);
        } else {
            $this->inv->updateReminderStatus($data);
        }

        // echo json_encode($data);
        $this->session->set_flashdata('reminder', $data);
        redirect('/finance/invoice/reminder/');
    }
}