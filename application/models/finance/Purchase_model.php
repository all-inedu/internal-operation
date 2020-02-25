<?php
class Purchase_model extends CI_model
{
    public function getId(){
        $this->db->select('RIGHT(tbl_purchase.purchase_id,4) as kode', FALSE);
		$this->db->order_by('purchase_id','DESC');    
		$this->db->limit(1);    
        return $query = $this->db->get('tbl_purchase');
    }

    public function showAll(){
        $this->db->select('*');
        $this->db->order_by('purchase_id','DESC'); 
        return $this->db->get('tbl_purchase')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('purchase_id', $id); 
        return $this->db->get('tbl_purchase')->row_array();
    }

    public function showDetail($id){
        $this->db->select('*');
        $this->db->where('purchase_id', $id); 
        return $this->db->get('tbl_purchasedtl')->result_array();
    }

    public function showIdDetail($id){
        $this->db->select('*');
        $this->db->where('purchasedtl_id', $id); 
        return $this->db->get('tbl_purchasedtl')->row_array();
    }
    
    public function save($data1)
    {
        $this->db->insert('tbl_purchase', $data1);
    }

    public function saveDetail($data2)
    {
        $this->db->insert('tbl_purchasedtl', $data2);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('purchase_id', $id);
        $this->db->update('tbl_purchase');
    }

    public function updateDetail($data, $id)
    {
        $this->db->set($data);
        $this->db->where('purchasedtl_id', $id);
        $this->db->update('tbl_purchasedtl'); 
    }

    public function deleteDetail($id)
    {
        $this->db->where('purchasedtl_id', $id);
        $this->db->delete('tbl_purchasedtl');
    }

    public function delete($id){
        $this->db->where('purchase_id', $id);
        $this->db->delete('tbl_purchase');

        $this->db->where('purchase_id', $id);
        $this->db->delete('tbl_purchasedtl');
    }

}