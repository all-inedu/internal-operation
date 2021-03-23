<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('client/Students_model','std');
        $this->load->model('client/StProgram_model','stprog');
        $this->load->model('client/Program_model','prog');
        $this->load->model('client/Lead_model','lead');
        $this->load->model('client/Reason_model','reason');
        $this->load->model('hr/Mentor_model','mt');
        $this->load->model('hr/Employee_model','empl');
        $this->load->model('finance/Invoice_model','inv');
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

    public function program($p="",$s=""){
        $m = date('m');
        $y = date('Y');
        $data['program'] = $this->prog->showB2C();
        $data['status'] = $s;
        if($p=="all") {
            $data['stprog'] = $this->stprog->showAllByDate($m, $y);
        } 
        else if($p=="admissions") {
            $p = "Admissions Consulting";
            $data['stprog'] = $this->stprog->showAllByProgSub($m, $y, $p);
        }
        else if($p=="career") {
            $p = "Career Exploration";
            $data['stprog'] = $this->stprog->showAllByProgMain($m, $y, $p);
        }
        else if($p=="sat") {
            $p = "SAT";
            $data['stprog'] = $this->stprog->showAllByProgSub($m, $y, $p);
        }
        else if($p=="writing") {
            $p = "Writing Course";
            $data['stprog'] = $this->stprog->showAllByProgSub($m, $y, $p);
        }
        
        $this->load->view('templates/s-io');
        $this->load->view('client/dashboard/page-programs.php', $data);
        $this->load->view('templates/f-io');
    }
}