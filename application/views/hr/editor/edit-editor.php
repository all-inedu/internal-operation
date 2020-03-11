<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Editor
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/editor/');?>">Editor</a>
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
                    <img src="<?=base_url('assets/img/user/editor.svg');?>" alt="employee" width="30%"><br><br>
                    <h5 class="align-middle mt-2">
                        <?=$editor['editor_fn']." ".$editor['editor_ln'];?></h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-info">
                        <h6>
                            <?php 
                                if($editor['editor_position']==3){echo 'Managing Editor';} else
                                if($editor['editor_position']==2){echo 'Senior Editor';} 
                                else {echo 'Associate Editor';}
                            ?>
                            <small style="margin-top:-10px !important;">
                                <?php 
                                    if($editor['editor_status']==1){echo '<div class="badge badge-success">Active</div>';} else
                                    if($editor['editor_status']==2){echo '<div class="badge badge-danger">Not Active</div>';} else {echo '<div class="badge badge-warning">Potential</div>';}
                                ?>
                            </small>
                        </h6>
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$editor['editor_phone'];?> &nbsp; | &nbsp;
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$editor['editor_mail'];?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Editor Profile
                    <div class="float-right">
                        <a href="<?=base_url('hr/editor/view/'.$editor['editor_id']);?>" class="btn btn-sm btn-info"><i
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
                                    <small>First Name</small>
                                    <input name="editor_id" type="hidden" value="<?=$editor['editor_id'];?>">
                                    <input name="editor_fn" type="text" class="form-control form-control-sm"
                                        value="<?=$editor['editor_fn'];?>">
                                    <?=form_error('editor_fn', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6">
                                    <small>Last Name</small>
                                    <input name="editor_ln" type="text" class="form-control form-control-sm"
                                        value="<?=$editor['editor_ln'];?>">
                                    <?=form_error('editor_ln', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-envelope fa-fw text-muted"></i>&nbsp; Email :</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="editor_mail" type="text" class="form-control form-control-sm"
                                        value="<?=$editor['editor_mail'];?>">
                                    <?=form_error('editor_mail', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-thumbtack fa-fw text-muted"></i>&nbsp; Address :</label>
                        </div>
                        <div class="col-md-8 mb-3">
                            <textarea name="editor_address" rows=5
                                class="form-control form-control-sm"><?=$editor['editor_address'];?></textarea>
                            <?=form_error('editor_address', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-phone fa-fw text-muted"></i>&nbsp; Phone Number :</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="editor_phone" type="text" class="form-control form-control-sm"
                                        value="<?=$editor['editor_phone'];?>">
                                    <?=form_error('editor_phone', '<small class="text-danger">', '</small>');?>
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
                                    <select id="graduatedFroms" name="editor_gradfrom">
                                        <option data-value="true"></option>
                                        <?php foreach($univ as $u): ?>
                                        <option value="<?=$u['univ_id'];?>"><?=$u['univ_name'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?=form_error('editor_gradfrom', '<small class="text-danger">', '</small>');?>
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
                                    <input name="editor_major" type="text" class="form-control form-control-sm"
                                        value="<?=$editor['editor_major'];?>">
                                    <?=form_error('editor_major', '<small class="text-danger">', '</small>');?>
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
                                <div class="col-md-5 mb-3">
                                    <small>Status</small>
                                    <select name="editor_position" type="text" id="positions">
                                        <option data-value="true"></option>
                                        <option value="3">Managing Editor</option>
                                        <option value="2">Senior Editor</option>
                                        <option value="1">Associate Editor</option>
                                    </select>
                                    <?=form_error('editor_position', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-7">
                                    <small>Fee per Hours</small>
                                    <input name="editor_feephours" type="number" class="form-control form-control-sm"
                                        value="<?=$editor['editor_feephours'];?>">
                                    <?=form_error('editor_feephours', '<small class="text-danger">', '</small>');?>
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
                                                if(empty($editor['editor_cv'])) { 
                                                echo '<small class="text-danger ml-4">Not Available</small>';}else {
                                                echo '<small class="text-primary ml-4">Available</small>' ;}
                                            ?>
                                        </td>
                                        <td>
                                            <div class="text-center file-drop-area">
                                                <span class="fake-btn">Choose files</span>
                                                <span class="file-msg">or drag and drop files here (docx, doc,
                                                    pdf)</span>
                                                <input name="editor_cv" class="file-input" type="file">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"> <i class="fas fa-paperclip fa-fw"></i> &nbsp; Bank
                                            Account
                                            : <br>
                                            <?php 
                                                if(empty($editor['editor_bankacc'])) { 
                                                echo '<small class="text-danger ml-4">Not Available</small>';}else {
                                                echo '<small class="text-primary ml-4">Available</small>' ;}
                                            ?>
                                        </td>
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-md-4 mb-2">
                                                    <small>Bank Name :</small>
                                                    <select name="editor_bankname" id="bankName"
                                                        class="form-control form-control-sm">
                                                        <?php foreach ($bank as $b) { ?>
                                                        <option value="<?=$b;?>"><?=$b;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-md-7">
                                                    <small>Number :</small>
                                                    <input name="editor_bankacc" type="number" class="form-control"
                                                        value="<?=$editor['editor_bankacc'];?>">
                                                    <?=form_error('editor_bankacc', '<small class="text-danger">', '</small>');?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"> <i class="fas fa-paperclip fa-fw"></i> &nbsp; KTP :
                                            <br>
                                            <?php 
                                                if(empty($editor['editor_ktp'])) { 
                                                echo '<small class="text-danger ml-4">Not Available</small>';}else {
                                                echo '<small class="text-primary ml-4">Available</small>' ;}
                                            ?>
                                        </td>
                                        <td>
                                            <div class="text-center file-drop-area">
                                                <span class="fake-btn">Choose files</span>
                                                <span class="file-msg">or drag and drop files here (docx, doc,
                                                    pdf)</span>
                                                <input name="editor_ktp" class="file-input" type="file">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"><i class="fas fa-paperclip fa-fw"></i> &nbsp; NPWP :
                                            <br>
                                            <?php 
                                                if(empty($editor['editor_npwp'])) { 
                                                echo '<small class="text-danger ml-4">Not Available</small>';}else {
                                                echo '<small class="text-primary ml-4">Available</small>' ;}
                                            ?>
                                        </td>
                                        <td>
                                            <div class="text-center file-drop-area">
                                                <span class="fake-btn">Choose files</span>
                                                <span class="file-msg">or drag and drop files here (docx, doc,
                                                    pdf)</span>
                                                <input name="editor_npwp" class="file-input" type="file">
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
    select: '#graduatedFroms',
    value: 'Select graduated from',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
gf.set("<?=$editor['univ_id'];?>");
$("#bankName").val("<?=$editor['editor_bankname'];?>").attr("selected");

let ps = new SlimSelect({
    select: '#positions',
    value: 'Select position',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
ps.set("<?=$editor['editor_position'];?>");

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