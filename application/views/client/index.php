<style>
@import url('https://fonts.googleapis.com/css?family=Lobster&display=swap');

.count-title {
    margin-top: -15px;
    font-size: 23px;
    font-family: 'Lobster', cursive;
    color: #3f3b3b;
}

.history-box {
    width: 100%;
    height: 100px;
    overflow: scroll;
    border: 1px solid #dedede;
    padding: 5px;
}
</style>
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
<?php
    $CI =& get_instance();
    $CI->load->model('hr/Employee_model','empl');
    $empl_id = $CI->session->userdata('empl_id');
    $data = $CI->empl->showId($empl_id);

    $next_day = date('Y-m-d',(strtotime ( '+1 day' , strtotime ( date('Y-m-d')) ) ));
    $now = date('Y-m-d');
?>
<div class="container-fluid p-0 mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body p-2 px-3">
                    <div class="row">
                        <div class="col-md-6 mt-1">
                            <i class="fas fa-home"></i>&nbsp; &nbsp; Home Page
                        </div>
                        <?php
                            $flw_up = count($this->flw->showFollowUpByDate($now, $next_day, $data['empl_id'], 1));
                        ?>
                        <div class="col-md-6 text-right">
                            <div class="btn btn-sm btn-info" onclick="birthday()">
                                <i class="fas fa-birthday-cake"></i>&nbsp; Birthday
                                <div class="badge badge-warning" id="countBirthday"></div>
                            </div>
                            <div class="btn btn-sm btn-warning" data-toggle="modal" data-target="#followUp">
                                <i class="fas fa-sticky-note"></i>&nbsp; Reminder
                                <div class="badge badge-danger"><?=$flw_up;?></div>
                            </div>
                            <b class="px-2 flex-column">|</b>
                            <label title="Month to Date">
                                <i class="fas fa-users"></i>&nbsp; <?=$pic." ".$data['empl_firstname'];?>'s
                                Contributions</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="birthdayModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Birthday
                    <?php 
                        $date = date('Y-m-d');
                        // $date = '2021-10-29';
                        $day = date('D',strtotime($date));
                        $week_end = strtotime('next '.$day, strtotime($date));
                        $month_start = date('M Y', $week_end);

                        $month_now = date('M Y');
                        $month_next = date('M Y', strtotime('+1 month', strtotime($month_now)));

                        if($month_start==$month_next) {
                            echo "(".$month_next.")";
                        } else {
                             echo "(".$month_now.")";
                        }
                    ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height:40vh; overflow: scroll;">
                <table class="table table-hover table-bordered" id="dobTable">
                    <thead>
                        <tr class="text-center">
                            <th>Full Name</th>
                            <th>Date of Birth</th>
                            <th>Address</th>
                            <th>Program</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Reminder -->
