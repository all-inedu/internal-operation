<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Employee
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/employee');?>">Employee</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                    <img src="<?=base_url('assets/img/user/employee.svg');?>" alt="employee" width="30%"><br><br>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <h5 class="align-middle mt-2">
                        Add Employee</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Employee Profile
                    <div class="float-right">
                        <a href="<?=base_url('hr/employee/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold mb-3">Personal Information</label>
                        </div>
                        <div class="col-md-4">
                            <label><i class="fas fa-id-card fa-fw text-muted"></i>&nbsp; Full Name :</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <small>First Name <i class="text-danger font-weight-bold">*</i></small>
                                    <input name="empl_firstname" type="text" class="form-control form-control-sm"
                                        placeholder="First Name">
                                    <?=form_error('empl_firstname', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6">
                                    <small>Last Name</small>
                                    <input name="empl_lastname" type="text" class="form-control form-control-sm"
                                        placeholder="Last Name">
                                    <?=form_error('empl_lastname', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-envelope fa-fw text-muted"></i>&nbsp; Email : <i
                                    class="text-danger font-weight-bold">*</i></label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="empl_email" type="text" class="form-control form-control-sm"
                                        placeholder="Email">
                                    <?=form_error('empl_email', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-thumbtack fa-fw text-muted"></i>&nbsp; Address :</label>
                        </div>
                        <div class="col-md-8 mb-3">
                            <textarea name="empl_address" rows=5 class="form-control form-control-sm"
                                placeholder="Address"></textarea>
                            <?=form_error('empl_address', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-phone fa-fw text-muted"></i>&nbsp; Phone Number : <i
                                    class="text-danger font-weight-bold">*</i></label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <input name="empl_phone" type="text" class="form-control form-control-sm"
                                        placeholder="Phone Number">
                                    <?=form_error('empl_phone', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-university fa-fw text-muted"></i>&nbsp; Graduated From
                                :</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <input name="empl_graduatefr" type="text" class="form-control form-control-sm"
                                        placeholder="Graduated From">
                                    <?=form_error('empl_graduatefr', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-tag fa-fw text-muted"></i>&nbsp; Major
                                :</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="empl_major" type="text" class="form-control form-control-sm"
                                        placeholder="Major">
                                    <?=form_error('empl_major', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-birthday-cake fa-fw  text-muted"></i>&nbsp; Date of Birth
                                :</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <input name="empl_datebirth" type="date" class="form-control form-control-sm"
                                        placeholder="">
                                    <?=form_error('empl_datebirth', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <label><i class="fas fa-crosshairs fa-fw text-muted"></i>&nbsp; Position :</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <input name="empl_department" type="text" class="form-control form-control-sm"
                                        placeholder="Position">
                                    <?=form_error('empl_department', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <?php
                            if($empl['empl_role']==0) {
                        ?>
                        <div class="col-md-4">
                            <label><i class="fas fa-crosshairs fa-fw text-muted"></i>&nbsp; Role :</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <select name="empl_role" class="form-control form-control-sm">
                                        <option value="5">Select Role</option>
                                        <option value="1">Client Management</option>
                                        <option value="2">Business Development</option>
                                        <option value="3">Finance</option>
                                        <option value="4">Human Resource</option>
                                        <option value="0">Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php  } else { ?>
                        <input type="text" value="5" name="empl_role" hidden>
                        <?php }  ?>

                        <div class="col-md-4">
                            <label><i class="fas fa-calendar-alt fa-fw text-muted"></i>&nbsp; Hire Date :</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <input name="empl_hiredate" type="date" class="form-control form-control-sm"
                                        placeholder="">
                                    <?=form_error('empl_hiredate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-calendar-times fa-fw text-muted"></i>&nbsp; Employee Status
                                :</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="empl_status" id="empl_status" class="form-control form-control-sm"
                                        onchange="changeStatus()">
                                        <option value="Full Time">Full Time</option>
                                        <option value="Contract">Contract</option>
                                        <option value="Internship">Internship</option>
                                        <option value="Probation">Probation</option>
                                    </select>
                                    <?=form_error('empl_status', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label><i class="far fa-calendar-times fa-fw text-muted"></i>&nbsp; End Date
                                :</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <input name="empl_statusenddate" type="date" class="form-control form-control-sm"
                                        placeholder="">
                                    <?=form_error('empl_statusenddate', '<small class="text-danger">', '</small>');?>

                                </div>
                            </div>
                        </div>

                        <?php
                            if($empl['empl_role']==0) {
                        ?>
                        <div class="col-md-4">
                            <label><i class="fas fa-key fa-fw text-muted"></i>&nbsp; Password :</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="password" class="form-control form-control-sm" name="empl_password">
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>

                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold mb-3">Attachment</label>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td class="align-middle" width="30%"><i class="fas fa-paperclip fa-fw"></i>
                                            &nbsp;
                                            Curriculum Vitae : </td>
                                        <td>
                                            <div class="text-center file-drop-area">
                                                <span class="fake-btn">Choose files</span>
                                                <span class="file-msg">or drag and drop files here (docx, doc,
                                                    pdf)</span>
                                                <input name="empl_cv" class="file-input" type="file">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"> <i class="fas fa-paperclip fa-fw"></i> &nbsp; BCA
                                            Account
                                            :
                                        </td>
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-md-7">
                                                    <small>Number :</small>
                                                    <input name="empl_bankaccount" type="number" class="form-control">
                                                    <?=form_error('empl_bankaccount', '<small class="text-danger">', '</small>');?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"> <i class="fas fa-paperclip fa-fw"></i> &nbsp; KTP :
                                        </td>
                                        <td>
                                            <div class="text-center file-drop-area">
                                                <span class="fake-btn">Choose files</span>
                                                <span class="file-msg">or drag and drop files here (docx, doc,
                                                    pdf)</span>
                                                <input name="empl_idcard" class="file-input" type="file">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"><i class="fas fa-paperclip fa-fw"></i> &nbsp; NPWP :
                                        </td>
                                        <td>
                                            <div class="text-center file-drop-area">
                                                <span class="fake-btn">Choose files</span>
                                                <span class="file-msg">or drag and drop files here (docx, doc,
                                                    pdf)</span>
                                                <input name="empl_tax" class="file-input" type="file">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"> <i class="fas fa-paperclip fa-fw"></i> &nbsp; BPJS
                                            Kesehatan :
                                        </td>
                                        <td>
                                            <div class="text-center file-drop-area">
                                                <span class="fake-btn">Choose files</span>
                                                <span class="file-msg">or drag and drop files here (docx, doc,
                                                    pdf)</span>
                                                <input name="empl_healthinsurance" class="file-input" type="file">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"> <i class="fas fa-paperclip fa-fw"></i> &nbsp; BPJS TK
                                            :
                                        </td>
                                        <td>
                                            <div class="text-center file-drop-area">
                                                <span class="fake-btn">Choose files</span>
                                                <span class="file-msg">or drag and drop files here (docx, doc,
                                                    pdf)</span>
                                                <input name="empl_emplinsurance" class="file-input" type="file">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-info btn-sm">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
function changeStatus() {
    var x = $('#status').val();
    if (x == "Inactive") {
        document.getElementById("resign").disabled = false;
    } else {
        document.getElementById("resign").disabled = true;
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