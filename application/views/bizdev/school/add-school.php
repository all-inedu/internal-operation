<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Schools
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
                    <img src="<?=base_url('assets/img/school.png');?>" alt="client management" width="100%">
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <h5>School Profile</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post">
                    <h6><i class="fas fa-user"></i>&nbsp; &nbsp; School
                        <div class="float-right">
                            <a href="<?=base_url('bizdev/school/');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>School Name
                                </label>
                                <input name="schoolName" type="text" class="form-control form-control-sm"
                                    placeholder="School Name">
                                <?=form_error('schoolName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type
                                </label>
                                <select name="schoolType" id="schoolType">
                                    <option data-placeholder="true"></option>
                                    <option value="International">International</option>
                                    <option value="National">National</option>
                                </select>
                                <?=form_error('schoolType', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Level
                                </label>
                                <select name="schoolLevel" id="schoolLevel">
                                    <option data-placeholder="true"></option>
                                    <option value="Junior">Junior</option>
                                    <option value="Elementary">Elementary</option>
                                    <option value="Senior">Senior</option>
                                </select>
                                <?=form_error('schoolLevel', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Curriculum
                                </label>
                                <select name="schoolCurriculum" id="schoolCurriculum">
                                    <option data-placeholder="true"></option>
                                    <option value="National">National</option>
                                    <option value="IB">IB</option>
                                    <option value="A-Level">A-Level</option>
                                </select>
                                <?=form_error('schoolCurriculum', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Is Friendly?
                                </label>
                                <select name="isFriendly" id="isFriendly">
                                    <option data-placeholder="true"></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <?=form_error('isFriendly', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School Mail
                                </label>
                                <input name="schoolMail" type="text" class="form-control form-control-sm"
                                    placeholder="School Mail">
                                <?=form_error('schoolMail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Telephone
                                </label>
                                <input name="telephone" type="text" class="form-control form-control-sm"
                                    placeholder="Telephone">
                                <?=form_error('telephone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>City
                                </label>
                                <input name="city" type="text" class="form-control form-control-sm" placeholder="City">
                                <?=form_error('city', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Location
                                </label>
                                <textarea name="location" class="form-control form-control-sm" placeholder="Location"
                                    rows="4"></textarea>
                                <?=form_error('location', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>


                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Teacher Contact Person</label>
                            <button class="float-right btn btn-warning add_more_button"><i
                                    class="fas fa-plus-square"></i>&nbsp; Add Teacher</button>
                        </div>
                        <div class="container mt-3" id="teacher">
                            <div class="row p-0">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <small>Full Name</small>
                                        <input type="text" name="teacherName[]" class="form-control form-control-sm"
                                            placeholder="Name" rows="4">
                                        <?=form_error('teacherName[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <small>E-mail</small>
                                        <input type="text" name="teacherEmail[]" class="form-control form-control-sm"
                                            placeholder="E-mail" rows="4">
                                        <?=form_error('teacherEmail[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <small>Linkedin</small>
                                        <input type="text" name="teacherLinkedin[]" class="form-control form-control-sm"
                                            placeholder="Linkedin" rows="4">
                                        <?=form_error('teacherLinkedin[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <small>Phone Number</small>
                                        <input type="text" name="teacherPhone[]" class="form-control form-control-sm"
                                            placeholder="Phone Number" rows="4">
                                        <?=form_error('teacherPhone[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <small>Status</small>
                                        <select type="text" name="teacherStatus[]" class="form-control form-control-sm"
                                            placeholder="E-mail" rows="4">
                                            <option value="Principal">Principal</option>
                                            <option value="Counselor">Counselor</option>
                                            <option value="Counselor">Teacher</option>
                                        </select>
                                        <?=form_error('teacherStatus[]', '<small class="text-danger">', '</small>');?>
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

new SlimSelect({
    select: '#isFriendly',
    placeholder: 'Select school curriculum',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

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
                '<div class="line" style="margin-top:15px; margin-bottom:15px; width:"50%; "></div>' +
                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Full Name</small>' +
                ' <input type="text" name="teacherName[]" class="form-control form-control-sm" placeholder="Name" rows="4">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2">' +
                '<div class="form-group">' +
                '<small>E-mail</small>' +
                '<input type="text" name="teacherEmail[]" class="form-control form-control-sm" placeholder="E-mail" rows="4">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Linkedin</small>' +
                '<input type="text" name="teacherLinkedin[]" class="form-control form-control-sm" placeholder="Linkedin" rows="4">' +
                '</div>' +
                '</div>' +

                ' <div class="col-md-2">' +
                '<div class="form-group">' +
                '<small>Phone Number</small>' +
                '<input type="text" name="teacherPhone[]" class="form-control form-control-sm" placeholder="Phone Number" rows="4">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2">' +
                '<div class="form-group">' +
                '<small>Status</small>' +
                '<select type="text" name="teacherStatus[]" class="form-control form-control-sm" placeholder="E-mail" rows="4">' +
                '<option value="Counselor">Counselor</option>' +
                '<option value="Counselor">Teacher</option>' +
                '</select>' +
                '</div>' +
                '</div>' +

                '<button class="mx-auto btn btn-sm btn-danger remove_field float-right"><i class="fas fa-times-circle"></i>&nbsp; Remove</button>' +

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