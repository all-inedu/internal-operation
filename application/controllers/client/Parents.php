<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parents extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/parents/index');
        $this->load->view('templates/f-io');
    }

    public function view(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/parents/view-parent');
        $this->load->view('templates/f-io'); 
    }

    public function edit(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/parents/edit-parent');
        $this->load->view('templates/f-io'); 
    }
}