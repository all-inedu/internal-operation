<?php
class Mentor_model extends CI_model 
{    
    public function getId(){
        $this->db->select('RIGHT(tbl_mt.mt_id,4) as kode', FALSE);
		$this->db->order_by('mt_id','DESC');    
		$this->db->limit(1);    
        return $query = $this->db->get('tbl_mt');
    }

    public function showMentorActive() {
        $this->db->select('*');
        $this->db->where('mt_istutor <=',2);
        $this->db->where('mt_status',1);
        $this->db->order_by('mt_firstn','ASC');
        return $this->db->get('tbl_mt')->result_array();
    }

    public function showTutorActive() {
        $this->db->select('*');
        $this->db->where('mt_istutor >=',2);
        $this->db->where('mt_status',1);
        return $this->db->get('tbl_mt')->result_array();
    }

    public function showActive(){
        $this->db->select('*');
        $this->db->where('mt_status',1);
        return $this->db->get('tbl_mt')->result_array();
    }

    public function showNotActive(){
        $this->db->select('*');
        $this->db->where('mt_status',2);
        return $this->db->get('tbl_mt')->result_array();
    }

    public function showAll(){
        $this->db->select('*');
        $this->db->where('mt_status >=',1);
        $this->db->join('tbl_univ', 'tbl_univ.univ_id = tbl_mt.univ_id');
        return $this->db->get('tbl_mt')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('mt_id', $id); 
        $this->db->join('tbl_univ', 'tbl_univ.univ_id = tbl_mt.univ_id');
        return $this->db->get('tbl_mt')->row_array();
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('mt_id', $id);
        $this->db->update('tbl_mt');
    }
    
    public function showPotentialAll(){
        $this->db->select('*');
        $this->db->where('mt_status',0);
        $this->db->join('tbl_univ', 'tbl_univ.univ_id = tbl_mt.univ_id');
        return $this->db->get('tbl_mt')->result_array();
    }

    public function showPotentialId($id){
        $this->db->select('*');
        $this->db->where('id', $id); 
        $this->db->join('tbl_univ', 'tbl_univ.univ_id = tbl_mt.univ_id');
        return $this->db->get('tbl_mt')->row_array();
    }
    
    public function savePotential($data)
    {
        $this->db->insert('tbl_mt', $data);
    }

    public function updatePotential($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tbl_mt');
    }

    public function convert($id, $data){
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tbl_mt'); 
    }

    public function deactivate($id){
        $this->db->set('mt_status',2);
        $this->db->where('mt_id', $id);
        $this->db->update('tbl_mt'); 
    }

    public function activate($id){
        $this->db->set('mt_status',1);
        $this->db->where('mt_id', $id);
        $this->db->update('tbl_mt'); 
    }

    public function studentsMentorID($id) {
        $this->db->select('*');
        $this->db->where('tbl_stmentor.mt_id1 =', $id);
        $this->db->or_where('tbl_stmentor.mt_id2 =', $id);
        $this->db->join('tbl_mt','tbl_mt.mt_id=tbl_stmentor.mt_id1');
        $this->db->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_stmentor.stprog_id');
        $this->db->join('tbl_prog','tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_students','tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_sch','tbl_sch.sch_id=tbl_students.sch_id');
        return $this->db->get('tbl_stmentor')->result_array();
    }

}