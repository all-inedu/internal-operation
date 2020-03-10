<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Schools Program
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
                        <i class="fas fa-check fa-2x"></i>
                    </span>
                    <?php } else if($sprog['schprog_status']==0) { ?>
                    <span class="badge badge-pill badge-warning p-1 text-dark" data-toggle="tooltip"
                        data-placement="top" title="Pending">
                        <i class="far fa-clock fa-2x"></i>
                    </span>
                    <?php } else if($sprog['schprog_status']==2) { ?>
                    <span class="badge badge-pill badge-danger p-1 text-white" data-toggle="tooltip"
                        data-placement="top" title="Denied">
                        <i class="fas fa-frown-open fa-2x"></i>
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
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <a href="<?=base_url('bizdev/school/view/'.$sprog['sch_id']);?>" class="btn btn-sm btn-info m-1"><i
                            class="fas fa-search"></i>&nbsp; Profile</a><br>

                    <a href="<?=base_url('bizdev/school-program/edit/'.$sprog['schprog_id']);?>"
                        class="btn btn-sm btn-primary m-1"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                    <a href="<?=base_url('bizdev/school-program/delete/'.$sprog['schprog_id']);?>"
                        class="delete-button btn btn-sm btn-danger m-1" data-message="schools program"><i
                            class="fas fa-trash"></i>&nbsp; Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Schools Program
                    <div class="float-right">
                        <a href="<?=base_url('bizdev/school-program/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-3">
                        <label><i class="fas fa-tag text-muted"></i>&nbsp; Program Name :</label>
                    </div>
                    <div class="col-md-9">
                        <?=$sprog['prog_program'];?>
                        <hr class="mt-1">
                    </div>

                    <div class="col-md-3">
                        <label><i class="fas fa-calendar-alt text-muted"></i>&nbsp; First Discuss :</label>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <?=date('d F Y', strtotime($sprog['schprog_datefirstdis']));?>
                                <hr class="mt-1">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label><i class="fas fa-calendar text-muted"></i>&nbsp; Last Discuss :</label>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <?=date('d F Y', strtotime($sprog['schprog_datelastdis']));?>
                                <hr class="mt-1">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label><i class="far fa-sticky-note text-muted"></i>&nbsp; Notes :</label>
                    </div>
                    <div class="col-md-9">
                        <?=$sprog['schprog_notes'];?>
                    </div>

                </div>
                <?php if(($pexec) AND ($sprog['schprog_status']==1)) { ?>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label class="font-weight-bold">Program Execution</label>
                    </div>
                    <div class="container">
                        <div class="row p-0">
                            <div class="col-md-3 mb-2">
                                <label><i class="fas fa-calendar-alt text-muted"></i>&nbsp; Date :</label>
                            </div>
                            <div class="col-md-9 mb-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <small class="font-weight-bold">Start Date : </small> <br>
                                        <?=date('d F Y', strtotime($pexec['schprogfix_eventstartdate']));?>
                                        <hr class="mt-1">
                                    </div>
                                    <div class="col-md-3">
                                        <small class="font-weight-bold">End Date : </small> <br>
                                        <?=date('d F Y', strtotime($pexec['schprogfix_eventenddate']));?>
                                        <hr class="mt-1">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-2">
                                <label><i class="fas fa-search-location text-muted"></i>&nbsp; Place :</label>
                            </div>
                            <div class="col-md-9 mb-2">
                                <?=$pexec['schprogfix_eventplace'];?>
                                <hr class="mt-1">
                            </div>

                            <div class="col-md-3 mb-2">
                                <label><i class="fas fa-user-friends text-muted"></i>&nbsp; Participans :</label>
                            </div>
                            <div class="col-md-9 mb-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <?=$pexec['schprogfix_participantsnum'];?> Person
                                        <hr class="mt-1">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-2">
                                <label><i class="fas fa-clock text-muted"></i>&nbsp; Total Hours :</label>
                            </div>
                            <div class="col-md-9 mb-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?=$pexec['schprogfix_totalhours'];?> Hours
                                        <hr class="mt-1">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-2">
                                <label><i class="fas fa-question-circle text-muted"></i>&nbsp; Status :</label>
                            </div>
                            <div class="col-md-9 mb-2">
                                <?php if($pexec['schprogfix_status']==0) { ?>
                                <label class="badge badge-info p-1">Not Yet</label>
                                <?php } else if($pexec['schprogfix_status']==1) { ?>
                                <label class="badge badge-primary p-1">Running</label>
                                <?php } else if($pexec['schprogfix_status']==2) { ?>
                                <label class="badge badge-success p-1">Done</label>
                                <?php } else if($pexec['schprogfix_status']==3) { ?>
                                <label class="badge badge-danger p-1">Not Running</label>
                                <?php } ?>
                            </div>

                            <div class="col-md-3 mb-2">
                                <label><i class="far fa-sticky-note text-muted"></i>&nbsp; Notes :</label>
                            </div>
                            <div class="col-md-9 mb-2">
                                <?=$pexec['schprogfix_notes'];?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>