<div class="modal fade" id="followUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Follow Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Today  -->
                <b><?=date('d M Y',(strtotime($now) ));?></b>
                <hr class="m-0">
                <table class="mt-2" width="100%">
                    <?php
                        $flw_now = $this->flw->showFollowUpByDate($now, "", $data['empl_id']);
                        if(empty($flw_now)){
                            echo "<i class='text-muted'>There is no follow-up plan yet.</i>";
                        }
                        $no=1;
                        foreach($flw_now as $f):
                    ?>
                    <tr>
                        <td width="5%"><?=$no;?>.</td>
                        <td width="30%" class="text-left"><?=$f['st_firstname'];?></td>
                        <td width="50%" class="text-left"><?=$f['prog_sub']." ".$f['prog_program'];?></td>
                        <td width="10%" class="text-center">
                            <?php if($f['flw_mark']==0) {?>
                            <button class="btn btn-sm btn-info" data-id="<?=$f['flw_id'];?>"
                                data-stprog="<?=$f['stprog_id'];?>" onclick="followMark(this)" title="Not Yet"><i
                                    class="fas fa-clock"></i></button>
                            <?php } else { ?>
                            <button class="btn btn-sm btn-success" data-id="<?=$f['flw_id'];?>"
                                data-stprog="<?=$f['stprog_id'];?>" onclick="followUnmark(this)" title="Done"><i
                                    class="fas fa-check"></i></button>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                        $no++; 
                        endforeach;
                    ?>
                </table>
                <hr>

                <!-- Next Day  -->
                <b><?= date('d M Y',strtotime ($next_day) );?></b>
                <hr class=" m-0">
                <table class="mt-2" width="100%">
                    <?php
                        $flw_next = $this->flw->showFollowUpByDate($next_day, "", $data['empl_id']);
                        if(empty($flw_next)){
                            echo "<i class='text-muted'>There is no follow-up plan yet.</i>";
                        }
                        $no=1;
                        foreach($flw_next as $f):
                    ?>
                    <tr>
                        <td width="5%"><?=$no;?>.</td>
                        <td width="30%" class="text-left"><?=$f['st_firstname'];?></td>
                        <td width="50%" class="text-left"><?=$f['prog_sub']." ".$f['prog_program'];?></td>
                        <td width="10%" class="text-center">
                            <?php if($f['flw_mark']==0) {?>
                            <button class="btn btn-sm btn-info" data-id="<?=$f['flw_id'];?>"
                                data-stprog="<?=$f['stprog_id'];?>" onclick="followMark(this)" title="Not Yet"><i
                                    class="fas fa-clock"></i></button>
                            <?php } else { ?>
                            <button class="btn btn-sm btn-success" data-id="<?=$f['flw_id'];?>"
                                data-stprog="<?=$f['stprog_id'];?>" onclick="followUnmark(this)" title="Done"><i
                                    class="fas fa-check"></i></button>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                        $no++; 
                        endforeach;
                    ?>
                </table>

                <hr class="mt-2 m-0">
                <div class="text-left mt-1">
                    <a href="<?=base_url('client/home/follow-up');?>" class="text-primary"> <i
                            class="fas fa-history fa-fw"></i> History </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mark  -->
<div class="modal fade" id="followUpNotes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Follow Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>History</p>
                <div class="history-box mb-2">
                    <div class="history-list">

                    </div>
                </div>
                <form action="<?=base_url('client/home/follow_mark');?>" method="post">
                    <input type="text" name="flw_id" id="flw_id" hidden>
                    <label>Notes</label>
                    <textarea name="flw_notes"></textarea>
                    <br>
                    <label>Next Follow-Up</label>
                    <input type="date" name="flw_date" class="form-control form-control-sm">

                    <hr>
                    <div class="float-right mt-2">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="content">
    <div class="row">
        <div class="col-md-3 mb-2">
            <a href="<?=base_url('client/student/index/prospective');?>">
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
            </a>
        </div>
        <div class="col-md-3 mb-2">
            <a href="<?=base_url('client/student/index/potential');?>">
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
            </a>
        </div>
        <div class="col-md-3 mb-2">
            <a href="<?=base_url('client/student/index/current');?>">
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
            </a>
        </div>
        <div class="col-md-3 mb-2">
            <a href="<?=base_url('client/student/index/completed');?>">
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
            </a>
        </div>

        <div class="col-md-12 mb-2">
            <button id="overallButton" class="btn btn-outline-primary">Overall</button>
            <button id="yourClient" class="btn btn-outline-primary">Your Client</button>
            <div class="card shadow" id="ALL">
                <div class="row no-gutters p-2">
                    <div class="col-md-4 align-middle p-1">
                        <div class="card-body text-center">
                            <h5 class="mb-0">Overall Students Program Status</h5>
                            <small>Month to Date</small>
                            <hr class="mb-3 mt-0">
                            <canvas id="myChart" style="height:105vh; width:90vw"></canvas>
                        </div>

                        <div class=" card shadow mt-2">
                            <div class="card-body text-center">
                                <h6 class="mb-0">Initial Consultation</h6>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-2">
                                Potential of Admissions Mentoring : <b><?=$init_consult;?></b> <br>
                                Initial Assessment Sent: <b><?=$ass_sent;?></b>
                                <hr class="mb-2 mt-2">
                                Initial Assessment Making: <b>
                                    <?php
                                        if(empty($ass_making['ass_making'])) { echo '-';}
                                        else {
                                            echo number_format(($ass_making['ass_making']/$ass_making['tot']),0);
                                        }
                                    ?> Days
                                </b>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <h5 class="mb-0">Admissions Mentoring</h5>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-0">
                                <canvas id="admChart" style="height:60vh; width:90vw"></canvas>
                                <div class="badge badge-default p-1 pl-4 pr-4 m-1">
                                    Total IDR : Rp. <?= number_format($tot_inv_adm[0]['tot'],0);?>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mt-2">
                            <div class="card-body text-center">
                                <h5 class="mb-0">Career Exploration</h5>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-0">
                                <canvas id="careerChart" style="height:60vh; width:90vw"></canvas>
                                <div class="badge badge-default p-1 pl-4 pr-4 m-1">
                                    Total IDR : Rp. <?= number_format($tot_inv_career[0]['tot'],0);?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 p-1">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <h5 class="mb-0">SAT</h5>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-0">
                                <canvas id="satChart" style="height:60vh; width:90vw"></canvas>
                                <div class="badge badge-default p-1 pl-4 pr-4 m-1">
                                    Total IDR : Rp. <?= number_format($tot_inv_sat[0]['tot'],0);?>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mt-2">
                            <div class="card-body text-center">
                                <h5 class="mb-0">Writing Course</h5>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-0">
                                <canvas id="writingChart" style="height:60vh; width:90vw"></canvas>
                                <div class="badge badge-default p-1 pl-4 pr-4 m-1">
                                    Total IDR : Rp. <?= number_format($tot_inv_writing[0]['tot'],0);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow" id="EMPL">
                <div class="row no-gutters p-2">
                    <div class="col-md-4 align-middle p-1">
                        <div class="card-body text-center">
                            <h5 class="mb-0">Overall Students Program Status</h5>
                            <small>Month to Date</small>
                            <hr class="mb-3 mt-0">
                            <canvas id="Overall" style="height:105vh; width:90vw"></canvas>
                        </div>

                        <div class=" card shadow mt-2">
                            <div class="card-body text-center">
                                <h6 class="mb-0">Initial Consultation</h6>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-2">
                                Potential of Admissions Mentoring : <b><?=$init_consult_empl;?></b> <br>
                                Initial Assessment Sent: <b><?=$ass_sent_empl;?></b>
                                <hr class="mb-2 mt-2">
                                Initial Assessment Making: <b>
                                    <?php
                                        if(empty($ass_making_empl['ass_making'])) { echo '-';}
                                        else {
                                            echo number_format(($ass_making_empl['ass_making']/$ass_making_empl['tot']),0);
                                        }
                                    ?> Days
                                </b>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <h5 class="mb-0">Admissions Mentoring</h5>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-0">
                                <canvas id="admChartEmpl" style="height:60vh; width:90vw"></canvas>
                                <div class="badge badge-default p-1 pl-4 pr-4 m-1">
                                    Total IDR : Rp. <?= number_format($tot_inv_adm_empl[0]['tot'],0);?>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mt-2">
                            <div class="card-body text-center">
                                <h5 class="mb-0">Career Exploration</h5>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-0">
                                <canvas id="careerChartEmpl" style="height:60vh; width:90vw"></canvas>
                                <div class="badge badge-default p-1 pl-4 pr-4 m-1">
                                    Total IDR : Rp. <?= number_format($tot_inv_career_empl[0]['tot'],0);?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 p-1">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <h5 class="mb-0">SAT</h5>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-0">
                                <canvas id="satChartEmpl" style="height:60vh; width:90vw"></canvas>
                                <div class="badge badge-default p-1 pl-4 pr-4 m-1">
                                    Total IDR : Rp. <?= number_format($tot_inv_sat_empl[0]['tot'],0);?>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mt-2">
                            <div class="card-body text-center">
                                <h5 class="mb-0">Writing Course</h5>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-0">
                                <canvas id="writingChartEmpl" style="height:60vh; width:90vw"></canvas>
                                <div class="badge badge-default p-1 pl-4 pr-4 m-1">
                                    Total IDR : Rp. <?= number_format($tot_inv_writing_empl[0]['tot'],0);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="row">

    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url('assets/js/moment.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
$(document).ready(function() {
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: "<?=base_url('api/birthDay');?>",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(datas) {
            $('#countBirthday').html(datas.count)
        }
    })
})

function birthday() {
    $('#birthdayModal').modal('show')
    $.ajax({
        type: 'post',
        url: '<?=base_url("api/birthDay");?>',
        dataType: 'json',
        success: function(datas) {
            console.log(datas);
            $('#dobTable > tbody').html('');
            $.each(datas.student, function(index, std) {
                $('#dobTable > tbody').append(
                    '<tr>' +
                    '<td>' + std.name + '</td>' +
                    '<td class="text-center">' + std.dob + '</td>' +
                    '<td>' + std.address + '</td>' +
                    '<td>' + std.program + '</td>' +
                    '<td class="text-center">' + std.status + '</td>' +
                    '</tr>'
                )
            });

            $.each(datas.parent, function(index, pr) {
                $('#dobTable > tbody').append(
                    '<tr>' +
                    '<td>' + pr.name + '</td>' +
                    '<td class="text-center">' + pr.dob + '</td>' +
                    '<td>' + pr.address + '</td>' +
                    '<td> - </td>' +
                    '<td class="text-center">' + pr.status + '</td>' +
                    '</tr>'
                )
            });
        }
    })
}


$(document).ready(function() {
    $('#ALL').hide();
    $('#yourClient').addClass("bg-info text-white");

    $('#overallButton').click(function() {
        $('#EMPL').hide();
        $('#ALL').show('fade');
        $('#overallButton').addClass("bg-info text-white");
        $('#yourClient').removeClass("bg-info text-white");
    });

    $('#yourClient').click(function() {
        $('#ALL').hide();
        $('#EMPL').show('fade');
        $('#yourClient').addClass("bg-info text-white");
        $('#overallButton').removeClass("bg-info text-white");
    });
});


function followMark(mark) {
    let flw_id = mark.getAttribute('data-id')
    let stprog_id = mark.getAttribute('data-stprog')

    // Ambil data follow-up
    $.ajax({
        type: 'post',
        url: '<?=base_url("client/home/showFollowUpByStprog/");?>' + stprog_id,
        dataType: 'json',
        success: function(datas) {
            $.each(datas, function(index, data) {
                $('.history-list').append(
                    '<small><b>' +
                    moment(data.flw_date).format('MMMM Do YYYY') +
                    '</small></b><hr class="m-0">' +
                    data.flw_notes + '<br>'
                )
            });
        }
    });

    $("#followUp").modal("hide")
    $("#followUpNotes").modal("show")
    $("#flw_id").val(flw_id)
}

function followUnmark(mark) {
    let flw_id = mark.getAttribute('data-id')
    window.location.href = "<?=base_url('client/home/follow_unmark/');?>" + flw_id;
}


let myColor1 = "<?=$colorArray1;?>";
let color1 = myColor1.split(",");
let myColor2 = "<?=$colorArray2;?>";
let color2 = myColor2.split(",");

var ctx = document.getElementById('myChart');
var progs = new Chart(ctx, {
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
    },
    options: {
        legend: {
            display: true,
            labels: {
                boxWidth: 10
            }
        },
        'onClick': function(e) {
            var activePoints = progs.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href = "<?=base_url('client/dashboard/program/all/pending');?>";
            } else if (selectedIndex == 1) {
                window.location.href = "<?=base_url('client/dashboard/program/all/failed');?>";
            } else if (selectedIndex == 2) {
                window.location.href = "<?=base_url('client/dashboard/program/all/success');?>";
            }
        }
    },
});


