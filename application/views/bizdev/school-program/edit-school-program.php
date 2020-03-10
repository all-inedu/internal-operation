<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fa-fw fas fa-tags mt-1"></i>&nbsp;&nbsp; Schools Program
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/school-program/');?>">School Program</a>
                    </li>
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
                    <br>
                    <?php if($sprog['schprog_status']==1) { ?>
                    <span class="badge badge-pill badge-success p-1" data-toggle="tooltip" data-placement="top"
                        title="Success">
                        <i class="fa-fw fas fa-check fa-2x"></i>
                    </span>
                    <?php } else if($sprog['schprog_status']==0) { ?>
                    <span class="badge badge-pill badge-warning p-1 text-dark" data-toggle="tooltip"
                        data-placement="top" title="Pending">
                        <i class="far fa-clock fa-2x"></i>
                    </span>
                    <?php } else if($sprog['schprog_status']==2) { ?>
                    <span class="badge badge-pill badge-danger p-1 text-white" data-toggle="tooltip"
                        data-placement="top" title="Denied">
                        <i class="fa-fw fas fa-frown-open fa-2x"></i>
                    </span>
                    <?php } ?>


                    <h5 class="align-middle mt-2">
                        <?=$sprog['sch_name'];?></h5>
                    <div class="text-info mb-2">
                        <?php if($sprog['sch_mail']) { ?>
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$sprog['sch_mail'];?><br>
                        <?php } if($sprog['sch_phone']) { ?>
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$sprog['sch_phone'];?> &nbsp;
                        <?php } ?>
                    </div>
                    <h6 style="font-size:14px;" class="text-primary mb-2"><?=$sprog['prog_program'];?></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fa-fw fas fa-user"></i>&nbsp; &nbsp; Schools Program
                    <div class="float-right">
                        <a href="<?=base_url('bizdev/school-program/view/'.$sprog['schprog_id']);?>"
                            class="btn btn-sm btn-info"><i class="fa-fw fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="" method="post" name="editSchoolProg">
                    <div class="row">
                        <div class="col-md-3">
                            <label><i class="fa-fw fas fa-tag text-muted"></i>&nbsp; Program Name :</label>
                        </div>
                        <div class="col-md-9">
                            <?=$sprog['prog_program'];?>
                            <hr class="mt-1">
                        </div>

                        <div class="col-md-3">
                            <label><i class="fa-fw fas fa-calendar-alt text-muted"></i>&nbsp; First Discuss :</label>
                        </div>
                        <div class="col-md-9">
                            <?=date('d F Y', strtotime($sprog['schprog_datefirstdis']));?>
                            <hr class="mt-1">
                        </div>

                        <div class="col-md-3">
                            <label><i class="fa-fw fas fa-calendar text-muted"></i>&nbsp; Last Discuss :</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <small>Date</small>
                                    <input type="hidden" name="schprog_id" value="<?=$sprog['schprog_id'];?>">
                                    <input name="schprog_datelastdis" type="date" class="form-control form-control-sm"
                                        value="<?=date('Y-m-d');?>">
                                    <?=form_error('schprog_datelastdis', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-3">
                                    <small>Status</small>
                                    <select name="schprog_status" id="programStatus" onchange="programSuccess()">
                                        <option value="0">Pending</option>
                                        <option value="1">Success</option>
                                        <option value="2">Denied</option>
                                    </select>
                                    <?=form_error('schprog_status', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label><i class="fa-fw far fa-sticky-note text-muted"></i>&nbsp; Notes :</label>
                        </div>
                        <div class="col-md-9 mb-2">
                            <textarea name="schprog_notes" class="form-control form-control-sm"
                                rows="5"><?=$sprog['schprog_notes'];?></textarea>
                            <?=form_error('schprog_notes', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-3">


                        </div>
                        <div class="col-md-8 mt-1">
                            <button type="submit" class="btn btn-primary"><i class="fa-fw fas fa-save"></i>&nbsp; Save
                                changes</button>
                            <?php if($sprog['schprog_status']==1) {?>
                            <button type="button" class="btn btn-sm btn-info ml-2" id="programExec" data-toggle="modal"
                                data-target="#addProg"><i class="fa-fw fas fa-plus"></i> Add Program
                                Execution</button>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if(($pexec) AND ($sprog['schprog_status']==1)) { ?>
        <div class="card shadow mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Program Execution</h6>
                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    </div>
                    <form
                        action="<?=base_url('bizdev/school-program/update-program-execution/'.$sprog['schprog_id']);?>"
                        method="post" name="updateProgramExec">
                        <div class="container">
                            <div class="row p-0">
                                <div class="col-md-3 mb-2">
                                    <label><i class="fa-fw fas fa-calendar-alt text-muted"></i>&nbsp; Date :</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input name="schprogfix_id" type="hidden"
                                                value="<?=$pexec['schprogfix_id'];?>">
                                            <small class="font-weight-bold">Start Date : </small> <br>
                                            <input name="schprogfix_eventstartdate" type="date"
                                                class="form-control form-control-sm"
                                                value="<?=$pexec['schprogfix_eventstartdate'];?>">
                                            <?=form_error('schprogfix_eventstartdate', '<small class="text-danger">', '</small>');?>
                                        </div>
                                        <div class="col-md-3">
                                            <small class="font-weight-bold">End Date : </small> <br>
                                            <input name="schprogfix_eventenddate" type="date"
                                                class="form-control form-control-sm"
                                                value="<?=$pexec['schprogfix_eventenddate'];?>">
                                            <?=form_error('schprogfix_eventenddate', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label><i class="fa-fw fas fa-map-marker text-muted"></i>&nbsp; Place :</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input name="schprogfix_eventplace" type="text"
                                                class="form-control form-control-sm"
                                                value="<?=$pexec['schprogfix_eventplace'];?>">
                                            <?=form_error('schprogfix_eventplace', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label><i class="fa-fw fas fa-user-friends text-muted"></i>&nbsp; Participans
                                        :</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input name="schprogfix_participantsnum" type="number"
                                                class="form-control form-control-sm"
                                                value="<?=$pexec['schprogfix_participantsnum'];?>">
                                            <?=form_error('schprogfix_participantsnum', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label><i class="fa-fw fas fa-clock text-muted"></i>&nbsp; Total Hours :</label>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input name="schprogfix_totalhours" type="number"
                                                class="form-control form-control-sm"
                                                value="<?=$pexec['schprogfix_totalhours'];?>">
                                            <?=form_error('schprogfix_totalhours', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label><i class="fa-fw fas fa-question-circle text-muted"></i>&nbsp; Status
                                        :</label>
                                </div>
                                <div class="col-md-9 mb-2">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <select type="text" id="schprogfix_status" name="schprogfix_status"
                                                    class="form-control form-control-sm">
                                                    <option value="0">Not Yet</option>
                                                    <option value="1">Running</option>
                                                    <option value="2">Done</option>
                                                    <option value="3">Not Running</option>
                                                </select>
                                                <?=form_error('schprogfix_status', '<small class="text-danger">', '</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label><i class="fa-fw far fa-sticky-note text-muted"></i>&nbsp; Notes :</label>
                                </div>
                                <div class="col-md-9 mb-2">
                                    <textarea type="text" name="schprogfix_notes" class="form-control form-control-sm"
                                        rows="5"><?=$pexec['schprogfix_notes'];?></textarea>
                                    <?=form_error('schprogfix_notes', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-3">


                                </div>
                                <div class="col-md-8 mt-1">
                                    <button type="submit" class="btn btn-warning"><i
                                            class="fa-fw fas fa-save"></i>&nbsp;
                                        Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addProg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="<?=base_url('bizdev/school-program/save-program-execution/'.$sprog['schprog_id']);?>"
            method="post" name="programExecution">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Program Execution</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input name="schprog_id" type="hidden" value="<?=$sprog['schprog_id'];?>">
                                <input name="schprogfix_eventstartdate" type="date"
                                    class="form-control form-control-sm">
                                <?=form_error('schprogfix_eventstartdate', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End Date</label>
                                <input name="schprogfix_eventenddate" type="date" class="form-control form-control-sm">
                                <?=form_error('schprogfix_eventenddate', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Place</label>
                                <input name="schprogfix_eventplace" type="text" class="form-control form-control-sm"
                                    placeholder="Place">
                                <?=form_error('schprogfix_eventplace', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Participans</label>
                                <input name="schprogfix_participantsnum" type="number"
                                    class="form-control form-control-sm">
                                <?=form_error('schprogfix_participantsnum', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Total Hours</label>
                                <input name="schprogfix_totalhours" type="number" class="form-control form-control-sm">
                                <?=form_error('schprogfix_totalhours', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select type="text" name="schprogfix_status" class="form-control form-control-sm">
                                    <option value="0">Not Yet</option>
                                    <option value="1">Running</option>
                                    <option value="2">Done</option>
                                    <option value="3">Not Running</option>
                                </select>
                                <?=form_error('schprogfix_status', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes</label>
                                <textarea type="text" name="schprogfix_notes" class="form-control form-control-sm"
                                    rows="5"></textarea>
                                <?=form_error('schprogfix_notes', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa-fw fas fa-save"></i>&nbsp; Save</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
var PS = new SlimSelect({
    select: '#programStatus',
    placeholder: 'Select program status ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
PS.set('<?=$sprog["schprog_status"];?>');

$("#schprogfix_status").val("<?=$pexec['schprogfix_status'];?>");
</script>