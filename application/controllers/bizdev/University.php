<?php
defined('BASEPATH') or exit('No direct script access allowed');

class University extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/university/index');
        $this->load->view('templates/f-io');
    }
    
}