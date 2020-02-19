<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('hr/Employee_model','empl');
    }

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/employee/index.php');
        $this->load->view('templates/f-io');
    }

    public function candidate(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/employee/employee-candidate.php');
        $this->load->view('templates/f-io');
    }

    public function list(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/employee/index.php');
        $this->load->view('templates/f-io');
    }

    public function add(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/employee/add-employee.php');
        $this->load->view('templates/f-io');
    }

    public function uploaded($file, $path, $id){
        $config['upload_path']          = './upload/employee/'.$path;
        $config['allowed_types']        = 'gif|jpg|png|pdf|docx|doc';
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
            redirect('/hr/employee/add');
        }
    }

    public function save(){
        $query = $this->empl->getId();  
		if($query->num_rows() <> 0){   
            $data = $query->row();      
            $id = intval($data->kode) + 1;    
		} else {   
		    $id = 1;    
		}
        $idmax = str_pad($id, 4, "0", STR_PAD_LEFT); 
        $newid = "EMPL-".$idmax;

        $files1 = $_FILES['empl_cv']['name'];
        $files2 = $_FILES['empl_idcard']['name'];
        $files3 = $_FILES['empl_tax']['name'];
        $files4 = $_FILES['empl_healthinsurance']['name'];
        $files5 = $_FILES['empl_emplinsurance']['name'];

        if($files1>0){
            $cv = $this->uploaded('empl_cv', 'CV', $newid);
        } else { $cv = "";}

        // if($files2>0){
        //     $idcard = $this->uploaded('empl_idcard', 'KTP', $newid);
        // } else { $idcard = "";}

        $data = [
            'empl_id' => $newid,
            'empl_firstname' => $this->input->post('empl_firstname'),
            'empl_lastname' => $this->input->post('empl_lastname'),	
            'empl_email' => $this->input->post('empl_email'),	
            'empl_address' => $this->input->post('empl_address'),
            'empl_phone' => $this->input->post('empl_phone'),	 
            'empl_datebirth' => $this->input->post('empl_datebirth'),
            'empl_graduatefr' => $this->input->post('empl_graduatefr'),	
            'empl_major' => $this->input->post('empl_major'),	
            'empl_department' => $this->input->post('empl_department'),	
            'empl_hiredate'	=> $this->input->post('empl_hiredate'),
            'empl_status' => $this->input->post('empl_status'),	
            'empl_statusenddate' => $this->input->post('empl_statusenddate'),	
            'empl_isresign' => $this->input->post('empl_isresign'),	
            'empl_cv' => $cv,	 
            'empl_bankaccount' => $this->input->post('empl_bankaccount'),	
            // 'empl_idcard' => $idcard,	
            'empl_tax' => $this->input->post('empl_tax'),	
            'empl_healthinsurance' => $this->input->post('empl_healthinsurance'),	
            'empl_emplinsurance' => $this->input->post('empl_emplinsurance'),	
            'empl_password' => '',	
            'empl_lastupdatedate' => date('Y-m-d H:i:s')
        ];
        
        echo json_encode($data);

        // $this->empl->save($data);
        // $this->session->set_flashdata('success', 'Employee has been created');
        // redirect('/hr/employee/');
    }

    public function view(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/employee/view-employee.php');
        $this->load->view('templates/f-io');
    }

    public function edit(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/employee/edit-employee.php');
        $this->load->view('templates/f-io');
    }
    
}