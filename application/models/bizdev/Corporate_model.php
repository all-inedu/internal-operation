<?php
class Corporate_model extends CI_model
{
    public function getId(){
        $this->db->select('RIGHT(tbl_corp.corp_id,4) as kode', FALSE);
		$this->db->order_by('corp_id','DESC');    
		$this->db->limit(1);    
        return $query = $this->db->get('tbl_corp');
    }
    
    public function showAll(){
        $this->db->select('*');
        return $this->db->get('tbl_corp')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('corp_id', $id); 
        return $this->db->get('tbl_corp')->row_array();
    }

    public function showDetail($id){
        $this->db->select('*');
        $this->db->where('corp_id', $id); 
        return $this->db->get('tbl_corpdetail')->result_array();
    }

    public function showDetailId($id){
        $this->db->select('*');
        $this->db->where('corpdetail_id', $id); 
        return $this->db->get('tbl_corpdetail')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_corp', $data);
    }

    public function saveDetail($datas)
    {
        $this->db->insert('tbl_corpdetail', $datas);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('corp_id', $id);
        $this->db->update('tbl_corp');
    }

    public function updateDetail($data, $id)
    {
        $this->db->set($data);
        $this->db->where('corpdetail_id', $id);
        $this->db->update('tbl_corpdetail');
    }

    public function delete($id){
        $this->db->where('corp_id', $id);
        $this->db->delete('tbl_corp');

        $this->db->where('corp_id', $id);
        $this->db->delete('tbl_corpdetail');

        $this->db->where('corp_id', $id);
        $this->db->delete('tbl_corprog');
    }

    public function deleteDetail($id){
        $this->db->where('corpdetail_id', $id);
        $this->db->delete('tbl_corpdetail');
    }

}