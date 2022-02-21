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
        $this->load->model('client/FollowUp_model','flw');
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
        $data['program'] = $this->prog->showB2C();
        $data['status'] = '';
        // echo json_encode($data['stprog']);
        $this->load->view('templates/s-io');
        $this->load->view('client/client-program/index', $data);
        $this->load->view('templates/f-io');
    }

    public function view($id){
        $data['stprog'] = $this->stprog->showId($id);
        $data['flw'] = $this->flw->showFollowUpByStprogId($id);
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

        // Follow up 
        $stprog_data = $this->stprog->showId($id);
        $followup = $stprog_data['stprog_followupdate'];
        $followup_post = $this->input->post('stprog_followupdate');
        if(($followup_post!="")and($followup_post!=$followup)){
            $followup_data = [
                'stprog_id' => $id,
                'flw_date' => $this->input->post('stprog_followupdate'),
                'flw_mark' => '0'
            ];
            $this->flw->save($followup_data);
        }

        // Reason 
        if($this->input->post('reason_id')) {
            if($this->input->post('reason_id')=="add") {
                $reasons = $this->reason->getId();
                $reason = $reasons['reason_id'] + 1;

                $reason_data = [
                    'reason_id' => $reason,
                    'reason_name' => $this->input->post('new_reason')
                ];

                $this->reason->save($reason_data);
            } else {
                $reason = $this->input->post('reason_id');
            }
        } else {
            $reason = "";
        }

        // Mentorship 
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

        // Status of Client 
        $prog_status = $this->input->post('stprog_status');
        $pending = count($this->stprog->showStatusProgram($st_num, 0, $id));
        $success = count($this->stprog->showStatusProgram($st_num, 1, $id));
        $failed = count($this->stprog->showStatusProgram($st_num, 2, $id));

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

        } else if($prog_status==0) {  // jika statusnya pending
            if($success > 0) {
                $status_cli = 2;
            } else {
                $status_cli = 1;
            }
            $datas = ['st_statuscli' => $status_cli];            
            $this->stprog->updateStudentsStatus($datas, $st_num);
        } else if($prog_status==2) { // jika statusnya gagal
            if($success > 0) {
                $status_cli = 2;
            } else if($pending > 0){
                $status_cli = 1;
            } else {
                $status_cli = 0;
            }
            $datas = ['st_statuscli' => $status_cli];            
            $this->stprog->updateStudentsStatus($datas, $st_num);
        } else if(($prog_status==1)) { // jika statusnya berhasil
            if(($pending > 0) or ($failed > 0)) {
                $status_cli = 2;
            } 
            $datas = ['st_statuscli' => $status_cli];
            $this->stprog->updateStudentsStatus($datas, $st_num);
        }


        // check start date && end date 
        if($this->input->post('stprog_start_date') && $this->input->post('stprog_end_date')) {
            $start_date =  date('Y-m-d',strtotime($this->input->post('stprog_start_date')));
            $end_date =  date('Y-m-d',strtotime($this->input->post('stprog_end_date')));
        } else if($this->input->post('stprog_end_date')) {
            $start_date = date('Y-m-d');
            $end_date =  date('Y-m-d',strtotime($this->input->post('stprog_end_date')));
        } else {
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d');
        }

        // echo $start_date.''.$end_date;
        // exit;

        // Data from Form Input 
        $data = [
            'lead_id' => $this->input->post('lead_id'),
            'stprog_firstdisdate' => $this->input->post('stprog_firstdisdate'),
            'stprog_followupdate' => $this->input->post('stprog_followupdate'),
            'stprog_meetingnote' => $this->input->post('stprog_meetingnote'),
            'stprog_status' => $this->input->post('stprog_status'),
            'reason_id' => $reason,
            'stprog_statusprogdate' => $this->input->post('stprog_statusprogdate'),
            'stprog_runningstatus' => $this->input->post('stprog_runningstatus'),
            'stprog_init_consult' => $this->input->post('stprog_init_consult'),
            'stprog_ass_sent' => $this->input->post('stprog_ass_sent'),
            // SAT 
            'stprog_test_date'  => $this->input->post('stprog_test_date'),
            'stprog_last_class'  => $this->input->post('stprog_last_class'),
            'stprog_diag_score'  => $this->input->post('stprog_diag_score'),
            'stprog_test_score'  => $this->input->post('stprog_test_score'),
            // Tutoring 
            'stprog_price_from_tutor'  => $this->input->post('stprog_price_from_tutor'),
            'stprog_our_price_tutor'  => $this->input->post('stprog_our_price_tutor'),
            'stprog_total_price_tutor'  => $this->input->post('stprog_total_price_tutor'),
            'stprog_duration'  => $this->input->post('stprog_duration'),
            // Admissions 
            'stprog_tot_uni'  => $this->input->post('stprog_tot_uni'),
            'stprog_tot_dollar'  => $this->input->post('stprog_tot_dollar'),
            'stprog_kurs'  => $this->input->post('stprog_kurs'),
            'stprog_tot_idr'  => $this->input->post('stprog_tot_idr'),
            'stprog_install_plan'  => $this->input->post('stprog_install_plan'),
            // Start Date 
            'stprog_start_date' => date('Y-m-d', strtotime($start_date)),
            'stprog_end_date' => date('Y-m-d', strtotime($end_date)),

            'empl_id' => $this->input->post('empl_id')
        ];
        
        $this->stprog->update($data, $id);

        $done = count($this->stprog->showStatusRunning($st_num, 2));
        $tot_stprog = ($stprog - $failed);
        if($tot_stprog==$done) {
            $datas = [
                'st_statuscli' => 3,
            ];
        
            $this->stprog->updateStudentsStatus($datas, $st_num);  
        }

        $this->session->set_flashdata('success', 'Students program has been changed');
        redirect('/client/student/view/'.$st_num);
        // redirect('/client/students-program/view/'.$id);
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
            $current = $this->stprog->showStatusProgram($st_num, 1, $id);
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
        redirect('/client/student/view/'.$st_num);
    }

    public function report() {
        $data['program'] = $this->prog->showB2C();
        
        $this->form_validation->set_rules('month', 'Month', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('prog_id', 'Program', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == False)
        {
            $data['m']='';
            $data['y']='';
            $data['p']='all';
            $data['s']='';
            $data['stprog'] = '';
            $this->load->view('templates/s-io');
            $this->load->view('client/client-program/report/index', $data);
            $this->load->view('templates/f-io');
        }
            else
        {
            $p = $this->input->post('prog_id');
            if($p=="all") {
                $prog = '';
            } else {
                $prog = $p;
            }
            $data['m']= $this->input->post('month');
            $data['y']= $this->input->post('year');
            $data['p']= $this->input->post('prog_id');
            $data['s']= $this->input->post('status');
            $data['stprog'] = $this->stprog->showAllByDateProgramStatus($data['m'], $data['y'], $prog, $data['s']);
            $this->load->view('templates/s-io');
            $this->load->view('client/client-program/report/index', $data);
            $this->load->view('templates/f-io');
        }
    }
}