<?php
class Alumni_model extends CI_model
{
    public function getId(){
        $this->db->select_max('alu_id');
        return $this->db->get('tbl_alu')->row_array();
    }

    public function showAll(){
        $this->db->select('*');
        $this->db->join('tbl_students', 'tbl_students.st_id=tbl_alu.st_id');
        $this->db->order_by('alu_graduatedate','DESC');   
        return $this->db->get('tbl_alu')->result_array();
    }

    public function showDetail($id, $n){
        $this->db->select('*');
        $this->db->join('tbl_univ', 'tbl_univ.univ_id=tbl_aludetail.univ_id');
        $this->db->where('alu_id',$id);   
        $this->db->where('aludetail_status',$n); 
        return $this->db->get('tbl_aludetail')->result_array();
    }

    public function showId($id) {
        $this->db->select('*');
        $this->db->where('alu_id',$id);   
        $this->db->join('tbl_students', 'tbl_students.st_id=tbl_alu.st_id');
        $this->db->join('tbl_sch', 'tbl_sch.sch_id=tbl_students.sch_id');
        return $this->db->get('tbl_alu')->row_array();
    }

    public function showDetailId($id){
        $this->db->select('*');
        $this->db->join('tbl_univ', 'tbl_univ.univ_id=tbl_aludetail.univ_id');
        $this->db->where('alu_id',$id); 
        return $this->db->get('tbl_aludetail')->result_array();
    }

    public function showIdDetail($id) {
        $this->db->select('*');
        $this->db->join('tbl_univ', 'tbl_univ.univ_id=tbl_aludetail.univ_id');
        $this->db->where('aludetail_id',$id); 
        return $this->db->get('tbl_aludetail')->row_array();
    }

    public function save($data)
    {
        $this->db->insert('tbl_alu', $data);
    }

    public function saveDetail($data) 
    {
        $this->db->insert('tbl_aludetail', $data);
    }

    public function updateDetail($data, $id) {
        $this->db->set($data);
        $this->db->where('aludetail_id', $id);
        $this->db->update('tbl_aludetail');
    }

    public function deleteDetail($id)
    {
        $this->db->where('aludetail_id', $id);
        $this->db->delete('tbl_aludetail');
    }
}