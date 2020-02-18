<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('finance/Vendor_model','vendor');
    }

    public function index(){
        $data['t'] = ['Flyer','Infopack','Poster','Name Card','ID Card staff','Sticker','Voucher','Totte bag','T-shirt','Banner','Letterhead','Print BW','Print Colour','Notaris'];
        $data['vendor'] = $this->vendor->showAll();

        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/vendor/index', $data);
        $this->load->view('templates/f-io');
    }

    public function save(){
        $query = $this->vendor->getId();
          //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
		    //jika kode ternyata sudah ada.      
            $data = $query->row();      
            $id = intval($data->kode) + 1;    
		} else {      
		   //jika kode belum ada      
		    $id = 1;    
		}
        $idmax = str_pad($id, 4, "0", STR_PAD_LEFT); 
        $newid = "VD-".$idmax;

        $data = [
            'vendor_id' => $newid,
            'vendor_name' => $this->input->post('vendor_name'),
            'vendor_address' => $this->input->post('vendor_address'),
            'vendor_phone' => $this->input->post('vendor_phone'),
            'vendor_type' => $this->input->post('vendor_type'),
            'vendor_material' => $this->input->post('vendor_material'),
            'vendor_size' => $this->input->post('vendor_size'),   
            'vendor_unitprice' => $this->input->post('vendor_unitprice'),
            'vendor_processingtime' => $this->input->post('vendor_processingtime'), 
            'vendor_notes' => $this->input->post('vendor_notes'), 
            'vendor_lastupdatedate' => date('Y-m-d H:i:s')
        ];

        $this->vendor->save($data);
        $this->session->set_flashdata('success', 'Vendor has been saved');
        redirect('/finance/vendor/');
    }

    public function view($id) {
        $data = $this->vendor->showId($id);
        echo json_encode($data);
    }

    public function update() {
        $id = $this->input->post('vendor_id');
        $data = [
            'vendor_name' => $this->input->post('vendor_name'),
            'vendor_address' => $this->input->post('vendor_address'),
            'vendor_phone' => $this->input->post('vendor_phone'),
            'vendor_type' => $this->input->post('vendor_type'),
            'vendor_material' => $this->input->post('vendor_material'),
            'vendor_size' => $this->input->post('vendor_size'),   
            'vendor_unitprice' => $this->input->post('vendor_unitprice'),
            'vendor_processingtime' => $this->input->post('vendor_processingtime'), 
            'vendor_notes' => $this->input->post('vendor_notes'), 
            'vendor_lastupdatedate' => date('Y-m-d H:i:s')
        ];
        $this->vendor->update($data, $id);
        $this->session->set_flashdata('success', 'Vendor has been changed');
        redirect('/finance/vendor/');
    }

    public function delete($id){
        $this->vendor->delete($id);
        $this->session->set_flashdata('success', 'Vendor has been deleted');
        redirect('/finance/vendor/');
    }
    
}