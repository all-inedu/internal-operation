<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('programdata');
        $this->load->model('client/Program_model','program');
    }

    public function index(){
        $data = $this->programdata->show();
        $data['program'] = $this->program->showAll();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/program/index', $data);
        $this->load->view('templates/f-io');
    }

    public function save(){
        $this->form_validation->set_rules('prog_id','Program ID', 'required|is_unique[tbl_prog.prog_id]',
        array('is_unique' => 'Program ID already created'));

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
                'prog_payment' => $this->input->post('prog_payment'),
            ];

            $this->program->save($data);
            $this->session->set_flashdata('success', 'Program has been created');
            redirect('/bizdev/program/');

        }
    }

    public function view($id) {
        $data = $this->program->showId($id);
        echo json_encode($data);
    }

    public function update() {
        $id = $this->input->post('prog_id');
        $data = [
            'prog_main' => $this->input->post('prog_main'),
            'prog_sub' => $this->input->post('prog_sub'),
            'prog_program' => $this->input->post('prog_program'),
            'prog_type' => $this->input->post('prog_type'),
            'prog_mentor' => $this->input->post('prog_mentor'),
            'prog_payment' => $this->input->post('prog_payment'),
        ];
        // var_dump($data);
        $this->program->update($data, $id);
        $this->session->set_flashdata('success', 'Program has been changed');
        redirect('/bizdev/program/');
    }

    public function delete($id){
        $this->program->delete($id);
        $this->session->set_flashdata('success', 'Program has been deleted');
        redirect('/bizdev/program/');
    }
}