<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Mentor
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/mentor/list');?>"> Mentor</a> </li>
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
                    <img src="<?=base_url('assets/img/employee.png');?>" alt="mentor" width="60%"><br><br>
                    <h5 class="align-middle mt-2">
                        <?=$mentor['mt_firstn']." ".$mentor['mt_lastn'];?></h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-info">
                        <p>
                            <h6><?php
                                if($mentor['mt_istutor']==1){echo 'Mentor';} else 
                                if($mentor['mt_istutor']==2){echo 'Mentor & Tutor';} else
                                if($mentor['mt_istutor']==3){echo 'Tutor';}
                            ?>

                                <small style="margin-top:-10px !important;">
                                    <?php
                                        if($mentor['mt_status']==0){echo '<div class="badge badge-danger">Potential</div>';} else 
                                        if($mentor['mt_status']==1){echo '<div class="badge badge-success">Active</div>';} else
                                        if($mentor['mt_status']==2){echo '<div class="badge badge-danger">Not Active</div>';}
                                    ?>
                                </small>
                            </h6>
                            <i class="fas fa-phone text-danger"></i>&nbsp; <?=$mentor['mt_phone'];?> &nbsp; | &nbsp;
                            <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$mentor['mt_email'];?>
                        </p>
                    </div>
                    <div class="row text-center">
                        <div class="col mt-2">
                            <a href="<?=base_url('hr/mentor/edit/'.$mentor['mt_id']);?>"
                                class="btn btn-sm btn-info m-1"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                            <?php if($mentor['mt_status']==1){ ?>
                            <a href="<?=base_url('hr/mentor/deactivate/'.$mentor['mt_id']);?>"
                                class="btn btn-sm btn-danger m-1 convert-button"
                                data-message="Deactivate this mentor ?"><i class="fas fa-user-times"></i>&nbsp;
                                Deactivate</a>
                            <?php } else ?>
                            <?php if($mentor['mt_status']==2){ ?>
                            <a href="<?=base_url('hr/mentor/activate/'.$mentor['mt_id']);?>"
                                class="btn btn-sm btn-success m-1 convert-button"
                                data-message="Activate this mentor ?"><i class="fas fa-user-check"></i>&nbsp;
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
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Mentor Profile
                    <div class="float-right">
                        <a href="<?=base_url('hr/mentor/list/');?>" class="btn btn-sm btn-info"><i
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
                        <?=$mentor['mt_firstn']." ".$mentor['mt_lastn'];?>
                        <hr class="mt-1 m-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-envelope fa-fw text-muted"></i>&nbsp; Email :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$mentor['mt_email'];?>
                        <hr class="mt-1 m-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-thumbtack fa-fw text-muted"></i>&nbsp; Address :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$mentor['mt_address'];?>
                        <hr class="mt-1 m-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-phone fa-fw text-muted"></i>&nbsp; Phone Number :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$mentor['mt_phone'];?>
                        <hr class="mt-1 m-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-university fa-fw text-muted"></i>&nbsp; Graduated From
                            :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$mentor['univ_name'];?>
                        <hr class="mt-1 m-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-tag fa-fw text-muted"></i>&nbsp; Major
                            :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$mentor['mt_major'];?>
                        <hr class="mt-1 m-0">
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
                                    if($mentor['mt_istutor']==1){echo 'Mentor';} else 
                                    if($mentor['mt_istutor']==2){echo 'Mentor & Tutor';} else
                                    if($mentor['mt_istutor']==3){echo 'Tutor';}
                                ?>
                                <hr class="mt-1 m-0">
                            </div>
                            <?php 
                                if($mentor['mt_istutor']>1) { 
                            ?>
                            <div class="col-md-7">
                                <small>Tutoring Subject</small><br>
                                IB
                                <hr class="mt-1 m-0">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-dollar-sign fa-fw  text-muted"></i>&nbsp; Fee
                            :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <small>Fee per Hours</small><br>
                                Rp. <?=number_format($mentor['mt_feehours']);?>
                                <hr class="mt-1 m-0">
                            </div>
                            <div class="col-md-7">
                                <small>Fee per Session</small><br>
                                Rp. <?=number_format($mentor['mt_feesession']);?>
                                <hr class="mt-1 m-0">
                            </div>
                            <?php 
                                }
                            ?>
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
                                    if(empty($mentor['mt_cv'])) { 
                                        echo '<div class="p-1">Not Available</div>';
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/mentor/CV/'.$mentor['mt_cv'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";   
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
                                    if(empty($mentor['mt_bankacc'])) { 
                                        echo '<div class="p-1">Not Available</div>'; 
                                    } else { 
                                        echo '<div class="p-1">'.$mentor['mt_banknm']." - ". $mentor['mt_bankacc'].'</div>' ;
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
                                    if(empty($mentor['mt_ktp'])) { 
                                        echo '<div class="p-1">Not Available</div>'; 
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/mentor/KTP/'.$mentor['mt_ktp'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";
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
                                    if(empty($mentor['mt_npwp'])) { 
                                        echo '<div class="p-1">Not Available</div>'; 
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/mentor/NPWP/'.$mentor['mt_npwp'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-danger">Not Available</h5>
                        <label class="font-weight-bold mb-3">Student List</label>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th width="1%">No</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>School Name</th>
                                    <th>Class</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>Full Name</td>
                                    <td>Email</td>
                                    <td>School Name</td>
                                    <td>Class</td>
                                </tr>
                                <tr class="text-center">
                                    <td>2</td>
                                    <td>Full Name</td>
                                    <td>Email</td>
                                    <td>School Name</td>
                                    <td>Class</td>
                                </tr>
                                <tr class="text-center">
                                    <td>3</td>
                                    <td>Full Name</td>
                                    <td>Email</td>
                                    <td>School Name</td>
                                    <td>Class</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>