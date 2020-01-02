<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Corporate_program extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/corporate-program/index');
        $this->load->view('templates/f-io');
    }

    public function view(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/corporate-program/view-corporate-program');
        $this->load->view('templates/f-io');
    }

    public function edit(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/corporate-program/edit-corporate-program');
        $this->load->view('templates/f-io');
    }
    
}