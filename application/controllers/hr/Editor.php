<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('bank');
        $this->load->model('hr/Editor_model','editor');
        $this->load->model('bizdev/University_model','univ');
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
    
    public function index(){
        $data['editor'] = $this->editor->showAll();
        $this->load->view('templates/s-io');
        $this->load->view('hr/editor/index.php',$data);
        $this->load->view('templates/f-io');
    }

    public function uploaded($file, $path, $id){
        $config['upload_path']          = './upload/editor/'.$path;
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
            redirect('/hr/editor/add');
        }
    }
    
    public function add(){
        $this->form_validation->set_rules('editor_fn', 'first name','required');
        $this->form_validation->set_rules('editor_mail', 'email','required|is_unique[tbl_empl.empl_email]',
        array('is_unique' => 'Email already used'));
        $this->form_validation->set_rules('editor_phone', 'phone number','required');

        if($this->form_validation->run()==FALSE) {
            $data['univ'] = $this->univ->showAll();
            $data['bank'] = $this->bank->showBank();

            $this->load->view('templates/s-io');
            $this->load->view('hr/editor/add-editor.php', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->save();
        }
    }

    public function save(){
        $query = $this->editor->getId();  
		if($query->num_rows() <> 0){   
            $data = $query->row();      
            $id = intval($data->kode) + 1;    
		} else {   
		    $id = 1;    
		}
        $idmax = str_pad($id, 4, "0", STR_PAD_LEFT); 
        $newid = "ED-".$idmax;

        $files1 = $_FILES['editor_cv']['name'];
        $files2 = $_FILES['editor_ktp']['name'];
        $files3 = $_FILES['editor_npwp']['name'];

        if(empty($files1)){$cv = "";} else {$cv = $this->uploaded('editor_cv', 'CV', $newid);}
        if(empty($files2)){$ktp = "";} else {$ktp = $this->uploaded('editor_ktp', 'KTP', $newid);}
        if(empty($files3)){$npwp = "";} else {$npwp = $this->uploaded('editor_npwp', 'NPWP', $newid);}

        $data = [
            'editor_id' => $newid,
            'editor_fn' => $this->input->post('editor_fn'),
            'editor_ln' => $this->input->post('editor_ln'),
            'editor_address' => $this->input->post('editor_address'),
            'editor_major' => $this->input->post('editor_major'),
            'univ_id' => $this->input->post('editor_gradfrom'),
            'editor_mail' => $this->input->post('editor_mail'),
            'editor_phone' => $this->input->post('editor_phone'),
            'editor_position' => $this->input->post('editor_position'),
            'editor_feephours' => $this->input->post('editor_feephours'),
            'editor_status' => 1,
            'editor_bankname' => $this->input->post('editor_bankname'),
            'editor_bankacc' => $this->input->post('editor_bankacc'),
            'editor_cv' => $cv,
            'editor_ktp' => $ktp,
            'editor_npwp' => $npwp,
            'editor_lastupdate' => date('Y-m-d H:i:s'),
        ];

        $this->editor->save($data);
        $this->session->set_flashdata('success', 'Editor have been created');
        redirect('/hr/editor/view/'.$newid);
    }

    public function view($id){
        $data['editor'] = $this->editor->showId($id);
        if($data['editor']){
        $this->load->view('templates/s-io');
        $this->load->view('hr/editor/view-editor.php', $data);
        $this->load->view('templates/f-io');
        } else {
            $this->session->set_flashdata('warning', 'Editor id is not found');
            redirect('/hr/editor/');
        }
    }

    public function edit($id){
        $this->form_validation->set_rules('editor_fn', 'first name', 'required');
        $this->form_validation->set_rules('editor_mail', 'email', 'required');
        $this->form_validation->set_rules('editor_phone', 'phone number', 'required');

        if($this->form_validation->run()==FALSE) {
            $data['editor'] = $this->editor->showId($id);
            $data['univ'] = $this->univ->showAll();
            $data['bank'] = $this->bank->showBank();

            $this->load->view('templates/s-io');
            $this->load->view('hr/editor/edit-editor.php', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->update();
        }
    }

    public function update() {
        
        $id = $this->input->post('editor_id');
        $editor = $this->editor->showId($id);
        // echo json_encode($editor);
        
        $files1 = $_FILES['editor_cv']['name'];
        $files2 = $_FILES['editor_ktp']['name'];
        $files3 = $_FILES['editor_npwp']['name'];

        if(empty($files1)){
            $cv = $editor['editor_cv'];
        } else {
            if(! $editor['editor_cv']==""){
                unlink("./upload/editor/CV/".$editor['editor_cv']);
            }
            $cv = $this->uploaded('editor_cv', 'CV', $id);
        }

        if(empty($files2)){
            $ktp = $editor['editor_ktp'];
        } else {
            if(! $editor['editor_ktp']==""){
                unlink("./upload/editor/KTP/".$editor['editor_ktp']);
            }
            $ktp = $this->uploaded('editor_ktp', 'KTP', $id);
        }

        if(empty($files3)){
            $npwp = $editor['editor_npwp'];
        } else {
            if(! $editor['editor_npwp']==""){
                unlink("./upload/editor/NPWP/".$editor['editor_npwp']);
            }
            $npwp = $this->uploaded('editor_npwp', 'NPWP', $id);
        }

        $data = [
            'editor_fn' => $this->input->post('editor_fn'),
            'editor_ln' => $this->input->post('editor_ln'),
            'editor_address' => $this->input->post('editor_address'),
            'editor_major' => $this->input->post('editor_major'),
            'univ_id' => $this->input->post('editor_gradfrom'),
            'editor_mail' => $this->input->post('editor_mail'),
            'editor_phone' => $this->input->post('editor_phone'),
            'editor_position' => $this->input->post('editor_position'),
            'editor_feephours' => $this->input->post('editor_feephours'),
            'editor_status' => 1,
            'editor_bankname' => $this->input->post('editor_bankname'),
            'editor_bankacc' => $this->input->post('editor_bankacc'),
            'editor_cv' => $cv,
            'editor_ktp' => $ktp,
            'editor_npwp' => $npwp,
            'editor_lastupdate' => date('Y-m-d H:i:s'),
        ];

        // echo json_encode($data);
        $this->editor->update($data, $id);
        $this->session->set_flashdata('success', 'Editor have been changed');
        redirect('/hr/editor/view/'.$id);
    }

    public function deactivate($id){
        $this->editor->deactivate($id);
        $this->session->set_flashdata('success', 'Editor has been deactivated');
        redirect('/hr/editor/view/'.$id);
    }

    public function activate($id){
        $this->editor->activate($id);
        $this->session->set_flashdata('success', 'Editor has been activated');
        redirect('/hr/editor/view/'.$id);
    }
}
?>