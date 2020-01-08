<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Employee Candidate
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Employee Candidate</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="#" class="btn btn-sm btn-success ml-2 add" data-toggle="modal" data-target="#addCandidate">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Candidate
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width="5%" class="text-center">Full Name</th>
                <th width="10%" class="text-center">Position</th>
                <th width="5%" class="text-center">Is Intern ?</th>
                <th width="5%" class="text-center">Interview Date</th>
                <th width="5%" class="text-center">Interview Status</th>
                <th width="5%" class="text-center">Case Study Date</th>
                <th width="5%" class="text-center">Case Study Status</th>
                <th width="10%" class="text-center">Final Decision</th>
                <th width="5%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=4;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center">Budi Setiawan</td>
                <td class="text-center">Business & Development</td>
                <td class="text-center">Yes</td>
                <td class="text-center">03 Feb 2020</td>
                <td class="text-center">Confirmed - Done</td>
                <td class="text-center">15 Feb 2020</td>
                <td class="text-center">Confirmed</td>
                <td class="text-center">Lorem Ipsum</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal" data-target="#editCandidate"
                        onclick="editCandidates('<?=$i;?>')"><i class="fas fa-edit"></i></button>
                    <a href="#" class="btn btn-sm btn-primary convert-button" data-message="convert to employee ?"
                        title="Convert"><i class="fas fa-exchange-alt"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addCandidate" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="add.php" method="post" name="addCandidate">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Candidate</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input name="firstName" type="text" class="form-control form-control-sm"
                                    placeholder="First Name">
                                <?=form_error('firstName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="lastName" type="text" class="form-control form-control-sm"
                                    placeholder="Last Name">
                                <?=form_error('lastName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Position</label>
                                <input name="position" type="text" class="form-control form-control-sm"
                                    placeholder="Position">
                                <?=form_error('position', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Is Intern ?</label>
                                <select id="isIntern" name="isIntern">
                                    <option data-placeholder="true"></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <?=form_error('isIntern', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Interview Date</label>
                                <input name="interviewDate" type="date" class="form-control form-control-sm"
                                    placeholder="">
                                <?=form_error('interviewDate', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Interview Status
                            </label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select id="interviewStatus1" name="interviewStatus1">
                                            <option data-placeholder="true"></option>
                                            <option value="Confirmed">Confirmed</option>
                                            <option value="Not Confirmed">Not Confirmed</option>
                                        </select>
                                        <?=form_error('interviewStatus1', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select id="interviewStatus2" name="interviewStatus2">
                                            <option data-placeholder="true"></option>
                                            <option value="Canceled">Canceled</option>
                                            <option value="Done">Done</option>
                                        </select>
                                        <?=form_error('interviewStatus1', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Case Study Date</label>
                                <input name="interviewDate" type="date" class="form-control form-control-sm"
                                    placeholder="">
                                <?=form_error('interviewDate', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Case Study Status
                            </label>
                            <div class="form-group">
                                <select id="csStatus" name="csStatus">
                                    <option data-placeholder="true"></option>
                                    <option value="Confirmed">Confirmed</option>
                                    <option value="Not Confirmed">Not Confirmed</option>
                                </select>
                                <?=form_error('csStatus', '<small class="text-danger">', '</small>');?>
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

<!-- Edit Modal -->
<div class="modal fade" id="editCandidate" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="edit.php" method="post" name="editCandidate">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Candidate</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input name="firstName" type="text" class="form-control form-control-sm"
                                    placeholder="First Name">
                                <?=form_error('firstName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="lastName" type="text" class="form-control form-control-sm"
                                    placeholder="Last Name">
                                <?=form_error('lastName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Position</label>
                                <input name="position" type="text" class="form-control form-control-sm"
                                    placeholder="Position">
                                <?=form_error('position', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Is Intern ?</label>
                                <select id="isInternEdit" name="isIntern">
                                    <option data-placeholder="true"></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <?=form_error('isIntern', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Interview Date</label>
                                <input name="interviewDate" type="date" class="form-control form-control-sm"
                                    placeholder="">
                                <?=form_error('interviewDate', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Interview Status
                            </label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select id="interviewStatus1Edit" name="interviewStatus1">
                                            <option data-placeholder="true"></option>
                                            <option value="Confirmed">Confirmed</option>
                                            <option value="Not Confirmed">Not Confirmed</option>
                                        </select>
                                        <?=form_error('interviewStatus1', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select id="interviewStatus2Edit" name="interviewStatus2">
                                            <option data-placeholder="true"></option>
                                            <option value="Canceled">Canceled</option>
                                            <option value="Done">Done</option>
                                        </select>
                                        <?=form_error('interviewStatus1', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Case Study Date</label>
                                <input name="interviewDate" type="date" class="form-control form-control-sm"
                                    placeholder="">
                                <?=form_error('interviewDate', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Case Study Status
                            </label>
                            <div class="form-group">
                                <select id="csStatusEdit" name="csStatus">
                                    <option data-placeholder="true"></option>
                                    <option value="Confirmed">Confirmed</option>
                                    <option value="Not Confirmed">Not Confirmed</option>
                                </select>
                                <?=form_error('csStatus', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Final Decision
                            </label>
                            <div class="form-group">
                                <textarea id="decision" name="decision" class="form-control form-control-sm"
                                    rows=5></textarea>
                                <?=form_error('decision', '<small class="text-danger">', '</small>');?>
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
    select: '#isIntern',
    placeholder: 'Select is intern ? ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#interviewStatus1',
    placeholder: 'Select status ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#interviewStatus2',
    placeholder: 'Select status ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#csStatus',
    placeholder: 'Select status ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#isInternEdit',
    placeholder: 'Select is intern ? ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#interviewStatus1Edit',
    placeholder: 'Select status ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#interviewStatus2Edit',
    placeholder: 'Select status ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#csStatusEdit',
    placeholder: 'Select status ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

function editCandidates(x) {
    console.log(x);
}
</script>