<?php
class Program_model extends CI_model
{
    public function showAll(){
        $this->db->select('*');
        return $this->db->get('tbl_prog')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('prog_id', $id); 
        return $this->db->get('tbl_prog')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_prog', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('prog_id', $id);
        $this->db->update('tbl_prog');
    }

    public function delete($id){
        $this->db->where('prog_id', $id);
        $this->db->delete('tbl_prog');
    }

}