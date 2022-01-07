<?php
    $source = file_get_contents('https://www.google.com/finance/quote/USD-IDR');
    function getStringBetween($string, $start, $end) {
        $string = " ".$string;
        $ini = strpos($string,$start);
        if ($ini == 0) return "";
        $ini += strlen($start);
        $len = strpos($string,$end,$ini) - $ini;
        return substr($string,$ini,$len);
    }
    $str  =  getStringBetween($source,  '<div jsname="ip75Cb" class="kf1m0"><div class="YMlKec fxKbKc">',  '</div></div>');
    $new_str = substr(str_replace(",","",$str),0,6);
    $idr_google = intval($new_str);
?>
<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Students Program
                </div>
            </nav>
        </div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('client/student/');?>">Students</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('client/students-program');?>">Students Program</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card shadow">
            <div class="card-body pb-4">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/student-prog.png');?>" alt="client management" width="70%">
                    <h6 class="mt-3">
                        <?=$stprog['st_firstname']." ".$stprog['st_lastname']; ?>
                    </h6>
                    <hr style="width:20%; margin-bottom:5px; margin-top:5px;">
                    <div class="text-info">
                        Program Name : <br>
                        <b>
                            <?php 
                                if($stprog['prog_sub']=='') {
                                    echo $stprog['prog_program'];
                                } else {
                                    echo $stprog['prog_sub'].': '.$stprog['prog_program'];
                                }
                            ?>
                        </b>
                        <input type="text" value="<?=$stprog['prog_sub'];?>" id="sub-program" hidden>
                    </div>
                    <?php if($stprog['prog_sub']=='Admissions Mentoring'):?>
                    <a href="<?=base_url('client/student/report/'.$stprog['st_num'].'/'.$stprog['stprog_id']);?>"
                        class="btn btn-sm btn-outline-info mt-3 mr-2">
                        <i class="fas fa-paper-plane"></i> Send to Mentor
                    </a>
                    <?php endif;?>
                    <a href="<?=base_url('client/student/view/'.$stprog['st_num']);?>"
                        class="btn btn-sm btn-outline-primary mt-3 mr-2"><i class="fas fa-pencil-alt"></i>&nbsp;
                        Profile</a>

                    <a href="<?=base_url('client/students-program/delete/'.$stprog['stprog_id']);?>"
                        class="delete-button btn btn-sm btn-outline-danger mt-3" data-message="students program">
                        <i class="fas fa-trash"></i>&nbsp; Delete
                    </a>
                </div>
            </div>
        </div>
        <div class="card shadow mt-2">
            <div class="card-header pb-0">
                <h6><i class="fas fa-history fa-fw"></i> Follow-Up History</h6>
            </div>
            <div class="card-body">

                <?php 
                        $no=1;
                        foreach ($flw as $flw):
                    ?>
                <b><?=$no;?>. Date : <?= date('d M Y', strtotime($flw['flw_date']));?></b>
                <?php
                    if($flw['flw_mark']==0){
                        echo "<i class='fas fa-clock text-info float-right' title='Not Yet'></i>";
                    } else {
                        echo "<i class='fas fa-check text-success float-right' title='Done'></i>";
                    }
                ?>
                <hr class="m-0 pb-2">
                <?php
                    if($flw['flw_mark']==0){
                        echo '<i>Not follow-up yet!</i>';
                    } else {
                        echo $flw['flw_notes'];
                    }
                    
                    echo "<br>";

                    $no++;
                    endforeach;
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-8 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h6 class="align-middle"><i class="fas fa-user"></i>&nbsp; &nbsp; Students Program
                    <div class="float-right">
                        <a href="<?=base_url('client/students-program/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="" method="post" name="editSP">
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-network-wired fa-fw"></i>&nbsp; &nbsp; Lead Source :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <input name="stprog_id" type="hidden" value="<?=$stprog['stprog_id'];?>">
                                    <input name="st_num" type="hidden" value="<?=$stprog['st_num'];?>">
                                    <select id="leadSource" name="lead_id">
                                        <option data-placeholder="true"></option>
                                        <?php foreach($lead as $ld): ?>
                                        <option value="<?=$ld['lead_id'];?>"><?=$ld['lead_name'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?=form_error('lead_id', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-calendar-alt fa-fw"></i>&nbsp; &nbsp; Date :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <small>First Discuss</small>
                                    <input name="stprog_firstdisdate" type="date" class="form-control form-control-sm"
                                        value="<?=$stprog['stprog_firstdisdate'];?>">
                                    <?=form_error('stprog_firstdisdate', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Planned Follow-Up</small>
                                    <input name="stprog_followupdate" type="date" class="form-control form-control-sm"
                                        value="<?=$stprog['stprog_followupdate'];?>" onchange="followUp()"
                                        id="follow-up">
                                    <?=form_error('stprog_lastdisdate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-sticky-note fa-fw"></i>&nbsp; &nbsp; Notes :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <textarea name="stprog_meetingnote" class="form-control form-control-sm"
                                        rows="5"><?=$stprog['stprog_meetingnote'];?></textarea>
                                    <?=form_error('stprog_meetingnote', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-hourglass-half fa-fw"></i>&nbsp; &nbsp; Program Status :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <small>Status</small>
                                    <select id="stPotential" name="stprog_status" onchange="progStatus()">
                                        <option data-placeholder="true"></option>
                                        <option value="0">Pending</option>
                                        <option value="1">Success</option>
                                        <option value="2">Failed</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3" id="successDate">
                                    <small>Date</small>
                                    <!-- <input type="date" name="stprog_pendingdate"
                                        value="<?=$stprog['stprog_pendingdate'];?>" class="form-control form-control-sm"
                                        id="pendingDate"> -->
                                    <input type="date" name="stprog_statusprogdate"
                                        value="<?=$stprog['stprog_statusprogdate']!=null?$stprog['stprog_statusprogdate']:date('Y-m-d')?>"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="row mb-3" id="sub-pending">
                                <?php if($stprog['prog_sub']=="Admissions Mentoring") { ?>
                                <div class="col-md-6 mb-3">
                                    <small>Initial Consultation Date</small>
                                    <input type="date" name="stprog_init_consult"
                                        value="<?=$stprog['stprog_init_consult'];?>"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Initial Assessment Sent</small>
                                    <input type="date" name="stprog_ass_sent" value="<?=$stprog['stprog_ass_sent'];?>"
                                        class="form-control form-control-sm">
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-8 mb-3 text-muted offset-md-4" id="reason">
                            <small>Reason :</small>
                            <select id="reasons" name="reason_id" onchange="newReason()">
                                <?php foreach($reason as $r) : ?>
                                <option value="<?=$r['reason_id'];?>"><?=$r['reason_name'];?></option>
                                <?php endforeach; ?>
                                <option value="add">Add New Reason</option>
                            </select>
                            <hr>
                            <input type="text" name="new_reason" id="new_reason" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="row" id="prog-detail">
                        <div class="col-md-4 mb-1">
                            <i class="fa fa-info fa-fw"></i>&nbsp; &nbsp; Program Detail :
                        </div>
                        <div class="col-md-8 text-muted">
                            <!-- SAT  -->
                            <?php if(substr($stprog['prog_sub'],0,3)=="SAT") { ?>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <small>Test Date</small>
                                    <input type="date" name="stprog_test_date" class="form-control form-control-sm"
                                        value="<?=$stprog['stprog_test_date'];?>">
                                </div>
                                <div class=" col-md-6 mb-3">
                                    <small>Last Class</small>
                                    <input type="date" name="stprog_last_class" class="form-control form-control-sm"
                                        value="<?=$stprog['stprog_last_class'];?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Diagnostic Score</small>
                                    <input type="number" name="stprog_diag_score" class="form-control form-control-sm"
                                        value="<?=$stprog['stprog_diag_score'];?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Test Score</small>
                                    <input type="number" name="stprog_test_score" class="form-control form-control-sm"
                                        value="<?=$stprog['stprog_test_score'];?>">
                                </div>
                            </div>
                            <!-- tutoring  -->
                            <?php } else if($stprog['prog_sub']=="Subject Tutoring") { ?>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <small>Price from Tutor</small>
                                    <input type="number" name="stprog_price_from_tutor"
                                        class="form-control form-control-sm"
                                        value="<?=$stprog['stprog_price_from_tutor'];?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <small>Our Price</small>
                                    <input type="number" name="stprog_our_price_tutor"
                                        class="form-control form-control-sm"
                                        value="<?=$stprog['stprog_our_price_tutor'];?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <small>Total Price</small>
                                    <input type="number" name="stprog_total_price_tutor"
                                        class="form-control form-control-sm"
                                        value="<?=$stprog['stprog_total_price_tutor'];?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <small>Date Time & Duration</small>
                                    <textarea name="stprog_duration"><?=$stprog['stprog_duration'];?></textarea>
                                </div>
                            </div>
                            <!-- Admission Mentoring  -->
                            <?php  } else if($stprog['prog_sub']=="Admissions Mentoring") { ?>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <small>End Date</small>
                                    <input type="month" name="stprog_end_date" class="form-control form-control-sm"
                                        value="<?= $stprog['stprog_end_date']!= null ? date('Y-m', strtotime($stprog['stprog_end_date'])): date('Y-m')?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Total Universities</small>
                                    <input type="number" name="stprog_tot_uni" class="form-control form-control-sm"
                                        value="<?=$stprog['stprog_tot_uni'];?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Total Dollar</small>
                                    <input type="number" name="stprog_tot_dollar" class="form-control form-control-sm"
                                        id="dollar" value="<?=$stprog['stprog_tot_dollar'];?>">
                                </div>
                                <?
                                    if(!empty($stprog['stprog_kurs'])){
                                        $kurs = $stprog['stprog_kurs'];
                                    } else {
                                        $kurs = $idr_google;
                                    }
                                ?>
                                <div class="col-md-6 mb-3">
                                    <small>Kurs Dollar-Rupiah</small>
                                    <input type="number" name="stprog_kurs" class="form-control form-control-sm"
                                        value="<?=$kurs;?>" id="kurs">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Total Rupiah</small>
                                    <input type="number" name="stprog_tot_idr" class="form-control form-control-sm"
                                        id="tot_rupiah" value="<?=$stprog['stprog_tot_idr'];?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <small>Installment Plan</small>
                                    <textarea name="stprog_install_plan"><?=$stprog['stprog_install_plan'];?></textarea>
                                </div>
                            </div>
                            <!-- Academic Tutoring  -->
                            <?php  } else if($stprog['prog_sub']=="Academic Tutoring") { ?>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <small>Start Date</small>
                                    <input type="date" name="stprog_start_date" class="form-control form-control-sm"
                                        value="<?= $stprog['stprog_start_date']!=null ? date('Y-m-d', strtotime($stprog['stprog_start_date'])):date('Y-m-d') ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>End Date</small>
                                    <input type="date" name="stprog_end_date" class="form-control form-control-sm"
                                        value="<?=$stprog['stprog_end_date']!=null ? date('Y-m-d', strtotime($stprog['stprog_end_date'])):date('Y-m-d') ?>">
                                </div>
                            </div>
                            <?php } else { echo "<div class='mb-4'>-</div>"; }?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-hourglass fa-fw"></i>&nbsp; &nbsp; Is The Program Running ?
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <select id="stProgram" name="stprog_runningstatus">
                                        <option value="0">Not Yet</option>
                                        <option value="1">Ongoing</option>
                                        <option value="2">Done</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <?php if(($stprog['prog_mentor']=="Mentor") or ($stprog['prog_mentor']=="Tutor")) { ?>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-user-plus"></i>&nbsp; &nbsp; Mentor / Tutor Name :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <?php if($stprog['prog_mentor']=="Mentor") { ?>
                                <div class="col-md-6 mb-3">
                                    <small>Main Mentor</small>
                                    <select id="mainMentor" name="mt_id1">
                                        <?php foreach($mentor as $mt) : ?>
                                        <option value="<?=$mt['mt_id'];?>">
                                            <?=$mt['mt_firstn'].' '.$mt['mt_lastn'];?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Backup Mentor</small>
                                    <select id="backupMentor" name="mt_id2">
                                        <?php foreach($mentor as $mt) : ?>
                                        <option value="<?=$mt['mt_id'];?>">
                                            <?=$mt['mt_firstn'].' '.$mt['mt_lastn'];?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?php } else { ?>
                                <div class="col-md-6 mb-3">
                                    <select id="mainMentor" name="mt_id1">
                                        <?php foreach($tutor as $tt) : ?>
                                        <option value="<?=$tt['mt_id'];?>">
                                            <?=$tt['mt_firstn'].' '.$tt['mt_lastn'];?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-user-alt fa-fw"></i>&nbsp; &nbsp; PIC :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <select id="PIC" name="empl_id">
                                        <option data-placeholder="true"></option>
                                        <?php foreach ($empl as $e) : ?>
                                        <option value="<?=$e['empl_id'];?>">
                                            <?=$e['empl_firstname'].' '.$e['empl_lastname'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-save"></i>&nbsp; Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
function followUp() {
    let date = $("#follow-up").val();
    let y = date.substr(0, 4)
    let m = date.substr(5, 2)
    let d = date.substr(8, 2)
    let n = "<?=$stprog['st_firstname']." ".$stprog['st_lastname']; ?>";
    let p = "<?=$stprog['prog_sub'].': '.$stprog['prog_program'];?>"
    window.open(
        "http://calendar.google.com/calendar/u/0/r/eventedit?text=Follow+Up+&dates=" + y + "" + m + "" + d +
        "T150000Z/" + y + "" + m + "" + d + "T150000Z&details=" + n + "%20(" + p + ")&trp=true",
        "_blank"
    );
}

let LS = new SlimSelect({
    select: '#leadSource',
    placeholder: 'Select lead source ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
LS.set("<?=$stprog['lead_id'];?>")

let SP = new SlimSelect({
    select: '#stPotential',
    placeholder: 'Select potential status',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
SP.set("<?=$stprog['stprog_status'];?>")

var reasons = new SlimSelect({
    select: '#reasons',
    placeholder: 'Select reason',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
reasons.set("<?=$stprog['reason_id'];?>")

var stProgram = new SlimSelect({
    select: '#stProgram',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
stProgram.disable();
stProgram.set("<?=$stprog['stprog_runningstatus'];?>")
</script>

<?php if(($stprog['prog_mentor']=="Mentor") or ($stprog['prog_mentor']=="Tutor")) { ?>
<script>
var MM = new SlimSelect({
    select: '#mainMentor',
    placeholder: 'Select main mentor',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
MM.disable();
MM.set("<?=$stmentor['mt_id1'];?>");
</script>

<script>
var BM = new SlimSelect({
    select: '#backupMentor',
    placeholder: 'Select main mentor',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
BM.disable();
BM.set("<?=$stmentor['mt_id2'];?>");
</script>
<?php } ?>

<script>
var PIC = new SlimSelect({
    select: '#PIC',
    placeholder: 'Select PIC',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
PIC.set("<?=$stprog['empl_id'];?>");
</script>


<script>
$(document).ready(function() {
    var st = $("#stPotential").val();
    var pr = $("#sub-program").val();

    if (pr != "Admissions Mentoring") {
        $("#sub-pending").hide();
    }

    if (st == "2") {
        $("#reason").show();
        $("#new_reason").hide();
        $("#sub-pending").hide();
        $("#pendingDate").hide();
        $("#prog-detail").hide();
    } else if (st == "1") {
        $("#reason").hide();
        $("#new_reason").hide();
        $("#sub-pending").hide();
        $("#pendingDate").hide();
        $("#prog-detail").show();
        stProgram.enable();
        MM.enable();
        BM.enable();
    } else if (st == "0") {
        $("#reason").hide();
        $("#new_reason").hide();
        $("#successDate").hide();
        $("#prog-detail").hide();
        stProgram.disable();
        MM.disable();
        BM.disable();
    }
});

function newReason() {
    if ($("#reasons").val() == "add") {
        $("#new_reason").show();
        $("#new_reason").focus();
    } else {
        $("#new_reason").hide();
    }
}

function progStatus() {
    var st = $("#stPotential").val();
    var pr = $("#sub-program").val();
    if (st == "1") {
        $("#reason").hide();
        $("#sub-pending").hide();
        $("#pendingDate").hide();
        $("#successDate").show();
        $("#prog-detail").show();
        stProgram.enable();
        MM.enable();
        BM.enable();
        MM.set("<?=$stmentor['mt_id1'];?>");
        BM.set("<?=$stmentor['mt_id2'];?>");
    } else if (st == "2") {
        $("#reason").show();
        $("#sub-pending").hide();
        $("#pendingDate").hide();
        $("#successDate").show();
        $("#prog-detail").hide();
        stProgram.disable();
        stProgram.set("0");
        MM.disable();
        BM.disable();
        MM.set("");
        BM.set("");
    } else if (st == "0") {
        $("#reason").hide();
        $("#sub-pending").show();
        $("#pendingDate").show();
        $("#successDate").hide();
        $("#prog-detail").hide();
        stProgram.disable();
        stProgram.set("0");
        MM.disable();
        BM.disable();
        MM.set("");
        BM.set("");
    }
}

$("#dollar").keyup(function() {
    let tot = $("#dollar").val() * $("#kurs").val()
    $("#tot_rupiah").val(tot)
})

$("#kurs").keyup(function() {
    let tot = $("#dollar").val() * $("#kurs").val()
    $("#tot_rupiah").val(tot)
})
</script>