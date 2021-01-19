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
    <form action="multi-delete" method="post" name="multi-delete">
        <div class="btn btn-sm btn-primary float-left pt-2 mr-1">
            <input type="checkbox" id="checkp">&nbsp;
            Select All
        </div>
        <button type="submit" class="btn btn-danger mr-1 float-left"><i class="icofont-trash"></i> &nbsp;
            Delete</button>
        <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th width="1%">#</th>
                    <th width="5%">Program ID</th>
                    <th width="10%">Main Program</th>
                    <th width="10%">Sub Program</th>
                    <th width="5%">Program</th>
                    <th width="5%">Type</th>
                    <th width="5%">Payment</th>
                    <th width="5%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($program as $p) { ?>
                <tr class="text-center">
                    <td><input class="check" type="checkbox" name="choose[]" value="<?=$p['prog_id'];?>"></td>
                    <td><?=$p['prog_id'];?></td>
                    <td class="text-left"><?=$p['prog_main'];?></td>
                    <td class="text-left"><?=$p['prog_sub'];?></td>
                    <td class="text-left"><?=$p['prog_program'];?></td>
                    <td><?=$p['prog_type'];?></td>
                    <td><?=strtoupper($p['prog_payment']);?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info" title="Edit" data-toggle="modal"
                            data-target="#editProgram" onclick="editPrograms('<?=$p['prog_id'];?>')"><i
                                class="fas fa-edit"></i></a>
                        <a href="<?=base_url('client/programs/delete/'.$p['prog_id']);?>"
                            class="btn btn-sm btn-danger delete-button" data-message="program" title="Delete"><i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </form>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addProgram" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="save" method="post" name="save">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Program</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ID Program <i class="text-danger font-weight-bold">*</i> </label>
                                <input name="prog_id" type="text" class="form-control form-control-sm"
                                    placeholder="ID Program">
                                <?=form_error('prog_id', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type Program <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <select id="typeProgram" name="prog_type">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($typeProg as $tp): ?>
                                    <option value="<?=$tp;?>"><?=$tp;?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?=form_error('prog_type', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Main Program <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <input type="text" name="main_number" id="mainNumber" hidden>
                                <select id="mainProgram" name="prog_main" onchange="mainPrograms()">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($mainProgram as $mp): ?>
                                    <option value="<?=$mp;?>"><?=$mp;?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?=form_error('prog_main', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sub Program
                                </label>
                                <select id="subProgram" name="prog_sub">
                                    <option data-placeholder="true"></option>

                                </select>
                                <?=form_error('prog_sub', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Program Name <i class="text-danger font-weight-bold">*</i></label>
                                <input name="prog_program" type="text" class="form-control form-control-sm"
                                    placeholder="Program Name">
                                <?=form_error('prog_program', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Need Mentor or Tutor? <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <select name="prog_mentor" class="form-control form-control-sm">
                                    <option value="Mentor">Mentor</option>
                                    <option value="Tutor">Tutor</option>
                                    <option value="No">No</option>
                                </select>
                                <?=form_error('prog_mentor', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Payment Category <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <select name="prog_payment" class="form-control form-control-sm">
                                    <option value="">Select payment category</option>
                                    <option value="idr">IDR / Rupiah</option>
                                    <option value="usd">USD</option>
                                    <option value="session">Session</option>
                                </select>
                                <?=form_error('prog_payment', '<small class="text-danger">', '</small>');?>
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
<div class="modal fade" id="editProgram" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="update" method="post" name="update">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Program</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ID Program <i class="text-danger font-weight-bold">*</i></label>
                                <input id="prog_id" name="prog_id" type="text" class="form-control form-control-sm"
                                    readonly>
                                <?=form_error('prog_id', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type Program <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <select id="editTypeProgram" name="prog_type">
                                    <?php foreach($typeProg as $tp): ?>
                                    <option value="<?=$tp;?>"><?=$tp;?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?=form_error('prog_type', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Main Program <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <input type="text" name="main_number" id="editMainNumber" hidden>
                                <select id="editMainPrograms" name="prog_main" onchange="editMP()">
                                    <?php foreach($mainProgram as $mp): ?>
                                    <option value="<?=$mp;?>"><?=$mp;?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?=form_error('prog_main', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sub Program
                                </label>
                                <select id="editSubProgram" name="prog_sub">
                                    <?php foreach($subProgram as $SP): ?>
                                    <option value="<?=$SP;?>"><?=$SP;?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?=form_error('prog_sub', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Program Name <i class="text-danger font-weight-bold">*</i></label>
                                <input id="prog_program" name="prog_program" type="text"
                                    class="form-control form-control-sm" placeholder="Program Name">
                                <?=form_error('prog_program', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Need Mentor or Tutor? <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <select id="prog_mentor" name="prog_mentor" class="form-control form-control-sm">
                                    <option value="Mentor">Mentor</option>
                                    <option value="Tutor">Tutor</option>
                                    <option value="No">No</option>
                                </select>
                                <?=form_error('prog_mentor', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Payment Category <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <select id="prog_payment" name="prog_payment" class="form-control form-control-sm">
                                    <option value="">Select payment category</option>
                                    <option value="idr">IDR / Rupiah</option>
                                    <option value="usd">USD</option>
                                    <option value="session">Session</option>
                                </select>
                                <?=form_error('prog_payment', '<small class="text-danger">', '</small>');?>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
$('#checkp').click(function(event) {
    if (this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;
        });
    }
});

new SlimSelect({
    select: '#typeProgram',
    placeholder: 'Select type program ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

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

function mainPrograms() {
    var p = $('#mainProgram').val();
    if (p == 'Admissions Consulting') {
        $('#subProgram').html('');
        $('#subProgram').html(
            '<?php foreach($adm as $admissions): ?>' +
            '<option value="<?=$admissions;?>"><?=$admissions;?></option>' +
            '<?php endforeach; ?>'
        );
        $('#mainNumber').val('1');
    } else if (p == 'Career Exploration') {
        $('#subProgram').html('');
        $('#subProgram').html(
            '<?php foreach($ce as $career): ?>' +
            '<option value="<?=$career;?>"><?=$career;?></option>' +
            '<?php endforeach; ?>'
        );
        $('#mainNumber').val('2');
    } else if (p == 'Application Bootcamp') {
        $('#subProgram').html('');
        $('#subProgram').html(
            '<?php foreach($apb as $application): ?>' +
            '<option value="<?=$application;?>"><?=$application;?></option>' +
            '<?php endforeach; ?>'
        );
        $('#mainNumber').val('3');
    } else if (p == 'Academic & Test Preparation') {
        $('#subProgram').html('');
        $('#subProgram').html(
            '<?php foreach($aca as $academic): ?>' +
            '<option value="<?=$academic;?>"><?=$academic;?></option>' +
            '<?php endforeach; ?>'
        );
        $('#mainNumber').val('4');
    } else if (p == 'Events & Info Sessions') {
        $('#subProgram').html('');
        $('#subProgram').html(
            '<?php foreach($ei as $events): ?>' +
            '<option value="<?=$events;?>"><?=$events;?></option>' +
            '<?php endforeach; ?>'
        );
        $('#mainNumber').val('5');
    }
}

function editMP() {
    var p = $('#editMainPrograms').val();
    if (p == 'Admissions Consulting') {
        $('#editSubProgram').html('');
        $('#editSubProgram').html(
            '<?php foreach($adm as $admissions): ?>' +
            '<option value="<?=$admissions;?>"><?=$admissions;?></option>' +
            '<?php endforeach; ?>'
        );
        $('#editMainNumber').val('1');
    } else if (p == 'Career Exploration') {
        $('#editSubProgram').html('');
        $('#editSubProgram').html(
            '<?php foreach($ce as $career): ?>' +
            '<option value="<?=$career;?>"><?=$career;?></option>' +
            '<?php endforeach; ?>'
        );
        $('#editMainNumber').val('2');
    } else if (p == 'Application Bootcamp') {
        $('#editSubProgram').html('');
        $('#editSubProgram').html(
            '<?php foreach($apb as $application): ?>' +
            '<option value="<?=$application;?>"><?=$application;?></option>' +
            '<?php endforeach; ?>'
        );
        $('#editMainNumber').val('3');
    } else if (p == 'Academic & Test Preparation') {
        $('#editSubProgram').html('');
        $('#editSubProgram').html(
            '<?php foreach($aca as $academic): ?>' +
            '<option value="<?=$academic;?>"><?=$academic;?></option>' +
            '<?php endforeach; ?>'
        );
        $('#editMainNumber').val('4');
    } else if (p == 'Events & Info Sessions') {
        $('#editSubProgram').html('');
        $('#editSubProgram').html(
            '<?php foreach($ei as $events): ?>' +
            '<option value="<?=$events;?>"><?=$events;?></option>' +
            '<?php endforeach; ?>'
        );
        $('#editMainNumber').val('5');
    }
}

function editPrograms(x) {
    $('#editSubProgram').html(
        '<?php foreach($subProgram as $sp): ?>' +
        '<option value="<?=$sp;?>"><?=$sp;?></option>' +
        '<?php endforeach; ?>'
    );

    $.ajax({
        type: 'post',
        url: '<?=base_url("client/programs/view/");?>' + x,
        dataType: 'json',
        success: function(data) {
            // console.log(data)
            $('#prog_id').val(data.prog_id);
            EMP.set(data.prog_main);
            ESP.set(data.prog_sub);
            $('#prog_program').val(data.prog_program);
            ETP.set(data.prog_type);
            $('#prog_mentor').val(data.prog_mentor);
            $('#prog_payment').val(data.prog_payment);
        }
    });
}
</script>