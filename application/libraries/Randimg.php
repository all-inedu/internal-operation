<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Randimg
{
    function img(){
        $img = ['1.svg','2.svg','3.svg','4.svg'];
        $i = array_rand($img);
        return $img[$i];
    }
}
?>