<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Schools
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/school/');?>">School</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>

<div class="row">
    <div class="col-md-3 mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/sch.png');?>" alt="client management" width="60%">
                    <h5 class="mt-0"><?=$sch['sch_name'];?></h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-info mb-2">
                        <?php if($sch['sch_mail']) { ?>
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$sch['sch_mail'];?><br>
                        <?php } if($sch['sch_phone']) { ?>
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$sch['sch_phone'];?> &nbsp;
                        <?php } ?>
                    </div>
                    <a href="<?=base_url('bizdev/school/edit/'.$sch['sch_id']);?>" class="btn btn-sm btn-info m-1"><i
                            class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                    <a href="<?=base_url('bizdev/school/delete/'.$sch['sch_id']);?>"
                        class="delete-button btn btn-sm btn-danger m-1" data-message="school">
                        <i class="fas fa-trash"></i>&nbsp; Delete
                    </a>
                    <a href="#" class="btn btn-sm btn-success m-1" data-toggle="modal"
                        data-target="#convertPotential"><i class="fas fa-retweet"></i>&nbsp;
                        Add Program</a>
                </div>
            </div>
        </div>

        <?php if($sprog) { ?>
        <div class="card shadow mt-2 card-sticky">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Program List : </h6>
                        <div class="line" style="margin-top:-5px; margin-bottom:10px;"></div>
                    </div>
                    <div class="col-md-12">
                        <div style="height:210px; overflow-x: hidden;">
                            <?php foreach($sprog as $sp) : ?>
                            <div class="border-bottom" style="margin:0px -20px; padding:10px 20px;">
                                <div class="row">
                                    <div class="col-md-9">
                                        <?=$sp['prog_program'];?> <br>
                                        <small><b>
                                                Status :
                                                <?php if($sp['schprog_status']==0) { echo 'Pending'; } else?>
                                                <?php if($sp['schprog_status']==1) { echo 'Success'; } else?>
                                                <?php if($sp['schprog_status']==2) { echo 'Denied'; }?>
                                            </b>
                                        </small>
                                    </div>
                                    <div class="col-md-3 my-auto text-right">
                                        <a href="<?=base_url('bizdev/school-program/view/'.$sp['schprog_id']);?>"
                                            class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="icofont-building"></i> &nbsp; School
                    <div class="float-right">
                        <a href="<?=base_url('bizdev/school/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>School Name
                            </label>
                            <input name="sch_name" type="text" class="form-control form-control-sm"
                                value="<?=$sch['sch_name'];?>" disabled>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Type
                            </label>
                            <select name="sch_type" id="schoolType">
                                <option><?=$sch['sch_type'];?></option>
                            </select>

                        </div>
                    </div>

                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Level
                            </label>
                            <select name="sch_level" id="schoolLevel">
                                <option><?=$sch['sch_level'];?></option>
                            </select>

                        </div>
                    </div> -->

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Curriculum
                            </label>
                            <select name="sch_curriculum" id="schoolCurriculum">
                                <option><?=$sch['sch_curriculum'];?></option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Instagram
                            </label>
                            <input name="sch_insta" type="text" class="form-control form-control-sm"
                                value="<?=$sch['sch_insta'];?>" disabled>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>School Mail
                            </label>
                            <input name="schoolMail" type="text" class="form-control form-control-sm"
                                value="<?=$sch['sch_mail'];?>" disabled>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Telephone
                            </label>
                            <input name="telephone" type="text" class="form-control form-control-sm"
                                value="<?=$sch['sch_phone'];?>" disabled>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>City
                            </label>
                            <input name="city" type="text" class="form-control form-control-sm"
                                value="<?=$sch['sch_city'];?>" disabled>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Location
                            </label>
                            <textarea name="sch_location" class="form-control form-control-sm" placeholder="Location"
                                rows="4" disabled><?=$sch['sch_location'];?></textarea>

                        </div>
                    </div>


                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="font-weight-bold">Teachers Contact :</label>
                    </div>
                    <div class="container" id="teacher">
                        <div class="row p-0">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-dark text-white">
                                            <tr class="text-center">
                                                <th>Full Name</th>
                                                <th>E-mail</th>
                                                <th>Phone Number</th>
                                                <th>Position</th>
                                                <th>School Grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($sch_detail as $s): ?>
                                            <tr class="text-center">
                                                <td><?=$s['schdetail_fullname'];?></td>
                                                <td><?=$s['schdetail_email'];?></td>
                                                <td><?=$s['schdetail_phone'];?></td>
                                                <td><?=$s['schdetail_position'];?></td>
                                                <td><?=$s['schdetail_grade'];?></td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="convertPotential" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable" role="document">
        <form action="<?=base_url('bizdev/school-program/save/'.$sch['sch_id']);?>" method="post" id="convert">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Program</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Program Name <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <select id="programName" name="prog_id">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($program as $p): ?>
                                    <option value="<?=$p['prog_id'];?>">
                                        <?php 
                                            if($p['prog_sub']=='') {
                                                echo $p['prog_program'];
                                            } else {
                                                echo $p['prog_sub'].': '.$p['prog_program'];
                                            }
                                        ?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('prog_id', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>PIC <i class="text-danger font-weight-bold">*</i>
                            </label>
                            <select id="PIC" name="empl_id">
                                <option data-placeholder="true"></option>
                                <?php foreach ($empl as $e) : ?>
                                <option value="<?=$e['empl_id'];?>">
                                    <?=$e['empl_firstname'].' '.$e['empl_lastname'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Discuss <i class="text-danger font-weight-bold">*</i></label>
                                <input name="schprog_datefirstdis" type="date" class="form-control form-control-sm"
                                    placeholder="First Discuss">
                                <?=form_error('schprog_datefirstdis', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Discuss</label>
                                <input name="schprog_datelastdis" type="date" class="form-control form-control-sm"
                                    placeholder="Last Discuss" disabled>
                                <?=form_error('schprog_datelastdis', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes</label>
                                <textarea name="schprog_notes" class="form-control form-control-sm" rows="5"></textarea>
                                <?=form_error('schprog_notes', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save
                        changes</button>
                </div>
            </div>
        </form>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
var ST = new SlimSelect({
    select: '#schoolType',
    placeholder: 'Select school type',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
ST.disable();

// var SL = new SlimSelect({
//     select: '#schoolLevel',
//     placeholder: 'Select school level',
//     allowDeselect: true,
//     deselectLabel: '<span class="text-danger">✖</span>'
// });
// SL.disable();

var SC = new SlimSelect({
    select: '#schoolCurriculum',
    placeholder: 'Select school curriculum',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
SC.disable();
</script>

<script>
var PN = new SlimSelect({
    select: '#programName',
    placeholder: 'Select program name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});


new SlimSelect({
    select: '#PIC',
    placeholder: 'Select pic',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
</script>