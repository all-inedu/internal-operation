<?php
class InvoiceDetail_model extends CI_model
{
    public function showId($id){
        $this->db->select('*');
        $this->db->where('tbl_invdtl.inv_id', $id); 
        return $this->db->get('tbl_invdtl')->result_array();
    }

    public function showDetailId($id){
        $this->db->select('*');
        $this->db->where('tbl_invdtl.invdtl_id', $id); 
        return $this->db->get('tbl_invdtl')->row_array();
    }

    public function save($data)
    {
        $this->db->insert('tbl_invdtl', $data); 
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('invdtl_id', $id);
        $this->db->update('tbl_invdtl');
    }

    public function delete($id) {
        $this->db->where('invdtl_id', $id);
        $this->db->delete('tbl_invdtl');
    }
}