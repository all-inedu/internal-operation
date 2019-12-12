<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client_program extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-client');
        $this->load->view('templates/s-client');
        $this->load->view('client/client-program/index');
        $this->load->view('templates/f-client');
    }

    public function view(){
        $this->load->view('templates/h-client');
        $this->load->view('templates/s-client');
        $this->load->view('client/client-program/view-cp');
        $this->load->view('templates/f-client');
    }
}