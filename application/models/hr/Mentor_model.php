<?php
class Mentor_model extends CI_model
{    
    public function getId(){
        $this->db->select('RIGHT(tbl_mt.mt_id,4) as kode', FALSE);
		$this->db->order_by('mt_id','DESC');    
		$this->db->limit(1);    
        return $query = $this->db->get('tbl_mt');
    }

    public function showAll(){
        $this->db->select('*');
        $this->db->where('mt_status >=',1);
        $this->db->join('tbl_univ', 'tbl_univ.univ_id = tbl_mt.univ_id');
        return $this->db->get('tbl_mt')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('mt_id', $id); 
        $this->db->join('tbl_univ', 'tbl_univ.univ_id = tbl_mt.univ_id');
        return $this->db->get('tbl_mt')->row_array();
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('mt_id', $id);
        $this->db->update('tbl_mt');
    }
    
    public function showPotentialAll(){
        $this->db->select('*');
        $this->db->where('mt_status',0);
        $this->db->join('tbl_univ', 'tbl_univ.univ_id = tbl_mt.univ_id');
        return $this->db->get('tbl_mt')->result_array();
    }

    public function showPotentialId($id){
        $this->db->select('*');
        $this->db->where('id', $id); 
        $this->db->join('tbl_univ', 'tbl_univ.univ_id = tbl_mt.univ_id');
        return $this->db->get('tbl_mt')->row_array();
    }
    
    public function savePotential($data)
    {
        $this->db->insert('tbl_mt', $data);
    }

    public function updatePotential($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tbl_mt');
    }

    public function convert($id, $data){
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tbl_mt'); 
    }

    public function deactivate($id){
        $this->db->set('mt_status',2);
        $this->db->where('mt_id', $id);
        $this->db->update('tbl_mt'); 
    }

    public function activate($id){
        $this->db->set('mt_status',1);
        $this->db->where('mt_id', $id);
        $this->db->update('tbl_mt'); 
    }

}