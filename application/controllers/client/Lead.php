<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lead extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/lead/index');
        $this->load->view('templates/f-io');
    }
}