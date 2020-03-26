<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pph_final extends CI_Controller
{

    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('pdf');
        $this->load->model('finance/PPHFinal_model','pphfinal');
        $this->load->model('finance/Invoice_model','inv');
        $this->load->model('finance/InvoiceDetail_model','invdtl');
        $this->load->model('finance/InvoiceSchool_model','invsch');
    }

    public function index() {
        $this->form_validation->set_rules('month','month','required');
        $this->form_validation->set_rules('year','year','required');
        if($this->form_validation->run()==false){
            $data['m']='';
            $data['y']='';
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-finance');
            $this->load->view('finance/pph-final/index', $data);
            $this->load->view('templates/f-io');
        } else {
            $m = $this->input->post('month');
            $y = $this->input->post('year');
            
            $data['receipt'] = $this->pphfinal->showAll($m, $y);
            $data['m']=$m;
            $data['y']=$y;
   
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-finance');
            $this->load->view('finance/pph-final/index', $data);
            $this->load->view('templates/f-io');
        }
    }

}