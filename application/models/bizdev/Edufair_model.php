<?php
class Edufair_model extends CI_model
{
    public function showAll(){
        $this->db->select('*');
        return $this->db->get('tbl_eduf')->result_array();
    }

    public function save($data)
    {
        $this->db->insert('tbl_eduf', $data);
    }

    public function saveReview($data) 
    {
        $this->db->insert('tbl_edufreview', $data);
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('eduf_id', $id); 
        return $this->db->get('tbl_eduf')->row_array();
    }

    public function showReview($id){
        $this->db->select('*');
        $this->db->where('eduf_id', $id); 
        return $this->db->get('tbl_edufreview')->result_array();
    }

    public function showReviewId($id){
        $this->db->select('*');
        $this->db->where('edufreview_id', $id); 
        return $this->db->get('tbl_edufreview')->row_array();
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('eduf_id', $id);
        $this->db->update('tbl_eduf');
    }

    public function updateReview($data, $id)
    {
        $this->db->set($data);
        $this->db->where('edufreview_id', $id);
        $this->db->update('tbl_edufreview');
    }

    public function delete($id) {
        $this->db->where('eduf_id', $id);
        $this->db->delete('tbl_eduf');
        
        $this->db->where('eduf_id', $id);
        $this->db->delete('tbl_edufreview');
    }

    public function deleteReview($id) {
        $this->db->where('edufreview_id', $id);
        $this->db->delete('tbl_edufreview');
    }
}
?>