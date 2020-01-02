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
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            <a href="<?=base_url('bizdev/corporate/view/');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Corporate Name
                                </label>
                                <input name="corporateName" type="text" class="form-control form-control-sm"
                                    placeholder="Corporate Name">
                                <?=form_error('corporateName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Industry
                                </label>
                                <input name="corporateIndustry" type="text" class="form-control form-control-sm"
                                    placeholder="Corporate Industry">
                                <?=form_error('corporateIndustry', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Corporate Mail
                                </label>
                                <input name="corporateMail" type="text" class="form-control form-control-sm"
                                    placeholder="Corporate Mail">
                                <?=form_error('corporateMail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Office Number
                                </label>
                                <input name="officeNumber" type="text" class="form-control form-control-sm"
                                    placeholder="Office Number">
                                <?=form_error('officeNumber', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Instagram
                                </label>
                                <input name="instagram" type="text" class="form-control form-control-sm"
                                    placeholder="Instagram">
                                <?=form_error('instagram', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Website
                                </label>
                                <input name="corporateSite" type="text" class="form-control form-control-sm"
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
                                <input name="region" type="text" class="form-control form-control-sm"
                                    placeholder="Region">
                                <?=form_error('region', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address
                                </label>
                                <textarea name="address" class="form-control form-control-sm" placeholder="Address"
                                    rows="4"></textarea>
                                <?=form_error('address', '<small class="text-danger">', '</small>');?>
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
                        <label class="font-weight-bold mb-4">Corporate PIC</label>
                        <button class="float-right btn btn-warning" data-toggle="modal" data-target="#addPIC"><i
                                class="fas fa-plus-square"></i>&nbsp; Add PIC</button>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="20%">Full Name</th>
                                        <th class="text-center" width="20%">E-mail</th>
                                        <th class="text-center" width="20%">Linkedin</th>
                                        <th class="text-center" width="20%">Phone Number</th>
                                        <th class="text-center" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">Full Name</td>
                                        <td class="text-center">E-mail</td>
                                        <td class="text-center">Linkedin</td>
                                        <td class="text-center">Phone Number</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal"
                                                data-target="#editPIC" onclick="editPIC('1')"><i
                                                    class="fas fa-edit"></i></button>
                                            <a href="#" class="btn btn-sm btn-danger delete-button"
                                                data-message="Corporate PIC" title="Delete"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
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

<!-- Add Modal -->
<div class="modal fade" id="addPIC" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="addPIC" method="post" id="addPIC">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add PIC</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>PIC Name</label>
                                <input name="picName" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Name">
                                <?=form_error('picName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input name="picEmail" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Mail">
                                <?=form_error('picEmail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Linkedin</label>
                                <input name="picLinkedin" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Linkedin">
                                <?=form_error('picLinkedin', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="picPhoneNumber" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Phone Number">
                                <?=form_error('picPhoneNumber', '<small class="text-danger">', '</small>');?>
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
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editPIC" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="addPIC" method="post" id="addPIC">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit PIC</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>PIC Name</label>
                                <input id="picName" name="picName" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Name">
                                <?=form_error('picName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input name="picEmail" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Mail">
                                <?=form_error('picEmail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Linkedin</label>
                                <input name="picLinkedin" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Linkedin">
                                <?=form_error('picLinkedin', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="picPhoneNumber" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Phone Number">
                                <?=form_error('picPhoneNumber', '<small class="text-danger">', '</small>');?>
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

function editPIC(x) {
    console.log(x);
    $("#picName").val('Theresyia');
}
</script>