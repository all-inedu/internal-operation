<?php
class Editor_model extends CI_model
{
    public function getId(){
        $this->db->select('RIGHT(tbl_editor.editor_id,4) as kode', FALSE);
		$this->db->order_by('editor_id','DESC');    
		$this->db->limit(1);    
        return $query = $this->db->get('tbl_editor');
    }

    public function showManaging(){
        $this->db->select('*');
        $this->db->where('editor_status =',1);
        $this->db->where('editor_position =',1);
        return $this->db->get('tbl_editor')->result_array();
    }

    public function showSenior(){
        $this->db->select('*');
        $this->db->where('editor_status =',1);
        $this->db->where('editor_position =',2);
        return $this->db->get('tbl_editor')->result_array();
    }

    public function showAssociate(){
        $this->db->select('*');
        $this->db->where('editor_status =',1);
        $this->db->where('editor_position =',3);
        return $this->db->get('tbl_editor')->result_array();
    }
    
    public function showAll(){
        $this->db->select('*');
        $this->db->where('editor_status >=',1);
        $this->db->join('tbl_univ', 'tbl_univ.univ_id = tbl_editor.univ_id');
        return $this->db->get('tbl_editor')->result_array();
    }

    public function showId($id){
        $this->db->select('*');
        $this->db->where('editor_id', $id); 
        $this->db->join('tbl_univ', 'tbl_univ.univ_id = tbl_editor.univ_id');
        return $this->db->get('tbl_editor')->row_array();
    }
    
    public function save($data)
    {
        $this->db->insert('tbl_editor', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('editor_id', $id);
        $this->db->update('tbl_editor');
    }

    // public function delete($id){
    //     $this->db->where('editor_id', $id);
    //     $this->db->delete('tbl_editor');
    // }

    public function deactivate($id){
        $this->db->set('editor_status',2);
        $this->db->where('editor_id', $id);
        $this->db->update('tbl_editor'); 
    }

    public function activate($id){
        $this->db->set('editor_status',1);
        $this->db->where('editor_id', $id);
        $this->db->update('tbl_editor'); 
    }

}