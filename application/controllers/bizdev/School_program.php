<?php
defined('BASEPATH') or exit('No direct script access allowed');

class School_program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('bizdev/SProgram_model','sprog');
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
        $data['sprog'] = $this->sprog->showAll(); 
        $this->load->view('templates/s-io');
        $this->load->view('bizdev/school-program/index', $data);
        $this->load->view('templates/f-io');
    }

    public function save($id) {
        $this->form_validation->set_rules('prog_id', 'program name', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('warning', 'Program name must be filled in');
            redirect('bizdev/school/view/'.$id);
        } else {
            $data = [
                'sch_id' => $id,
                'prog_id' => $this->input->post('prog_id'),
                'empl_id' => $this->input->post('empl_id'),
                'schprog_datefirstdis' => $this->input->post('schprog_datefirstdis'),
                'schprog_datelastdis' => $this->input->post('schprog_datefirstdis'),
                'schprog_status' => 0,
                'schprog_notes' => $this->input->post('schprog_notes'),
            ];
            $this->sprog->save($data);
            $this->session->set_flashdata('success', 'Programs have been added at this school');
            redirect('bizdev/school/view/'.$id);
        }
        
    }

    public function view($id){
        $data['sprog'] = $this->sprog->showSProgId($id);
        $data['pexec'] = $this->sprog->showProgramExec($id);
        $this->load->view('templates/s-io');
        $this->load->view('bizdev/school-program/view-school-program', $data);
        $this->load->view('templates/f-io');
    }

    public function edit($id){
        $this->form_validation->set_rules('schprog_id', 'school program id', 'required');
        if ($this->form_validation->run() == false) {
            $data['sprog'] = $this->sprog->showSProgId($id);
            $data['pexec'] = $this->sprog->showProgramExec($id);
            $data['empl'] = $this->empl->showActive();

            $this->load->view('templates/s-io');
            $this->load->view('bizdev/school-program/edit-school-program', $data);
            $this->load->view('templates/f-io');
        } else { 
            $this->update();
        }
    }

    public function update() {
        $id = $this->input->post('schprog_id');
        $data = [
            'empl_id' => $this->input->post('empl_id'),
            'schprog_datefirstdis' => $this->input->post('schprog_datefirstdis'),
            'schprog_datelastdis' => $this->input->post('schprog_datelastdis'),
            'schprog_status' => $this->input->post('schprog_status'),
            'schprog_notes' => $this->input->post('schprog_notes')
        ];
        $this->sprog->update($data, $id);
        $this->session->set_flashdata('success', 'Schools program data has been changed');
        redirect('/bizdev/school-program/edit/'.$id);
    }

    public function delete($id) {
        $this->sprog->delete($id);
        $this->session->set_flashdata('success', 'Schools program data has been deleted');
        redirect('/bizdev/school-program/');
    }

    public function save_program_execution($id) {
        $this->form_validation->set_rules('schprog_id', 'school program id', 'is_unique[tbl_schprogfix.schprog_id]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('warning', 'You have added the program execution');
            redirect('/bizdev/school-program/edit/'.$id);
        } else {
            $data = [
                'schprog_id' => $id,
                'schprogfix_eventstartdate' => $this->input->post('schprogfix_eventstartdate'),
                'schprogfix_eventenddate' => $this->input->post('schprogfix_eventenddate'),
                'schprogfix_eventplace' => $this->input->post('schprogfix_eventplace'),
                'schprogfix_participantsnum' => $this->input->post('schprogfix_participantsnum'),
                'schprogfix_totalhours' => $this->input->post('schprogfix_totalhours'),
                'schprogfix_status' => $this->input->post('schprogfix_status'),
                'schprogfix_notes' => $this->input->post('schprogfix_notes'),
            ];

            $this->sprog->saveProgramExec($data);
            $this->session->set_flashdata('success', 'Program executions has been created');
            redirect('/bizdev/school-program/edit/'.$id);
        }
    }

    public function update_program_execution($id) {
        $idpexec = $this->input->post('schprogfix_id');
        $data = [
            'schprog_id' => $id,
            'schprogfix_eventstartdate' => $this->input->post('schprogfix_eventstartdate'),
            'schprogfix_eventenddate' => $this->input->post('schprogfix_eventenddate'),
            'schprogfix_eventplace' => $this->input->post('schprogfix_eventplace'),
            'schprogfix_participantsnum' => $this->input->post('schprogfix_participantsnum'),
            'schprogfix_totalhours' => $this->input->post('schprogfix_totalhours'),
            'schprogfix_status' => $this->input->post('schprogfix_status'),
            'schprogfix_notes' => $this->input->post('schprogfix_notes'),
        ];
        $this->sprog->updateProgramExec($data,$idpexec);
        $this->session->set_flashdata('success', 'Program executions has been changed');
        redirect('/bizdev/school-program/edit/'.$id);
    }
    
}