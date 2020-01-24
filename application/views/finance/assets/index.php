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
                <th width="5%" class="text-center">ID Asset</th>
                <th width="10%" class="text-center">Asset Name</th>
                <th width="10%" class="text-center">Merk/Type</th>
                <th width="5%" class="text-center">Archieved Date</th>
                <th width="5%" class="text-center">Amount</th>
                <th width="5%" class="text-center">Unit(s)</th>
                <th width="5%" class="text-center">Condition</th>
                <th width="5%" class="text-center">Status</th>
                <th width="5%" class="text-center">Last Update</th>
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
                    <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal" data-target="#editAsset"
                        onclick="editAssets('<?=$i;?>')"><i class="fas fa-edit"></i></button>
                    <a href="#" class="btn btn-sm btn-danger delete-button" data-message="asset" title="Delete"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addAsset" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Asset</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Asset Name</label>
                            <input name="assetName" type="text" class="form-control form-control-sm"
                                placeholder="Asset Name">
                            <?=form_error('assetName', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Asset Merk/Type
                            </label>
                            <select id="assetMerk" name="assetMerk">
                                <option data-placeholder="true"></option>
                                <?php foreach($m as $mr): ?>
                                <option value="<?=$mr;?>"><?=$mr;?></option>
                                <?php endforeach;?>
                            </select>
                            <?=form_error('assetMerk', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Archieved Date</label>
                            <input name="archievedDate" type="date" class="form-control form-control-sm"
                                placeholder="Archieved Date">
                            <?=form_error('archievedDate', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Amount</label>
                            <input name="amount" type="number" class="form-control form-control-sm" placeholder="0">
                            <?=form_error('amount', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Unit(s)</label>
                            <input name="unit" type="text" class="form-control form-control-sm" placeholder="Unit(s)">
                            <?=form_error('unit', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Condition
                            </label>
                            <select id="condition" name="condition">
                                <option data-placeholder="true"></option>
                                <?php foreach($c as $cd): ?>
                                <option value="<?=$cd;?>"><?=$cd;?></option>
                                <?php endforeach;?>
                            </select>
                            <?=form_error('condition', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status
                            </label>
                            <select id="status" name="status">
                                <option data-placeholder="true"></option>
                                <?php foreach($s as $st): ?>
                                <option value="<?=$st;?>"><?=$st;?></option>
                                <?php endforeach;?>
                            </select>
                            <?=form_error('status', '<small class="text-danger">', '</small>');?>
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
<div class="modal fade" id="editAsset" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Asset</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Asset Name</label>
                            <input name="assetName" type="text" class="form-control form-control-sm"
                                placeholder="Asset Name" id="assetName">
                            <?=form_error('assetName', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Asset Merk/Type
                            </label>
                            <select id="assetMerkEdit" name="assetMerk">
                                <option data-placeholder="true"></option>
                                <?php foreach($m as $mr): ?>
                                <option value="<?=$mr;?>"><?=$mr;?></option>
                                <?php endforeach;?>
                            </select>
                            <?=form_error('assetMerk', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Archieved Date</label>
                            <input name="archievedDate" type="date" class="form-control form-control-sm"
                                placeholder="Archieved Date">
                            <?=form_error('archievedDate', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Amount</label>
                            <input name="amount" type="number" class="form-control form-control-sm" placeholder="0">
                            <?=form_error('amount', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Unit(s)</label>
                            <input name="unit" type="text" class="form-control form-control-sm" placeholder="Unit(s)">
                            <?=form_error('unit', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Condition
                            </label>
                            <select id="conditionEdit" name="condition">
                                <option data-placeholder="true"></option>
                                <?php foreach($c as $cd): ?>
                                <option value="<?=$cd;?>"><?=$cd;?></option>
                                <?php endforeach;?>
                            </select>
                            <?=form_error('condition', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status
                            </label>
                            <select id="statusEdit" name="status">
                                <option data-placeholder="true"></option>
                                <?php foreach($s as $st): ?>
                                <option value="<?=$st;?>"><?=$st;?></option>
                                <?php endforeach;?>
                            </select>
                            <?=form_error('status', '<small class="text-danger">', '</small>');?>
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
    console.log(x);
    $('#assetName').val('AW');
    EMP.set('University & Schoolarship');
    ESP.set('Essay Guidance');
    $('#editProgramName').val('Essay Guidance Tutor');
    ETP.set('B2B');
}
</script>