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
        $data['empl'] = $this->empl->showAll();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/employee/index.php', $data);
        $this->load->view('templates/f-io');
    }

    public function candidate(){
        $this->load->view('templates/h-io');
        $this->load->view('information/maintance');
        // $this->load->view('templates/s-hr');
        // $this->load->view('hr/employee/employee-candidate.php');
        $this->load->view('templates/f-io');
    }

    public function list(){
        $this->index();
    }

    public function add(){
        $this->form_validation->set_rules('empl_firstname', 'first name','required');
        $this->form_validation->set_rules('empl_email', 'email','required|is_unique[tbl_empl.empl_email]',
        array('is_unique' => 'The email already used'));
        $this->form_validation->set_rules('empl_phone', 'phone number','required');

        if($this->form_validation->run()==FALSE) {
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-hr');
            $this->load->view('hr/employee/add-employee.php');
            $this->load->view('templates/f-io');
        } else {
            $this->save();
        }
    }

    public function uploaded($file, $path, $id){
        $config['upload_path']          = './upload/employee/'.$path;
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
        
        // UPLOAD FILE Jika Ada
        if(empty($files1)){$cv = "";} else {$cv = $this->uploaded('empl_cv', 'CV', $newid);}

        if(empty($files2)){$idcard = "";} else {$idcard = $this->uploaded('empl_idcard', 'KTP', $newid); }

        if(empty($files3)){$tax = "";} else {$tax = $this->uploaded('empl_tax', 'NPWP', $newid); }

        if(empty($files4)){$healthinsurance = "";} else {$healthinsurance = $this->uploaded('empl_healthinsurance', 'BPJS-KES', $newid); }

        if(empty($files5)){$emplinsurance = "";} else {$emplinsurance = $this->uploaded('empl_emplinsurance', 'BPJS-KET', $newid); } 

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
            'empl_isactive' => 1,	
            'empl_cv' => $cv,	 
            'empl_bankaccount' => $this->input->post('empl_bankaccount'),	
            'empl_idcard' => $idcard,	
            'empl_tax' => $tax,	
            'empl_healthinsurance' => $healthinsurance,	
            'empl_emplinsurance' => $emplinsurance,	
            'empl_password' => '',	
            'empl_lastupdatedate' => date('Y-m-d H:i:s')
        ];
        
        $this->empl->save($data);
        $this->session->set_flashdata('success', 'Employee has been created');
        redirect('/hr/employee/');
    }

    public function view($id){
        $data['empl'] = $this->empl->showId($id);
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-hr');
        $this->load->view('hr/employee/view-employee.php', $data);
        $this->load->view('templates/f-io');
    }

        // unlink("./upload/employee/KTP/".$id);

    public function edit($id){
        $this->form_validation->set_rules('empl_firstname', 'first name','required');
        $this->form_validation->set_rules('empl_email', 'email','required');
        $this->form_validation->set_rules('empl_phone', 'phone number','required');

        if($this->form_validation->run()==FALSE) {
            $data['empl'] = $this->empl->showId($id);
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-hr');
            $this->load->view('hr/employee/edit-employee.php',$data);
            $this->load->view('templates/f-io');
        } else {
            $this->update();
        }
    }

    public function update() {
        $id = $this->input->post('empl_id');
        $empl = $this->empl->showId($id);
        $empl_cv = $empl['empl_cv'];
        $empl_idcard = $empl['empl_idcard'];
        $empl_tax = $empl['empl_tax'];
        $empl_healthinsurance = $empl['empl_healthinsurance'];
        $empl_emplinsurance = $empl['empl_emplinsurance'];
   
        $files1 = $_FILES['empl_cv']['name'];
        $files2 = $_FILES['empl_idcard']['name'];
        $files3 = $_FILES['empl_tax']['name'];
        $files4 = $_FILES['empl_healthinsurance']['name'];
        $files5 = $_FILES['empl_emplinsurance']['name'];
        
        // UPLOAD FILE Jika Ada
        if(empty($files1)){
            $cv = $empl_cv;
        } else {
            if(! $empl_cv==""){
                unlink("./upload/employee/CV/".$empl_cv);
            }
            $cv = $this->uploaded('empl_cv', 'CV', $id);
        }

        if(empty($files2)){
            $idcard = $empl_idcard;
        } else {
            if(! $empl_idcard==""){
                unlink("./upload/employee/KTP/".$empl_idcard);
            }
            $idcard = $this->uploaded('empl_idcard', 'KTP', $id);
        }

        if(empty($files3)){
            $tax = $empl_tax;
        } else {
            if(! $empl_tax==""){
                unlink("./upload/employee/NPWP/".$empl_tax);
            }
            $tax = $this->uploaded('empl_tax', 'NPWP', $id); 
        }

        if(empty($files4)){
            $healthinsurance = $empl_healthinsurance;
        } else {
            if(! $empl_healthinsurance==""){
                unlink("./upload/employee/BPJS-KES/".$empl_healthinsurance);
            }
            $healthinsurance = $this->uploaded('empl_healthinsurance', 'BPJS-KES', $id); 
        }

        if(empty($files5)){
            $emplinsurance = $empl_emplinsurance;
        } else {
            if(! $empl_emplinsurance==""){
                unlink("./upload/employee/BPJS-KET/".$empl_emplinsurance);
            }
            $emplinsurance = $this->uploaded('empl_emplinsurance', 'BPJS-KET', $id); 
        }

        $data = [
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
            'empl_cv' => $cv,	 
            'empl_bankaccount' => $this->input->post('empl_bankaccount'),	
            'empl_idcard' => $idcard,	
            'empl_tax' => $tax,	
            'empl_healthinsurance' => $healthinsurance,	
            'empl_emplinsurance' => $emplinsurance,	
            'empl_password' => '',	
            'empl_lastupdatedate' => date('Y-m-d H:i:s')
        ];

        $this->empl->update($data, $id);
        $this->session->set_flashdata('success', 'Employee has been changed');
        redirect('/hr/employee/view/'.$id);
    }
    
    public function deactivate($id){
        $this->empl->deactivate($id);
        $this->session->set_flashdata('success', 'Employee has been deactivated');
        redirect('/hr/employee/view/'.$id);
    }

    public function activate($id){
        $this->empl->activate($id);
        $this->session->set_flashdata('success', 'Employee has been activated');
        redirect('/hr/employee/view/'.$id);
    }

}