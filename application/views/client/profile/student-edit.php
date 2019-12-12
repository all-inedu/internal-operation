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
    <div class="col-md-4 mb-3">
        <div class="card shadow card-sticky">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/college.png');?>" alt="client management" width="70%">
                    <h6 class="mt-3">Students Name</h6>
                    <hr style="width:20%; margin-bottom:5px; margin-top:5px;">
                    <div class="text-info">
                        <p><i class="fas fa-envelope text-danger"></i>&nbsp; student@gmail.com <br>
                            <i class="fas fa-phone text-danger"></i>&nbsp; 081231232xxx &nbsp; | &nbsp;
                            <i class="fab fa-instagram text-danger"></i>&nbsp; @student</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <h6 class="align-middle"><i class="fas fa-user"></i>&nbsp; &nbsp; Student's Profile
                        <div class="float-right">
                            <a href="<?=base_url('profile/student/');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
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
                                    <input name="stFName" type="text" placeholder="First Name"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Last Name</small>
                                    <input name="stLName" type="text" placeholder="Last Name"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-envelope"></i>&nbsp; &nbsp; E-mail :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <input name="stEmail" type="text" placeholder="E-mail"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-mobile-alt"></i>&nbsp; &nbsp; Phone Number :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <input name="stPhone" type="text" placeholder="Phone Number"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fab fa-instagram"></i>&nbsp; &nbsp; Instagram :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <input name="stPhone" type="text" placeholder="Instagram"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-map-marker-alt"></i>&nbsp; &nbsp; Address :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <small>Address</small>
                                    <textarea name="stAddress" id="" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <small>State/Region</small>
                                    <input name="stState" type="text" placeholder="State/Region"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <small>Postal Code</small>
                                    <input name="stPostalCode" type="number" placeholder="Postal Code"
                                        class="form-control form-control-sm">
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
                                <div class="col-md-12 mb-3">
                                    <select name="prName" id="prName" onchange="addParent()">
                                        <option data-placeholder="true"></option>
                                        <option value="1">Budi</option>
                                        <option value="2">Aliyah</option>
                                        <option value="3">Siti</option>
                                        <option value="other">Add New Parent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3 parent d-none">
                                    <small>First Name</small>
                                    <input id="pFName" name="pFName" type="text" placeholder="First Name"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-6 mb-3 parent d-none">
                                    <small>Last Name</small>
                                    <input name="pLName" type="text" placeholder="Last Name"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-6 mb-3 parent d-none">
                                    <small>E-mail</small>
                                    <input name="pEmail" type="text" placeholder="E-mail"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-6 mb-3 parent d-none">
                                    <small>Phone Number</small>
                                    <input name="pPhone" type="text" placeholder="Phone Number"
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
                                    <select name="stSchool" id="stSchool" onchange="addSchool()">
                                        <option data-placeholder="true"></option>
                                        <option value="1">SMA 1 Jakarta</option>
                                        <option value="2">SMA 2 Jakarta</option>
                                        <option value="3">SMA 3 Jakarta</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6 d-none" id="oSchool">
                                    <input id="otherSchool" name="otherSchool" type="text" placeholder="Other School"
                                        class="form-control form-control-sm">
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-bookmark"></i>&nbsp; &nbsp; Current Education :
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="row">
                                <div class="col-md-6">
                                    <select id="currentEducation" name="currentEducation">
                                        <option data-placeholder="true"></option>
                                        <option value="9">Elementary School</option>
                                        <option value="3">Middle School</option>
                                        <option value="2">High School</option>
                                        <option value="4">University</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-hourglass-start"></i>&nbsp; &nbsp; Grade :
                        </div>
                        <div class="col-md-8 mb-1 text-muted">
                            <div class="row">
                                <div class="col-md-4">
                                    <select id="grade" name="grade">
                                        <option data-placeholder="true"></option>
                                        <option value="9">9</option>
                                        <option value="2">10</option>
                                        <option value="3">11</option>
                                        <option value="4">12</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-award"></i>&nbsp; &nbsp; Personal Brand Statement :
                        </div>

                        <div class="col-md-8 mb-3 text-muted">
                            <textarea class="form-control form-control-sm" rows="5"></textarea>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-atlas"></i>&nbsp; &nbsp; Academic Goals & Interest :
                        </div>

                        <div class="col-md-8 mb-3 text-muted">
                            <textarea class="form-control form-control-sm" rows="5"></textarea>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-user-cog"></i>&nbsp; &nbsp; Life Philosophy &
                            Personalities :
                        </div>

                        <div class="col-md-8 mb-3 text-muted">
                            <textarea class="form-control form-control-sm" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-paperclip"></i>&nbsp; &nbsp; Photo :
                            <br>
                            <small class="text-success">Available</small>
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="text-center file-drop-area">
                                <span class="fake-btn">Choose files</span>
                                <span class="file-msg">or drag and drop files here (png, jpg, jpeg)</span>
                                <input name="photo" class="file-input" type="file">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-paperclip"></i>&nbsp; &nbsp; Curriculum Vitae :
                            <br>
                            <small class="text-success">Available</small>
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="text-center file-drop-area">
                                <span class="fake-btn">Choose files</span>
                                <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                <input name="cv" class="file-input" type="file">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-paperclip"></i>&nbsp; &nbsp; Transcript :
                            <br>
                            <small class="text-info">Not Available</small>
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="text-center file-drop-area">
                                <span class="fake-btn">Choose files</span>
                                <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                <input name="transcript" class="file-input" type="file">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-paperclip"></i>&nbsp; &nbsp; Activities Resume :
                            <br>
                            <small class="text-success">Available</small>
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="text-center file-drop-area">
                                <span class="fake-btn">Choose files</span>
                                <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                <input name="resume" class="file-input" type="file">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-paperclip"></i>&nbsp; &nbsp; Questionnaire :
                            <br>
                            <small class="text-info">Not Available</small>
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="text-center file-drop-area">
                                <span class="fake-btn">Choose files</span>
                                <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                <input name="questionnaire" class="file-input" type="file">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <i class="fas fa-paperclip"></i>&nbsp; &nbsp; Others :
                            <br>
                            <small class="text-info">Not Available</small>
                        </div>
                        <div class="col-md-8 mb-3 text-muted">
                            <div class="text-center file-drop-area">
                                <span class="fake-btn">Choose files</span>
                                <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                <input name="others" class="file-input" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-info">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
new SlimSelect({
    select: '#prName',
    placeholder: 'Select parents Name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#stSchool',
    placeholder: 'Select school Name',
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

function addParent() {
    var p = $('#prName').val();

    if (p == 'other') {
        $(".parent").addClass("d-block");
        $("#pFName").focus();
    } else {
        $(".parent").removeClass("d-block");
        $(".parent").addClass("d-none");
    }
}

function addSchool() {
    var p = $('#stSchool').val();

    if (p == 'other') {
        $("#oSchool").addClass("d-block");
        $("#otherSchool").focus();
    } else {
        $("#oSchool").removeClass("d-block");
        $("#oSchool").addClass("d-none");
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