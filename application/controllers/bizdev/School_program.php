<?php
defined('BASEPATH') or exit('No direct script access allowed');

class School_program extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/school-program/index');
        $this->load->view('templates/f-io');
    }

    public function view(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/school-program/view-school-program');
        $this->load->view('templates/f-io');
    }

    public function edit(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/school-program/edit-school-program');
        $this->load->view('templates/f-io');
    }
    
}