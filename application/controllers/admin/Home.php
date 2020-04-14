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
        if(empty($empl_id)) {
            redirect('/admin/login');
        }
    }

    public function index() 
    {
        $datenow = date('Y-m-d');
        $days30 = date('Y-m-d', strtotime("-30 days", strtotime($datenow)));
        $data['prosp'] = count($this->std->studentStatus(0));
        $data['poten'] = count($this->std->studentStatus(1));
        $data['curr'] = count($this->std->studentStatus(2));
        $data['compl'] = count($this->std->studentStatus(3));
        $data['pend'] = count($this->stprog->studentProgStatus(0, $days30));
        $data['succ'] = count($this->stprog->studentProgStatus(1, $days30));
        $data['fail'] = count($this->stprog->studentProgStatus(2, $days30));
        $data['lead'] = $this->stprog->studentProgramLead($days30);
        $data['prog'] = $this->stprog->studentProgramProg($days30);

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