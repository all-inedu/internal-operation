<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Corporate Program
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/corporate-program/');?>">Corporate
                            Program</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                    <img src="<?=base_url('assets/img/corporate.png');?>" alt="client management" width="50%"
                        class="mb-2"><br>
                    <?php if($cprog['corprog_status']==1) { ?>
                    <span class="badge badge-pill p-1 text-white" data-toggle="tooltip" data-placement="top"
                        title="Success" style="background:#C686FF;">
                        <i class="fas fa-check fa-2x"></i>
                    </span>
                    <?php } else if($cprog['corprog_status']==0) { ?>
                    <span class="badge badge-pill badge-info p-1 text-white" data-toggle="tooltip" data-placement="top"
                        title="Pending">
                        <i class="far fa-clock fa-2x"></i>
                    </span>
                    <?php } else if($cprog['corprog_status']==2) { ?>
                    <span class="badge badge-pill p-1 text-white" data-toggle="tooltip" data-placement="top"
                        title="Denied" style="background:#F27313;">
                        <i class="fas fa-frown-open fa-2x"></i>
                    </span>
                    <?php } ?>

                    <h5 class="align-middle mt-2">
                        <?=$cprog['corp_name'];?></h5>
                    <div class="text-info mb-2">
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$cprog['corp_mail'];?> <br>
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$cprog['corp_phone'];?> &nbsp; | &nbsp;
                        <i class="fab fa-instagram text-danger"></i>&nbsp; <?=$cprog['corp_insta'];?>
                    </div>
                    <h6 style="font-size:14px;" class="text-primary mb-2"><?=$cprog['prog_program'];?></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="icofont-building-alt"></i>&nbsp; Corporate Program
                    <div class="float-right">
                        <a href="<?=base_url('bizdev/corporate-program/view/'.$cprog['corprog_id']);?>"
                            class="btn btn-sm btn-info"><i class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="" method="post" name="updateCorporateProgram" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <label><i class="fas fa-tag text-muted"></i>&nbsp; Program Name :</label>
                        </div>
                        <div class="col-md-9 mb-2">
                            <?=$cprog['prog_program'];?>
                            <hr class="mt-1 mb-1">
                        </div>

                        <div class="col-md-3">
                            <label><i class="fas fa-tag text-muted"></i>&nbsp; Is Corporate Scheme ? :</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <?php if($cprog['corprog_type']==1) { ?>
                            <div class="badge badge-success p-1 pl-3 pr-3">Yes</div>
                            <?php } else { ?>
                            <div class="badge badge-danger p-1 pl-3 pr-3">No</div>
                            <?php } ?>
                        </div>

                        <div class="col-md-3">
                            <label><i class="fas fa-calendar-alt text-muted"></i>&nbsp; First Discuss :</label>
                        </div>
                        <div class="col-md-9 mb-2">
                            <?=date('d F Y', strtotime($cprog['corprog_datefirstdiscuss']));?>
                            <hr class="mt-1 mb-1">
                        </div>

                        <div class="col-md-3">
                            <label><i class="fas fa-calendar text-muted"></i>&nbsp; Last Discuss :</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <small>Date</small>
                                    <input type="hidden" name="corprog_id" value="<?=$cprog['corprog_id'];?>">
                                    <input name="corprog_datelastdiscuss" type="date"
                                        class="form-control form-control-sm"
                                        value="<?=$cprog['corprog_datelastdiscuss'];?>">
                                    <?=form_error('corprog_datelastdiscuss', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-3">
                                    <small>Status</small>
                                    <select name="corprog_status" id="programStatus" onchange="programFix()">
                                        <option value="0">Pending</option>
                                        <option value="1">Success</option>
                                        <option value="2">Denied</option>
                                    </select>
                                    <?=form_error('corprog_status', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label><i class="far fa-sticky-note text-muted"></i>&nbsp; Notes :</label>
                        </div>
                        <div class="col-md-9 mb-2">
                            <textarea name="corprog_notes" class="form-control form-control-sm"
                                rows="5"><?=$cprog['corprog_notes'];?></textarea>
                            <?=form_error('corprog_notes', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-12" id="attachment">
                            <hr>
                            <label class="font-weight-bold">Attachment</label>
                            <div class="row">
                                <!-- Attach 1 -->
                                <div class="col-md-3">
                                    Attachment 1
                                    <?php if($cprog['corprog_attach1']) { ?>
                                    <div class="text-info">Available</div>
                                    <?php } else { ?>
                                    <div class="text-danger">Not Available</div>
                                    <?php } ?>
                                </div>

                                <div class="col-md-9 mb-3">
                                    <input name="corprog_file1" type="text" class="form-control form-control-sm"
                                        value="<?=$cprog['corprog_file1'];?>">
                                    <?=form_error('corprog_file1', '<small class="text-danger">', '</small>');?>

                                    <div class="text-center file-drop-area mt-1">
                                        <span class="fake-btn">Choose files</span>
                                        <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                        <input name="file1" class="file-input" type="file">
                                    </div>
                                </div>

                                <!-- Attach 2 -->
                                <div class="col-md-3">
                                    Attachment 2
                                    <?php if($cprog['corprog_attach2']) { ?>
                                    <div class="text-info">Available</div>
                                    <?php } else { ?>
                                    <div class="text-danger">Not Available</div>
                                    <?php } ?>
                                </div>

                                <div class="col-md-9 mb-3">
                                    <input name="corprog_file2" type="text" class="form-control form-control-sm"
                                        value="<?=$cprog['corprog_file2'];?>">
                                    <?=form_error('corprog_file2', '<small class="text-danger">', '</small>');?>

                                    <div class="text-center file-drop-area mt-1">
                                        <span class="fake-btn">Choose files</span>
                                        <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                        <input name="file2" class="file-input" type="file">
                                    </div>
                                </div>

                                <!-- Attach 3 -->
                                <div class="col-md-3">
                                    Attachment 3
                                    <?php if($cprog['corprog_attach3']) { ?>
                                    <div class="text-info">Available</div>
                                    <?php } else { ?>
                                    <div class="text-danger">Not Available</div>
                                    <?php } ?>
                                </div>

                                <div class="col-md-9">
                                    <input name="corprog_file3" type="text" class="form-control form-control-sm"
                                        value="<?=$cprog['corprog_file3'];?>">
                                    <?=form_error('corprog_file3', '<small class="text-danger">', '</small>');?>

                                    <div class="text-center file-drop-area mt-1">
                                        <span class="fake-btn">Choose files</span>
                                        <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                        <input name="file3" class="file-input" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9 offset-md-3 text-right">
                            <hr class="mt-2 mb-2">
                            <button type="submit" class="btn btn-secondary"><i class="fas fa-save"></i>&nbsp; Save
                                changes</button>
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
var PS = new SlimSelect({
    select: '#programStatus',
    placeholder: 'Select program status ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
PS.set('<?=$cprog["corprog_status"];?>');

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

var PE = $("#programStatus").val();
if (PE == "1") {
    $("#attachment").show();
} else {
    $("#attachment").hide();
}

function programFix() {
    var PE = $("#programStatus").val();
    if (PE == "1") {
        $("#attachment").show();
    } else {
        $("#attachment").hide();
    }
}
</script>