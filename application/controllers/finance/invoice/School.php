<?php
defined('BASEPATH') or exit('No direct script access allowed');

class School extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('pdf');
        $this->load->model('bizdev/SProgram_model','schprog');
        $this->load->model('finance/Invoice_model','inv');
        $this->load->model('finance/InvoiceSchool_model','invsch');
        $this->load->model('finance/InvoiceDetail_model','invdetail');
        $this->load->model('finance/Receipt_model','receipt');
        $this->load->model('Menus_model','menu');
        
        $empl_id = $this->session->userdata('empl_id');
        if(empty($empl_id)) {
            redirect('/');
        } else {
            $data['empl_id'] = $empl_id;
            $data['menus'] = $this->menu->showId($empl_id, 1);
            $this->load->view('templates/h-io', $data);
            // echo json_encode($data);
        }
    }

    public function index(){     
        $data['sch_prog'] = $this->schprog->showForInvoice(); 
        $this->load->view('templates/s-io');
        $this->load->view('finance/invoice/school/index', $data);
        $this->load->view('templates/f-io');
    }

    public function view($id){ 
        $check = $this->invsch->showId($id);     
        if(!$check){
            $this->addInvoice($id);
        } else {
            $this->viewInvoice($id);
        }
    }

    public function addInvoice($id) {
        $data['schprog'] = $this->schprog->showSProgId($id);
        $data['fixprog'] = $this->schprog->showProgramExec($id);
        $this->form_validation->set_rules('invsch_price', 'price', 'required');
        $this->form_validation->set_rules('invsch_date', 'date', 'required');
        $this->form_validation->set_rules('invsch_duedate', 'due date', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/s-io');
            $this->load->view('finance/invoice/school/add', $data);
            $this->load->view('templates/f-io'); 
        } else {
            $this->save($id);
        }
    }

    public function save($id) {
        $m = date('m', strtotime($this->input->post('invsch_date')));
        $y = date('Y', strtotime($this->input->post('invsch_date')));
        $sp = $this->schprog->showSProgId($id);
        $prog_id = $sp['prog_id'];
        $month = ["","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];
        $romawi = $month[intval($m)];
        $year = date('y', strtotime($this->input->post('invsch_date')));

        $inv = $this->invsch->getId($m, $y);
        if(empty($inv)){
            $idmax = 1;
        } else {
            $idnum = substr($inv['invsch_id'],0,4);
            $idmax = intval($idnum) + 1;
        }
        
        $newid = str_pad($idmax, 4, "0", STR_PAD_LEFT);
        $inv_id = $newid.'/INV-JEI/'.$prog_id.'/'.$romawi.'/'.$year;
        $data = [
            'invsch_id' => $inv_id,
            'schprog_id' => $id,
            'invsch_price' => $this->input->post('invsch_price'),
            'invsch_participants' => $this->input->post('invsch_participants'),
            'invsch_disc' => $this->input->post('invsch_disc'),
            'invsch_totprice' => $this->input->post('invsch_totprice'),
            'invsch_words' => $this->input->post('invsch_words'),
            'invsch_pm' => $this->input->post('invsch_pm'),
            'invsch_date' => $this->input->post('invsch_date'),
            'invsch_duedate' => $this->input->post('invsch_duedate'),
            'invsch_notes' => $this->input->post('invsch_notes'),
            'invsch_tnc' => $this->input->post('invsch_tnc')
        ];

        $pm = $this->input->post('invsch_pm');
        if($pm=="Installment") {
            $n = count($this->input->post('invdtl_statusname[]'));

            for($i=0; $i<$n; $i++) {
                $install = [
                    'inv_id' => $inv_id,
                    'invdtl_statusname' => $this->input->post('invdtl_statusname['.$i.']'),
                    'invdtl_duedate' => $this->input->post('invdtl_duedate['.$i.']'),
                    'invdtl_percentage' => $this->input->post('invdtl_percentage['.$i.']'),
                    'invdtl_amountidr' => $this->input->post('invdtl_amountidr['.$i.']'),
                    'invdtl_status' => 0
                ];
                $this->inv->saveDetail($install);
                // echo json_encode($install);

            }
        }
        // echo json_encode($data);
        $this->invsch->save($data);
        $this->session->set_flashdata('success', 'Invoice has been created');
        redirect('/finance/invoice/school/view/'.$id);
    }

    public function view_detail($id) {
        $data = $this->invdetail->showDetailId($id);
        echo json_encode($data);
    }

    public function save_detail() {
        $inv_num = $this->input->post('inv_num');
        $id = $this->input->post('id');
        $data = [
            'inv_id' => $this->input->post('inv_id'),
            'invdtl_statusname' => $this->input->post('invdtl_statusname'),
            'invdtl_duedate' => $this->input->post('invdtl_duedate'),
            'invdtl_percentage' => $this->input->post('invdtl_percentage'),
            'invdtl_amountusd' => $this->input->post('invdtl_amountusd'),
            'invdtl_amountidr' => $this->input->post('invdtl_amountidr'),
        ];
        
        $this->invdetail->save($data);
        $this->session->set_flashdata('success', 'Installment has been created');
        redirect('/finance/invoice/school/edit/'.$id);
    }

     public function update_detail() {
        $inv_num = $this->input->post('inv_num');
        $id = $this->input->post('invdtl_id');
        $schprog = $this->input->post('id');
        $data = [
            'invdtl_statusname' => $this->input->post('invdtl_statusname'),
            'invdtl_duedate' => $this->input->post('invdtl_duedate'),
            'invdtl_percentage' => $this->input->post('invdtl_percentage'),
            'invdtl_amountusd' => $this->input->post('invdtl_amountusd'),
            'invdtl_amountidr' => $this->input->post('invdtl_amountidr'),
        ];

        $this->invdetail->update($data, $id);
        $this->session->set_flashdata('success', 'Installment has been changed');
        redirect('/finance/invoice/school/edit/'.$schprog);
    }

    public function delete_detail($id, $schprog) {
        $this->invdetail->delete($id);
        $this->session->set_flashdata('success', 'Installment has been deleted');
        redirect('/finance/invoice/school/edit/'.$schprog);
    }

    public function viewInvoice($id) {
        $data['schprog'] = $this->invsch->showId($id);
        $inv_id = $data['schprog']['invsch_id'];
        $data['invdtl'] = $this->invdetail->showId($inv_id);
        $data['fixprog'] = $this->schprog->showProgramExec($id); 
        $data['rec'] = $this->receipt->showByInvId($inv_id);
        $this->load->view('templates/s-io');
        $this->load->view('finance/invoice/school/view', $data);
        $this->load->view('templates/f-io'); 
    }

    public function edit($id) {
        $data['schprog'] = $this->invsch->showId($id);
        $data['fixprog'] = $this->schprog->showProgramExec($id); 
        $inv_id = $data['schprog']['invsch_id'];
        $data['invdtl'] = $this->invdetail->showId($inv_id);
        $this->form_validation->set_rules('invsch_price', 'price', 'required');
        $this->form_validation->set_rules('invsch_date', 'date', 'required');
        $this->form_validation->set_rules('invsch_duedate', 'due date', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/s-io');
            $this->load->view('finance/invoice/school/edit', $data);
            $this->load->view('templates/f-io'); 
        } else {
            $this->update();
        }
    }

    public function update() {
        $id = $this->input->post('schprog_id');
        $data = [
            'invsch_price' => $this->input->post('invsch_price'),
            'invsch_participants' => $this->input->post('invsch_participants'),
            'invsch_disc' => $this->input->post('invsch_disc'),
            'invsch_totprice' => $this->input->post('invsch_totprice'),
            'invsch_words' => $this->input->post('invsch_words'),
            'invsch_pm' => $this->input->post('invsch_pm'),
            'invsch_date' => $this->input->post('invsch_date'),
            'invsch_duedate' => $this->input->post('invsch_duedate'),
            'invsch_notes' => $this->input->post('invsch_notes'),
            'invsch_tnc' => $this->input->post('invsch_tnc')
        ];

        if($this->input->post('invsch_pm')!='Installment') {
            $inv_id = $this->input->post('invsch_id');
            $this->invdetail->deleteInvId($inv_id);
        }
        
        // echo json_encode($data);
        $this->invsch->update($data, $id);
        $this->session->set_flashdata('success', 'Invoice has been created');
        redirect('/finance/invoice/school/view/'.$id);
    }

    public function cancel($id) {
        $this->invsch->delete($id);
        $this->session->set_flashdata('success', 'Invoice has been canceled');
        redirect('/finance/invoice/school/');
    }

    public function pdf($id)
    {
        $data['schprog'] = $this->invsch->showId($id);
        $inv = $data['schprog']['invsch_id'];
        $inv_id = explode("/",$inv);
        $new_inv = implode("-", $inv_id);
        $id_inv = $data['schprog']['invsch_id'];

        $data['invdtl'] = $this->invdetail->showId($id_inv);
        $html = $this->load->view('finance/invoice/school/export/pdf', $data, true);
        $this->pdf->createPDF($html, $new_inv, false);
    }
    
}