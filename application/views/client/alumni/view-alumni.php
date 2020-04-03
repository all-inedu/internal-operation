<style>
.ui-autocomplete {
    z-index: 2147483647 !important;
}
</style>
<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; View Alumni
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('client/alumni');?>">Alumni List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Alumni</li>
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
                    <h5>View Alumni</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">
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
                        Students Name :
                    </div>
                    <div class="col-md-9">
                        <?=$alumni['st_firstname'].' '.$alumni['st_lastname'];?>
                        <hr style="margin-top:5px; margin-bottom:15px;">
                    </div>

                    <div class="col-md-3">
                        Email :
                    </div>
                    <div class="col-md-9">
                        <?=$alumni['st_mail'];?>
                        <hr style="margin-top:5px; margin-bottom:15px;">
                    </div>

                    <div class="col-md-3">
                        School Name :
                    </div>
                    <div class="col-md-9">
                        <?=$alumni['sch_name'];?>
                        <hr style="margin-top:5px; margin-bottom:15px;">
                    </div>

                    <div class="col-md-3">
                        Graduated Date :
                    </div>
                    <div class="col-md-9">
                        <?=date('d F Y', strtotime($alumni['alu_graduatedate']));?>
                        <hr style="margin-top:5px; margin-bottom:15px;">
                    </div>

                    <div class="col-md-12">
                        <div class="text-right">
                            <button class="btn btn-sm btn-info" type="button" data-toggle="modal"
                                data-target="#addUniv">Add University</button>
                        </div>
                        <br>
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <th class="bg-primary text-white">University Name</th>
                                <th>Major</th>
                                <th>Status</th>
                            </tr>

                            <?php foreach ($alumni_detail as $aludetail) : ?>
                            <?php
                                $status_check = $aludetail['aludetail_status'];
                                if($status_check==2) { $status='Accepted'; } else 
                                if($status_check==3) { $status='Selected Uni'; } else
                                { $status='Waitlist'; } 
                            ?>
                            <tr class="text-center">
                                <td class="text-left" style="cursor:pointer"
                                    onclick="editUniversity(<?=$aludetail['aludetail_id'];?>)" data-toggle="modal"
                                    data-target="#editUniv">
                                    <?=$aludetail['univ_name'];?></td>
                                <td><?=$aludetail['aludetail_major'];?></td>
                                <td><?=$status;?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addUniv" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="<?=base_url('client/alumni/add-detail/'.$alumni['alu_id']);?>" method="post" name="update">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit University</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>University Name</label>
                            <select name="univ_id" id="univ1">
                                <option data-placeholder="true"></option>
                                <?php foreach ($university as $univ): ?>
                                <option value="<?=$univ['univ_id'];?>">
                                    <?=$univ['univ_name'];?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Major</label>
                            <input type="text" name="aludetail_major" class="form-control form-control-sm" id="major1">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <select name="aludetail_status" id="status1">
                                <option data-placeholder="true"></option>
                                <option value="1">Waitlist</option>
                                <option value="2">Accepted</option>
                                <option value="3">Selected Uni</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="editUniv" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="<?=base_url('client/alumni/update-detail/'.$alumni['alu_id']);?>" method="post" name="update">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit University</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="hidden" name="aludetail_id" id="aludetail_id">
                            <label>University Name</label>
                            <select name="univ_id" id="univ2">
                                <option data-placeholder="true"></option>
                                <?php foreach ($university as $univ): ?>
                                <option value="<?=$univ['univ_id'];?>">
                                    <?=$univ['univ_name'];?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Major</label>
                            <input type="text" name="aludetail_major" class="form-control form-control-sm" id="major2">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <select name="aludetail_status" id="status2">
                                <option data-placeholder="true"></option>
                                <option value="1">Waitlist</option>
                                <option value="2">Accepted</option>
                                <option value="3">Selected Uni</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <div class="float-left">
                                <a href="" class="btn btn-sm btn-outline-danger cancel-button float-left"
                                    data-message="university" id="delete">
                                    <i class="icofont-trash"></i> Delete
                                </a>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="icofont-save"></i> Save changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
$(document).ready(function() {
    var states = '<?=implode(", ", $major);?>';
    var arr = states.split(", ")
    $("#major1").autocomplete({
        source: arr
    });
    $("#major2").autocomplete({
        source: arr
    });
});

new SlimSelect({
    select: '#univ1',
    placeholder: 'Select university name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
let UNIV = new SlimSelect({
    select: '#univ2',
    placeholder: 'Select university name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#status1',
    placeholder: 'Select status name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
let ST = new SlimSelect({
    select: '#status2',
    placeholder: 'Select status name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

function editUniversity(x) {
    $.ajax({
        type: 'post',
        url: '<?=base_url("client/alumni/view-detail/");?>' + x,
        dataType: 'json',
        success: function(data) {
            $('#aludetail_id').val(data.aludetail_id);
            UNIV.set(data.univ_id);
            $('#major2').val(data.aludetail_major);
            ST.set(data.aludetail_status);
            $("#delete").attr("href", '../delete-detail/' + data.aludetail_id + '/<?=$alumni["alu_id"];?>');
        }
    });
}
</script>