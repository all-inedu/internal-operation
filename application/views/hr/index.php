<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-home mt-1"></i>&nbsp; &nbsp; Home Page
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="row">
            <div class="col-md-12" style="cursor:pointer" onclick="window.location='<?=base_url('hr/employee');?>'">
                <div class="card shadow">
                    <div class="row no-gutters">
                        <div class="col-md-4 my-auto">
                            <div class="card-body p-3">
                                <canvas id="employeeChart" width="40vh" height="30vh"></canvas>
                            </div>
                        </div>
                        <div class="col-md-8 bg-secondary shadow my-auto">
                            <div class="card-body text-white">
                                <h5 class="card-title"><i class="fas fa-users"></i>&nbsp; Employee :</h5>
                                <!-- <div class="line" style="margin-top:15px; margin-bottom:15px;"></div> -->
                                <!-- <h6>- Candidate <div class="float-right font-weight-bold badge badge-warning pl-3 pr-3">
                                        8</div>
                                </h6> -->
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Active <div class="float-right font-weight-bold badge badge-success pl-3 pr-3">
                                        <?=$empl_active;?>
                                    </div>
                                </h6>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Not Active <div class="float-right font-weight-bold badge badge-danger pl-3 pr-3">
                                        <?=$empl_notactive;?>
                                    </div>
                                </h6>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>
                                    &nbsp;
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="row">
            <div class="col-md-12" style="cursor:pointer" onclick="window.location='<?=base_url('hr/mentor');?>'">
                <div class="card shadow">
                    <div class="row no-gutters">
                        <div class="col-md-4 my-auto">
                            <div class="card-body p-3">
                                <canvas id="mentorChart" width="40vh" height="30vh"></canvas>
                            </div>
                        </div>
                        <div class="col-md-8 bg-primary shadow my-auto">
                            <div class="card-body text-white">
                                <h5 class="card-title"><i class="fas fa-users-cog"></i>&nbsp; Mentor / Tutor :</h5>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Potential <div class="float-right font-weight-bold badge badge-warning pl-3 pr-3">
                                        <?=$mt_potential;?></div>
                                </h6>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Active <div class="float-right font-weight-bold badge badge-success pl-3 pr-3">
                                        <?=$mt_active;?>
                                    </div>
                                </h6>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Not Active <div class="float-right font-weight-bold badge badge-danger pl-3 pr-3">
                                        <?=$mt_notactive;?>
                                    </div>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="row">
            <div class="col-md-12" style="cursor:pointer" onclick="window.location='<?=base_url('hr/editor');?>'">
                <div class="card shadow">
                    <div class="row no-gutters">
                        <div class="col-md-4 my-auto">
                            <div class="card-body p-3">
                                <canvas id="editorChart" width="40vh" height="30vh"></canvas>
                            </div>
                        </div>
                        <div class="col-md-8 bg-info shadow my-auto">
                            <div class="card-body text-white">
                                <h5 class="card-title"><i class="fas fa-user-edit"></i>&nbsp; Editor :</h5>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Managing <div class="float-right font-weight-bold badge badge-warning pl-3 pr-3">
                                        <?=$editor_managing;?></div>
                                </h6>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Senior <div class="float-right font-weight-bold badge badge-danger pl-3 pr-3">
                                        <?=$editor_senior;?>
                                    </div>
                                </h6>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Associate <div class="float-right font-weight-bold badge badge-success pl-3 pr-3">
                                        <?=$editor_associate;?>
                                    </div>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="row no-gutters">
                        <div class="col-md-4 my-auto">
                            <div class="card-body p-3 text-center">
                                <img src="<?=base_url('assets/img/volunteer.png');?>" width="70%">
                            </div>
                        </div>
                        <div class="col-md-8 bg-light shadow my-auto">
                            <div class="card-body text-dark">
                                <div class="mb-3" style="cursor:pointer"
                                    onclick="window.location='<?=base_url('hr/volunteer');?>'">
                                    <h5 class="card-title"><i class="fas fa-user-shield"></i>&nbsp; Volunteer :</h5>
                                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Active :<div
                                                    class="float-right font-weight-bold badge badge-warning pl-3 pr-3">
                                                    <?=$volunt_active;?></div>

                                            </h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>Not Active :<div
                                                    class="float-right font-weight-bold badge badge-warning pl-3 pr-3">
                                                    <?=$volunt_notactive;?></div>

                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div style="cursor:pointer" onclick="window.location='<?=base_url('hr/influencer');?>'">
                                    <h5 class="card-title"><i class="fas fa-user-tag"></i>&nbsp; Influencer :</h5>
                                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Active :<div
                                                    class="float-right font-weight-bold badge badge-warning pl-3 pr-3">
                                                    <?=$infl_active;?></div>

                                            </h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>Not Active :<div
                                                    class="float-right font-weight-bold badge badge-warning pl-3 pr-3">
                                                    <?=$infl_notactive;?></div>

                                            </h6>
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
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
var myChart = new Chart(document.getElementById('employeeChart'), {
    type: 'doughnut',
    data: {
        labels: ['Not Active', 'Active'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$empl_notactive;?>', '<?=$empl_active;?>'],
            backgroundColor: [
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        legend: {
            display: false
        }
    }
});;

var myChart = new Chart(document.getElementById('mentorChart'), {
    type: 'doughnut',
    data: {
        labels: ['Potential', 'Not Active', 'Active'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$mt_potential;?>', '<?=$mt_notactive;?>', '<?=$mt_active;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        legend: {
            display: false
        }
    }
});

var myChart = new Chart(document.getElementById('editorChart'), {
    type: 'doughnut',
    data: {
        labels: ['Managing', 'Senior', 'Associate'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$editor_managing;?>', '<?=$editor_senior;?>', '<?=$editor_associate;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        legend: {
            display: false
        }
    }
});
</script>