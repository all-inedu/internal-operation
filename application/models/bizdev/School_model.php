<?php
class School_model extends CI_model
{
    public function getId(){
        $this->db->select('RIGHT(tbl_sch.sch_id,4) as kode', FALSE);
		$this->db->order_by('sch_id','DESC');    
		$this->db->limit(1);    
        return $query = $this->db->get('tbl_sch');
    }
    
    public function showAll(){
        $this->db->select('*');
        return $this->db->get('tbl_sch')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('sch_id', $id); 
        return $this->db->get('tbl_sch')->row_array();
    }

    public function showDetail($id){
        $this->db->select('*');
        $this->db->where('sch_id', $id); 
        return $this->db->get('tbl_schdetail')->result_array();
    }

    public function showDetailId($id){
        $this->db->select('*');
        $this->db->where('schdetail_id', $id); 
        return $this->db->get('tbl_schdetail')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_sch', $data);
    }

    public function saveDetail($datas)
    {
        $this->db->insert('tbl_schdetail', $datas);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('sch_id', $id);
        $this->db->update('tbl_sch');
    }

    public function updateDetail($data, $id)
    {
        $this->db->set($data);
        $this->db->where('schdetail_id', $id);
        $this->db->update('tbl_schdetail');
    }

    public function delete($id){
        $this->db->where('sch_id', $id);
        $this->db->delete('tbl_sch');

        $this->db->where('sch_id', $id);
        $this->db->delete('tbl_schdetail');

        $this->db->where('sch_id', $id);
        $this->db->delete('tbl_schprog');
    }

    public function deleteDetail($id){
        $this->db->where('schdetail_id', $id);
        $this->db->delete('tbl_schdetail');
    }

}