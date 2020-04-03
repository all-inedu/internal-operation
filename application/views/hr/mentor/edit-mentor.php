<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Mentor
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/mentor/potential');?>">Mentor</a>
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
                    <img src="<?=base_url('assets/img/user/mentor.svg');?>" alt="employee" width="30%"><br><br>
                    <h5 class="align-middle mt-2">
                        <?=$mentor['mt_firstn']." ".$mentor['mt_lastn'];?></h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-info">
                        <p>
                            <h6><?php
                                if($mentor['mt_istutor']==1){echo 'Mentor';} else 
                                if($mentor['mt_istutor']==2){echo 'Mentor & Tutor';} else
                                if($mentor['mt_istutor']==3){echo 'Tutor';}
                            ?>
                            </h6>
                            <i class="fas fa-phone text-danger"></i>&nbsp; <?=$mentor['mt_phone'];?> &nbsp; | &nbsp;
                            <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$mentor['mt_email'];?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Mentor Profile
                    <div class="float-right">
                        <a href="<?=base_url('hr/mentor/view/'.$mentor['mt_id']);?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="" method="post" enctype="multipart/form-data">
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
                                    <input name="mt_id" type="hidden" class="form-control form-control-sm"
                                        value="<?=$mentor['mt_id'];?>">
                                    <input name="mt_firstn" type="text" class="form-control form-control-sm"
                                        value="<?=$mentor['mt_firstn'];?>">
                                    <?=form_error('mt_firstn', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6">
                                    <small>Last Name</small>
                                    <input name="mt_lastn" type="text" class="form-control form-control-sm"
                                        value="<?=$mentor['mt_lastn'];?>">
                                    <?=form_error('mt_lastn', '<small class="text-danger">', '</small>');?>
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
                                    <input name="mt_email" type="text" class="form-control form-control-sm"
                                        value="<?=$mentor['mt_email'];?>">
                                    <?=form_error('mt_email', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-thumbtack fa-fw text-muted"></i>&nbsp; Address :</label>
                        </div>
                        <div class="col-md-8 mb-3">
                            <textarea name="mt_address" rows=5 class="form-control form-control-sm"
                                value="Address"><?=$mentor['mt_address'];?></textarea>
                            <?=form_error('mt_address', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-phone fa-fw text-muted"></i>&nbsp; Phone Number : <i
                                    class="text-danger font-weight-bold">*</i></label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <input name="mt_phone" type="text" class="form-control form-control-sm"
                                        value="<?=$mentor['mt_phone'];?>">
                                    <?=form_error('mt_phone', '<small class="text-danger">', '</small>');?>
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
                                    <select id="graduatedFrom" name="univ_id">
                                        <option data-value="true"></option>
                                        <?php foreach($univ as $u): ?>
                                        <option value="<?=$u['univ_id'];?>"><?=$u['univ_name'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?=form_error('univ_id', '<small class="text-danger">', '</small>');?>
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
                                    <input name="mt_major" type="text" class="form-control form-control-sm"
                                        value="<?=$mentor['mt_major'];?>">
                                    <?=form_error('mt_major', '<small class="text-danger">', '</small>');?>
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
                                <div class="col-md-4 mb-3">
                                    <small>Status</small>
                                    <select name="mt_istutor" type="text" class="form-control form-control-sm"
                                        id="position" onchange="changePosition()">
                                        <option value="1">Mentor</option>
                                        <option value="2">Mentor & Tutor</option>
                                        <option value="3">Tutor</option>
                                    </select>
                                    <?=form_error('mt_istutor', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-7 mb-3">
                                    <small>Tutoring Subject</small>
                                    <input name="mt_tsubject" type="text" class="form-control form-control-sm"
                                        value="<?=$mentor['mt_tsubject'];?>" id="subject" placeholder="Tutoring Subject"
                                        readonly>
                                    <?=form_error('mt_tsubject', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6">
                                    <small>Fee per Hours</small>
                                    <input name="mt_feehours" type="number" class="form-control form-control-sm"
                                        id="fpHours" value="<?=$mentor['mt_feehours'];?>" readonly>
                                    <?=form_error('mt_feehours', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6">
                                    <small>Fee per Session</small>
                                    <input name="mt_feesession" type="number" class="form-control form-control-sm"
                                        id="fpSession" value="<?=$mentor['mt_feesession'];?>" readonly>
                                    <?=form_error('mt_feesession', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
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
                                            Curriculum Vitae : <br>
                                            <?php 
                                            if(empty($mentor['mt_cv'])) {
                                                echo '<small class="text-danger ml-4">Not Available</small>'; 
                                            } else {
                                                echo '<small class="text-primary ml-4">Available</small>' ;
                                            }
                                        ?>
                                        </td>
                                        <td>
                                            <div class="text-center file-drop-area">
                                                <span class="fake-btn">Choose files</span>
                                                <span class="file-msg">or drag and drop files here (docx, doc,
                                                    pdf)</span>
                                                <input name="mt_cv" class="file-input" type="file">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"> <i class="fas fa-paperclip fa-fw"></i> &nbsp; Bank
                                            Account
                                            : <br>
                                            <?php 
                                            if(empty($mentor['mt_bankacc'])) {
                                                echo '<small class="text-danger ml-4">Not Available</small>'; 
                                            } else {
                                                echo '<small class="text-primary ml-4">Available</small>' ;
                                            }
                                        ?>
                                        </td>
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-md-4 mb-2">
                                                    <small>Bank Name :</small>
                                                    <select name="mt_banknm" id="mt_banknm"
                                                        class="form-control form-control-sm">
                                                        <?php foreach($bank as $b): ?>
                                                        <option value="<?=$b;?>"><?=$b;?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-md-7">
                                                    <small>Number :</small>
                                                    <input name="mt_bankacc" type="number" class="form-control"
                                                        value="<?=$mentor['mt_bankacc'];?>">
                                                    <?=form_error('mt_bankacc', '<small class="text-danger">', '</small>');?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"> <i class="fas fa-paperclip fa-fw"></i> &nbsp; KTP :
                                            <br>
                                            <?php 
                                            if(empty($mentor['mt_ktp'])) {
                                                echo '<small class="text-danger ml-4">Not Available</small>'; 
                                            } else {
                                                echo '<small class="text-primary ml-4">Available</small>' ;
                                            }
                                        ?>
                                        </td>
                                        <td>
                                            <div class="text-center file-drop-area">
                                                <span class="fake-btn">Choose files</span>
                                                <span class="file-msg">or drag and drop files here (docx, doc,
                                                    pdf)</span>
                                                <input name="mt_ktp" class="file-input" type="file">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"><i class="fas fa-paperclip fa-fw"></i> &nbsp; NPWP :
                                            <br>
                                            <?php 
                                            if(empty($mentor['mt_npwp'])) {
                                                echo '<small class="text-danger ml-4">Not Available</small>'; 
                                            } else {
                                                echo '<small class="text-primary ml-4">Available</small>' ;
                                            }
                                        ?>
                                        </td>
                                        <td>
                                            <div class="text-center file-drop-area">
                                                <span class="fake-btn">Choose files</span>
                                                <span class="file-msg">or drag and drop files here (docx, doc,
                                                    pdf)</span>
                                                <input name="mt_npwp" class="file-input" type="file">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
let gf = new SlimSelect({
    select: '#graduatedFrom',
    placeholder: 'Select graduated from',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

gf.set("<?=$mentor['univ_id'];?>");
$("#position").val("<?=$mentor['mt_istutor'];?>").attr("selected");
$("#mt_banknm").val("<?=$mentor['mt_banknm'];?>").attr("selected");
changePosition();

function changePosition() {
    var x = $('#position').val();
    if ((x == "2") || (x == "3")) {
        $("#subject").attr('readonly', false);
        $("#fpHours").attr('readonly', false);
        $("#fpSession").attr('readonly', false);
        $("#subject").val("<?=$mentor['mt_tsubject'];?>");
        $("#fpHours").val("<?=$mentor['mt_feehours'];?>");
        $("#fpSession").val("<?=$mentor['mt_feesession'];?>");
        // document.getElementById("fpHours").focus();
    } else {
        $("#subject").attr('readonly', true);
        $("#fpHours").attr('readonly', true);
        $("#fpSession").attr('readonly', true);
        $("#subject").val("");
        $("#fpHours").val("0");
        $("#fpSession").val("0");
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