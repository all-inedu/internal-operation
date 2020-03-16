<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('client/Students_model','std');
        $this->load->model('client/StProgram_model','stprog');
    }

    public function index(){
        $data['prosp'] = count($this->std->studentStatus(0));
        $data['poten'] = count($this->std->studentStatus(1));
        $data['curr'] = count($this->std->studentStatus(2));
        $data['pend'] = count($this->stprog->studentProgStatus(0));
        $data['succ'] = count($this->stprog->studentProgStatus(1));
        $data['fail'] = count($this->stprog->studentProgStatus(2));
        $data['lead'] = $this->stprog->studentProgramLead();

        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/index', $data);
        $this->load->view('templates/f-io');
    }

    public function sample_form()
    {
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/form');
        $this->load->view('templates/f-io');
    }
    
}