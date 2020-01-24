<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends CI_Controller
{

    public function index(){
        $data['t'] = ['Flyer','Infopack','Poster','Name Card','ID Card staff','Sticker','Voucher','Totte bag','T-shirt','Banner','Letterhead','Print BW','Print Colour','Notaris'];
        
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/vendor/index', $data);
        $this->load->view('templates/f-io');
    }
    
}