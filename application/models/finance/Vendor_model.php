<?php
class Vendor_model extends CI_model
{
    public function getId(){
        $this->db->select('RIGHT(tbl_vendor.vendor_id,4) as kode', FALSE);
		$this->db->order_by('vendor_id','DESC');    
		$this->db->limit(1);    
        return $query = $this->db->get('tbl_vendor');
    }

    public function showAll(){
        $this->db->select('*');
        $this->db->order_by('vendor_id','DESC'); 
        return $this->db->get('tbl_vendor')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('vendor_id', $id); 
        return $this->db->get('tbl_vendor')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_vendor', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('vendor_id', $id);
        $this->db->update('tbl_vendor');
    }

    public function delete($id){
        $this->db->where('vendor_id', $id);
        $this->db->delete('tbl_vendor');
    }

}