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
                    <li class="breadcrumb-item active" aria-current="page">View</li>
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
                    <h5 class="mt-0"><?=$sch['sch_name'];?></h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-info mb-2">
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$sch['sch_mail'];?><br>
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$sch['sch_phone'];?> &nbsp;
                    </div>
                    <a href="<?=base_url('bizdev/school/edit/'.$sch['sch_id']);?>" class="btn btn-sm btn-info m-1"><i
                            class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                    <a href="#" class="btn btn-sm btn-success m-1" data-toggle="modal"
                        data-target="#convertPotential"><i class="fas fa-retweet"></i>&nbsp;
                        Add Program</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
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
                            <input name="sch_name" type="text" class="form-control form-control-sm"
                                value="<?=$sch['sch_name'];?>" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Type
                            </label>
                            <select name="sch_type" id="schoolType">
                                <option><?=$sch['sch_type'];?></option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Level
                            </label>
                            <select name="sch_level" id="schoolLevel">
                                <option><?=$sch['sch_level'];?></option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Curriculum
                            </label>
                            <select name="sch_curriculum" id="schoolCurriculum">
                                <option><?=$sch['sch_curriculum'];?></option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Is Friendly?
                            </label>
                            <select name="sch_isfriendly" id="isFriendly">
                                <option><?=$sch['sch_isfriendly'];?></option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>School Mail
                            </label>
                            <input name="schoolMail" type="text" class="form-control form-control-sm"
                                value="<?=$sch['sch_mail'];?>" disabled>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Telephone
                            </label>
                            <input name="telephone" type="text" class="form-control form-control-sm"
                                value="<?=$sch['sch_phone'];?>" disabled>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>City
                            </label>
                            <input name="city" type="text" class="form-control form-control-sm"
                                value="<?=$sch['sch_city'];?>" disabled>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Location
                            </label>
                            <textarea name="sch_location" class="form-control form-control-sm" placeholder="Location"
                                rows="4" disabled><?=$sch['sch_location'];?></textarea>

                        </div>
                    </div>


                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="font-weight-bold">Teachers Contact :</label>
                    </div>
                    <div class="container" id="teacher">
                        <div class="row p-0">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-dark text-white">
                                            <tr class="text-center">
                                                <th>Full Name</th>
                                                <th>E-mail</th>
                                                <th>Linkedin</th>
                                                <th>Phone Number</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($sch_detail as $s): ?>
                                            <tr class="text-center">
                                                <td><?=$s['schdetail_fullname'];?></td>
                                                <td><?=$s['schdetail_email'];?></td>
                                                <td><?=$s['schdetail_linkedin'];?></td>
                                                <td><?=$s['schdetail_phone'];?></td>
                                                <td><?=$s['schdetail_position'];?></td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="convertPotential" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable" role="document">
        <form action="convertPotential" method="post" id="convert">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Program</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Program Name
                                </label>
                                <select id="programName" name="programName">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($program as $p): ?>
                                    <option value="<?=$p['prog_id'];?>"><?=$p['prog_sub'].' - '.$p['prog_program'];?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('programName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Discuss</label>
                                <input name="firstDiscuss" type="date" class="form-control form-control-sm"
                                    placeholder="First Discuss">
                                <?=form_error('firstDiscuss', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Discuss</label>
                                <input name="lastDiscuss" type="date" class="form-control form-control-sm"
                                    placeholder="Last Discuss" disabled>
                                <?=form_error('lastDiscuss', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes</label>
                                <textarea name="notes" class="form-control form-control-sm" rows="5"></textarea>
                                <?=form_error('notes', '<small class="text-danger">', '</small>');?>
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
var ST = new SlimSelect({
    select: '#schoolType',
    placeholder: 'Select school type',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
ST.disable();

var SL = new SlimSelect({
    select: '#schoolLevel',
    placeholder: 'Select school level',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
SL.disable();

var SC = new SlimSelect({
    select: '#schoolCurriculum',
    placeholder: 'Select school curriculum',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
SC.disable();

var IF = new SlimSelect({
    select: '#isFriendly',
    placeholder: 'Select is friendly',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
IF.disable();

var PN = new SlimSelect({
    select: '#programName',
    placeholder: 'Select program name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
</script>