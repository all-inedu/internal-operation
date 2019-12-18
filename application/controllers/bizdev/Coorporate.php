<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coorporate extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/index');
        $this->load->view('templates/f-io');
    }
    
}