<?php
class Invoice_model extends CI_model
{
    public function getId($m, $y){
        $this->db->select('*');
        $this->db->where('MONTH(inv_date)', $m);
        $this->db->where('YEAR(inv_date)', $y);
        $this->db->order_by('inv_id', 'DESC');
        return $this->db->get('tbl_inv')->row_array();
    }

    public function showALl() {
        $this->db->select('inv_num');
        return $this->db->get('tbl_inv')->result_array();
    }

    public function showForInvoice() {
        $this->db->select('*');
        $this->db->where('tbl_stprog.stprog_status', 1);
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->order_by('tbl_stprog.stprog_statusprogdate', 'DESC');
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('tbl_inv.stprog_id', $id); 
        $this->db->join('tbl_stprog','tbl_stprog.stprog_id=tbl_inv.stprog_id');
        $this->db->join('tbl_students','tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog','tbl_prog.prog_id=tbl_stprog.prog_id');
        return $this->db->get('tbl_inv')->row_array();
    }

    public function showInvNum($id){
        $this->db->select('*');
        $this->db->where('tbl_inv.inv_num', $id); 
        $this->db->join('tbl_stprog','tbl_stprog.stprog_id=tbl_inv.stprog_id');
        $this->db->join('tbl_students','tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog','tbl_prog.prog_id=tbl_stprog.prog_id');
        return $this->db->get('tbl_inv')->row_array();
    }

    public function showInvId($id){
        $this->db->select('*');
        $this->db->where('tbl_inv.inv_id', $id); 
        $this->db->join('tbl_stprog','tbl_stprog.stprog_id=tbl_inv.stprog_id');
        $this->db->join('tbl_students','tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog','tbl_prog.prog_id=tbl_stprog.prog_id');
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

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('inv_num', $id);
        $this->db->update('tbl_inv');
    }

    public function delete($id) {
        $this->db->where('inv_num', $id);
        $this->db->delete('tbl_inv');
    }
}