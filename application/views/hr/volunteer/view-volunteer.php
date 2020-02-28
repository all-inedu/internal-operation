<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Volunteer
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/volunteer/');?>"> Volunteer</a> </li>
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
                    <img src="<?=base_url('assets/img/user/volunt.svg');?>" alt="employee" width="30%"><br><br>
                    <h5 class="align-middle mt-2">
                        <?=$volunt['volunt_firstname']." ".$volunt['volunt_lastname'];?></h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <?php
                        if($volunt['volunt_status']==1){echo '<div class="p-1 badge badge-success">Active</div>';} else
                        if($volunt['volunt_status']==2){echo '<div class="p-1 badge badge-danger">Not Active</div>';}
                    ?>
                    <div class="text-info mt-2">
                        <i class="fas fa-phone text-danger"></i>&nbsp;
                        <?=$volunt['volunt_phone'];?>
                        &nbsp; | &nbsp;
                        <i class="fas fa-envelope text-danger"></i>&nbsp;
                        <?=$volunt['volunt_mail'];?>
                    </div>
                    <div class="row text-center">
                        <div class="col mt-2">
                            <a href="<?=base_url('hr/volunteer/edit/'.$volunt['volunt_id']);?>"
                                class="btn btn-sm btn-info m-1"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                            <?php if($volunt['volunt_status']==1){ ?>
                            <a href="<?=base_url('hr/volunteer/deactivate/'.$volunt['volunt_id']);?>"
                                class="btn btn-sm btn-danger m-1 convert-button"
                                data-message="Deactivate this volunteer ?"><i class="fas fa-user-times"></i>&nbsp;
                                Deactivate</a>
                            <?php } else ?>
                            <?php if($volunt['volunt_status']==2){ ?>
                            <a href="<?=base_url('hr/volunteer/activate/'.$volunt['volunt_id']);?>"
                                class="btn btn-sm btn-success m-1 convert-button"
                                data-message="Activate this volunteer ?"><i class="fas fa-user-times"></i>&nbsp;
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
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Volunteer Profile
                    <div class="float-right">
                        <a href="<?=base_url('hr/volunteer/');?>" class="btn btn-sm btn-info"><i
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
                        <?=$volunt['volunt_firstname']." ".$volunt['volunt_lastname'];?>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-envelope fa-fw text-muted"></i>&nbsp; Email :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$volunt['volunt_mail'];?>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-thumbtack fa-fw text-muted"></i>&nbsp; Address :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$volunt['volunt_address'];?>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-phone fa-fw text-muted"></i>&nbsp; Phone Number :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$volunt['volunt_phone'];?>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-university fa-fw text-muted"></i>&nbsp; Graduated From
                            :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$volunt['volunt_graduatedfr'];?>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-tag fa-fw text-muted"></i>&nbsp; Major
                            :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$volunt['volunt_major'];?>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-tag fa-fw text-muted"></i>&nbsp; Position
                            :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$volunt['volunt_position'];?>
                        <hr class="mt-1 mb-1">
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
                                        <b>KTP</b>
                                    </div>
                                    <div class="card-footer p-1">
                                        <?php 
                                    if(empty($volunt['volunt_idcard'])) { 
                                        echo '<div class="p-1">Not Available</div>'; 
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/volunteer/KTP/'.$volunt['volunt_idcard'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";
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
                                    if(empty($volunt['volunt_npwp'])) { 
                                        echo '<div class="p-1">Not Available</div>'; 
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/volunteer/NPWP/'.$volunt['volunt_npwp'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";
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