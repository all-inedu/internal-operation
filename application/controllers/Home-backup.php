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
        $next_day = date('Y-m-d',(strtotime ( '+1 day' , strtotime ( date('Y-m-d')) ) ));
        $check_flw = $this->flw->sendFollowUpByDate($next_day);
        if($check_flw) {
            $data['flw'] = $check_flw;
            foreach ($check_flw as $flw) {
                $flw_id = $flw['flw_id'];
                $this->flw->sendEmail($flw_id);
            }
            
            $this->sendEmail($data);
            // $this->load->view('home/mail/follow-sent', $data);
        }
        // $this->sendEmail($data);
    }

    public function sendEmail($data)
    {
        $config = $this->mail_smtp->smtp();
        $this->load->library('mail_smtp', $config);
        $this->email->initialize($config);
        $this->email->from('info@all-inedu.com', 'ALL-in Eduspace');
        $this->email->to('anggita.prastiwi@all-inedu.com','rizka.irawan@all-inedu.com');
        $this->email->bcc('admin@all-inedu.com');

        $this->email->subject('Follow-Up Reminder');

        $bodyMail = $this->load->view('home/mail/follow-sent', $data, true);
        $this->email->message($bodyMail);

            // Send Email
        $this->email->send();

    }
    
}