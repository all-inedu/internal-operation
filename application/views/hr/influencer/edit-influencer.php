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
                    <img src="<?=base_url('assets/img/user/infl.svg');?>" alt="employee" width="30%"><br><br>
                    <h5 class="align-middle mt-2">
                        <?=$infl['infl_fn'];?>
                    </h5>
                    <div class="line" style="margin-top:15px; margin-bottom:10px;"></div>
                    <div class="mb-2">
                        <?php
                            if($infl['infl_status']==1){echo '<div class="p-1 badge badge-success">Active</div>';} else
                            if($infl['infl_status']==2){echo '<div class="p-1 badge badge-danger">Not Active</div>';}
                        ?>
                    </div>
                    <div class="text-info">
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$infl['infl_phone'];?> &nbsp; | &nbsp;
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$infl['infl_mail'];?>
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
                        <a href="<?=base_url('hr/influencer/view/'.$infl['infl_id']);?>" class="btn btn-sm btn-info"><i
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
                            <label><i class="fas fa-id-card fa-fw text-muted"></i>&nbsp; Full Name : <i
                                    class="text-danger font-weight-bold">*</i></label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <input name="infl_id" type="hidden" value="<?=$infl['infl_id'];?>">
                                    <input name="infl_fn" type="text" class="form-control form-control-sm"
                                        value="<?=$infl['infl_fn'];?>">
                                    <?=form_error('infl_fn', '<small class="text-danger">', '</small>');?>
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
                                    <input name="infl_mail" type="text" class="form-control form-control-sm"
                                        value="<?=$infl['infl_mail'];?>">
                                    <?=form_error('infl_mail', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-thumbtack fa-fw text-muted"></i>&nbsp; Address :</label>
                        </div>
                        <div class="col-md-8 mb-3">
                            <textarea name="infl_address" rows=5
                                class="form-control form-control-sm"><?=$infl['infl_address'];?></textarea>
                            <?=form_error('infl_address', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-phone fa-fw text-muted"></i>&nbsp; Phone Number : <i
                                    class="text-danger font-weight-bold">*</i></label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <input name="infl_phone" type="text" class="form-control form-control-sm"
                                        value="<?=$infl['infl_phone'];?>">
                                    <?=form_error('infl_phone', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <label><i class="fas fa-dollar-sign fa-fw text-muted"></i>&nbsp; Fee per Post :</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input name="infl_feeperpost" type="number" class="form-control form-control-sm"
                                id="infl_feeperpost" value="<?=$infl['infl_feeperpost'];?>">
                            <?=form_error('infl_feeperpost', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold mb-3">Attachment</label>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td class="align-middle"> <i class="fas fa-paperclip fa-fw"></i> &nbsp; Bank
                                            Account
                                            : <br>
                                            <?php 
                                            if(empty($infl['infl_bankacc'])) {
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
                                                    <select name="infl_banknm" id="bankName"
                                                        class="form-control form-control-sm">
                                                        <?php foreach($bank as $b):?>
                                                        <option value="<?=$b;?>"><?=$b;?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-md-7">
                                                    <small>Number :</small>
                                                    <input name="infl_bankacc" type="number" class="form-control"
                                                        value="<?=$infl['infl_bankacc'];?>">
                                                    <?=form_error('infl_bankacc', '<small class="text-danger">', '</small>');?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"> <i class="fas fa-paperclip fa-fw"></i> &nbsp; KTP :
                                            <br>
                                            <?php 
                                            if(empty($infl['infl_ktp'])) {
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
                                                <input name="infl_ktp" class="file-input" type="file">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"><i class="fas fa-paperclip fa-fw"></i> &nbsp; NPWP :
                                            <br>
                                            <?php 
                                            if(empty($infl['infl_npwp'])) {
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
                                                <input name="infl_npwp" class="file-input" type="file">
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
$("#bankName").val("<?=$infl['infl_banknm'];?>").attr("selected");

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