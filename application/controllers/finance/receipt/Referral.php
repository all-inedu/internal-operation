<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Referral extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('finance/Receipt_model','receipt');
        $this->load->model('Menus_model','menu');
        $this->load->model('finance/Partners_model','prt');
        
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
        $data['receipt'] = $this->receipt->showAllRef();
        $data['partners'] = $this->prt->showAll();
        $this->load->view('templates/s-io');
        $this->load->view('finance/receipt/referral/index', $data);
        $this->load->view('templates/f-io');
    }


    public function partners() {
        $data['partners'] = $this->prt->showAll();
        $this->load->view('templates/s-io');
        $this->load->view('finance/receipt/referral/partners/index', $data);
        $this->load->view('templates/f-io');
    }

    public function partner($cat, $id="") {
        if($cat=="save") {
            $data = [
                'pt_name' => $this->input->post('pt_name'),
                'pt_email' => $this->input->post('pt_email'),
                'pt_phone' => $this->input->post('pt_phone'),
                'pt_ins' => $this->input->post('pt_ins'),
                'pt_address' => $this->input->post('pt_address'),
            ];
            
            $this->prt->save($data);
            $this->session->set_flashdata('success', 'Partner has been created');
            redirect('/finance/receipt/referral/partners/');

        } else if($cat=="update") {
            $id = $this->input->post('pt_id');
            $data = [
                'pt_name' => $this->input->post('pt_name'),
                'pt_email' => $this->input->post('pt_email'),
                'pt_phone' => $this->input->post('pt_phone'),
                'pt_ins' => $this->input->post('pt_ins'),
                'pt_address' => $this->input->post('pt_address'),
            ];
            
            $this->prt->update($data, $id);
            $this->session->set_flashdata('success', 'Partner has been updated');
            redirect('/finance/receipt/referral/partners/');

        } else if($cat=="delete") {
            $this->prt->delete($id);
            $this->session->set_flashdata('success', 'Partner has been deleted');
            redirect('/finance/receipt/referral/partners/');
        }
    }

    public function viewJson($id) {
        $data = $this->prt->showId($id);
        echo json_encode($data);
    }

    public function save() {
        $m = date('m', strtotime($this->input->post('receipt_date')));
        $y = date('Y', strtotime($this->input->post('receipt_date')));
            
        $inv_id = $this->input->post('inv_id');
        $month = ["","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];
        $romawi = $month[intval($m)];
        $year = date('y', strtotime($this->input->post('receipt_date')));

        $rec = $this->receipt->getId($m, $y);
        if(empty($rec)){
            $idmax = 1;
        } else {
            $idnum = substr($rec['receipt_id'],0,4);
            $idmax = intval($idnum) + 1;
        }
        $newid = str_pad($idmax, 4, "0", STR_PAD_LEFT);
        $rec_id = $newid.'/REC-JEI/REF/'.$romawi.'/'.$year;

        $data = [
            'receipt_id' => $rec_id,
            'pt_id' => $this->input->post('pt_id'),  
            'receipt_cat' => 3,
            'receipt_mtd' => $this->input->post('receipt_mtd'),
            'receipt_cheque' => $this->input->post('receipt_cheque'),  
            'receipt_amount' => $this->input->post('receipt_amount'), 
            'receipt_words' => $this->input->post('receipt_words'), 
            'receipt_date' => $this->input->post('receipt_date'),
            'receipt_notes' => $this->input->post('receipt_notes'),
            'receipt_status' => 1,
        ];

        $this->receipt->save($data);
        $this->session->set_flashdata('success', 'Receipt has been created');
        redirect('/finance/receipt/referral/');
    }

    public function view($id){
        $data['rec'] = $this->receipt->showRefId($id);
        $this->load->view('templates/s-io');
        $this->load->view('finance/receipt/referral/view', $data);
        $this->load->view('templates/f-io');
    }

    public function delete($id) {
        $this->receipt->delete($id);
        $this->session->set_flashdata('success', 'Receipt has been deleted');
        redirect('/finance/receipt/referral/');
    }

    public function pdf($id) {
        $data['rec'] = $this->receipt->showRefId($id);
        $name = explode("/", $data['rec']['receipt_id']);
        $new_name = implode("-", $name);
        $html = $this->load->view('finance/receipt/referral/export/pdf', $data, true);
        $this->pdf->createPDF($html, $new_name, false);
    }

}