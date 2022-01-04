<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('countries');
        $this->load->library('majors');
        $this->load->model('bizdev/School_model','sch');
        $this->load->model('bizdev/University_model','univ');
        $this->load->model('client/Students_model','std');
        $this->load->model('client/Lead_model','lead');
        $this->load->model('client/Parents_model','prt');
        $this->load->model('client/Program_model','prog');
        $this->load->model('client/StProgram_model','stprog');
        $this->load->model('hr/Mentor_model','mt');
    }

    public function countries() {
        echo json_encode($this->countries->show());
    }

    public function major() {
        echo json_encode($this->majors->show());
    }

    public function school() {
        echo json_encode($this->sch->showAll());
    }

    public function lead() {
        echo json_encode($this->lead->showAll());
    }

    public function schoolSave() {
        $sch = $this->input->post('sch_name');
        $query = $this->sch->getId();   
		if($query->num_rows() <> 0){        
            $data = $query->row();      
            $id = intval($data->kode) + 1;    
		} else { 
		    $id = 1;    
		}
        $idmax = str_pad($id, 4, "0", STR_PAD_LEFT); 
        $newid = "SCH-".$idmax;

        if($sch!="") {
            $data = [
                'sch_id' => $newid,
                'sch_name' => $sch
            ];
            $process = $this->sch->save($data);
            if($process) {
                echo "001";
            } else {
                echo "03"; // error
            }
        } else {
            echo "no data";
        }
    }

    public function leadSave() {
        $query = $this->lead->getId();   
		if($query->num_rows() <> 0){        
            $data = $query->row();      
            $id = intval($data->kode) + 1;    
		} else { 
		    $id = 1;    
		}
        $idmax = str_pad($id, 3, "0", STR_PAD_LEFT); 
        $newid = "LS".$idmax;

        echo $newid;

        $data = [
            'lead_id' => $newid,
            'lead_name' => $this->input->post('lead_name'),
        ];

        $process = $this->lead->save($data);
        if($process) {
			echo "001";
		} else {
			echo "03"; // error
		}
    }

    public function parent($id="") 
    {
        if($id=="") {
            $pr = $this->prt->showAll();
        } else {
            $pr = $this->prt->showId($id);
        }

        echo json_encode($pr);
    }

    public function mentor() 
    {
        $query =  $this->mt->showMentorActive();
        $data = [];
        $no = 0;
        foreach ($query as $i) {
            $data[$no] = [
                'mt_id' => $i['mt_id'],
                'mt_name' => $i['mt_firstn']." ".$i['mt_lastn'],
            ];
            $no++;
        }

        echo json_encode($data);
    }

    public function birthDay() {
        $query = $this->std->showAll();

        $date = date('Y-m-d');
        // $date = '2021-10-29';
        $day = date('D',strtotime($date));
        $week_end = strtotime('next '.$day, strtotime($date));
        $month_start = date('M', $week_end);

        $month_now = date('M');
        $month_next = date('M', strtotime('+1 month', strtotime($month_now)));
        
        $data = [];
        foreach ($query as $st) {
            if($st['st_dob']!=null){
                $stprog = $this->stprog->getProgramByStudent($st['st_num'], 'Admissions Mentoring');
                if($month_start==$month_next) {
                    if(date('M', strtotime($st['st_dob']))==$month_next) {
                        $data['student'][$st['st_num']] = [
                            'st_num' => $st['st_num'],
                            'name' => $st['st_firstname']." ".$st['st_lastname'],
                            'dob' => date('d M', strtotime($st['st_dob'])),
                            'address' => $st['st_address'],
                            'program' => $stprog['prog_sub'].": ".$stprog['prog_program'],
                            'status' => 'Student'
                        ];
                    } 
                } else {
                    if(date('M', strtotime($st['st_dob']))==$month_now) {
                        $data['student'][$st['st_num']] = [
                            'st_num' => $st['st_num'],
                            'name' => $st['st_firstname']." ".$st['st_lastname'],
                            'dob' => date('d M', strtotime($st['st_dob'])),
                            'address' => $st['st_address'],
                            'program' => $stprog['prog_sub'].": ".$stprog['prog_program'],
                            'status' => 'Student'
                        ];
                    } 
                }
            }
        }

        $query2 = $this->prt->showAll();
        foreach ($query2 as $pr) {
            if($pr['pr_dob']!=null){
                if($month_start==$month_next) {
                    if(date('M', strtotime($pr['pr_dob']))==$month_start) {
                        $data['parent'][$pr['pr_id']] = [
                            'pr_id' => $pr['pr_id'],
                            'name' => $pr['pr_firstname']." ".$pr['pr_lastname'],
                            'dob' => date('d M', strtotime($pr['pr_dob'])),
                            'address' => $pr['pr_address'],
                            'status' => 'Parent'
                        ];
                    } 
                } else {
                    if(date('M', strtotime($pr['pr_dob']))==$month_now) {
                        $data['parent'][$pr['pr_id']] = [
                            'pr_id' => $pr['pr_id'],
                            'name' => $pr['pr_firstname']." ".$pr['pr_lastname'],
                            'dob' => date('d M', strtotime($pr['pr_dob'])),
                            'address' => $pr['pr_address'],
                            'status' => 'Parent'
                        ];
                    } 
                }
            }
        }

        if(empty($data['student'])) {
            $student = 0;
        } else {
            $student = count($data['student']);
        }

         if(empty($data['parent'])) {
            $parent = 0;
        } else {
            $parent = count($data['parent']);
        }

        $data['count'] = $student + $parent ;

        echo json_encode($data);
    }

    public function getAllStudent() {
        $data['std'] = $this->std->showAll();
        $total = count($data['std']);
        $st = [];
        foreach ($data['std'] as $i) {
            // parents name 
            if($i['pr_id']) {
                $prt = $this->prt->showId($i['pr_id']);
                $pr_name = $prt['pr_firstname']." ".$prt['pr_lastname'];
                if($prt['pr_phone']) {
                    $pr_phone = $prt['pr_phone'];
                } else {
                    $pr_phone = "N/A";
                }
                if($prt['pr_mail']) {
                    $pr_email = $prt['pr_mail'];
                } else {
                    $pr_email = "N/A";
                } 
            }  else {
                $pr_name = "N/A";
                $pr_phone = "N/A";
                $pr_email = "N/A";
            } 
            
            // Grade
            $ynow = date('Y');
            $yinput = date('Y', strtotime($i['st_datecreate']));
            $ginput = $i['st_grade'];
            $mnow = date('m'); 
            if(($mnow>=7) and ($ynow>$yinput)) {
                $gnow = ($ynow - $yinput) + $ginput;
            } else if(($mnow<7) and ($ynow>$yinput)) {
                $gnow = ($ynow - $yinput) + ($ginput - 1);
            } else if(($mnow>=7) and ($ynow==$yinput)) {
                $gnow = $ginput + 1;
            } else {
                $gnow = $ginput;
            }

            if($gnow <= 12) {
                $grade = $gnow;
            } else {
                $grade = 'Not High School';
            }
            
            // Lead 
            if(!empty($i['eduf_id'])) {
                $eduf = $this->eduf->showId($i['eduf_id']);
                $lead = $i['lead_name']."<br>(".$eduf['eduf_organizer'].")";
            } else if(!empty($i['infl_id'])) {
                $infl = $this->infl->showId($i['infl_id']);
                $lead = $i['lead_name']."<br>(".$infl['infl_fn'].")";
            } else {
                $lead = $i['lead_name'];
            }

            // Interest Program 
            $pdata = explode(", ", $i['prog_id']); 
            $interest_program = [];
            foreach ($pdata as $pd) {
                $progdata = $this->prog->showId($pd);
                if($progdata) {
                    if($progdata['prog_sub']==""){
                        $interest_program[$pd] = "<div class='badge badge-warning p-2 m-1'>".$progdata['prog_program']."</div> <br>";
                    } else {
                        $interest_program[$pd] = "<div class='badge badge-warning p-2 m-1'>".$progdata['prog_sub']." - ".$progdata['prog_program']."</div> <br>";
                    }
                }
            }

            // Students Program 
            $stprog = $this->stprog->showStProg($i['st_num']);
            $prog_succ = [];
            foreach ($stprog as $p) {
                if($p['stprog_status']==1) {
                    if($p['prog_sub']==""){
                       $prog_succ[$p['prog_id']] = "<div class='badge badge-success p-2 m-1'>".$p['prog_program']."</div> <br>";
                    } else {
                        $prog_succ[$p['prog_id']] = "<div class='badge badge-success p-2 m-1'>".$p['prog_sub']." - ".$p['prog_program']."</div> <br>";
                    }
                }
            }

            // University Destination 
            $udata = explode(", ", $i['st_abruniv']);
            $univ = []; 
            foreach ($udata as $ud) {
                if($ud!="") {
                    $univdata = $this->univ->showId($ud);
                    if(!empty($univdata)) {
                        $univ[$univdata['univ_id']] = "<div class='badge badge-primary p-2 m-1'>".$univdata['univ_name']."</div>";
                    }
                }
            }

            // Client Status 
            if($i['st_statuscli']==0) {
                $status = "<div class='badge border pt-2 pb-2 pl-3 pr-3 badge-light text-danger shadow'>Prospective</div>" ;
            } else if($i['st_statuscli']==1) {
                $status = "<div class='badge border pt-2 pb-2 pl-3 pr-3 badge-light text-info shadow'>Potential</div>" ;
            } else if($i['st_statuscli']==2) {
                $status = "<div class='badge border pt-2 pb-2 pl-3 pr-3 badge-light text-success shadow'>Current Student</div>" ;
            } else if($i['st_statuscli']==3) {
                $status = "<div class='badge border pt-2 pb-2 pl-3 pr-3 badge-light text-primary shadow'>Completed</div>" ;
            }

            // Process 
            if(!isset($st[$i['st_num']])) {
                $st[$i['st_num']] = [
                    'st_num' => $i['st_num'],
                    'st_id' => $i['st_id'],
                    'st_firstname' => $i['st_firstname'],
                    'st_lastname' => $i['st_lastname'],
                    'st_mail' => $i['st_mail'],
                    'st_phone' => $i['st_phone'],
                    'pr_name' => $pr_name,
                    'pr_phone' => $pr_phone,
                    'pr_email' => $pr_email,
                    'sch_name' => $i['sch_name'],
                    'st_grade' => $grade,
                    'st_insta' => $i['st_insta'],
                    'st_address' => $i['st_address'],
                    'st_state' => $i['st_state'],
                    'st_city' => $i['st_city'],
                    'lead_name' => $lead,
                    'st_levelinterest' => $i['st_levelinterest'],
                    'interest_program' => $interest_program,
                    'program_success' => $prog_succ,
                    'st_abryear' => $i['st_abryear'],
                    'st_abrcountry' => $i['st_abrcountry'],
                    'univ_destination' => $univ,
                    'st_abrmajor' => $i['st_abrmajor'],
                    'created_date' => date('d M Y', strtotime($i['st_datecreate'])),
                    'status' => $status,
                ];
            }
        }
        echo json_encode($st);
        exit;
    }
}