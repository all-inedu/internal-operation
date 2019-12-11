<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parents extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-client');
        $this->load->view('templates/s-client');
        $this->load->view('client/parents/index');
        $this->load->view('templates/f-client');
    }
}