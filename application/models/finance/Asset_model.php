<?php
class Asset_model extends CI_model
{
    public function getId(){
        $this->db->select('RIGHT(tbl_asset.asset_id,4) as kode', FALSE);
		$this->db->order_by('asset_id','DESC');    
		$this->db->limit(1);    
        return $query = $this->db->get('tbl_asset');
    }

    public function showAll(){
        $this->db->select('*');
        $this->db->order_by('asset_id','DESC'); 
        return $this->db->get('tbl_asset')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('asset_id', $id); 
        return $this->db->get('tbl_asset')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_asset', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('asset_id', $id);
        $this->db->update('tbl_asset');
    }

    public function delete($id){
        $this->db->where('asset_id', $id);
        $this->db->delete('tbl_asset');
    }

}