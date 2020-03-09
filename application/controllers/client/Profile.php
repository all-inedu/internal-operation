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
        $data['prog'] = $this->prog->showB2C();
        $data['sch'] = $this->sch->showAll();
        $data['school'] = $this->schooldata->show();
        $data['lead'] = $this->lead->showAll();
        $data['univ'] = $this->univ->showAll();
        $data['con'] = $this->countries->show();
        $data['majors'] = $this->majors->show();
        $data['states'] = $this->states->show();

        $this->form_validation->set_rules('st_firstname', 'first name', 'required');
        if ($this->form_validation->run() == false) {         
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-client');
            $this->load->view('client/profile/student-edit', $data);
            $this->load->view('templates/f-io'); 
        } else {
            $this->update();
        }
    }

    public function update() {
        $id = $this->input->post('st_num');

        // Add Parents 

        // Add School
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
            'st_address' => $this->input->post('st_address'),
            'sch_id' => $sch_id,
            'st_currentsch' => $this->input->post('st_currentsch'),
            'st_grade' => $this->input->post('st_grade'),
            'st_datelastedit' => date('Y-m-d H:i:s'),
        ];

        $this->std->update($data, $id);
        $this->session->set_flashdata('success', 'Prospective client has been created');
        redirect('/client/profile/student/'.$id);



    }

}