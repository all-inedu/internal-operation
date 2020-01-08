<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Programs
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Programs</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="#" class="btn btn-sm btn-success ml-2 add" data-toggle="modal" data-target="#addProgram">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Program
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width="5%" class="text-center">ID Pogram</th>
                <th width="10%" class="text-center">Main Program</th>
                <th width="10%" class="text-center">Sub Program</th>
                <th width="5%" class="text-center">Program</th>
                <th width="5%" class="text-center">Type</th>
                <th width="5%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=25;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center">AW</td>
                <td>Encrihment Program</td>
                <td>Academic Writing</td>
                <td class="text-center">Academic Writing</td>
                <td class="text-center">B2B/B2C</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-info" title="Edit" data-toggle="modal" data-target="#editProgram"
                        onclick="editPrograms('<?=$i;?>')"><i class="fas fa-edit"></i></button>
                    <a href="#" class="btn btn-sm btn-danger delete-button" data-message="program" title="Delete"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addProgram" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Program</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ID Program</label>
                            <input name="ID Program" type="text" class="form-control form-control-sm"
                                placeholder="ID Program">
                            <?=form_error('ID Program', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Main Program
                            </label>
                            <select id="mainProgram" name="mainProgram" onchange="mainProgram()">
                                <option data-placeholder="true"></option>
                                <?php foreach($mainProgram as $mp): ?>
                                <option value="<?=$mp;?>"><?=$mp;?></option>
                                <?php endforeach; ?>
                            </select>
                            <?=form_error('mainProgram', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sub Program
                            </label>
                            <select id="subProgram" name="subProgram">
                                <option data-placeholder="true"></option>

                            </select>
                            <?=form_error('subProgram', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Program Name</label>
                            <input name="programName" type="text" class="form-control form-control-sm"
                                placeholder="Program Name">
                            <?=form_error('programName', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Type Program
                            </label>
                            <select id="typeProgram" name="typeProgram">
                                <option data-placeholder="true"></option>
                                <?php foreach($typeProg as $tp): ?>
                                <option value="<?=$tp;?>"><?=$tp;?></option>
                                <?php endforeach; ?>
                            </select>
                            <?=form_error('typeProgram', '<small class="text-danger">', '</small>');?>
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
<div class="modal fade" id="editProgram" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Program</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ID Program</label>
                            <input id="idProgram" name="ID Program" type="text" class="form-control form-control-sm"
                                placeholder="ID Program">
                            <?=form_error('ID Program', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Main Program
                            </label>
                            <select id="editMainPrograms" name="editMainProgram" onchange="editMainProgram()">
                                <?php foreach($mainProgram as $mp): ?>
                                <option value="<?=$mp;?>"><?=$mp;?></option>
                                <?php endforeach; ?>
                            </select>
                            <?=form_error('editMainProgram', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sub Program
                            </label>
                            <select id="editSubProgram" name="editSubProgram">
                                <?php foreach($subProgram as $SP): ?>
                                <option value="<?=$SP;?>"><?=$SP;?></option>
                                <?php endforeach; ?>
                            </select>
                            <?=form_error('editSubProgram', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Program Name</label>
                            <input id="editProgramName" name="editProgramName" type="text"
                                class="form-control form-control-sm" placeholder="Program Name">
                            <?=form_error('editProgramName', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Type Program
                            </label>
                            <select id="editTypeProgram" name="editTypeProgram">
                                <?php foreach($typeProg as $tp): ?>
                                <option value="<?=$tp;?>"><?=$tp;?></option>
                                <?php endforeach; ?>
                            </select>
                            <?=form_error('editTypeProgram', '<small class="text-danger">', '</small>');?>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
new SlimSelect({
    select: '#mainProgram',
    placeholder: 'Select main program ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#subProgram',
    placeholder: 'Select sub program ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#typeProgram',
    placeholder: 'Select type program ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var EMP = new SlimSelect({
    select: '#editMainPrograms',
    // placeholder: 'Select main program ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var ESP = new SlimSelect({
    select: '#editSubProgram',
    // placeholder: 'Select sub program ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var ETP = new SlimSelect({
    select: '#editTypeProgram',
    // placeholder: 'Select type program ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

function mainProgram() {
    var p = $('#mainProgram').val();
    if (p == 'Encrihment Program') {
        $('#subProgram').html('');
        $('#subProgram').html(
            '<?php foreach($subEP as $EP): ?>' +
            '<option value="<?=$EP;?>"><?=$EP;?></option>' +
            '<?php endforeach; ?>'
        );
    } else if (p == 'Experiential Learning') {
        $('#subProgram').html('');
        $('#subProgram').html(
            '<?php foreach($subEL as $EL): ?>' +
            '<option value="<?=$EL;?>"><?=$EL;?></option>' +
            '<?php endforeach; ?>'
        );
    } else if (p == 'Standardized Test') {
        $('#subProgram').html('');
        $('#subProgram').html(
            '<?php foreach($subST as $ST): ?>' +
            '<option value="<?=$ST;?>"><?=$ST;?></option>' +
            '<?php endforeach; ?>'
        );
    } else if (p == 'University & Schoolarship') {
        $('#subProgram').html('');
        $('#subProgram').html(
            '<?php foreach($subUS as $US): ?>' +
            '<option value="<?=$US;?>"><?=$US;?></option>' +
            '<?php endforeach; ?>'
        );
    }
}

function editMainProgram() {
    var p = $('#editMainPrograms').val();
    if (p == 'Encrihment Program') {
        $('#editSubProgram').html('');
        $('#editSubProgram').html(
            '<?php foreach($subEP as $EP): ?>' +
            '<option value="<?=$EP;?>"><?=$EP;?></option>' +
            '<?php endforeach; ?>'
        );
    } else if (p == 'Experiential Learning') {
        $('#editSubProgram').html('');
        $('#editSubProgram').html(
            '<?php foreach($subEL as $EL): ?>' +
            '<option value="<?=$EL;?>"><?=$EL;?></option>' +
            '<?php endforeach; ?>'
        );
    } else if (p == 'Standardized Test') {
        $('#editSubProgram').html('');
        $('#editSubProgram').html(
            '<?php foreach($subST as $ST): ?>' +
            '<option value="<?=$ST;?>"><?=$ST;?></option>' +
            '<?php endforeach; ?>'
        );
    } else if (p == 'University & Schoolarship') {
        $('#editSubProgram').html('');
        $('#editSubProgram').html(
            '<?php foreach($subUS as $US): ?>' +
            '<option value="<?=$US;?>"><?=$US;?></option>' +
            '<?php endforeach; ?>'
        );
    }
}

function editPrograms(x) {
    console.log(x);
    $('#idProgram').val('AW');
    EMP.set('University & Schoolarship');
    ESP.set('Essay Guidance');
    $('#editProgramName').val('Essay Guidance Tutor');
    ETP.set('B2B');
}
</script>