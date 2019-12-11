<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prospective extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-client');
        $this->load->view('templates/s-client');
        $this->load->view('client/prospective/index');
        $this->load->view('templates/f-client');
    }

    public function add($role=''){
        if($role=='student' or $role==''){
            $this->form_validation->set_rules('firstName', 'first name', 'required');
            // $this->form_validation->set_rules('email', 'email', 'required');
            // $this->form_validation->set_rules('phoneNumber', 'phone number', 'required');
            // $this->form_validation->set_rules('state', 'state', 'required');
            // $this->form_validation->set_rules('address', 'address', 'required');
            // $this->form_validation->set_rules('schoolName', 'school name', 'required');
            // $this->form_validation->set_rules('currentEducation', 'current education', 'required', array('required' => 'This field is required.'));
            // $this->form_validation->set_rules('grade', 'grade', 'required', 
            // array('required' => 'This field is required.'));
            // $this->form_validation->set_rules('leadSource', 'lead source', 'required');
            // $this->form_validation->set_rules('levelInterest', 'level interest', 'required');
            // $this->form_validation->set_rules('interestedProgram', 'interested program', 'required');
            // $this->form_validation->set_rules('univDestination', 'univ destination', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/h-client');
                $this->load->view('templates/s-client');
                $this->load->view('client/prospective/add-prospective');
                $this->load->view('templates/f-client');

            } else {
                
                $this->_addStudent();
            }

        } else if ($role=='parent'){
            $this->load->view('templates/h-client');
            $this->load->view('templates/s-client');
            $this->load->view('client/prospective/add-parent');
            $this->load->view('templates/f-client');

        } else {
            redirect('/client/prospective');
        }
    }

    private function _addStudent() {
        $firstName = $this->input->post('firstName');
        $lastName = $this->input->post('lastName');
        $email = $this->input->post('email');
        $state = $this->input->post('state');
        $postalCode = $this->input->post('postalCode');
        $address = $this->input->post('address');
        $schoolName = $this->input->post('schoolName');
        $currentEducation = $this->input->post('currentEducation');
        $grade = $this->input->post('grade');
        $levelInterest = $this->input->post('levelInterest');
        $interestedProgram = $this->input->post('interestedProgram[]');
        $countryStudy = $this->input->post('countryStudy[]');
        $univDestination = $this->input->post('univDestination[]');
        $major = $this->input->post('major[]');

        $data = [
            'st_fn' => $firstName,
            'st_ln' => $lastName,
            'st_email' => $email,
            'st_state' => $state,
            'st_address' => $address.'<br>'.$postalCode,
            'st_sch' => $schoolName,
            'st_current' => $currentEducation,
            'st_grade' => $grade,
            'st_level_interest' => $levelInterest,
            'st_interested_program' => $interestedProgram,
            'st_country' => $countryStudy,
            'st_univ_destination' => $univDestination,
            'st_major' => $major,
        ];


        var_dump($data);
        // $this->session->set_flashdata('success', 'Prospective client has been created');
        // redirect('/client/prospective/');
    }

    private function _addParent() {

    }

    public function view() {
        $data['badge'] = ["badge-dark","badge-primary","badge-info","badge-success","badge-danger","badge-warning","badge-secondary"];
        $data['prog'] = ["Admission Consulting","SAT Preparation","Experiential Learning"];
        $data['country'] = ["US","UK","Singapore"];
        $data['univ'] = ["Harvard","NTU","NUS","University of California"];
        $data['major'] = ["Computer Science","Business Management","Communication","Health Professions","Engineering","Human Service"];

        $this->load->view('templates/h-client');
        $this->load->view('templates/s-client');
        $this->load->view('client/prospective/view-prospective', $data);
        $this->load->view('templates/f-client');
    }

    

}