<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('countries');
        $this->load->library('majors');
        $this->load->model('bizdev/School_model','sch');
        $this->load->model('client/Lead_model','lead');
    }

    public function countries() {
        echo json_encode($this->countries->show());
    }

    public function major() {
        echo json_encode($this->majors->show());
    }

    public function school() {
        echo json_encode($this->sch->showAll());
    }

    public function lead() {
        echo json_encode($this->lead->showAll());
    }

}