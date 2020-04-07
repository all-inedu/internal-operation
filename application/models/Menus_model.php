<?php
class Menus_model extends CI_model
{
    public function showUserMenu()
    {
        $this->db->select('*'); 
        $this->db->join('tbl_empl','tbl_empl.empl_id=tbl_menusdtl.empl_id');
        $this->db->group_by('tbl_menusdtl.empl_id');
        return $this->db->get('tbl_menusdtl')->result_array();
    }

    public function showAllMenu() {
        $this->db->select('*');
        return $this->db->get('tbl_menus')->result_array();
    }

    public function checkMenu($empl_id, $menus_id, $n){
        $this->db->select('*');
        $this->db->where('tbl_menusdtl.empl_id',$empl_id); 
        $this->db->where('tbl_menusdtl.menus_id', $menus_id); 
        $this->db->where('tbl_menusdtl.status', $n);
        return $this->db->get('tbl_menusdtl')->row_array();
    }

    public function showId($empl_id, $n){
        $this->db->select('*');
        $this->db->where('tbl_menusdtl.empl_id',$empl_id); 
        $this->db->where('tbl_menusdtl.status', $n); 
        $this->db->join('tbl_menus','tbl_menus.menus_id=tbl_menusdtl.menus_id');
        $this->db->group_by('tbl_menus.menus_mainmenu');
        $this->db->order_by('tbl_menus.menus_id', 'ASC');
        return $this->db->get('tbl_menusdtl')->result_array();
    }

    public function showMainMenu($empl_id, $main, $n)
    {
        $this->db->select('*');
        $this->db->where('tbl_menusdtl.empl_id',$empl_id); 
        $this->db->where('tbl_menus.menus_mainmenu', $main);  
        $this->db->where('tbl_menusdtl.status', $n);
        $this->db->join('tbl_menus','tbl_menus.menus_id=tbl_menusdtl.menus_id');
        $this->db->order_by('tbl_menus.menus_id', 'ASC');
        return $this->db->get('tbl_menusdtl')->result_array();
    }

    public function delete($id)
    {
        $this->db->where('empl_id', $id);
        $this->db->delete('tbl_menusdtl');
    }

}