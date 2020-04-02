<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Programs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('programdata');
        $this->load->model('client/Program_model','program');
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
        $data = $this->programdata->show();
        $data['program'] = $this->program->showAll();
        $this->load->view('templates/s-io');
        $this->load->view('client/programs/index', $data);
        $this->load->view('templates/f-io');
    }

    public function save(){
        $this->form_validation->set_rules('prog_id','program id', 'required|is_unique[tbl_prog.prog_id]',
        array('is_unique' => 'Program ID already created'));
        $this->form_validation->set_rules('prog_type', 'type program', 'required|trim');
        $this->form_validation->set_rules('prog_main', 'main program', 'required|trim');
        $this->form_validation->set_rules('prog_sub', 'sub program', 'required|trim');
        $this->form_validation->set_rules('prog_program', 'program name', 'required|trim');
        $this->form_validation->set_rules('prog_mentor', 'need mentor', 'required|trim');
        $this->form_validation->set_rules('prog_payment', 'payment', 'required|trim');

        if($this->form_validation->run()==FALSE){
            $this->index();
        } else {
            $data = [
                'prog_id' => $this->input->post('prog_id'),
                'prog_main' => $this->input->post('prog_main'),
                'prog_sub' => $this->input->post('prog_sub'),
                'prog_program' => $this->input->post('prog_program'),
                'prog_type' => $this->input->post('prog_type'),
                'prog_mentor' => $this->input->post('prog_mentor'),
                'prog_payment' => $this->input->post('prog_payment')
            ];

            $this->program->save($data);
            $this->session->set_flashdata('success', 'Program has been created');
            redirect('/client/programs/');
        }
    }

    public function view($id) {
        $data = $this->program->showId($id);
        echo json_encode($data);
    }

    public function update() {
        $this->form_validation->set_rules('prog_type', 'type program', 'required|trim');
        $this->form_validation->set_rules('prog_main', 'main program', 'required|trim');
        $this->form_validation->set_rules('prog_sub', 'sub program', 'required|trim');
        $this->form_validation->set_rules('prog_program', 'program name', 'required|trim');
        $this->form_validation->set_rules('prog_mentor', 'need mentor', 'required|trim');
        $this->form_validation->set_rules('prog_payment', 'payment', 'required|trim');

        if($this->form_validation->run()==FALSE){
            $this->index();
        } else {
            $id = $this->input->post('prog_id');
            $data = [
                'prog_main' => $this->input->post('prog_main'),
                'prog_sub' => $this->input->post('prog_sub'),
                'prog_program' => $this->input->post('prog_program'),
                'prog_type' => $this->input->post('prog_type'),
                'prog_mentor' => $this->input->post('prog_mentor'),
                'prog_payment' => $this->input->post('prog_payment')
            ];
            // var_dump($data);
            $this->program->update($data, $id);
            $this->session->set_flashdata('success', 'Program has been changed');
            redirect('/client/programs/');

        }
    }

    public function delete($id){
        $this->program->delete($id);
        $this->session->set_flashdata('success', 'Program has been deleted');
        redirect('/client/programs/');
    }

    public function multi_delete() {
        $this->form_validation->set_rules('choose[]', '', 'required');
        if($this->form_validation->run()==FALSE){
            redirect('/client/programs/');
        } else {
            $check = $this->input->post('choose[]');
            $n = count($check);
            for($i=0; $i<$n; $i++) {
                $this->program->delete($check[$i]);
            }
        }
        $this->session->set_flashdata('success', 'Program has been deleted');
        redirect('/client/programs/');
    }
}