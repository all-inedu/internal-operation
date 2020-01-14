<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Student's Profile
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
                    <img src="<?=base_url('assets/img/college.png');?>" alt="client management" width="70%">
                    <h6 class="mt-3">Students Name</h6>
                    <hr style="width:20%; margin-bottom:5px; margin-top:5px;">
                    <div class="text-info">
                        <p><i class="fas fa-envelope text-danger"></i>&nbsp; student@gmail.com <br>
                            <i class="fas fa-phone text-danger"></i>&nbsp; 081231232xxx &nbsp; | &nbsp;
                            <i class="fab fa-instagram text-danger"></i>&nbsp; @student</p>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <a href="<?=base_url('client/profile/edit/student');?>" class="btn btn-sm btn-info m-1"><i
                                class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6 class="align-middle"><i class="fas fa-user"></i>&nbsp; &nbsp; Student's Profile
                    <div class="float-right">
                        <a href="<?=base_url('client/prospective/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:0px;"></div>
                <div class="text-left mb-3">
                    <small class="text-muted"><i class="far fa-calendar-alt text-danger"></i> &nbsp;Created date : 09
                        Jan
                        2019</small>
                    &nbsp; | &nbsp;
                    <small class="text-muted"><i class="fas fa-calendar-alt text-primary"></i> &nbsp;Last update : 09
                        Jan
                        2019</small>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-1">
                        <i class="fas fa-map-marker-alt"></i>&nbsp; &nbsp; Address :
                    </div>
                    <div class="col-md-8 text-muted">
                        Jl. Panjang No. 36, Kebon Jeruk <br>
                        Jakarta Barat<br>
                        11360
                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-school"></i>&nbsp; &nbsp; School Name :
                    </div>
                    <div class="col-md-8 mb-3 text-muted">
                        School Name
                    </div>

                    <div class="col-md-4 mb-2">
                        <i class="fas fa-bookmark"></i>&nbsp; &nbsp; Current Education :
                    </div>
                    <div class="col-md-8 mb-3 text-muted">
                        Current Education
                    </div>

                    <div class="col-md-4 mb-2">
                        <i class="fas fa-hourglass-start"></i>&nbsp; &nbsp; Grade :
                    </div>
                    <div class="col-md-8 mb-1 text-muted">
                        11
                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-box-open"></i>&nbsp; &nbsp; Lead Source :
                    </div>
                    <div class="col-md-8 mb-3 text-muted">
                        Lead Source
                    </div>

                    <div class="col-md-4 mb-2">
                        <i class="fas fa-chart-line"></i>&nbsp; &nbsp; Level of Interest :
                    </div>
                    <div class="col-md-8 mb-3 text-muted">
                        <div class="badge badge-success"><i class="fas fa-check"></i></div>
                        <span class="badge"> High</span> | &nbsp;
                        <div class="badge badge-warning"><i class="fas fa-check"></i></div>
                        <span class="badge"> Medium</span> | &nbsp;
                        <div class="badge badge-danger"><i class="fas fa-check"></i></div>
                        <span class="badge"> Low</span>
                    </div>

                    <div class="col-md-4 mb-2">
                        <i class="fas fa-tag"></i>&nbsp; &nbsp; Interested Program :
                    </div>
                    <div class="col-md-8 mb-1 text-muted">
                        <?php
                   
                    for($i=0;$i<count($prog);$i++){
                        $prog_key = array_rand($badge);
                    ?>
                        <span class="badge <?=$badge[$prog_key];?> p-2 mb-2"><?=$prog[$i];?></span>
                        <?php } ?>

                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-calendar-check"></i>&nbsp; &nbsp; Year of Going Study Abroad :
                    </div>
                    <div class="col-md-8 mb-3 text-muted">
                        School Name
                    </div>

                    <div class="col-md-4 mb-2">
                        <i class="fas fa-globe"></i>&nbsp; &nbsp; Country of Study Abroad :
                    </div>
                    <div class="col-md-8 mb-1 text-muted">
                        <?php                    
                    for($i=0;$i<count($country);$i++){
                        $country_key = array_rand($badge);
                    ?>
                        <span class="badge <?=$badge[$country_key];?>  p-2 mb-2"><?=$country[$i];?></span>
                        <?php } ?>
                    </div>

                    <div class=" col-md-4 mb-2">
                        <i class="fas fa-university"></i>&nbsp; &nbsp; University Destination :
                    </div>
                    <div class="col-md-8 mb-1 text-muted">
                        <?php                    
                    for($i=0;$i<count($univ);$i++){
                        $univ_key = array_rand($badge);
                    ?>
                        <span class="badge <?=$badge[$univ_key];?>  p-2 mb-2"><?=$univ[$i];?></span>
                        <?php } ?>
                    </div>

                    <div class="col-md-4 mb-2">
                        <i class="fas fa-microscope"></i>&nbsp; &nbsp; Major of Study Abroad :
                    </div>
                    <div class="col-md-8 mb-1 text-muted">
                        <?php                    
                    for($i=0;$i<count($major);$i++){
                        $major_key = array_rand($badge);
                    ?>
                        <span class="badge <?=$badge[$major_key];?>  p-2 mb-2"><?=$major[$i];?></span>
                        <?php } ?>
                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-award"></i>&nbsp; &nbsp; Personal Brand Statement :
                    </div>

                    <div class="col-md-8 mb-3 text-muted">
                        <textarea class="form-control form-control-sm" rows="5"></textarea>
                    </div>

                    <div class="col-md-4 mb-2">
                        <i class="fas fa-atlas"></i>&nbsp; &nbsp; Academic Goals & Interest :
                    </div>

                    <div class="col-md-8 mb-3 text-muted">
                        <textarea class="form-control form-control-sm" rows="5"></textarea>
                    </div>

                    <div class="col-md-4 mb-2">
                        <i class="fas fa-user-cog"></i>&nbsp; &nbsp; Life Philosophy &
                        Personalities :
                    </div>

                    <div class="col-md-8 mb-3 text-muted">
                        <textarea class="form-control form-control-sm" rows="5"></textarea>
                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <i class="fas fa-file-word"></i>&nbsp; &nbsp;Attachment :
                        <div class="mb-3"></div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="text-center bg-warning text-white">
                                    <tr>
                                        <th>Photo</th>
                                        <th>Curriculum Vitae</th>
                                        <th>Transcript</th>
                                        <th>Activities Resume</th>
                                        <th>Questionnaire</th>
                                        <th>Others</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>
                                            <div class="badge badge-success"><i class="fas fa-check"></i></div>
                                        </td>
                                        <td>
                                            <div class="badge badge-success"><i class="fas fa-check"></i></div>
                                        </td>
                                        <td>
                                            <div class="badge badge-danger"><i class="fas fa-times"></i></div>
                                        </td>
                                        <td>
                                            <div class="badge badge-success"><i class="fas fa-check"></i></div>
                                        </td>
                                        <td>
                                            <div class="badge badge-danger"><i class="fas fa-times"></i></div>
                                        </td>
                                        <td>
                                            <div class="badge badge-danger"><i class="fas fa-times"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">Download</a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">Download</a>
                                        </td>
                                        <td>
                                            <div class="text-muted">Not Available</div>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">Download</a>
                                        </td>
                                        <td>
                                            <div class="text-muted">Not Available</div>
                                        </td>
                                        <td>
                                            <div class="text-muted">Not Available</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>