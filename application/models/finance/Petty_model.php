<?php
class Petty_model extends CI_model
{
    public function saldo()
    {
        $this->db->select_sum('pettysaldo_balance');
        return $this->db->get('tbl_pettysaldo')->row_array();
    }

    public function showLastSaldo($m, $y){
        $this->db->select_sum('pettysaldo_balance');
        $this->db->where('pettysaldo_month <', $m); 
        $this->db->where('pettysaldo_year =', $y); 
        return $this->db->get('tbl_pettysaldo')->row_array();
    }

    public function showLastSaldoYear($m, $y){
        $this->db->select_sum('pettysaldo_balance');
        $this->db->where('pettysaldo_year <', $y); 
        return $this->db->get('tbl_pettysaldo')->row_array();
    }


    public function showLastIncome($m, $y){
        $this->db->select_sum('pettyinflow_total');
        $this->db->where('month(pettyinflow_date) <', $m); 
        $this->db->where('year(pettyinflow_date) <=', $y); 
        return $this->db->get('tbl_pettyinflow')->row_array();
    }

    public function showLastExpense($m, $y){
        $this->db->select_sum('pettyexpenses_total');
        $this->db->where('month(pettyexpenses_date) <', $m); 
        $this->db->where('year(pettyexpenses_date) <=', $y); 
        return $this->db->get('tbl_pettyexpenses')->row_array();
    }
    
    public function showSaldo($m, $y){
        $this->db->select('*');
        $this->db->where('pettysaldo_month', $m); 
        $this->db->where('pettysaldo_year', $y); 
        return $this->db->get('tbl_pettysaldo')->row_array();
    }

    public function saveSaldo($data)
    {
        $this->db->insert('tbl_pettysaldo', $data);
    }

    public function updateSaldo($data, $id)
    {
        $this->db->set($data);
        $this->db->where('pettysaldo_id', $id);
        $this->db->update('tbl_pettysaldo');
    }

    public function showIncomeAll()
    {
        $this->db->select('*');
        return $this->db->get('tbl_pettyinflow')->result_array();
    }

    public function showIncomeId($id)
    {
        $this->db->select('*');
        $this->db->where('pettyinflow_id', $id); 
        return $this->db->get('tbl_pettyinflow')->row_array();
    }
    
    public function showIncome($m, $y)
    {
        $this->db->select('*');
        $this->db->where('month(pettyinflow_date)', $m); 
        $this->db->where('year(pettyinflow_date)', $y); 
        return $this->db->get('tbl_pettyinflow')->row_array();
    }

    public function saveIncome($data)
    {
        $this->db->insert('tbl_pettyinflow', $data);
    }

    public function updateIncome($data, $id)
    {
        $this->db->set($data);
        $this->db->where('pettyinflow_id', $id);
        $this->db->update('tbl_pettyinflow');
    }

    public function deleteIncome($id){
        $this->db->where('pettyinflow_id', $id);
        $this->db->delete('tbl_pettyinflow');
    }

    

    // Expenses
    public function showExpenseAll()
    {
        $this->db->select('*');
        return $this->db->get('tbl_pettyexpenses')->result_array();
    }

    public function saveExpense($data)
    {
        $this->db->insert('tbl_pettyexpenses', $data);
    }

    public function showExpenseId($id)
    {
        $this->db->select('*');
        $this->db->where('pettyexpenses_id', $id); 
        return $this->db->get('tbl_pettyexpenses')->row_array();
    }

    public function showExpenseDate($m, $y)
    {
        $this->db->select('*');
        $this->db->where('month(pettyexpenses_date)', $m); 
        $this->db->where('year(pettyexpenses_date)', $y); 
        return $this->db->get('tbl_pettyexpenses')->result_array();
    }

    public function updateExpense($data, $id)
    {
        $this->db->set($data);
        $this->db->where('pettyexpenses_id', $id);
        $this->db->update('tbl_pettyexpenses');
    }

    public function deleteExpense($id){
        $this->db->where('pettyexpenses_id', $id);
        $this->db->delete('tbl_pettyexpenses');
    }
    
}