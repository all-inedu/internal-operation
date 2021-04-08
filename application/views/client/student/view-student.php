<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Student
                </div>
            </nav>
        </div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('client/student');?>">Student</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-3 mb-2">
        <div class="card shadow card-sticky">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/user.png');?>" alt="client management" width="60%">
                    <h6 class="mt-3"><?=$s['st_firstname']." ".$s['st_lastname'];?></h6>
                    <?php  if($s['st_statuscli']==0) {  ?>
                    <div class="badge border pt-2 pb-2 pl-3 pr-3 badge-light text-danger">
                        Prospective
                    </div>
                    <?php } else if($s['st_statuscli']==1) {  ?>
                    <div class="badge border pt-2 pb-2 pl-3 pr-3 badge-light text-info">
                        Potential
                    </div>
                    <?php } else if($s['st_statuscli']==2) {  ?>
                    <div class="badge border pt-2 pb-2 pl-3 pr-3 badge-light text-success">
                        Current Student
                    </div>
                    <?php } else if($s['st_statuscli']==3) {  ?>
                    <div class="badge border pt-2 pb-2 pl-3 pr-3 badge-light text-primary shadow">
                        Completed
                    </div>
                    <?php } ?>

                    <div class="text-info mt-2 mb-2">
                        <?php if($s['st_mail']) { ?>
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$s['st_mail'];?> <br>
                        <?php } ?>
                        <?php if($s['st_phone']) { ?>
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$s['st_phone'];?> <br>
                        <?php } ?>
                        <?php if($s['st_insta']) { ?>
                        <i class="fab fa-instagram text-danger"></i>&nbsp;<?=$s['st_insta'];?>
                        <?php } ?>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <a href="<?=base_url('client/profile/student/'.$s['st_num']);?>"
                            class="btn btn-sm btn-info m-1"><i class="fas fa-pencil-alt"></i>&nbsp; Profile</a>
                        <a href="#" class="btn btn-sm btn-success m-1" data-toggle="modal"
                            data-target="#convertPotential"><i class="fas fa-retweet"></i>&nbsp;
                            Add Program</a>
                        <?php  if($s['st_statuscli']==0) {  ?>
                        <br>
                        <a href="<?=base_url('client/student/delete/'.$s['st_num']);?>"
                            class="btn btn-sm btn-danger m-1 delete-button" data-message="student"><i
                                class="fas fa-trash"></i>&nbsp;
                            Delete</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Student's Profile
                    <div class="float-right">
                        <a href="<?=base_url('client/student/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:0px;"></div>
                <div class="text-left mb-3">
                    <small class="text-muted"><i class="far fa-calendar-alt text-danger"></i> &nbsp;
                        Created date :
                        <?=date('d M Y H:i:s', strtotime($s['st_datecreate']));?>
                    </small>
                    &nbsp; | &nbsp;
                    <small class="text-muted"><i class="fas fa-calendar-alt text-primary"></i> &nbsp;Last update :
                        <?=date('d M Y H:i:s', strtotime($s['st_datelastedit']));?>
                    </small>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-1">
                        <i class="fas fa-map-marker-alt"></i>&nbsp; &nbsp; Address :
                    </div>
                    <div class="col-md-8 ">
                        <?=$s['st_address'];?>
                        <?=$s['st_city'].' '.$s['st_state'];?>
                        <hr class="mt-1 mb-1">
                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-school"></i>&nbsp; &nbsp; School Name :
                    </div>
                    <div class="col-md-8 mb-3 ">
                        <?=$s['sch_name'];?>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4 mb-2">
                        <i class="fas fa-hourglass-start"></i>&nbsp; &nbsp; Grade :
                    </div>
                    <div class="col-md-8 mb-1 ">
                        <?php 
                        $ynow = date('Y');
                        $yinput = date('Y', strtotime($s['st_datecreate']));
                        $ginput = $s['st_grade'];
                        $gnow = ($ynow - $yinput) + $ginput;
                        if($ginput=="0") {
                            echo '-';
                        } else
                        if($gnow <= 12) {
                            echo $gnow;
                        } else {
                            echo 'Not High School';
                        }
                    ?>
                        <hr class="mt-1 mb-1">
                    </div>
                    <?php
                        $pr = $this->prt->showId($s['pr_id']);
                        if($pr){
                            $hr = "<hr class='mt-1 mb-1'>";
                        } else {
                            $hr = "-<hr class='mt-1 mb-1'>";
                        }
                    ?>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-user"></i>&nbsp; &nbsp; Parents Name :
                    </div>
                    <div class="col-md-8 mb-3 ">
                        <?=$pr['pr_firstname']." ".$pr['pr_lastname'];?>
                        <?=$hr?>
                    </div>
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-envelope"></i>&nbsp; &nbsp; Parents Email :
                    </div>
                    <div class="col-md-8 mb-3 ">
                        <?=$pr['pr_mail'];?>
                        <?=$hr;?>
                    </div>
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-phone"></i>&nbsp; &nbsp; Parents Phone Number :
                    </div>
                    <div class="col-md-8 mb-3 ">
                        <?=$pr['pr_phone'];?>
                        <?=$hr;?>
                    </div>
                </div>

                <!-- Just Prospective Client  -->
                <?php  if($s['st_statuscli']==0) {  ?>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-box-open"></i>&nbsp; &nbsp; Lead Source :
                    </div>
                    <div class="col-md-8 mb-3 ">
                        <?=$s['lead_name'];?>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4 mb-2">
                        <i class="fas fa-chart-line"></i>&nbsp; &nbsp; Level of Interest :
                    </div>
                    <div class="col-md-8 mb-3 ">
                        <?php if($s['st_levelinterest']=="High") {?>
                        <div class="badge badge-success pl-2 pr-2"><i class="fas fa-check"></i></div>
                        <span class="badge"> High</span>
                        <?php } else if($s['st_levelinterest']=="Medium") {?>
                        <div class="badge badge-warning pl-2 pr-2"><i class="fas fa-check"></i></div>
                        <span class="badge"> Medium</span>
                        <?php } else if($s['st_levelinterest']=="Low") {?>
                        <div class="badge badge-danger pl-2 pr-2"><i class="fas fa-check"></i></div>
                        <span class="badge"> Low</span>
                        <?php } ?>
                    </div>

                    <div class="col-md-4 mb-2">
                        <i class="fas fa-tag"></i>&nbsp; &nbsp; Interested Program :
                    </div>
                    <div class="col-md-8 mb-1 ">
                        <?php 
                            $pdata = explode(", ", $s['prog_id']); 
                            $prog = [];
                            foreach ($pdata as $pd ) {
                                $progdata = $this->prog->showId($pd);
                                array_push($prog, $progdata['prog_program']);
                            }
                            for($i=0;$i<count($prog);$i++){
                                $prog_key = array_rand($badge);
                            ?>
                        <span class="badge <?=$badge[$prog_key];?> p-2 mb-2"><?=$prog[$i];?></span>
                        <?php } ?>

                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-calendar-check"></i>&nbsp; &nbsp; Year of Going Study Abroad :
                    </div>
                    <div class="col-md-8 mb-3 ">
                        <td><?=$s['st_abryear'];?></td>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4 mb-2">
                        <i class="fas fa-globe"></i>&nbsp; &nbsp; Country of Study Abroad :
                    </div>
                    <div class="col-md-8 mb-1 ">
                        <?php 
                            $country = explode(", ", $s['st_abrcountry']);
                            for($i=0;$i<count($country);$i++){
                                $country_key = array_rand($badge);
                        ?>
                        <span class="badge <?=$badge[$country_key];?>  p-2 mb-2"><?=$country[$i];?></span>
                        <?php } ?>
                    </div>

                    <div class=" col-md-4 mb-2">
                        <i class="fas fa-university"></i>&nbsp; &nbsp; University Destination :
                    </div>
                    <div class="col-md-8 mb-1 ">
                        <?php 
                            $udata = explode(", ", $s['st_abruniv']); 
                            $univ = [];
                            foreach ($udata as $ud ) {
                                $univdata = $this->univ->showId($ud);
                                array_push($univ, $univdata['univ_name']);
                            }                  
                            for($i=0;$i<count($univ);$i++){
                                $univ_key = array_rand($badge);
                        ?>
                        <span class="badge <?=$badge[$univ_key];?>  p-2 mb-2"><?=$univ[$i];?></span>
                        <?php } ?>
                    </div>

                    <div class="col-md-4 mb-2">
                        <i class="fas fa-microscope"></i>&nbsp; &nbsp; Major of Study Abroad :
                    </div>
                    <div class="col-md-8 mb-1 ">
                        <?php
                            $major = explode(", ", $s['st_abrmajor']);
                            for($i=0;$i<count($major);$i++){
                                $major_key = array_rand($badge);
                        ?>
                        <span class="badge <?=$badge[$major_key];?>  p-2 mb-2"><?=$major[$i];?></span>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <?php  if($s['st_statuscli']>=0) {  ?>
        <div class="card shadow mt-2 mb-3">
            <div class="card-body">
                <h6><i class="fa fa-tags mr-2"></i>&nbsp; Program List</h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <table class="display table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <td width="1%">No</td>
                                    <td class="bg-primary text-white">Program Name</td>
                                    <td>Lead Source</td>
                                    <td>Last Discuss</td>
                                    <td>PIC</td>
                                    <td>Program Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ;foreach ($stprog as $stp) : ?>
                                <tr class="text-center">
                                    <td><?=$i;?></td>
                                    <td class="text-left" style="cursor:pointer"
                                        onclick="window.location='<?=base_url('client/students-program/view/'.$stp['stprog_id']);?>'">
                                        <?php 
                                            if($stp['prog_sub']=='') {
                                                echo $stp['prog_program'];
                                            } else {
                                                echo $stp['prog_sub'].': '.$stp['prog_program'];
                                            }
                                        ?>
                                    </td>
                                    <td><?=$stp['lead_name'];?></td>
                                    <td>
                                        <?php 
                                        if($stp['stprog_statusprogdate']) {
                                            $last_discuss = $stp['stprog_statusprogdate'];
                                        } else if($stp['stprog_ass_sent']){
                                            $last_discuss = $stp['stprog_ass_sent'];
                                        } else if($stp['stprog_init_consult']) {
                                            $last_discuss = $stp['stprog_init_consult'];
                                        } else {
                                            $last_discuss = $stp['stprog_firstdisdate'];
                                        }
                                    ?>
                                        <?=date('d M Y', strtotime($last_discuss));?>
                                    </td>
                                    <td><?=$stp['empl_firstname'];?></td>
                                    <td>
                                        <?php if($stp['stprog_status']==0) { ?>
                                        <div class="badge badge-light p-2 pl-3 pr-3 text-muted shadow border">
                                            Pending
                                        </div>
                                        <?php } else if($stp['stprog_status']==1) { ?>
                                        <div class="badge badge-light p-2 pl-3 pr-3 text-success shadow border">
                                            Success
                                        </div>

                                        <!-- Running Status -->
                                        <?php if($stp['stprog_runningstatus']==0) {  ?>
                                        <div class="badge badge-light p-2 pl-3 pr-3 text-info shadow border">Not
                                            Yet
                                        </div>
                                        <?php } else if($stp['stprog_runningstatus']==1) { ?>
                                        <div class="badge badge-light p-2 pl-3 pr-3 text-primary shadow border">
                                            Ongoing
                                        </div>
                                        <?php } else if($stp['stprog_runningstatus']==2) { ?>
                                        <div class="badge badge-light p-2 pl-3 pr-3 text-success shadow border">
                                            Done
                                        </div>
                                        <?php } ?>
                                        <!-- End Status -->



                                        <?php } else if($stp['stprog_status']==2) { ?>
                                        <div class="badge badge-light p-2 pl-3 pr-3 text-danger shadow border">
                                            Failed
                                        </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="convertPotential" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Program</h5>
            </div>
            <form action="" method="post" name="convertPotential">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Program Name <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <input type="hidden" value="<?=$s['st_num'];?>" name="st_num">
                                <select id="programName" name="prog_id">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($program as $pr): ?>
                                    <option value="<?=$pr['prog_id'];?>">
                                        <?php 
                                            if($pr['prog_sub']=='') {
                                                echo $pr['prog_program'];
                                            } else {
                                                echo $pr['prog_sub'].': '.$pr['prog_program'];
                                            }
                                        ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?=form_error('prog_id', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lead Source <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <select id="leadSource" name="lead_id" onchange="leads()">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($lead as $ld): ?>
                                    <option value="<?=$ld['lead_id'];?>"><?=$ld['lead_name'];?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?=form_error('lead_id', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6 d-none" id="edufForm">
                            <div class="form-group">
                                <label>Edufair Name<i class="text-danger font-weight-bold">*</i>
                                </label>
                                <select id="edufair" name="eduf_id">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($eduf as $ed): ?>
                                    <option value="<?=$ed['eduf_id'];?>"><?=$ed['eduf_organizer'];?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?=form_error('eduf_id', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6 d-none" id="inflForm">
                            <div class="form-group">
                                <label>Influencer Name<i class="text-danger font-weight-bold">*</i>
                                </label>
                                <select id="influencer" name="infl_id">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($infl as $if): ?>
                                    <option value="<?=$if['infl_id'];?>"><?=$if['infl_fn'];?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?=form_error('infl_id', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>PIC <i class="text-danger font-weight-bold">*</i>
                            </label>
                            <select id="PIC" name="empl_id">
                                <option data-placeholder="true"></option>
                                <?php foreach ($empl as $e) : ?>
                                <option value="<?=$e['empl_id'];?>">
                                    <?=$e['empl_firstname'].' '.$e['empl_lastname'];?></option>
                                <?php endforeach;?>
                            </select>
                            <?=form_error('empl_id', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Discuss <i class="text-danger font-weight-bold">*</i></label>
                                <input name="stprog_firstdisdate" type="date" class="form-control form-control-sm"
                                    placeholder="First Discuss">
                                <?=form_error('stprog_firstdisdate', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Planned Follow Up</label>
                                <input name="stprog_followupdate" type="date" class="form-control form-control-sm"
                                    onchange="followUp()" id="follow-up">
                                <?=form_error('stprog_meetingdate', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes</label>
                                <textarea name="stprog_meetingnote" class="form-control form-control-sm"
                                    rows="5"></textarea>
                                <?=form_error('stprog_meetingnote', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save
                        changes</button>
                </div>
            </form>
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
    let n = "<?=$s['st_firstname'].' '.$s['st_lastname'];?>"
    let p = $("#programName").val();
    $.ajax({
        url: "<?=base_url('client/programs/getid/');?>" + p,
        dataType: 'json',
        success: function(data) {
            console.log(data)
            window.open(
                "http://calendar.google.com/calendar/u/0/r/eventedit?text=Follow+Up+&dates=" + y + "" +
                m + "" + d +
                "T150000Z/" + y + "" + m + "" + d + "T150000Z&details=" + n + "%20(" + data.prog_sub +
                " " + data.prog_program + ")&trp=true",
                "_blank"
            );
        }
    });
}

new SlimSelect({
    select: '#programName',
    placeholder: 'Select program name ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#leadSource',
    placeholder: 'Select lead source ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

let ED = new SlimSelect({
    select: '#edufair',
    placeholder: 'Select edufair name ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

let INF = new SlimSelect({
    select: '#influencer',
    placeholder: 'Select influencer name ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#PIC',
    placeholder: 'Select PIC ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

function leads() {
    let lead_id = $("#leadSource").val();
    if (lead_id == "LS014") {
        $("#inflForm").removeClass("d-none");
        $("#edufForm").addClass("d-none");
        ED.set('');
    } else {
        $("#edufForm").addClass("d-none");
        $("#inflForm").addClass("d-none");
        ED.set('');
        INF.set('');
    }
}
</script>