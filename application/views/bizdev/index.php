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
        <h4 class="text-muted mb-3"><i class="fas fa-school"></i> &nbsp; School</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3 shadow">
                    <div class="row no-gutters">
                        <div class="col-md-4 text-center align-middle p-4">
                            <img src="<?=base_url('assets/img/sch.png');?>" alt="school" width="70%"
                                style="margin:-25px;">
                        </div>
                        <div class="col-md-8 bg-primary text-white shadow align-middle">
                            <div class="card-body">
                                <h5 class="text-right mb-0">123</h5>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h5 class="card-title text-right mb-0">List of School</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="row no-gutters">
                        <div class="col-md-5 my-auto">
                            <div class="card-body p-3">
                                <canvas id="schoolChart" width="100px" height="100px"></canvas>
                            </div>
                        </div>
                        <div class="col-md-7 bg-secondary shadow my-auto pt-5 pb-5">
                            <div class="card-body text-white">
                                <h5 class="card-title">Potential School's Program :</h5>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Pending <div class="float-right font-weight-bold badge badge-warning">8</div>
                                </h6>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Denied <div class="float-right font-weight-bold badge badge-danger">4</div>
                                </h6>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Success <div class="float-right font-weight-bold badge badge-success">15</div>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h4 class="text-muted mb-3"><i class="fas fa-building"></i> &nbsp; Corporate / Partner</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3 shadow">
                    <div class="row no-gutters">
                        <div class="col-md-4 text-center align-middle p-4">
                            <img src="<?=base_url('assets/img/approached.png');?>" alt="approached" width="70%"
                                style="top:25%; position:relative;">
                        </div>
                        <div class="col-md-8 bg-info text-white shadow align-middle">
                            <div class="card-body">
                                <h5 class="text-right mb-0">1.230</h5>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h5 class="card-title text-right mb-0">Approached</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3 shadow">
                    <div class="row no-gutters">
                        <div class="col-md-4 text-center align-middle p-4">
                            <img src="<?=base_url('assets/img/not-yet.png');?>" alt="Not Yet" width="70%"
                                style="top:25%; position:relative;">
                        </div>
                        <div class="col-md-8 bg-warning text-dark shadow align-middle">
                            <div class="card-body">
                                <h5 class="text-right mb-0">430</h5>
                                <div class="line" style="border-color:#000; margin-top:15px; margin-bottom:15px;"></div>
                                <h5 class="card-title text-right mb-0">Not Yet</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="row no-gutters">
                        <div class="col-md-5 my-auto">
                            <div class="card-body p-3">
                                <canvas id="corporateSchool" width="100px" height="100px"></canvas>
                            </div>
                        </div>
                        <div class="col-md-7 bg-secondary shadow my-auto pt-5 pb-5">
                            <div class="card-body text-white">
                                <h5 class="card-title">Potential Corporate's Program :</h5>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Pending <div class="float-right font-weight-bold badge badge-info">8
                                    </div>
                                </h6>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Denied <div class="float-right font-weight-bold badge"
                                        style="background:#F27313;">
                                        4</div>
                                </h6>
                                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                                <h6>- Fix <div class="float-right font-weight-bold badge" style="background:#C686FF;">15
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
            data: [8, 4, 15],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }]
    }
});

var ctx = document.getElementById('corporateSchool');
var corporateSchool = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Denied', 'Fix'],
        datasets: [{
            label: '# of Votes',
            data: [9, 4, 6],
            backgroundColor: [
                'rgba(53, 166, 242, 0.7)',
                'rgba(242, 115, 19, 1)',
                'rgba(191, 124, 249, 0.7)'
            ],
            borderWidth: 2
        }]
    }
});
</script>