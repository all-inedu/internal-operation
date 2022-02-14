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
        $this->load->model('bizdev/Edufair_model','eduf');
        $this->load->model('hr/Influencer_model', 'infl');
        $this->load->model('hr/Mentor_model', 'mt');
        $this->load->model('client/Students_model','std');
        $this->load->model('client/StDetail_model','stdetail');
        $this->load->model('client/Parents_model','prt');
        $this->load->model('client/StProgram_model','stprog');
        $this->load->model('client/FollowUp_model','flw');
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

    public function index($s=""){
        $data['std'] = $this->std->showAll();
        $data['status'] = $s;
        $data['sch'] = $this->sch->showAll();
        $data['lead'] = $this->lead->showAll();
        $data['prog'] = $this->prog->showB2C();
        $data['con'] = $this->countries->show();
        $data['states'] = $this->states->show();
        $this->load->view('templates/s-io');
        $this->load->view('client/student/index', $data);
        $this->load->view('templates/f-io');
    }

    public function add(){ 
        $data['prog'] = $this->prog->showB2C();
        $data['sch'] = $this->sch->showAll();
         $data['prt'] = $this->prt->showAll();
        $data['school'] = $this->schooldata->show();
        $data['lead'] = $this->lead->showAll();
        $data['eduf'] = $this->eduf->showSuccess();
        $data['infl'] = $this->infl->showActive();
        $data['univ'] = $this->univ->showAll();
        $data['con'] = $this->countries->show();
        $data['majors'] = $this->majors->show();
        $data['states'] = $this->states->show();
        $data['cities'] = $this->states->showCities();
        
        // if($role=='student' or $role==''){
        $this->form_validation->set_rules('st_firstname', 'first name', 'required');
        $this->form_validation->set_rules('st_phone', 'phone', 'required');
        $this->form_validation->set_rules('lead_id', 'lead', 'required');
        $this->form_validation->set_rules('st_state', 'state', 'required');
        // $this->form_validation->set_rules('st_mail', 'email', 'required');
        // $this->form_validation->set_rules('st_city', 'city', 'required');
        // $this->form_validation->set_rules('sch_id', 'school', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/s-io');
            $this->load->view('client/student/add-student', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->save();
        }
    }

    private function save() {
        // Add Parent
        $pr_id = $this->input->post('pr_id');
        if($pr_id=='other') {
            $getPrId = $this->prt->getId();
            $newprid = $getPrId['pr_id'] + 1;
            
            $dataPr = [
                'pr_id' => $newprid,
                'pr_firstname' => $this->input->post('pr_firstname'),
                'pr_lastname' => $this->input->post('pr_lastname'),
                'pr_mail' => $this->input->post('pr_mail'),
                'pr_phone' => $this->input->post('pr_phone'),
            ];
            
            $this->prt->save($dataPr);
        } else {
            $newprid = $pr_id;
        }
        
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
                // 'sch_level' => $this->input->post('st_currentsch'),
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
            'st_dob' => $this->input->post('st_dob'),
            'st_insta' => $this->input->post('st_insta'),
            'st_state' => $this->input->post('st_state'),
            'st_city' => $this->input->post('st_city'),
            'st_address' => $this->input->post('st_address').$this->input->post('st_pc') ,
            'pr_id' => $newprid,
            'sch_id' => $sch_id,
            'st_grade' => $this->input->post('st_grade'),
            'lead_id' => $this->input->post('lead_id'),
            'eduf_id' => $this->input->post('eduf_id'),
            'infl_id' => $this->input->post('infl_id'),
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
        $data['eduf'] = $this->eduf->showSuccess();
        $data['infl'] = $this->infl->showActive();

        $this->form_validation->set_rules('prog_id', 'program name', 'required');
        $this->form_validation->set_rules('lead_id', 'lead id', 'required');
        $this->form_validation->set_rules('empl_id', 'PIC', 'required');
        $this->form_validation->set_rules('stprog_firstdisdate', 'first discuss', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/s-io');
            $this->load->view('client/student/view-student', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->convertPotential();
        }
    }

    public function convertPotential() {
        $stprog = $this->stprog->getId();
        $stprog_id = $stprog['stprog_id'] + 1;

        $id = $this->input->post('st_num');
        $plan = $this->input->post('stprog_followupdate');

        if(!empty($plan)) {
            $followup_data = [
                'stprog_id' => $stprog_id,
                'flw_date' => $this->input->post('stprog_followupdate'),
                'flw_mark' => '0'
            ];

            $this->flw->save($followup_data);
        } 
        
        $data = [
            'stprog_id' => $stprog_id,
            'st_num' => $id,
            'prog_id' => $this->input->post('prog_id'),
            'lead_id' => $this->input->post('lead_id'),
            'eduf_id' => $this->input->post('eduf_id'),
            'infl_id' => $this->input->post('infl_id'),
            'stprog_firstdisdate' => $this->input->post('stprog_firstdisdate'),
            'stprog_followupdate' => $this->input->post('stprog_followupdate'),
            'stprog_meetingnote' => $this->input->post('stprog_meetingnote'),
            // 'stprog_statusprogdate' => date('Y-m-d'),
            'stprog_status' => 0,
            'stprog_runningstatus' => 0,
            'empl_id' => $this->input->post('empl_id'),
        ];

        $success = count($this->stprog->showStatusProgram($id, 1, 0));

        if($success > 0) {
            $status_cli = 2;
        } else {
            $status_cli = 1;
        }

        $datas = [
            'st_statuscli' => $status_cli,
        ];

        $this->stprog->save($data, $datas, $id);
        $this->session->set_flashdata('success', 'Students program has been created');
        redirect('/client/student/view/'.$id);
    }

    public function delete($id) {
        $this->std->delete($id);
        $this->session->set_flashdata('success', 'Students program has been created');
        redirect('/client/student/');
    }

    public function report($st_num, $stprog_id) {
        $data['student'] = $this->std->showId($st_num);
        $data['stprog'] = $this->stprog->showId($stprog_id);
        $data['empl'] = $this->empl->showId($data['stprog']['empl_id']);
        $data['mentor'] = $this->mt->studentsMentorByStprog($data['stprog']['stprog_id']);
        $data['stdetail'] = $this->stdetail->showId($data['student']['st_id']);
        
        // echo json_encode($data);
        $this->load->view('templates/s-io');
        $this->load->view('client/student/send/index', $data);
        $this->load->view('templates/f-io');
    }

    public function send() {
        $st_num = $this->input->post('st_num');
        $stprog_id = $this->input->post('stprog_id');
        $data['notes'] = $this->input->post('notes');
        $data['student'] = $this->std->showId($st_num);
        $data['stprog'] = $this->stprog->showId($stprog_id);
        $data['empl'] = $this->empl->showId($data['stprog']['empl_id']);
        $data['mentor'] = $this->mt->studentsMentorByStprog($data['stprog']['stprog_id']);
        $data['stdetail'] = $this->stdetail->showId($data['student']['st_id']);
        
        // cek mentor
        $mentor = [];
        if(count($data['mentor'])>0) {
            foreach($data['mentor'] as $mt) {
                array_push($mentor, $mt['mt_email']);
            }
        } else {
            $this->session->set_flashdata('error', 'Please add mentor first');
            redirect('/client/students-program/view/'.$stprog_id);
        }

        $empl = [];
        array_push($empl, $data['empl']['empl_email']);
        array_push($empl, 'rizka.irawan@all-inedu.com');

        // echo json_encode($empl);
        // $this->load->view('client/student/send/profile', $data);
        // exit;

        $this->load->library('mail_smtp');
        $config = $this->mail_smtp->smtp();
        $this->load->library('email', $config);
        $this->email->initialize($config);
        
        $this->email->from('info@all-inedu.com', 'ALL-in Eduspace');
        $this->email->to($mentor);
        $this->email->cc($empl);

        $this->email->subject('Admission Mentoring - '.$data['student']['st_firstname'].'\'s Profile');
        $bodyMail = $this->load->view('client/student/send/profile', $data, true);
        $this->email->message($bodyMail);
        $this->email->attach(base_url('upload/student/questionnaire/'.$data['stdetail']['att_questioneer']));
        $this->email->attach(base_url('upload/student/assessment/'.$data['stdetail']['att_other']));

        $this->email->send();
        $this->session->set_flashdata('success', 'Student\'s profile has been sent to mentor');
        redirect('/client/student/view//'.$st_num);
    }

}