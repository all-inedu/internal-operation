<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pph_final extends CI_Controller
{

    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('pdf');
        $this->load->model('finance/PPHFinal_model','pphfinal');
        $this->load->model('finance/Invoice_model','inv');
        $this->load->model('finance/InvoiceDetail_model','invdtl');
        $this->load->model('finance/InvoiceSchool_model','invsch');
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

    public function index() {
        $this->form_validation->set_rules('month','month','required');
        $this->form_validation->set_rules('year','year','required');
        if($this->form_validation->run()==false){
            $data['m']='';
            $data['y']='';
            $this->load->view('templates/s-io');
            $this->load->view('finance/pph-final/index', $data);
            $this->load->view('templates/f-io');
        } else {
            $m = $this->input->post('month');
            $y = $this->input->post('year');
            
            $data['receipt'] = $this->pphfinal->showAll($m, $y);
            $data['m']=$m;
            $data['y']=$y;
   
            $this->load->view('templates/s-io');
            $this->load->view('finance/pph-final/index', $data);
            $this->load->view('templates/f-io');
        }
    }

    public function pdf($m, $y, $x=0.5) {
        $data['receipt'] = $this->pphfinal->showAll($m, $y);
        $data['x'] = $x;
        $data['m']=$m;
        $data['y']=$y;

        $html = $this->load->view('finance/pph-final/export/pdf', $data, TRUE);
        $this->pdf->createPDF($html, 'PPH-Final- '.$m.'-'.$y, false, 'a4', 'landscape');
    }

}