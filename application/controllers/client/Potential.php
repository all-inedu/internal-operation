<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Potential extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('bizdev/School_model','sch');
        $this->load->model('bizdev/University_model','univ');
        $this->load->model('client/Students_model','std');
        $this->load->model('client/StProgram_model','stprog');
        $this->load->model('client/Program_model','prog');
        $this->load->model('client/Lead_model','lead');
    }

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/potential/index');
        $this->load->view('templates/f-io');
    }

    public function view($id){
        $data['s'] = $this->std->showId($id);
        $data['lead'] = $this->lead->showAll();
        $data['program'] = $this->prog->showB2C();
        $data['stprog'] = $this->stprog->showStProg($id);
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/potential/view-potential', $data);
        $this->load->view('templates/f-io');
    }
}