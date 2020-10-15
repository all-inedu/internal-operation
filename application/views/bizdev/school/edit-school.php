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
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>

<div class="row">
    <div class="col-md-3 mb-2">
        <div class="card shadow card-sticky">
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
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <form action="test.php" method="post" id="editSchool">
                    <h6><i class="icofont-building"></i> &nbsp; School
                        <div class="float-right">
                            <a href="<?=base_url('bizdev/school/view/'.$sch['sch_id']);?>"
                                class="btn btn-sm btn-info"><i class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>School Name
                                </label>
                                <input name="sch_id" type="hidden" value="<?=$sch['sch_id'];?>">
                                <input name="sch_name" type="text" class="form-control form-control-sm"
                                    value="<?=$sch['sch_name'];?>">
                                <?=form_error('sch_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Type
                                </label>
                                <select name="sch_type" id="schoolType">
                                    <?php foreach($type as $t): ?>
                                    <option value="<?=$t;?>"><?=$t;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('sch_type', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Level
                                </label>
                                <select name="sch_level" id="schoolLevel">
                                    <?php foreach($level as $l): ?>
                                    <option value="<?=$l;?>"><?=$l;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('sch_level', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div> -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Curriculum
                                </label>
                                <select name="sch_curriculum" id="schoolCurriculum">
                                    <?php foreach($curriculum as $c): ?>
                                    <option value="<?=$c;?>"><?=$c;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('sch_curriculum', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Instagram
                                </label>
                                <input name="sch_insta" type="text" class="form-control form-control-sm"
                                    value="<?=$sch['sch_insta'];?>">
                                <?=form_error('sch_insta', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School Mail
                                </label>
                                <input name="sch_mail" type="text" class="form-control form-control-sm"
                                    value="<?=$sch['sch_mail'];?>">
                                <?=form_error('sch_mail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Telephone
                                </label>
                                <input name="sch_phone" type="text" class="form-control form-control-sm"
                                    value="<?=$sch['sch_phone'];?>">
                                <?=form_error('sch_phone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>City
                                </label>
                                <input name="sch_city" type="text" class="form-control form-control-sm"
                                    value="<?=$sch['sch_city'];?>">
                                <?=form_error('sch_city', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Location
                                </label>
                                <textarea name="sch_location" class="form-control form-control-sm"
                                    rows="4"><?=$sch['sch_location'];?></textarea>
                                <?=form_error('sch_location', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>&nbsp;
                            Save changes</button>
                    </div>
                </form>

                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="font-weight-bold">Teacher Contact Person</label>
                        <button class="float-right btn btn-warning" data-toggle="modal" data-target="#addTeacher"><i
                                class="fas fa-plus-square"></i>&nbsp; Add Teacher</button>
                    </div>
                    <div class="container mt-3" id="teacher">
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
                                                <th>Action</th>
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
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal"
                                                        data-target="#editTeacher"
                                                        onclick="editTeacherId('<?=$s['schdetail_id'];?>')"><i
                                                            class="fas fa-edit"></i></button>
                                                    <a href="<?=base_url('bizdev/school/deleteDetail/'.$s['schdetail_id'].'/'.$s['sch_id']);?>"
                                                        class="btn btn-sm btn-danger delete-button"
                                                        data-message="teacher" title="Delete"><i
                                                            class="fas fa-trash"></i></a></td>
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

<!-- Add Modal -->
<div class="modal fade" id="addTeacher" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="<?=base_url('bizdev/school/saveDetail');?>" method="post" name="addTeacher">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Teacher</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Teacher Name</label>
                                <input name="sch_id" type="hidden" value="<?=$sch['sch_id'];?>">
                                <input name="schdetail_fullname" type="text" class="form-control form-control-sm"
                                    placeholder="Teacher Name">
                                <?=form_error('schdetail_fullname', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input name="schdetail_email" type="text" class="form-control form-control-sm"
                                    placeholder="Teacher Mail">
                                <?=form_error('schdetail_email', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <small>School Grade</small>
                                <select type="text" name="schdetail_grade" class="form-control form-control-sm">
                                    <option value="Middle School">Middle School</option>
                                    <option value="High School">High School</option>
                                    <option value="Middle School & High School">Middle School & High School
                                    </option>
                                </select>
                                <?=form_error('schdetail_grade', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="schdetail_phone" type="text" class="form-control form-control-sm"
                                    placeholder="Phone Number">
                                <?=form_error('schdetail_phone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Position</label>
                                <select type="text" name="schdetail_position" class="form-control form-control-sm">
                                    <option value="Principal">Principal</option>
                                    <option value="Counselor">Counselor</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="Marketing">Marketing</option>
                                </select>
                                <?=form_error('schdetail_position', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edut Modal -->
<div class="modal fade" id="editTeacher" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="<?=base_url('bizdev/school/updateDetail');?>" method="post" name="editTeacher">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Teacher</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Teacher Name</label>
                                <input name="schdetail_id" type="hidden" id="schdetail_id">
                                <input name="sch_id" type="hidden" id="sch_id">
                                <input name="schdetail_fullname" type="text" class="form-control form-control-sm"
                                    id="schdetail_fullname">
                                <?=form_error('schdetail_fullname', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input name="schdetail_email" type="text" class="form-control form-control-sm"
                                    id="schdetail_email">
                                <?=form_error('schdetail_email', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <small>School Grade</small>
                                <select type="text" name="schdetail_grade" class="form-control form-control-sm"
                                    id="schdetail_grade">
                                    <option value="Middle School">Middle School</option>
                                    <option value="High School">High School</option>
                                    <option value="Middle School & High School">Middle School & High School
                                    </option>
                                </select>
                                <?=form_error('schdetail_grade', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="schdetail_phone" type="text" class="form-control form-control-sm"
                                    id="schdetail_phone">
                                <?=form_error('schdetail_phone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Position</label>
                                <select type="text" name="schdetail_position" class="form-control form-control-sm"
                                    id="schdetail_position">
                                    <option value="Principal">Principal</option>
                                    <option value="Counselor">Counselor</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="Marketing">Marketing</option>
                                </select>
                                <?=form_error('schdetail_position', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
let st = new SlimSelect({
    select: '#schoolType',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
st.set('<?=$sch["sch_type"];?>');

// let slevel = new SlimSelect({
//     select: '#schoolLevel',
//     allowDeselect: true,
//     deselectLabel: '<span class="text-danger">✖</span>'
// });
// slevel.set('<?=$sch["sch_level"];?>');

let sc = new SlimSelect({
    select: '#schoolCurriculum',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
sc.set('<?=$sch["sch_curriculum"];?>');

function editTeacherId(x) {
    $.ajax({
        type: 'post',
        url: '<?=base_url("bizdev/school/showDetailId/");?>' + x,
        dataType: 'json',
        success: function(data) {
            // console.log(data);
            $('#schdetail_id').val(data.schdetail_id);
            $('#sch_id').val(data.sch_id);
            $('#schdetail_fullname').val(data.schdetail_fullname);
            $('#schdetail_email').val(data.schdetail_email);
            $('#schdetail_grade').val(data.schdetail_grade);
            $('#schdetail_position').val(data.schdetail_position);
            $('#schdetail_phone').val(data.schdetail_phone);
        }
    });
}
</script>