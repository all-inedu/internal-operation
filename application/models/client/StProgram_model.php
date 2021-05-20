<?php
class StProgram_model extends CI_model
{

    public function getId() {
        $this->db->select('stprog_id');
        $this->db->order_by('stprog_id', 'DESC');
        return $this->db->get('tbl_stprog')->row_array();
    }    

    public function showAll() {
        $this->db->select('*');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_stprog.lead_id');
        $this->db->order_by('tbl_stprog.stprog_statusprogdate', 'DESC');
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function showByEmpl($m, $y, $id) {
        $this->db->select('stprog_id');
        $this->db->where('empl_id',$id);
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        $this->db->group_end();
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function showAllByDate($m, $y, $e="") {
        $this->db->select('*');
        if($e!="") {
           $this->db->where('tbl_stprog.empl_id', $e); 
        }
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_stprog.lead_id');
        $this->db->order_by('tbl_stprog.stprog_statusprogdate', 'DESC');
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        $this->db->group_end();
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function showAllByDateProgramStatus($m, $y, $p='', $s) {
        $this->db->select('*');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_stprog.lead_id');
        $this->db->order_by('tbl_stprog.stprog_statusprogdate', 'ASC');
        $this->db->order_by('tbl_stprog.stprog_ass_sent', 'ASC');
        $this->db->order_by('tbl_stprog.stprog_init_consult', 'ASC');
        $this->db->order_by('tbl_stprog.stprog_firstdisdate', 'ASC');
        if($p!=''){
            $this->db->where("tbl_stprog.prog_id =", $p);
        }
        $this->db->where("tbl_stprog.stprog_status =", $s);
        $this->db->group_start();
            if($s>=1) {
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
            } else {
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
            }
        $this->db->group_end();
        $this->db->group_start();
            if($s>=1) {
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
            } else { 
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
            }
        $this->db->group_end();
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function showAllByProgSub($m, $y, $p, $e="") {
        $this->db->select('*');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_stprog.lead_id');
        if($e!="") {
           $this->db->where('tbl_stprog.empl_id', $e); 
        }
        $this->db->like('tbl_prog.prog_sub',$p);
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        $this->db->group_end();
        $this->db->order_by('tbl_stprog.stprog_statusprogdate', 'DESC');
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function showAllByProgMain($m, $y, $p, $e="") {
        $this->db->select('*');
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_stprog.lead_id');
        $this->db->like('tbl_prog.prog_main',$p);
        if($e!="") {
           $this->db->where('tbl_stprog.empl_id', $e); 
        }
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        $this->db->group_end();
        $this->db->order_by('tbl_stprog.stprog_statusprogdate', 'DESC');
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function showId($id) {
        $this->db->select('*');
        $this->db->where('stprog_id', $id); 
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_stprog.lead_id');
        return $this->db->get('tbl_stprog')->row_array();
    }
    
    public function showStProg($id){
        $this->db->select('*');
        $this->db->where('tbl_stprog.st_num', $id); 
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_stprog.lead_id');
        $this->db->join('tbl_empl', 'tbl_empl.empl_id=tbl_stprog.empl_id');
        $this->db->order_by('tbl_stprog.stprog_statusprogdate', 'DESC');
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function showStatusProgram($id, $n, $stprog_id) {
        $this->db->select('*');
        $this->db->where('st_num', $id); 
        $this->db->where('stprog_status', $n);
        $this->db->where('stprog_id !=', $stprog_id); 
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function showStatusRunning($id, $n) {
        $this->db->select('*');
        $this->db->where('st_num', $id); 
        $this->db->where('stprog_runningstatus', $n); 
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function save($data, $datas, $id)
    {
        $this->db->insert('tbl_stprog', $data);

        $this->db->set($datas);
        $this->db->where('st_num', $id);
        $this->db->update('tbl_students');
    }

    public function updateStudentsStatus($data, $id) {
        $this->db->set($data);
        $this->db->where('st_num', $id);
        $this->db->update('tbl_students');
    }

    public function update($data, $id) {
        $this->db->set($data);
        $this->db->where('stprog_id', $id);
        $this->db->update('tbl_stprog');
    }

    public function showStudentsMentor($id)
    {
        $this->db->select('*');
        $this->db->where('stprog_id', $id);
        return $this->db->get('tbl_stmentor')->row_array();
    }

    public function saveStudentsMentor($data)
    {
        $this->db->insert('tbl_stmentor', $data); 
    }

    public function updateStudentsMentor($data, $id)
    {
        $this->db->set($data);
        $this->db->where('stmentor_id', $id);
        $this->db->update('tbl_stmentor');
    }
    
    public function delete($id) {
        $this->db->where('stprog_id', $id);
        $this->db->delete('tbl_stprog'); 
        
        $this->db->where('stprog_id', $id);
        $this->db->delete('tbl_stmentor');
    }

    public function studentProgStatus($n, $m, $y, $e="") {
        $this->db->select('*');
        $this->db->where('stprog_status', $n);
        if($e!="") {
           $this->db->where('tbl_stprog.empl_id', $e); 
        }
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        $this->db->group_end();
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function studentProgStatusByProg($n, $m, $y, $p, $e="") {
        $this->db->select('*');
        $this->db->where('stprog_status', $n);
        if($e!="") {
           $this->db->where('tbl_stprog.empl_id', $e); 
        }
        $this->db->like("tbl_prog.prog_sub", $p);
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        $this->db->group_end();
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function studentProgStatusByProgMain($n, $m, $y, $p, $e="") {
        $this->db->select('*');
        $this->db->where('stprog_status', $n);
        $this->db->where("tbl_prog.prog_main =", $p);
        if($e!="") {
           $this->db->where('tbl_stprog.empl_id', $e); 
        }
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        $this->db->group_end();
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function stprog_status($n, $start, $end) {
        $this->db->select('*');
        $this->db->where('stprog_status', $n);
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_stprog.lead_id');
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function studentProgramLead($m, $y) {
        $this->db->select("count(tbl_stprog.stprog_id), tbl_lead.lead_name");
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        $this->db->group_end();
        $this->db->group_by("tbl_stprog.lead_id");
        $this->db->join("tbl_students","tbl_students.st_num=tbl_stprog.st_num");
        $this->db->join("tbl_lead","tbl_lead.lead_id=tbl_students.lead_id");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function studentProgramConversionLead($m, $y) {
        $this->db->select("count(tbl_stprog.stprog_id), tbl_lead.lead_name");
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        $this->db->group_end();
        $this->db->group_by("tbl_stprog.lead_id");
        $this->db->join("tbl_lead","tbl_lead.lead_id=tbl_stprog.lead_id");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function studentProgramLeadByProg($m, $y, $p) {
        $this->db->select("count(tbl_stprog.stprog_id) as tot, tbl_lead.lead_name");
        $this->db->like("tbl_prog.prog_sub", $p);
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        $this->db->group_end();
        $this->db->group_by("tbl_stprog.lead_id");
        $this->db->join("tbl_lead","tbl_lead.lead_id=tbl_stprog.lead_id");
        $this->db->join("tbl_prog","tbl_prog.prog_id=tbl_stprog.prog_id");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function studentProgramLeadByProgMain($m, $y, $p) {
        $this->db->select("count(tbl_stprog.stprog_id) as tot, tbl_lead.lead_name");
        $this->db->where("tbl_prog.prog_main", $p);
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult) =", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate) =", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult) =", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate) =", $y);
        $this->db->group_end();
        $this->db->group_by("tbl_stprog.lead_id");
        $this->db->join("tbl_lead","tbl_lead.lead_id=tbl_stprog.lead_id");
        $this->db->join("tbl_prog","tbl_prog.prog_id=tbl_stprog.prog_id");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function lead_prog($start, $end) {
        $this->db->select("tbl_lead.lead_id, tbl_lead.lead_name");
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->group_by("tbl_stprog.lead_id");
        $this->db->join("tbl_lead","tbl_lead.lead_id=tbl_stprog.lead_id");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function lead_prog_ovl($start, $end) {
        $this->db->select("tbl_lead.lead_id, tbl_lead.lead_name, count(tbl_stprog.stprog_id) as tot");
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->group_by("tbl_stprog.lead_id");
        $this->db->join("tbl_lead","tbl_lead.lead_id=tbl_stprog.lead_id");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function stprog_lead($n, $start, $end) {
        $this->db->select("count(tbl_stprog.stprog_id) as tot, tbl_lead.lead_id, tbl_lead.lead_name");
        $this->db->where("tbl_stprog.stprog_status =", $n);
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->group_by("tbl_stprog.lead_id");
        $this->db->join("tbl_lead","tbl_lead.lead_id=tbl_stprog.lead_id");
        $this->db->order_by("tot","DESC");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function stprog_leadID($n, $start, $end, $lead_id) {
        $this->db->select("count(tbl_stprog.stprog_id) as tot");
        $this->db->where("tbl_stprog.stprog_status =", $n);
        $this->db->where("tbl_stprog.lead_id =", $lead_id);
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->group_by("tbl_stprog.lead_id");
        return $this->db->get('tbl_stprog')->row_array();
    }

    public function stprog_leadTot($n, $start, $end) {
        $this->db->select("count(tbl_stprog.stprog_id) as tot");
        $this->db->where("tbl_stprog.stprog_status =", $n);
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        return $this->db->get('tbl_stprog')->row_array();
    }

    public function stprog_lead_dtl($n, $start, $end, $prog) {
        $this->db->select("count(tbl_stprog.stprog_id) as tot, tbl_lead.lead_id, tbl_lead.lead_name");
        $this->db->where("tbl_stprog.stprog_status =", $n);
        $this->db->where("tbl_stprog.prog_id =", $prog);
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->group_by("tbl_stprog.lead_id");
        $this->db->join("tbl_lead","tbl_lead.lead_id=tbl_stprog.lead_id");
        $this->db->order_by("tot","DESC");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function stprog_leads($n, $lead_id, $start, $end) {
        $this->db->select("*");
        $this->db->where("tbl_stprog.stprog_status =", $n);
        $this->db->where("tbl_stprog.lead_id =", $lead_id);
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_stprog.lead_id');
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function studentProgramProg($d) {
        $this->db->select("count(tbl_stprog.stprog_id), tbl_prog.prog_sub, tbl_prog.prog_program");
        $this->db->where("tbl_stprog.stprog_status <=", 2);
        $this->db->where("tbl_stprog.stprog_statusprogdate >=", $d);
        $this->db->group_by("tbl_prog.prog_program");
        $this->db->join("tbl_prog","tbl_prog.prog_id=tbl_stprog.prog_id");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function stprog_prog($n, $start, $end) {
        $this->db->select("count(tbl_stprog.stprog_id) as tot,tbl_prog.prog_id, tbl_prog.prog_sub,  tbl_prog.prog_program");
        $this->db->where("tbl_stprog.stprog_status =", $n);
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->group_by("tbl_prog.prog_program");
        $this->db->join("tbl_prog","tbl_prog.prog_id=tbl_stprog.prog_id");
        $this->db->order_by("tot","DESC");
        return $this->db->get('tbl_stprog')->result_array();
    }

    #new update
    public function stprog_main_program($n, $start, $end) {
        $this->db->select("tbl_prog.prog_main, tbl_prog.prog_sub, count(tbl_stprog.stprog_id) as tot");
        $this->db->where("tbl_stprog.stprog_status =", $n);
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->group_by("tbl_prog.prog_main");
        $this->db->join("tbl_prog","tbl_prog.prog_id=tbl_stprog.prog_id");
        $this->db->order_by("tbl_prog.main_number","ASC");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function stprog_sub_program($n, $start, $end, $main_prog="") {
        $this->db->select("tbl_prog.prog_id, tbl_prog.prog_sub, tbl_prog.prog_program, count(tbl_stprog.stprog_id) as tot ");
        $this->db->where("tbl_stprog.stprog_status =", $n);
        $this->db->where("tbl_prog.prog_main =", $main_prog);
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->group_by("tbl_prog.prog_program");
        $this->db->join("tbl_prog","tbl_prog.prog_id=tbl_stprog.prog_id");
        $this->db->order_by("tbl_prog.prog_main","ASC");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function stprog_sub_program_ovl($n, $start, $end) {
        $this->db->select("tbl_prog.prog_id, tbl_prog.prog_sub, tbl_prog.prog_program, count(tbl_stprog.stprog_id) as tot ");
        // $this->db->where("tbl_stprog.stprog_status =", $n);
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->group_by("tbl_prog.prog_program");
        $this->db->join("tbl_prog","tbl_prog.prog_id=tbl_stprog.prog_id");
        $this->db->order_by("tbl_prog.prog_main","ASC");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function stprog_adm_init_avg($n, $start, $end) {
        $this->db->select("
            tbl_prog.prog_id,
            tbl_prog.prog_sub,
            tbl_prog.prog_program,
            count(tbl_stprog.stprog_id) as tot,
            sum(datediff(tbl_stprog.stprog_ass_sent, tbl_stprog.stprog_init_consult)) as init_make,
            sum(datediff(tbl_stprog.stprog_statusprogdate, tbl_stprog.stprog_ass_sent)) as long_response
        ");
        $this->db->where("tbl_stprog.stprog_status =", $n);
        $this->db->where("tbl_prog.prog_sub =", "Admissions Mentoring");
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            // $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            // $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            // $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            // $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            // $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            // $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->group_by("tbl_prog.prog_id");
        $this->db->join("tbl_prog","tbl_prog.prog_id=tbl_stprog.prog_id");
        $this->db->order_by("tbl_prog.prog_main","ASC");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function stprog_progs($n, $prog_id, $start, $end) {
        $this->db->select("*");
        $this->db->where("tbl_stprog.stprog_status =", $n);
        $this->db->where("tbl_stprog.prog_id =", $prog_id);
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->join('tbl_students', 'tbl_students.st_num=tbl_stprog.st_num');
        $this->db->join('tbl_prog', 'tbl_prog.prog_id=tbl_stprog.prog_id');
        $this->db->join('tbl_lead', 'tbl_lead.lead_id=tbl_stprog.lead_id');
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function stprog_avg($start, $end) {
        $this->db->select("
        count(tbl_stprog.stprog_id) as tot,
        tbl_prog.prog_id, 
        tbl_prog.prog_sub,
        tbl_prog.main_number, 
        tbl_prog.prog_program, 
        sum(datediff(tbl_stprog.stprog_statusprogdate, 
        tbl_stprog.stprog_firstdisdate)) as cal_date");
        $this->db->where("tbl_stprog.stprog_status =", 1) ;
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) >=", $start);
            // $this->db->or_where("(tbl_stprog.stprog_ass_sent) >=", $start);
            // $this->db->or_where("(tbl_stprog.stprog_init_consult) >=", $start);
            // $this->db->or_where("(tbl_stprog.stprog_firstdisdate) >=", $start);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("(tbl_stprog.stprog_statusprogdate) <=", $end);
            // $this->db->or_where("(tbl_stprog.stprog_ass_sent) <=", $end);
            // $this->db->or_where("(tbl_stprog.stprog_init_consult) <=", $end);
            // $this->db->or_where("(tbl_stprog.stprog_firstdisdate) <=", $end);
        $this->db->group_end();
        $this->db->group_by("tbl_prog.prog_program");
        $this->db->join("tbl_prog","tbl_prog.prog_id=tbl_stprog.prog_id");
        $this->db->order_by("tbl_prog.main_number");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function init_consult_date($m, $y, $e="") {
        $this->db->select('*');
        $this->db->where("tbl_prog.prog_sub =", "Admissions Mentoring");
        $this->db->where("tbl_stprog.stprog_init_consult >", 0);
        if($e!="") {
           $this->db->where('tbl_stprog.empl_id', $e); 
        }
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate)", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent)", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult)", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate)", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate)", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent)", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult)", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate)", $y);
        $this->db->group_end();
        // $this->db->where("tbl_stprog.stprog_status", 1);
        $this->db->join("tbl_prog","tbl_prog.prog_id=tbl_stprog.prog_id");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function assessment_sent($m, $y, $e="") {
        $this->db->select('*');
        $this->db->where("tbl_prog.prog_sub =", "Admissions Mentoring");
        $this->db->where("tbl_stprog.stprog_ass_sent >", 0);
        if($e!="") {
           $this->db->where('tbl_stprog.empl_id', $e); 
        }
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate)", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent)", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult)", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate)", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate)", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent)", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult)", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate)", $y);
        $this->db->group_end();
        $this->db->join("tbl_prog","tbl_prog.prog_id=tbl_stprog.prog_id");
        return $this->db->get('tbl_stprog')->result_array();
    }

    public function stprog_adm_ass_making($m, $y, $e="") {
        $this->db->select("
            tbl_prog.prog_id,
            tbl_prog.prog_sub,
            tbl_prog.prog_program,
            count(tbl_stprog.stprog_id) as tot,
            sum(datediff(tbl_stprog.stprog_ass_sent, tbl_stprog.stprog_init_consult)) as ass_making,
        ");
        $this->db->where("tbl_prog.prog_sub =", "Admissions Mentoring");
        if($e!="") {
           $this->db->where('tbl_stprog.empl_id', $e); 
        }
        $this->db->group_start();
            $this->db->where("MONTH(tbl_stprog.stprog_statusprogdate)", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_ass_sent)", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_init_consult)", $m);
            $this->db->or_where("MONTH(tbl_stprog.stprog_firstdisdate)", $m);
        $this->db->group_end();
        $this->db->group_start();
            $this->db->where("YEAR(tbl_stprog.stprog_statusprogdate)", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_ass_sent)", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_init_consult)", $y);
            $this->db->or_where("YEAR(tbl_stprog.stprog_firstdisdate)", $y);
        $this->db->group_end();
        // $this->db->where("tbl_stprog.stprog_status", 1);
        $this->db->group_by("tbl_prog.prog_sub");
        $this->db->join("tbl_prog","tbl_prog.prog_id=tbl_stprog.prog_id");
        $this->db->order_by("tbl_prog.prog_main","ASC");
        return $this->db->get('tbl_stprog')->row_array();
    }
    
    function getMentorById($id) {
        $this->db->select('*');
        $this->db->where('tbl_stmentor.stprog_id', $id);
        $this->db->join("tbl_mt","tbl_mt.mt_id=tbl_stmentor.mt_id1");
        return $this->db->get('tbl_stmentor')->row_array();
    }

}