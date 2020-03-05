<?php
class SProgram_model extends CI_model
{
    public function showStatus($v) {
        $this->db->select('*');
        $this->db->where('schprog_status', $v);
        return $this->db->get('tbl_schprog')->result_array(); 
    }

    public function showAll() {
        $this->db->select('*');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id = tbl_schprog.prog_id');
        $this->db->join('tbl_sch', 'tbl_sch.sch_id = tbl_schprog.sch_id');
        return $this->db->get('tbl_schprog')->result_array(); 
    }
    
    public function save($data) {
        $this->db->insert('tbl_schprog', $data);
    }

    public function saveProgramExec($data) {
        $this->db->insert('tbl_schprogfix', $data);
    }

    public function showProgramExec($id) {
        $this->db->select('*');
        $this->db->where('tbl_schprogfix.schprog_id', $id);
        return $this->db->get('tbl_schprogfix')->row_array(); 
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('tbl_schprog.sch_id', $id); 
        $this->db->join('tbl_prog', 'tbl_prog.prog_id = tbl_schprog.prog_id');
        $this->db->join('tbl_sch', 'tbl_sch.sch_id = tbl_schprog.sch_id');
        return $this->db->get('tbl_schprog')->result_array();
    }

    public function showSProgId($id){
        $this->db->select('*');
        $this->db->where('tbl_schprog.schprog_id', $id); 
        $this->db->join('tbl_prog', 'tbl_prog.prog_id = tbl_schprog.prog_id');
        $this->db->join('tbl_sch', 'tbl_sch.sch_id = tbl_schprog.sch_id');
        return $this->db->get('tbl_schprog')->row_array();
    }

    public function update($data, $id) {
        $this->db->set($data);
        $this->db->where('schprog_id', $id);
        $this->db->update('tbl_schprog');
    }

    public function updateProgramExec($data, $id) {
        $this->db->set($data);
        $this->db->where('schprogfix_id', $id);
        $this->db->update('tbl_schprogfix');
    }
    
}