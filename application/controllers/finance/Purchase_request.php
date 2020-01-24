<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_request extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/purchase-req/index');
        $this->load->view('templates/f-io');
    }

    public function add(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/purchase-req/add-purchase');
        $this->load->view('templates/f-io');
    }
    
}