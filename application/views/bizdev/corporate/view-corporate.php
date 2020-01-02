<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Corporate
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/corporate/');?>">Corporate</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                    <img src="<?=base_url('assets/img/corporate.png');?>" alt="client management" width="80%">
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <h5>Corporate Name</h5>
                    <div class="text-info">
                        <p><i class="fas fa-envelope text-danger"></i>&nbsp; student@gmail.com <br>
                            <i class="fas fa-phone text-danger"></i>&nbsp; 081231232xxx &nbsp; | &nbsp;
                            <i class="fab fa-instagram text-danger"></i>&nbsp; @student</p>
                    </div>
                    <a href="<?=base_url('bizdev/corporate/edit/');?>" class="btn btn-sm btn-info"><i
                            class="fas fa-pencil-alt"></i>&nbsp; Edit</a>

                    <a href="#" class="btn btn-sm btn-success m-1" data-toggle="modal"
                        data-target="#convertPotential"><i class="fas fa-retweet"></i>&nbsp;
                        Convert</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post">
                    <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Corporate
                        <div class="float-right">
                            <a href="<?=base_url('bizdev/corporate/');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Corporate Name
                                </label>
                                <input disabled name="corporateName" type="text" class="form-control form-control-sm"
                                    placeholder="Corporate Name">
                                <?=form_error('corporateName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Industry
                                </label>
                                <input disabled name="corporateIndustry" type="text"
                                    class="form-control form-control-sm" placeholder="Corporate Industry">
                                <?=form_error('corporateIndustry', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Corporate Mail
                                </label>
                                <input disabled name="corporateMail" type="text" class="form-control form-control-sm"
                                    placeholder="Corporate Mail">
                                <?=form_error('corporateMail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Office Number
                                </label>
                                <input disabled name="officeNumber" type="text" class="form-control form-control-sm"
                                    placeholder="Office Number">
                                <?=form_error('officeNumber', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Instagram
                                </label>
                                <input disabled name="instagram" type="text" class="form-control form-control-sm"
                                    placeholder="Instagram">
                                <?=form_error('instagram', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Website
                                </label>
                                <input disabled name="corporateSite" type="text" class="form-control form-control-sm"
                                    placeholder="Website">
                                <?=form_error('corporateSite', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Approach Status
                                </label>
                                <select name="approachStatus" id="approachStatus">
                                    <option data-placeholder="true"></option>
                                    <option value="Approach">Approach</option>
                                    <option value="Not Yet">Not Yet</option>
                                </select>
                                <?=form_error('approachStatus', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Region
                                </label>
                                <input disabled name="region" type="text" class="form-control form-control-sm"
                                    placeholder="Region">
                                <?=form_error('region', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address
                                </label>
                                <textarea disabled name="address" class="form-control form-control-sm"
                                    placeholder="Address" rows="4"></textarea>
                                <?=form_error('address', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>


                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Corporate PIC</label>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Full Name</th>
                                            <th class="text-center">E-mail</th>
                                            <th class="text-center">Linkedin</th>
                                            <th class="text-center">Phone Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">Full Name</td>
                                            <td class="text-center">E-mail</td>
                                            <td class="text-center">Linkedin</td>
                                            <td class="text-center">Phone Number</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
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
                        <div class="col-md-6">
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
                                <label>Is Corporate Scheme ?</label>
                                <select id="corporateType" name="corporateType">
                                    <option data-placeholder="true"></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                                <?=form_error('corporateType', '<small class="text-danger">', '</small>');?>
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
var AS = new SlimSelect({
    select: '#approachStatus',
    placeholder: 'Select approach status',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
AS.disable();

var PN = new SlimSelect({
    select: '#programName',
    placeholder: 'Select program name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var CT = new SlimSelect({
    select: '#corporateType',
    placeholder: 'Select corporate type',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
</script>