<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mentor extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/mentor/index.php');
        $this->load->view('templates/f-io');
    }

    public function potential($v=''){
        if($v==''){
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-hr');
            $this->load->view('hr/mentor/potential-mentor.php');
            $this->load->view('templates/f-io');
        } else if($v=='add') {
            $this->_addPotential();
        } else if($v=='view') {
            $this->_viewPotential();
        } else if($v=='edit') {
            $this->_editPotential();
        }
    }

    public function _addPotential(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/mentor/add-potential.php');
        $this->load->view('templates/f-io');
    }

    public function _viewPotential(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/mentor/view-potential.php');
        $this->load->view('templates/f-io');
    }

    public function _editPotential(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/mentor/edit-potential.php');
        $this->load->view('templates/f-io');
    }

    public function convertPotential(){
        $this->list();
    }

    public function list(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/mentor/index.php');
        $this->load->view('templates/f-io');
    }

    public function view(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/mentor/view-mentor.php');
        $this->load->view('templates/f-io');
    }

    public function edit(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/mentor/edit-mentor.php');
        $this->load->view('templates/f-io');
    }
    
}