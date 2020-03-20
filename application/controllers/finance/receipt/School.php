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
        $data['receipt'] = $this->receipt->showSchoolAll();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/receipt/school/index', $data);
        $this->load->view('templates/f-io');
    }

    public function save() {
        $schprog_id = $this->input->post('schprog_id');
        $inv_id = $this->input->post('invsch_id');
        $inv = $this->invsch->showId($schprog_id);
        $prog_id = $inv['prog_id'];
        $month = ["","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];
        $romawi = $month[intval(date('m'))];
        $year = date('y');

        $rec = $this->receipt->getId();
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
    }

    public function view(){      
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/receipt/school/view');
        $this->load->view('templates/f-io');
    }

    public function print_receipt()
    {
        $data['nama'] = 'School Name';
        $data['alamat'] ='Jl A No.25 Kebon Jeruk <br>Jakarta Barat 11530';
        $data['program'] = 'SAT Private';
        $html = $this->load->view('finance/receipt/school/export/pdf', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }

}