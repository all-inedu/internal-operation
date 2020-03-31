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

    public function save($data)
    {
        $this->db->insert('tbl_alu', $data);
    }

    public function saveDetail($data) 
    {
        $this->db->insert('tbl_aludetail', $data);
    }
}