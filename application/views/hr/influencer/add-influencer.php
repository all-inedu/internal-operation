<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Influencer
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/influencer/');?>">Influencer</a>
                    </li>
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
                    <img src="<?=base_url('assets/img/employee.png');?>" alt="employee" width="60%"><br><br>
                    <h5 class="align-middle mt-2">
                        Influencer Name</h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-info">
                        <p>Position <br>
                            <i class="fas fa-phone text-danger"></i>&nbsp; 081231232xxx &nbsp; | &nbsp;
                            <i class="fas fa-envelope text-danger"></i>&nbsp; mail@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Influencer Profile
                    <div class="float-right">
                        <a href="<?=base_url('hr/influencer/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="font-weight-bold mb-3">Personal Information</label>
                    </div>
                    <div class="col-md-5">
                        <label><i class="fas fa-id-card fa-fw text-muted"></i>&nbsp; Full Name :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <small>First Name</small>
                                <input name="firstName" type="text" class="form-control form-control-sm"
                                    placeholder="First Name">
                                <?=form_error('firstName', '<small class="text-danger">', '</small>');?>
                            </div>
                            <div class="col-md-6">
                                <small>Last Name</small>
                                <input name="lastName" type="text" class="form-control form-control-sm"
                                    placeholder="Last Name">
                                <?=form_error('lastName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label><i class="fas fa-envelope fa-fw text-muted"></i>&nbsp; Email :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <input name="email" type="text" class="form-control form-control-sm"
                                    placeholder="Email">
                                <?=form_error('email', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label><i class="fas fa-thumbtack fa-fw text-muted"></i>&nbsp; Address :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <textarea name="email" rows=5 class="form-control form-control-sm"
                            placeholder="Address"></textarea>
                        <?=form_error('email', '<small class="text-danger">', '</small>');?>
                    </div>

                    <div class="col-md-5">
                        <label><i class="fas fa-phone fa-fw text-muted"></i>&nbsp; Phone Number :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <div class="row">
                            <div class="col-md-5">
                                <input name="phone" type="text" class="form-control form-control-sm"
                                    placeholder="Phone Number">
                                <?=form_error('phone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-5">
                        <label><i class="fas fa-dollar-sign fa-fw text-muted"></i>&nbsp; Fee per Post :</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input name="fpPost" type="number" class="form-control form-control-sm" id="fpPost">
                        <?=form_error('fpPost', '<small class="text-danger">', '</small>');?>
                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="font-weight-bold mb-3">Attachment</label>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td class="align-middle"> <i class="fas fa-paperclip fa-fw"></i> &nbsp; Bank Account
                                        :
                                    </td>
                                    <td>
                                        <div class="row no-gutters">
                                            <div class="col-md-4 mb-2">
                                                <small>Bank Name :</small>
                                                <select name="bankName" id="bankName"
                                                    class="form-control form-control-sm">
                                                    <option value="BCA">BCA</option>
                                                    <option value="BNI">BNI</option>
                                                    <option value="BTN">BTN</option>
                                                    <option value="DBS">DBS</option>
                                                    <option value="Mandiri">Mandiri</option>
                                                </select>
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-md-7">
                                                <small>Number :</small>
                                                <input name="bankAccount" type="number" class="form-control">
                                                <?=form_error('bankAccount', '<small class="text-danger">', '</small>');?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle"> <i class="fas fa-paperclip fa-fw"></i> &nbsp; KTP : </td>
                                    <td>
                                        <div class="text-center file-drop-area">
                                            <span class="fake-btn">Choose files</span>
                                            <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                            <input name="ktp" class="file-input" type="file">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle"><i class="fas fa-paperclip fa-fw"></i> &nbsp; NPWP : </td>
                                    <td>
                                        <div class="text-center file-drop-area">
                                            <span class="fake-btn">Choose files</span>
                                            <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                            <input name="npwp" class="file-input" type="file">
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
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
new SlimSelect({
    select: '#graduatedFrom',
    placeholder: 'Select graduated from',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

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