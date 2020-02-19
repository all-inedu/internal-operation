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
                <th width="1%">#</th>
                <th width="10%" class="text-center">Lead ID</th>
                <th width="70%" class="text-center">Lead Source Name</th>
                <th width="10%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($lead as $l) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center"><?=$l['lead_id'];?></td>
                <td><?=$l['lead_name'];?></td>
                <td class="text-center">
                    <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal" data-target="#editLead"
                        onclick="editLead('<?=$l['lead_id'];?>')"><i class="fas fa-edit"></i></button>
                    <a href="<?=base_url('client/lead/delete/'.$l['lead_id']);?>"
                        class="btn btn-sm btn-danger delete-button" data-message="lead source" title="Delete"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php $i++; } ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addLead" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="save" method="post" name="save">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Lead Source</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ID Lead Source</label>
                                <input name="lead_id" type="text" class="form-control form-control-sm"
                                    placeholder="ID Lead Source">
                                <?=form_error('lead_id', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Lead Source Name</label>
                                <input name="lead_name" type="text" class="form-control form-control-sm"
                                    placeholder="Lead Source Name">
                                <?=form_error('lead_name', '<small class="text-danger">', '</small>');?>
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
<div class="modal fade" id="editLead" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="update" method="post" name="update">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Lead Source</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ID Lead Source</label>
                                <input id="lead_id" name="lead_id" type="text" class="form-control form-control-sm"
                                    placeholder="ID Lead Source">
                                <?=form_error('lead_id', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Lead Source Name</label>
                                <input id="lead_name" name="lead_name" type="text" class="form-control form-control-sm"
                                    placeholder="Lead Source Name">
                                <?=form_error('lead_name', '<small class="text-danger">', '</small>');?>
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
<script>
function editLead(x) {
    $('#lead_id').attr('readonly', true);
    $('#lead_id').val(x);
    $('#lead_name').val('Instagram');

    $.ajax({
        type: 'post',
        url: '<?=base_url("client/lead/view/");?>' + x,
        dataType: 'json',
        success: function(data) {
            $('#lead_name').val(data.lead_name);
        }
    });
}
</script>