<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students_program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('client/StProgram_model','stprog');
        $this->load->model('client/Program_model','prog');
        $this->load->model('client/Lead_model','lead');
        $this->load->model('hr/Mentor_model','mt');
    }

    public function index(){
        $data['stprog'] = $this->stprog->showAll();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/client-program/index', $data);
        $this->load->view('templates/f-io');
    }

    public function view($id){
        $data['stprog'] = $this->stprog->showId($id);
        $data['stmentor'] = $this->stprog->showStudentsMentor($id);
        $data['lead'] = $this->lead->showAll();
        $data['program'] = $this->prog->showB2C();
        $data['mentor'] = $this->mt->showMentorActive();
        $data['tutor'] = $this->mt->showTutorActive();
        $this->form_validation->set_rules('lead_id', 'lead source', 'required');
        if ($this->form_validation->run() == false) {
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/client-program/view-cp', $data);
        $this->load->view('templates/f-io');
        } else { 
            $this->update();
        }
    }

    public function update(){
        $id = $this->input->post('stprog_id');
        $st_num = $this->input->post('st_num');
        $mt_id1 = $this->input->post('mt_id1');
        $mt_id2 = $this->input->post('mt_id2');
        if(empty($mt_id2)){
            $mt_id2 = "" ;
        } else {
            $mt_id2 = $this->input->post('mt_id2');
        }

        if($this->input->post('stprog_reason')) {
            $reason = $this->input->post('stprog_reason');
        } else {
            $reason = "";
        }

        $check = $this->stprog->showStudentsMentor($id);
        if(!$check) {
            $stmentor = [
                'stprog_id' => $id,
                'mt_id1' => $mt_id1,
                'mt_id2' => $mt_id2
            ];
            $this->stprog->saveStudentsMentor($stmentor);
        } else {
            $stmentor_id = $check['stmentor_id'];
            $stmentor = [
                'stprog_id' => $id,
                'mt_id1' => $mt_id1,
                'mt_id2' => $mt_id2
            ];
            $this->stprog->updateStudentsMentor($stmentor, $stmentor_id);
        }

        $prog_status = $this->input->post('stprog_status');
        if($prog_status==1) {
            $datas = [
                'st_statuscli' => 2,
            ];

            $this->stprog->updateStudentsStatus($datas, $st_num);
        }

        $data = [
            'lead_id' => $this->input->post('lead_id'),
            'stprog_lastdisdate' => $this->input->post('stprog_lastdisdate'),
            'stprog_meetingdate' => $this->input->post('stprog_meetingdate'),
            'stprog_meetingnote' => $this->input->post('stprog_meetingnote'),
            'stprog_status' => $this->input->post('stprog_status'),
            'stprog_reason' => $reason,
            'stprog_statusprogdate' => $this->input->post('stprog_statusprogdate'),
            'stprog_runningstatus' => $this->input->post('stprog_runningstatus')
        ];
        
        $this->stprog->update($data, $id);

        $this->session->set_flashdata('success', 'Students program has been changed');
        redirect('/client/students-program/view/'.$id);
    }

    public function delete($id) {
        $this->stprog->delete($id);
        $this->session->set_flashdata('success', 'Students program has been deleted');
        redirect('/client/students-program');
    }
}