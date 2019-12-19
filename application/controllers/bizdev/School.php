<?php
defined('BASEPATH') or exit('No direct script access allowed');

class School extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/school/index');
        $this->load->view('templates/f-io');
    }

    public function add(){
    
        $this->form_validation->set_rules('schoolName', 'school name', 'required');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/school/add-school');
        $this->load->view('templates/f-io');
        } else {
            $countTeacher = count($this->input->post('teacherName[]'));
            
            for($i=0;$i<$countTeacher;$i++){
                $teacherName = $this->input->post('teacherName[]')[$i];
                $teacherEmail = $this->input->post('teacherEmail[]')[$i];
                $teacherLinkedin = $this->input->post('teacherLinkedin[]')[$i];
                $teacherPhone = $this->input->post('teacherPhone[]')[$i];

                echo $teacherName."-".$teacherEmail."-".$teacherLinkedin."-".$teacherPhone."<br>";
            }

        }
    }

    public function view(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/school/view-school');
        $this->load->view('templates/f-io'); 
    }

    public function edit(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/school/edit-school');
        $this->load->view('templates/f-io'); 
    }
    
}