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
            <tr>
                <th width="5%" class="text-center">ID Vendor</th>
                <th width="10%" class="text-center">Vendor Name</th>
                <th width="10%" class="text-center">Address</th>
                <th width="5%" class="text-center">Phone</th>
                <th width="5%" class="text-center">Type</th>
                <th width="5%" class="text-center">Material</th>
                <th width="5%" class="text-center">Size</th>
                <th width="5%" class="text-center">Processing Time</th>
                <th width="5%" class="text-center">Unit Price</th>
                <th width="5%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=25;$i++) { ?>
            <tr>
                <td class="text-center">AW</td>
                <td>Encrihment Program</td>
                <td>Academic Writing</td>
                <td>Academic Writing</td>
                <td class="text-center">Academic Writing</td>
                <td class="text-center">B2B/B2C</td>
                <td>Encrihment Program</td>
                <td>Academic Writing</td>
                <td class="text-center">Academic Writing</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal" data-target="#editVendors"
                        onclick="editVendor('<?=$i;?>')"><i class="fas fa-edit"></i></button>
                    <a href="#" class="btn btn-sm btn-danger delete-button" data-message="vendor" title="Delete"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addVendor" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Vendor</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Vendor Name</label>
                            <input name="vendorName" type="text" class="form-control form-control-sm"
                                placeholder="Vendor Name">
                            <?=form_error('vendorName', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control form-control-sm" rows="4"></textarea>
                            <?=form_error('address', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input name="phoneNumber" type="text" class="form-control form-control-sm"
                                placeholder="Phone Number">
                            <?=form_error('phoneNumber', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Type
                            </label>
                            <select id="type" name="type">
                                <option data-placeholder="true"></option>
                                <?php foreach($t as $ty): ?>
                                <option value="<?=$ty;?>"><?=$ty;?></option>
                                <?php endforeach;?>
                            </select>
                            <?=form_error('type', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Material</label>
                            <input name="material" type="text" class="form-control form-control-sm">
                            <?=form_error('material', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Size</label>
                            <input name="size" type="text" class="form-control form-control-sm">
                            <?=form_error('size', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Processing Time</label>
                            <input name="processTime" type="text" class="form-control form-control-sm">
                            <?=form_error('processTime', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Unit Price</label>
                            <input name="unitPrice" type="text" class="form-control form-control-sm">
                            <?=form_error('unitPrice', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fas fa-times-circle"></i>&nbsp; Close</button>
                <button type="button" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editVendors" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Vendor</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Vendor Name</label>
                            <input name="vendorName" type="text" class="form-control form-control-sm"
                                placeholder="Vendor Name" id="vendorName">
                            <?=form_error('vendorName', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control form-control-sm" rows="4"></textarea>
                            <?=form_error('address', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input name="phoneNumber" type="text" class="form-control form-control-sm"
                                placeholder="Phone Number">
                            <?=form_error('phoneNumber', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Type
                            </label>
                            <select id="typeEdit" name="type">
                                <option data-placeholder="true"></option>
                                <?php foreach($t as $ty): ?>
                                <option value="<?=$ty;?>"><?=$ty;?></option>
                                <?php endforeach;?>
                            </select>
                            <?=form_error('type', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Material</label>
                            <input name="material" type="text" class="form-control form-control-sm">
                            <?=form_error('material', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Size</label>
                            <input name="size" type="text" class="form-control form-control-sm">
                            <?=form_error('size', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Processing Time</label>
                            <input name="processTime" type="text" class="form-control form-control-sm">
                            <?=form_error('processTime', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Unit Price</label>
                            <input name="unitPrice" type="text" class="form-control form-control-sm">
                            <?=form_error('unitPrice', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fas fa-times-circle"></i>&nbsp; Close</button>
                <button type="button" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save</button>
            </div>
        </div>
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
    $('#vendorName').val('AW');
    TE.set('Poster');
}
</script>