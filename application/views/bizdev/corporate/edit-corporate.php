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
                    <img src="<?=base_url('assets/img/corporate.png');?>" alt="client management" width="50%"
                        class="mb-2">
                    <h5><?=$corp['corp_name'];?></h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-info mb-2">
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$corp['corp_mail'];?> <br>
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$corp['corp_phone'];?> &nbsp; | &nbsp;
                        <i class="fab fa-instagram text-danger"></i>&nbsp; <?=$corp['corp_insta'];?></p>
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
                            <a href="<?=base_url('bizdev/corporate/view/'.$corp['corp_id']);?>"
                                class="btn btn-sm btn-info"><i class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Corporate Name
                                </label>
                                <input name="corp_id" type="hidden" value="<?=$corp['corp_id'];?>">
                                <input name="corp_name" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_name'];?>">
                                <?=form_error('corp_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Industry
                                </label>
                                <input name="corp_industry" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_industry'];?>">
                                <?=form_error('corp_industry', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Corporate Mail
                                </label>
                                <input name="corp_mail" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_mail'];?>">
                                <?=form_error('corp_mail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Office Number
                                </label>
                                <input name="corp_phone" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_phone'];?>">
                                <?=form_error('corp_phone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Instagram
                                </label>
                                <input name="corp_insta" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_insta'];?>">
                                <?=form_error('corp_insta', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Website
                                </label>
                                <input name="corp_site" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_site'];?>">
                                <?=form_error('corp_site', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Region
                                </label>
                                <input name="corp_region" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_region'];?>">
                                <?=form_error('corp_region', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address
                                </label>
                                <textarea name="corp_address" class="form-control form-control-sm"
                                    rows="4"><?=$corp['corp_address'];?></textarea>
                                <?=form_error('corp_address', '<small class="text-danger">', '</small>');?>
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
                                <thead class="bg-dark text-white">
                                    <tr class="text-center">
                                        <th width="20%">Full Name</th>
                                        <th width="20%">E-mail</th>
                                        <th width="20%">Linkedin</th>
                                        <th width="20%">Phone Number</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($detail as $d): ?>
                                    <tr class="text-center">
                                        <td><?=$d['corpdetail_fullname'];?></td>
                                        <td><?=$d['corpdetail_mail'];?></td>
                                        <td><?=$d['corpdetail_linkedin'];?></td>
                                        <td><?=$d['corpdetail_phone'];?></td>
                                        <td>
                                            <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal"
                                                data-target="#editPIC" onclick="editPIC('<?=$d['corpdetail_id'];?>')"><i
                                                    class="fas fa-edit"></i></button>
                                            <a href="<?=base_url('bizdev/corporate/deleteDetail/'.$d['corpdetail_id'].'/'.$d['corp_id']);?>"
                                                class="btn btn-sm btn-danger delete-button" data-message="Corporate PIC"
                                                title="Delete"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
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
        <form action="<?=base_url('bizdev/corporate/saveDetail');?>" method="post" name="addPIC">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add PIC</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>PIC Name</label>
                                <input name="corp_id" type="hidden" value="<?=$corp['corp_id'];?>">
                                <input name="corpdetail_fullname" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Name">
                                <?=form_error('corpdetail_fullname', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input name="corpdetail_mail" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Mail">
                                <?=form_error('corpdetail_mail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Linkedin</label>
                                <input name="corpdetail_linkedin" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Linkedin">
                                <?=form_error('corpdetail_linkedin', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="corpdetail_phone" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Phone Number">
                                <?=form_error('corpdetail_phone', '<small class="text-danger">', '</small>');?>
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
<div class="modal fade" id="editPIC" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="<?=base_url('bizdev/corporate/updateDetail');?>" method="post" name="updatePIC">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit PIC</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>PIC Name</label>
                                <input name="corp_id" type="hidden" value="<?=$corp['corp_id'];?>">
                                <input id="corpdetail_id" name="corpdetail_id" type="hidden">
                                <input id="corpdetail_fullname" name="corpdetail_fullname" type="text"
                                    class="form-control form-control-sm" placeholder="PIC Name">
                                <?=form_error('corpdetail_fullname', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input id="corpdetail_mail" name="corpdetail_mail" type="text"
                                    class="form-control form-control-sm" placeholder="PIC Mail">
                                <?=form_error('corpdetail_mail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Linkedin</label>
                                <input id="corpdetail_linkedin" name="corpdetail_linkedin" type="text"
                                    class="form-control form-control-sm" placeholder="PIC Linkedin">
                                <?=form_error('corpdetail_linkedin', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input id="corpdetail_phone" name="corpdetail_phone" type="text"
                                    class="form-control form-control-sm" placeholder="PIC Phone Number">
                                <?=form_error('corpdetail_phone', '<small class="text-danger">', '</small>');?>
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
function editPIC(x) {
    $.ajax({
        type: 'post',
        url: '<?=base_url("bizdev/corporate/showDetailId/");?>' + x,
        dataType: 'json',
        success: function(data) {
            $('#corpdetail_id').val(data.corpdetail_id);
            $('#corpdetail_fullname').val(data.corpdetail_fullname);
            $('#corpdetail_mail').val(data.corpdetail_mail);
            $('#corpdetail_linkedin').val(data.corpdetail_linkedin);
            $('#corpdetail_phone').val(data.corpdetail_phone);
        }
    });
}
</script>