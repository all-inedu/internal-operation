<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petty_cash extends CI_Controller
{

    function __construct(){
        parent::__construct();
    }
    
    public function datas(){
        $data['div'] = ['Client Management', 'Business Development', 'Finance',' IT'];
        $data['status'] = ['Urgent', 'Immediately', 'Can Wait', 'Done'];
        return $data;
    }  

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/petty-cash/index');
        $this->load->view('templates/f-io');
    }

    public function export(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/petty-cash/export-petty-cash');
        $this->load->view('templates/f-io');
    }
}