<?php
class StProgram_model extends CI_model
{
    
    public function showStProg($id){
        $this->db->select('*');
        $this->db->where('tbl_stprog.st_num', $id); 
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_stprog.lead_id');
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function save($data, $datas, $id)
    {
        $this->db->insert('tbl_stprog', $data);

        $this->db->set($datas);
        $this->db->where('st_num', $id);
        $this->db->update('tbl_students');
    }

}