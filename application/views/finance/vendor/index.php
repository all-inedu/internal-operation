<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Vendor
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vendor</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="#" class="btn btn-sm btn-success ml-2 add" data-toggle="modal" data-target="#addVendor">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Vendor
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr class="text-center">
                <th width="3%">#</th>
                <th width="5%">ID Vendor</th>
                <th width="10%">Vendor Name</th>
                <th width="10%">Address</th>
                <th width="5%">Phone</th>
                <th width="5%">Type</th>
                <th width="5%">Material</th>
                <th width="5%">Size</th>
                <th width="5%">Processing Time</th>
                <th width="5%">Unit Price</th>
                <th width="5%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($vendor as $v): ?>
            <tr class="text-center">
                <td><?=$i;?></td>
                <td><?=$v['vendor_id'];?></td>
                <td><?=$v['vendor_name'];?></td>
                <td><?=$v['vendor_address'];?></td>
                <td><?=$v['vendor_phone'];?></td>
                <td><?=$v['vendor_type'];?></td>
                <td><?=$v['vendor_material'];?></td>
                <td><?=$v['vendor_size'];?></td>
                <td><?=$v['vendor_processingtime'];?></td>
                <td>Rp. <?= number_format($v['vendor_unitprice']);?></td>
                <td>
                    <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal" data-target="#editVendors"
                        onclick="editVendor('<?=$v['vendor_id'];?>')"><i class="fas fa-edit"></i></button>
                    <a href="<?=base_url('finance/vendor/delete/'.$v['vendor_id']);?>"
                        class="btn btn-sm btn-danger delete-button" data-message="vendor" title="Delete"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addVendor" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="save" method="post" name="save">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Vendor</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Vendor Name <i class="text-danger font-weight-bold">*</i></label>
                                <input name="vendor_name" type="text" class="form-control form-control-sm"
                                    placeholder="Vendor Name">
                                <?=form_error('vendor_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="vendor_address" class="form-control form-control-sm"
                                    rows="2"></textarea>
                                <?=form_error('vendor_address', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="vendor_phone" type="text" class="form-control form-control-sm"
                                    placeholder="Phone Number">
                                <?=form_error('vendor_phone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type
                                </label>
                                <select id="type" name="vendor_type">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($t as $ty): ?>
                                    <option value="<?=$ty;?>"><?=$ty;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('vendor_type', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Material</label>
                                <input name="vendor_material" type="text" class="form-control form-control-sm">
                                <?=form_error('vendor_material', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Size</label>
                                <input name="vendor_size" type="text" class="form-control form-control-sm">
                                <?=form_error('vendor_size', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Processing Time</label>
                                <input name="vendor_processingtime" type="text" class="form-control form-control-sm">
                                <?=form_error('vendor_processingtime', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unit Price</label>
                                <input name="vendor_unitprice" type="text" class="form-control form-control-sm">
                                <?=form_error('vendor_unitprice', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes</label>
                                <textarea name="vendor_notes" class="form-control form-control-sm" rows="2"></textarea>
                                <?=form_error('vendor_notes', '<small class="text-danger">', '</small>');?>
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
<div class="modal fade" id="editVendors" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="update" method="post" name="update">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Vendor
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Vendor Name <i class="text-danger font-weight-bold">*</i></label>
                                <input name="vendor_id" type="hidden" id="vendor_id">
                                <input name="vendor_name" type="text" class="form-control form-control-sm"
                                    placeholder="Vendor Name" id="vendor_name">
                                <?=form_error('vendor_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="vendor_address" id="vendor_address" class="form-control form-control-sm"
                                    rows="2"></textarea>
                                <?=form_error('vendor_address', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="vendor_phone" id="vendor_phone" type="text"
                                    class="form-control form-control-sm" placeholder="Phone Number">
                                <?=form_error('vendor_phone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type
                                </label>
                                <select id="typeEdit" name="vendor_type">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($t as $ty): ?>
                                    <option value="<?=$ty;?>"><?=$ty;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('vendor_type', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Material</label>
                                <input name="vendor_material" id="vendor_material" type="text"
                                    class="form-control form-control-sm">
                                <?=form_error('vendor_material', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Size</label>
                                <input name="vendor_size" id="vendor_size" type="text"
                                    class="form-control form-control-sm">
                                <?=form_error('vendor_size', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Processing Time</label>
                                <input name="vendor_processingtime" id="vendor_processingtime" type="text"
                                    class="form-control form-control-sm">
                                <?=form_error('vendor_processingtime', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unit Price</label>
                                <input name="vendor_unitprice" id="vendor_unitprice" type="text"
                                    class="form-control form-control-sm">
                                <?=form_error('vendor_unitprice', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes</label>
                                <textarea name="vendor_notes" id="vendor_notes" class="form-control form-control-sm"
                                    rows="2"></textarea>
                                <?=form_error('vendor_notes', '<small class="text-danger">', '</small>');?>
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
    select: '#type',
    placeholder: 'Select asset merk ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});



var TE = new SlimSelect({
    select: '#typeEdit',
    placeholder: 'Select asset merk ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

function editVendor(x) {
    console.log(x);
    $.ajax({
        type: 'post',
        url: '<?=base_url("finance/vendor/view/");?>' + x,
        dataType: 'json',
        success: function(data) {
            // console.log(data)
            $('#vendor').html(data.vendor_id);
            $('#vendor_id').val(data.vendor_id);
            $('#vendor_name').val(data.vendor_name);
            // $('textarea#vendor_address').val(data.vendor_address);
            CKEDITOR.instances.vendor_address.setData(data.vendor_address);
            $('#vendor_phone').val(data.vendor_phone);
            TE.set(data.vendor_type);
            $('#vendor_material').val(data.vendor_material);
            $('#vendor_size').val(data.vendor_size);
            $('#vendor_processingtime').val(data.vendor_processingtime);
            $('#vendor_unitprice').val(data.vendor_unitprice);
            // $('#vendor_notes').val(data.vendor_notes);
            CKEDITOR.instances.vendor_notes.setData(data.vendor_notes);
        }
    });
}
</script>