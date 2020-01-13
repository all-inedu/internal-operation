<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Volunteer extends CI_Controller
{
    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/volunteer/index.php');
        $this->load->view('templates/f-io');
    }

    public function add(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/volunteer/add-volunteer.php');
        $this->load->view('templates/f-io');
    }

    public function view(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/volunteer/view-volunteer.php');
        $this->load->view('templates/f-io');
    }

    public function edit(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/volunteer/edit-volunteer.php');
        $this->load->view('templates/f-io');
    }
}
?>