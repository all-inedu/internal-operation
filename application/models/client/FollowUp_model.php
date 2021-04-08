<?php
class FollowUp_model extends CI_model
{

    public function save($data)
    {
        $this->db->insert('tbl_followup', $data);
    }

}
?>