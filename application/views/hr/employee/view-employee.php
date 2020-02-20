<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Employee
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/employee');?>">Employee</a></li>
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
                    <img src="<?=base_url('assets/img/employee.png');?>" alt="employee" width="60%"><br><br>
                    <h5 class="align-middle mt-2">
                        <?=$empl['empl_firstname']." ".$empl['empl_lastname'];?></h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-info">
                        <p><?=$empl['empl_department'];?> <br>
                            <i class="fas fa-phone text-danger"></i>&nbsp; <?=$empl['empl_phone'];?> &nbsp; | &nbsp;
                            <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$empl['empl_email'];?></p>
                    </div>
                    <a href="<?=base_url('hr/employee/edit/'.strtolower($empl['empl_id']));?>"
                        class="btn btn-sm btn-primary m-1 pl-3 pr-3"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Employee Profile
                    <div class="float-right">
                        <a href="<?=base_url('hr/employee/');?>" class="btn btn-sm btn-info"><i
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
                    <div class="col-md-7 mb-2">
                        <label><?=$empl['empl_firstname']." ".$empl['empl_lastname'];?></label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-envelope fa-fw text-muted"></i>&nbsp; Email :</label>
                    </div>
                    <div class="col-md-7 mb-2">
                        <label><?=$empl['empl_email'];?></label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-thumbtack fa-fw text-muted"></i>&nbsp; Address :</label>
                    </div>
                    <div class="col-md-7 mb-2">
                        <label><?=$empl['empl_address'];?></label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-phone fa-fw text-muted"></i>&nbsp; Phone Number :</label>
                    </div>
                    <div class="col-md-7 mb-2">
                        <label><?=$empl['empl_phone'];?></label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-university fa-fw text-muted"></i>&nbsp; Graduated From
                            :</label>
                    </div>
                    <div class="col-md-7 mb-2">
                        <label><?=$empl['empl_graduatefr'];?></label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-tag fa-fw text-muted"></i>&nbsp; Major
                            :</label>
                    </div>
                    <div class="col-md-7 mb-2">
                        <label><?=$empl['empl_major'];?></label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-birthday-cake fa-fw  text-muted"></i>&nbsp; Date of Birth
                            :</label>
                    </div>
                    <div class="col-md-7 mb-2">
                        <label><?=date('d M Y', strtotime($empl['empl_datebirth']));?></label>
                        <hr class="mt-1 mb-1">
                    </div>

                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4">
                        <label><i class="fas fa-crosshairs fa-fw text-muted"></i>&nbsp; Position :</label>
                    </div>
                    <div class="col-md-7 mb-2">
                        <label><?=$empl['empl_department'];?></label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-calendar-alt fa-fw text-muted"></i>&nbsp; Hire Date :</label>
                    </div>
                    <div class="col-md-7 mb-2">
                        <label><?=date('d M Y', strtotime($empl['empl_hiredate']));?></label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-calendar fa-fw text-muted"></i>&nbsp; Length of Work :</label>
                    </div>
                    <div class="col-md-7 mb-2">
                        <label><?=date('Y')-date('Y', strtotime($empl['empl_hiredate'])) ;?> Years</label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="fas fa-calendar-times fa-fw text-muted"></i>&nbsp; Status
                            :</label>
                    </div>
                    <div class="col-md-7 mb-2">
                        <label><?=$empl['empl_status'];?></label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-4">
                        <label><i class="far fa-calendar-times fa-fw text-muted"></i>&nbsp; End Date
                            :</label>
                    </div>
                    <div class="col-md-7 mb-2">
                        <label><?=date('d M Y', strtotime($empl['empl_statusenddate']));?></label>
                        <hr class="mt-1 mb-1">
                    </div>


                    <div class="col-md-4">
                        <label><i class="far fa-times-circle text-muted"></i>&nbsp; Is Resign / Out of Company
                            ? :</label>
                    </div>
                    <div class="col-md-7 mb-2">
                        <label><?=$empl['empl_isresign'];?></label>
                        <hr class="mt-1 mb-1">
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
                                        <b>Curriculum Vitae</b>
                                    </div>
                                    <div class="card-footer p-1">
                                        <?php 
                                    if(empty($empl['empl_cv'])) { 
                                        echo 'Not Available';
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/employee/CV/'.$empl['empl_cv'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";   
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="card  text-center">
                                    <div class="card-body">
                                        <b>Bank Account</b>
                                    </div>
                                    <div class="card-footer p-2">
                                        <?php 
                                    if(empty($empl['empl_bankaccount'])) { 
                                        echo 'Not Available'; 
                                    } else { 
                                        echo $empl['empl_bankaccount'] ;
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
                                    if(empty($empl['empl_idcard'])) { 
                                        echo 'Not Available'; 
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/employee/KTP/'.$empl['empl_idcard'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";
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
                                    if(empty($empl['empl_tax'])) { 
                                        echo 'Not Available'; 
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/employee/NPWP/'.$empl['empl_tax'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="card  text-center">
                                    <div class="card-body">
                                        <b>BPJS Kesehatan</b>
                                    </div>
                                    <div class="card-footer p-1">
                                        <?php 
                                    if(empty($empl['empl_healthinsurance'])) { 
                                        echo 'Not Available'; 
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/employee/BPJS-KES/'.$empl['empl_healthinsurance'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="card  text-center">
                                    <div class="card-body">
                                        <b>BPJS Kesehatan</b>
                                    </div>
                                    <div class="card-footer p-1">
                                        <?php 
                                    if(empty($empl['empl_emplinsurance'])) { 
                                        echo 'Not Available'; 
                                    } else { 
                                        echo "<a target='_blank' href='".base_url('upload/employee/BPJS-KET/'.$empl['empl_emplinsurance'])."' class='btn btn-sm'><i class='fas fa-search-plus'></i>&nbsp; View / Download</a>";
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