//Admission Chart
var adms = new Chart($('#admChart'), {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_adm;?>', '<?=$fail_adm;?>', '<?=$succ_adm;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: false
        },
        'onClick': function(e) {
            var activePoints = adms.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href = "<?=base_url('client/dashboard/program/admissions/pending');?>";
            } else if (selectedIndex == 1) {
                window.location.href = "<?=base_url('client/dashboard/program/admissions/failed');?>";
            } else if (selectedIndex == 2) {
                window.location.href = "<?=base_url('client/dashboard/program/admissions/success');?>";
            }
        }
    }
});

//Career Exploration Chart
var career = new Chart($('#careerChart'), {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_career;?>', '<?=$fail_career;?>', '<?=$succ_career;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: false
        },
        'onClick': function(e) {
            var activePoints = career.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href = "<?=base_url('client/dashboard/program/career/pending');?>";
            } else if (selectedIndex == 1) {
                window.location.href = "<?=base_url('client/dashboard/program/career/failed');?>";
            } else if (selectedIndex == 2) {
                window.location.href = "<?=base_url('client/dashboard/program/career/success');?>";
            }
        }
    }
});

//SAT Chart
var sat = new Chart($('#satChart'), {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_sat;?>', '<?=$fail_sat;?>', '<?=$succ_sat;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: false
        },
        'onClick': function(e) {
            var activePoints = sat.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href = "<?=base_url('client/dashboard/program/sat/pending');?>";
            } else if (selectedIndex == 1) {
                window.location.href = "<?=base_url('client/dashboard/program/sat/failed');?>";
            } else if (selectedIndex == 2) {
                window.location.href = "<?=base_url('client/dashboard/program/sat/success');?>";
            }
        }
    }
});

