<?php
class University_model extends CI_model
{
    public function getId(){
        $this->db->select('RIGHT(tbl_univ.univ_id,3) as kode', FALSE);
		$this->db->order_by('univ_id','DESC');    
		$this->db->limit(1);    
        return $query = $this->db->get('tbl_univ');
    }
    
    public function showAll(){
        $this->db->select('*');
        $this->db->where('univ_id !=', '');
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