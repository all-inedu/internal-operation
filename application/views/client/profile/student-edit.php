<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Student's Profile
                </div>
            </nav>
        </div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Profile</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card shadow card-sticky">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/college.png');?>" alt="client management" width="50%">
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
            </div>
        </div>
    </div>
    <div class="col-md-9 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <h6 class="align-middle"><i class="fas fa-user"></i>&nbsp; &nbsp; Student's Profile
                        <div class="float-right">
                            <a href="<?=base_url('client/profile/student/'.$s['st_num']);?>"
                                class="btn btn-sm btn-info"><i class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-id-badge"></i>&nbsp; &nbsp; Full Name :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <small>First Name</small>
                                    <input name="st_num" type="hidden" value="<?=$s['st_num'];?>">
                                    <input name="st_firstname" type="text" class="form-control form-control-sm"
                                        value="<?=$s['st_firstname'];?>">
                                    <?=form_error('st_firstname', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Last Name</small>
                                    <input name="st_lastname" type="text" class="form-control form-control-sm"
                                        value="<?=$s['st_lastname'];?>">
                                    <?=form_error('st_lastname', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-envelope"></i>&nbsp; &nbsp; E-mail :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <input name="st_mail" type="text" class="form-control form-control-sm"
                                        value="<?=$s['st_mail'];?>">
                                    <?=form_error('st_mail', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-mobile-alt"></i>&nbsp; &nbsp; Phone Number :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <input name="st_phone" type="text" class="form-control form-control-sm"
                                        value="<?=$s['st_phone'];?>">
                                    <?=form_error('st_phone', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-birthday-cake"></i>&nbsp; &nbsp; Date of Birth :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <?php 
                                        if($s['st_dob']==null) {
                                    ?>
                                    <input name="st_dob" type="date" class="form-control form-control-sm">
                                    <?php } else { ?>
                                    <input name="st_dob" type="date" class="form-control form-control-sm"
                                        value="<?=$s['st_dob'];?>">
                                    <?php } ?>
                                    <?=form_error('st_dob', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 mb-1">
                            <i class="fab fa-instagram"></i>&nbsp; &nbsp; Instagram :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <input name="st_insta" type="text" class="form-control form-control-sm"
                                        value="<?=$s['st_insta'];?>">
                                    <?=form_error('st_insta', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-map-marker-alt"></i>&nbsp; &nbsp; Address :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <small>State</small>
                                    <input name="st_state" type="text" class="form-control form-control-sm"
                                        value="<?=$s['st_state'];?>" id="state">
                                    <?=form_error('st_state', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <small>City</small>
                                    <input name="st_city" type="text" class="form-control form-control-sm"
                                        value="<?=$s['st_city'];?>" id="city">
                                    <?=form_error('st_city', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <small>Address</small>
                                    <textarea name="st_address" class="form-control form-control-sm"
                                        rows="5"><?=$s['st_address'];?></textarea>
                                    <?=form_error('st_address', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-address-card"></i>&nbsp; &nbsp; Parent :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <small>Full Name</small>
                                    <select name="pr_id" id="prName" onchange="addParent()">
                                        <option data-placeholder="true"></option>
                                        <option value="other">Add New Parent</option>
                                        <?php foreach ($prt as $p): ?>
                                        <option value="<?=$p['pr_id'];?>">
                                            <?=$p['pr_firstname'].' '.$p['pr_lastname'];?></option>
                                        <?php endforeach ;?>
                                    </select>
                                </div>
                                <?php
                                    if($s['pr_id']!="") {
                                        $pr = $this->prt->showId($s['pr_id']);
                                ?>
                                <div class="col-md-6 parent-mail">
                                    <small>Parents Email</small>
                                    <input type="text" value="<?=$pr['pr_mail'];?>" class="form-control form-control-sm"
                                        readonly>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3 parent d-none">
                                    <small>First Name</small>
                                    <input id="pFName" name="pr_firstname" type="text" placeholder="First Name"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-6 mb-3 parent d-none">
                                    <small>Last Name</small>
                                    <input name="pr_lastname" type="text" placeholder="Last Name"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-6 mb-3 parent d-none">
                                    <small>E-mail</small>
                                    <input name="pr_mail" type="text" placeholder="E-mail"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-6 mb-3 parent d-none">
                                    <small>Phone Number</small>
                                    <input name="pr_phone" type="text" placeholder="Phone Number"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-school"></i>&nbsp; &nbsp; School Name :
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="row">
                                <div class="col-md-6">
                                    <select id="stSchool" name="sch_id" onChange="addSchool();">
                                        <option data-placeholder="true"></option>
                                        <?php foreach($sch as $sc): ?>
                                        <option value="<?=$sc['sch_id'];?>">
                                            <?=$sc['sch_name'];?>
                                        </option>
                                        <?php endforeach;?>
                                        <option value="0">Other</option>
                                    </select>
                                    <?=form_error('sch_id', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6 d-none" id="oSchool">
                                    <input id="otherSchool" name="sch_name" type="text" placeholder="Other School"
                                        class="form-control form-control-sm">
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-hourglass-start"></i>&nbsp; &nbsp; Grade :
                        </div>
                        <div class="col-md-8 mb-1 text-muted">
                            <div class="row">
                                <div class="col-md-4">
                                    <select id="grade" name="st_grade">
                                        <option data-placeholder="true"></option>
                                        <?php for($i=1; $i<=12; $i++) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                        <?php } ?>
                                        <option value="13">Not High School</option>
                                    </select>
                                    <?=form_error('st_grade', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-hourglass-start"></i>&nbsp; &nbsp; Lead & Interest :
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="row">
                                <div class="col-md-6">
                                    <small>Lead Source</small>
                                    <select id="leadSource" name="lead_id" onchange="leads()">
                                        <option data-placeholder="true"></option>
                                        <?php foreach($lead as $l): ?>
                                        <option value="<?=$l['lead_id'];?>">
                                            <?=$l['lead_name'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                    <?=form_error('lead_id', '<small class="text-danger">', '</small>');?>
                                </div>

                                <?php 
                                    if($s['eduf_id']>0) { 
                                        $class=""; 
                                    } else {
                                        $class="d-none";
                                    }
                                ?>
                                <div class="col-md-6 mb-2 <?=$class;?>" id="edufForm">
                                    <small>Edufair Name<i class="text-danger font-weight-bold">*</i>
                                    </small>
                                    <select id="edufair" name="eduf_id">
                                        <option data-placeholder="true"></option>
                                        <?php foreach($eduf as $ed): ?>
                                        <option value="<?=$ed['eduf_id'];?>"><?=$ed['eduf_organizer'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?=form_error('eduf_id', '<small class="text-danger">', '</small>');?>
                                </div>

                                <?php 
                                    if($s['infl_id']>0) { 
                                        $class="";  
                                    } else {
                                        $class="d-none"; 
                                    }
                                ?>
                                <div class="col-md-6 mb-2 <?=$class;?>" id="inflForm">
                                    <small>Influencer Name<i class="text-danger font-weight-bold">*</i>
                                    </small>
                                    <select id="influencer" name="infl_id">
                                        <option data-placeholder="true"></option>
                                        <?php foreach($infl as $if): ?>
                                        <option value="<?=$if['infl_id'];?>"><?=$if['infl_fn'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?=form_error('infl_id', '<small class="text-danger">', '</small>');?>
                                </div>

                                <div class="col-md-4">
                                    <small>Level of Interest</small>
                                    <select id="levelInterest" name="st_levelinterest">
                                        <option data-placeholder="true"></option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                    <?=form_error('st_levelinterest', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-hourglass-start"></i>&nbsp; &nbsp; Interested Program :
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <select id="interestedProgram" name="prog_id[]" multiple>
                                <option data-placeholder="true"></option>
                                <?php foreach($prog as $pr): ?>
                                <option value="<?=$pr['prog_id'];?>">
                                    <?=$pr['prog_sub'].' - '.$pr['prog_program'];?>
                                </option>
                                <?php endforeach;?>
                            </select>
                            <?=form_error('prog_id', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-hourglass-start"></i>&nbsp; &nbsp; Study Aboard :
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="row">
                                <div class="col-md-4">
                                    <small>Year of Going Study Abroad</small>
                                    <select id="year" name="st_abryear">
                                        <option data-placeholder="true"></option>
                                        <?php
                                        for($i=0;$i<=8;$i++){
                                            $year = date("Y")+$i;
                                            echo '<option value="'.$year.'">'.$year.'</option>';
                                        }
                                        
                                    ?>
                                    </select>
                                    <?=form_error('st_abryear', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-8">
                                    <small>Country</small>
                                    <select id="countryStudy" name="st_abrcountry[]" multiple>
                                        <option data-placeholder="true"></option>
                                        <?php foreach($con as $c): ?>
                                        <option value="<?=$c;?>">
                                            <?=$c;?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                    <?=form_error('st_abrcountry[]', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 mb-3 text-muted offset-md-4">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <small>Univ Destination</small>
                                    <select id="univDestination" name="st_abruniv[]" multiple>
                                        <option data-placeholder="true"></option>
                                        <?php foreach($univ as $u): ?>
                                        <option value="<?=$u['univ_id'];?>">
                                            <?=$u['univ_name'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                    <?=form_error('st_abruniv[]', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-12">
                                    <small>Major</small>
                                    <select id="major" name="st_abrmajor[]" multiple>
                                        <option data-placeholder="true"></option>
                                        <?php foreach($majors as $m): ?>
                                        <option value="<?=$m;?>">
                                            <?=$m;?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                    <?=form_error('st_abrmajor[]', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                    </div>



                    <?php  if($s['st_statuscli']==2) {  ?>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-award"></i>&nbsp; &nbsp; Personal Brand Statement :
                        </div>

                        <div class="col-md-8 mb-3 text-muted">
                            <textarea class="form-control form-control-sm" rows="5"
                                name="att_persbrand"><?=$stdetail['att_persbrand'];?></textarea>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-atlas"></i>&nbsp; &nbsp; Academic Goals & Interest :
                        </div>

                        <div class="col-md-8 mb-3 text-muted">
                            <textarea class="form-control form-control-sm" rows="5"
                                name="att_interest"><?=$stdetail['att_interest'];?></textarea>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-user-cog"></i>&nbsp; &nbsp; Life Philosophy &
                            Personalities :
                        </div>

                        <div class="col-md-8 mb-3 text-muted">
                            <textarea class="form-control form-control-sm" rows="5"
                                name="att_person"><?=$stdetail['att_person'];?></textarea>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-paperclip"></i>&nbsp; &nbsp; Photo :
                            <br>
                            <?php if($stdetail['att_photo']) {?>
                            <small class="ml-4 text-success">
                                Available -
                                <a class="text-primary" target="_blank"
                                    href="<?=base_url('upload/student/photo/'.$stdetail['att_photo']);?>">View</a>
                            </small>
                            <?php } else { ?>
                            <small class="ml-4 text-danger">Not Available</small>
                            <?php } ?>
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="text-center file-drop-area">
                                <span class="fake-btn">Choose files</span>
                                <span class="file-msg">or drag and drop files here (png, jpg, jpeg)</span>
                                <input name="att_photo" class="file-input" type="file">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-paperclip"></i>&nbsp; &nbsp; Curriculum Vitae :
                            <br>
                            <?php if($stdetail['att_cv']) {?>
                            <small class="ml-4 text-success">
                                Available -
                                <a class="text-primary" target="_blank"
                                    href="<?=base_url('upload/student/cv/'.$stdetail['att_cv']);?>">View</a>
                            </small>
                            <?php } else { ?>
                            <small class="ml-4 text-danger">Not Available</small>
                            <?php } ?>
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="text-center file-drop-area">
                                <span class="fake-btn">Choose files</span>
                                <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                <input name="att_cv" class="file-input" type="file">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-paperclip"></i>&nbsp; &nbsp; Transcript :
                            <br>
                            <?php if($stdetail['att_trans']) {?>
                            <small class="ml-4 text-success">
                                Available -
                                <a class="text-primary" target="_blank"
                                    href="<?=base_url('upload/student/transcript/'.$stdetail['att_trans']);?>">View</a>
                            </small>
                            <?php } else { ?>
                            <small class="ml-4 text-danger">Not Available</small>
                            <?php } ?>
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="text-center file-drop-area">
                                <span class="fake-btn">Choose files</span>
                                <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                <input name="att_trans" class="file-input" type="file">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-paperclip"></i>&nbsp; &nbsp; Questionnaire :
                            <br>
                            <?php if($stdetail['att_questioneer']) {?>
                            <small class="ml-4 text-success">
                                Available -
                                <a class="text-primary" target="_blank"
                                    href="<?=base_url('upload/student/questionnaire/'.$stdetail['att_questioneer']);?>">View</a>
                            </small>
                            <?php } else { ?>
                            <small class="ml-4 text-danger">Not Available</small>
                            <?php } ?>
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="text-center file-drop-area">
                                <span class="fake-btn">Choose files</span>
                                <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                <input name="att_questioneer" class="file-input" type="file">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-paperclip"></i>&nbsp; &nbsp; Assessment :
                            <br>
                            <?php if($stdetail['att_other']) {?>
                            <small class="ml-4 text-success">
                                Available -
                                <a class="text-primary" target="_blank"
                                    href="<?=base_url('upload/student/assessment/'.$stdetail['att_other']);?>">View</a>
                            </small>
                            <?php } else { ?>
                            <small class="ml-4 text-danger">Not Available</small>
                            <?php } ?>
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="text-center file-drop-area">
                                <span class="fake-btn">Choose files</span>
                                <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                <input name="att_other" class="file-input" type="file">
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-save"></i>&nbsp; Save
                            changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url('assets/js/jquery-ui.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
$(document).ready(function() {
    var states = '<?=implode(", ", $states);?>';
    var arr = states.split(", ")
    $("#state").autocomplete({
        source: arr
    });

    var cities = '<?=implode(", ", $cities);?>';
    var arr1 = cities.split(", ")
    $("#city").autocomplete({
        source: arr1
    });
});

let pName = new SlimSelect({
    select: '#prName',
    placeholder: 'Select parents Name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
pName.set("<?=$s['pr_id'];?>")

function addParent() {
    var p = $('#prName').val();

    if (p == 'other') {
        $(".parent").addClass("d-block");
        $("#pFName").focus();
        $(".parent-mail").hide();
    } else {
        $(".parent-mail").show();
        $.ajax({
            type: 'post',
            url: '<?=base_url("api/parent/");?>' + p,
            dataType: 'json',
            success: function(data) {
                // console.log(data)
                $(".parent-mail input").val(data.pr_mail);
            }
        });
        $(".parent").removeClass("d-block");
        $(".parent").addClass("d-none");
    }
}

let SS = new SlimSelect({
    select: '#stSchool',
    placeholder: 'Select school Name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
SS.set("<?=$s['sch_id'];?>")

let GR = new SlimSelect({
    select: '#grade',
    placeholder: 'Select student year / Grade',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
GR.set("<?=$s['st_grade'];?>");

let LS = new SlimSelect({
    select: '#leadSource',
    placeholder: 'Select lead source',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
LS.set("<?=$s['lead_id'];?>");

let ED = new SlimSelect({
    select: '#edufair',
    placeholder: 'Select edufair name ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
ED.set("<?=$s['eduf_id'];?>")

let INF = new SlimSelect({
    select: '#influencer',
    placeholder: 'Select influencer name ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
INF.set("<?=$s['infl_id'];?>")

let LI = new SlimSelect({
    select: '#levelInterest',
    placeholder: 'Select level of interest',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
LI.set("<?=$s['st_levelinterest'];?>");

let IP = new SlimSelect({
    select: '#interestedProgram',
    placeholder: 'Select interested program',
    allowDeselect: true,
    deselectLabel: '<span class="text-white">✖</span>'
});
var myJSON1 = '<?=$s["prog_id"];?>';
if (myJSON1) {
    var a1 = myJSON1.split(", ");
    IP.set(a1)
}

let YR = new SlimSelect({
    select: '#year',
    placeholder: 'Select year',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
YR.set("<?=$s['st_abryear'];?>");

let CS = new SlimSelect({
    select: '#countryStudy',
    placeholder: 'Select country (study aboard)',
    allowDeselect: true,
    deselectLabel: '<span class="text-white">&nbsp; ✖</span>'
});
var myJSON2 = '<?=$s["st_abrcountry"];?>';
if (myJSON2) {
    var a2 = myJSON2.split(", ");
    CS.set(a2)
}

let UD = new SlimSelect({
    select: '#univDestination',
    placeholder: 'Select univ destination (study aboard)',
    allowDeselect: true,
    deselectLabel: '<span class="text-white">&nbsp; ✖</span>'
});
var myJSON3 = '<?=$s["st_abruniv"];?>';
if (myJSON3) {
    var a3 = myJSON3.split(", ");
    UD.set(a3)
}

let MJ = new SlimSelect({
    select: '#major',
    placeholder: 'Select major (study aboard)',
    allowDeselect: true,
    deselectLabel: '<span class="text-white">&nbsp; ✖</span>'
});
var myJSON4 = '<?=$s["st_abrmajor"];?>';
if (myJSON4) {
    var a4 = myJSON4.split(", ");
    MJ.set(a4)
}


function addSchool() {
    var p = $('#stSchool').val();

    if (p == '0') {
        $("#oSchool").addClass("d-block");
        $("#otherSchool").focus();
    } else {
        $("#oSchool").removeClass("d-block");
        $("#oSchool").addClass("d-none");
    }
}

function leads() {
    let lead_id = $("#leadSource").val();
    if (lead_id == "LS004") {
        $("#edufForm").removeClass("d-none");
        $("#inflForm").addClass("d-none");
        INF.set('');
    } else
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

var $fileInput = $('.file-input');
var $droparea = $('.file-drop-area');


// highlight drag area
$fileInput.on('dragenter focus click', function() {
    $droparea.addClass('is-active');
});

// back to normal state
$fileInput.on('dragleave blur drop', function() {
    $droparea.removeClass('is-active');
});

// change inner text
$fileInput.on('change', function() {
    var filesCount = $(this)[0].files.length;
    var $textContainer = $(this).prev();

    if (filesCount === 1) {
        // if single file is selected, show file name
        var fileName = $(this).val().split('\\').pop();
        $textContainer.text(fileName);
    } else {
        // otherwise show number of files
        $textContainer.text(filesCount + ' files selected');
    }
});
</script>