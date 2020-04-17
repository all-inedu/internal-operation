<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; School
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/school/');?>">School</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                <div class="text-center">
                    <img src="<?=base_url('assets/img/sch.png');?>" alt="client management" width="60%">
                    <div class="line" style="margin-top:-5px; margin-bottom:15px;"></div>
                    <h5>School Profile</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post">
                    <h6><i class="icofont-building"></i> &nbsp; School
                        <div class="float-right">
                            <a href="<?=base_url('bizdev/school/');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>School Name <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <input name="sch_name" type="text" class="form-control form-control-sm"
                                    placeholder="School Name">
                                <?=form_error('sch_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type
                                </label>
                                <select name="sch_type" id="schoolType">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($type as $t): ?>
                                    <option value="<?=$t;?>"><?=$t;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('sch_type', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Level
                                </label>
                                <select name="sch_level" id="schoolLevel">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($level as $l): ?>
                                    <option value="<?=$l;?>"><?=$l;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('sch_level', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Curriculum
                                </label>
                                <select name="sch_curriculum" id="schoolCurriculum">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($curriculum as $c): ?>
                                    <option value="<?=$c;?>"><?=$c;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('sch_curriculum', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Instagram
                                </label>
                                <input name="sch_insta" type="text" class="form-control form-control-sm">
                                <?=form_error('sch_insta', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School Mail
                                </label>
                                <input name="sch_mail" type="text" class="form-control form-control-sm"
                                    placeholder="School Mail">
                                <?=form_error('sch_mail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Telephone
                                </label>
                                <input name="sch_phone" type="text" class="form-control form-control-sm"
                                    placeholder="Telephone">
                                <?=form_error('sch_phone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>City
                                </label>
                                <input name="sch_city" type="text" class="form-control form-control-sm"
                                    placeholder="City">
                                <?=form_error('sch_city', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Location
                                </label>
                                <textarea name="sch_location" class="form-control form-control-sm"
                                    placeholder="Location" rows="4"></textarea>
                                <?=form_error('sch_location', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Teacher Contact Person</label>
                            <button type="button" class="float-right btn btn-warning add_more_button"><i
                                    class="fas fa-plus-square"></i>&nbsp; Add Teacher</button>
                        </div>
                        <div class="container mt-3" id="teacher">
                            <div class="row p-0">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <small>Full Name</small>
                                        <input type="text" name="schdetail_fullname[]"
                                            class="form-control form-control-sm" placeholder="Name" rows="4">
                                        <?=form_error('schdetail_fullname[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <small>E-mail</small>
                                        <input type="text" name="schdetail_email[]" class="form-control form-control-sm"
                                            placeholder="E-mail" rows="4">
                                        <?=form_error('schdetail_email[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <small>Linkedin</small>
                                        <input type="text" name="schdetail_linkedin[]"
                                            class="form-control form-control-sm" placeholder="Linkedin" rows="4">
                                        <?=form_error('schdetail_linkedin[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <small>Phone Number</small>
                                        <input type="text" name="schdetail_phone[]" class="form-control form-control-sm"
                                            placeholder="Phone Number" rows="4">
                                        <?=form_error('schdetail_phone[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <small>Status</small>
                                        <select type="text" name="schdetail_position[]"
                                            class="form-control form-control-sm">
                                            <option value="Principal">Principal</option>
                                            <option value="Counselor">Counselor</option>
                                            <option value="Teacher">Teacher</option>
                                        </select>
                                        <?=form_error('schdetail_position[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>&nbsp;
                            Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
new SlimSelect({
    select: '#schoolType',
    placeholder: 'Select school type',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#schoolLevel',
    placeholder: 'Select school level',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#schoolCurriculum',
    placeholder: 'Select school curriculum',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

// new SlimSelect({
//     select: '#isFriendly',
//     placeholder: 'Select school curriculum',
//     allowDeselect: true,
//     deselectLabel: '<span class="text-danger">✖</span>'
// });

$(document).ready(function() {
    var max_fields_limit = 5; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(
        e) { //click event on add more fields button having class add_more_button
        e.preventDefault();
        if (x < max_fields_limit) { //check conditions
            x++; //counter increment
            $('#teacher').append(
                '<div class="row">' +
                '<div class="line" style="margin-top:15px; margin-bottom:35px; width:"50%; "></div>' +
                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Full Name</small>' +
                ' <input type="text" name="schdetail_fullname[]" class="form-control form-control-sm" placeholder="Name" rows="4">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2">' +
                '<div class="form-group">' +
                '<small>E-mail</small>' +
                '<input type="text" name="schdetail_email[]" class="form-control form-control-sm" placeholder="E-mail" rows="4">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Linkedin</small>' +
                '<input type="text" name="schdetail_linkedin[]" class="form-control form-control-sm" placeholder="Linkedin" rows="4">' +
                '</div>' +
                '</div>' +

                ' <div class="col-md-2">' +
                '<div class="form-group">' +
                '<small>Phone Number</small>' +
                '<input type="text" name="schdetail_phone[]" class="form-control form-control-sm" placeholder="Phone Number" rows="4">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2">' +
                '<div class="form-group">' +
                '<small>Status</small>' +
                '<select type="text" name="schdetail_position[]" class="form-control form-control-sm" placeholder="E-mail" rows="4">' +
                '<option value="Counselor">Counselor</option>' +
                '<option value="Teacher">Teacher</option>' +
                '</select>' +
                '</div>' +
                '</div>' +

                '<button style="position:absolute; right:20px; margin-top:23px;" class="btn btn-sm btn-danger remove_field float-right"><i class="fas fa-times-circle"></i>&nbsp; Remove</button>' +

                '</div>'
            ); //add input field
        }
    });
    $('#teacher').on("click", ".remove_field", function(
        e) { //user click on remove text links
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>