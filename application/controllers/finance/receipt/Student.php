<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('pdf');
        $this->load->model('finance/Receipt_model', 'receipt');
        $this->load->model('finance/Invoice_model', 'inv');
        $this->load->model('finance/InvoiceDetail_model','invdetail');
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
        $data['receipt'] = $this->receipt->showAll();
        $this->load->view('templates/s-io');
        $this->load->view('finance/receipt/student/index', $data);
        $this->load->view('templates/f-io');
    }
    
    public function save() {

        $this->form_validation->set_rules('receipt_date', 'required');

        if($this->form_validation->run(false)){
            $this->session->set_flashdata('warning', 'receipt date must be fill');
            redirect('/finance/invoice/student/');
        } else {
            $m = date('m', strtotime($this->input->post('receipt_date')));
            $y = date('Y', strtotime($this->input->post('receipt_date')));
            
            $inv_id = $this->input->post('inv_id');
            $inv = $this->inv->showInvId($inv_id);
            $prog_id = $inv['prog_id'];
            $month = ["","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];
            $romawi = $month[intval($m)];
            $year = date('y', strtotime($this->input->post('receipt_date')));

            $rec = $this->receipt->getId($m, $y);
            if(empty($rec)){
                $idmax = 1;
            } else {
                $idnum = substr($rec['receipt_id'],0,4);
                $idmax = intval($idnum) + 1;
            }
            $newid = str_pad($idmax, 4, "0", STR_PAD_LEFT);
            $rec_id = $newid.'/REC-JEI/'.$prog_id.'/'.$romawi.'/'.$year;
            
            $data = [
                'receipt_id' => $rec_id,
                'inv_id' => $inv_id,
                'invdtl_id' => $this->input->post('invdtl_id'),
                'receipt_cat' => $this->input->post('receipt_cat'),
                'receipt_mtd' => $this->input->post('receipt_mtd'),
                'receipt_cheque' => $this->input->post('receipt_cheque'),
                'receipt_amount' => $this->input->post('receipt_amount'),
                'receipt_amountusd' => $this->input->post('receipt_amountusd'),
                'receipt_words' => $this->input->post('receipt_words'),
                'receipt_wordsusd' => $this->input->post('receipt_wordsusd'),
                'receipt_date' => $this->input->post('receipt_date'),
                'receipt_status' => 1,
            ];

            $stprog_id = $this->input->post('stprog_id');
            $invdtl_id = $this->input->post('invdtl_id');
            
            if($invdtl_id > 0){
                $invdtl = [
                    'invdtl_percentage' => $this->input->post('invdtl_percentage'),
                    'invdtl_amountusd' => $this->input->post('receipt_amountusd'),
                    'invdtl_amountidr' => $this->input->post('receipt_amount')
                ];
                $this->invdetail->update($invdtl, $invdtl_id);
            } 
                        
            $this->receipt->save($data);
            $this->session->set_flashdata('success', 'Receipt has been created');
            redirect('/finance/invoice/student/view/'.$stprog_id);
        }
    }

    public function view($id){      
        $data['rec'] = $this->receipt->showId($id);
        $inv_id = $data['rec']['inv_id'];
        $data['invdtls'] = $this->invdetail->showId($inv_id);
        $this->load->view('templates/s-io');
        $this->load->view('finance/receipt/student/view',$data);
        $this->load->view('templates/f-io');
    }

    public function edit() {
        $id = $this->input->post('receipt_num');
        $data = [
            'receipt_mtd' => $this->input->post('receipt_mtd'),
            'receipt_cheque' => $this->input->post('receipt_cheque'),
            'receipt_amount' => $this->input->post('receipt_amount'),
            'receipt_amountusd' => $this->input->post('invdtl_amountusd'),
            'receipt_words' => $this->input->post('receipt_words'),
            'receipt_wordsusd' => $this->input->post('receipt_wordsusd'),
            'receipt_date' => $this->input->post('receipt_date'),
            'receipt_status' => 1,
        ];
        
        $invdtl_id = $this->input->post('invdtl_id');
        if($invdtl_id > 0){
            $invdtl = [
                'invdtl_percentage' => $this->input->post('invdtl_percentage'),
                'invdtl_amountusd' => $this->input->post('invdtl_amountusd'),
                'invdtl_amountidr' => $this->input->post('receipt_amount')
            ];
            $this->invdetail->update($invdtl, $invdtl_id);
        }
        
        $this->receipt->update($data, $id);
        $this->session->set_flashdata('success', 'Receipt has been changed');
        redirect('/finance/receipt/student/view/'.$id);
    }

    public function refund() {
        $id = $this->input->post('receipt_num');
        $data = [
            'receipt_status' => 2,
            'receipt_refund' => $this->input->post('receipt_refund'),
        ];
        
        $this->receipt->update($data, $id);
        $this->session->set_flashdata('success', 'Refund has been sucessfully');
        redirect('/finance/receipt/student/view/'.$id);
    }

    public function cancel_refund($id) {
        $data = [
            'receipt_status' => 1,
            'receipt_refund' => 0,
        ];
        
        $this->receipt->update($data, $id);
        $this->session->set_flashdata('success', 'Cancel refund has been successfully');
        redirect('/finance/receipt/student/view/'.$id);
    }

    public function pdf($id)
    {
        $data['rec'] = $this->receipt->showId($id);
        $inv_id = $data['rec']['inv_id'];
        $invdtl_id = $data['rec']['invdtl_id'];
        $data['invdtls'] = $this->invdetail->showId($inv_id);
        $data['invdtl'] = $this->invdetail->showDetailId($invdtl_id);
        $name = explode("/", $data['rec']['receipt_id']);
        $new_name = implode("-", $name);
        $html = $this->load->view('finance/receipt/student/export/pdf', $data, true);
        $this->pdf->createPDF($html, $new_name, false);
    }

    public function pdf_usd($id)
    {
        $data['rec'] = $this->receipt->showId($id);
        $inv_id = $data['rec']['inv_id'];
        $invdtl_id = $data['rec']['invdtl_id'];
        $data['invdtls'] = $this->invdetail->showId($inv_id);
        $data['invdtl'] = $this->invdetail->showDetailId($invdtl_id);
        $name = explode("/", $data['rec']['receipt_id']);
        $new_name = implode("-", $name);
        $html = $this->load->view('finance/receipt/student/export/pdf-usd', $data, true);
        $this->pdf->createPDF($html,$new_name, false);
    }

}