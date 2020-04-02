<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assets extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('finance/Asset_model','asset');
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

    public function index(){
        $data['m'] = ['Merk1','Merk2'];
        $data['c'] = ['Good','Good Enough','Not Good'];
        $data['s'] = ['Equipment', 'Supplies', 'SRP Equipment'];
        $data['asset'] = $this->asset->showAll();
        $this->load->view('templates/s-io');
        $this->load->view('finance/assets/index', $data);
        $this->load->view('templates/f-io');
    }

    public function save(){      
        $query = $this->asset->getId();
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
        $newid = "AS-".$idmax;

        $data = [
            'asset_id' => $newid,
            'asset_name' => $this->input->post('asset_name'),
            'asset_merktype' => $this->input->post('asset_merktype'),
            'asset_dateachieved' => $this->input->post('asset_dateachieved'),
            'asset_amount' => $this->input->post('asset_amount'),
            'asset_unit' => $this->input->post('asset_unit'),
            'asset_condition' => $this->input->post('asset_condition'),   
            'asset_status' => $this->input->post('asset_status'), 
            'asset_notes' => $this->input->post('asset_notes'), 
            'asset_lastupdatedate' => date('Y-m-d H:i:s')
        ];

        $this->asset->save($data);
        $this->session->set_flashdata('success', 'Asset has been saved');
        redirect('/finance/assets/');
    }

    public function view($id) {
        $data = $this->asset->showId($id);
        echo json_encode($data);
    }

    public function update() {
        $id = $this->input->post('asset_id');
        $data = [
            'asset_name' => $this->input->post('asset_name'),
            'asset_merktype' => $this->input->post('asset_merktype'),
            'asset_dateachieved' => $this->input->post('asset_dateachieved'),
            'asset_amount' => $this->input->post('asset_amount'),
            'asset_unit' => $this->input->post('asset_unit'),
            'asset_condition' => $this->input->post('asset_condition'),   
            'asset_status' => $this->input->post('asset_status'), 
            'asset_notes' => $this->input->post('asset_notes'), 
            'asset_lastupdatedate' => date('Y-m-d H:i:s')
        ];
        $this->asset->update($data, $id);
        $this->session->set_flashdata('success', 'Asset has been changed');
        redirect('/finance/assets/');
    }

    public function delete($id){
        $this->asset->delete($id);
        $this->session->set_flashdata('success', 'Asset has been deleted');
        redirect('/finance/assets/');
    }
    
}