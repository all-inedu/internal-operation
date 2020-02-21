<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Potential Mentor
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/mentor/potential');?>">Potential Mentor</a>
                    </li>
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
                    <img src="<?=base_url('assets/img/employee.png');?>" alt="employee" width="60%"><br><br>
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
                            </h6>
                            <i class="fas fa-phone text-danger"></i>&nbsp; <?=$mentor['mt_phone'];?> &nbsp; | &nbsp;
                            <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$mentor['mt_email'];?>
                        </p>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <a href="<?=base_url('hr/mentor/potential/edit/'.$mentor['id']);?>"
                                class="btn btn-sm btn-info m-1"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                            <a href="<?=base_url('hr/mentor/convert/'.$mentor['id']);?>"
                                class="btn btn-sm btn-success m-1 convert-button" data-message="Convert to mentor ?"><i
                                    class="fas fa-plus"></i>&nbsp;
                                Convert</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Potential Mentor Profile
                    <div class="float-right">
                        <a href="<?=base_url('hr/mentor/potential/');?>" class="btn btn-sm btn-info"><i
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
                        <hr class="mt-1 mb-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-envelope fa-fw text-muted"></i>&nbsp; Email :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$mentor['mt_email'];?>
                        <hr class="mt-1 mb-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-thumbtack fa-fw text-muted"></i>&nbsp; Address :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$mentor['mt_address'];?>
                        <hr class="mt-1 mb-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-phone fa-fw text-muted"></i>&nbsp; Phone Number :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$mentor['mt_phone'];?>
                        <hr class="mt-1 mb-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-university fa-fw text-muted"></i>&nbsp; Graduated From
                            :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$mentor['univ_name'];?>
                        <hr class="mt-1 mb-0">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-tag fa-fw text-muted"></i>&nbsp; Major
                            :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=$mentor['mt_major'];?>
                        <hr class="mt-1 mb-0">
                    </div>

                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4">
                        <label><i class="fas fa-crosshairs fa-fw text-muted"></i>&nbsp; Position :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <div class="row">
                            <div class="col-md-5">
                                <small>Status :</small><br>
                                <?php
                                    if($mentor['mt_istutor']==1){echo 'Mentor';} else 
                                    if($mentor['mt_istutor']==2){echo 'Mentor & Tutor';} else
                                    if($mentor['mt_istutor']==3){echo 'Tutor';}
                                ?>
                                <hr class="mt-1 mb-0">
                            </div>
                            <div class="col-md-7">
                                <small>Tutoring Subject :</small><br>
                                <?=$mentor['mt_tsubject'];?>
                                <hr class="mt-1 mb-0">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-calendar-alt fa-fw  text-muted"></i>&nbsp; Last Contact
                            :</label>
                    </div>
                    <div class="col-md-7 mb-3">
                        <?=date('d M Y', strtotime($mentor['mt_lastcontactdate']));?>
                        <hr class="mt-1 mb-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>