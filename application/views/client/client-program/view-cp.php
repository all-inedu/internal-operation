<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Student's Program
                </div>
            </nav>
        </div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Profile</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">View</li>
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
                    <img src="<?=base_url('assets/img/student-prog.png');?>" alt="client management" width="70%">
                    <h6 class="mt-3">Student Name</h6>
                    <hr style="width:20%; margin-bottom:5px; margin-top:5px;">
                    <div class="text-info">
                        <p>Program Name : <br>
                            <b>Admission Consulting</b>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addInitial">Add Initial
                        Assessment</a>
                    <!-- <a href="" class="btn btn-sm btn-warning">Edit Initial Assessment</a> -->
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <span class="text-muted"><i class="text-danger font font-weight-bold">*</i> Initial Assessment for
                        Admission
                        Program</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6 class="align-middle"><i class="fas fa-user"></i>&nbsp; &nbsp; Student's Program
                    <div class="float-right">
                        <a href="<?=base_url('client/client-program/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="./editStudentsProgram" method="post" id="editSP">
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-calendar-alt"></i>&nbsp; &nbsp; Date :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <small>First Discuss</small>
                                    <input name="prFName" type="date" placeholder="First Discuss"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Last Discuss</small>
                                    <input name="prLName" type="date" placeholder="Last Discuss"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-sticky-note"></i>&nbsp; &nbsp; Notes :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <textarea name="prEmail" placeholder="Notes" class="form-control form-control-sm"
                                        rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-calendar-check"></i>&nbsp; &nbsp; Meeting Date :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <input name="prPhone" type="date" placeholder="Phone Number"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-clipboard"></i>&nbsp; &nbsp; Meeting Notes :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <textarea name="prEmail" placeholder="Notes" class="form-control form-control-sm"
                                        rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-hourglass-half"></i>&nbsp; &nbsp; Potential :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <small>Status</small>
                                    <select id="stPotential" name="stPotential" onchange="addProgramStatus()">
                                        <option data-placeholder="true"></option>
                                        <option value="Pending">Pending</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Success">Success</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Date</small>
                                    <input type="date" name="stPotentialDate" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-hourglass"></i>&nbsp; &nbsp; Program Status :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <select id="stProgram" name="stProgram">
                                        <option value="Not Yet">Not Yet</option>
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Done">Done</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-user-plus"></i>&nbsp; &nbsp; Mentor Name :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <small>Main Mentor</small>
                                    <select id="mainMentor" name="mainMentor">
                                        <option value="Devi Kasih">Devi Kasih</option>
                                        <option value="Nicholas S">Nicholas S</option>
                                        <option value="Paul Edison">Paul Edison</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Backup Mentor</small>
                                    <select id="backupMentor" name="backupMentor">
                                        <option value="Devi Kasih">Devi Kasih</option>
                                        <option value="Nicholas S">Nicholas S</option>
                                        <option value="Paul Edison">Paul Edison</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-save"></i>&nbsp; Save
                            changes</button>
                    </div>
                </form>

                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="text-primary">Initial Assessment :</div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th width="5%" class="text-center">Initial Consultation Date</th>
                            <th width="5%" class="text-center">Initial Assessment Date</th>
                            <th width="5%" class="text-center">Final Date</th>
                            <th width="5%" class="text-center">Type</th>
                            <th width="5%" class="text-center">Action</th>
                        </thead>
                        <tbody>
                            <td class="text-center align-middle">05 Des 2019</td>
                            <td class="text-center align-middle">12 Des 2019</td>
                            <td class="text-center align-middle">-</td>
                            <td class="text-center align-middle">Short</td>
                            <td class="text-center"><a href="#" data-toggle="modal" data-target="#editInitial"
                                    class="btn btn-sm btn-warning">Edit</a></td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addInitial" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="./addInitialAssessment" method="post" id="addInitial">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Initial Assessment</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Program Name</label>
                                <input name="programName" type="text" class="form-control form-control-sm"
                                    placeholder="Program Name">
                                <?=form_error('programName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Initial Consultation Date</label>
                                <input name="programName" type="date" class="form-control form-control-sm"
                                    placeholder="Program Name">
                                <?=form_error('programName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Initial Assessment Date</label>
                                <input name="programName" type="date" class="form-control form-control-sm"
                                    placeholder="Program Name">
                                <?=form_error('programName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Final Initial Assessment Date</label>
                                <input name="programName" type="date" class="form-control form-control-sm"
                                    placeholder="Program Name">
                                <?=form_error('programName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Initial Assessment Type</label>
                                <select name="initType" id="initType">
                                    <option data-placeholder="true"></option>
                                    <option value="1">Short</option>
                                    <option value="2">Long</option>
                                </select>
                                <?=form_error('initType', '<small class="text-danger">', '</small>');?>
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

<!-- Edit Modal -->
<div class="modal fade" id="editInitial" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="./editInitialAssessment" method="post" id="editInitial">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Initial Assessment</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Program Name</label>
                                <input name="programName" type="text" class="form-control form-control-sm"
                                    placeholder="Program Name">
                                <?=form_error('programName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Initial Consultation Date</label>
                                <input name="programName" type="date" class="form-control form-control-sm"
                                    placeholder="Program Name">
                                <?=form_error('programName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Initial Assessment Date</label>
                                <input name="programName" type="date" class="form-control form-control-sm"
                                    placeholder="Program Name">
                                <?=form_error('programName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Final Initial Assessment Date</label>
                                <input name="programName" type="date" class="form-control form-control-sm"
                                    placeholder="Program Name">
                                <?=form_error('programName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Initial Assessment Type</label>
                                <select name="editInitType" id="editInitType">
                                    <option data-placeholder="true"></option>
                                    <option value="1">Short</option>
                                    <option value="2">Long</option>
                                </select>
                                <?=form_error('initType', '<small class="text-danger">', '</small>');?>
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
new SlimSelect({
    select: '#stPotential',
    placeholder: 'Select potential status',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var stProgram = new SlimSelect({
    select: '#stProgram',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
stProgram.disable();

var MM = new SlimSelect({
    select: '#mainMentor',
    placeholder: 'Select main mentor',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
MM.disable();
MM.set("");

var BM = new SlimSelect({
    select: '#backupMentor',
    placeholder: 'Select main mentor',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
BM.disable();
BM.set("");

new SlimSelect({
    select: '#initType',
    placeholder: 'Select initial assessment type',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#editInitType',
    placeholder: 'Select initial assessment type',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});



function addProgramStatus() {
    var st = $("#stPotential").val();
    if (st == "Success") {
        stProgram.enable();
        MM.enable();
        BM.enable();
    } else {
        stProgram.disable();
        stProgram.set("Not Yet");
        MM.set("");
        BM.set("");
        MM.disable();
        BM.disable();
    }
}
</script>