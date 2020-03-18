<?php
class Receipt_model extends CI_model
{
    public function getId(){
        $this->db->select('*');
        $this->db->order_by('receipt_id', 'DESC');
        return $this->db->get('tbl_receipt')->row_array();
    }

    public function showId($id) {
        $this->db->select('*');
        $this->db->where('receipt_num', $id);
        $this->db->join('tbl_inv', 'tbl_inv.inv_id=tbl_receipt.inv_id');
        $this->db->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_inv.stprog_id');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        return $this->db->get('tbl_receipt')->row_array();
    }

    public function showAll() {
        $this->db->select('*');
        $this->db->join('tbl_inv', 'tbl_inv.inv_id=tbl_receipt.inv_id');
        $this->db->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_inv.stprog_id');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        return $this->db->get('tbl_receipt')->result_array();
    }

    public function showByInvId($id){
        $this->db->select('*');
        $this->db->where('inv_id', $id);
        return $this->db->get('tbl_receipt')->row_array();
    }

    public function showByInvdtlId($id){
        $this->db->select('*');
        $this->db->where('invdtl_id', $id);
        return $this->db->get('tbl_receipt')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_receipt', $data); 
    }

}
?>