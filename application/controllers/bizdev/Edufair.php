<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edufair extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('bizdev/Edufair_model', 'eduf');
        $this->load->model('hr/Employee_model', 'empl');
        $this->load->model('Menus_model','menu');
        
        $empl_id = $this->session->userdata('empl_id');
        if(empty($empl_id)) {
            redirect('/');
        } else {
            $data['empl_id'] = $empl_id;
            $data['menus'] = $this->menu->showId($empl_id, 1);
            $this->load->view('templates/h-io', $data);
            // echo json_encode($data);
        }
    }

    public function index(){
        $this->form_validation->set_rules('eduf_organizer','organizer name','required');
        if($this->form_validation->run()==false) {
            $data['eduf'] = $this->eduf->showAll();
            $this->load->view('templates/s-io');
            $this->load->view('bizdev/edufair/index', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->save();
        }
    }

    public function save() {
        $data = [
            'eduf_organizer' => $this->input->post('eduf_organizer'),
            'eduf_place' => $this->input->post('eduf_place'),
            'eduf_picname' => $this->input->post('eduf_picname'),
            'eduf_picmail' => $this->input->post('eduf_picmail'),
            'eduf_picphone' => $this->input->post('eduf_picphone'),
            'eduf_firstdisdate' => $this->input->post('eduf_firstdisdate'),
            'eduf_lastdisdate' => $this->input->post('eduf_firstdisdate'),
            'eduf_status' => 0,
            'eduf_eventstartdate' => '0000-00-00 00:00:00',
            'eduf_eventenddate' => '0000-00-00 00:00:00',
        ];

        $this->eduf->save($data);
        $this->session->set_flashdata('success','Edufair has been created');
        redirect('/bizdev/edufair/');
    }

    public function saveReview() {
        $id = $this->input->post('eduf_id');
        $this->form_validation->set_rules('edufreview_name','review name','required');
        if($this->form_validation->run()==false) {
            $this->session->set_flashdata('warning','Review name must be filled in');
            redirect('/bizdev/edufair/view/'.$id);
        } else {
            $data = [
                'eduf_id' => $id,
                'edufreview_name' => $this->input->post('edufreview_name'),
                'edufreview_score' => $this->input->post('edufreview_score'),
                'edufreview_desc' => $this->input->post('edufreview_desc'),
            ];
            $this->eduf->saveReview($data);
            $this->session->set_flashdata('success','Review has been created');
            redirect('/bizdev/edufair/view/'.$id);
        }
    }

    public function view($id){
        $data['eduf'] = $this->eduf->showId($id);
        $data['review'] = $this->eduf->showReview($id);
        $data['empl'] = $this->empl->showActive();
        $data['prosp'] = count($this->eduf->showStudentsByEduf($id, 0));
        $data['pot'] = count($this->eduf->showStudentsByEduf($id, 1));
        $data['curr'] = count($this->eduf->showStudentsByEduf($id, 2));
        $data['comp'] = count($this->eduf->showStudentsByEduf($id, 3));
        $this->load->view('templates/s-io');
        $this->load->view('bizdev/edufair/view-edufair', $data);
        $this->load->view('templates/f-io');
    }

    public function showReviewId($id) {
        $data = $this->eduf->showReviewId($id);
        echo json_encode($data);
    }

    public function edit($id){
        $this->form_validation->set_rules('eduf_organizer','organizer name','required');
        if($this->form_validation->run()==false) {
            $data['eduf'] = $this->eduf->showId($id);
            $data['empl'] = $this->empl->showActive();
            $this->load->view('templates/s-io');
            $this->load->view('bizdev/edufair/edit-edufair', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->update();
        }
    }

    public function update() {
        $id = $this->input->post('eduf_id');
        $picallin = implode(", ", $this->input->post('eduf_picallin[]'));
        $data = [
            'eduf_organizer' => $this->input->post('eduf_organizer'),
            'eduf_place' => $this->input->post('eduf_place'),
            'eduf_picname' => $this->input->post('eduf_picname'),
            'eduf_picmail' => $this->input->post('eduf_picmail'),
            'eduf_picphone' => $this->input->post('eduf_picphone'),
            'eduf_firstdisdate' => $this->input->post('eduf_firstdisdate'),
            'eduf_lastdisdate' => $this->input->post('eduf_lastdisdate'),
            'eduf_eventstartdate' => $this->input->post('eduf_eventstartdate'),
            'eduf_eventenddate' => $this->input->post('eduf_eventenddate'),
            'eduf_status' => $this->input->post('eduf_status'),
            'eduf_picallin' => $picallin,
            'eduf_notes' => $this->input->post('eduf_notes')
        ];

        $this->eduf->update($data, $id);
        $this->session->set_flashdata('success','Edufair has been changed');
        redirect('/bizdev/edufair/view/'.$id);
    }

    public function updateReview() {
        $id = $this->input->post('eduf_id');
        $idReview = $this->input->post('edufreview_id');
        $data = [
            'eduf_id' => $id,
            'edufreview_name' => $this->input->post('edufreview_name'),
            'edufreview_score' => $this->input->post('edufreview_score'),
            'edufreview_desc' => $this->input->post('edufreview_desc'),
        ];
        $this->eduf->updateReview($data, $idReview);
        $this->session->set_flashdata('success','Review has been changed');
        redirect('/bizdev/edufair/view/'.$id);
    }

    public function delete($id) {
        $this->eduf->delete($id);
        $this->session->set_flashdata('success','Review has been deleted');
        redirect('/bizdev/edufair/');
    }

    public function deleteReview($idReview, $id) {
        $this->eduf->deleteReview($idReview);
        $this->session->set_flashdata('success','Review has been deleted');
        redirect('/bizdev/edufair/view/'.$id);
    }
    
}