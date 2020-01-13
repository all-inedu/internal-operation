<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editor extends CI_Controller
{
    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/editor/index.php');
        $this->load->view('templates/f-io');
    }

    public function add(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/editor/add-editor.php');
        $this->load->view('templates/f-io');
    }

    public function view(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/editor/view-editor.php');
        $this->load->view('templates/f-io');
    }

    public function edit(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/editor/edit-editor.php');
        $this->load->view('templates/f-io');
    }
}
?>