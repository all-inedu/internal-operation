<?php
class Parents_model extends CI_model
{
    public function getId() {
        $this->db->select_max('pr_id');
        return $this->db->get('tbl_parents')->row_array();
    }

    public function showAll(){
        $this->db->select('*');
        return $this->db->get('tbl_parents')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('pr_id', $id); 
        return $this->db->get('tbl_parents')->row_array();
    }

    public function save($data)
    {
        $this->db->insert('tbl_parents', $data);
    }

}