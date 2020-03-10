<?php
class CProgram_model extends CI_model
{
    public function showCorporate() {
        $this->db->select('*');
        $this->db->group_by('corp_id');
        return $this->db->get('tbl_corprog')->result_array(); 
    }

    public function showStatus($n) {
        $this->db->select('*');
        $this->db->where('corprog_status',$n);
        return $this->db->get('tbl_corprog')->result_array(); 
    }

    public function showAll() {
        $this->db->select('*');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id = tbl_corprog.prog_id');
        $this->db->join('tbl_corp', 'tbl_corp.corp_id = tbl_corprog.corp_id');
        return $this->db->get('tbl_corprog')->result_array(); 
    }
    
    public function save($data) {
        $this->db->insert('tbl_corprog', $data);
    }


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

    public function delete($id) {
        $this->db->where('corprog_id', $id);
        $this->db->delete('tbl_corprog');
    }

}