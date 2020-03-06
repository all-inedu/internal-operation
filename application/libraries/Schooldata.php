<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schooldata
{
    function show(){
        $data = [
            'type' => ['National', 'International'],
            'level' => ['Grade 1','Grade 2','Grade 3', 'University'],
            'curriculum' => ['American Curriculum', 'Australian Curriculum', 'IB', 'National Curriculum', 'Singapore Curiculum'],
        ];
        return $data;
    }
}
?>