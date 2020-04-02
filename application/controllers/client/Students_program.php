<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students_program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('client/Students_model','std');
        $this->load->model('client/StProgram_model','stprog');
        $this->load->model('client/Program_model','prog');
        $this->load->model('client/Lead_model','lead');
        $this->load->model('client/Reason_model','reason');
        $this->load->model('hr/Mentor_model','mt');
        $this->load->model('hr/Employee_model','empl');
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
        $data['stprog'] = $this->stprog->showAll();
        // echo json_encode($data['stprog']);
        $this->load->view('templates/s-io');
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
        $data['empl'] = $this->empl->showActive();
        $data['reason'] = $this->reason->showAll();

        $this->form_validation->set_rules('lead_id', 'lead source', 'required');
        if ($this->form_validation->run() == false) {
        $this->load->view('templates/s-io');
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
        $stprog = count($this->stprog->showStProg($st_num));
        
        if(empty($mt_id2)){
            $mt_id2 = "" ;
        } else {
            $mt_id2 = $this->input->post('mt_id2');
        }

        if($this->input->post('reason_id')) {
            if($this->input->post('reason_id')=="add") {
                $reasons = $this->reason->getId();
                $reason = $reasons['reason_id'] + 1;

                $reason_data = [
                    'reason_id' => $reason_id,
                    'reason_name' => $this->input->post('new_reason')
                ];

                $this->reason->save($reason_data);
            } else {
                $reason = $this->input->post('reason_id');
            }
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
            // Kode Baru 
            $query = $this->std->getId();  
            if($query->num_rows() <> 0){           
                $dataSt = $query->row();      
                $idSt = intval($dataSt->kode) + 1;    
            } else {          
                $idSt = 1;    
            }
            $idmax = str_pad($idSt, 4, "0", STR_PAD_LEFT); 
            $newid = "ST-".$idmax;

            $std = $this->std->showId($st_num);

            if(empty($std['st_id'])) {
                $datas = [
                    'st_id' => $newid,
                    'st_statuscli' => 2,
                ];
            } else {
                $datas = [
                    'st_statuscli' => 2,
                ];
            }    
            $this->stprog->updateStudentsStatus($datas, $st_num);
        }

        $pending = count($this->stprog->showStatusProgram($st_num, 0));
        $failed = count($this->stprog->showStatusProgram($st_num, 2));
        if(($stprog==$pending)OR($stprog==$failed)) {
            $datas = [
                'st_statuscli' => 1,
            ];
            $this->stprog->updateStudentsStatus($datas, $st_num);
        }

        $data = [
            'lead_id' => $this->input->post('lead_id'),
            'stprog_lastdisdate' => $this->input->post('stprog_lastdisdate'),
            'stprog_meetingdate' => $this->input->post('stprog_meetingdate'),
            'stprog_meetingnote' => $this->input->post('stprog_meetingnote'),
            'stprog_status' => $this->input->post('stprog_status'),
            'reason_id' => $reason,
            'stprog_statusprogdate' => $this->input->post('stprog_statusprogdate'),
            'stprog_runningstatus' => $this->input->post('stprog_runningstatus'),
            'empl_id' => $this->input->post('empl_id')
        ];
        
        $this->stprog->update($data, $id);

        $done = count($this->stprog->showStatusRunning($st_num, 2));

        if($stprog==$done) {
            $datas = [
                'st_statuscli' => 3,
            ];
        
            $this->stprog->updateStudentsStatus($datas, $st_num);  
        }

        $this->session->set_flashdata('success', 'Students program has been changed');
        redirect('/client/students-program/view/'.$id);
    }

    public function delete($id) { 
        $stprog = $this->stprog->showId($id);
        $st_num = $stprog['st_num'];
        $stprog_num = count($this->stprog->showStProg($st_num));
        $this->stprog->delete($id);
        
        if($stprog_num==0) {
            $datas = [
                'st_statuscli' => 0,
            ];
        } else {
            $current = $this->stprog->showStatusProgram($st_num, 1);
            if($current) {
                $datas = [
                    'st_statuscli' => 2,
                ];
            } else {
                $datas = [
                    'st_statuscli' => 1,
                ];
            }
        }
        
        $this->stprog->updateStudentsStatus($datas, $st_num);
        $this->session->set_flashdata('success', 'Students program has been deleted');
        redirect('/client/students-program');
    }
}