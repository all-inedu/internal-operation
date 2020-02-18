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
        $this->load->view('finance/receipt/student/index');
        $this->load->view('templates/f-io');
    }

    public function view(){      
        $data['paymentMethod'] = 'Installment';
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/receipt/student/view',$data);
        $this->load->view('templates/f-io');
    }

    public function print_receipt()
    {
        $data['nama'] = 'Hafidz Annur';
        $data['alamat'] ='Jl A No.25 Kebon Jeruk <br>Jakarta Barat 11530';
        $data['program'] = 'SAT Private';
        $html = $this->load->view('finance/receipt/student/export/pdf', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }

}