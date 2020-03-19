<?php
class Reason_model extends CI_model
{
    public function getId(){
        $this->db->select('*');
        $this->db->order_by('reason_id','DESC');
        return $this->db->get('tbl_reason')->row_array();
    }
    
    public function showAll(){
        $this->db->select('*');
        return $this->db->get('tbl_reason')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('reason_id', $id); 
        return $this->db->get('tbl_reason')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_reason', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('reason_id', $id);
        $this->db->update('tbl_reason');
    }

    public function delete($id){
        $this->db->where('reason_id', $id);
        $this->db->delete('tbl_reason');
    }

}