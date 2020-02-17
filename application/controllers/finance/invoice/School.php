<?php
defined('BASEPATH') or exit('No direct script access allowed');

class School extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }

    public function index(){      
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/invoice/school/index');
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
        $this->load->view('finance/invoice/school/add');
        $this->load->view('templates/f-io'); 
    }

    public function viewInvoice() {
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/invoice/school/view');
        $this->load->view('templates/f-io'); 
    }

    public function edit() {
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/invoice/school/edit');
        $this->load->view('templates/f-io'); 
    }

    public function dompdf()
    {
        $data['nama'] = 'School Name';
        $data['alamat'] ='Jl A No.25 Kebon Jeruk <br>Jakarta Barat 11530';
        $data['program'] = 'SAT Private';
        $html = $this->load->view('finance/invoice/school/export/pdf', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }
    
}