//SAT Chart
var writing = new Chart($('#writingChart'), {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_writing;?>', '<?=$fail_writing;?>', '<?=$succ_writing;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: false
        },
        'onClick': function(e) {
            var activePoints = writing.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href = "<?=base_url('client/dashboard/program/writing/pending');?>";
            } else if (selectedIndex == 1) {
                window.location.href = "<?=base_url('client/dashboard/program/writing/failed');?>";
            } else if (selectedIndex == 2) {
                window.location.href = "<?=base_url('client/dashboard/program/writing/success');?>";
            }
        }
    }
});

var ctxEmpl = document.getElementById('Overall');
var progsEmpl = new Chart(ctxEmpl, {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_empl;?>', '<?=$fail_empl;?>', '<?=$succ_empl;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: true,
            labels: {
                boxWidth: 10
            }
        },
        'onClick': function(e) {
            var activePoints = progsEmpl.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/all/pending/'.$empl_id);?>";
            } else if (selectedIndex == 1) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/all/failed/'.$empl_id);?>";
            } else if (selectedIndex == 2) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/all/success/'.$empl_id);?>";
            }
        }
    },
});


//Admission Chart
var admsEmpl = new Chart($('#admChartEmpl'), {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_adm_empl;?>', '<?=$fail_adm_empl;?>', '<?=$succ_adm_empl;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: false
        },
        'onClick': function(e) {
            var activePoints = admsEmpl.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/admissions/pending/'.$empl_id);?>";
            } else if (selectedIndex == 1) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/admissions/failed/'.$empl_id);?>";
            } else if (selectedIndex == 2) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/admissions/success/'.$empl_id);?>";
            }
        }
    }
});

