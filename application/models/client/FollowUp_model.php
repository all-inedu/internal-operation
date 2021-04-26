<?php
class FollowUp_model extends CI_model
{

    public function showAll($e) {
        $this->db->select('*');
        $this->db->join("tbl_stprog", "tbl_stprog.stprog_id=tbl_followup.stprog_id");
        $this->db->join("tbl_prog", "tbl_prog.prog_id=tbl_stprog.prog_id");
        $this->db->join("tbl_students", "tbl_students.st_num=tbl_stprog.st_num");
        $this->db->where('tbl_stprog.empl_id', $e); 
        $this->db->order_by('tbl_followup.flw_mark', 'ASC');
        $this->db->order_by('tbl_followup.flw_date', 'ASC');
        return $this->db->get('tbl_followup')->result_array();
    }

    public function save($data)
    {
        $this->db->insert('tbl_followup', $data);
    }

    public function showFollowUpByDate($d, $nd="", $e="", $s=""){
        $this->db->select('*');
        if($e!="") {
            $this->db->where('tbl_stprog.empl_id', $e); 
        }
        if(($nd) and ($s)) {
            $this->db->where('tbl_followup.flw_date >=', $d); 
            $this->db->where('tbl_followup.flw_date <=', $nd); 
            $this->db->where('tbl_followup.flw_mark', $s-1); 
        } else {
            $this->db->where('tbl_followup.flw_date', $d); 
        }
        $this->db->join("tbl_stprog", "tbl_stprog.stprog_id=tbl_followup.stprog_id");
        $this->db->join("tbl_prog", "tbl_prog.prog_id=tbl_stprog.prog_id");
        $this->db->join("tbl_students", "tbl_students.st_num=tbl_stprog.st_num");
        $this->db->join("tbl_empl", "tbl_empl.empl_id=tbl_stprog.empl_id");
        $this->db->order_by('tbl_empl.empl_firstname', 'ASC');
        $this->db->order_by('tbl_followup.flw_mark', 'ASC');
        $this->db->order_by('tbl_followup.flw_date', 'ASC');
        return $this->db->get('tbl_followup')->result_array();
    }

    public function checkFollowUp($d){
        $next_day = date('Y-m-d',(strtotime ( '+1 day' , strtotime ($d))));
        $this->db->select('*');
        $this->db->where('tbl_followup.flw_date >=', $d);
        $this->db->where('tbl_followup.flw_date <=', $next_day);
        $this->db->where('tbl_followup.flw_mark', 0); 
        // $this->db->where('tbl_followup.flw_sent', 0); 
        $this->db->join("tbl_stprog", "tbl_stprog.stprog_id=tbl_followup.stprog_id");
        $this->db->join("tbl_empl", "tbl_empl.empl_id=tbl_stprog.empl_id");
        $this->db->group_by('tbl_empl.empl_id');
        return $this->db->get('tbl_followup')->result_array();
    }

    public function showFollowUpByPIC($id, $d){
        $next_day = date('Y-m-d',(strtotime ( '+1 day' , strtotime ($d))));
        $this->db->select('*');
        $this->db->where('tbl_empl.empl_id', $id);
        $this->db->where('tbl_followup.flw_date >=', $d);
        $this->db->where('tbl_followup.flw_date <=', $next_day);
        $this->db->where('tbl_followup.flw_mark', 0); 
        $this->db->where('tbl_followup.flw_sent', 0); 
        $this->db->join("tbl_stprog", "tbl_stprog.stprog_id=tbl_followup.stprog_id");
        $this->db->join("tbl_prog", "tbl_prog.prog_id=tbl_stprog.prog_id");
        $this->db->join("tbl_students", "tbl_students.st_num=tbl_stprog.st_num");
        $this->db->join("tbl_empl", "tbl_empl.empl_id=tbl_stprog.empl_id");
        $this->db->order_by('tbl_followup.flw_mark', 'ASC');
        $this->db->order_by('tbl_followup.flw_date', 'ASC');
        return $this->db->get('tbl_followup')->result_array();
    }

     public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('flw_id', $id);
        $this->db->update('tbl_followup');
    }

    public function sendEmail($id) 
    {
        $this->db->set('flw_sent', 1);
        $this->db->where('flw_id', $id);
        $this->db->update('tbl_followup');
    }

}
?>