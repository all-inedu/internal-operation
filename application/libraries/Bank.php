<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank
{
    function showBank(){
        $data = ['BCA','BNI','BRI','BTPN', 'BTPN/Jenius', 'BTN', 'CIMB', 'DBS', 'HSBC', 'Mandiri'];
        return $data;
    }
}
?>