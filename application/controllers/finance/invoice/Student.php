<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }

    public function index(){      
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/invoice/student/index');
        $this->load->view('templates/f-io');
    }

    public function view($i){      
        if($i==1){
            $this->addInvoice();
        } else if($i==2) {
            $this->viewInvoice();
        }
    }

    public function addInvoice() {
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/invoice/student/add');
        $this->load->view('templates/f-io'); 
    }

    public function viewInvoice() {
        $data['paymentMethod'] = 'Installment';
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/invoice/student/view',$data);
        $this->load->view('templates/f-io'); 
    }

    public function edit() {
        $data['paymentMethod'] = 'Installment';
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/invoice/student/edit',$data);
        $this->load->view('templates/f-io'); 
    }

    public function dompdf()
    {
        $data['nama'] = 'Hafidz Annur';
        $data['alamat'] ='Jl A No.25 Kebon Jeruk <br>Jakarta Barat 11530';
        $data['program'] = 'SAT Private';
        $html = $this->load->view('finance/invoice/student/export/usd-pdf', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }
    
}