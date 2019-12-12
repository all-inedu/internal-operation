<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Programs extends CI_Controller
{

    public function index(){
        $data['mainProgram'] = ['Encrihment Program','Experiential Learning', 'Standardized Test',  'University & Schoolarship'];
        $data['subEP'] = ['Academic Writing','Business and Management Tutoring','English IB',
        'University Application Boot Camp','Workshop'];
        $data['subEL'] = ['Fieldtrip','Internships & Volunteering','Left Brain Meets Right Brain','Science','Social Science'];
        $data['subST'] = ['ACT','SAT'];
        $data['subUS'] = ['Admission Consulting','Essay Guidance','Interview Preparation'];
        $data['typeProg'] = ['B2B','B2B/B2C','B2C'];

        $data['subProgram'] = array_merge($data['subEP'], $data['subEL'],  $data['subST'],  $data['subUS']);

        $this->load->view('templates/h-client');
        $this->load->view('templates/s-client');
        $this->load->view('client/programs/index', $data);
        $this->load->view('templates/f-client');
    }
}