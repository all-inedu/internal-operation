<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mentor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('bizdev/University_model','univ');
        $this->load->model('hr/Mentor_model','mt');
    }

    public function index(){
        $data['mentor'] = $this->mt->showAll();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/mentor/index.php', $data);
        $this->load->view('templates/f-io');
    }

    public function list(){
        $this->index();
    }

    public function view($id){
        $data['mentor'] = $this->mt->showId($id);
        if($data['mentor']){
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-hr');
            $this->load->view('hr/mentor/view-mentor.php', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->session->set_flashdata('warning', 'Mentor ID not found');
            redirect('/hr/mentor/');
        }
    }

    public function edit(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/mentor/edit-mentor.php');
        $this->load->view('templates/f-io');
    }

    public function potential($v='', $id=''){
        if($v==''){
            $data['mentor'] = $this->mt->showPotentialAll();
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-hr');
            $this->load->view('hr/mentor/potential-mentor.php', $data);
            $this->load->view('templates/f-io');
        } else if($v=='add') {
            $this->_addPotential();
        } else if($v=='view') {
            $this->_viewPotential($id);
        } else if($v=='edit') {
            $this->_editPotential($id);
        }
    }

    public function _addPotential(){
        $this->form_validation->set_rules('mt_firstn','first name','required');
        $this->form_validation->set_rules('mt_email','email','required');
        $this->form_validation->set_rules('mt_phone','phone number','required');

        if ($this->form_validation->run()==false){
            $data['univ'] = $this->univ->showAll();
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-hr');
            $this->load->view('hr/mentor/add-potential.php', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->savePotential();
        }
    }

    public function savePotential(){
        $data = [
            'mt_firstn' => $this->input->post('mt_firstn'),
            'mt_lastn' => $this->input->post('mt_lastn'),
            'mt_email' => $this->input->post('mt_email'),
            'mt_address' => $this->input->post('mt_address'),
            'mt_phone' => $this->input->post('mt_phone'),
            'univ_id' => $this->input->post('univ_id'),
            'mt_major' => $this->input->post('mt_major'),
            'mt_istutor' => $this->input->post('mt_istutor'),
            'mt_tsubject' => $this->input->post('mt_tsubject'),
            'mt_lastcontactdate' => $this->input->post('mt_lastcontactdate'),
            'mt_status' => 0,
            'mt_lastupdate' => date('Y-m-d H:i:s'),
        ];

        $this->mt->savePotential($data);
        $this->session->set_flashdata('success', 'Potential mentor have been created');
        redirect('/hr/mentor/potential/');
    }

    public function _viewPotential($id){
        $data['mentor'] = $this->mt->showPotentialId($id);
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/mentor/view-potential.php', $data);
        $this->load->view('templates/f-io');
    }

    public function _editPotential($id){
        $this->form_validation->set_rules('mt_firstn','first name','required');
        $this->form_validation->set_rules('mt_email','first name','required');
        $this->form_validation->set_rules('mt_phone','phone number','required');

        if ($this->form_validation->run()==false){
            $data['mentor'] = $this->mt->showPotentialId($id);
            $data['univ'] = $this->univ->showAll();
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-hr');
            $this->load->view('hr/mentor/edit-potential.php', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->updatePotential();
        }
    }

    public function updatePotential(){
        $id = $this->input->post('id');
        $data = [
            'mt_firstn' => $this->input->post('mt_firstn'),
            'mt_lastn' => $this->input->post('mt_lastn'),
            'mt_email' => $this->input->post('mt_email'),
            'mt_address' => $this->input->post('mt_address'),
            'mt_phone' => $this->input->post('mt_phone'),
            'univ_id' => $this->input->post('univ_id'),
            'mt_major' => $this->input->post('mt_major'),
            'mt_istutor' => $this->input->post('mt_istutor'),
            'mt_tsubject' => $this->input->post('mt_tsubject'),
            'mt_lastcontactdate' => $this->input->post('mt_lastcontactdate'),
            'mt_status' => 0,
            'mt_lastupdate' => date('Y-m-d H:i:s'),
        ];

        $this->mt->updatePotential($data,$id);
        $this->session->set_flashdata('success', 'Potential mentor have been changed');
        redirect('/hr/mentor/potential/');
    }

    public function convert($id){
        $query = $this->mt->getId();  
		if($query->num_rows() <> 0){   
            $data = $query->row();      
            $id = intval($data->kode) + 1;    
		} else {   
		    $id = 1;    
		}
        $idmax = str_pad($id, 4, "0", STR_PAD_LEFT); 
        $newid = "MT-".$idmax;
        
        $data = [
            'mt_id' => $newid,
            'mt_status' => 1,
            'mt_lastupdate' => date('Y-m-d H:i:s'),
        ];

        $this->mt->convert($id, $data);
        $this->session->set_flashdata('success', 'Potential mentor have been converted');
        redirect('/hr/mentor/');
    }
    
}