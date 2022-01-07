<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <form action="<?=base_url('client/student/send');?>" method="post">
                    <div class="card-body">
                        <div class="float-left">
                            <h5>Preview <?=$student['st_firstname'];?>'s Profile </h5>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-info" type="button" onClick="window.location.reload('Refresh')">
                                Refresh
                            </button>
                        </div>
                        <hr class="mt-5">
                        <table class="table table-bordered" border="0">
                            <tr>
                                <td>Name</td>
                                <td class="text-center">:</td>
                                <td><?=$student['st_firstname'].' '.$student['st_lastname'];?></td>
                            </tr>
                            <tr>
                                <td>Grade</td>
                                <td class="text-center">:</td>
                                <td>
                                    <?php 
                        $ynow = date('Y');
                        $yinput = date('Y', strtotime($student['st_datecreate']));
                        $ginput = $student['st_grade'];
                        $mnow = date('m'); 
                        if(($mnow>=7) and ($ynow>$yinput)) {
                            $gnow = ($ynow - $yinput) + $ginput;
                        } else 
                        if(($mnow<7) and ($ynow>$yinput)) {
                            $gnow = ($ynow - $yinput) + ($ginput - 1);
                        } else 
                        if(($mnow>=7) and ($ynow==$yinput)) {
                            $gnow = $ginput + 1;
                        } else {
                            $gnow = $ginput;
                        }

                        if($gnow <= 12) {
                            echo $gnow;
                        } else {
                            echo 'Not High School';
                        }
                        ?>
                                </td>
                            </tr>
                            <tr>
                                <td>School</td>
                                <td class="text-center">:</td>
                                <td><?=$student['sch_name'];?></td>
                            </tr>
                            <tr>
                                <td>Program Name</td>
                                <td class="text-center">:</td>
                                <td><?=$stprog['prog_sub'].': '.$stprog['prog_program'];?></td>
                            </tr>
                            <tr>
                                <td>Total Universities</td>
                                <td class="text-center">:</td>
                                <td><?=$stprog['stprog_tot_uni'];?></td>
                            </tr>
                            <tr>
                                <td>Major of Study Abroad</td>
                                <td class="text-center">:</td>
                                <td><?=$student['st_abrmajor'];?></td>
                            </tr>
                            <tr>
                                <td>Year of Going Study Abroad</td>
                                <td class="text-center">:</td>
                                <td><?=$student['st_abryear'];?></td>
                            </tr>
                            <tr>
                                <td>Questionnaire</td>
                                <td class="text-center">:</td>
                                <td>
                                    <?php if($stdetail['att_questioneer']):?>
                                    <a href="<?=base_url('upload/student/questionnaire/'.$stdetail['att_questioneer']);?>"
                                        target="_blank" class="btn btn-outline-success btn-sm">View Questionnaire</a>
                                    <?php else: ?>
                                    <a href="<?=base_url('client/profile/edit/'.$student['st_num']);?>" target="_blank"
                                        class="btn btn-outline-primary btn-sm">Add Questionnaire</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Assessment</td>
                                <td class="text-center">:</td>
                                <td>
                                    <?php if($stdetail['att_other']):?>
                                    <a href="<?=base_url('upload/student/assessment/'.$stdetail['att_other']);?>"
                                        target="_blank" class="btn btn-outline-success btn-sm">View Assessment</a>
                                    <?php else: ?>
                                    <a href="<?=base_url('client/profile/edit/'.$student['st_num']);?>" target="_blank"
                                        class="btn btn-outline-primary btn-sm">Add Assessment</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Mentor Name</td>
                                <td class="text-center">:</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small class="d-block">Main Mentor</small>
                                            <?=count($mentor)==1?$mentor[0]['mt_firstn'].' '.$mentor[0]['mt_lastn']:'-'?>
                                        </div>
                                        <div class="col-md-6">
                                            <small class="d-block">Backup Mentor</small>
                                            <?=count($mentor)==2?$mentor[1]['mt_firstn'].' '.$mentor[1]['mt_lastn']:'-'?>
                                        </div>
                                        <div class="col-md-12">
                                            <?php if(count($mentor)==0): ?>
                                            <a href="<?=base_url('client/students-program/view/'.$stprog['stprog_id']);?>"
                                                target="_blank" class="btn btn-outline-primary btn-sm">Add
                                                Mentor</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Additional Note</td>
                                <td class="text-center">:</td>
                                <td>
                                    <input type="hidden" name="st_num" value="<?=$student['st_num'];?>">
                                    <input type="hidden" name="stprog_id" value="<?=$stprog['stprog_id'];?>">
                                    <textarea name="notes" class="form-control"></textarea>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <div class="float-right">
                            <?php if(count($mentor)>=0): ?>
                            <button type="submit" class="btn btn-primary">Send to Mentor</button>
                            <?php endif; ?>
                        </div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>