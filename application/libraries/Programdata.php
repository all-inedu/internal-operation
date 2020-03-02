<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programdata
{
    function show(){
        $data['mainProgram'] = ['Enrichment Program','Experiential Learning', 'Standardized Test',  'University & Scholarship'];
        $data['subEP'] = ['Academic Writing','Business and Management Tutoring','English IB',
        'University Application Boot Camp','Workshop'];
        $data['subEL'] = ['Fieldtrip','Internships & Volunteering','Left Brain Meets Right Brain','Science','Social Science'];
        $data['subST'] = ['ACT','SAT'];
        $data['subUS'] = ['Admission Consulting','Essay Guidance','Interview Preparation'];
        $data['typeProg'] = ['B2B','B2B/B2C','B2C'];
        $data['subProgram'] = array_merge($data['subEP'], $data['subEL'],  $data['subST'],  $data['subUS']);

        return $data;
    }
}
?>