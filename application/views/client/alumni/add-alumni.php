<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Add Alumni
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('client/alumni');?>">Alumni List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Alumni</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>

<div class="row">
    <div class="col-md-3 mb-2">
        <div class="card shadow card-sticky">
            <div class="card-body">
                <div class="text-center text-info">
                    <img src="<?=base_url('assets/img/user.png');?>" alt="client management" width="60%">
                    <h5>Add Alumni</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">
            <form action="" method="post">
                <div class="card-body">
                    <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Alumni
                        <div class="float-right">
                            <a href="<?=base_url('client/alumni/');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-3">
                            Student Name : <i class="text-danger font-weight-bold">*</i>
                        </div>
                        <div class="col-md-9 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="st_id" id="student">
                                        <option data-placeholder="true"></option>
                                        <?php foreach ($students as $st): ?>
                                        <option value="<?=$st['st_id'];?>">
                                            <?=$st['st_firstname'].' '.$st['st_lastname'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                    <?=form_error('st_id', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Graduate Date : <i class="text-danger font-weight-bold">*</i>
                        </div>
                        <div class="col-md-9 mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="date" name="alu_graduatedate" class="form-control form-control-sm">
                                    <?=form_error('alu_graduatedate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="float-right">
                                <button class="btn btn-sm btn-outline-primary add_more_button"><i
                                        class="icofont-plus"></i>&nbsp;
                                    Add University Name</button>
                            </div>
                            <hr style="margin-top:40px;">
                            <div id="univ_name">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label>University Name <i class="text-danger font-weight-bold">*</i></label>
                                        <select name="univ_id[]" id="univ">
                                            <option data-placeholder="true"></option>
                                            <?php foreach ($university as $univ): ?>
                                            <option value="<?=$univ['univ_id'];?>">
                                                <?=$univ['univ_name'];?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                                        <?=form_error('univ_id[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>Scholarship</label>
                                        <input type="text" name="aludetail_scholarship[]"
                                            class="form-control form-control-sm">
                                        <?=form_error('aludetail_scholarship[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>Major <i class="text-danger font-weight-bold">*</i></label>
                                        <input type="text" name="aludetail_major[]"
                                            class="form-control form-control-sm major">
                                        <?=form_error('aludetail_major[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Status <i class="text-danger font-weight-bold">*</i></label>
                                        <select name="aludetail_status[]" id="status">
                                            <option data-placeholder="true"></option>
                                            <option value="1">Waitlist</option>
                                            <option value="2">Accepted</option>
                                            <option value="3">Selected Uni</option>
                                        </select>
                                        <?=form_error('aludetail_status[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="icofont-save"></i> &nbsp;
                                    Save
                                    Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
$(document).ready(function() {
    var states = '<?=implode(", ", $major);?>';
    var arr = states.split(", ")
    $(".major").autocomplete({
        source: arr
    });
});

new SlimSelect({
    select: '#student',
    placeholder: 'Select student name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#univ',
    placeholder: 'Select university name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#status',
    placeholder: 'Select status name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

$(document).ready(function() {
    var max_fields_limit = "10"; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(
        e) { //click event on add more fields button having class add_more_button
        e.preventDefault();
        if (x < max_fields_limit) { //check conditions
            x++; //counter increment
            $('#univ_name').append(
                '<div class="row">' +
                '<div class="line" style="margin-top:15px; margin-bottom:35px; width:"50%; "></div>' +
                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<label>University Name <i class="text-danger font-weight-bold">*</i></label>' +
                '<select name="univ_id[]" id="univ' + x + '">' +
                '<option data-placeholder="true"></option>' +
                '<?php foreach ($university as $univ): ?>' +
                '<option value="<?=$univ["univ_id"];?>">' +
                "<?=$univ['univ_name'];?>" +
                '</option>' +
                '<?php endforeach;?>' +
                '</select>' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<label>Scholarship <i class="text-danger font-weight-bold">*</i></label>' +
                '<input type="text" name="aludetail_scholarship[]" class="form-control form-control-sm" id="major' +
                x + '">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<label>Major <i class="text-danger font-weight-bold">*</i></label>' +
                '<input type="text" name="aludetail_major[]" class="form-control form-control-sm major">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Status <i class="text-danger font-weight-bold">*</i></small>' +
                '<select name="aludetail_status[]" id="status' + x + '">' +
                '<option data-placeholder="true"></option>' +
                '<option value="1">Waitlist</option>' +
                '<option value="2">Accepted</option>' +
                ' <option value="3">Selected Uni</option>' +
                '</select>' +
                '</div>' +
                '</div>' +

                '<button style="position:absolute; right:20px; margin-top:23px;" class="btn btn-sm btn-danger remove_field float-right"><i class="fas fa-times-circle"></i>&nbsp; Remove</button>' +

                '</div>'
            ); //add input field\

            // var states1 = '<?=implode(", ", $major);?>';
            // var arr1 = states1.split(", ")
            // $("#major" + x).autocomplete({
            //     source: arr1
            // });

            new SlimSelect({
                select: '#univ' + x,
                placeholder: 'Select university name',
                allowDeselect: true,
                deselectLabel: '<span class="text-danger">✖</span>'
            });

            new SlimSelect({
                select: '#status' + x,
                placeholder: 'Select status name',
                allowDeselect: true,
                deselectLabel: '<span class="text-danger">✖</span>'
            });

        }
    });
    $('#univ_name').on("click", ".remove_field", function(
        e) { //user click on remove text links
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>