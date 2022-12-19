<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programdata
{
    function show(){ 
        $data['mainProgram'] = ['Admissions Mentoring', 'Career Exploration',  'Application Bootcamp','Academic & Test Preparation', 'Events & Info Sessions'];

        $data['adm'] = ['Admissions Mentoring','Essay Clinic','Interview Preparation'];
        $data['ce'] = ['JuniorXplorer','PassionXplorer','Summer Science Research Program'];
        $data['apb'] = [];
        $data['aca'] = ['ACT Prep','SAT Last Minute','SAT Last Minute Subject','SAT Prep','SAT Subject','Subject Tutoring'];
        $data['ei'] = [];

        $data['typeProg'] = ['B2B','B2B/B2C','B2C'];
        $data['subProgram'] = array_merge($data['adm'], $data['ce'],  $data['apb'],  $data['aca'],  $data['ei']);

        return $data;
    }
}
?>