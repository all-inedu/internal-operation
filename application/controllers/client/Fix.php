<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fix extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/fix/index');
        $this->load->view('templates/f-io');
    }

    public function view(){
        $data['badge'] = ["badge-dark","badge-primary","badge-info","badge-success","badge-danger","badge-warning","badge-secondary"];
        $data['prog'] = ["Admission Consulting","SAT Preparation","Experiential Learning"];
        $data['country'] = ["US","UK","Singapore"];
        $data['univ'] = ["Harvard","NTU","NUS","University of California"];
        $data['major'] = ["Computer Science","Business Management","Communication","Health Professions","Engineering","Human Service"];
        
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/fix/view-fix', $data);
        $this->load->view('templates/f-io');
    }
}