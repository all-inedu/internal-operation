<?php
class Students_model extends CI_model
{
    public function getId(){
        $this->db->select('RIGHT(tbl_students.st_id,4) as kode', FALSE);
		$this->db->order_by('st_id','DESC');    
		$this->db->limit(1);    
        return $query = $this->db->get('tbl_students');
    }
    
    public function showAll(){
        $this->db->select('
        tbl_students.*,
        tbl_sch.sch_name,
        tbl_lead.lead_name,
        ');
        $this->db->join('tbl_sch', 'tbl_sch.sch_id=tbl_students.sch_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_students.lead_id');
        $this->db->order_by('st_datecreate','DESC');
        return $this->db->get('tbl_students')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('st_num', $id); 
        $this->db->join('tbl_sch', 'tbl_sch.sch_id=tbl_students.sch_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_students.lead_id');
        return $this->db->get('tbl_students')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_students', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('st_num', $id);
        $this->db->update('tbl_students');
    }

    public function delete($id){
        $this->db->where('st_num', $id);
        $this->db->delete('tbl_students');
    }

    public function studentStatus($n) {
        $this->db->select('*');
        $this->db->where('st_statuscli', $n);
        return $this->db->get('tbl_students')->result_array();
    }

     public function studentStatusNew() {
        $this->db->distinct();
        $this->db->select('tbl_students.*, tbl_stprog.stprog_tot_uni');
        $this->db->where('tbl_students.st_statuscli', 2);
        $this->db->where('tbl_stprog.stprog_runningstatus', 2);
        $this->db->where('tbl_prog.prog_sub', 'Admissions Mentoring');
        $this->db->where('tbl_students.st_id NOT IN (select st_id from tbl_alu)', NULL, false);
        $this->db->join('tbl_stprog', 'tbl_stprog.st_num=tbl_students.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        return $this->db->get('tbl_students')->result_array();
    }

}