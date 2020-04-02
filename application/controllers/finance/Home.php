    <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('finance/Petty_model','petty');
        $this->load->model('finance/Invoice_model','inv');
        $this->load->model('finance/InvoiceSchool_model','invsch');
        $this->load->model('finance/Receipt_model','rec');
        $this->load->model('Menus_model','menu');
        
        $empl_id = $this->session->userdata('empl_id');
        $position = $this->session->userdata('position');
        if(empty($empl_id)) {
            redirect('/');
        } else {
            if($position!='finance') {
                redirect('/'.$position);
            }

            $data['empl_id'] = $empl_id;
            $data['menus'] = $this->menu->showId($empl_id, 1);
            $this->load->view('templates/h-io', $data);
            // echo json_encode($data);
        }
    }

    public function index(){

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
        // echo json_encode($data['revenue']);
        $this->load->view('templates/s-io');
        $this->load->view('finance/index', $data);
        $this->load->view('templates/f-io');
    }
    
}