<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('hr/Employee_model','empl');
        $this->load->model('client/Students_model','std');
        $this->load->model('client/StProgram_model','stprog');
        $this->load->model('bizdev/School_model','sch');
        $this->load->model('bizdev/SProgram_model','sp');
        $this->load->model('bizdev/Corporate_model', 'corp');
        $this->load->model('bizdev/CProgram_model', 'cp');
        $this->load->model('finance/Petty_model','petty');
        $this->load->model('finance/Invoice_model','inv');
        $this->load->model('finance/InvoiceSchool_model','invsch');
        $this->load->model('finance/Receipt_model','rec');

        $empl_id = $this->session->userdata('empl_id');
        $position = $this->session->userdata('position');
        if((!empty($empl_id)) and (!empty($position))) {
            redirect('/');
        } else
        if(empty($empl_id)) {
            redirect('/admin/login');
        }
    }

    public function index() 
    {
        $datenow = date('Y-m-d');
        $month = date('m', strtotime($datenow));
        $year = date('Y', strtotime($datenow));
        $days30 = date('Y-m-d', strtotime("-30 days", strtotime($datenow)));
        $data['prosp'] = count($this->std->studentStatus(0));
        $data['poten'] = count($this->std->studentStatus(1));
        $data['curr'] = count($this->std->studentStatus(2));
        $data['compl'] = count($this->std->studentStatus(3));
        $data['init_consult'] = count($this->stprog->init_consult_date($month,$year));
        $data['ass_sent'] = count($this->stprog->assessment_sent($month,$year));
        $data['ass_making'] = $this->stprog->stprog_adm_ass_making($month, $year);
        $data['pend'] = count($this->stprog->studentProgStatus(0, $month, $year));
        $data['succ'] = count($this->stprog->studentProgStatus(1, $month, $year));
        $data['fail'] = count($this->stprog->studentProgStatus(2, $month, $year)); 

        $data['tot_inv_adm'] = $this->inv->showAllByProg($month, $year, "Admissions Mentoring");
        $data['pend_adm'] = count($this->stprog->studentProgStatusByProg(0, $month, $year, "Admissions Mentoring"));
        $data['succ_adm'] = count($this->stprog->studentProgStatusByProg(1, $month, $year, "Admissions Mentoring"));
        $data['fail_adm'] = count($this->stprog->studentProgStatusByProg(2, $month, $year, "Admissions Mentoring"));
        
        $data['tot_inv_career'] = $this->inv->showAllByProgMain($month, $year, "Career Exploration");
        $data['pend_career'] = count($this->stprog->studentProgStatusByProgMain(0, $month, $year, "Career Exploration"));
        $data['succ_career'] = count($this->stprog->studentProgStatusByProgMain(1, $month, $year, "Career Exploration"));
        $data['fail_career'] = count($this->stprog->studentProgStatusByProgMain(2, $month, $year, "Career Exploration"));
        
        $data['tot_inv_sat'] = $this->inv->showAllByProg($month, $year, "SAT");
        $data['pend_sat'] = count($this->stprog->studentProgStatusByProg(0, $month, $year, "SAT"));
        $data['succ_sat'] = count($this->stprog->studentProgStatusByProg(1, $month, $year, "SAT"));
        $data['fail_sat'] = count($this->stprog->studentProgStatusByProg(2, $month, $year, "SAT"));

        $data['tot_inv_writing'] = $this->inv->showAllByProg($month, $year, "Writing Course");
        $data['pend_writing'] = count($this->stprog->studentProgStatusByProg(0, $month, $year, "Writing Course"));
        $data['succ_writing'] = count($this->stprog->studentProgStatusByProg(1, $month, $year, "Writing Course"));
        $data['fail_writing'] = count($this->stprog->studentProgStatusByProg(2, $month, $year, "Writing Course"));

        $data['lead'] = $this->stprog->studentProgramLead($month, $year);
        $data['con_lead'] = $this->stprog->studentProgramConversionLead($month, $year);
        $data['adm_lead'] = $this->stprog->studentProgramLeadByProg($month, $year, "Admissions Mentoring");
        $data['career_lead'] = $this->stprog->studentProgramLeadByProgMain($month, $year, "Career Exploration");
        $data['sat_lead'] = $this->stprog->studentProgramLeadByProg($month, $year, "SAT");
        $data['writing_lead'] = $this->stprog->studentProgramLeadByProg($month, $year, "Writing Course");

        $data['sch'] = count($this->sch->showAll());
        $data['spending'] = count($this->sp->showStatus(0));
        $data['ssuccess'] = count($this->sp->showStatus(1));
        $data['sdenied'] = count($this->sp->showStatus(2));
        $data['corp'] = count($this->cp->showCorporate()); 
        $data['cnot'] = count($this->corp->showAll())-$data['corp'];
        $data['cpending'] = count($this->cp->showStatus(0));
        $data['csuccess'] = count($this->cp->showStatus(1));
        $data['cdenied'] = count($this->cp->showStatus(2));

        $last5month = date('Y-m-d', strtotime("-6 months", strtotime(date('Y-m-d'))));
        $lm = date('m', strtotime($last5month));
        $ly = date('Y', strtotime($last5month));

        $data['saldo'] = $this->petty->saldo();
        $data['inv'] = count($this->inv->showALl());
        $data['invsch'] = count($this->invsch->showALl());
        $data['receipt'] = count($this->rec->showALls());
        $data['rec'] = count($this->rec->showALl());
        $data['recsch'] = count($this->rec->showAllB2B());
        $data['revenue'] = $this->rec->showRevenue($lm, $ly);



        $username = $this->session->userdata('empl_email');
        $data['empl'] = $this->empl->showEmail($username);
        $this->load->view('admin/home', $data);
        $this->load->view('admin/graph-client');
        $this->load->view('admin/graph-bizdev');
        $this->load->view('admin/graph-finance');
    }

}

?>