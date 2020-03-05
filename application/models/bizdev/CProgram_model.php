<?php
class CProgram_model extends CI_model
{
    public function showAll() {
        $this->db->select('*');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id = tbl_corprog.prog_id');
        $this->db->join('tbl_corp', 'tbl_corp.corp_id = tbl_corprog.corp_id');
        return $this->db->get('tbl_corprog')->result_array(); 
    }
    
    public function save($data) {
        $this->db->insert('tbl_corprog', $data);
    }

    // public function saveProgramExec($data) {
    //     $this->db->insert('tbl_corprogfix', $data);
    // }

    // public function showProgramExec($id) {
    //     $this->db->select('*');
    //     $this->db->where('tbl_corprogfix.schprog_id', $id);
    //     return $this->db->get('tbl_corprogfix')->row_array(); 
    // }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('tbl_corprog.corp_id', $id); 
        $this->db->join('tbl_prog', 'tbl_prog.prog_id = tbl_corprog.prog_id');
        $this->db->join('tbl_corp', 'tbl_corp.corp_id = tbl_corprog.corp_id');
        return $this->db->get('tbl_corprog')->result_array();
    }

    public function showSProgId($id){
        $this->db->select('*');
        $this->db->where('tbl_corprog.corprog_id', $id); 
        $this->db->join('tbl_prog', 'tbl_prog.prog_id = tbl_corprog.prog_id');
        $this->db->join('tbl_corp', 'tbl_corp.corp_id = tbl_corprog.corp_id');
        return $this->db->get('tbl_corprog')->row_array();
    }

    public function update($data, $id) {
        $this->db->set($data);
        $this->db->where('corprog_id', $id);
        $this->db->update('tbl_corprog');
    }

    // public function updateProgramExec($data, $id) {
    //     $this->db->set($data);
    //     $this->db->where('schprogfix_id', $id);
    //     $this->db->update('tbl_corprogfix');
    // }
    
}