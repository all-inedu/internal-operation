<div class="content">
    <div class="row no-gutters">
        <div class="col-md-6 mb-2 p-1">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="mb-0">Lead Source</h5>
                    <small>Month to Date</small>
                    <hr class="mb-3 mt-0">
                    <canvas id="myLead" style="height:70vh; width:90vw"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-2 p-1">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="mb-0">Conversion Leads</h5>
                    <small>Month to Date</small>
                    <hr class="mb-3 mt-0">
                    <canvas id="conversionLead" style="height:70vh; width:90vw"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2 p-1">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="mb-0">Admissions Mentoring</h5>
                    <small>Month to Date</small>
                    <hr class="mb-3 mt-0">
                    <canvas id="admLead" style="height:100vh; width:100vh"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2 p-1">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="mb-0">Career Exploration</h5>
                    <small>Month to Date</small>
                    <hr class="mb-3 mt-0">
                    <canvas id="careerLead" style="height:100vh; width:100vh"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2 p-1">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="mb-0">SAT</h5>
                    <small>Month to Date</small>
                    <hr class="mb-3 mt-0">
                    <canvas id="satLead" style="height:100vh; width:100vh"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2 p-1">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="mb-0">Writing Course</h5>
                    <small>Month to Date</small>
                    <hr class="mb-3 mt-0">
                    <canvas id="writingLead" style="height:100vh; width:100vh"></canvas>
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

    $con_lead_count = [];
    $con_lead_name = [];
    foreach ($con_lead as $l) {
        array_push($con_lead_count, $l['count(tbl_stprog.stprog_id)']);
        array_push($con_lead_name, $l['lead_name']);
    }
    $arr3 = implode(", ", $con_lead_name);
    $arr4 = implode(", ", $con_lead_count);

    $adm_lead_count = [];
    $adm_lead_name = [];
    foreach ($adm_lead as $l) {
        array_push($adm_lead_count, $l['tot']);
        array_push($adm_lead_name, $l['lead_name']);
    }
    $arr5 = implode(", ", $adm_lead_name);
    $arr6 = implode(", ", $adm_lead_count);

    $career_lead_count = [];
    $career_lead_name = [];
    foreach ($career_lead as $l) {
        array_push($career_lead_count, $l['tot']);
        array_push($career_lead_name, $l['lead_name']);
    }
    $arr7 = implode(", ", $career_lead_name);
    $arr8 = implode(", ", $career_lead_count);

    $sat_lead_count = [];
    $sat_lead_name = [];
    foreach ($sat_lead as $l) {
        array_push($sat_lead_count, $l['tot']);
        array_push($sat_lead_name, $l['lead_name']);
    }
    $arr9 = implode(", ", $sat_lead_name);
    $arr10 = implode(", ", $sat_lead_count);

    $writing_lead_count = [];
    $writing_lead_name = [];
    foreach ($writing_lead as $l) {
        array_push($writing_lead_count, $l['tot']);
        array_push($writing_lead_name, $l['lead_name']);
    }
    $arr11 = implode(", ", $writing_lead_name);
    $arr12 = implode(", ", $writing_lead_count);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url('assets/js/moment.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
let myJson1 = "<?=$arr1;?>";
let a1 = myJson1.split(",");
let myJson2 = "<?=$arr2;?>";
let a2 = myJson2.split(",");

var ls = document.getElementById('myLead');
var myChart = new Chart(ls, {
    type: 'horizontalBar',
    data: {
        labels: a1,
        datasets: [{
            label: 'Lead Source',
            data: a2,
            borderColor: '#f4f4f4',
            backgroundColor: color1,
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    fontSize: 10,
                }
            }],
            xAxes: [{
                ticks: {
                    precision: 0,
                    beginAtZero: true,
                }
            }],
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

var ls = document.getElementById('conversionLead');
var myChart = new Chart(ls, {
    type: 'horizontalBar',
    data: {
        labels: a3,
        datasets: [{
            label: 'Conversion Leads',
            data: a4,
            borderColor: '#f4f4f4',
            backgroundColor: color2,
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    fontSize: 10,
                }
            }],
            xAxes: [{
                ticks: {
                    display: true,
                    precision: 0,
                    beginAtZero: true
                }
            }],
        },
        legend: {
            display: false,
        }
    }
});

let myJson5 = "<?=$arr5;?>";
let a5 = myJson5.split(",");
let myJson6 = "<?=$arr6;?>";
let a6 = myJson6.split(",");
new Chart($('#admLead'), {
    type: 'pie',
    data: {
        labels: a5,
        datasets: [{
            data: a6,
            backgroundColor: color1,
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: true,
            labels: {
                fontSize: 10,
                boxWidth: 10,
                padding: 5
            }
        },
    }

});

let myJson7 = "<?=$arr7;?>";
let a7 = myJson7.split(",");
let myJson8 = "<?=$arr8;?>";
let a8 = myJson8.split(",");
new Chart($('#careerLead'), {
    type: 'pie',
    data: {
        labels: a7,
        datasets: [{
            data: a8,
            backgroundColor: color1,
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: true,
            labels: {
                fontSize: 10,
                boxWidth: 10,
                padding: 5
            }
        },
    }

});

let myJson9 = "<?=$arr9;?>";
let a9 = myJson9.split(",");
let myJson10 = "<?=$arr10;?>";
let a10 = myJson10.split(",");
new Chart($('#satLead'), {
    type: 'pie',
    data: {
        labels: a9,
        datasets: [{
            data: a10,
            backgroundColor: color1,
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: true,
            labels: {
                fontSize: 10,
                boxWidth: 10,
                padding: 5
            }
        },
    }

});

let myJson11 = "<?=$arr11;?>";
let a11 = myJson11.split(",");
let myJson12 = "<?=$arr12;?>";
let a12 = myJson12.split(",");
new Chart($('#writingLead'), {
    type: 'pie',
    data: {
        labels: a11,
        datasets: [{
            data: a12,
            backgroundColor: color1,
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: true,
            labels: {
                fontSize: 10,
                boxWidth: 10,
                padding: 5
            }
        },
    }

});
</script>