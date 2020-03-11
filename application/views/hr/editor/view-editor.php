<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Editor
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/editor/');?>"> Editor</a> </li>
                    <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>


<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card shadow card-sticky">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/user/editor.svg');?>" alt="employee" width="30%"><br><br>
                    <h5 class="align-middle mt-2">
                        <?=$editor['editor_fn']." ".$editor['editor_ln'];?></h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-info">
                        <h6>
                            <?php 
                                if($editor['editor_position']==3){echo 'Managing Editor';} else
                                if($editor['editor_position']==2){echo 'Senior Editor';} 
                                else {echo 'Associate Editor';}
                            ?>
                            <small style="margin-top:-10px !important;">
                                <?php 
                                    if($editor['editor_status']==1){echo '<div class="badge badge-success">Active</div>';} else
                                    if($editor['editor_status']==2){echo '<div class="badge badge-danger">Not Active</div>';} else {echo '<div class="badge badge-warning">Potential</div>';}
                                ?>
                            </small>
                        </h6>
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$editor['editor_phone'];?> &nbsp; | &nbsp;
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$editor['editor_mail'];?>
                    </div>
                    <div class="row text-center">
                        <div class="col mt-2">
                            <a href="<?=base_url('hr/editor/edit/'.$editor['editor_id']);?>"
                                class="btn btn-sm btn-info m-1"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                            <?php if($editor['editor_status']==1) { ?>
                            <a href="<?=base_url('hr/editor/deactivate/'.$editor['editor_id']);?>"
                                class="btn btn-sm btn-danger m-1 convert-button"
                                data-message="Deactivate this editor ?"><i class="fas fa-user-times"></i>&nbsp;
                                Deactivate</a>
                            <?php } else { ?>
                            <a href="<?=base_url('hr/editor/activate/'.$editor['editor_id']);?>"
                                class="btn btn-sm btn-success m-1 convert-button"
                                data-message="Activate this editor ?"><i class="fas fa-user-check"></i>&nbsp;
                                Activate</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Editor Profile
                    <div class="float-right">
                        <a href="<?=base_url('hr/editor/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="font-weight-bold mb-3">Personal Information</label>
                    </div>
                    <div class="col-md-4">
                        <label><i class="fas fa-id-card fa-fw text-muted"></i>&nbsp; Full Name :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$editor['editor_fn']." ".$editor['editor_ln'];?>
                        <hr class="m-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-envelope fa-fw text-muted"></i>&nbsp; Email :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$editor['editor_mail'];?>
                        <hr class="m-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-thumbtack fa-fw text-muted"></i>&nbsp; Address :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$editor['editor_address'];?>
                        <hr class="m-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-phone fa-fw text-muted"></i>&nbsp; Phone Number :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$editor['editor_phone'];?>
                        <hr class="m-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-university fa-fw text-muted"></i>&nbsp; Graduated From
                            :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$editor['univ_name'];?>
                        <hr class="m-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-tag fa-fw text-muted"></i>&nbsp; Major
                            :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$editor['editor_major'];?>
                        <hr class="m-0">
                    </div>

                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4">
                        <label><i class="fas fa-crosshairs fa-fw text-muted"></i>&nbsp; Position :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <small>Status</small><br>
                                <?php 
                                    if($editor['editor_position']==3){echo 'Managing Editor';} else
                                    if($editor['editor_position']==2){echo 'Senior Editor';} 
                                    else {echo 'Associate Editor';}
                                ?>
                                <hr class="m-0">
                            </div>
                            <div class="col-md-7">
                                <small>Fee per Hours</small><br>
                                Rp. <?=number_format($editor['editor_feephours']);?>
                                <hr class="m-0">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="font-weight-bold mb-3">Attachment</label>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="card  text-center">
                                    <div class="card-body">
                                        <b>Curriculum Vitae</b>
                                    </div>
                                    <div class="card-footer p-1">
                                        <?php 
                                    if(empty($editor['editor_cv'])) { 
                                        echo '<div class="p-1">Not Available</div>';
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/editor/CV/'.$editor['editor_cv'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";   
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card  text-center">
                                    <div class="card-body">
                                        <b>Bank Account</b>
                                    </div>
                                    <div class="card-footer p-1">
                                        <?php 
                                    if(empty($editor['editor_bankacc'])) { 
                                        echo '<div class="p-1">Not Available</div>'; 
                                    } else { 
                                        echo '<div class="p-1">'.$editor['editor_bankname']." - ". $editor['editor_bankacc'].'</div>' ;
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card  text-center">
                                    <div class="card-body">
                                        <b>KTP</b>
                                    </div>
                                    <div class="card-footer p-1">
                                        <?php 
                                    if(empty($editor['editor_ktp'])) { 
                                        echo '<div class="p-1">Not Available</div>'; 
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/editor/KTP/'.$editor['editor_ktp'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card  text-center">
                                    <div class="card-body">
                                        <b>NPWP</b>
                                    </div>
                                    <div class="card-footer p-1">
                                        <?php 
                                    if(empty($editor['editor_npwp'])) { 
                                        echo '<div class="p-1">Not Available</div>'; 
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/editor/NPWP/'.$editor['editor_npwp'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>