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
                    <img src="<?=base_url('assets/img/school.png');?>" alt="client management" width="100%">
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <h5>School Name</h5>
                    <div class="text-info">
                        <p><i class="fas fa-envelope text-danger"></i>&nbsp; student@gmail.com <br>
                            <i class="fas fa-phone text-danger"></i>&nbsp; 081231232xxx &nbsp; | &nbsp;
                            <i class="fab fa-instagram text-danger"></i>&nbsp; @student</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <form action="test.php" method="post" id="editSchool">
                    <h6><i class="fas fa-user"></i>&nbsp; &nbsp; School
                        <div class="float-right">
                            <a href="<?=base_url('bizdev/school/view');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>School Name
                                </label>
                                <input name="schoolName" type="text" class="form-control form-control-sm"
                                    placeholder="School Name">
                                <?=form_error('schoolName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type
                                </label>
                                <select name="schoolType" id="schoolType">
                                    <option data-placeholder="true"></option>
                                    <option value="International">International</option>
                                    <option value="National">National</option>
                                </select>
                                <?=form_error('schoolType', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Level
                                </label>
                                <select name="schoolLevel" id="schoolLevel">
                                    <option data-placeholder="true"></option>
                                    <option value="Junior">Junior</option>
                                    <option value="Elementary">Elementary</option>
                                    <option value="Senior">Senior</option>
                                </select>
                                <?=form_error('schoolLevel', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Curriculum
                                </label>
                                <select name="schoolCurriculum" id="schoolCurriculum">
                                    <option data-placeholder="true"></option>
                                    <option value="National">National</option>
                                    <option value="IB">IB</option>
                                    <option value="A-Level">A-Level</option>
                                </select>
                                <?=form_error('schoolCurriculum', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Is Friendly?
                                </label>
                                <select name="isFriendly" id="isFriendly">
                                    <option data-placeholder="true"></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <?=form_error('isFriendly', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School Mail
                                </label>
                                <input name="schoolMail" type="text" class="form-control form-control-sm"
                                    placeholder="School Mail">
                                <?=form_error('schoolMail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Telephone
                                </label>
                                <input name="telephone" type="text" class="form-control form-control-sm"
                                    placeholder="Telephone">
                                <?=form_error('telephone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>City
                                </label>
                                <input name="city" type="text" class="form-control form-control-sm" placeholder="City">
                                <?=form_error('city', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Location
                                </label>
                                <textarea name="location" class="form-control form-control-sm" placeholder="Location"
                                    rows="4"></textarea>
                                <?=form_error('location', '<small class="text-danger">', '</small>');?>
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
                                        <thead>
                                            <tr>
                                                <th class="text-center">Full Name</th>
                                                <th class="text-center">E-mail</th>
                                                <th class="text-center">Linkedin</th>
                                                <th class="text-center">Phone Number</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">Full Name</td>
                                                <td class="text-center">E-mail</td>
                                                <td class="text-center">Linkedin</td>
                                                <td class="text-center">Phone Number</td>
                                                <td class="text-center">Principal</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal"
                                                        data-target="#editTeacher" onclick="editTeacher('1')"><i
                                                            class="fas fa-edit"></i></button>
                                                    <a href="#" class="btn btn-sm btn-danger delete-button"
                                                        data-message="teacher" title="Delete"><i
                                                            class="fas fa-trash"></i></a></td>
                                            </tr>
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
        <form action="addTeacher" method="post" id="addTeacher">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Teacher</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Teacher Name</label>
                                <input name="teacherName" type="text" class="form-control form-control-sm"
                                    placeholder="Teacher Name">
                                <?=form_error('teacherName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input name="teacherEmail" type="text" class="form-control form-control-sm"
                                    placeholder="Teacher Mail">
                                <?=form_error('teacherEmail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Linkedin</label>
                                <input name="teacherLinkedin" type="text" class="form-control form-control-sm"
                                    placeholder="Teacher Linkedin">
                                <?=form_error('teacherLinkedin', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="teacherPhone" type="text" class="form-control form-control-sm"
                                    placeholder="Phone Number">
                                <?=form_error('teacherPhone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select type="text" name="teacherStatus" class="form-control form-control-sm">
                                    <option value="Counselor">Counselor</option>
                                    <option value="Counselor">Teacher</option>
                                    <option value="Principal">Principal</option>
                                </select>
                                <?=form_error('teacherStatus', '<small class="text-danger">', '</small>');?>
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
        <form action="editTeacher.php" method="post" id="editTeacher">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Teacher</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Teacher Name</label>
                                <input name="teacherName" type="text" class="form-control form-control-sm"
                                    placeholder="Teacher Name">
                                <?=form_error('teacherName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input name="teacherEmail" type="text" class="form-control form-control-sm"
                                    placeholder="Teacher Mail">
                                <?=form_error('teacherEmail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Linkedin</label>
                                <input name="teacherLinkedin" type="text" class="form-control form-control-sm"
                                    placeholder="Teacher Linkedin">
                                <?=form_error('teacherLinkedin', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="teacherPhone" type="text" class="form-control form-control-sm"
                                    placeholder="Phone Number">
                                <?=form_error('teacherPhone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select type="text" name="teacherStatus" class="form-control form-control-sm">
                                    <option value="Counselor">Counselor</option>
                                    <option value="Counselor">Teacher</option>
                                    <option value="Principal">Principal</option>
                                </select>
                                <?=form_error('teacherStatus', '<small class="text-danger">', '</small>');?>
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
new SlimSelect({
    select: '#schoolType',
    placeholder: 'Select school type',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#schoolLevel',
    placeholder: 'Select school level',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#schoolCurriculum',
    placeholder: 'Select school curriculum',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#isFriendly',
    placeholder: 'Select school curriculum',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

function editTeacher(x) {
    console.log(x);
}
</script>