<?php
class Employee_model extends CI_model
{
    public function getId(){
        $this->db->select('RIGHT(tbl_empl.empl_id,4) as kode', FALSE);
		$this->db->order_by('empl_id','DESC');    
		$this->db->limit(1);    
        return $query = $this->db->get('tbl_empl');
    }

    public function showActive() {
        $this->db->select('*');
        $this->db->where('empl_isactive', 1); 
        return $this->db->get('tbl_empl')->result_array();
    }

    public function showNotActive() {
        $this->db->select('*');
        $this->db->where('empl_isactive', 2); 
        return $this->db->get('tbl_empl')->result_array();
    }
    
    public function showAll(){
        $this->db->select('*');
        return $this->db->get('tbl_empl')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('empl_id', $id); 
        return $this->db->get('tbl_empl')->row_array();
    }

    public function showEmail($username){
        $this->db->select('*');
        $this->db->where('empl_email', $username);
        $this->db->where('empl_isactive', 1);  
        return $this->db->get('tbl_empl')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_empl', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('empl_id', $id);
        $this->db->update('tbl_empl');
    }

    public function delete($id){
        $this->db->where('empl_id', $id);
        $this->db->delete('tbl_empl');
    }

    public function deactivate($id){
        $this->db->set('empl_isactive',2);
        $this->db->where('empl_id', $id);
        $this->db->update('tbl_empl'); 
    }

    public function activate($id){
        $this->db->set('empl_isactive',1);
        $this->db->where('empl_id', $id);
        $this->db->update('tbl_empl'); 
    }

    public function export_enable($id){
        $this->db->set('empl_export',1);
        $this->db->where('empl_id', $id);
        $this->db->update('tbl_empl'); 
    }

    public function export_disable($id){
        $this->db->set('empl_export',0);
        $this->db->where('empl_id', $id);
        $this->db->update('tbl_empl'); 
    }

}