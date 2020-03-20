<?php
defined('BASEPATH') or exit('No direct script access allowed');

class School extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('pdf');
        $this->load->model('bizdev/SProgram_model','schprog');
        $this->load->model('finance/InvoiceSchool_model','invsch');
        $this->load->model('finance/Receipt_model','receipt');
    }

    public function index(){     
        $data['sch_prog'] = $this->schprog->showForInvoice(); 
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/invoice/school/index', $data);
        $this->load->view('templates/f-io');
    }

    public function view($id){ 
        $check = $this->invsch->showId($id);     
        if(!$check){
            $this->addInvoice($id);
        } else {
            $this->viewInvoice($id);
        }
    }

    public function addInvoice($id) {
        $data['schprog'] = $this->schprog->showSProgId($id);
        $data['fixprog'] = $this->schprog->showProgramExec($id);
        $this->form_validation->set_rules('invsch_price', 'price', 'required');
        $this->form_validation->set_rules('invsch_date', 'date', 'required');
        $this->form_validation->set_rules('invsch_duedate', 'due date', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-finance');
            $this->load->view('finance/invoice/school/add', $data);
            $this->load->view('templates/f-io'); 
        } else {
            $this->save($id);
        }
    }

    public function save($id) {
        $m = date('m', strtotime($this->input->post('invsch_date')));
        $y = date('Y', strtotime($this->input->post('invsch_date')));
        $sp = $this->schprog->showSProgId($id);
        $prog_id = $sp['prog_id'];
        $month = ["","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];
        $romawi = $month[intval($m)];
        $year = date('y', strtotime($this->input->post('invsch_date')));

        $inv = $this->invsch->getId($m, $y);
        if(empty($inv)){
            $idmax = 1;
        } else {
            $idnum = substr($inv['invsch_id'],0,4);
            $idmax = intval($idnum) + 1;
        }
        
        $newid = str_pad($idmax, 4, "0", STR_PAD_LEFT);
        $inv_id = $newid.'/INV-JEI/'.$prog_id.'/'.$romawi.'/'.$year;
        $data = [
            'invsch_id' => $inv_id,
            'schprog_id' => $id,
            'invsch_price' => $this->input->post('invsch_price'),
            'invsch_participants' => $this->input->post('invsch_participants'),
            'invsch_disc' => $this->input->post('invsch_disc'),
            'invsch_totprice' => $this->input->post('invsch_totprice'),
            'invsch_words' => $this->input->post('invsch_words'),
            'invsch_date' => $this->input->post('invsch_date'),
            'invsch_duedate' => $this->input->post('invsch_duedate'),
            'invsch_notes' => $this->input->post('invsch_notes'),
            'invsch_tnc' => $this->input->post('invsch_tnc')
        ];
        // echo json_encode($data);
        $this->invsch->save($data);
        $this->session->set_flashdata('success', 'Invoice has been created');
        redirect('/finance/invoice/school/view/'.$id);
    }


    public function viewInvoice($id) {
        $data['schprog'] = $this->invsch->showId($id);
        $inv_id = $data['schprog']['invsch_id'];
        $data['fixprog'] = $this->schprog->showProgramExec($id); 
        $data['rec'] = $this->receipt->showByInvId($inv_id);
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/invoice/school/view', $data);
        $this->load->view('templates/f-io'); 
    }

    public function edit($id) {
        $data['schprog'] = $this->invsch->showId($id);
        $data['fixprog'] = $this->schprog->showProgramExec($id); 
        $this->form_validation->set_rules('invsch_price', 'price', 'required');
        $this->form_validation->set_rules('invsch_date', 'date', 'required');
        $this->form_validation->set_rules('invsch_duedate', 'due date', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-finance');
            $this->load->view('finance/invoice/school/edit', $data);
            $this->load->view('templates/f-io'); 
        } else {
            $this->update();
        }
    }

    public function update() {
        $id = $this->input->post('schprog_id');
        $data = [
            'invsch_price' => $this->input->post('invsch_price'),
            'invsch_participants' => $this->input->post('invsch_participants'),
            'invsch_disc' => $this->input->post('invsch_disc'),
            'invsch_totprice' => $this->input->post('invsch_totprice'),
            'invsch_words' => $this->input->post('invsch_words'),
            'invsch_date' => $this->input->post('invsch_date'),
            'invsch_duedate' => $this->input->post('invsch_duedate'),
            'invsch_notes' => $this->input->post('invsch_notes'),
            'invsch_tnc' => $this->input->post('invsch_tnc')
        ];
        // echo json_encode($data);
        $this->invsch->update($data, $id);
        $this->session->set_flashdata('success', 'Invoice has been created');
        redirect('/finance/invoice/school/view/'.$id);
    }

    public function cancel($id) {
        $this->invsch->delete($id);
        $this->session->set_flashdata('success', 'Invoice has been canceled');
        redirect('/finance/invoice/school/');
    }

    public function pdf($id)
    {
        $data['schprog'] = $this->invsch->showId($id);
        $inv = $data['schprog']['invsch_id'];
        $inv_id = explode("/",$inv);
        $new_inv = implode("-", $inv_id);
        
        $data['nama'] = 'School Name';
        $data['alamat'] ='Jl A No.25 Kebon Jeruk <br>Jakarta Barat 11530';
        $data['program'] = 'SAT Private';
        $html = $this->load->view('finance/invoice/school/export/pdf', $data, true);
        $this->pdf->createPDF($html, $new_inv, false);
    }
    
}