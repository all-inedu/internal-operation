<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Change_password extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('hr/Employee_model','empl');

        $empl_id = $this->session->userdata('empl_id');
        if(empty($empl_id)) {
            redirect('/');
        }

    }

    public function index() 
    {
        $data['empl_email'] = $this->session->userdata('empl_email');
        $empl_id = $this->session->userdata('empl_id');
        
        $this->form_validation->set_rules('new_password','password', 'required|min_length[6]');
        if($this->form_validation->run()==false){
            $this->load->view('profile/index', $data);
        } else {
            $password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
            $data = [
                'empl_password' => $password
            ];
            $this->empl->update($data, $empl_id);
            $this->session->set_flashdata('success', 'Your password has been updated');
            redirect('/profile/change-password');   
        }
    }

}

?>