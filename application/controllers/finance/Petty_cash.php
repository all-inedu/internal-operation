<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petty_cash extends CI_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model('finance/Petty_model','petty');
    }
    
    public function datas(){
        $data['div'] = ['Client Management', 'Business Development', 'Finance',' IT'];
        $data['status'] = ['Urgent', 'Immediately', 'Can Wait', 'Done'];
        return $data;
    }  

    public function index(){
        $data['income'] = $this->petty->showIncomeAll();
        $data['expense'] = $this->petty->showExpenseAll();
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/petty-cash/index',$data);
        $this->load->view('templates/f-io');
    }

    public function addIncome(){
        $m = date('m', strtotime($this->input->post('pettyinflow_date')));
        $y = date('Y', strtotime($this->input->post('pettyinflow_date')));
        
        $saldo = $this->petty->showSaldo($m, $y);
        if(empty($saldo)){
            $data = [
                'pettysaldo_month' => $m,
                'pettysaldo_year' => $y,
                'pettysaldo_inflow	' => $this->input->post('pettyinflow_total'),
                'pettysaldo_balance	' => $this->input->post('pettyinflow_total'),
            ];

            $this->petty->saveSaldo($data);
        } else {
            $newtotal = $this->input->post('pettyinflow_total');
            $oldIncome = $saldo['pettysaldo_inflow'];
            $oldExpense = $saldo['pettysaldo_expenses']; 
            $oldBalance = $saldo['pettysaldo_balance']; 

            $newIncome = $oldIncome + $newtotal;
            $newBalance = $newIncome - $oldExpense;
            $id = $saldo['pettysaldo_id'];
            $data = [
                'pettysaldo_inflow	' => $newIncome,
                'pettysaldo_balance	' => $newBalance
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

    public function view_income($id){
        $data = $this->petty->showIncomeId($id);
        echo json_encode($data);
    }

    public function updateIncome()
    {
        $id = $this->input->post('pettyinflow_id');
        $m = date('m', strtotime($this->input->post('pettyinflow_date')));
        $y = date('Y', strtotime($this->input->post('pettyinflow_date')));
        
        $saldo = $this->petty->showSaldo($m, $y);
        $income = $this->petty->showIncomeId($id);

        $newtotal = $this->input->post('pettyinflow_total');
        $oldTotal = $income['pettyinflow_total'];
        $oldIncome = $saldo['pettysaldo_inflow'];
        $oldExpense = $saldo['pettysaldo_expenses']; 
        $oldBalance = $saldo['pettysaldo_balance']; 

        $newIncome = $oldIncome - $oldTotal + $newtotal;
        $newBalance = $newIncome - $oldExpense;
        $idSaldo = $saldo['pettysaldo_id'];
        $datas = [
            'pettysaldo_inflow	' => $newIncome,
            'pettysaldo_balance	' => $newBalance
        ];

        $this->petty->updateSaldo($datas, $idSaldo);

        $data = [
            'pettyinflow_date' => $this->input->post('pettyinflow_date'),
            'pettyinflow_total' => $this->input->post('pettyinflow_total')
        ];
        
        $this->petty->updateIncome($data, $id);
        $this->session->set_flashdata('success', 'Income have been changed');
        redirect('/finance/petty-cash/');
    }

    public function deleteIncome($id){
        $this->petty->deleteIncome($id);
        $this->session->set_flashdata('success', 'Income have been deleted');
        redirect('/finance/petty-cash/');
    }

    public function addExpense(){

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

    public function view_expense($id){
        $data = $this->petty->showExpenseId($id);
        echo json_encode($data);
    }

    public function updateExpense()
    {
        $id = $this->input->post('pettyexpenses_id');
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
        $this->petty->deleteExpense($id);
        $this->session->set_flashdata('success', 'Income have been deleted');
        redirect('/finance/petty-cash/');
    }


    public function export(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-finance');
        $this->load->view('finance/petty-cash/export-petty-cash');
        $this->load->view('templates/f-io');
    }
}