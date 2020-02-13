<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_request extends CI_Controller
{

    function __construct(){
        parent::__construct();
    }
    
    public function datas(){
        $data['div'] = ['Client Management', 'Business Development', 'Finance',' IT'];
        $data['status'] = ['Urgent', 'Immediately', 'Can Wait', 'Done'];
        return $data;
    }  

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/purchase-req/index');
        $this->load->view('templates/f-io');
    }

    public function add(){
        $data = $this->datas();

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

    public function edit() {
        $data = $this->datas();

        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/purchase-req/edit-purchase', $data);
        $this->load->view('templates/f-io');
    }

    public function edit_json($i){
        $d['item'] = 'Budi';
        $d['amount'] = 12;
        $d['price'] = 45000;
        $d['total'] = $d['amount']*$d['price'];

        echo json_encode($d);
    }
    
}