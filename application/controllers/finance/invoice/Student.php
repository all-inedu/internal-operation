<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('pdf');
        $this->load->model('finance/Invoice_model','inv');
        $this->load->model('finance/InvoiceDetail_model','invdetail');
        $this->load->model('client/StProgram_model','stprog');
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
        $data['student_program'] = $this->inv->showForInvoice();
        $this->load->view('templates/s-io');
        $this->load->view('finance/invoice/student/index', $data);
        $this->load->view('templates/f-io');
    }

    public function view($id){      
        $check = $this->inv->showId($id);
        if(empty($check)) {
            $this->addInvoice($id);
        } else {
            $this->viewInvoice($id);
        }
    }

    public function addInvoice($id) {
        $data['sp'] = $this->stprog->showId($id);

        $this->form_validation->set_rules('inv_category', 'category', 'required');
        $this->form_validation->set_rules('inv_date', 'invoice date', 'required');
        $this->form_validation->set_rules('inv_priceidr', 'price', 'required');
        $this->form_validation->set_rules('inv_paymentmethod', 'payment method', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/s-io');
            $this->load->view('finance/invoice/student/add', $data);
            $this->load->view('templates/f-io'); 
        } else { 
            $m = date('m', strtotime($this->input->post('inv_date')));
            $y = date('Y', strtotime($this->input->post('inv_date')));
            $sp = $this->stprog->showId($id);
            $prog_id = $sp['prog_id'];
            $month = ["","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];
            $romawi = $month[intval($m)];
            $year = date('y', strtotime($this->input->post('inv_date')));
            
            $inv = $this->inv->getId($m, $y);
            if(empty($inv)){
                $idmax = 1;
            } else {
                $idnum = substr($inv['inv_id'],0,4);
                $idmax = intval($idnum) + 1;
            }
            
            $newid = str_pad($idmax, 4, "0", STR_PAD_LEFT);
            
            $inv_id = $newid.'/INV-JEI/'.$prog_id.'/'.$romawi.'/'.$year;
            $cat = $this->input->post('inv_category');
            if($cat=="usd") {
                $this->saveUsd($id, $inv_id);
            } else if($cat=="idr") {
                $this->saveIdr($id, $inv_id);
            } else {
                $this->saveSession($id, $inv_id);
            }
        }
    }

    public function saveUsd($id, $inv_id) {
        
        $pm = $this->input->post('inv_paymentmethod');
        $data = [
            'inv_id' => $inv_id,
            'stprog_id' => $this->input->post('stprog_id'),
            'inv_category' => $this->input->post('inv_category'),
            'inv_priceusd' => $this->input->post('inv_priceusd'),
            'inv_priceidr' => $this->input->post('inv_priceidr'),
            'inv_earlybirdusd' => $this->input->post('inv_earlybirdusd'),
            'inv_earlybirdidr' => $this->input->post('inv_earlybirdidr'),
            'inv_discusd' => $this->input->post('inv_discusd'),
            'inv_discidr' => $this->input->post('inv_discidr'),
            'inv_totprusd' => $this->input->post('inv_totprusd'),
            'inv_totpridr' => $this->input->post('inv_totpridr'),
            'inv_words' => $this->input->post('inv_words'),
            'inv_paymentmethod' => $pm,
            'inv_date' => $this->input->post('inv_date'),
            'inv_duedate' => $this->input->post('inv_duedate'),
            'inv_notes' => $this->input->post('inv_notes'),
            'inv_tnc' => $this->input->post('inv_tnc'),
            'inv_status' => 0,
        ];

        if($pm=="Installment") {
            $n = count($this->input->post('invdtl_statusname[]'));

            for($i=0; $i<$n; $i++) {
                $install = [
                    'inv_id' => $inv_id,
                    'invdtl_statusname' => $this->input->post('invdtl_statusname['.$i.']'),
                    'invdtl_duedate' => $this->input->post('invdtl_duedate['.$i.']'),
                    'invdtl_percentage' => $this->input->post('invdtl_percentage['.$i.']'),
                    'invdtl_amountusd' => $this->input->post('invdtl_amountusd['.$i.']'),
                    'invdtl_amountidr' => $this->input->post('invdtl_amountidr['.$i.']'),
                    'invdtl_status' => 0
                ];
                $this->inv->saveDetail($install);
            }
        }
        $this->inv->save($data);
        $this->session->set_flashdata('success', 'Invoice has been created');
        redirect('/finance/invoice/student/view/'.$id);
    }

    public function saveIdr($id, $inv_id) {
        
        $pm = $this->input->post('inv_paymentmethod');
        $data = [
            'inv_id' => $inv_id,
            'stprog_id' => $this->input->post('stprog_id'),
            'inv_category' => $this->input->post('inv_category'),
            'inv_priceidr' => $this->input->post('inv_priceidr'),
            'inv_earlybirdidr' => $this->input->post('inv_earlybirdidr'),
            'inv_discidr' => $this->input->post('inv_discidr'),
            'inv_totpridr' => $this->input->post('inv_totpridr'),
            'inv_words' => $this->input->post('inv_words'),
            'inv_paymentmethod' => $pm,
            'inv_date' => $this->input->post('inv_date'),
            'inv_duedate' => $this->input->post('inv_duedate'),
            'inv_notes' => $this->input->post('inv_notes'),
            'inv_tnc' => $this->input->post('inv_tnc'),
            'inv_status' => 0,
        ];

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
                echo json_encode($install);
                $this->inv->saveDetail($install);
            }
        }

        $this->inv->save($data);
        $this->session->set_flashdata('success', 'Invoice has been created');
        redirect('/finance/invoice/student/view/'.$id);
    }

    public function saveSession($id, $inv_id) {
        
        $data = [
            'inv_id' => $inv_id,
            'stprog_id' => $this->input->post('stprog_id'),
            'inv_category' => $this->input->post('inv_category'),
            'inv_priceidr' => $this->input->post('inv_priceidr'),
            'inv_session' => $this->input->post('inv_session'),
            'inv_duration' => $this->input->post('inv_duration'),
            'inv_discidr' => $this->input->post('inv_discidr'),
            'inv_totpridr' => $this->input->post('inv_totpridr'),
            'inv_words' => $this->input->post('inv_words'),
            'inv_paymentmethod' => $this->input->post('inv_paymentmethod'),
            'inv_date' => $this->input->post('inv_date'),
            'inv_duedate' => $this->input->post('inv_duedate'),
            'inv_notes' => $this->input->post('inv_notes'),
            'inv_tnc' => $this->input->post('inv_tnc'),
            'inv_status' => 0,
        ];

        // echo json_encode($data);
        $this->inv->save($data);
        $this->session->set_flashdata('success', 'Invoice has been created');
        redirect('/finance/invoice/student/view/'.$id);
    }


    public function viewInvoice($id) {
        $data['inv'] = $this->inv->showId($id);
        $inv_id = $data['inv']['inv_id'];
        $data['invdtl'] = $this->invdetail->showId($inv_id);
        $data['rec'] = $this->receipt->showByInvId($inv_id);
        // echo json_encode($data['inv']);
        $this->load->view('templates/s-io');
        $this->load->view('finance/invoice/student/view',$data);
        $this->load->view('templates/f-io'); 
    }

    public function view_detail($id) {
        $data = $this->invdetail->showDetailId($id);
        echo json_encode($data);
    }

    public function edit($id) {
        $data['inv'] = $this->inv->showInvNum($id);
        $inv_id = $data['inv']['inv_id'];
        $data['invdtl'] = $this->invdetail->showId($inv_id);
        $data['paymentMethod'] = 'Installment';
        $this->load->view('templates/s-io');
        $this->load->view('finance/invoice/student/edit',$data);
        $this->load->view('templates/f-io'); 
    }

    public function update() 
    {
        $id = $this->input->post('inv_num');
        $data = [
            'inv_priceusd' => $this->input->post('inv_priceusd'),
            'inv_priceidr' => $this->input->post('inv_priceidr'),
            'inv_earlybirdusd' => $this->input->post('inv_earlybirdusd'),
            'inv_earlybirdidr' => $this->input->post('inv_earlybirdidr'),
            'inv_discusd' => $this->input->post('inv_discusd'),
            'inv_discidr' => $this->input->post('inv_discidr'),
            'inv_totprusd' => $this->input->post('inv_totprusd'),
            'inv_totpridr' => $this->input->post('inv_totpridr'),
            'inv_session' => $this->input->post('inv_session'),
            'inv_duration' => $this->input->post('inv_duration'),
            'inv_words' => $this->input->post('inv_words'),
            'inv_paymentmethod' => $this->input->post('inv_paymentmethod'),
            'inv_date' => $this->input->post('inv_date'),
            'inv_duedate' => $this->input->post('inv_duedate'),
            'inv_notes' => $this->input->post('inv_notes'),
            'inv_tnc' => $this->input->post('inv_tnc'),
        ];

        $inv = $this->inv->showInvNum($id);
        $inv_id = $inv['inv_id'];
        $pm = $this->input->post('inv_paymentmethod');
        if($pm == "Full Payment") {
            $this->invdetail->deleteInvId($inv_id);
        }
        
        $this->inv->update($data, $id);
        $this->session->set_flashdata('success', 'Invoice has been changed');
        redirect('/finance/invoice/student/edit/'.$id);
    }


    public function save_detail() {
        $inv_num = $this->input->post('inv_num');
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
        redirect('/finance/invoice/student/edit/'.$inv_num);
    }

    public function update_detail() {
        $inv_num = $this->input->post('inv_num');
        $id = $this->input->post('invdtl_id');
        $data = [
            'invdtl_statusname' => $this->input->post('invdtl_statusname'),
            'invdtl_duedate' => $this->input->post('invdtl_duedate'),
            'invdtl_percentage' => $this->input->post('invdtl_percentage'),
            'invdtl_amountusd' => $this->input->post('invdtl_amountusd'),
            'invdtl_amountidr' => $this->input->post('invdtl_amountidr'),
        ];

        $this->invdetail->update($data, $id);
        $this->session->set_flashdata('success', 'Installment has been changed');
        redirect('/finance/invoice/student/edit/'.$inv_num);
    }

    public function delete_detail($id, $inv_num) {
        $this->invdetail->delete($id);
        $this->session->set_flashdata('success', 'Installment has been deleted');
        redirect('/finance/invoice/student/edit/'.$inv_num);
    }

    public function cancel($id) {
        $inv = $this->inv->showInvNum($id);
        $inv_id = $inv['inv_id'];
        $this->inv->delete($id);
        $this->invdetail->delete($inv_id);
        $this->session->set_flashdata('success', 'Invoice has been canceled');
        redirect('/finance/invoice/student/');
    }

    public function pdf($id)
    {
        $data['inv'] = $this->inv->showInvNum($id);
        $inv_id = $data['inv']['inv_id'];
        $data['invdtl'] = $this->invdetail->showId($inv_id);
        $name = explode("/",$data['inv']['inv_id']);
        $new_name = implode("-", $name);
        $html = $this->load->view('finance/invoice/student/export/pdf', $data, true);
        $this->pdf->createPDF($html, $new_name, false);
    }

    public function pdf_usd($id)
    {
        $data['inv'] = $this->inv->showInvNum($id);
        $inv_id = $data['inv']['inv_id'];
        $data['invdtl'] = $this->invdetail->showId($inv_id);
        $name = explode("/",$data['inv']['inv_id']);
        $new_name = implode("-", $name);
        $html = $this->load->view('finance/invoice/student/export/pdf-usd', $data, true);
        $this->pdf->createPDF($html, $new_name, false);
    }

    public function showInvNumJson($id){
        $data = $this->inv->showInvNum($id);
        echo json_encode($data);
    }

    public function showInvDtlJson($id) {
        $data = $this->invdetail->showDetailId($id);
        echo json_encode($data);
    }
    
}