<style>
@import url('https://fonts.googleapis.com/css?family=Lobster&display=swap');

.count-title {
    font-size: 24px;
    font-family: 'Lobster', cursive;
}
</style>
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
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="text-muted mb-0"><i class="fas fa-school"></i> &nbsp; School</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="cursor:pointer"
                        onclick="window.location='<?=base_url('bizdev/school');?>'">
                        <div class="card mb-3 shadow">
                            <div class="row no-gutters">
                                <div class="col-md-4 text-center align-middle p-4">
                                    <img src="<?=base_url('assets/img/sch.png');?>" alt="school" width="70%"
                                        style="margin:-25px;">
                                </div>
                                <div class="col-md-8 bg-primary text-white shadow align-middle">
                                    <div class="card-body">
                                        <h5 class="text-right mb-0 count-title"><?=$sch;?></h5>
                                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                        <h5 class="card-title text-right mb-0">List of School
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="cursor:pointer"
                        onclick="window.location='<?=base_url('bizdev/school-program');?>'">
                        <div class="card shadow">
                            <div class="row no-gutters">
                                <div class="col-md-5 my-auto">
                                    <div class="card-body p-3">
                                        <canvas id="schoolChart" width="40vh" height="30vh"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-7 bg-secondary shadow my-auto pt-2 pb-2">
                                    <div class="card-body text-white">
                                        <h5 class="card-title">Status of Program Approach :</h5>
                                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                        <h6>- Pending
                                            <div
                                                class="float-right font-weight-bold badge badge-warning pl-3 pr-3 shadow">
                                                <?=$spending;?>
                                            </div>
                                        </h6>
                                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                        <h6>- Denied
                                            <div
                                                class="float-right font-weight-bold badge badge-danger pl-3 pr-3 shadow">
                                                <?=$sdenied;?>
                                            </div>
                                        </h6>
                                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                        <h6>- Success
                                            <div
                                                class="float-right font-weight-bold badge badge-success pl-3 pr-3 shadow">
                                                <?=$ssuccess;?>
                                            </div>
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
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="text-muted mb-0"><i class="fas fa-building"></i> &nbsp; Corporate / Partner</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6" style="cursor:pointer"
                        onclick="window.location='<?=base_url('bizdev/corporate');?>'">
                        <div class="card mb-3 shadow">
                            <div class="row no-gutters">
                                <div class="col-md-4 text-center align-middle p-4">
                                    <img src="<?=base_url('assets/img/approached.png');?>" alt="approached" width="70%"
                                        style="top:25%; position:relative;">
                                </div>
                                <div class="col-md-8 bg-info text-white shadow align-middle">
                                    <div class="card-body">
                                        <h5 class="text-right mb-0 count-title"><?=$corp;?></h5>
                                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                        <h5 class="card-title text-right mb-0">Approached</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="cursor:pointer"
                        onclick="window.location='<?=base_url('bizdev/corporate');?>'">
                        <div class="card mb-3 shadow">
                            <div class="row no-gutters">
                                <div class="col-md-4 text-center align-middle p-4">
                                    <img src="<?=base_url('assets/img/not-yet.png');?>" alt="Not Yet" width="70%"
                                        style="top:25%; position:relative;">
                                </div>
                                <div class="col-md-8 bg-warning text-dark shadow align-middle">
                                    <div class="card-body">
                                        <h5 class="text-right mb-0 count-title"><?=$cnot;?></h5>
                                        <div class="line"
                                            style="border-color:#000; margin-top:15px; margin-bottom:15px;"></div>
                                        <h5 class="card-title text-right mb-0">Not Yet</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="cursor:pointer"
                        onclick="window.location='<?=base_url('bizdev/corporate-program');?>'">
                        <div class="card shadow">
                            <div class="row no-gutters">
                                <div class="col-md-5 my-auto">
                                    <div class="card-body p-3">
                                        <canvas id="corporateSchool" width="40vh" height="30vh"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-7 bg-secondary shadow my-auto pt-2 pb-2">
                                    <div class="card-body text-white">
                                        <h5 class="card-title">Status of Program Approach :</h5>
                                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                        <h6>- Pending
                                            <div class="float-right font-weight-bold badge badge-info pl-3 pr-3 shadow">
                                                <?=$cpending;?>
                                            </div>
                                        </h6>
                                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                        <h6>- Denied
                                            <div class="float-right font-weight-bold badge pl-3 pr-3 shadow"
                                                style="background:#F27313;">
                                                <?=$cdenied;?>
                                            </div>
                                        </h6>
                                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                        <h6>- Success
                                            <div class="float-right font-weight-bold badge pl-3 pr-3 shadow"
                                                style="background:#C686FF;">
                                                <?=$csuccess;?>
                                            </div>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
var ctx = document.getElementById('schoolChart');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Denied', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$spending;?>', '<?=$sdenied;?>', '<?=$ssuccess;?>'],
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

var ctx = document.getElementById('corporateSchool');
var corporateSchool = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Denied', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$cpending;?>', '<?=$cdenied;?>', '<?=$csuccess;?>'],
            backgroundColor: [
                'rgba(53, 166, 242, 0.7)',
                'rgba(242, 115, 19, 1)',
                'rgba(191, 124, 249, 0.7)'
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