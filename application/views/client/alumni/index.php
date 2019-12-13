<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Alumni
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Alumni</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="#" class="btn btn-sm btn-success ml-2 add" data-toggle="modal" data-target="#addAlumni">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Alumni
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width="5%" class="text-center">ID Alumni</th>
                <th width="10%" class="text-center">Student Name</th>
                <th width="10%" class="text-center">University Name</th>
                <th width="5%" class="text-center">Major</th>
                <th width="5%" class="text-center">Graduate Date</th>
                <th width="5%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=25;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center">AW</td>
                <td class="text-center">Ihsan Tri Wanda</td>
                <td class="text-center">Harvard</td>
                <td class="text-center">Computer Science</td>
                <td class="text-center">2019</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal" data-target="#editAlumni"
                        onclick="editAlumni('<?=$i;?>')"><i class="fas fa-edit"></i></button>
                    <a href="#" class="btn btn-sm btn-danger delete-button" data-message="alumni" title="Delete"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addAlumni" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Alumni</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ID Alumni</label>
                            <input name="idAlumni" type="text" class="form-control form-control-sm"
                                placeholder="ID Alumni">
                            <?=form_error('idAlumni', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Student Name
                            </label>
                            <select id="studentList" name="studentList">
                                <option data-placeholder="true"></option>
                                <option value="Budi">Budi</option>
                                <option value="Aisyah">Aisyah</option>
                                <option value="Siti">Siti</option>
                            </select>
                            <?=form_error('studentList', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>University Name
                            </label>
                            <select id="univName" name="univName">
                                <option data-placeholder="true"></option>

                            </select>
                            <?=form_error('univName', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Major</label>
                            <input name="major" type="text" class="form-control form-control-sm" placeholder="Major">
                            <?=form_error('major', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Graduate Date</label>
                            <input name="graduateDate" type="date" class="form-control form-control-sm"
                                placeholder="Graduated">
                            <?=form_error('graduateDate', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editAlumni" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Alumni</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ID Alumni</label>
                            <input name="idAlumni" id="idAlumni" type="text" class="form-control form-control-sm"
                                placeholder="ID Alumni">
                            <?=form_error('idAlumni', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Student Name
                            </label>
                            <select id="editStudentList" name="editStudentList">
                                <option data-placeholder="true"></option>
                                <option value="Budi">Budi</option>
                                <option value="Aisyah">Aisyah</option>
                                <option value="Siti">Siti</option>
                            </select>
                            <?=form_error('editStudentList', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>University Name
                            </label>
                            <select id="editUnivName" name="editUnivName">
                                <option data-placeholder="true"></option>

                            </select>
                            <?=form_error('editUnivName', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Major</label>
                            <input name="editMajor" id="editMajor" type="text" class="form-control form-control-sm"
                                placeholder="Major">
                            <?=form_error('editMajor', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Graduate Date</label>
                            <input name="editGraduateDate" type="date" class="form-control form-control-sm"
                                placeholder="Graduated">
                            <?=form_error('editGraduateDate', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
new SlimSelect({
    select: '#studentList',
    placeholder: 'Select student name ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#univName',
    placeholder: 'Select univ name ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var ES = new SlimSelect({
    select: '#editStudentList',
    // placeholder: 'Select student name ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var EU = new SlimSelect({
    select: '#editUnivName',
    // placeholder: 'Select univ name ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

function editAlumni(x) {
    $("#idAlumni").val(x);

    ES.set("Aisyah");
    $("#editMajor").val("Test Major " + x);
}
</script>