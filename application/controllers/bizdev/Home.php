<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('programdata');
        $this->load->model('bizdev/School_model','sch');
        $this->load->model('bizdev/SProgram_model','sp');
        $this->load->model('bizdev/Corporate_model', 'corp');
        $this->load->model('bizdev/CProgram_model', 'cp');
        $this->load->model('Menus_model','menu');
        
        $empl_id = $this->session->userdata('empl_id');
        $position = $this->session->userdata('position');
        if(empty($empl_id)) {
            redirect('/');
        } else {
            // if($position!='bizdev') {
            //     redirect('/'.$position);
            // }

            $data['empl_id'] = $empl_id;
            $data['menus'] = $this->menu->showId($empl_id, 1);
            $this->load->view('templates/h-io', $data);
            // echo json_encode($data);
        }
    }

    public function index(){
        $data['sch'] = count($this->sch->showAll());
        $data['spending'] = count($this->sp->showStatus(0));
        $data['ssuccess'] = count($this->sp->showStatus(1));
        $data['sdenied'] = count($this->sp->showStatus(2));
        $data['corp'] = count($this->cp->showCorporate()); 
        $data['cnot'] = count($this->corp->showAll())-$data['corp'];
        $data['cpending'] = count($this->cp->showStatus(0));
        $data['csuccess'] = count($this->cp->showStatus(1));
        $data['cdenied'] = count($this->cp->showStatus(2));

        $this->load->view('templates/s-io');
        $this->load->view('bizdev/index', $data);
        $this->load->view('templates/f-io');
    }
    
}