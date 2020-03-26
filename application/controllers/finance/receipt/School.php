<?php
defined('BASEPATH') or exit('No direct script access allowed');

class School extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('bizdev/SProgram_model','schprog');
        $this->load->model('finance/InvoiceSchool_model','invsch');
        $this->load->model('finance/Receipt_model','receipt');
    }

    public function index(){   
        $data['receipt'] = $this->receipt->showAllB2B();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/receipt/school/index', $data);
        $this->load->view('templates/f-io');
    }

    public function save() {
        if(!empty($this->input->post('receipt_date'))) {
            $m = date('m', strtotime($this->input->post('receipt_date')));
            $y = date('Y', strtotime($this->input->post('receipt_date')));

            $schprog_id = $this->input->post('schprog_id');
            $inv_id = $this->input->post('invsch_id');
            $inv = $this->invsch->showId($schprog_id);
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
                'receipt_words' => $this->input->post('receipt_words'),
                'receipt_date' => $this->input->post('receipt_date'),
                'receipt_status' => 1,
            ];
            // echo json_encode($data);
            $this->receipt->save($data);
            $this->session->set_flashdata('success', 'Receipt has been created');
            redirect('/finance/receipt/school/');
        } else {
            $this->session->set_flashdata('error', 'Receipt date must be fill');
            redirect('/finance/invoice/school/');
        }
    }

    public function view($id){  
        $data['rec'] = $this->receipt->showIdB2B($id); 
        // echo json_encode($data['rec']);
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/receipt/school/view', $data);
        $this->load->view('templates/f-io');
    }

    public function edit() {
        $id = $this->input->post('receipt_num');
        $data = [
            'receipt_mtd' => $this->input->post('receipt_mtd'),
            'receipt_cheque' => $this->input->post('receipt_cheque'),
            // 'receipt_amount' => $this->input->post('receipt_amount'),
            // 'receipt_words' => $this->input->post('receipt_words'),
            'receipt_date' => $this->input->post('receipt_date'),
            'receipt_status' => 1,
        ];
        
        $this->receipt->update($data, $id);
        $this->session->set_flashdata('success', 'Receipt has been changed');
        redirect('/finance/receipt/school/view/'.$id);
    }

    public function refund() {
        $id = $this->input->post('receipt_num');
        $data = [
            'receipt_status' => 2,
            'receipt_refund' => $this->input->post('receipt_refund'),
        ];
        
        $this->receipt->update($data, $id);
        $this->session->set_flashdata('success', 'Refund has been sucessfully');
        redirect('/finance/receipt/school/view/'.$id);
    }

    public function cancel_refund($id) {
        $data = [
            'receipt_status' => 1,
            'receipt_refund' => 0,
        ];
        
        $this->receipt->update($data, $id);
        $this->session->set_flashdata('success', 'Cancel refund has been successfully');
        redirect('/finance/receipt/school/view/'.$id);
    }

    public function pdf($id)
    {
        $data['rec'] = $this->receipt->showIdB2B($id);
        $name = explode("/", $data['rec']['receipt_id']);
        $new_name = implode("-", $name);
        $html = $this->load->view('finance/receipt/school/export/pdf', $data, true);
        $this->pdf->createPDF($html, $new_name, false);
    }

}