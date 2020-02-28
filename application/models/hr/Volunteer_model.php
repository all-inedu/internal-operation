<?php
class Volunteer_model extends CI_model
{
    public function getId(){
        $this->db->select('RIGHT(tbl_volunt.volunt_id,4) as kode', FALSE);
		$this->db->order_by('volunt_id','DESC');    
		$this->db->limit(1);    
        return $query = $this->db->get('tbl_volunt');
    }

    public function showActive(){
        $this->db->select('*');
        $this->db->where('volunt_status', 1); 
        return $this->db->get('tbl_volunt')->result_array();
    }

    public function showNotActive(){
        $this->db->select('*');
        $this->db->where('volunt_status', 2); 
        return $this->db->get('tbl_volunt')->result_array();
    }
    
    public function showAll(){
        $this->db->select('*');
        return $this->db->get('tbl_volunt')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('volunt_id', $id); 
        return $this->db->get('tbl_volunt')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_volunt', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('volunt_id', $id);
        $this->db->update('tbl_volunt');
    }

    public function deactivate($id){
        $this->db->set('volunt_status', 2);
        $this->db->where('volunt_id', $id);
        $this->db->update('tbl_volunt');
    }

    public function activate($id){
        $this->db->set('volunt_status', 1);
        $this->db->where('volunt_id', $id);
        $this->db->update('tbl_volunt');
    }

}