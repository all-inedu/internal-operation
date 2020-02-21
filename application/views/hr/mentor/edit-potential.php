<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Potential Mentor
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/mentor/potential');?>">Potential Mentor</a>
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
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Potential Mentor Profile
                    <div class="float-right">
                        <a href="<?=base_url('hr/mentor/potential/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="" method="post">
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
                                    <input name="id" type="hidden" class="form-control form-control-sm"
                                        value="<?=$mentor['id'];?>">
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
                            <label><i class="fas fa-envelope fa-fw text-muted"></i>&nbsp; Email :</label>
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
                            <label><i class="fas fa-phone fa-fw text-muted"></i>&nbsp; Phone Number :</label>
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
                                <div class="col-md-4">
                                    <small>Status</small>
                                    <select name="mt_istutor" type="text" class="form-control form-control-sm"
                                        id="position" onchange="changePosition()">
                                        <option value="1">Mentor</option>
                                        <option value="2">Mentor & Tutor</option>
                                        <option value="3">Tutor</option>
                                    </select>
                                    <?=form_error('mt_istutor', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-7">
                                    <small>Tutoring Subject</small>
                                    <input name="mt_tsubject" type="text" class="form-control form-control-sm"
                                        value="<?=$mentor['mt_tsubject'];?>" id="subject" placeholder="Tutoring Subject"
                                        readonly>
                                    <?=form_error('mt_tsubject', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label><i class="fas fa-calendar-alt fa-fw  text-muted"></i>&nbsp; Last Contact
                                :</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="mt_lastcontactdate" type="date" class="form-control form-control-sm"
                                        value="<?=$mentor['mt_lastcontactdate'];?>">
                                    <?=form_error('mt_lastcontactdate', '<small class="text-danger">', '</small>');?>
                                </div>
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
    value: 'Select graduated from',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

gf.set("<?=$mentor['univ_id'];?>");
$("#position").val("<?=$mentor['mt_istutor'];?>").attr("selected");
changePosition();

function changePosition() {
    var x = $('#position').val();
    if ((x == "2") || (x == "3")) {
        $("#subject").attr("readonly", false);
        document.getElementById("subject").focus();
    } else {
        $("#subject").attr("readonly", true);
        $("#subject").val("");
        document.getElementById("lastContact").focus();
    }
}
</script>