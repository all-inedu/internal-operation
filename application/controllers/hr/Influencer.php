<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Influencer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('hr/Influencer_model','infl');
        $this->load->library('bank');
        $this->load->model('Menus_model','menu');
        
        $empl_id = $this->session->userdata('empl_id');
        if(empty($empl_id)) {
            redirect('/');
        } else {
            $data['empl_id'] = $empl_id;
            $data['menus'] = $this->menu->showId($empl_id, 1);
            $this->load->view('templates/h-io', $data);
            // echo json_encode($data);
        }
    }

    public function uploaded($file, $path, $id){
        $config['upload_path']          = './upload/influencer/'.$path;
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
            redirect('/hr/influencer/add');
        }
    }

    public function index(){
        $data['infl'] = $this->infl->showAll();
        $this->load->view('templates/s-io');
        $this->load->view('hr/influencer/index.php', $data);
        $this->load->view('templates/f-io');
    }

    public function add(){      
        $this->form_validation->set_rules('infl_fn', 'full name','required');
        $this->form_validation->set_rules('infl_mail', 'email','required|is_unique[tbl_empl.empl_email]',
        array('is_unique' => 'Email already used'));
        $this->form_validation->set_rules('infl_phone', 'phone number','required');

        if($this->form_validation->run()==FALSE) {
            $data['bank'] = $this->bank->showBank();

            $this->load->view('templates/s-io');
            $this->load->view('hr/influencer/add-influencer.php', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->save();
        }
    }

    public function save(){
        $id = $this->infl->getId();
        $newid = $id['infl_id'] + 1 ;
        
        $files1 = $_FILES['infl_ktp']['name'];
        $files2 = $_FILES['infl_npwp']['name'];
        
        if(empty($files1)){$ktp = "";} else {$ktp = $this->uploaded('infl_ktp', 'KTP', $newid);}
        if(empty($files2)){$npwp = "";} else {$npwp = $this->uploaded('infl_npwp', 'NPWP', $newid);}

        $data = [
            'infl_id' => $newid,
            'infl_fn' => $this->input->post('infl_fn'),
            'infl_mail' => $this->input->post('infl_mail'),
            'infl_address' => $this->input->post('infl_address'),
            'infl_phone' => $this->input->post('infl_phone'),
            'infl_feeperpost' => $this->input->post('infl_feeperpost'),
            'infl_banknm' => $this->input->post('infl_banknm'),
            'infl_bankacc' => $this->input->post('infl_bankacc'),
            'infl_ktp' => $ktp,
            'infl_npwp' => $npwp,
            'infl_status' => 1,
            'infl_lastupdate' => date('Y-m-d H:i:s')
        ];

        $this->infl->save($data);
        $this->session->set_flashdata('success', 'Influencer have been created');
        redirect('/hr/influencer/view/'.$newid);
    }

    public function view($id){
        $data['infl'] = $this->infl->showId($id);
        if($data['infl']){

            $this->load->view('templates/s-io');
            $this->load->view('hr/influencer/view-influencer.php', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->session->set_flashdata('warning', 'Influencer id is not found');
            redirect('/hr/influencer/');
        }
    }

    public function edit($id){
        $this->form_validation->set_rules('infl_fn', 'full name','required');
        if($this->form_validation->run()==FALSE) {
            $data['infl'] = $this->infl->showId($id);
            $data['bank'] = $this->bank->showBank();

            $this->load->view('templates/s-io');
            $this->load->view('hr/influencer/edit-influencer.php', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->update();
        }
    }

    public function update() {
        $id = $this->input->post('infl_id');
        $infl = $this->infl->showId($id);
        // echo json_encode($infl);
        
        $files1 = $_FILES['infl_ktp']['name'];
        $files2 = $_FILES['infl_npwp']['name'];

        if(empty($files1)){
            $ktp = $infl['infl_ktp'];
        } else {
            if(! $infl['infl_ktp']==""){
                unlink("./upload/influencer/KTP/".$infl['infl_ktp']);
            }
            $ktp = $this->uploaded('infl_ktp', 'KTP', $id);
        }

        if(empty($files2)){
            $npwp = $infl['infl_npwp'];
        } else {
            if(! $infl['infl_npwp']==""){
                unlink("./upload/influencer/NPWP/".$infl['infl_npwp']);
            }
            $npwp = $this->uploaded('infl_npwp', 'NPWP', $id);
        }


        $data = [
            'infl_fn' => $this->input->post('infl_fn'),
            'infl_mail' => $this->input->post('infl_mail'),
            'infl_address' => $this->input->post('infl_address'),
            'infl_phone' => $this->input->post('infl_phone'),
            'infl_feeperpost' => $this->input->post('infl_feeperpost'),
            'infl_banknm' => $this->input->post('infl_banknm'),
            'infl_bankacc' => $this->input->post('infl_bankacc'),
            'infl_ktp' => $ktp,
            'infl_npwp' => $npwp,
            'infl_status' => 1,
            'infl_lastupdate' => date('Y-m-d H:i:s')
        ];

        $this->infl->update($data, $id);
        $this->session->set_flashdata('success', 'Influencer have been changed');
        redirect('/hr/influencer/view/'.$id);
    }

    public function deactivate($id){
        $this->infl->deactivate($id);
        $this->session->set_flashdata('success', 'Influencer has been deactivated');
        redirect('/hr/influencer/view/'.$id);
    }

    public function activate($id){
        $this->infl->activate($id);
        $this->session->set_flashdata('success', 'Influencer has been activated');
        redirect('/hr/influencer/view/'.$id);
    }
}
?>