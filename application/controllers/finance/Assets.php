<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assets extends CI_Controller
{

    public function index(){
        $data['m'] = ['Merk1','Merk2'];
        $data['c'] = ['Good','Good Enough','Not Good'];
        $data['s'] = ['Equipment', 'Supplies', 'SRP Equipment'];
        
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/assets/index', $data);
        $this->load->view('templates/f-io');
    }
    
}