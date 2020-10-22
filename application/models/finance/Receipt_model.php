<?php
class Receipt_model extends CI_model
{
    public function getId($m, $y){
        $this->db->select('*');
        $this->db->where('MONTH(receipt_date)', $m);
        $this->db->where('YEAR(receipt_date)', $y);
        $this->db->order_by('receipt_id', 'DESC');
        return $this->db->get('tbl_receipt')->row_array();
    }

    public function showId($id) {
        $this->db->select('*');
        $this->db->where('receipt_num', $id);
        $this->db->join('tbl_inv', 'tbl_inv.inv_id=tbl_receipt.inv_id');
        // $this->db->join('tbl_invdtl', 'tbl_invdtl.invdtl_id=tbl_receipt.invdtl_id');
        $this->db->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_inv.stprog_id');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        return $this->db->get('tbl_receipt')->row_array();
    }

    public function showAlls() {
        $this->db->select('receipt_id');
        return $this->db->get('tbl_receipt')->result_array();
    }

    public function showAll() {
        $this->db->select('*');
        $this->db->join('tbl_inv', 'tbl_inv.inv_id=tbl_receipt.inv_id');
        $this->db->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_inv.stprog_id');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->order_by('tbl_receipt.receipt_date','DESC');
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

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('receipt_num', $id);
        $this->db->update('tbl_receipt');
    }

    public function showAllB2B() {
        $this->db->select('*');
        $this->db->join('tbl_invsch', 'tbl_invsch.invsch_id=tbl_receipt.inv_id');
        $this->db->join('tbl_schprog', 'tbl_schprog.schprog_id=tbl_invsch.schprog_id');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_schprog.prog_id');
        $this->db->join('tbl_sch', 'tbl_sch.sch_id=tbl_schprog.sch_id');
        $this->db->order_by('tbl_receipt.receipt_num','DESC');
        return $this->db->get('tbl_receipt')->result_array();
    }

    public function showIdB2B($id) {
        $this->db->select('*');
        $this->db->where('receipt_num', $id);
        $this->db->join('tbl_invsch', 'tbl_invsch.invsch_id=tbl_receipt.inv_id');
        $this->db->join('tbl_schprog', 'tbl_schprog.schprog_id=tbl_invsch.schprog_id');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_schprog.prog_id');
        $this->db->join('tbl_sch', 'tbl_sch.sch_id=tbl_schprog.sch_id');
        $this->db->order_by('tbl_receipt.receipt_id','DESC');
        return $this->db->get('tbl_receipt')->row_array();
    }

    public function showRevenue($lm, $ly) {
        $this->db->select_sum('receipt_amount','amount');
        $this->db->select_sum('receipt_refund','refund');
        $this->db->select('MONTH(receipt_date) as m, YEAR(receipt_date) as y');
        $this->db->where('EXTRACT(YEAR_MONTH FROM receipt_date) >=', $ly.$lm);
        $this->db->group_by('MONTH(receipt_date)');
        $this->db->order_by('receipt_date', 'ASC');
        return $this->db->get('tbl_receipt')->result_array();
    }

}
?>