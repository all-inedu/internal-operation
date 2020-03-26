<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lead extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('client/Lead_model','lead');
    }

    public function index(){
        $data['lead'] = $this->lead->showAll();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/lead/index', $data);
        $this->load->view('templates/f-io');
    }

    public function save(){
        $this->form_validation->set_rules('lead_id','lead id', 'required|is_unique[tbl_lead.lead_id]',
        array('is_unique' => 'Lead ID already created'));
        $this->form_validation->set_rules('lead_name','lead name', 'required|trim');
        if($this->form_validation->run()==FALSE){
            $this->index();
        } else {
            $data = [
                'lead_id' => $this->input->post('lead_id'),
                'lead_name' => $this->input->post('lead_name'),
            ];

            $this->lead->save($data);
            $this->session->set_flashdata('success', 'Lead Source has been created');
            redirect('/client/lead/');
        }
    }

    public function view($id) {
        $data = $this->lead->showId($id);
        echo json_encode($data);
    }

    public function update() {
        $this->form_validation->set_rules('lead_name','lead name', 'required|trim');
        if($this->form_validation->run()==FALSE){
            $this->index();
        } else {
            $id = $this->input->post('lead_id');
            $data = [
                'lead_name' => $this->input->post('lead_name'),
            ];
            // var_dump($data);
            $this->lead->update($data, $id);
            $this->session->set_flashdata('success', 'Lead Source has been changed');
            redirect('/client/lead/');
        }
    }

    public function delete($id){
        $this->lead->delete($id);
        $this->session->set_flashdata('success', 'Lead Source has been deleted');
        redirect('/client/lead/');
    }

    public function import()
	{
            $lead = $_FILES['lead']['name'];
            if(!empty($lead)) {
                $ekstensi  = explode('.',$lead);
                if($ekstensi[1]!="csv") {
                    $this->session->set_flashdata('error', 'Format file must be CSV');
                    redirect('/client/lead/');
                } else {
                    $file = $_FILES['lead']['tmp_name'];

                    $i = 0;
					$handle = fopen($file, "r");
					while (($row = fgetcsv($handle, 2048))) {
						$i++;
						if ($i == 1) continue;
						
						$data = [
							'lead_id' => $row[0],
							'lead_name' => $row[1]
                        ];
                        
                        $num = strlen($row[0]);
                        if($num!=5) {
                            $this->session->set_flashdata('error', 'Please check again, part of lead id!');
                            redirect('/client/lead/');
                        }

						$this->lead->save($data);
					}

                    fclose($handle);
                    $this->session->set_flashdata('success', 'CSV file has been successfully');
                     redirect('/client/lead/'); 
                }
            } else {
                $this->session->set_flashdata('error', 'CSV file is not found');
                redirect('/client/lead/'); 
            }
    }

}