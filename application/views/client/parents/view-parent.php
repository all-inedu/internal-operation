<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Parent's Profile
                </div>
            </nav>
        </div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Profile</a>
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
                    <img src="<?=base_url('assets/img/parents.png');?>" alt="client management" width="60%">
                    <h6 class="mt-3">
                        <?=$parent['pr_firstname'].' '.$parent['pr_lastname'];?>
                    </h6>
                    <hr style="width:20%; margin-bottom:5px; margin-top:5px;">
                    <div class="text-info mb-2">
                        <?php if($parent['pr_mail']) {?>
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$parent['pr_mail'];?> <br>
                        <?php } ?>
                        <?php if($parent['pr_phone']) {?>
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$parent['pr_phone'];?> <br>
                        <?php } ?>
                        <?php if($parent['pr_insta']) {?>
                        <i class="fab fa-instagram text-danger"></i>&nbsp; @<?=$parent['pr_insta'];?>
                        <?php } ?>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <a href="<?=base_url('client/parents/edit/'.$parent['pr_id']);?>"
                            class="btn btn-sm btn-info m-1"><i class="fas fa-pencil-alt"></i>&nbsp; Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6 class="align-middle"><i class="fas fa-user"></i>&nbsp; &nbsp; Parent's Profile
                    <div class="float-right">
                        <a href="<?=base_url('client/parents/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:0px;"></div>
                <div class="row mt-3">
                    <div class="col-md-4 mb-1">
                        <i class="fas fa-birthday-cake"></i>&nbsp; &nbsp; Date of Birth :
                    </div>
                    <div class="col-md-8">
                        <?php 
                            if($parent['pr_dob']!=null) {
                        ?>
                        <?= date('d M Y', strtotime($parent['pr_dob']));?>
                        <?php } else { echo '-';}?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4 mb-1">
                        <i class="fas fa-map-marker-alt"></i>&nbsp; &nbsp; Address :
                    </div>
                    <div class="col-md-8">
                        <?=$parent['pr_state'].'<br>'.$parent['pr_address'];?>
                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <i class="fas fa-users"></i>&nbsp; &nbsp; List of Children :
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th width="1%">No</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($childs as $c): ?>
                                    <tr>
                                        <td class="text-center"><?=$i;?></td>
                                        <td><?=$c['st_firstname'].' '.$c['st_lastname'];?>
                                            <a href="<?=base_url('client/student/view/'.$c['st_num']);?>"
                                                target="_blank" class="ml-2 text-primary">
                                                <i class="fas fa-search"></i>
                                            </a>

                                        </td>
                                        <td class="text-center"><?=$c['sch_name'];?></td>
                                        <td class="text-center">
                                            // <?php 
                                            //     $ynow = date('Y');
                                            //     $yinput = date('Y', strtotime($c['st_datecreate']));
                                            //     $ginput = $c['st_grade'];
                                            //     $gnow = ($ynow - $yinput) + $ginput;
                                            //     if($gnow <= 12) {
                                            //         echo $gnow;
                                            //     } else {
                                            //         echo 'Not High School';
                                            //     }
                                            // ?>
                                            <?php 
                                                $ynow = date('Y');
                                                $mnow = date('m');
                                                $yinput = date('Y', strtotime($c['st_datecreate']));
                                                $minput = date('m', strtotime($c['st_datecreate']));
                                                $ginput = $c['st_grade'];
                        
                                                if ((($mnow >= 7) or ($minput < 7)) and ($ynow > $yinput)) {
                                                    $gnow = ($ynow - $yinput) + $ginput;
                                                } else 
                                                if ((($mnow < 7) or ($minput >= 7)) and ($ynow > $yinput)) {
                                                    $gnow = ($ynow - $yinput) + ($ginput - 1);
                                                } else 
                                                if (($mnow >= 7)  and ($ynow == $yinput)) {
                                                    $gnow = $ginput + 1;
                                                } else {
                                                    $gnow = $ginput;
                                                }
                        
                                                if ($ginput == "0") {
                                                    echo '-';
                                                } else
                                                if ($gnow <= 12) {
                                                    echo $gnow;
                                                } else {
                                                    echo 'Not High School';
                                                }
                                                ?>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>