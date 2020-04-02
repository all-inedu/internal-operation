<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Corporate_program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('bizdev/CProgram_model','cprog');
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

    public function uploaded($file, $path, $id){
        $config['upload_path']          = './upload/corporate-program/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|docx|doc';
        $config['max_size']             = 150048;
        $config['file_name']            = strtolower($path.$id);

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload($file))
        {
            return htmlspecialchars($this->upload->data('file_name'));
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect('/bizdev/corporate-program/edit/'.$id);
        }
    }

    public function index(){
        $data['cprog'] = $this->cprog->showAll();
        $this->load->view('templates/s-io');
        $this->load->view('bizdev/corporate-program/index', $data);
        $this->load->view('templates/f-io');
    }

    public function save($id) {
        $this->form_validation->set_rules('prog_id', 'program name', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('warning', 'Program name must be filled in');
            redirect('bizdev/corporate/view/'.$id);
        } else {
            $data = [
                'corp_id' => $id,
                'prog_id' => $this->input->post('prog_id'),
                'corprog_type' => $this->input->post('corprog_type'),
                'corprog_datefirstdiscuss' => $this->input->post('corprog_datefirstdiscuss'),
                'corprog_datelastdiscuss' => $this->input->post('corprog_datefirstdiscuss'),
                'corprog_notes' => $this->input->post('corprog_notes'),
                'corprog_status' => 0,
            ];
            $this->cprog->save($data);
            $this->session->set_flashdata('success', 'Programs have been added at this corporate');
            redirect('bizdev/corporate/view/'.$id);
        }
        
    }

    public function view($id){
        $data['cprog'] = $this->cprog->showSProgId($id);
        $this->load->view('templates/s-io');
        $this->load->view('bizdev/corporate-program/view-corporate-program', $data);
        $this->load->view('templates/f-io');
    }

    public function edit($id){
        $this->form_validation->set_rules('corprog_id', 'corporate program id', 'required');
        if ($this->form_validation->run() == false) {
        $data['cprog'] = $this->cprog->showSProgId($id);
        $this->load->view('templates/s-io');
        $this->load->view('bizdev/corporate-program/edit-corporate-program', $data);
        $this->load->view('templates/f-io');
        } else {
            $this->update();
        }
    }

    public function update() {
        $id = $this->input->post('corprog_id');
        $cprog = $this->cprog->showSProgId($id);
        $cname = $cprog['corp_name'];
        $att1 = $cprog['corprog_attach1'];
        $att2 = $cprog['corprog_attach2'];
        $att3 = $cprog['corprog_attach3'];

        $files1 = $_FILES['file1']['name'];
        $files2 = $_FILES['file2']['name'];
        $files3 = $_FILES['file3']['name'];

        if(empty($files1)){
            $attach1 = $att1;
        } else {
            if(! $att1==""){
                unlink("./upload/corporate-program/".$att1);
            }
            $attach1 = $this->uploaded('file1', $cname.'_attach1' , $id);
        }

        if(empty($files2)){
            $attach2 = $att2;
        } else {
            if(! $att2==""){
                unlink("./upload/corporate-program/".$att2);
            }
            $attach2 = $this->uploaded('file2', $cname.'_attach2', $id);
        }

        if(empty($files3)){
            $attach3 = $att3;
        } else {
            if(! $att3==""){
                unlink("./upload/corporate-program/".$att3);
            }
            $attach3 = $this->uploaded('file3', $cname.'_attach3', $id);
        }

        $data = [
            'corprog_datelastdiscuss' => $this->input->post('corprog_datelastdiscuss'),
            'corprog_notes' => $this->input->post('corprog_notes'),
            'corprog_status' => $this->input->post('corprog_status'),
            'corprog_file1' => $this->input->post('corprog_file1'),
            'corprog_attach1' => $attach1,
            'corprog_file2' => $this->input->post('corprog_file2'),
            'corprog_attach2' => $attach2,
            'corprog_file3' => $this->input->post('corprog_file3'),
            'corprog_attach3' => $attach3,
        ];

        $this->cprog->update($data, $id);
        $this->session->set_flashdata('success', 'Corporates program data has been changed');
        redirect('/bizdev/corporate-program/edit/'.$id);
    }

    public function delete($id) {
        $this->cprog->delete($id);
        $this->session->set_flashdata('success', 'Corporates program data has been deleted');
        redirect('/bizdev/corporate-program/');
    }
    
}