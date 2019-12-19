<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Corporate extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/corporate/index');
        $this->load->view('templates/f-io');
    }

    public function add(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/corporate/add-corporate');
        $this->load->view('templates/f-io');
    }

    public function view(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/corporate/view-corporate');
        $this->load->view('templates/f-io');
    }

    public function edit(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/corporate/edit-corporate');
        $this->load->view('templates/f-io');
    }
    
}