<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programdata
{
    function show(){
        // $data['mainProgram'] = ['Enrichment Program','Experiential Learning', 'Standardized Test',  'University & Scholarship'];
        $data['mainProgram'] = ['Admissions Advisory', 'Standardized Test', 'Essay Guidance', 'Interview Preparation', 'Tutoring', 'Experiential Learning', 'Enrichment Program', 'Workshop'];

        $data['adm'] = ['Admissions Consulting','-'];
        $data['sta'] = ['SAT Prep','SAT Subject','SAT Last Minute', 'SAT Last Minute Subject','SAT Summer','ACT Prep', '-'];
        $data['ess'] = ['-'];
        $data['int'] = ['-'];
        $data['tut'] = ['-'];
        $data['exp'] = ['Summer Science Research Program','PassionXplorer','JuniorXplorer','-'];
        $data['enr'] = ['-'];
        $data['wor'] = ['-'];
        
        // $data['subEP'] = ['Academic Writing','Business and Management Tutoring','English IB', 'University Application Boot Camp','Workshop'];
        // $data['subEL'] = ['Fieldtrip','Internships & Volunteering','Left Brain Meets Right Brain','Science','Social Science'];
        // $data['subST'] = ['ACT','SAT'];
        // $data['subUS'] = ['Admission Consulting','Essay Guidance','Interview Preparation'];
        $data['typeProg'] = ['B2B','B2B/B2C','B2C'];
        $data['subProgram'] = array_merge($data['adm'], $data['sta'],  $data['ess'],  $data['int'],  $data['tut'],  $data['exp'],  $data['enr'],  $data['wor']);

        return $data;
    }
}
?>