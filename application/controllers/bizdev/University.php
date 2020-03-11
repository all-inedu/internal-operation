<?php
defined('BASEPATH') or exit('No direct script access allowed');

class University extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('bizdev/University_model','univ');
        $this->load->library('countries');
    }

    public function index(){
        $data['univ'] = $this->univ->showAll();
        $data['country'] = $this->countries->show();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/university/index', $data);
        $this->load->view('templates/f-io');
    }

    public function save(){
        $query = $this->univ->getId();
          //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
		    //jika kode ternyata sudah ada.      
            $data = $query->row();      
            $id = intval($data->kode) + 1;    
		} else {      
		   //jika kode belum ada      
		    $id = 1;    
		}
        $idmax = str_pad($id, 3, "0", STR_PAD_LEFT); 
        $newid = "UNIV-".$idmax;
        
        $data = [
            'univ_id' => $newid,
            'univ_name' => $this->input->post('univ_name'),
            'univ_country' => $this->input->post('univ_country'),
            'univ_address' => $this->input->post('univ_address'),
        ];

        $this->univ->save($data);
        $this->session->set_flashdata('success', 'University has been created');
        redirect('/bizdev/university/');

    }

    public function view($id) {
        $data = $this->univ->showId($id);
        echo json_encode($data);
    }

    public function update() {
        $id = $this->input->post('univ_id');
        $data = [
            'univ_name' => $this->input->post('univ_name'),
            'univ_country' => $this->input->post('univ_country'),
            'univ_address' => $this->input->post('univ_address'),
        ];
        // var_dump($data);
        $this->univ->update($data, $id);
        $this->session->set_flashdata('success', 'University has been changed');
        redirect('/bizdev/university/');
    }

    public function delete($id){
        $this->univ->delete($id);
        $this->session->set_flashdata('success', 'University has been deleted');
        redirect('/bizdev/university/');
    }
    
}