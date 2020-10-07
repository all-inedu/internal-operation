<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parents extends CI_Controller
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
        $this->load->model('client/Parents_model','prt');
        $this->load->model('client/StProgram_model','stprog');
        $this->load->model('client/Program_model','prog');
        $this->load->model('client/Lead_model','lead');
        $this->load->model('Menus_model','menu');
        
        $empl_id = $this->session->userdata('empl_id');
        if(empty($empl_id)) {
            redirect('/');
        } else {
            $data['empl_id'] = $empl_id;
            $data['menus'] = $this->menu->showId($empl_id, 1);
            $this->load->view('templates/h-io', $data);
            // echo json_encode($data);
        }
    }

    public function index(){
        $data['parents'] = $this->prt->showAll();
        $this->load->view('templates/s-io');
        $this->load->view('client/parents/index', $data);
        $this->load->view('templates/f-io');
    }

    public function add() {
        $data['prog'] = $this->prog->showB2C();
        $data['sch'] = $this->sch->showAll();
        $data['school'] = $this->schooldata->show();
        $data['lead'] = $this->lead->showAll();
        $data['univ'] = $this->univ->showAll();
        $data['con'] = $this->countries->show();
        $data['majors'] = $this->majors->show();
        $data['states'] = $this->states->show();
        $data['cities'] = $this->states->showCities();
        
        $this->form_validation->set_rules('pr_firstname', 'first name', 'required');
        // $this->form_validation->set_rules('pr_mail', 'email', 'required');
        $this->form_validation->set_rules('pr_phone', 'phone', 'required');
        $this->form_validation->set_rules('lead_id', 'lead', 'required');
        $this->form_validation->set_rules('st_firstname', 'first name', 'required');
        $this->form_validation->set_rules('st_state', 'state', 'required');
        $this->form_validation->set_rules('st_city', 'city', 'required');
        $this->form_validation->set_rules('st_mail', 'email', 'required');
        $this->form_validation->set_rules('sch_id', 'school', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/s-io');
            $this->load->view('client/parents/add-parent', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->save();
        }
    }

    public function save() {
        $parent = $this->prt->getId();
        $id = $parent['pr_id'] + 1;
        
        $data_parents = [
            'pr_id' => $id,
            'pr_firstname' => $this->input->post('pr_firstname'),
            'pr_lastname' => $this->input->post('pr_lastname'),
            'pr_mail' => $this->input->post('pr_mail'),
            'pr_phone' => $this->input->post('pr_phone'),
            'pr_insta' => $this->input->post('pr_insta'),
            'pr_state' => $this->input->post('st_state'),
            'pr_address' => $this->input->post('st_address').$this->input->post('st_pc') ,
        ];

        $sch_id = $this->input->post('sch_id');
        if($sch_id=='other') {
            $query = $this->sch->getId();   
            if($query->num_rows() <> 0){        
                $dataSch = $query->row();      
                $idSch = intval($dataSch->kode) + 1;    
            } else { 
                $idSch = 1;    
            }
            $idmax = str_pad($idSch, 4, "0", STR_PAD_LEFT); 
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
            'pr_id' => $id,
            'st_firstname' => $this->input->post('st_firstname'),
            'st_lastname' => $this->input->post('st_lastname'),
            'st_mail' => $this->input->post('st_mail'),
            'st_phone' => $this->input->post('st_phone'),
            'st_insta' => $this->input->post('st_insta'),
            'st_state' => $this->input->post('st_state'),
            'st_city' => $this->input->post('st_city'),
            'st_address' => $this->input->post('st_address').$this->input->post('st_pc') ,
            'sch_id' => $sch_id,
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

        $this->prt->save($data_parents);
        $this->std->save($data);
        $this->session->set_flashdata('success', 'Parents data has been created');
        redirect('/client/parents/');
    }

    public function view($id){
        $data['parent'] = $this->prt->showId($id);
        $data['childs'] = $this->prt->showChildsParent($id);
        $this->load->view('templates/s-io');
        $this->load->view('client/parents/view-parent', $data);
        $this->load->view('templates/f-io');
    }

    public function edit($id){
        $this->form_validation->set_rules('pr_firstname', 'first name', 'required');
        if ($this->form_validation->run() == false) {
            $data['parent'] = $this->prt->showId($id);
            $data['states'] = $this->states->show();
            $this->load->view('templates/s-io');
            $this->load->view('client/parents/edit-parent', $data);
            $this->load->view('templates/f-io'); 
        } else {
            $this->update();
        }
    }

    public function update() {
        $id = $this->input->post('pr_id');
        $data = [
            'pr_id' => $id, 
            'pr_firstname' => $this->input->post('pr_firstname'),
            'pr_lastname' => $this->input->post('pr_lastname'),
            'pr_mail' => $this->input->post('pr_mail'),
            'pr_phone' => $this->input->post('pr_phone'),
            'pr_insta' => $this->input->post('pr_insta'),
            'pr_state' => $this->input->post('pr_state'),
            'pr_address' => $this->input->post('pr_address')
        ];

        $this->prt->update($data, $id);
        $this->session->set_flashdata('success', 'Parents data has been changed');
        redirect('/client/parents/view/'.$id);
    }
}