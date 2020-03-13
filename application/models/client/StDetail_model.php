<?php
class StDetail_model extends CI_model
{

    public function showId($id) {
        $this->db->select('*');
        $this->db->where('st_id', $id); 
        return $this->db->get('tbl_stdetail')->row_array();
    }

    public function save($data)
    {
        $this->db->insert('tbl_stdetail', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('st_id', $id);
        $this->db->update('tbl_stdetail');
    }

}