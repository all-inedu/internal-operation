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
        <div class="col-md-4 mb-2">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="mb-0">Students Program Status</h5>
                    <small>30 days ago</small>
                    <hr class="mb-3 mt-0">
                    <canvas id="myChart" style="height:95vh; width:90vw"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="mb-0">Lead Source</h5>
                    <small>30 days ago</small>
                    <hr class="mb-3 mt-0">
                    <canvas id="myLead" style="height:95vh; width:90vw"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="mb-0">Program</h5>
                    <small>30 days ago</small>
                    <hr class="mb-3 mt-0">
                    <canvas id="program" style="height:95vh; width:90vw"></canvas>
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

    $prog_count = [];
    $prog_name = [];
    foreach ($prog as $p) {
        array_push($prog_count, $p['count(tbl_stprog.stprog_id)']);
        array_push($prog_name, $p['prog_program']);
    }
    $arr3 = implode(", ", $prog_name);
    $arr4 = implode(", ", $prog_count);
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

let myJson1 = "<?=$arr1;?>";
let a1 = myJson1.split(",");
let myJson2 = "<?=$arr2;?>";
let a2 = myJson2.split(",");

var ls = document.getElementById('myLead');
var myChart = new Chart(ls, {
    type: 'bar',
    data: {
        labels: a1,
        datasets: [{
            label: 'Lead Source',
            data: a2,
            backgroundColor: [
                '#e5e05b',
                '#bf2626',
                '#56bf22',
                '#e88412',
                '#1ea5ff',
                '#f384a7',
                '#f99e2a',
                '#0e7e9f',
                '#5e9e96',
                '#1ea5ff',
                '#9e5e8c',
                '#a56300',
                '#d34a83',
                '#1ea5ff',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                }
            }]
        },
        legend: {
            display: false
        }
    }
});


let myJson3 = "<?=$arr3;?>";
let a3 = myJson3.split(",");
let myJson4 = "<?=$arr4;?>";
let a4 = myJson4.split(",");

var prog = document.getElementById('program');
var myChart = new Chart(prog, {
    type: 'line',
    data: {
        labels: a3,
        datasets: [{
            label: 'Total Program',
            data: a4,
            borderColor: '#fc840c',
            backgroundColor: 'rgba(255, 0, 0, 0.0)',
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    display: false
                }
            }],
        },
        legend: {
            display: false
        }
    }
});
</script>