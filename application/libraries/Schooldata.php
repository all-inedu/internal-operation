<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schooldata
{
    function show(){
        $data = [
            'type' => ['National', 'International'],
            'level' => ['Junior','Elementary','Senior','High'],
            'curriculum' => ['National','IB','A-Level']
        ];
        return $data;
    }
}
?>