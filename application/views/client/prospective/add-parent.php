<style>
</style>
<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Prospective Client
                </div>
            </nav>
        </div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('client/prospective');?>">Prospective Client</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Parent</li>
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
                    <img src="https://image.freepik.com/free-vector/man-with-headphones-microphone-with-computer_113065-136.jpg"
                        alt="client management" width="70%">
                </div>
                <div class="list-group">
                    <a href="<?=base_url('client/prospective/add/student');?>"
                        class="list-group-item list-group-item-action">
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
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Parent
                    <div class="float-right">
                        <a href="<?=base_url('client/prospective/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name
                            </label>
                            <input name="firstName" type="text" class="form-control form-control-sm"
                                placeholder="First name">
                            <?=form_error('firstName', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="lastName" type="text" class="form-control form-control-sm"
                                placeholder="Last name">
                            <?=form_error('lastName', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input name="email" type="text" class="form-control form-control-sm" placeholder="E-mail">
                            <?=form_error('email', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input name="phoneNumber" type="text" class="form-control form-control-sm"
                                placeholder="Phone Number">
                            <?=form_error('phoneNumber', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Instagram</label>
                            <input name="instagram" type="text" class="form-control form-control-sm"
                                placeholder="Instagram">
                            <?=form_error('instagram', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>State / Region</label>
                            <input name="state" type="text" class="form-control form-control-sm"
                                placeholder="State / Region">
                            <?=form_error('state', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input name="postalCOde" type="text" class="form-control form-control-sm"
                                placeholder="Postal Code">
                            <?=form_error('postalCOde', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control form-control-sm" placeholder="Address"
                                rows="5"></textarea>
                            <?=form_error('address', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:0px;"></div>
                <small class="text-info font-weight-bold">Child's Profile</small>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Child's First Name</label>
                            <input name="studentFirstName" type="text" class="form-control form-control-sm"
                                placeholder="Students First Name">
                            <?=form_error('studentFirstName', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Child's Last Name</label>
                            <input name="studentLastName" type="text" class="form-control form-control-sm"
                                placeholder="Students Last Name">
                            <?=form_error('studentLastName', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>School Name</label>
                            <select id="schoolName" name="schoolName" onChange="otherSchool();">
                                <option data-placeholder="true"></option>
                                <option value="1">School 1</option>
                                <option value="2">School 2</option>
                                <option value="3">School 3</option>
                                <option value="4">School 4</option>
                                <option value="other">Other</option>
                            </select>
                            <?=form_error('schoolName', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6 d-none" id="otherSchool">
                        <div class="form-group">
                            <label>Other School Name</label>
                            <input name="otherSchool" type="text" class="form-control form-control-sm"
                                placeholder="Other School Name" autofocus>
                            <?=form_error('otherSchool', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-3" id="current">
                        <div class="form-group">
                            <label>Current Education</label>
                            <select id="currentEducation" name="currentEducation">
                                <option data-placeholder="true"></option>
                                <option value="9">Elementary School</option>
                                <option value="3">Middle School</option>
                                <option value="2">High School</option>
                                <option value="4">University</option>
                            </select>
                            <?=form_error('currentEducation', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-3" id="studentYear">
                        <div class="form-group">
                            <label>Student Year</label>
                            <select id="grade" name="grade">
                                <option data-placeholder="true"></option>
                                <option value="9">9</option>
                                <option value="2">10</option>
                                <option value="3">11</option>
                                <option value="4">12</option>
                            </select>
                            <?=form_error('grade', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:25px;"></div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Lead Source</label>
                            <select id="leadSource" name="leadSource">
                                <option data-placeholder="true"></option>
                                <option value="1">Edufair</option>
                                <option value="2">Website</option>
                            </select>
                            <?=form_error('leadSource', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Level of Interest</label>
                            <select id="levelInterest" name="levelInterest">
                                <option data-placeholder="true"></option>
                                <option value="9">Hight</option>
                                <option value="3">Medium</option>
                                <option value="2">Low</option>
                            </select>
                            <?=form_error('levelInterest', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Interested Program</label>
                            <select id="interestedProgram" name="interestedProgram" multiple>
                                <option data-placeholder="true"></option>
                                <option value="9">BIP</option>
                                <option value="3">SRP</option>
                                <option value="2">Admission Cunslting</option>
                            </select>
                            <?=form_error('interestedProgram', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:0px;"></div>
                <small class="text-info font-weight-bold">Study Aboard</small>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>
                            <select id="countryStudy" name="countryStudy" multiple>
                                <option data-placeholder="true"></option>
                                <option value="1">US</option>
                                <option value="2">UK</option>
                                <option value="3">Singapore</option>
                            </select>
                            <?=form_error('countryStudy', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Univ Destination</label>
                            <select id="univDestination" name="univDestination" multiple>
                                <option data-placeholder="true"></option>
                                <option value="1">UC Davis</option>
                                <option value="2">NTU</option>
                                <option value="3">Harvard University</option>
                            </select>
                            <?=form_error('univDestination', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Major</label>
                            <select id="major" name="major" multiple>
                                <option data-placeholder="true"></option>
                                <option value="1">Computer Science</option>
                                <option value="2">Computer Science</option>
                                <option value="3">Computer Science</option>
                            </select>
                            <?=form_error('major', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
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
    placeholder: 'Select student year / Grade',
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
    var cE = document.getElementById("current");
    var sY = document.getElementById("studentYear");

    if (snValues == 'other') {
        oS.classList.remove("d-none");
        cE.classList.remove("col-md-3");
        sY.classList.remove("col-md-3");

        cE.classList.add("col-md-6");
        sY.classList.add("col-md-6");
    } else {
        cE.classList.remove("col-md-6");
        sY.classList.remove("col-md-6");

        cE.classList.add("col-md-3");
        sY.classList.add("col-md-3");
        oS.classList.add("d-none");
    }
}
</script>