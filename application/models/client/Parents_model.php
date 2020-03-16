<?php
class Parents_model extends CI_model
{
    public function getId() {
        $this->db->select_max('pr_id');
        return $this->db->get('tbl_parents')->row_array();
    }

    public function showAll(){
        $this->db->select('*');
        return $this->db->get('tbl_parents')->result_array();
    }

    public function showChildsParent($id) {
        $this->db->select('*');
        $this->db->where('pr_id', $id);
        $this->db->join('tbl_sch', 'tbl_sch.sch_id=tbl_students.sch_id');
        return $this->db->get('tbl_students')->result_array();        
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('pr_id', $id); 
        return $this->db->get('tbl_parents')->row_array();
    }

    public function save($data)
    {
        $this->db->insert('tbl_parents', $data);
    }

    public function update($data, $id) {
        $this->db->set($data);
        $this->db->where('pr_id', $id);
        $this->db->update('tbl_parents');
    }

}