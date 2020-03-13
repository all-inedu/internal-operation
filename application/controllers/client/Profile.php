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
        $this->load->model('client/StDetail_model','stdetail');
        $this->load->model('client/Parents_model','prt');
        $this->load->model('client/StProgram_model','stprog');
        $this->load->model('client/Program_model','prog');
        $this->load->model('client/Lead_model','lead');
    }

    public function student($id){
        $data['s'] = $this->std->showId($id);
        $st_id = $data['s']['st_id'];
        $data['stdetail'] = $this->stdetail->showId($st_id);
        $data['badge'] = ["badge-dark","badge-primary","badge-info","badge-success","badge-danger","badge-warning","badge-secondary"];
        $data['lead'] = $this->lead->showAll();
        $data['program'] = $this->prog->showB2C();
        $data['stprog'] = $this->stprog->showStProg($id);
        
        if($data['s']) {
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-client');
            $this->load->view('client/profile/student-profile', $data);
            $this->load->view('templates/f-io'); 
        } else {
            $this->session->set_flashdata('warning', 'Students profile ID is not found');
            redirect('/client/student/');
        }
    }


    public function uploaded($file, $path, $id){
        $config['upload_path']          = './upload/student/'.$path;
        $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|docx|doc';
        $config['max_size']             = 150048;
        $config['file_name']            = strtolower($path."-".$id);

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload($file))
        {
            return htmlspecialchars($this->upload->data('file_name'));
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect('/client/profile/edit/'.$id);
        }
    }

    public function edit($id){
        $data['s'] = $this->std->showId($id);
        $st_id = $data['s']['st_id'];
        $data['stdetail'] = $this->stdetail->showId($st_id);        
        $data['prt'] = $this->prt->showAll();
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
        $pr_id = $this->input->post('pr_id');
        if($pr_id=='0') {
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
        if($sch_id=='0') {
            $getId = $this->sch->getId();   
            if($getId->num_rows() <> 0){        
                $dataId = $getId->row();      
                $ids = intval($dataId->kode) + 1;    
            } else { 
                $ids = 1;    
            }
            $idmax = str_pad($ids, 4, "0", STR_PAD_LEFT); 
            $newid = "SCH-".$idmax;

            $school_data = [
                'sch_id' => $newid,
                'sch_name' => $this->input->post('sch_name'),
                'sch_level' => $this->input->post('st_currentsch'),
            ];
            $this->sch->save($school_data);
        } else {
            $newid = $sch_id;
        }
        
        $data = [
            'st_firstname' => $this->input->post('st_firstname'),
            'st_lastname' => $this->input->post('st_lastname'),
            'st_mail' => $this->input->post('st_mail'),
            'st_phone' => $this->input->post('st_phone'),
            'st_insta' => $this->input->post('st_insta'),
            'st_state' => $this->input->post('st_state'),
            'st_address' => $this->input->post('st_address'),
            'pr_id' => $newprid,
            'sch_id' => $newid,
            'st_currentsch' => $this->input->post('st_currentsch'),
            'st_grade' => $this->input->post('st_grade'),
            'lead_id' => $this->input->post('lead_id'),
            'st_levelinterest' => $this->input->post('st_levelinterest'),
            'prog_id' => implode(", ", $this->input->post('prog_id[]')),
            'st_abryear' => $this->input->post('st_abryear'),
            'st_abrcountry' => implode(", ", $this->input->post('st_abrcountry[]')),
            'st_abruniv' => implode(", ", $this->input->post('st_abruniv[]')),
            'st_abrmajor' => implode(", ", $this->input->post('st_abrmajor[]')),
            'st_datelastedit' => date('Y-m-d H:i:s'),
        ];

       
        // Student Detail 
        $std =  $this->std->showId($id);
        if($std['st_statuscli']==2) {
            $st_id = $std['st_id'];
            
            $files1 = $_FILES['att_photo']['name'];
            $files2 = $_FILES['att_cv']['name'];
            $files3 = $_FILES['att_trans']['name'];
            $files4 = $_FILES['att_questioneer']['name'];
            $files5 = $_FILES['att_other']['name'];

            $check = $this->stdetail->showId($st_id);
            
            if(!$check) {
                if(empty($files1)){$photo = "";} else {$photo = $this->uploaded('att_photo', 'photo', $id);}
                if(empty($files2)){$cv = "";} else {$cv = $this->uploaded('att_cv', 'cv', $id);}
                if(empty($files3)){$trans = "";} else {$trans = $this->uploaded('att_trans', 'transcript', $id);}
                if(empty($files4)){$questioneer = "";} else {$questioneer = $this->uploaded('att_questioneer', 'questionnaire', $id);}
                if(empty($files5)){$other = "";} else {$other = $this->uploaded('att_other', 'other', $id);}

                $detailData = [
                    'st_id' => $std['st_id'],
                    'att_persbrand' => $this->input->post('att_persbrand'),
                    'att_interest' => $this->input->post('att_interest'),
                    'att_person' => $this->input->post('att_person'),
                    'att_photo' => $photo,
                    'att_cv' => $cv,
                    'att_trans' => $trans,
                    'att_questioneer' => $questioneer,
                    'att_other' => $other
                ];

                $this->stdetail->save($detailData);

            } else {
                $old_photo = $check['att_photo'];
                $old_cv = $check['att_cv'];
                $old_trans = $check['att_trans'];
                $old_questioneer = $check['att_questioneer'];
                $old_other = $check['att_other'];

                if(empty($files1)){
                    $photo = $old_photo;
                } else {
                    if(! $old_photo==""){
                        unlink("./upload/student/photo/".$old_photo);
                    }
                    $photo = $this->uploaded('att_photo', 'photo', $id);
                }

                if(empty($files2)){
                    $cv = $old_cv;
                } else {
                    if(! $old_cv==""){
                        unlink("./upload/student/cv/".$old_cv);
                    }
                    $cv = $this->uploaded('att_cv', 'cv', $id);
                }

                if(empty($files3)){
                    $trans = $old_trans;
                } else {
                    if(! $old_trans==""){
                        unlink("./upload/student/trans/".$old_trans);
                    }
                    $trans = $this->uploaded('att_trans', 'transcript', $id);
                }

                if(empty($files4)){
                    $questioneer = $old_questioneer;
                } else {
                    if(! $old_questioneer==""){
                        unlink("./upload/student/questionnaire/".$old_questioneer);
                    }
                    $questioneer = $this->uploaded('att_questioneer', 'questionnaire', $id);
                }

                if(empty($files5)){
                    $other = $old_other;
                } else {
                    if(! $old_other==""){
                        unlink("./upload/student/other/".$old_other);
                    }
                    $other = $this->uploaded('att_other', 'other', $id);
                }

                $detailData = [
                    'att_persbrand' => $this->input->post('att_persbrand'),
                    'att_interest' => $this->input->post('att_interest'),
                    'att_person' => $this->input->post('att_person'),
                    'att_photo' => $photo,
                    'att_cv' => $cv,
                    'att_trans' => $trans,
                    'att_questioneer' => $questioneer,
                    'att_other' => $other
                ];

                $this->stdetail->update($detailData, $st_id);
            }
        }
        // End Student Detail 
        
        $this->std->update($data, $id);
        $this->session->set_flashdata('success', 'Students profile has been changed');
        redirect('/client/profile/student/'.$id);
    }

}