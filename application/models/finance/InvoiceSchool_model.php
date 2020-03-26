<?php
class InvoiceSchool_model extends CI_model
{
    public function getId($m, $y){
        $this->db->select('*');
        $this->db->where('MONTH(invsch_date)', $m);
        $this->db->where('YEAR(invsch_date)', $y);
        $this->db->order_by('invsch_id', 'DESC');
        return $this->db->get('tbl_invsch')->row_array();
    }
    
    public function showId($id){
        $this->db->select('*');
        $this->db->where('tbl_invsch.schprog_id', $id); 
        $this->db->join('tbl_schprog','tbl_schprog.schprog_id=tbl_invsch.schprog_id');
        $this->db->join('tbl_sch','tbl_sch.sch_id=tbl_schprog.sch_id');
        $this->db->join('tbl_prog','tbl_prog.prog_id=tbl_schprog.prog_id');
        return $this->db->get('tbl_invsch')->row_array();
    }

    public function showInvId($id){
        $this->db->select('*');
        $this->db->where('tbl_invsch.invsch_id', $id); 
        $this->db->join('tbl_schprog','tbl_schprog.schprog_id=tbl_invsch.schprog_id');
        $this->db->join('tbl_sch','tbl_sch.sch_id=tbl_schprog.sch_id');
        $this->db->join('tbl_prog','tbl_prog.prog_id=tbl_schprog.prog_id');
        return $this->db->get('tbl_invsch')->row_array();
    }

    public function save($data){
        $this->db->insert('tbl_invsch', $data); 
    }

    public function update($data, $id) {
        $this->db->set($data);
        $this->db->where('schprog_id', $id);
        $this->db->update('tbl_invsch');
    }

    public function delete($id) {
        $this->db->where('schprog_id', $id);
        $this->db->delete('tbl_invsch');
    }

}