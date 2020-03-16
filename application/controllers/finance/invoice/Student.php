<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('pdf');
        $this->load->model('finance/Invoice_model','inv');
        $this->load->model('client/StProgram_model','stprog');
    }

    public function index(){  
        $data['student_program'] = $this->inv->showForInvoice();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/invoice/student/index', $data);
        $this->load->view('templates/f-io');
    }

    public function view($id){      
        $check = $this->inv->showId($id);
        if(empty($check)) {
            $this->addInvoice($id);
        } else {
            $this->viewInvoice($id);
        }
    }

    public function addInvoice($id) {
        $data['sp'] = $this->stprog->showId($id);

        $this->form_validation->set_rules('inv_category', 'category', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-finance');
            $this->load->view('finance/invoice/student/add', $data);
            $this->load->view('templates/f-io'); 
        } else { 
            $cat = $this->input->post('inv_category');
            if($cat=="usd") {
                $this->saveUsd($id);
            } else if($cat=="idr") {
                $this->saveIdr();
            } else {
                $this->saveSession();
            }
        }
    }

    public function saveUsd($id) {
        $sp = $this->stprog->showId($id);
        $prog_id = $sp['prog_id'];
        $month = ["","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];
        $romawi = $month[intval(date('m'))];
        $year = date('y');

        $inv = $this->inv->getId();
        if(empty($inv)){
            $idmax = 1;
        } else {
            $idnum = substr($inv['inv_id'],0,4);
            $idmax = intval($idnum) + 1;
        }
        
        $newid = str_pad($idmax, 4, "0", STR_PAD_LEFT);
         
        $inv_id = $newid.'/INV-JEI/'.$prog_id.'/'.$romawi.'/'.$year;

        $pm = $this->input->post('inv_paymentmethod');
        $data = [
            'inv_id' => $inv_id,
            'stprog_id' => $this->input->post('stprog_id'),
            'inv_category' => $this->input->post('inv_category'),
            'inv_priceusd' => $this->input->post('inv_priceusd'),
            'inv_priceidr' => $this->input->post('inv_priceidr'),
            'inv_earlybirdusd' => $this->input->post('inv_earlybirdusd'),
            'inv_earlybirdidr' => $this->input->post('inv_earlybirdidr'),
            'inv_discusd' => $this->input->post('inv_discusd'),
            'inv_discidr' => $this->input->post('inv_discidr'),
            'inv_totprusd' => $this->input->post('inv_totprusd'),
            'inv_totpridr' => $this->input->post('inv_totpridr'),
            'inv_words' => $this->input->post('inv_words'),
            'inv_paymentmethod' => $pm,
            'inv_date' => $this->input->post('inv_date'),
            'inv_duedate' => $this->input->post('inv_duedate'),
            'inv_notes' => $this->input->post('inv_notes'),
            'inv_tnc' => $this->input->post('inv_tnc'),
            'inv_status' => 0,
        ];

        if($pm=="Installment") {
            $n = count($this->input->post('invdtl_statusname[]'));

            for($i=0; $i<$n; $i++) {
                $install = [
                    'inv_id' => $inv_id,
                    'invdtl_statusname' => $this->input->post('invdtl_statusname['.$i.']'),
                    'invdtl_duedate' => $this->input->post('invdtl_duedate['.$i.']'),
                    'invdtl_percentage' => $this->input->post('invdtl_percentage['.$i.']'),
                    'invdtl_amountusd' => $this->input->post('invdtl_amountusd['.$i.']'),
                    'invdtl_amountidr' => $this->input->post('invdtl_amountidr['.$i.']'),
                    'invdtl_status' => 0
                ];
                $this->inv->saveDetail($install);
            }
        }
        $this->inv->save($data);
        $this->session->set_flashdata('success', 'Invoice has been created');
        redirect('/finance/invoice/student/view/'.$id);
    }

    public function viewInvoice() {
        $data['paymentMethod'] = 'Installment';
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/invoice/student/view',$data);
        $this->load->view('templates/f-io'); 
    }

    public function edit() {
        $data['paymentMethod'] = 'Installment';
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/invoice/student/edit',$data);
        $this->load->view('templates/f-io'); 
    }

    public function dompdf()
    {
        $data['nama'] = 'Hafidz Annur';
        $data['alamat'] ='Jl A No.25 Kebon Jeruk <br>Jakarta Barat 11530';
        $data['program'] = 'SAT Private';
        $html = $this->load->view('finance/invoice/student/export/usd-pdf', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }
    
}