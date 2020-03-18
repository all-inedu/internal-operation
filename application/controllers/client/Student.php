<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('schooldata');
        $this->load->library('countries');
        $this->load->library('majors');
        $this->load->library('states');
        $this->load->model('hr/Employee_model','empl');
        $this->load->model('bizdev/School_model','sch');
        $this->load->model('bizdev/University_model','univ');
        $this->load->model('client/Students_model','std');
        $this->load->model('client/Parents_model','prt');
        $this->load->model('client/StProgram_model','stprog');
        $this->load->model('client/Program_model','prog');
        $this->load->model('client/Lead_model','lead');
    }

    public function index(){
        $data['std'] = $this->std->showAll();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/student/index', $data);
        $this->load->view('templates/f-io');
    }

    public function add(){
        $data['prog'] = $this->prog->showB2C();
        $data['sch'] = $this->sch->showAll();
        $data['school'] = $this->schooldata->show();
        $data['lead'] = $this->lead->showAll();
        $data['univ'] = $this->univ->showAll();
        $data['con'] = $this->countries->show();
        $data['majors'] = $this->majors->show();
        $data['states'] = $this->states->show();
        $data['cities'] = $this->states->showCities();
        
        // if($role=='student' or $role==''){
        $this->form_validation->set_rules('st_firstname', 'first name', 'required');
        // $this->form_validation->set_rules('st_mail', 'email', 'required');
        // $this->form_validation->set_rules('sch_id', 'school', 'required');
        $this->form_validation->set_rules('lead_id', 'lead', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-client');
            $this->load->view('client/student/add-student', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->save();
        }
    }

    private function save() {
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
            $this->sch->save($school_data);
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
            'st_city' => $this->input->post('st_city'),
            'st_address' => $this->input->post('st_address').$this->input->post('st_pc') ,
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
            'st_statuscli' => 0,
            'st_datecreate' => date('Y-m-d H:i:s'),
            'st_datelastedit' => date('Y-m-d H:i:s'),
        ];

        $this->std->save($data);
        $this->session->set_flashdata('success', 'Prospective client has been created');
        redirect('/client/student/');
    }


    public function view($id) {
        $data['badge'] = ["badge-dark","badge-primary","badge-info","badge-success","badge-danger","badge-warning","badge-secondary"];
        $data['s'] = $this->std->showId($id);
        $data['lead'] = $this->lead->showAll();
        $data['program'] = $this->prog->showB2C();
        $data['stprog'] = $this->stprog->showStProg($id);
        $data['empl'] = $this->empl->showActive();

        $this->form_validation->set_rules('prog_id', 'program name', 'required');
        $this->form_validation->set_rules('empl_id', 'PIC', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-client');
            $this->load->view('client/student/view-student', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->convertPotential();
        }
    }

    public function convertPotential() {
        $id = $this->input->post('st_num');
        $data = [
            'st_num' => $id,
            'prog_id' => $this->input->post('prog_id'),
            'lead_id' => $this->input->post('lead_id'),
            'stprog_firstdisdate' => $this->input->post('stprog_firstdisdate'),
            'stprog_lastdisdate' => $this->input->post('stprog_firstdisdate'),
            'stprog_meetingdate' => $this->input->post('stprog_meetingdate'),
            'stprog_meetingnote' => $this->input->post('stprog_meetingnote'),
            'stprog_statusprogdate' => date('Y-m-d'),
            'stprog_status' => 0,
            'stprog_runningstatus' => 0,
            'empl_id' => $this->input->post('empl_id'),
        ];

        $datas = [
            'st_statuscli' => 1,
        ];

        $this->stprog->save($data, $datas, $id);
        $this->session->set_flashdata('success', 'Students program has been created');
        redirect('/client/student/view/'.$id);
    }

}