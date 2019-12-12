<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lead extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-client');
        $this->load->view('templates/s-client');
        $this->load->view('client/lead/index');
        $this->load->view('templates/f-client');
    }
}