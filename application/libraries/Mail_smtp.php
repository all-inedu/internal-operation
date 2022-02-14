<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mail_smtp
{
    // SSL
    public function smtp()
    {
        // $config = [
        //     'protocol' => 'smtp',
        //     'smtp_crypto' => 'tls',
        //     'smtp_host' => 'smtp.gmail.com',
        //     'smtp_user' => 'all.in.eduspace@gmail.com',
        //     'smtp_pass' => 'bwhlsupvcrqxhttj', 
        //     'smtp_port' => 587,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n",
        // ];

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => '8449fd6e7f5e26',
            'smtp_pass' => 'd5b344553b9bdf',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ];
        
        return $config;
    }

}