<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank
{
    function showBank(){
        $data = ['BCA','BNI','BRI', 'BTN', 'DBS', 'Mandiri'];
        return $data;
    }
}
?>