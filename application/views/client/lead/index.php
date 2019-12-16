<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-sign-in-alt mt-1"></i>&nbsp;&nbsp; Lead Source
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lead Source</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="#" class="btn btn-sm btn-success ml-2 add" data-toggle="modal" data-target="#addLead">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Lead Source
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width="10%" class="text-center">ID Lead</th>
                <th width="70%" class="text-center">Lead Source Name</th>
                <th width="10%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=10;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center">IG</td>
                <td>Instagram</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal" data-target="#editLead"
                        onclick="editLead('<?=$i;?>')"><i class="fas fa-edit"></i></button>
                    <a href="#" class="btn btn-sm btn-danger delete-button" data-message="lead source" title="Delete"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addLead" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Lead Source</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ID Lead Source</label>
                            <input name="idLeadSource" type="text" class="form-control form-control-sm"
                                placeholder="ID Lead Source">
                            <?=form_error('idLeadSource', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Lead Source Name</label>
                            <input name="leadSourceName" type="text" class="form-control form-control-sm"
                                placeholder="Lead Source Name">
                            <?=form_error('leadSourceName', '<small class="text-danger">', '</small>');?>
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
<div class="modal fade" id="editLead" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Lead Source</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ID Lead Source</label>
                            <input id="idLeadSource" name="idLeadSource" type="text"
                                class="form-control form-control-sm" placeholder="ID Lead Source">
                            <?=form_error('idLeadSource', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Lead Source Name</label>
                            <input id="leadSourceName" name="leadSourceName" type="text"
                                class="form-control form-control-sm" placeholder="Lead Source Name">
                            <?=form_error('leadSourceName', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fas fa-times-circle"></i>&nbsp; Close</button>
                <button type="button" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
function editLead(x) {
    document.getElementById("idLeadSource").disabled = true;
    $('#idLeadSource').val(x);
    $('#leadSourceName').val('Instagram');
}
</script>