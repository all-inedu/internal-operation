<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Corporate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('bizdev/Corporate_model', 'corp');
        $this->load->model('bizdev/CProgram_model', 'cprog');
        $this->load->model('client/Program_model', 'prog');
    }

    public function index(){
        $data['corp'] = $this->corp->showAll();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/corporate/index', $data);
        $this->load->view('templates/f-io');
    }

    public function add() {
        $this->form_validation->set_rules('corp_name','corporate name','required');
        if($this->form_validation->run()==false){
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-bizdev');
            $this->load->view('bizdev/corporate/add-corporate');
            $this->load->view('templates/f-io');
        } else {
            $this->save();
        }
    }

    public function save() {
        $query = $this->corp->getId();  
		if($query->num_rows() <> 0){        
            $data = $query->row();      
            $id = intval($data->kode) + 1;    
		} else { 
		    $id = 1;    
		}
        $idmax = str_pad($id, 4, "0", STR_PAD_LEFT); 
        $newid = "CORP-".$idmax;

        $data = [
            'corp_id' => $newid,
            'corp_name' => $this->input->post('corp_name'),
            'corp_industry' => $this->input->post('corp_industry'),
            'corp_mail' => $this->input->post('corp_mail'),
            'corp_phone' => $this->input->post('corp_phone'),
            'corp_insta' => $this->input->post('corp_insta'),
            'corp_site' => $this->input->post('corp_site'),
            'corp_region' => $this->input->post('corp_region'),
            'corp_address' => $this->input->post('corp_address'),
            'crop_datecreated' => date('Y-m-d H:i:s')
        ];

        $n = count($this->input->post('corpdetail_fullname[]'));
        for($i=0; $i<$n; $i++) {
            $datas = [
                'corp_id' => $newid,
                'corpdetail_fullname' => $this->input->post('corpdetail_fullname['.$i.']'),
                'corpdetail_mail' => $this->input->post('corpdetail_mail['.$i.']'),
                'corpdetail_linkedin' => $this->input->post('corpdetail_linkedin['.$i.']'),
                'corpdetail_phone' => $this->input->post('corpdetail_phone['.$i.']'),
            ];  
            $this->corp->saveDetail($datas);
        }

        $this->corp->save($data);
        $this->session->set_flashdata('success', 'Corporate has been created');
        redirect('/bizdev/corporate/view/'.$newid);
    }

    public function view($id){
        $data['corp'] = $this->corp->showId($id);
        $data['detail'] = $this->corp->showDetail($id);
        $data['prog'] = $this->prog->showB2B();
        $data['cprog'] = $this->cprog->showId($id);
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/corporate/view-corporate', $data);
        $this->load->view('templates/f-io');
    }

    public function edit($id){
        $this->form_validation->set_rules('corp_name', 'school name', 'required');
        if ($this->form_validation->run() == false) {
            $data['corp'] = $this->corp->showId($id);
            $data['detail'] = $this->corp->showDetail($id);
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-bizdev');
            $this->load->view('bizdev/corporate/edit-corporate', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->update();
        }
    }
    

    public function update() {
        $id = $this->input->post('corp_id');
        $data = [
            'corp_name' => $this->input->post('corp_name'),
            'corp_industry' => $this->input->post('corp_industry'),
            'corp_mail' => $this->input->post('corp_mail'),
            'corp_phone' => $this->input->post('corp_phone'),
            'corp_insta' => $this->input->post('corp_insta'),
            'corp_site' => $this->input->post('corp_site'),
            'corp_region' => $this->input->post('corp_region'),
            'corp_address' => $this->input->post('corp_address'),
            'crop_datecreated' => date('Y-m-d H:i:s')
        ];
        $this->corp->update($data, $id);
        $this->session->set_flashdata('success', 'Corporate has been changed');
        redirect('/bizdev/corporate/view/'.$id);
    }

    public function delete($id) {
        $this->corp->delete($id);
        $this->session->set_flashdata('success', 'Corporate has been deleted');
        redirect('/bizdev/corporate/');
    }

    public function showDetailId($id) {
        $data = $this->corp->showDetailId($id);
        echo json_encode($data);
    }

    public function saveDetail() {
        $id = $this->input->post('corp_id');
        $data = [
            'corp_id' => $id,
            'corpdetail_fullname' => $this->input->post('corpdetail_fullname'),
            'corpdetail_mail' => $this->input->post('corpdetail_mail'),
            'corpdetail_linkedin' => $this->input->post('corpdetail_linkedin'),
            'corpdetail_phone' => $this->input->post('corpdetail_phone'),
        ];  
        $this->corp->saveDetail($data);
        $this->session->set_flashdata('success', 'Corporate PIC contact has been created');
        redirect('/bizdev/corporate/edit/'.$id);
    }

    public function updateDetail() {
        $idDetail = $this->input->post('corpdetail_id');
        $id = $this->input->post('corp_id');
        $data = [
            'corp_id' => $id,
            'corpdetail_fullname' => $this->input->post('corpdetail_fullname'),
            'corpdetail_mail' => $this->input->post('corpdetail_mail'),
            'corpdetail_linkedin' => $this->input->post('corpdetail_linkedin'),
            'corpdetail_phone' => $this->input->post('corpdetail_phone'),
        ];  
        $this->corp->updateDetail($data, $idDetail);
        $this->session->set_flashdata('success', 'Corporate PIC contact has been changed');
        redirect('/bizdev/corporate/edit/'.$id);
    }

    public function deleteDetail($idDetail, $id) {
        $this->corp->deleteDetail($idDetail);
        $this->session->set_flashdata('success', 'Corporate PIC contact has been deleted');
        redirect('/bizdev/corporate/edit/'.$id);
    }
}