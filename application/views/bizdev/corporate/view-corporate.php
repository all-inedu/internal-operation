<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Corporate
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/corporate/');?>">Corporate</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>

<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/corporate.png');?>" alt="client management" width="50%"
                        class="mb-2">
                    <h5><?=$corp['corp_name'];?></h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-info mb-2">
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$corp['corp_mail'];?> <br>
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$corp['corp_phone'];?> &nbsp; | &nbsp;
                        <i class="fab fa-instagram text-danger"></i>&nbsp; <?=$corp['corp_insta'];?></p>
                    </div>
                    <a href="<?=base_url('bizdev/corporate/edit/'.$corp['corp_id']);?>" class="btn btn-sm btn-info"><i
                            class="fas fa-pencil-alt"></i>&nbsp; Edit</a>

                    <a href="#" class="btn btn-sm btn-success m-1" data-toggle="modal"
                        data-target="#convertPotential"><i class="fas fa-retweet"></i>&nbsp;
                        Add Program</a>
                </div>
            </div>
        </div>

        <?php if($cprog) { ?>
        <div class="card shadow mt-2 card-sticky">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Program List : </h6>
                        <div class="line" style="margin-top:-5px; margin-bottom:10px;"></div>
                    </div>
                    <div style="height:295px; width:100%; overflow-x: hidden;">
                        <?php foreach($cprog as $cp) : ?>
                        <div class="col-md-12">
                            <div class="bg-light border-bottom" style="margin:0px -20px; padding:10px 20px;">
                                <div class="row">
                                    <div class="col-md-9">
                                        <?=$cp['prog_program'];?> <br>
                                        <small><b>
                                                Status :
                                                <?php if($cp['corprog_status']==0) { echo 'Pending'; } else?>
                                                <?php if($cp['corprog_status']==1) { echo 'Success'; } else?>
                                                <?php if($cp['corprog_status']==2) { echo 'Denied'; }?>
                                            </b>
                                        </small>
                                    </div>
                                    <div class="col-md-3 my-auto text-right">
                                        <a href="<?=base_url('bizdev/corporate-program/view/'.$cp['corprog_id']);?>"
                                            class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post">
                    <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Corporate
                        <div class="float-right">
                            <a href="<?=base_url('bizdev/corporate/');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Corporate Name
                                </label>
                                <input disabled name="corp_name" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_name'];?>">
                                <?=form_error('corp_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Industry
                                </label>
                                <input disabled name="corp_industry" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_industry'];?>">
                                <?=form_error('corp_industry', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Corporate Mail
                                </label>
                                <input disabled name="corp_mail" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_mail'];?>">
                                <?=form_error('corp_mail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Office Number
                                </label>
                                <input disabled name="corp_phone" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_phone'];?>">
                                <?=form_error('corp_phone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Instagram
                                </label>
                                <input disabled name="corp_insta" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_insta'];?>">
                                <?=form_error('corp_insta', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Website
                                </label>
                                <input disabled name="corp_site" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_site'];?>">
                                <?=form_error('corp_site', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Region
                                </label>
                                <input disabled name="corp_region" type="text" class="form-control form-control-sm"
                                    value="<?=$corp['corp_region'];?>">
                                <?=form_error('corp_region', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address
                                </label>
                                <textarea disabled name="corp_address" class="form-control form-control-sm"
                                    rows="4"><?=$corp['corp_address'];?></textarea>
                                <?=form_error('corp_address', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>


                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Corporate PIC</label>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-dark text-white">
                                        <tr class="text-center">
                                            <th>Full Name</th>
                                            <th>E-mail</th>
                                            <th>Linkedin</th>
                                            <th>Phone Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($detail as $d): ?>
                                        <tr class="text-center">
                                            <td><?=$d['corpdetail_fullname'];?></td>
                                            <td><?=$d['corpdetail_mail'];?></td>
                                            <td><?=$d['corpdetail_linkedin'];?></td>
                                            <td><?=$d['corpdetail_phone'];?></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="convertPotential" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable" role="document">
        <form action="<?=base_url('bizdev/corporate-program/save/'.$corp['corp_id']);?>" method="post"
            name="addProgram">
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
                                <select id="programName" name="prog_id">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($prog as $p): ?>
                                    <option value="<?=$p['prog_id'];?>"><?=$p['prog_sub'].' - '.$p['prog_program'];?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('prog_id', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Is Corporate Scheme ?</label>
                                <select id="corporateType" name="corprog_type">
                                    <option data-placeholder="true"></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                                <?=form_error('corprog_type', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>First Discuss</label>
                                <input name="corprog_datefirstdiscuss" type="date" class="form-control form-control-sm"
                                    value="First Discuss">
                                <?=form_error('corprog_datefirstdiscuss', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Last Discuss</label>
                                <input name="corprog_datelastdiscuss" type="date" class="form-control form-control-sm"
                                    value="Last Discuss" disabled>
                                <?=form_error('corprog_datelastdiscuss', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes</label>
                                <textarea name="corprog_notes" class="form-control form-control-sm" rows="5"></textarea>
                                <?=form_error('corprog_notes', '<small class="text-danger">', '</small>');?>
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
var PN = new SlimSelect({
    select: '#programName',
    placeholder: 'Select program name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var CT = new SlimSelect({
    select: '#corporateType',
    placeholder: 'Select corporate type',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
</script>