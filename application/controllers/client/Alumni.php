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
    }

    public function index(){
        $data['alumni'] = $this->alu->showAll();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/alumni/index', $data);
        $this->load->view('templates/f-io');
    }

    public function add() {
        $data['students'] = $this->std->studentStatus(2);
        $data['university'] = $this->univ->showAll();
        $data['major'] = $this->majors->show();

        $this->form_validation->set_rules('st_id', 'student', 'required|is_unique[tbl_alu.st_id]',
        array('is_unique' => 'Student\'s name already exists'));
        if($this->form_validation->run()==false) {
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-client');
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
                'aludetail_status' => $this->input->post('aludetail_status['.$i.']'),
            ];
            $this->alu->saveDetail($datadetail);
        }

        // echo json_encode($data);
        $this->alu->save($data);
        $this->session->set_flashdata('success', 'Alumni has been created');
        redirect('/client/alumni/');
        
    }
}