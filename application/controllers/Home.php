<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('client/FollowUp_model','flw');
        $this->load->library('mail_smtp');
    }


    public function index()
    {    
        $this->load->view('home/index');
    }

    public function send_flw()
    {
        $datenow = date('Y-m-d');
        $next_day = date('Y-m-d',(strtotime ( '+1 day' , strtotime ($datenow))));

        $check_flw = $this->flw->checkFollowUp($next_day); 
        if($check_flw) {
            foreach ($check_flw as $flw) {
                $empl_id = $flw['empl_id'];
                $email = $flw['empl_email'];
                $data = $this->flw->showFollowUpByPIC($empl_id, $next_day);
                $datas['flw'] = $data;
                // foreach ($data as $d) {
                //  $flw_id = $d['flw_id'];
                //  $this->flw->sendEmail($flw_id);
                // }
                $this->sendEmail($datas, $email);
            }
        }
    }

    public function sendEmail($datas, $email)
    {
        $config = $this->mail_smtp->smtp();
        $this->load->library('mail_smtp', $config);
        $this->email->initialize($config);
        $this->email->from('info@all-inedu.com', 'ALL-in Eduspace');
        $this->email->to($email);
        $this->email->cc('hafidz.fanany@all-inedu.com');

        $this->email->subject('Follow-Up Reminder');

        $bodyMail = $this->load->view('home/mail/follow-sent', $datas, true);
        $this->email->message($bodyMail);

            // Send Email
        $this->email->send();

    }
    
}