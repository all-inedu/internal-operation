<?php
class Lead_model extends CI_model
{
    public function showAll(){
        $this->db->select('*');
        return $this->db->get('tbl_lead')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('lead_id', $id); 
        return $this->db->get('tbl_lead')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_lead', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('lead_id', $id);
        $this->db->update('tbl_lead');
    }

    public function delete($id){
        $this->db->where('lead_id', $id);
        $this->db->delete('tbl_lead');
    }

}