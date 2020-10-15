<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Universities
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Universities</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="#" class="btn btn-sm btn-success ml-2 add" data-toggle="modal" data-target="#addUniversity">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add University
</a>

<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%">#</th>
                <th width="5%" class="text-center">ID University</th>
                <th width="10%" class="text-center">University Name</th>
                <th width="15%" class="text-center">Address</th>
                <th width="5%" class="text-center">Country</th>
                <th width="5%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($univ as $u): ?>
            <tr class="text-center">
                <td><?=$i;?></td>
                <td><?=$u['univ_id'];?></td>
                <td><?=$u['univ_name'];?></td>
                <td><?=$u['univ_address'];?></td>
                <td><?=$u['univ_country'];?></td>
                <td>
                    <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal" data-target="#editUniversity"
                        onclick="editUniv('<?=$u['univ_id'];?>')"><i class="fas fa-edit"></i></button>
                    <a href="<?=base_url('bizdev/university/delete/'.$u['univ_id']);?>"
                        class="btn btn-sm btn-danger delete-button" data-message="university" title="Delete"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addUniversity" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="save" method="post" name="save">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add University</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>University Name <i class="text-danger font-weight-bold">*</i></label>
                                <input name="univ_name" type="text" class="form-control form-control-sm"
                                    placeholder="University Name">
                                <?=form_error('univ_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Country <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <select id="univ_country" name="univ_country">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($country as $c): ?>
                                    <option value="<?=$c;?>"><?=$c;?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?=form_error('univ_country', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address
                                </label>
                                <textarea name="univ_address" class="form-control form-group-sm" rows="3"></textarea>
                                <?=form_error('univ_address', '<small class="text-danger">', '</small>');?>
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
<div class="modal fade" id="editUniversity" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="update" method="post" name="update">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit University</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ID University <i class="text-danger font-weight-bold">*</i></label>
                                <input id="univ_id" name="univ_id" type="text" class="form-control form-control-sm"
                                    placeholder="ID University" readonly>
                                <?=form_error('univ_id', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>University Name <i class="text-danger font-weight-bold">*</i></label>
                                <input id="univ_name" name="univ_name" type="text" class="form-control form-control-sm"
                                    placeholder="University Name">
                                <?=form_error('univ_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Country
                                </label>
                                <select id="editCountry" name="univ_country">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($country as $c): ?>
                                    <option value="<?=$c;?>"><?=$c;?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?=form_error('univ_country', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address
                                </label>
                                <textarea id="univ_address" name="univ_address" class="form-control form-group-sm"
                                    rows="3"></textarea>
                                <?=form_error('subProgram', '<small class="text-danger">', '</small>');?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
new SlimSelect({
    select: '#univ_country',
    placeholder: 'Select country ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var EC = new SlimSelect({
    select: '#editCountry',
    placeholder: 'Select country ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

function editUniv(x) {
    $.ajax({
        type: 'POST',
        url: '<?=base_url("bizdev/university/view/");?>' + x,
        dataType: 'json',
        success: function(data) {
            $('#univ_id').val(data.univ_id);
            $('#univ_name').val(data.univ_name);
            EC.set(data.univ_country);
            CKEDITOR.instances['univ_address'].setData(data.univ_address)
        }
    });
}
</script>