<?php
class University_model extends CI_model
{
    public function showAll(){
        $this->db->select('*');
        return $this->db->get('tbl_univ')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('univ_id', $id); 
        return $this->db->get('tbl_univ')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_univ', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('univ_id', $id);
        $this->db->update('tbl_univ');
    }

    public function delete($id){
        $this->db->where('univ_id', $id);
        $this->db->delete('tbl_univ');
    }

}