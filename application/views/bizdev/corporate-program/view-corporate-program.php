<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Corporate Program
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/corporate/');?>">Corporate
                            </a>
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/corporate-program/');?>">Corporate
                            Program</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>

<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card shadow card-sticky">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/corporate.png');?>" alt="client management" width="50%"
                        class="mb-2"><br>
                    <?php if($cprog['corprog_status']==1) { ?>
                    <span class="badge badge-pill p-1 text-white" data-toggle="tooltip" data-placement="top"
                        title="Success" style="background:#C686FF;">
                        <i class="fas fa-check fa-2x"></i>
                    </span>
                    <?php } else if($cprog['corprog_status']==0) { ?>
                    <span class="badge badge-pill badge-info p-1 text-white" data-toggle="tooltip" data-placement="top"
                        title="Pending">
                        <i class="far fa-clock fa-2x"></i>
                    </span>
                    <?php } else if($cprog['corprog_status']==2) { ?>
                    <span class="badge badge-pill p-1 text-white" data-toggle="tooltip" data-placement="top"
                        title="Denied" style="background:#F27313;">
                        <i class="fas fa-frown-open fa-2x"></i>
                    </span>
                    <?php } ?>

                    <h5 class="align-middle mt-2">
                        <?=$cprog['corp_name'];?></h5>
                    <div class="text-info mb-2">
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$cprog['corp_mail'];?> <br>
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$cprog['corp_phone'];?> &nbsp; | &nbsp;
                        <i class="fab fa-instagram text-danger"></i>&nbsp; <?=$cprog['corp_insta'];?>
                    </div>
                    <h6 style="font-size:14px;" class="text-primary mb-2"><?=$cprog['prog_program'];?></h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <a href="<?=base_url('bizdev/corporate/view/'.$cprog['corp_id']);?>"
                        class="btn btn-sm btn-info m-1"><i class="fas fa-search"></i>&nbsp; Profile</a>
                    <a href="<?=base_url('bizdev/corporate-program/edit/'.$cprog['corprog_id']);?>"
                        class="btn btn-sm btn-primary m-1"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                    <a href="<?=base_url('bizdev/corporate-program/delete/'.$cprog['corprog_id']);?>"
                        class="delete-button btn btn-sm btn-danger m-1" data-message="corporate program">
                        <i class="fas fa-trash"></i>&nbsp; Delete
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="icofont-building-alt"></i>&nbsp; Corporate Program
                    <div class="float-right">
                        <a href="<?=base_url('bizdev/corporate-program/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-3">
                        <label><i class="fas fa-tag text-muted"></i>&nbsp; Program Name :</label>
                    </div>
                    <div class="col-md-9 mb-2">
                        <?=$cprog['prog_program'];?>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-3">
                        <label><i class="fas fa-question-circle text-muted"></i>&nbsp; Is Corporate Scheme ? :</label>
                    </div>
                    <div class="col-md-9 mb-3">
                        <?php if($cprog['corprog_type']==1) { ?>
                        <div class="badge badge-success p-1 pl-3 pr-3">Yes</div>
                        <?php } else { ?>
                        <div class="badge badge-danger p-1 pl-3 pr-3">No</div>
                        <?php } ?>
                    </div>

                    <div class="col-md-3">
                        <label><i class="fas fa-calendar-alt text-muted"></i>&nbsp; First Discuss :</label>
                    </div>
                    <div class="col-md-9 mb-2">
                        <?=date('d F Y', strtotime($cprog['corprog_datefirstdiscuss']));?>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-3">
                        <label><i class="fas fa-calendar text-muted"></i>&nbsp; Last Discuss :</label>
                    </div>
                    <div class="col-md-9 mb-2">
                        <?=date('d F Y', strtotime($cprog['corprog_datelastdiscuss']));?>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-3">
                        <label><i class="far fa-sticky-note text-muted"></i>&nbsp; Notes :</label>
                    </div>
                    <div class="col-md-9 mb-2">
                        <?=$cprog['corprog_notes'];?>
                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    </div>

                </div>

                <?php if($cprog['corprog_status']==1) { ?>
                <div class="row">
                    <div class="col-md-9 offset-md-3">
                        <div class="row">

                            <?php for($i=1; $i<4; $i++) {?>
                            <?php if($cprog['corprog_file'.$i]) { ?>
                            <div class="col-md-4">
                                <div class="card border-left-0 border-right-0 shadow bg-light border-top">
                                    <div class="card-body p-2 my-auto"
                                        style="height:80px; text-align: center; line-height: 70px;">
                                        <div class="text-primary"
                                            style="vertical-align: middle; display: inline-block;line-height: 1.5;">
                                            <?=$cprog['corprog_file'.$i];?>
                                        </div>
                                    </div>
                                    <a href="<?=base_url('upload/corporate-program/'.$cprog['corprog_attach'.$i]);?>"
                                        target="_blank">
                                        <div class="card-footer p-2 text-center bg-secondary text-white">
                                            <i class="fas fa-file"></i> &nbsp; View / Download
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php } } ?>

                        </div>
                    </div>
                </div>
                <?php } ?>


            </div>
        </div>
    </div>
</div>