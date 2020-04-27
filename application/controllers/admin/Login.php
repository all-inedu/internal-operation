<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('hr/Employee_model','empl');
    }

    public function index()
    {
        $empl_id = $this->session->userdata('empl_id');
        $position = $this->session->userdata('position');
        if($position) {
            redirect('/');
        } else
        if($empl_id) {
            redirect('admin/');
        } 

        $this->form_validation->set_rules('username','username', 'required');
        $this->form_validation->set_rules('password','password', 'required');
        if($this->form_validation->run()==false) {
            $this->load->view('admin/login');
        } else {
            $this->check();
        }
    }

    public function check() 
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = $this->empl->showEmail($username);
        if($data) {
            if(empty($data['empl_password'])) {
                $dataset['empl_email'] = $data['empl_email'];
                $this->session->set_userdata($dataset);
                redirect('/admin/login/new-password/');
            } else {
                $role = $data['empl_role'];
                 if($role!=0) {
                    $this->session->set_flashdata('error', 'Your account is not an admin');
                    redirect('/');
                 } else {
                    if (password_verify($password, $data['empl_password'])) {
                        $data['position'] = $id;
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('login', 'Signed in successfully');
                        redirect('/admin/home');  

                    } else {
                        $this->session->set_flashdata('error', 'Your password is wrong');
                        redirect('/admin/login');
                    }
                }

            }   
        } else {
            $this->session->set_flashdata('error', 'Username not register');
            redirect('/');    
        }
        
    }

    public function new_password()
    {
        $data['empl_email'] = $this->session->userdata('empl_email');
        $datas = $this->empl->showEmail($data['empl_email']); 
        $this->load->view('admin/new-password', $data);
        $this->form_validation->set_rules('new_password','new password', 'required');
        if($this->form_validation->run()==false) {
            $this->load->view('admin/new-password', $data); 
        } else {
            $empl_id = $datas['empl_id'];
            $password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
            $dt = [
                'empl_password' => $password,
            ];
            $this->empl->update($dt, $empl_id);
            $this->session->unset_userdata('empl_email');
            $this->session->set_flashdata('success', 'Please login with your new password');
            redirect('/admin/login/');   
        }
    }

}