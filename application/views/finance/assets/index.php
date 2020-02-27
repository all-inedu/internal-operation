<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Assets
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Assets</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="#" class="btn btn-sm btn-success ml-2 add" data-toggle="modal" data-target="#addAsset">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Asset
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="3%" class="text-center">#</th>
                <th width="5%" class="text-center">Asset ID</th>
                <th width="10%" class="text-center">Asset Name</th>
                <th width="10%" class="text-center">Merk/Type</th>
                <th width="5%" class="text-center">Achieved Date</th>
                <th width="5%" class="text-center">Amount</th>
                <th width="5%" class="text-center">Unit(s)</th>
                <th width="5%" class="text-center">Condition</th>
                <th width="5%" class="text-center">Status</th>
                <th width="5%" class="text-center">Last Update</th>
                <th width="5%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($asset as $data): ?>
            <tr class="text-center">
                <td><?=$i;?></td>
                <td><?=$data['asset_id'];?></td>
                <td><?=$data['asset_name'];?></td>
                <td><?=$data['asset_merktype'];?></td>
                <td><?=date('d M Y', strtotime($data['asset_dateachieved']));?></td>
                <td><?=$data['asset_amount'];?></td>
                <td><?=$data['asset_unit'];?></td>
                <td><?=$data['asset_condition'];?></td>
                <td><?=$data['asset_status'];?></td>
                <td><?=date('d M Y', strtotime($data['asset_lastupdatedate']));?></td>
                <td>
                    <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal" data-target="#editAsset"
                        onclick="editAssets('<?=$data['asset_id'];?>')"><i class="fas fa-edit"></i></button>
                    <a href="<?=base_url('finance/assets/delete/'.$data['asset_id']);?>"
                        class="btn btn-sm btn-danger delete-button" data-message="asset" title="Delete"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php $i++; endforeach;  ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addAsset" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="save" method="post" name="save">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Asset</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Asset Name</label>
                                <input name="asset_name" type="text" class="form-control form-control-sm"
                                    placeholder="Asset Name">
                                <?=form_error('asset_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Asset Merk/Type
                                </label>
                                <select id="assetMerk" name="asset_merktype">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($m as $mr): ?>
                                    <option value="<?=$mr;?>"><?=$mr;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('asset_merktype', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Archieved Date</label>
                                <input name="asset_dateachieved" type="date" class="form-control form-control-sm"
                                    placeholder="Achieved Date">
                                <?=form_error('asset_dateachieved', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Amount</label>
                                <input name="asset_amount" type="number" class="form-control form-control-sm"
                                    placeholder="0">
                                <?=form_error('asset_amount', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Unit(s)</label>
                                <input name="asset_unit" type="text" class="form-control form-control-sm"
                                    placeholder="Unit(s)">
                                <?=form_error('asset_unit', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Condition
                                </label>
                                <select id="condition" name="asset_condition">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($c as $cd): ?>
                                    <option value="<?=$cd;?>"><?=$cd;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('asset_condition', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status
                                </label>
                                <select id="status" name="asset_status">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($s as $st): ?>
                                    <option value="<?=$st;?>"><?=$st;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('asset_status', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes
                                </label>
                                <textarea name="asset_notes" id="asset_notes" rows="3"
                                    class="form-control form-control-sm"></textarea>
                                <?=form_error('asset_notes', '<small class="text-danger">', '</small>');?>
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
<div class="modal fade" id="editAsset" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="update" method="post" name="update">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Asset
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Asset Name</label>
                                <input name="asset_id" type="hidden" class="form-control form-control-sm" id="asset_id">
                                <input name="asset_name" type="text" class="form-control form-control-sm"
                                    placeholder="Asset Name" id="asset_name">
                                <?=form_error('asset_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Asset Merk/Type
                                </label>
                                <select id="assetMerkEdit" name="asset_merktype">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($m as $mr): ?>
                                    <option value="<?=$mr;?>"><?=$mr;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('asset_merktype', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Achieved Date</label>
                                <input name="asset_dateachieved" type="date" class="form-control form-control-sm"
                                    placeholder="Archieved Date" id="asset_dateachieved">
                                <?=form_error('asset_dateachieved', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Amount</label>
                                <input name="asset_amount" type="number" class="form-control form-control-sm"
                                    placeholder="0" id="asset_amount">
                                <?=form_error('asset_amount', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Unit(s)</label>
                                <input name="asset_unit" type="text" class="form-control form-control-sm"
                                    placeholder="Unit(s)" id="asset_unit">
                                <?=form_error('asset_unit', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Condition
                                </label>
                                <select id="conditionEdit" name="asset_condition">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($c as $cd): ?>
                                    <option value="<?=$cd;?>"><?=$cd;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('asset_condition', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status
                                </label>
                                <select id="statusEdit" name="asset_status">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($s as $st): ?>
                                    <option value="<?=$st;?>"><?=$st;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('asset_status', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes
                                </label>
                                <textarea name="asset_notes" id="asset_notes" rows="3"
                                    class="form-control form-control-sm"></textarea>
                                <?=form_error('asset_notes', '<small class="text-danger">', '</small>');?>
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
    select: '#assetMerk',
    placeholder: 'Select asset merk ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#condition',
    placeholder: 'Select type program ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#status',
    // placeholder: 'Select main program ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var AM = new SlimSelect({
    select: '#assetMerkEdit',
    placeholder: 'Select asset merk ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var CD = new SlimSelect({
    select: '#conditionEdit',
    placeholder: 'Select type program ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var ST = new SlimSelect({
    select: '#statusEdit',
    // placeholder: 'Select main program ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});



function editAssets(x) {
    // console.log(x);
    $.ajax({
        type: 'post',
        url: '<?=base_url("finance/assets/view/");?>' + x,
        dataType: 'json',
        success: function(data) {
            $('#asset').html(data.asset_id);
            $('#asset_id').val(data.asset_id);
            $('#asset_name').val(data.asset_name);
            AM.set(data.asset_merktype);
            let achieved = data.asset_dateachieved;
            $('#asset_dateachieved').val(achieved.substring(0, 10));
            $('#asset_amount').val(data.asset_amount);
            $('#asset_unit').val(data.asset_unit);
            CD.set(data.asset_condition);
            ST.set(data.asset_status);
            $('textarea#asset_notes').val(data.asset_notes);
            CKEDITOR.instances.asset_notes.setData(data.asset_notes);
            // console.log(data.asset_notes)
        }
    });
}
</script>