<?php
class Invoice_model extends CI_model
{
    public function getId($m, $y)
    {
        $this->db->select('*');
        $this->db->where('MONTH(inv_date)', $m);
        $this->db->where('YEAR(inv_date)', $y);
        $this->db->order_by('inv_id', 'DESC');
        return $this->db->get('tbl_inv')->row_array();
    }

    public function showALl()
    {
        $this->db->select('inv_num');
        return $this->db->get('tbl_inv')->result_array();
    }

    public function showAllByProg($m, $y, $p, $e = "")
    {
        $this->db->select('sum(tbl_inv.inv_totpridr) as tot');
        $this->db->where('tbl_stprog.stprog_status', 1);
        if ($e != "") {
            $this->db->where('tbl_stprog.empl_id', $e);
        }
        $this->db->like('tbl_prog.prog_sub', $p);
        $this->db->group_start();
        $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
        $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
        $this->db->or_group_start();
        $this->db->where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
        $this->db->where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
        $this->db->group_end();
        $this->db->or_group_start();
        $this->db->where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
        $this->db->where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
        $this->db->group_end();
        $this->db->or_group_start();
        $this->db->where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        $this->db->where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        $this->db->group_end();
        $this->db->group_end();

        // $this->db->group_start();
        //     $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
        //     $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
        //     $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
        //     $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        // $this->db->group_end();
        // $this->db->group_start();
        //     $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
        //     $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
        //     $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
        //     $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        // $this->db->group_end();
        $this->db->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_inv.stprog_id');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        return $this->db->get('tbl_inv')->result_array();
    }

    public function showAllByProgMain($m, $y, $p, $e = "")
    {
        $this->db->select('sum(tbl_inv.inv_totpridr) as tot');
        $this->db->where('tbl_prog.prog_main', $p);
        $this->db->where('tbl_stprog.stprog_status', 1);
        if ($e != "") {
            $this->db->where('tbl_stprog.empl_id', $e);
        }
        $this->db->group_start();
        $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
        $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
        $this->db->or_group_start();
        $this->db->where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
        $this->db->where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
        $this->db->group_end();
        $this->db->or_group_start();
        $this->db->where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
        $this->db->where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
        $this->db->group_end();
        $this->db->or_group_start();
        $this->db->where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        $this->db->where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        $this->db->group_end();
        $this->db->group_end();

        // $this->db->group_start();
        //     $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
        //     $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
        //     $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
        //     $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        // $this->db->group_end();
        // $this->db->group_start();
        //     $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
        //     $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
        //     $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
        //     $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        // $this->db->group_end();
        $this->db->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_inv.stprog_id');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        return $this->db->get('tbl_inv')->result_array();
    }

    public function showForInvoice()
    {
        $this->db->select('*');
        $this->db->where('tbl_stprog.stprog_status', 1);
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->order_by('tbl_stprog.stprog_statusprogdate', 'DESC');
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function showId($id)
    {
        $this->db->select('*');
        $this->db->where('tbl_inv.stprog_id', $id);
        $this->db->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_inv.stprog_id');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        return $this->db->get('tbl_inv')->row_array();
    }

    public function showInvNum($id)
    {
        $this->db->select('*');
        $this->db->where('tbl_inv.inv_num', $id);
        $this->db->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_inv.stprog_id');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        return $this->db->get('tbl_inv')->row_array();
    }

    public function showInvId($id)
    {
        $this->db->select('*');
        $this->db->where('tbl_inv.inv_id', $id);
        $this->db->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_inv.stprog_id');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        return $this->db->get('tbl_inv')->row_array();
    }

    public function save($data)
    {
        $this->db->insert('tbl_inv', $data);
    }

    public function saveDetail($data)
    {
        $this->db->insert('tbl_invdtl', $data);
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('inv_num', $id);
        $this->db->update('tbl_inv');
    }

    public function delete($id)
    {
        $this->db->where('inv_num', $id);
        $this->db->delete('tbl_inv');
    }

    public function dueDateReminder($date = null)
    {
        $month = date("m", strtotime($date));
        $year = date("Y", strtotime($date));

        $this->db->select('
        tbl_inv.inv_num as id,
        tbl_inv.inv_id as inv_id,
        tbl_inv.inv_totprusd as tot_usd, 
        tbl_inv.inv_totpridr as tot_idr, 
        tbl_inv.inv_duedate as due_date,
        tbl_inv.inv_paymentmethod as method, 
        tbl_inv.reminder_status, 
        tbl_inv.reminder_notes, 
        tbl_students.st_firstname as first_name, 
        tbl_students.st_lastname as last_name, 
        tbl_stprog.stprog_id as stprog_id, 
        tbl_prog.prog_sub, 
        tbl_prog.prog_program,
        tbl_receipt.receipt_id');
        $this->db->where('tbl_inv.inv_paymentmethod', 'Full Payment');
        $this->db->where('MONTH(tbl_inv.inv_duedate)', $month ? $month : date('m'));
        $this->db->where('YEAR(tbl_inv.inv_duedate)', $year ? $year : date('Y'));
        $this->db->where('tbl_receipt.receipt_id', NULL);
        $this->db->join('tbl_receipt', 'tbl_receipt.inv_id=tbl_inv.inv_id', 'left');
        $this->db->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_inv.stprog_id', 'left');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num', 'left');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id', 'left');
        $this->db->order_by('tbl_inv.inv_duedate', 'ASC');
        return $this->db->get('tbl_inv')->result_array();
    }

    public function totalInvoice($date = null, $status = null)
    {
        $month = date("m", strtotime($date));
        $year = date("Y", strtotime($date));

        $this->db->select('
        count(tbl_inv.inv_id) as tot_fullpayment_inv,
        sum(tbl_inv.inv_totprusd) as tot_fullpayment_usd, 
        sum(tbl_inv.inv_totpridr) as tot_fullpayment_idr
        ');
        $this->db->where('tbl_inv.inv_paymentmethod', 'Full Payment');
        $this->db->where('MONTH(tbl_inv.inv_duedate)', $month ? $month : date('m'));
        $this->db->where('YEAR(tbl_inv.inv_duedate)', $year ? $year : date('Y'));
        if ($status) {
            $this->db->where('tbl_receipt.receipt_id !=', NULL);
        }
        $this->db->join('tbl_receipt', 'tbl_receipt.inv_id=tbl_inv.inv_id', 'left');
        $this->db->join('tbl_stprog', 'tbl_stprog.stprog_id=tbl_inv.stprog_id', 'left');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num', 'left');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id', 'left');
        $this->db->order_by('tbl_inv.inv_duedate', 'ASC');
        return $this->db->get('tbl_inv')->row_array();
    }

    public function updateReminderStatus($data)
    {
        $this->db->set('reminder_status', $data['type']);
        $this->db->where('inv_num', $data['id']);
        $this->db->update('tbl_inv');
    }

    public function updateReminderNotes($data)
    {
        $this->db->set('reminder_notes', $data['reminder_notes']);
        $this->db->where('inv_num', $data['id']);
        $this->db->update('tbl_inv');
    }
}