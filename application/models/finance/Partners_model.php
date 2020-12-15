<?php
class Partners_model extends CI_model
{

    public function showAll(){
        $this->db->select('*');
        $this->db->order_by('pt_id','DESC'); 
        return $this->db->get('tbl_pt')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('pt_id', $id); 
        return $this->db->get('tbl_pt')->row_array();
    }

    public function save($data){
        $this->db->insert('tbl_pt', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('pt_id', $id);
        $this->db->update('tbl_pt');
    }

    public function delete($id){
        $this->db->where('pt_id', $id);
        $this->db->delete('tbl_pt');
    }

}