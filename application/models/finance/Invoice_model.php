<?php
class Invoice_model extends CI_model
{
    public function getId(){
        $this->db->select('*');
        $this->db->order_by('inv_id', 'DESC');
        return $this->db->get('tbl_inv')->row_array();
    }

    public function showForInvoice() {
        $this->db->select('*');
        $this->db->where('tbl_stprog.stprog_status', 1);
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('stprog_id', $id); 
        return $this->db->get('tbl_inv')->row_array();
    }

    public function save($data)
    {
        $this->db->insert('tbl_inv', $data); 
    }

    public function saveDetail($data)
    {
        $this->db->insert('tbl_invdtl', $data); 
    }
}