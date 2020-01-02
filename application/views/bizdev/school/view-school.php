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
        <div class="card shadow card-sticky">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/school.png');?>" alt="client management" width="100%">
                    <h5 class="mt-3">School Name</h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-info">
                        <p><i class="fas fa-envelope text-danger"></i>&nbsp; student@gmail.com <br>
                            <i class="fas fa-phone text-danger"></i>&nbsp; 081231232xxx &nbsp; | &nbsp;
                            <i class="fab fa-instagram text-danger"></i>&nbsp; @student</p>
                    </div>
                    <a href="<?=base_url('bizdev/school/edit');?>" class="btn btn-sm btn-info m-1"><i
                            class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                    <a href="#" class="btn btn-sm btn-success m-1" data-toggle="modal"
                        data-target="#convertPotential"><i class="fas fa-retweet"></i>&nbsp;
                        Convert</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; School
                    <div class="float-right">
                        <a href="<?=base_url('bizdev/school/');?>" class="btn btn-sm btn-info"><i
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
                                placeholder="School Name" disabled>
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

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>School Mail
                            </label>
                            <input name="schoolMail" type="text" class="form-control form-control-sm"
                                placeholder="School Mail" disabled>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Telephone
                            </label>
                            <input name="telephone" type="text" class="form-control form-control-sm"
                                placeholder="Telephone" disabled>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>City
                            </label>
                            <input name="city" type="text" class="form-control form-control-sm" placeholder="City"
                                disabled>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Location
                            </label>
                            <textarea name="location" class="form-control form-control-sm" placeholder="Location"
                                rows="4" disabled></textarea>

                        </div>
                    </div>


                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="font-weight-bold">Teacher Contact Person</label>
                    </div>
                    <div class="container" id="teacher">
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">Full Name</td>
                                                <td class="text-center">E-mail</td>
                                                <td class="text-center">Linkedin</td>
                                                <td class="text-center">Phone Number</td>
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


<div class="modal fade" id="convertPotential" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable" role="document">
        <form action="convertPotential" method="post" id="convert">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Convert to Potential</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Program Name
                                </label>
                                <select id="programName" name="programName">
                                    <option data-placeholder="true"></option>
                                    <option value="1">Admission Advisory</option>
                                    <option value="2">SAT Prep</option>
                                    <option value="3">ACT Prep</option>
                                    <option value="4">Experiential Learning</option>
                                </select>
                                <?=form_error('programName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Discuss</label>
                                <input name="firstDiscuss" type="date" class="form-control form-control-sm"
                                    placeholder="First Discuss">
                                <?=form_error('firstDiscuss', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Discuss</label>
                                <input name="lastDiscuss" type="date" class="form-control form-control-sm"
                                    placeholder="Last Discuss" disabled>
                                <?=form_error('lastDiscuss', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes</label>
                                <textarea name="notes" class="form-control form-control-sm" rows="5"></textarea>
                                <?=form_error('notes', '<small class="text-danger">', '</small>');?>
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

var SL = new SlimSelect({
    select: '#schoolLevel',
    placeholder: 'Select school level',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
SL.disable();

var SC = new SlimSelect({
    select: '#schoolCurriculum',
    placeholder: 'Select school curriculum',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
SC.disable();

var IF = new SlimSelect({
    select: '#isFriendly',
    placeholder: 'Select is friendly',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
IF.disable();

var PN = new SlimSelect({
    select: '#programName',
    placeholder: 'Select program name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
</script>