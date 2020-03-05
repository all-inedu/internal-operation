<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prospective extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('schooldata');
        $this->load->library('countries');
        $this->load->library('majors');
        $this->load->model('bizdev/School_model','sch');
        $this->load->model('bizdev/University_model','univ');
        $this->load->model('client/Program_model','prog');
        $this->load->model('client/Lead_model','lead');
    }

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/prospective/index');
        $this->load->view('templates/f-io');
    }

    public function add($role=''){
        $data['prog'] = $this->prog->showB2C();
        $data['sch'] = $this->sch->showAll();
        $data['school'] = $this->schooldata->show();
        $data['lead'] = $this->lead->showAll();
        $data['univ'] = $this->univ->showAll();
        $data['con'] = $this->countries->show();
        $data['majors'] = $this->majors->show();
        if($role=='student' or $role==''){
            $this->form_validation->set_rules('st_firstname', 'first name', 'required');
            $this->form_validation->set_rules('st_mail', 'email', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/h-io');
                $this->load->view('templates/s-client');
                $this->load->view('client/prospective/add-prospective', $data);
                $this->load->view('templates/f-io');
            } else {
                $this->_addStudent();
            }

        } else if ($role=='parent'){
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-client');
            $this->load->view('client/prospective/add-parent', $data);
            $this->load->view('templates/f-io');

        } else {
            redirect('/client/prospective');
        }
    }

    private function _addStudent() {
        $sch_id = $this->input->post('sch_id');

        if($sch_id=='other') {
            $query = $this->sch->getId();   
            if($query->num_rows() <> 0){        
                $data = $query->row();      
                $id = intval($data->kode) + 1;    
            } else { 
                $id = 1;    
            }
            $idmax = str_pad($id, 4, "0", STR_PAD_LEFT); 
            $newid = "SCH-".$idmax;

            $school_data = [
                'sch_id' => $newid,
                'sch_name' => $this->input->post('sch_name'),
                'sch_level' => $this->input->post('st_currentsch'),
            ];
            // $this->sch->save($school_data);
            $sch_id = $newid;
        } else {
            $sch_id = $sch_id;
        }

        $data = [
            'st_firstname' => $this->input->post('st_firstname'),
            'st_lastname' => $this->input->post('st_lastname'),
            'st_mail' => $this->input->post('st_mail'),
            'st_phone' => $this->input->post('st_phone'),
            'st_insta' => $this->input->post('st_insta'),
            'st_state' => $this->input->post('st_state'),
            'st_address' => $this->input->post('st_address').'<br>'.$this->input->post('st_pc') ,
            'sch_id' => $sch_id,
            'st_currentsch' => $this->input->post('st_currentsch'),
            'st_grade' => $this->input->post('st_grade'),
            'lead_id' => $this->input->post('lead_id'),
            'st_levelinterest' => $this->input->post('st_levelinterest'),
            'prog_id' => implode(", ", $this->input->post('prog_id[]')),
            'st_abryear' => $this->input->post('st_abryear'),
            'st_abrcountry' => implode(", ", $this->input->post('st_abrcountry[]')),
            'st_abruniv' => implode(", ", $this->input->post('st_abruniv[]')),
            'st_abrmajor' => implode(", ", $this->input->post('st_abrmajor[]')),
            'st_datecreate' => date('Y-m-d H:i:s'),
            'st_datelastedit' => date('Y-m-d H:i:s'),
        ];


        echo json_encode($data);
        // $this->session->set_flashdata('success', 'Prospective client has been created');
        // redirect('/client/prospective/');
    }

    private function _addParent() {

    }

    public function view() {
        $data['badge'] = ["badge-dark","badge-primary","badge-info","badge-success","badge-danger","badge-warning","badge-secondary"];
        $data['prog'] = ["Admission Consulting","SAT Preparation","Experiential Learning"];
        $data['country'] = ["US","UK","Singapore"];
        $data['univ'] = ["Harvard","NTU","NUS","University of California"];
        $data['major'] = ["Computer Science","Business Management","Communication","Health Professions","Engineering","Human Service"];

        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/prospective/view-prospective', $data);
        $this->load->view('templates/f-io');
    }

    

}