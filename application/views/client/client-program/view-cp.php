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
                    <li class="breadcrumb-item"><a href="#">Students Program</a>
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
        <div class="card shadow card-sticky">
            <div class="card-body pb-4">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/student-prog.png');?>" alt="client management" width="70%">
                    <h6 class="mt-3">
                        <?=$stprog['st_firstname']." ".$stprog['st_lastname']; ?>
                    </h6>
                    <hr style="width:20%; margin-bottom:5px; margin-top:5px;">
                    <div class="text-info">
                        Program Name : <br>
                        <b><?=$stprog['prog_program'];?></b>
                    </div>
                    <!-- <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addInitial">Add Initial
                        Assessment</a>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <span class="text-muted"><i class="text-danger font font-weight-bold">*</i> Initial Assessment for
                        Admission
                        Program</span> -->
                    <a href="<?=base_url('client/students-program/delete/'.$stprog['stprog_id']);?>"
                        class="delete-button btn btn-sm btn-outline-danger mt-3" data-message="students program">
                        <i class="fas fa-trash"></i>&nbsp; Delete
                    </a>
                </div>
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
                            <i class="fas fa-calendar-alt"></i>&nbsp; &nbsp; Lead Source :
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
                            <i class="fas fa-calendar-alt"></i>&nbsp; &nbsp; Date :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <small>First Discuss</small>
                                    <input name="stprog_firstdisdate" type="date" class="form-control form-control-sm"
                                        value="<?=$stprog['stprog_firstdisdate'];?>" disabled>
                                    <?=form_error('stprog_firstdisdate', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Last Discuss</small>
                                    <input name="stprog_lastdisdate" type="date" class="form-control form-control-sm"
                                        value="<?=$stprog['stprog_lastdisdate'];?>">
                                    <?=form_error('stprog_lastdisdate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-calendar-check"></i>&nbsp; &nbsp; Meeting Date :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <input name="stprog_meetingdate" type="date"
                                        value="<?=$stprog['stprog_meetingdate'];?>"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-sticky-note"></i>&nbsp; &nbsp; Notes :
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
                            <i class="fas fa-hourglass-half"></i>&nbsp; &nbsp; Program Status :
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
                                <div class="col-md-6 mb-3">
                                    <small>Date</small>
                                    <input type="date" name="stprog_statusprogdate"
                                        value="<?=$stprog['stprog_statusprogdate'];?>"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 mb-3 text-muted offset-md-4" id="reason">
                            <small>Reason :</small>
                            <textarea name="stprog_reason"><?=$stprog['stprog_reason'];?></textarea>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-hourglass"></i>&nbsp; &nbsp; Is The Program Running ?
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
                            <i class="fas fa-hourglass-half"></i>&nbsp; &nbsp; PIC :
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
    if (st == "2") {
        $("#reason").show();
    } else if (st == "1") {
        $("#reason").hide();
        stProgram.enable();
        MM.enable();
        BM.enable();
    } else {
        $("#reason").hide();
        stProgram.disable();
        MM.disable();
        BM.disable();
    }
});

function progStatus() {
    var st = $("#stPotential").val();
    if (st == "1") {
        $("#reason").hide();
        stProgram.enable();
        MM.enable();
        BM.enable();
        MM.set("<?=$stmentor['mt_id1'];?>");
        BM.set("<?=$stmentor['mt_id2'];?>");
    } else if (st == "2") {
        $("#reason").show();
        stProgram.disable();
        stProgram.set("0");
        MM.disable();
        BM.disable();
        MM.set("");
        BM.set("");
    } else {
        $("#reason").hide();
        stProgram.disable();
        stProgram.set("0");
        MM.disable();
        BM.disable();
        MM.set("");
        BM.set("");
    }
}
</script>