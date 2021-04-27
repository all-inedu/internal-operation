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
        $this->load->model('client/FollowUp_model','flw');
        $this->load->model('finance/Invoice_model','inv');
        $this->load->model('Menus_model','menu');
        
        $empl_id = $this->session->userdata('empl_id');
        $position = $this->session->userdata('position');
        if(empty($empl_id)) {
            redirect('/');
        } else {
            if(($position!='client') AND ($position!='admin')) {
                redirect('/'.$position);
            }

            $data['empl_id'] = $empl_id;
            $data['menus'] = $this->menu->showId($empl_id, 1);
            $this->load->view('templates/h-io', $data);
            // echo json_encode($data);
        }
    }

    public function index(){   
        $empl_id = $this->session->userdata('empl_id');     
        $datenow = date('Y-m-d');

        $month = date('m', strtotime($datenow));
        $year = date('Y', strtotime($datenow));
        $days30 = date('Y-m-d', strtotime("-30 days", strtotime($datenow)));

        $data['pic'] = count($this->stprog->showByEmpl($month, $year, $empl_id));
        $data['prosp'] = count($this->std->studentStatus(0));
        $data['poten'] = count($this->std->studentStatus(1));
        $data['curr'] = count($this->std->studentStatus(2));
        $data['compl'] = count($this->std->studentStatus(3));
        $data['init_consult'] = count($this->stprog->init_consult_date($month,$year));
        $data['ass_sent'] = count($this->stprog->assessment_sent($month,$year));
        $data['ass_making'] = $this->stprog->stprog_adm_ass_making($month, $year);
        $data['pend'] = count($this->stprog->studentProgStatus(0, $month, $year));
        $data['succ'] = count($this->stprog->studentProgStatus(1, $month, $year));
        $data['fail'] = count($this->stprog->studentProgStatus(2, $month, $year)); 

        $data['tot_inv_adm'] = $this->inv->showAllByProg($month, $year, "Admissions Mentoring");
        $data['pend_adm'] = count($this->stprog->studentProgStatusByProg(0, $month, $year, "Admissions Mentoring"));
        $data['succ_adm'] = count($this->stprog->studentProgStatusByProg(1, $month, $year, "Admissions Mentoring"));
        $data['fail_adm'] = count($this->stprog->studentProgStatusByProg(2, $month, $year, "Admissions Mentoring"));
        
        $data['tot_inv_career'] = $this->inv->showAllByProgMain($month, $year, "Career Exploration");
        $data['pend_career'] = count($this->stprog->studentProgStatusByProgMain(0, $month, $year, "Career Exploration"));
        $data['succ_career'] = count($this->stprog->studentProgStatusByProgMain(1, $month, $year, "Career Exploration"));
        $data['fail_career'] = count($this->stprog->studentProgStatusByProgMain(2, $month, $year, "Career Exploration"));
        
        $data['tot_inv_sat'] = $this->inv->showAllByProg($month, $year, "SAT");
        $data['pend_sat'] = count($this->stprog->studentProgStatusByProg(0, $month, $year, "SAT"));
        $data['succ_sat'] = count($this->stprog->studentProgStatusByProg(1, $month, $year, "SAT"));
        $data['fail_sat'] = count($this->stprog->studentProgStatusByProg(2, $month, $year, "SAT"));

        $data['tot_inv_writing'] = $this->inv->showAllByProg($month, $year, "Writing Course");
        $data['pend_writing'] = count($this->stprog->studentProgStatusByProg(0, $month, $year, "Writing Course"));
        $data['succ_writing'] = count($this->stprog->studentProgStatusByProg(1, $month, $year, "Writing Course"));
        $data['fail_writing'] = count($this->stprog->studentProgStatusByProg(2, $month, $year, "Writing Course"));

        $data['lead'] = $this->stprog->studentProgramLead($month, $year);
        $data['con_lead'] = $this->stprog->studentProgramConversionLead($month, $year);
        $data['adm_lead'] = $this->stprog->studentProgramLeadByProg($month, $year, "Admissions Mentoring");
        $data['career_lead'] = $this->stprog->studentProgramLeadByProgMain($month, $year, "Career Exploration");
        $data['sat_lead'] = $this->stprog->studentProgramLeadByProg($month, $year, "SAT");
        $data['writing_lead'] = $this->stprog->studentProgramLeadByProg($month, $year, "Writing Course");
            
        $this->load->view('templates/s-io');
        $this->load->view('client/index', $data);
        $this->load->view('templates/f-io');
    }

    public function follow_mark() {
        $id = $this->input->post('flw_id');
        $stprog = $this->flw->showFollowUpById($id);
        $stprog_id = $stprog['stprog_id'];

        // Next follow up 
        $stprog_data = $this->stprog->showId($stprog_id);
        $followup = $stprog_data['stprog_followupdate'];
        $followup_post = $this->input->post('flw_date');
        if(($followup_post!="")and($followup_post!=$followup)){
            $followup_data = [
                'stprog_id' => $stprog_id,
                'flw_date' => $followup_post,
                'flw_mark' => '0'
            ];
            $this->flw->save($followup_data);

            // update stprog
            $datas = [
                'stprog_followupdate' => $followup_post
            ]; 
            $this->stprog->update($datas, $stprog_id);
        }

        // Update follow-up
        $data = [
            'flw_mark' => 1,
            'flw_notes' => $this->input->post('flw_notes')
        ];
        $this->flw->update($data, $id);

        $this->session->set_flashdata('success', 'You have updated the follow-up list');
        redirect('/client/home/follow-up');
    }

    public function follow_unmark($id) {
        $data = [
            'flw_mark' => 0
        ];
        $this->flw->update($data, $id);
        $this->session->set_flashdata('success', 'You have updated the follow-up list');
        redirect('/client/home/follow-up');
    }

    public function follow_up()
    {
        $position = $this->session->userdata('position');
        if($position=="client") {
            $empl_id = $this->session->userdata('empl_id');
        } else {
            $empl_id = "";
        }
        $data['follow'] = $this->flw->showAll($empl_id);
        $this->load->view('templates/s-io');
        $this->load->view('client/home/follow-up', $data);
        $this->load->view('templates/f-io');
    }
 
}