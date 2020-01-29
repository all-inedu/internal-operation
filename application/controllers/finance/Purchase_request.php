<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_request extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/purchase-req/index');
        $this->load->view('templates/f-io');
    }

public function add(){
        $data['div'] = ['Client Management', 'Business Development', 'Finance',' IT'];
        $data['status'] = ['Urgent', 'Immediately', 'Can Wait', 'Done'];

        $this->form_validation->set_rules('idPurchase', 'id request', 'required');

        if($this->form_validation->run()==false){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/purchase-req/add-purchase', $data);
        $this->load->view('templates/f-io');
        } else {
            $in = $this->input->post('itemName[]');
            $am = $this->input->post('amount[]');
            $pr = $this->input->post('price[]');
            $tl = $this->input->post('total[]');
            $n = count($in);
            for($i=0;$i<$n;$i++){
                echo $in[$i]." - ".$am[$i]." - ".$pr[$i]." - ".$tl[$i]."<br>";
            }
        }


    }

    public function view() {
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/purchase-req/view-purchase');
        $this->load->view('templates/f-io');
    }
    
}