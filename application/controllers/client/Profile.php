<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('schooldata');
        $this->load->library('countries');
        $this->load->library('majors');
        $this->load->library('states');
        $this->load->model('bizdev/School_model','sch');
        $this->load->model('bizdev/University_model','univ');
        $this->load->model('client/Students_model','std');
        $this->load->model('client/StProgram_model','stprog');
        $this->load->model('client/Program_model','prog');
        $this->load->model('client/Lead_model','lead');
    }

    public function student($id){
        $data['badge'] = ["badge-dark","badge-primary","badge-info","badge-success","badge-danger","badge-warning","badge-secondary"];
        $data['s'] = $this->std->showId($id);
        $data['lead'] = $this->lead->showAll();
        $data['program'] = $this->prog->showB2C();
        $data['stprog'] = $this->stprog->showStProg($id);
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/profile/student-profile', $data);
        $this->load->view('templates/f-io');
    }

    public function edit($id){
        $data['s'] = $this->std->showId($id);
        $data['lead'] = $this->lead->showAll();
        $data['program'] = $this->prog->showB2C();
        $data['stprog'] = $this->stprog->showStProg($id);

        $this->form_validation->set_rules('stFName', 'first name', 'required');
        if ($this->form_validation->run() == false) {
            $data['badge'] = ["badge-dark","badge-primary","badge-info","badge-success","badge-danger","badge-warning","badge-secondary"];
            $data['prog'] = ["Admission Consulting","SAT Preparation","Experiential Learning"];
            $data['country'] = ["US","UK","Singapore"];
            $data['univ'] = ["Harvard","NTU","NUS","University of California"];
            $data['major'] = ["Computer Science","Business Management","Communication","Health Professions","Engineering","Human Service"];
           
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-client');
            $this->load->view('client/profile/student-edit', $data);
            $this->load->view('templates/f-io'); 
        } else {
            $photo = $_FILES['photo']['name'];
            $cv = $_FILES['cv']['name'];
            $transcript = $_FILES['transcript']['name'];
            $resume = $_FILES['resume']['name'];
            $questionnaire = $_FILES['questionnaire']['name'];
            $others = $_FILES['others']['name'];

            echo $photo .','. $cv .','. $transcript .','. $resume .','. $questionnaire .','. $others;
        }
    }

}