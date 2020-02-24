<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Volunteer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('hr/Volunteer_model','volunt');
    }

    public function uploaded($file, $path, $id){
        $config['upload_path']          = './upload/volunteer/'.$path;
        $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|docx|doc';
        $config['max_size']             = 150048;
        $config['file_name']            = strtolower($path."-".$id);

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload($file))
        {
            return htmlspecialchars($this->upload->data('file_name'));
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect('/hr/volunteer/add');
        }
    }
    
    public function index(){
        $data['volunt'] = $this->volunt->showAll();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/volunteer/index.php', $data);
        $this->load->view('templates/f-io');
    }

    public function add(){
        $this->form_validation->set_rules('volunt_firstname','first name','required');
        $this->form_validation->set_rules('volunt_mail','email','required|is_unique[tbl_volunt.volunt_mail]',
        array('is_unique' => 'The email already used'));
        $this->form_validation->set_rules('volunt_phone','phone number','required');
        if ($this->form_validation->run()==false){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/volunteer/add-volunteer.php');
        $this->load->view('templates/f-io');
        } else {
            $this->save();
        }
    }

    public function save(){
        $query = $this->volunt->getId();  
		if($query->num_rows() <> 0){   
            $data = $query->row();      
            $id = intval($data->kode) + 1;    
		} else {   
		    $id = 1;    
		}
        $idmax = str_pad($id, 4, "0", STR_PAD_LEFT); 
        $newid = "VLT-".$idmax;

        $files1 = $_FILES['volunt_idcard']['name'];
        $files2 = $_FILES['volunt_npwp']['name'];
        
        // UPLOAD FILE Jika Ada
        if(empty($files1)){$ktp = "";} else {$ktp = $this->uploaded('volunt_idcard', 'KTP', $newid);}

        if(empty($files2)){$npwp = "";} else {$npwp = $this->uploaded('volunt_npwp', 'NPWP', $newid); }

        $data = [
            'volunt_id' => $newid,
            'volunt_firstname' => $this->input->post('volunt_firstname'),
            'volunt_lastname' => $this->input->post('volunt_lastname'),
            'volunt_address' => $this->input->post('volunt_address'),
            'volunt_mail' => $this->input->post('volunt_mail'),
            'volunt_phone' => $this->input->post('volunt_phone'),
            'volunt_graduatedfr' => $this->input->post('volunt_graduatedfr'),
            'volunt_major' => $this->input->post('volunt_major'),
            'volunt_position' => $this->input->post('volunt_position'),
            'volunt_idcard' => $ktp,
            'volunt_npwp' => $npwp,
            'volunt_status' => 1,
            'volunt_lasteditdate' => date('Y-m-d H:i:s')
        ];

        $this->volunt->save($data);
        $this->session->set_flashdata('success', 'Volunteer has been created');
        redirect('/hr/volunteer/view/'.$newid);
    }

    public function view($id){
        $data['volunt'] = $this->volunt->showId($id);
        if(empty($data['volunt'])) { 
            $this->session->set_flashdata('warning', 'Volunteer ID is not found');
            redirect('/hr/volunteer/');  
        }
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/volunteer/view-volunteer.php', $data);
        $this->load->view('templates/f-io');
    }

    public function edit($id){
        $data['volunt'] = $this->volunt->showId($id);
        $this->form_validation->set_rules('volunt_firstname','first name','required');
        $this->form_validation->set_rules('volunt_mail','email','required');
        $this->form_validation->set_rules('volunt_phone','phone number','required');
        if ($this->form_validation->run()==false){
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-hr');
            $this->load->view('hr/volunteer/edit-volunteer.php',$data);
            $this->load->view('templates/f-io');
        } else {
            $this->update($id);
        }
    }

    public function update($id) {
        $check = $this->volunt->showId($id);

        $files1 = $_FILES['volunt_idcard']['name'];
        $files2 = $_FILES['volunt_npwp']['name'];

        // UPLOAD FILE Jika Ada
        if(empty($files1)){
            $ktp = $check['volunt_idcard'];
        } else {
            if(! $check['volunt_idcard']==""){
                unlink("./upload/volunteer/KTP/".$check['volunt_idcard']);
            }
            $ktp = $this->uploaded('volunt_idcard', 'KTP', $id);
        }

        if(empty($files2)){
            $npwp = $check['volunt_npwp'];
        } else {
            if(! $check['volunt_npwp']==""){
                unlink("./upload/volunteer/NPWP/".$check['volunt_npwp']);
            }
            $npwp = $this->uploaded('volunt_npwp', 'NPWP', $id);
        }
        
        $data = [
            'volunt_firstname' => $this->input->post('volunt_firstname'),
            'volunt_lastname' => $this->input->post('volunt_lastname'),
            'volunt_address' => $this->input->post('volunt_address'),
            'volunt_mail' => $this->input->post('volunt_mail'),
            'volunt_phone' => $this->input->post('volunt_phone'),
            'volunt_graduatedfr' => $this->input->post('volunt_graduatedfr'),
            'volunt_major' => $this->input->post('volunt_major'),
            'volunt_position' => $this->input->post('volunt_position'),
            'volunt_idcard' => $ktp,
            'volunt_npwp' => $npwp,
            'volunt_status' => 1,
            'volunt_lasteditdate' => date('Y-m-d H:i:s')
        ];

        $this->volunt->update($data, $id);
        $this->session->set_flashdata('success', 'Volunteer has been changed');
        redirect('/hr/volunteer/view/'.$id);
    }

    public function deactivate($id) {
        $this->volunt->deactivate($id);
        $this->session->set_flashdata('success', 'Volunteer has been deactivated');
        redirect('/hr/volunteer/view/'.$id);
    }

    public function activate($id) {
        $this->volunt->activate($id);
        $this->session->set_flashdata('success', 'Volunteer has been activated');
        redirect('/hr/volunteer/view/'.$id);
    }
}
?>