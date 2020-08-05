<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('hr/Employee_model','empl');
    }

    public function As($id)
    {
        $empl_id = $this->session->userdata('empl_id');
        if($empl_id) {
            redirect('/'.$id);
        } 

        if($id=='client'){
            $data['role'] = 'Client Management';
            $data['img'] = 'm-client.png';
        }  else if($id=='bizdev'){
            $data['role'] = 'Business Development';
            $data['img'] = 'm-bizdev.png';
        } else if($id=='finance'){
            $data['role'] = 'Finance';
            $data['img'] = 'm-finance.png';
        } else if($id=='hr'){
            $data['role'] = 'Human Resource';
            $data['img'] = 'm-hr.png';
        } else {
            redirect('');
        }


        $this->form_validation->set_rules('username','username', 'required');
        $this->form_validation->set_rules('password','password', 'required');
        if($this->form_validation->run()==false) {
            $this->load->view('auth/login', $data); 
        } else {
            $this->check($id);
        }
    }

    public function check($id) {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = $this->empl->showEmail($username); 
        if($data) {
            if(empty($data['empl_password'])) {
                // $dataset['empl_email'] = $data['empl_email'];
                // $this->session->set_userdata($dataset);
                // redirect('/auth/login/new-password/'.$id);
                $this->session->set_flashdata('warning', 'Your email has been registered<br> Please contact admin to get your password');
                redirect('/auth/login/as/'.$id);    
            } else {
                
                $role = $data['empl_role'];
                if($role==1) { $roles = 'client' ;} else 
                if($role==2) { $roles = 'bizdev' ;} else 
                if($role==3) { $roles = 'finance' ;} else 
                if($role==4) { $roles = 'hr' ;} else        
                
                if(empty($role)) {
                    $this->session->set_flashdata('warning', 'Please log in at the admin login page');
                    redirect('./');
                }

                if($id!=$roles) {
                    $this->session->set_flashdata('error', 'Please input your account');
                    redirect('/auth/login/as/'.$roles);
                 } else {
                    if (password_verify($password, $data['empl_password'])) {
                        $data['position'] = $id;
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('success', 'Signed in successfully');
                        redirect('/'.$id);  

                    } else {
                        $this->session->set_flashdata('error', 'Your password is wrong');
                        redirect('/auth/login/as/'.$id);
                    }
                }

            }   
        } else {
            $this->session->set_flashdata('error', 'Username not register');
            redirect('/auth/login/as/'.$id);    
        }
        
        // echo json_encode($data);
    }

    public function new_password($id) {  
        $data['empl_email'] = $this->session->userdata('empl_email');
        $datas = $this->empl->showEmail($data['empl_email']);  
        $this->form_validation->set_rules('username','username', 'required');     
        $this->form_validation->set_rules('new_password','new password', 'required');
        if($this->form_validation->run()==false) {
            $this->load->view('auth/new-password', $data); 
        } else {
            $empl_id = $datas['empl_id'];
            if($id=='client') { $role = 1; } else 
            if($id=='bizdev') { $role = 2; } else 
            if($id=='finance') { $role = 3; } else 
            if($id=='hr') { $role = 4; } 

            $password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
            $dt = [
                'empl_password' => $password,
                'empl_role' => $role
            ];
            $this->empl->update($dt, $empl_id);

            if($id=='client') {
                $menus = ['1','5','6','7','8','9','10','11'] ;                       
            } else if($id=='bizdev') {
                $menus = ['2','5','7','12','13','14','15','16'] ;                       
            } else if($id=='finance') {
                $menus = ['3','17','18','19','20','21','22','23','24','25'] ;                       
            } else if($id=='hr') {
                $menus = ['4','26','27','28','29','30','31'] ;                       
            }

            $n = count($menus);
            for($i=0;$i<$n;$i++) {
               $data_menus = [
                   'menus_id' => $menus[$i],
                   'empl_id' => $empl_id,
                   'status' => 1
               ];
               $this->db->insert('tbl_menusdtl', $data_menus);
            }

            $this->session->unset_userdata('empl_email');
            $this->session->set_flashdata('success', 'Please login with your new password');
            redirect('/auth/login/as/'.$id);   
        }
    }

    public function sign_out() {
        $this->session->unset_userdata('empl_id');
        $this->session->unset_userdata('empl_email');
        $this->session->set_flashdata('error', 'Username not register');
        $this->session->set_flashdata('success', 'Successfully logged out');
        redirect('/');  
    }
    
}