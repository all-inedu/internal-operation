<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Influencer
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/influencer/');?>"> Influencer</a> </li>
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
                    <img src="<?=base_url('assets/img/user/infl.svg');?>" alt="employee" width="30%"><br><br>
                    <h5 class="align-middle mt-2">
                        <?=$infl['infl_fn'];?>
                    </h5>
                    <div class="line" style="margin-top:15px; margin-bottom:10px;"></div>
                    <div class="mb-2">
                        <?php
                            if($infl['infl_status']==1){echo '<div class="p-1 badge badge-success">Active</div>';} else
                            if($infl['infl_status']==2){echo '<div class="p-1 badge badge-danger">Not Active</div>';}
                        ?>
                    </div>
                    <div class="text-info">
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$infl['infl_phone'];?> &nbsp; | &nbsp;
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$infl['infl_mail'];?>
                    </div>
                    <div class="row text-center">
                        <div class="col mt-2">
                            <a href="<?=base_url('hr/influencer/edit/'.$infl['infl_id']);?>"
                                class="btn btn-sm btn-info m-1"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                            <?php if($infl['infl_status']==1){ ?>
                            <a href="<?=base_url('hr/influencer/deactivate/'.$infl['infl_id']);?>"
                                class="btn btn-sm btn-danger m-1 convert-button"
                                data-message="Deactivate this influencer ?"><i class="fas fa-user-times"></i>&nbsp;
                                Deactivate</a>
                            <?php } else ?>
                            <?php if($infl['infl_status']==2){ ?>
                            <a href="<?=base_url('hr/influencer/activate/'.$infl['infl_id']);?>"
                                class="btn btn-sm btn-success m-1 convert-button"
                                data-message="Activate this influencer ?"><i class="fas fa-user-check"></i>&nbsp;
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
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Influencer Profile
                    <div class="float-right">
                        <a href="<?=base_url('hr/influencer/');?>" class="btn btn-sm btn-info"><i
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
                        <?=$infl['infl_fn'];?>
                        <hr class="m-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-envelope fa-fw text-muted"></i>&nbsp; Email :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$infl['infl_mail'];?>
                        <hr class="m-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-thumbtack fa-fw text-muted"></i>&nbsp; Address :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$infl['infl_address'];?>
                        <hr class="m-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-phone fa-fw text-muted"></i>&nbsp; Phone Number :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$infl['infl_phone'];?>
                        <hr class="m-0">
                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4">
                        <label><i class="fas fa-dollar-sign fa-fw text-muted"></i>&nbsp; Position :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        Rp. <?=number_format($infl['infl_feeperpost']);?>
                    </div>
                </div>

                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="font-weight-bold mb-3">Attachment</label>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <div class="card  text-center">
                                    <div class="card-body">
                                        <b>Bank Account</b>
                                    </div>
                                    <div class="card-footer p-1">
                                        <?php 
                                    if(empty($infl['infl_bankacc'])) { 
                                        echo '<div class="p-1">Not Available</div>'; 
                                    } else { 
                                        echo '<div class="p-1">'.$infl['infl_banknm']." - ". $infl['infl_bankacc'].'</div>' ;
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="card  text-center">
                                    <div class="card-body">
                                        <b>KTP</b>
                                    </div>
                                    <div class="card-footer p-1">
                                        <?php 
                                    if(empty($infl['infl_ktp'])) { 
                                        echo '<div class="p-1">Not Available</div>'; 
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/influencer/KTP/'.$infl['infl_ktp'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="card  text-center">
                                    <div class="card-body">
                                        <b>NPWP</b>
                                    </div>
                                    <div class="card-footer p-1">
                                        <?php 
                                    if(empty($infl['infl_npwp'])) { 
                                        echo '<div class="p-1">Not Available</div>'; 
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/influencer/NPWP/'.$infl['infl_npwp'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";
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