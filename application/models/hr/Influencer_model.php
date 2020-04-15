<?php
class Influencer_model extends CI_model
{
    public function getId(){
        $this->db->select('infl_id');
        $this->db->order_by('infl_id','DESC');
        return $this->db->get('tbl_infl')->row_array();
    }

    public function showActive(){
        $this->db->select('*');
        $this->db->where('infl_status', 1); 
        return $this->db->get('tbl_infl')->result_array();
    }

    public function showNotActive(){
        $this->db->select('*');
        $this->db->where('infl_status', 2); 
        return $this->db->get('tbl_infl')->result_array();
    }

    public function showAll(){
        $this->db->select('*');
        return $this->db->get('tbl_infl')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('infl_id', $id); 
        return $this->db->get('tbl_infl')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_infl', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('infl_id', $id);
        $this->db->update('tbl_infl');
    }

    // public function delete($id){
    //     $this->db->where('infl_id', $id);
    //     $this->db->delete('tbl_infl');
    // }

    public function deactivate($id){
        $this->db->set('infl_status',2);
        $this->db->where('infl_id', $id);
        $this->db->update('tbl_infl'); 
    }

    public function activate($id){
        $this->db->set('infl_status',1);
        $this->db->where('infl_id', $id);
        $this->db->update('tbl_infl'); 
    }

    public function showStudentsByInfl($id, $n)
    {
        $this->db->select('st_firstname');
        $this->db->where('st_statuscli', $n);
        $this->db->where('infl_id', $id); 
        return $this->db->get('tbl_students')->result_array();
    }
}