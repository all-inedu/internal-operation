<style>
</style>
<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Parent
                </div>
            </nav>
        </div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('client/parents/');?>">Parent</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card shadow card-sticky">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/user.png');?>" alt="client management" width="60%">
                </div>
                <div class="list-group">
                    <a href="<?=base_url('client/student/add/');?>" class="list-group-item list-group-item-action">
                        Student
                        <div class="float-right"><i class="fas fa-arrow-circle-right"></i></div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action active">Parent
                        <div class="float-right"><i class="fas fa-arrow-circle-right"></i></div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post">
                    <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Parent
                        <div class="float-right">
                            <a href="<?=base_url('client/parents/');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <input name="pr_firstname" type="text" class="form-control form-control-sm"
                                    placeholder="First name">
                                <?=form_error('pr_firstname', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="pr_lastname" type="text" class="form-control form-control-sm"
                                    placeholder="Last name">
                                <?=form_error('pr_lastname', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input name="pr_mail" type="text" class="form-control form-control-sm"
                                    placeholder="E-mail">
                                <?=form_error('pr_mail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone Number <i class="text-danger font-weight-bold">*</i></label>
                                <input name="pr_phone" type="text" class="form-control form-control-sm"
                                    placeholder="Phone Number">
                                <?=form_error('pr_phone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input name="pr_dob" type="date" class="form-control form-control-sm">
                                <?=form_error('pr_dob', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Instagram</label>
                                <input name="pr_insta" type="text" class="form-control form-control-sm"
                                    placeholder="Instagram">
                                <?=form_error('pr_insta', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>State / Region <i class="text-danger font-weight-bold">*</i></label>
                                <input name="st_state" type="text" class="form-control form-control-sm"
                                    placeholder="State / Region" id="state">
                                <?=form_error('st_state', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>City <i class="text-danger font-weight-bold">*</i></label>
                                <input name="st_city" type="text" class="form-control form-control-sm"
                                    placeholder="City" id="city">
                                <?=form_error('st_city', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input name="st_pc" type="text" class="form-control form-control-sm"
                                    placeholder="Postal Code">
                                <?=form_error('st_pc', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="st_address" class="form-control form-control-sm" placeholder="Address"
                                    rows="5"></textarea>
                                <?=form_error('st_address', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:0px;"></div>
                    <small class="text-info font-weight-bold">Child's Profile</small>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Childs First Name <i class="text-danger font-weight-bold">*</i></label>
                                <input name="st_firstname" type="text" class="form-control form-control-sm"
                                    placeholder="Students First Name">
                                <?=form_error('st_firstname', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Childs Last Name</label>
                                <input name="st_lastname" type="text" class="form-control form-control-sm"
                                    placeholder="Students Last Name">
                                <?=form_error('st_lastname', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Childs Email</label>
                                <input name="st_mail" type="text" class="form-control form-control-sm"
                                    placeholder="Students Email">
                                <?=form_error('st_mail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>School Name</label>
                                <select id="schoolName" name="sch_id" onChange="otherSchool();">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($sch as $sc): ?>
                                    <option value="<?=$sc['sch_id'];?>">
                                        <?=$sc['sch_name'];?>
                                    </option>
                                    <?php endforeach;?>
                                    <option value="other">Other</option>
                                </select>
                                <?=form_error('sch_id', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6 d-none" id="otherSchool">
                            <div class="form-group">
                                <label>Other School Name <i class="text-danger font-weight-bold">*</i></label>
                                <input name="sch_name" type="text" class="form-control form-control-sm"
                                    placeholder="Other School Name" autofocus>
                                <?=form_error('sch_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6 d-none" id="currentSchool">
                            <div class="form-group">
                                <label>Current Education</label>
                                <select id="currentEducation" name="st_currentsch">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($school['level'] as $lv): ?>
                                    <option value="<?=$lv;?>">
                                        <?=$lv;?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('st_currentsch', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6" id="studentYear">
                            <div class="form-group">
                                <label>Students Grade</label>
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
                    <div class="line" style="margin-top:15px; margin-bottom:25px;"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lead Source <i class="text-danger font-weight-bold">*</i></label>
                                <select id="leadSource" name="lead_id">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($lead as $l): ?>
                                    <option value="<?=$l['lead_id'];?>">
                                        <?=$l['lead_name'];?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('lead_id', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Level of Interest</label>
                                <select id="levelInterest" name="st_levelinterest">
                                    <option data-placeholder="true"></option>
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                                <?=form_error('st_levelinterest', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Interested Program</label>
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
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:0px;"></div>
                    <small class="text-info font-weight-bold">Study Aboard</small>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Year of Going Study Abroad</label>
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
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Country</label>
                                <select id="countryStudy" name="st_abrcountry[]" multiple>
                                    <option data-placeholder="true"></option>
                                    <?php foreach($con as $c): ?>
                                    <option value="<?=$c;?>">
                                        <?=$c;?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('st_abrcountry', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Univ Destination</label>
                                <select id="univDestination" name="st_abruniv[]" multiple>
                                    <option data-placeholder="true"></option>
                                    <?php foreach($univ as $u): ?>
                                    <option value="<?=$u['univ_id'];?>">
                                        <?=$u['univ_name'];?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('st_abruniv', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Major</label>
                                <select id="major" name="st_abrmajor[]" multiple>
                                    <option data-placeholder="true"></option>
                                    <?php foreach($majors as $m): ?>
                                    <option value="<?=$m;?>">
                                        <?=$m;?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('st_abrmajor', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>&nbsp;
                                Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

new SlimSelect({
    select: '#schoolName',
    placeholder: 'Select student school',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#currentEducation',
    placeholder: 'Select current education',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#grade',
    placeholder: 'Select students grade',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#leadSource',
    placeholder: 'Select lead source',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#levelInterest',
    placeholder: 'Select level of interest',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#interestedProgram',
    placeholder: 'Select interested program',
    allowDeselect: true,
    deselectLabel: '<span class="text-white">✖</span>'
});

new SlimSelect({
    select: '#year',
    placeholder: 'Select year',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#countryStudy',
    placeholder: 'Select country (study aboard)',
    allowDeselect: true,
    deselectLabel: '<span class="text-white">&nbsp; ✖</span>'
});

new SlimSelect({
    select: '#univDestination',
    placeholder: 'Select univ destination (study aboard)',
    allowDeselect: true,
    deselectLabel: '<span class="text-white">&nbsp; ✖</span>'
});

new SlimSelect({
    select: '#major',
    placeholder: 'Select major (study aboard)',
    allowDeselect: true,
    deselectLabel: '<span class="text-white">&nbsp; ✖</span>'
});

function otherSchool() {
    var sN = document.getElementById("schoolName");
    var snValues = sN.value;
    var oS = document.getElementById("otherSchool");
    var cE = document.getElementById("currentSchool");
    var sY = document.getElementById("studentYear");

    if (snValues == 'other') {
        oS.classList.remove("d-none");
        cE.classList.remove("d-none");
    } else {
        oS.classList.add("d-none");
        cE.classList.add("d-none");
    }
}
</script>