//Career Exploration Chart
var careerEmpl = new Chart($('#careerChartEmpl'), {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_career_empl;?>', '<?=$fail_career_empl;?>', '<?=$succ_career_empl;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: false
        },
        'onClick': function(e) {
            var activePoints = careerEmpl.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/career/pending/'.$empl_id);?>";
            } else if (selectedIndex == 1) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/career/failed/'.$empl_id);?>";
            } else if (selectedIndex == 2) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/career/success/'.$empl_id);?>";
            }
        }
    }
});

//SAT Chart
var satEmpl = new Chart($('#satChartEmpl'), {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_sat_empl;?>', '<?=$fail_sat_empl;?>', '<?=$succ_sat_empl;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: false
        },
        'onClick': function(e) {
            var activePoints = satEmpl.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/sat/pending/'.$empl_id);?>";
            } else if (selectedIndex == 1) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/sat/failed/'.$empl_id);?>";
            } else if (selectedIndex == 2) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/sat/success/'.$empl_id);?>";
            }
        }
    }
});

//SAT Chart
var writingEmpl = new Chart($('#writingChartEmpl'), {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_writing_empl;?>', '<?=$fail_writing_empl;?>',
                '<?=$succ_writing_empl;?>'
            ],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: false
        },
        'onClick': function(e) {
            var activePoints = writingEmpl.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/writing/pending/'.$empl_id);?>";
            } else if (selectedIndex == 1) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/writing/failed/'.$empl_id);?>";
            } else if (selectedIndex == 2) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/writing/success/'.$empl_id);?>";
            }
        }
    }
});
</script>