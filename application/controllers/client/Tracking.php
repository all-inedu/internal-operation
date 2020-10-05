<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Menus_model','menu');
        $this->load->model('client/Students_model','std');
        $this->load->model('client/StProgram_model','stprog');
        $this->load->model('client/Reason_model','reason');

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

    public function index()
    {
        $this->form_validation->set_rules('start_date','start date', 'required');
        $this->form_validation->set_rules('end_date','end date', 'required');

        if($this->form_validation->run()==false) {
            $data = "";
        } else {
            $start = $this->input->post('start_date');
            $end = $this->input->post('end_date');
            $data['start'] = $start;
            $data['end'] = $end;

            
            //students status
            $data['st_pending'] = count($this->stprog->stprog_status(0,$start, $end));
            $data['st_success'] = count($this->stprog->stprog_status(1,$start, $end));
            $data['st_failed'] = count($this->stprog->stprog_status(2,$start, $end));
            //lead

            $data['leads'] = $this->stprog->lead_prog($start, $end);
            $data['lead_pending'] = $this->stprog->stprog_lead(0, $start, $end);
            $data['lead_success'] = $this->stprog->stprog_lead(1, $start, $end);
            $data['lead_failed'] = $this->stprog->stprog_lead(2, $start, $end);
            //program
            $data['prog_pending'] = $this->stprog->stprog_prog(0, $start, $end);
            $data['prog_success'] = $this->stprog->stprog_prog(1, $start, $end);
            $data['prog_failed'] = $this->stprog->stprog_prog(2, $start, $end);

            $data['convert_avg'] = $this->stprog->stprog_avg($start, $end);

            
            // echo json_encode($data);

                      
        }

        $this->load->view('templates/s-io');
        $this->load->view('client/tracking/index', $data);
        $this->load->view('templates/f-io');
    }


    public function p_status($n, $start, $end) {
        $data['status'] = $this->stprog->stprog_status($n, $start, $end);
        $this->load->view('templates/s-io');
        $this->load->view('client/tracking/page_status', $data);
        $this->load->view('templates/f-io');
    }

    public function p_lead($n, $lead_id, $start, $end) {
        $data['lead'] = $this->stprog->stprog_leads($n, $lead_id, $start, $end);
        $this->load->view('templates/s-io');
        $this->load->view('client/tracking/page_lead', $data);
        $this->load->view('templates/f-io');
    }

    public function p_program($n, $prog_id, $start, $end) {
        $data['program'] = $this->stprog->stprog_progs($n, $prog_id, $start, $end);
        $this->load->view('templates/s-io');
        $this->load->view('client/tracking/page_program', $data);
        $this->load->view('templates/f-io');
    }
}