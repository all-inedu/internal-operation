<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petty_cash extends CI_Controller
{

    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('pdf');
        $this->load->model('finance/Petty_model','petty');
        $this->load->model('Menus_model','menu');
        
        $empl_id = $this->session->userdata('empl_id');
        if(empty($empl_id)) {
            redirect('/');
        } else {
            $data['empl_id'] = $empl_id;
            $data['menus'] = $this->menu->showId($empl_id, 1);
            $this->load->view('templates/h-io', $data);
            // echo json_encode($data);
        }
    }
    
    public function datas(){
        $data['div'] = ['Client Management', 'Business Development', 'Finance',' IT'];
        $data['status'] = ['Urgent', 'Immediately', 'Can Wait', 'Done'];
        return $data;
    }  

    public function index(){
        $data['income'] = $this->petty->showIncomeAll();
        $data['expense'] = $this->petty->showExpenseAll();
        $data['saldo'] = $this->petty->saldo();
        $this->load->view('templates/s-io');
        $this->load->view('finance/petty-cash/index',$data);
        $this->load->view('templates/f-io');
    }

    public function addIncome(){
        $this->form_validation->set_rules('pettyinflow_date','income date', 'required');
        $this->form_validation->set_rules('pettyinflow_total','total income', 'required');
        if($this->form_validation->run()==false) {
            $this->index();
        } else {
            $m = date('m', strtotime($this->input->post('pettyinflow_date')));
            $y = date('Y', strtotime($this->input->post('pettyinflow_date')));
            $showExsp = $this->petty->sumExpenseTotal($m, $y);
            $oldExpense = $showExsp['pettyexpenses_total'];
            
            $saldo = $this->petty->showSaldo($m, $y);
            if(empty($saldo)){
                $newBalance = $this->input->post('pettyinflow_total') - $oldExpense;
                $data = [
                    'pettysaldo_month' => $m,
                    'pettysaldo_year' => $y,
                    'pettysaldo_inflow' => $this->input->post('pettyinflow_total'),
                    'pettysaldo_expenses' => $oldExpense,
                    'pettysaldo_balance' => $newBalance
                ];
                $this->petty->saveSaldo($data);
            } else {
                $newtotal = $this->input->post('pettyinflow_total');
                $oldIncome = $saldo['pettysaldo_inflow'];
                $oldBalance = $saldo['pettysaldo_balance']; 
    
                $newIncome = $oldIncome + $newtotal;
                $newBalance = $newIncome - $oldExpense;
                $id = $saldo['pettysaldo_id'];
                $data = [
                    'pettysaldo_inflow' => $newIncome,
                    'pettysaldo_expenses' => $oldExpense,
                    'pettysaldo_balance' => $newBalance
                ];
                $this->petty->updateSaldo($data, $id);
            }
    
            $data = [
                'pettyinflow_date' => $this->input->post('pettyinflow_date'),
                'pettyinflow_total' => $this->input->post('pettyinflow_total')
            ];
            $this->petty->saveIncome($data);
    
            $this->session->set_flashdata('success', 'Income have been saved');
            redirect('/finance/petty-cash/');
        }
    }

    public function view_income($id){
        $data = $this->petty->showIncomeId($id);
        echo json_encode($data);
    }

    public function updateIncome()
    {
        $id = $this->input->post('pettyinflow_id');
        $m = date('m', strtotime($this->input->post('pettyinflow_date')));
        $y = date('Y', strtotime($this->input->post('pettyinflow_date')));

        // PERHITUNGAN SALDO    
        $income = $this->petty->showIncomeId($id);
        $saldo = $this->petty->showSaldo($m, $y);

        if(empty($saldo)){
            
            $oldMonth = date('m', strtotime($income['pettyinflow_date']));
            $oldYear = date('Y', strtotime($income['pettyinflow_date']));
            $oldSaldo = $this->petty->showSaldo($oldMonth, $oldYear);
            $oldTotal = $income['pettyinflow_total'];
            $oldIncome = $oldSaldo['pettysaldo_inflow'];
            $oldExpense = $oldSaldo['pettysaldo_expenses'];
            $oldBalance = $oldSaldo['pettysaldo_balance']; 

            $newIncome = $oldIncome - $oldTotal;
            $newBalance = $newIncome - $oldExpense ;

            $idSaldo = $oldSaldo['pettysaldo_id'];

            // Update saldo lama 
            $datas = [
                'pettysaldo_inflow	' => $newIncome,
                'pettysaldo_balance	' => $newBalance
            ];
            // echo json_encode($datas);
            $this->petty->updateSaldo($datas, $idSaldo);

            // Simpan saldo bulan baru
            $data = [
                'pettysaldo_month' => $m,
                'pettysaldo_year' => $y,
                'pettysaldo_inflow	' => $this->input->post('pettyinflow_total'),
                'pettysaldo_balance	' => $this->input->post('pettyinflow_total'),
            ];
            // echo json_encode($data);
            $this->petty->saveSaldo($data);

        } else {
            $m0 = date('m', strtotime($income['pettyinflow_date']));
            $y0 = date('Y', strtotime($income['pettyinflow_date']));
            $saldo0 = $this->petty->showSaldo($m0, $y0);
            
            $total0 = $income['pettyinflow_total'];
            $income0 = $saldo0['pettysaldo_inflow'];
            $expense0 = $saldo0['pettysaldo_expenses'];
            $balance0 = $saldo0['pettysaldo_balance']; 

            $income1 = $income0 - $total0;
            $balance1 = $income1 - $expense0 ;

            $id0 = $saldo0['pettysaldo_id'];

            // Update saldo lama 
            $data0 = [
                'pettysaldo_inflow	' => $income1,
                'pettysaldo_balance	' => $balance1
            ];
            // echo $id0;
            // echo json_encode($data0);
            $this->petty->updateSaldo($data0, $id0);


            $newtotal = $this->input->post('pettyinflow_total');
            $oldTotal = $income['pettyinflow_total'];
            $oldIncome = $saldo['pettysaldo_inflow'];
            $oldExpense = $saldo['pettysaldo_expenses']; 
            $oldBalance = $saldo['pettysaldo_balance']; 
            $id1 = $saldo['pettysaldo_id'];
            
            if($id0!=$id1){
                $newIncome = $oldIncome + $newtotal;
            } else {
                $newIncome = ($oldIncome - $oldTotal) + $newtotal;
            }

            $newBalance = $newIncome - $oldExpense;
            $data1 = [
                'pettysaldo_inflow	' => $newIncome,
                'pettysaldo_balance	' => $newBalance
            ];
            // echo $id1;
            // echo json_encode($data1);
            $this->petty->updateSaldo($data1, $id1);
        }

        $data = [
            'pettyinflow_date' => $this->input->post('pettyinflow_date'),
            'pettyinflow_total' => $this->input->post('pettyinflow_total')
        ];
        
        $this->petty->updateIncome($data, $id);
    
        $this->session->set_flashdata('success', 'Income have been changed');
        redirect('/finance/petty-cash/');
    }

    public function deleteIncome($id){
        $income = $this->petty->showIncomeId($id);
        $m = date('m', strtotime($income['pettyinflow_date']));
        $y = date('Y', strtotime($income['pettyinflow_date']));
        $saldo = $this->petty->showSaldo($m, $y);

        $total = $income['pettyinflow_total'];
        $oldIncome = $saldo['pettysaldo_inflow'];
        $oldBalance = $saldo['pettysaldo_balance'];

        $newIncome = $oldIncome - $total;
        $newBalance = $oldBalance - $total;

        $idSaldo = $saldo['pettysaldo_id'];
        $datas = [
            'pettysaldo_inflow	' => $newIncome,
            'pettysaldo_balance	' => $newBalance
        ];

        $this->petty->updateSaldo($datas, $idSaldo);
        $this->petty->deleteIncome($id);
        $this->session->set_flashdata('success', 'Income have been deleted');
        redirect('/finance/petty-cash/');
    }

    public function addExpense(){
        $this->form_validation->set_rules('pettyexpenses_date','expense date', 'required');
        $this->form_validation->set_rules('pettyexpenses_total','total expense', 'required');
        $this->form_validation->set_rules('pettyexpenses_inv','invoice', 'required');
        $this->form_validation->set_rules('pettyexpenses_supplier','supplier', 'required');
        if($this->form_validation->run()==false) {
            $this->index();
        } else {
            $m = date('m', strtotime($this->input->post('pettyexpenses_date')));
            $y = date('Y', strtotime($this->input->post('pettyexpenses_date')));
            
            $saldo = $this->petty->showSaldo($m, $y);
            if(empty($saldo)){
                $data = [
                    'pettysaldo_month' => $m,
                    'pettysaldo_year' => $y,
                    'pettysaldo_expenses' => $this->input->post('pettyexpenses_total'),
                    'pettysaldo_balance	' => -($this->input->post('pettyexpenses_total')),
                ];
    
                $this->petty->saveSaldo($data);
                
            } else {
                $newTotal = $this->input->post('pettyexpenses_total');
                $oldExpense = $saldo['pettysaldo_expenses'];
                $oldIncome = $saldo['pettysaldo_inflow'];
                $oldBalance = $saldo['pettysaldo_balance'];
    
                $newExpense = $oldExpense + $newTotal;
                $newBalance = $oldIncome - $newExpense;
    
                $id = $saldo['pettysaldo_id'];
                $data = [
                    'pettysaldo_expenses' => $newExpense,
                    'pettysaldo_balance	' => $newBalance
                ];
                $this->petty->updateSaldo($data, $id);
            }
    
            $data = [
                'pettyexpenses_date' => $this->input->post('pettyexpenses_date'),
                'pettyexpenses_inv' => $this->input->post('pettyexpenses_inv'),
                'pettyexpenses_supplier' => $this->input->post('pettyexpenses_supplier'),
                'pettyexpenses_type' => $this->input->post('pettyexpenses_type'),
                'pettyexpenses_paymentfrom' => $this->input->post('pettyexpenses_paymentfrom'),
                'pettyexpenses_total' => $this->input->post('pettyexpenses_total')
            ];
            $this->petty->saveExpense($data);
            $this->session->set_flashdata('success', 'Expense have been saved');
            redirect('/finance/petty-cash/');
        }
    }

    public function view_expense($id){
        $data = $this->petty->showExpenseId($id);
        echo json_encode($data);
    }

    public function updateExpense()
    {
        $id = $this->input->post('pettyexpenses_id');

        $m = date('m', strtotime($this->input->post('pettyexpenses_date')));
        $y = date('Y', strtotime($this->input->post('pettyexpenses_date')));

        // PERHITUNGAN SALDO    
        $expense = $this->petty->showExpenseId($id);
        $saldo = $this->petty->showSaldo($m, $y);
        

        if(empty($saldo)){ 
           
            $oldMonth = date('m', strtotime($expense['pettyexpenses_date']));
            $oldYear = date('Y', strtotime($expense['pettyexpenses_date']));
            $oldSaldo = $this->petty->showSaldo($oldMonth, $oldYear);
            $oldTotal = $expense['pettyexpenses_total'];
            $oldIncome = $oldSaldo['pettysaldo_inflow'];
            $oldExpense = $oldSaldo['pettysaldo_expenses'];
            $oldBalance = $oldSaldo['pettysaldo_balance']; 

            $newExpense = $oldExpense - $oldTotal;
            $newBalance = $oldIncome - $newExpense ;

            $idSaldo = $oldSaldo['pettysaldo_id'];

            // Update saldo lama 
            $datas = [
                'pettysaldo_expenses' => $newExpense,
                'pettysaldo_balance	' => $newBalance
            ];
            // echo $idSaldo;
            // echo json_encode($datas);
            $this->petty->updateSaldo($datas, $idSaldo);

            // Simpan saldo bulan baru
            $data = [
                'pettysaldo_month' => $m,
                'pettysaldo_year' => $y,
                'pettysaldo_expenses' => $this->input->post('pettyexpenses_total'),
                'pettysaldo_balance	' => -($this->input->post('pettyexpenses_total')),
            ];
            // echo json_encode($data);
            $this->petty->saveSaldo($data);

        } else {
            $m0 = date('m', strtotime($expense['pettyexpenses_date']));
            $y0 = date('Y', strtotime($expense['pettyexpenses_date']));
            $saldo0 = $this->petty->showSaldo($m0, $y0);

            $total0 = $expense['pettyexpenses_total'];
            $income0 = $saldo0['pettysaldo_inflow'];
            $expense0 = $saldo0['pettysaldo_expenses'];
            $balance0 = $saldo0['pettysaldo_balance']; 

            $expense1 = $expense0 - $total0;
            $balance1 = $income0 - $expense1;

            $id0 = $saldo0['pettysaldo_id'];

            // Update saldo lama 
            $data0 = [
                'pettysaldo_expenses' => $expense1,
                'pettysaldo_balance' => $balance1
            ];
            // echo $id0;
            // echo json_encode($data0);
            $this->petty->updateSaldo($data0, $id0);

            $newtotal = $this->input->post('pettyexpenses_total');
            $oldTotal = $expense['pettyexpenses_total'];
            $oldIncome = $saldo['pettysaldo_inflow'];
            $oldExpense = $saldo['pettysaldo_expenses']; 
            $oldBalance = $saldo['pettysaldo_balance']; 
            $id1 = $saldo['pettysaldo_id'];
            
            if($id0!=$id1){
                $newExpense = $oldExpense + $newtotal;
            } else {
                $newExpense = ($oldExpense - $oldTotal) + $newtotal;
            }

            $newBalance = $oldIncome - $newExpense;
            $data1 = [
                'pettysaldo_expenses	' => $newExpense,
                'pettysaldo_balance	' => $newBalance
            ];
            // echo $id1;
            // echo json_encode($data1);
            $this->petty->updateSaldo($data1, $id1);
        }

        $data = [
            'pettyexpenses_date' => $this->input->post('pettyexpenses_date'),
            'pettyexpenses_inv' => $this->input->post('pettyexpenses_inv'),
            'pettyexpenses_supplier' => $this->input->post('pettyexpenses_supplier'),
            'pettyexpenses_type' => $this->input->post('pettyexpenses_type'),
            'pettyexpenses_paymentfrom' => $this->input->post('pettyexpenses_paymentfrom'),
            'pettyexpenses_total' => $this->input->post('pettyexpenses_total')
        ];
        
        $this->petty->updateExpense($data, $id);
        $this->session->set_flashdata('success', 'Expense have been changed');
        redirect('/finance/petty-cash/');
    }

    public function deleteExpense($id){
        $expense = $this->petty->showExpenseId($id);
        $m = date('m', strtotime($expense['pettyexpenses_date']));
        $y = date('Y', strtotime($expense['pettyexpenses_date']));
        $saldo = $this->petty->showSaldo($m, $y);

        $total = $expense['pettyexpenses_total'];
        $oldIncome = $saldo['pettysaldo_inflow'];
        $oldExpense = $saldo['pettysaldo_expenses'];
        $oldBalance = $saldo['pettysaldo_balance'];

        $newExpense = $oldExpense - $total;
        $newBalance = $oldBalance + $total;

        $idSaldo = $saldo['pettysaldo_id'];
        $datas = [
            'pettysaldo_expenses' => $newExpense,
            'pettysaldo_balance	' => $newBalance
        ];

        // echo json_encode($datas);
        $this->petty->updateSaldo($datas, $idSaldo);
        $this->petty->deleteExpense($id);
        $this->session->set_flashdata('success', 'Income have been deleted');
        redirect('/finance/petty-cash/');
    }

    public function export(){
        $this->form_validation->set_rules('month','month','required');
        $this->form_validation->set_rules('year','year','required');
        if($this->form_validation->run()==false){
            $data['m']='';
            $data['y']='';

            $this->load->view('templates/s-io');
            $this->load->view('finance/petty-cash/export-petty-cash',$data);
            $this->load->view('templates/f-io');
        } else {
            $this->view_export();
        }
    }

    public function view_export(){
        $m = $this->input->post('month');
        $y = $this->input->post('year');
        if($m==1){
            $lm = $m+11;
            $ly = $y-1;
        } else {
            $lm = $m-1;
            $ly = $y;
        }

        $lastSaldo = $this->petty->showLastSaldo($m, $y);
        $lastSaldoY = $this->petty->showLastSaldoYear($m, $y);
        $lastIncome = $this->petty->showLastIncome($m, $y);
        $lastExpense = $this->petty->showLastExpense($m, $y);

        // echo json_encode($lastSaldoY);
        // echo json_encode($lastSaldo);
        // echo json_encode($lastExpense);

        $data['m'] = $m;
        $data['month'] = date('F', mktime(0, 0, 0, $m, 10));
        $data['lmonth'] = date('F', mktime(0, 0, 0, $lm, 10));
        $data['y'] = $y;
        $data['lastsaldo'] = $lastSaldo['pettysaldo_balance'] + $lastSaldoY['pettysaldo_balance'];
        $data['saldo'] = $this->petty->showSaldo($m, $y);
        $data['expense'] = $this->petty->showExpenseDate($m, $y);

        $this->load->view('templates/s-io');
        $this->load->view('finance/petty-cash/export-petty-cash',$data);
        $this->load->view('templates/f-io');
    }

    public function print($m, $y){
        if($m==1){
            $lm = $m+11;
            $ly = $y-1;
        } else {
            $lm = $m-1;
            $ly = $y;
        }

        $lastSaldo = $this->petty->showLastSaldo($m, $y);
        $lastSaldoY = $this->petty->showLastSaldoYear($m, $y);
        $lastIncome = $this->petty->showLastIncome($m, $y);
        $lastExpense = $this->petty->showLastExpense($m, $y);

        // echo json_encode($lastSaldoY);
        // echo json_encode($lastSaldo);
        // echo json_encode($lastExpense);

        $data['m'] = $m;
        $data['month'] = date('F', mktime(0, 0, 0, $m, 10));
        $data['lmonth'] = date('F', mktime(0, 0, 0, $lm, 10));
        $data['y'] = $y;
        $data['lastsaldo'] = $lastSaldo['pettysaldo_balance'] + $lastSaldoY['pettysaldo_balance'];
        $data['saldo'] = $this->petty->showSaldo($m, $y);
        $data['expense'] = $this->petty->showExpenseDate($m, $y);

        $html = $this->load->view('finance/petty-cash/print',$data, true);

        $this->pdf->createPDF($html, 'Petty Cash- '.$m.'-'.$y, false, 'a4', 'landscape');
    }
}