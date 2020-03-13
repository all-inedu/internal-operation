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
        $this->db->select('*');
        $this->db->join('tbl_sch', 'tbl_sch.sch_id=tbl_students.sch_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_students.lead_id');
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

    // public function delete($id){
    //     $this->db->where('prog_id', $id);
    //     $this->db->delete('tbl_prog');
    // }

}