<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alumni extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('majors');
        $this->load->model('client/Students_model','std');
        $this->load->model('client/Alumni_model','alu');
        $this->load->model('bizdev/University_model','univ');
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
        $data['alumni'] = $this->alu->showAll();
        $this->load->view('templates/s-io');
        $this->load->view('client/alumni/index', $data);
        $this->load->view('templates/f-io');
    }

    public function add() {
        $data['students'] = $this->std->studentStatusNew();
        $data['university'] = $this->univ->showAll();
        $data['major'] = $this->majors->show();

        $this->form_validation->set_rules('st_id', 'student', 'required|is_unique[tbl_alu.st_id]',
        array('is_unique' => 'Student\'s name already exists'));
        $this->form_validation->set_rules('alu_graduatedate','graduated date', 'required');
        $this->form_validation->set_rules('univ_id[]','univ name', 'required');
        $this->form_validation->set_rules('aludetail_scholarship[]','scholarship', 'required');
        $this->form_validation->set_rules('aludetail_major[]','major', 'required');
        $this->form_validation->set_rules('aludetail_status[]','status', 'required');
        if($this->form_validation->run()==false) {
            $this->load->view('templates/s-io');
            $this->load->view('client/alumni/add-alumni', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->save();
        }
    }

    public function save() {
        $getId = $this->alu->getId();
        $newId = $getId['alu_id']+1;
        $data = [
            'alu_id' => $newId,
            'st_id' => $this->input->post('st_id'),
            'alu_graduatedate' => $this->input->post('alu_graduatedate'),
        ];

        $n = count($this->input->post('univ_id'));
        for($i=0; $i<$n; $i++){
            $datadetail = [
                'alu_id' => $newId,
                'univ_id' => $this->input->post('univ_id['.$i.']'),
                'aludetail_major' => $this->input->post('aludetail_major['.$i.']'),
                'aludetail_scholarship' => $this->input->post('aludetail_scholarship['.$i.']'),
                'aludetail_status' => $this->input->post('aludetail_status['.$i.']'),
            ];
            $this->alu->saveDetail($datadetail);
        }

        // echo json_encode($data);
        $this->alu->save($data);
        $this->session->set_flashdata('success', 'Alumni has been created');
        redirect('/client/alumni/');
    }

    public function view($id) 
    {
        $data['alumni'] = $this->alu->showId($id);
        $data['alumni_detail'] = $this->alu->showDetailId($id);
        $data['university'] = $this->univ->showAll();
        $data['major'] = $this->majors->show();
        
        $this->load->view('templates/s-io');
        $this->load->view('client/alumni/view-alumni', $data);
        $this->load->view('templates/f-io');
    }

    public function view_detail($id){
        $detail = $this->alu->showIdDetail($id);
        echo json_encode($detail);
    }

    public function add_detail($id) {
        $data = [
            'alu_id' => $id,
            'univ_id' => $this->input->post('univ_id'),
            'aludetail_major' => $this->input->post('aludetail_major'),
            'aludetail_status' => $this->input->post('aludetail_status')
        ];

        $this->alu->saveDetail($data);
        $this->session->set_flashdata('success', 'Alumni has been changed');
        redirect('/client/alumni/view/'.$id);
    }

    public function update_detail($id) {
        $aludetail_id = $this->input->post('aludetail_id');
        $data = [
            'univ_id' => $this->input->post('univ_id'),
            'aludetail_major' => $this->input->post('aludetail_major'),
            'aludetail_status' => $this->input->post('aludetail_status'),
        ];

        $this->alu->updateDetail($data, $aludetail_id);
        $this->session->set_flashdata('success', 'Alumni has been changed');
        redirect('/client/alumni/view/'.$id);
    }

    public function delete_detail($aludetail_id, $id) {
        $this->alu->deleteDetail($aludetail_id);
        $this->session->set_flashdata('success', 'Alumni has been deleted');
        redirect('/client/alumni/view/'.$id);
    }
}