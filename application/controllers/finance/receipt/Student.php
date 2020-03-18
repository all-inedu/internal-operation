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
    }

    public function index(){      
        $data['receipt'] = $this->receipt->showAll();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/receipt/student/index', $data);
        $this->load->view('templates/f-io');
    }
    
    public function save() {
        $inv_id = $this->input->post('inv_id');
        $inv = $this->inv->showInvId($inv_id);
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
            'receipt_mtd' => $this->input->post('receipt_mtd'),
            'receipt_cheque' => $this->input->post('receipt_cheque'),
            'receipt_amount' => $this->input->post('receipt_amount'),
            'receipt_words' => $this->input->post('receipt_words'),
            'receipt_date' => $this->input->post('receipt_date'),
            'receipt_status' => 1,
        ];

        $this->receipt->save($data);
        $this->session->set_flashdata('success', 'Receipt has been created');
        redirect('/finance/receipt/student/');
    }

    public function view($id){      
        $data['rec'] = $this->receipt->showId($id);
        $inv_id = $data['rec']['inv_id'];
        $data['invdtls'] = $this->invdetail->showId($inv_id);
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/receipt/student/view',$data);
        $this->load->view('templates/f-io');
    }

    public function pdf($id)
    {
        $data['rec'] = $this->receipt->showId($id);
        $inv_id = $data['rec']['inv_id'];
        $data['invdtls'] = $this->invdetail->showId($inv_id);
        
        $data['nama'] = 'Hafidz Annur';
        $data['alamat'] ='Jl A No.25 Kebon Jeruk <br>Jakarta Barat 11530';
        $data['program'] = 'SAT Private';
        $html = $this->load->view('finance/receipt/student/export/pdf', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }

}