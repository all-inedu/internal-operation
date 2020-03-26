<?php
class PPHFinal_model extends CI_model
{
    public function showAll($m, $y){
        $this->db->select('*');
        $this->db->where('month(receipt_date)', $m);
        $this->db->where('year(receipt_date)', $y);
        $this->db->order_by('receipt_id', 'ASC');
        return $this->db->get('tbl_receipt')->result_array();
    }
}