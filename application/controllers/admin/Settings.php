<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('hr/Employee_model','empl');
        $this->load->model('Menus_model','menu');

        $empl_id = $this->session->userdata('empl_id');
        if(empty($empl_id)) {
            redirect('/');
        }
    }

    public function menus($id='') 
    {
        $data['users'] = $this->menu->showUserMenu();
        $data['menus'] = $this->menu->showAllMenu();
        $data['empl'] = $this->empl->showId($id);
        $this->form_validation->set_rules('empl_id', 'empl_id', 'required');
        if($this->form_validation->run()==false ) {
            $this->load->view('admin/settings/user-role', $data);
        } else {
            $this->menu->delete($id);
            $mn = $this->input->post('menus_id');
            $n = count($mn);
            for($i=0;$i<$n;$i++) {
                $data = [
                    'empl_id' => $id,
                    'menus_id' => $mn[$i],
                    'status' => 1
                ];
                $this->db->insert('tbl_menusdtl', $data);
            }
            $this->session->set_flashdata('success', 'Menus has been changed');
            redirect('/admin/settings/menus/'.$id);   
        }
    }

} 
?>