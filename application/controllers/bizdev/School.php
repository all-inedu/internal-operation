<?php
defined('BASEPATH') or exit('No direct script access allowed');

class School extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('schooldata');
        $this->load->model('bizdev/School_model','sch');
        $this->load->model('bizdev/SProgram_model','sprog');
        $this->load->model('client/Program_model','prog');
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
        $data['sch'] = $this->sch->showAll();
        $this->load->view('templates/s-io');
        $this->load->view('bizdev/school/index', $data);
        $this->load->view('templates/f-io');
    }

    public function add(){
    
        $this->form_validation->set_rules('sch_name', 'school name', 'required');
        $this->form_validation->set_rules('schdetail_fullname[]', 'full name', 'required');

        if ($this->form_validation->run() == false) {
        $data = $this->schooldata->show();
        $this->load->view('templates/s-io');
        $this->load->view('bizdev/school/add-school', $data);
        $this->load->view('templates/f-io');
        } else {
            $this->save();
        }
    }

    public function save() {
        $query = $this->sch->getId();   
		if($query->num_rows() <> 0){        
            $data = $query->row();      
            $id = intval($data->kode) + 1;    
		} else { 
		    $id = 1;    
		}
        $idmax = str_pad($id, 4, "0", STR_PAD_LEFT); 
        $newid = "SCH-".$idmax;

        $data = [
            'sch_id' => $newid,
            'sch_name' => $this->input->post('sch_name'),
            'sch_type' => $this->input->post('sch_type'),
            'sch_level' => $this->input->post('sch_level'),
            'sch_curriculum' => $this->input->post('sch_curriculum'),
            'sch_insta' => $this->input->post('sch_insta'),
            'sch_city' => $this->input->post('sch_city'),
            'sch_location' => $this->input->post('sch_location'),
            'sch_mail' => $this->input->post('sch_mail'),
            'sch_phone' => $this->input->post('sch_phone'),
            'sch_lastupdate' => date('Y-m-d H:i:s')
        ];

        $n = count($this->input->post('schdetail_fullname[]'));
        for($i=0; $i<$n; $i++) {
            $datas = [
                'sch_id' => $newid,
                'schdetail_fullname' => $this->input->post('schdetail_fullname['.$i.']'),
                'schdetail_email' => $this->input->post('schdetail_email['.$i.']'),
                'schdetail_linkedin' => $this->input->post('schdetail_linkedin['.$i.']'),
                'schdetail_position' => $this->input->post('schdetail_position['.$i.']'),
                'schdetail_phone' => $this->input->post('schdetail_phone['.$i.']'),
            ];  
            $this->sch->saveDetail($datas);
        }

        $this->sch->save($data);
        $this->session->set_flashdata('success', 'School has been created');
        redirect('/bizdev/school/view/'.$newid);
        
    }

    public function view($id){
        $data['sch'] = $this->sch->showId($id);
        $data['sch_detail'] = $this->sch->showDetail($id);
        $data['program'] = $this->prog->showB2B();
        $data['sprog'] = $this->sprog->showId($id);
        $data['empl'] = $this->empl->showActive();
        $this->load->view('templates/s-io');
        $this->load->view('bizdev/school/view-school', $data);
        $this->load->view('templates/f-io'); 
    }

    public function edit($id){
        $this->form_validation->set_rules('sch_name', 'school name', 'required');
        if ($this->form_validation->run() == false) {
            $data = $this->schooldata->show();
            $data['sch'] = $this->sch->showId($id);
            $data['sch_detail'] = $this->sch->showDetail($id);

            $this->load->view('templates/s-io');
            $this->load->view('bizdev/school/edit-school', $data);
            $this->load->view('templates/f-io'); 
        } else {
            $this->update();
        }
    }

    public function update() {
        $id = $this->input->post('sch_id');
        $data = [
            'sch_name' => $this->input->post('sch_name'),
            'sch_type' => $this->input->post('sch_type'),
            'sch_level' => $this->input->post('sch_level'),
            'sch_curriculum' => $this->input->post('sch_curriculum'),
            'sch_insta' => $this->input->post('sch_insta'),
            'sch_city' => $this->input->post('sch_city'),
            'sch_location' => $this->input->post('sch_location'),
            'sch_mail' => $this->input->post('sch_mail'),
            'sch_phone' => $this->input->post('sch_phone'),
            'sch_lastupdate' => date('Y-m-d H:i:s')
        ];
        $this->sch->update($data, $id);
        $this->session->set_flashdata('success', 'School has been changed');
        redirect('/bizdev/school/view/'.$id);
    }

    public function delete($id) {
        $this->sch->delete($id);
        $this->session->set_flashdata('success', 'School has been deleted');
        redirect('/bizdev/school/');
    }

    public function saveDetail() {
        $id = $this->input->post('sch_id');
        $data = [
            'sch_id' => $id,
            'schdetail_fullname' => $this->input->post('schdetail_fullname'),
            'schdetail_email' => $this->input->post('schdetail_email'),
            'schdetail_linkedin' => $this->input->post('schdetail_linkedin'),
            'schdetail_position' => $this->input->post('schdetail_position'),
            'schdetail_phone' => $this->input->post('schdetail_phone'),
        ];  
        $this->sch->saveDetail($data);
        $this->session->set_flashdata('success', 'Teachers contact has been created');
        redirect('/bizdev/school/edit/'.$id);
    }

    public function showDetailId($id) {
        $data = $this->sch->showDetailId($id);
        echo json_encode($data);
    }

    public function updateDetail() {
        $id = $this->input->post('sch_id');
        $idDetail = $this->input->post('schdetail_id');
        $data = [
            'sch_id' => $id,
            'schdetail_fullname' => $this->input->post('schdetail_fullname'),
            'schdetail_email' => $this->input->post('schdetail_email'),
            'schdetail_linkedin' => $this->input->post('schdetail_linkedin'),
            'schdetail_position' => $this->input->post('schdetail_position'),
            'schdetail_phone' => $this->input->post('schdetail_phone'),
        ];  

        $this->sch->updateDetail($data, $idDetail);
        $this->session->set_flashdata('success', 'Teachers contact has been changed');
        redirect('/bizdev/school/edit/'.$id);
    }

    public function deleteDetail($idDetail, $id) {
        $this->sch->deleteDetail($idDetail);
        $this->session->set_flashdata('success', 'Teachers contact has been deleted');
        redirect('/bizdev/school/edit/'.$id);
    }
    
}