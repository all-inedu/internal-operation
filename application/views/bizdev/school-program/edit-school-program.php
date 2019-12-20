<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Schools Program
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/school-program/');?>">School Program</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">View</li>
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

                    <!-- Status Success -->
                    <span class="badge badge-pill badge-success mt-3 p-1" data-toggle="tooltip" data-placement="top"
                        title="Success">
                        <i class="fas fa-check fa-2x"></i>
                    </span>

                    <!-- Status Pending -->
                    <span class="badge badge-pill badge-primary mt-3 p-1 text-white" data-toggle="tooltip"
                        data-placement="top" title="Pending">
                        <i class="fas fa-clock fa-2x"></i>
                    </span>

                    <!-- Status Denied -->
                    <span class="badge badge-pill badge-danger mt-3 p-1 text-white" data-toggle="tooltip"
                        data-placement="top" title="Denied">
                        <i class="fas fa-frown-open fa-2x"></i>
                    </span>


                    <h5 class="align-middle mt-2">
                        School Name</h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
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
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Schools Program
                    <div class="float-right">
                        <a href="<?=base_url('bizdev/school/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="test.php" method="post" id="editSchoolProg">
                    <div class="row">
                        <div class="col-md-3">
                            <label><i class="fas fa-tag text-muted"></i>&nbsp; Program Name :</label>
                        </div>
                        <div class="col-md-9 mb-2">
                            <label>Admission Consultant</label>
                        </div>

                        <div class="col-md-3">
                            <label><i class="fas fa-calendar-alt text-muted"></i>&nbsp; First Discuss :</label>
                        </div>
                        <div class="col-md-9 mb-2">
                            <label>Admission Consultant</label>
                        </div>

                        <div class="col-md-3">
                            <label><i class="fas fa-calendar text-muted"></i>&nbsp; Last Discuss :</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <small>Date</small>
                                    <input name="lastDiscuss" type="date" class="form-control form-control-sm"
                                        placeholder="Last Discuss">
                                    <?=form_error('lastDiscuss', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-3">
                                    <small>Status</small>
                                    <select name="programStatus" id="programStatus" onchange="programSuccess()">
                                        <option value="Pending">Pending</option>
                                        <option value="Success">Success</option>
                                        <option value="Denied">Denied</option>
                                    </select>
                                    <?=form_error('lastDiscuss', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label><i class="far fa-sticky-note text-muted"></i>&nbsp; Notes :</label>
                        </div>
                        <div class="col-md-9 mb-2">
                            <textarea name="notes" class="form-control form-control-sm" rows="5"></textarea>
                            <?=form_error('notes', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-3"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save
                                changes</button>
                            <button type="button" class="btn btn-sm btn-info" id="programExec" data-toggle="modal"
                                data-target="#addProg"><i class="fas fa-plus"></i> Add Program
                                Execution</button>
                        </div>
                    </div>
                </form>

                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="font-weight-bold">Program Execution</label>
                        <a href="" class="btn btn-sm btn-warning float-right mb-2"><i
                                class="fas fa-pencil-alt"></i>&nbsp;
                            Edit</a>
                    </div>
                    <div class="container" id="teacher">
                        <div class="row p-0">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Start Date</th>
                                                <th class="text-center">End Date</th>
                                                <th class="text-center">Place</th>
                                                <th class="text-center">Participans</th>
                                                <th class="text-center">Total Hours</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">Full Name</td>
                                                <td class="text-center">E-mail</td>
                                                <td class="text-center">Linkedin</td>
                                                <td class="text-center">Phone Number</td>
                                                <td class="text-center">Principal</td>
                                                <td class="text-center">Principal</td>
                                                <td class="text-center">Principal</td>
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
<div class="modal fade" id="addProg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="addTeacher" method="post" id="addTeacher">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Program Execution</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input name="startDate" type="date" class="form-control form-control-sm">
                                <?=form_error('startDate', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End Date</label>
                                <input name="endDate" type="date" class="form-control form-control-sm">
                                <?=form_error('endDate', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Place</label>
                                <input name="place" type="text" class="form-control form-control-sm"
                                    placeholder="Place">
                                <?=form_error('place', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Participans</label>
                                <input name="participans" type="number" class="form-control form-control-sm">
                                <?=form_error('participans', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Total Hours</label>
                                <input name="totalHours" type="number" class="form-control form-control-sm">
                                <?=form_error('totalHours', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status Potential</label>
                                <select type="text" name="statusPotential" class="form-control form-control-sm">
                                    <option value="Running">Running</option>
                                    <option value="Not Running">Not Running</option>
                                </select>
                                <?=form_error('statusPotential', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes</label>
                                <textarea type="text" name="notes" class="form-control form-control-sm"
                                    rows="5"></textarea>
                                <?=form_error('notes', '<small class="text-danger">', '</small>');?>
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
var PS = new SlimSelect({
    select: '#programStatus',
    placeholder: 'Select program status ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
// PS.set('Success')

$("#programExec").show();

function programSuccess() {
    var PE = $("#programStatus").val();
    if (PE == "Success") {
        $("#programExec").show();
    } else {
        $("#programExec").hide();
    }
}
</script>