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

        if ($this->input->get('month')) {
            $data['date'] = $this->input->get('month');
            $fullpayment = $this->inv->dueDateReminder($this->input->get('month'));
            $installment = $this->invdtl->dueDateReminder($this->input->get('month'));
        } else {
            $date = date('Y-m');
            $data['date'] = $date;
            $fullpayment = $this->inv->dueDateReminder($date);
            $installment = $this->invdtl->dueDateReminder($date);
        }
        $data['reminder'] = array_merge($fullpayment, $installment);
        usort($data['reminder'], 'orderByDueDate');
        $this->load->view('templates/s-io');
        $this->load->view('finance/invoice/due-date-reminder', $data);
        $this->load->view('templates/f-io');
    }
}