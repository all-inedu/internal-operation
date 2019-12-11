<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{

    public function As($id)
    {
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
            redirect('../home');
        }
        $this->load->view('auth/login', $data);
    }
    
}