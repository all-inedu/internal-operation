<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Receipt List
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/receipt/referral');?>">Receipt List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Partner List</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="content">
    <a href="#" class="btn btn-sm btn-success ml-2 add" data-toggle="modal" data-target="#addPartner">
        <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Partner
    </a>
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead class="text-center">
            <tr>
                <th width="1%">No</th>
                <th width="15%" class="bg-primary text-white">Full Name</th>
                <th width="15%">E-mail</th>
                <th width="10%">Phone Number</th>
                <th width="20%">Institutions Name</th>
                <th>Address</th>
                <th width="10%"></th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php $i=1; foreach ($partners as $p): ?>
            <tr>
                <td class="align-middle"><?=$i;?></td>
                <td class="align-middle"><?=$p['pt_name'];?></td>
                <td class="align-middle"><?=$p['pt_email'];?></td>
                <td class="align-middle"><?=$p['pt_phone'];?></td>
                <td class="align-middle"><?=$p['pt_ins'];?></td>
                <td class="align-middle"><?=$p['pt_address'];?></td>
                <td class="align-middle">
                    <button class="btn btn-sm btn-warning" title="Edit" data-toggle="modal" data-target="#editPartner"
                        onclick="editPartner('<?=$p['pt_id'];?>')"><i class="fa fa-edit"></i></button>
                    <a href="<?=base_url('finance/receipt/referral/partner/delete/'.$p['pt_id']);?>" class="btn btn-sm btn-danger delete-button" data-message="partner" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addPartner" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?=base_url('finance/receipt/referral/partner/save');?>" method="post" name="save">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Partner</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name<i class="text-danger font-weight-bold">*</i></label>
                                <input name="pt_name" type="text" class="form-control form-control-sm"
                                    placeholder="Full Name">
                                <?=form_error('pt_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input name="pt_email" type="text" class="form-control form-control-sm"
                                    placeholder="Email Address">
                                <?=form_error('pt_email', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="pt_phone" type="text" class="form-control form-control-sm"
                                    placeholder="Phone Number">
                                <?=form_error('pt_phone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Institutions Name</label>
                                <input name="pt_ins" type="text" class="form-control form-control-sm"
                                    placeholder="Institutions Name">
                                <?=form_error('pt_ins', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address <i class="text-danger font-weight-bold">*</i></label>
                                <textarea name="pt_address" class="form-control form-control-sm" placeholder="Address"
                                    rows="5"></textarea>
                                <?=form_error('pt_address', '<small class="text-danger">', '</small>');?>
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
<div class="modal fade" id="editPartner" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?=base_url('finance/receipt/referral/partner/update');?>" method="post" name="update">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Partner</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name<i class="text-danger font-weight-bold">*</i></label>
                                <input name="pt_id" type="hidden" class="form-control form-control-sm"
                                    placeholder="ID" id="pt_id">
                                <input name="pt_name" type="text" class="form-control form-control-sm"
                                    placeholder="Full Name" id="pt_name">
                                <?=form_error('pt_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input name="pt_email" type="text" class="form-control form-control-sm"
                                    placeholder="Email Address" id="pt_email">
                                <?=form_error('pt_email', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="pt_phone" type="text" class="form-control form-control-sm"
                                    placeholder="Phone Number" id="pt_phone">
                                <?=form_error('pt_phone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Institutions Name</label>
                                <input name="pt_ins" type="text" class="form-control form-control-sm"
                                    placeholder="Institutions Name" id="pt_ins">
                                <?=form_error('pt_ins', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address <i class="text-danger font-weight-bold">*</i></label>
                                <textarea name="pt_address" class="form-control form-control-sm" placeholder="Address"
                                    rows="5" id="pt_address"></textarea>
                                <?=form_error('pt_address', '<small class="text-danger">', '</small>');?>
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
<script src="<?=base_url('assets/js/disable-copas.js');?>"></script>
<script>
function editPartner(x) {
    $.ajax({
        type: 'post',
        url: '<?=base_url("finance/receipt/referral/viewJson/");?>' + x,
        dataType: 'json',
        success: function(data) {
            $('#pt_id').val(data.pt_id);
            $('#pt_name').val(data.pt_name);
            $('#pt_email').val(data.pt_email);
            $('#pt_phone').val(data.pt_phone);
            $('#pt_ins').val(data.pt_ins);
            console.log(data.pt_address)
            CKEDITOR.instances.pt_address.setData(data.pt_address);
        }
    });
}
</script>