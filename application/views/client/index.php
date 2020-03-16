<style>
@import url('https://fonts.googleapis.com/css?family=Lobster&display=swap');

.count-title {
    font-size: 40px;
    font-family: 'Lobster', cursive;
    color: #3f3b3b;
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
<div class="content">
    <div class="row">
        <div class="col-md-4 mb-2">
            <div class="card mb-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center align-middle p-4">
                        <h2 class="count-title mb-0"><?=$prosp;?></h2>
                    </div>
                    <div class="col-md-8 bg-info text-white shadow align-middle">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-8">
                                    <h5 class="card-title text-left mb-0">Prospective <br>Client</h5>
                                </div>
                                <div class="col my-auto text-right">
                                    <i class="icofont-student-alt icofont-4x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card mb-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center align-middle p-4">
                        <h2 class="count-title mb-0"><?=$poten;?></h2>
                    </div>
                    <div class="col-md-8 bg-primary text-white shadow align-middle">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-8">
                                    <h5 class="card-title text-left mb-0">Potential <br>Client</h5>
                                </div>
                                <div class="col my-auto text-right">
                                    <i class="icofont-student icofont-4x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card mb-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center align-middle p-4">
                        <h2 class="count-title mb-0"><?=$curr;?></h2>
                    </div>
                    <div class="col-md-8 bg-success text-white shadow align-middle">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-8">
                                    <h5 class="card-title text-left mb-0">Current <br>Client</h5>
                                </div>
                                <div class="col my-auto text-right">
                                    <i class="icofont-group-students icofont-4x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow">
                <div class="row no-gutters">
                    <div class="col-md-4 my-auto">
                        <div class="card-body p-3">
                            <canvas id="myChart" width="100px" height="100px"></canvas>
                        </div>
                    </div>
                    <div class="col-md-8 bg-secondary shadow my-auto pt-5 pb-5">
                        <div class="card-body text-white">
                            <h5 class="card-title">Students Program Status</h5>
                            <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                            <h6>- Pending
                                <div class="float-right font-weight-bold badge badge-warning pl-2 pr-2"
                                    style="margin-top:-5px;">
                                    <h5 class="mb-0"><?=$pend;?></h5>
                                </div>
                            </h6>
                            <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                            <h6>- Success
                                <div class="float-right font-weight-bold badge badge-success pl-2 pr-2"
                                    style="margin-top:-5px;">
                                    <h5 class="mb-0"><?=$succ;?></h5>
                                </div>
                            </h6>
                            <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                            <h6>- Failed
                                <div class="float-right font-weight-bold badge badge-danger pl-2 pr-2"
                                    style="margin-top:-5px;">
                                    <h5 class="mb-0"><?=$fail;?></h5>
                                </div>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <canvas id="myLead" style="height:100vh; width:90vw"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    $lead_count = [];
    $lead_name = [];
    foreach ($lead as $l) {
        array_push($lead_count, $l['count(tbl_stprog.stprog_id)']);
        array_push($lead_name, $l['lead_name']);
    }
    $arr1 = implode(", ", $lead_name);
    $arr2 = implode(", ", $lead_count);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend;?>', '<?=$fail;?>', '<?=$succ;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    }
});

let myJSON1 = '<?=$arr1;?>'
let a1 = myJSON1.split(", ");

let myJSON2 = '<?=$arr2;?>'
let a2 = myJSON2.split(", ");

var ls = document.getElementById('myLead');
var myChart = new Chart(ls, {
    type: 'bar',
    data: {
        labels: a1,
        datasets: [{
            label: 'Lead Source',
            data: a2,
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(45, 71, 71, 1)',
                'rgba(111, 53, 69, 0.7)',
                'rgba(24, 42, 69, 0.7)',
                'rgba(34, 111, 7, 0.7)',
                'rgba(60, 201, 69, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(132, 121, 7, 0.7)',
                'rgba(222, 71, 122, 1)',
                'rgba(60, 111, 123, 0.7)',
                'rgba(121, 71, 21, 1)',
                'rgba(42, 111, 12, 0.7)',
                'rgba(168, 23, 111, 0.7)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        legend: {
            display: false
        }
    }
});
</script>