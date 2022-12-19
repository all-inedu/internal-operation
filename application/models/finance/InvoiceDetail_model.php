<?php
class InvoiceDetail_model extends CI_model
{
    public function showId($id)
    {
        $this->db->select('*');
        $this->db->where('tbl_invdtl.inv_id', $id);
        return $this->db->get('tbl_invdtl')->result_array();
    }

    public function showDetailId($id)
    {
        $this->db->select('*');
        $this->db->where('tbl_invdtl.invdtl_id', $id);
        return $this->db->get('tbl_invdtl')->row_array();
    }

    public function save($data)
    {
        $this->db->insert('tbl_invdtl', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('invdtl_id', $id);
        $this->db->update('tbl_invdtl');
    }

    public function delete($id)
    {
        $this->db->where('invdtl_id', $id);
        $this->db->delete('tbl_invdtl');
    }

    public function deleteInvId($id)
    {
        $this->db->where('inv_id', $id);
        $this->db->delete('tbl_invdtl');
    }

    public function dueDateReminder($date = null)
    {
        $month = date("m", strtotime($date));
        $year = date("Y", strtotime($date));

        $this->db->select('
        tbl_invdtl.inv_id as inv_id,
        tbl_invdtl.invdtl_statusname as status, 
        tbl_invdtl.invdtl_amountusd as tot_usd, 
        tbl_invdtl.invdtl_amountidr as tot_idr, 
        tbl_invdtl.invdtl_duedate as due_date,
        tbl_inv.inv_paymentmethod as method, 
        tbl_students.st_firstname as first_name, 
        tbl_students.st_lastname as last_name, 
        tbl_stprog.stprog_id as stprog_id, 
        tbl_prog.prog_sub, 
        tbl_prog.prog_program,
        tbl_receipt.receipt_id');
        $this->db->where('tbl_inv.inv_paymentmethod', 'Installment');
        $this->db->where('MONTH(tbl_invdtl.invdtl_duedate)', $month ? $month : date('m'));
        $this->db->where('YEAR(tbl_invdtl.invdtl_duedate)', $year ? $year : date('Y'));
        $this->db->where('tbl_receipt.receipt_id', NULL);
        $this->db->join('tbl_inv', 'tbl_inv.inv_id=tbl_invdtl.inv_id', 'left');
        $this->db->join('tbl_receipt', 'tbl_receipt.inv_id=tbl_invdtl.inv_id', 'left');
        $this->db->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_inv.stprog_id', 'left');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num', 'left');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id', 'left');
        $this->db->order_by('tbl_invdtl.invdtl_duedate', 'ASC');
        return $this->db->get('tbl_invdtl')->result_array();
    }
}