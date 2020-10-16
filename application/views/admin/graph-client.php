<?php 
    $color1 = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
    '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
    '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A',
    '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
    '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
    '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
    '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
    '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
    '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',
    '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'
    ];
    shuffle($color1);
    $colorArray1 = implode(", ", $color1);
    
    $color2 = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
    '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
    '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
    '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A',
    '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
    '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
    '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
    '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
    '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',
    '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'
    ];
    shuffle($color2);
    $colorArray2 = implode(", ", $color2);
?>
<div class="container mt-4">
    <hr>
    <div class="col-md-12 text-center mb-3">
        <h4>Client Management</h4>
        <hr width="50px" class="mt-1">
    </div>
    <div class="row">
        <div class="col-md-3 mb-2">
            <div class="card mb-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center align-middle p-1" style="margin-top:13%">
                        <h2 class="count-title mb-0"><?=$prosp;?></h2>
                    </div>
                    <div class="col-md-8 bg-info text-white shadow align-middle">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-12">
                                    <h5 class="card-title text-left mb-0">Prospective <br>Client</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card mb-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center align-middle p-1" style="margin-top:13%">
                        <h2 class="count-title mb-0"><?=$poten;?></h2>
                    </div>
                    <div class="col-md-8 bg-primary text-white shadow align-middle">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-12">
                                    <h5 class="card-title text-left mb-0">Potential <br>Client</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card mb-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center align-middle p-1" style="margin-top:13%">
                        <h2 class="count-title mb-0"><?=$curr;?></h2>
                    </div>
                    <div class="col-md-8 bg-success text-white shadow align-middle">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-12">
                                    <h5 class="card-title text-left mb-0">Current <br>Client</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card mb-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center align-middle p-1" style="margin-top:13%">
                        <h2 class="count-title mb-0"><?=$compl;?></h2>
                    </div>
                    <div class="col-md-8 bg-dark text-white shadow align-middle">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-12">
                                    <h5 class="card-title text-left mb-0">Completed <br>Client</h5>
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
            <div class="card">
                <div class="card-body text-center">
                    <?php
                        $no=0;
                        foreach ($lead as $l) {
                    ?>
                    &nbsp; | &nbsp; <a class="badge badge-primary" style="background:<?=$color1[$no];?>"> - </a>
                    <?=$l['lead_name'];?>&nbsp; | &nbsp;
                    <?php
                    $no++; }
                    ?>
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
            <div class="card">
                <div class="card-body">
                    <?php
                        $no=0;
                        foreach ($prog as $pr) {
                            if($pr['prog_sub']=='-') {
                                $prg = $pr['prog_program'];
                            } else {
                                $prg = $pr['prog_sub'].': '.$pr['prog_program'];
                            }
                    ?>
                    <a class="badge badge-primary" style="background:<?=$color2[$no];?>"> - </a> &nbsp;
                    <?=$prg;?></br>
                    <?php
                    $no++; }
                    ?>
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
        if($p['prog_sub']=='-') {
            $prg = $p['prog_program'];
        } else {
            $prg = $p['prog_sub'].': '.$p['prog_program'];
        }

        array_push($prog_count, $p['count(tbl_stprog.stprog_id)']);
        array_push($prog_name, $prg);
    }
    $arr3 = implode(", ", $prog_name);
    $arr4 = implode(", ", $prog_count);

?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
let myColor1 = "<?=$colorArray1;?>";
let color1 = myColor1.split(",");
let myColor2 = "<?=$colorArray2;?>";
let color2 = myColor2.split(",");
// var colorArray = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
//     '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
//     '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A',
//     '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
//     '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
//     '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
//     '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
//     '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
//     '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',
//     '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'
// ];

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
            borderColor: '#f4f4f4',
            backgroundColor: color1,
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    precision: 0,
                    beginAtZero: true,
                }
            }],
            xAxes: [{
                ticks: {
                    display: false,
                    fontSize: 10,
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

var prog = document.getElementById('program');
var myChart = new Chart(prog, {
    type: 'bar',
    data: {
        labels: a3,
        datasets: [{
            label: 'Total Program',
            data: a4,
            borderColor: '#f4f4f4',
            backgroundColor: color2,
            borderWidth: 2,
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    precision: 0,
                    beginAtZero: true,
                }
            }],
            xAxes: [{
                ticks: {
                    display: false,
                    fontSize: 8,
                },
            }],
        },
        legend: {
            position: 'bottom',
            align: 'start',
            display: false
        }
    }
});
</script>