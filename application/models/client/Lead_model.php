<?php
class Lead_model extends CI_model
{
    public function getId(){
        $this->db->select('RIGHT(tbl_lead.lead_id,3) as kode', FALSE);
		$this->db->order_by('lead_id','DESC');    
		$this->db->limit(1);    
        return $query = $this->db->get('tbl_lead');
    }

    public function showAll(){
        $this->db->select('*');
        $this->db->order_by('lead_name', 'ASC');
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