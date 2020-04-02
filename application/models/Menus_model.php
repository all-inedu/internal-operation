<?php
class Menus_model extends CI_model
{
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

}