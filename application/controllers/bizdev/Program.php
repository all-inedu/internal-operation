<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('client/Program_model','program');
    }

    public function index(){
        $data['mainProgram'] = ['Encrihment Program','Experiential Learning', 'Standardized Test',  'University & Schoolarship'];
        $data['subEP'] = ['Academic Writing','Business and Management Tutoring','English IB',
        'University Application Boot Camp','Workshop'];
        $data['subEL'] = ['Fieldtrip','Internships & Volunteering','Left Brain Meets Right Brain','Science','Social Science'];
        $data['subST'] = ['ACT','SAT'];
        $data['subUS'] = ['Admission Consulting','Essay Guidance','Interview Preparation'];
        $data['typeProg'] = ['B2B','B2B/B2C','B2C'];
        $data['subProgram'] = array_merge($data['subEP'], $data['subEL'],  $data['subST'],  $data['subUS']);
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