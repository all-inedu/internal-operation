<style>
    #tagcloud1, #tagcloud2 {
        display : inline;
    }

    #tagcloud1 a, #tagcloud2 a{
        padding: 3px 5px;
        border-radius: 5px;
        border:0.5px solid #dedede;
    }

    #tagcloud1 a:hover, #tagcloud2 a:hover{
        background: #dedede !important;
        color:#000 !important;
        border:0.5px solid #666;
    }
</style>
<?php 
    $color = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6', 
		  '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
		  '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A', 
		  '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
		  '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC', 
		  '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
		  '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680', 
		  '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
		  '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3', 
          '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'];
?>
<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Sales Tracking
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tracking</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-3 mb-2">
        <div class="card shadow " style="background:#fff;">
            <div class="card-body">
                <?php 
                    if(isset($start)) {
                        $start_date = $start;
                        $end_date = $end;
                    } else {
                        $start_date = date('Y-m-d');
                        $end_date = date('Y-m-d');
                    }
                ?>
                <form action="" method="post">
                    <label>Start Date</label>
                    <input type="date" name="start_date" class="form-control form-control-sm mb-2"
                        value="<?=$start_date;?>">
                    <?=form_error('start_date', '<small class="text-danger">', '</small>');?>
                    <br>
                    <label>End Date</label>
                    <input type="date" name="end_date" class="form-control form-control-sm mb-2"
                        value="<?=$end_date;?>">
                    <?=form_error('end_date', '<small class="text-danger">', '</small>');?>
                    <hr>
                    <button type="submit" class="btn btn-sm btn-primary btn-block"><i
                            class="icofont icofont-ui-zoom-out"></i>&nbsp;
                        Search</button>
                </form>
            </div>
        </div>
    </div>
    <?php if(isset($start)){ ?>
    <div class="col-md-9">
        <div class="card shadow mb-2" style="background:#fff;">
            <div class="card-body">
                <h6>1. Program Status</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-dark text-white">
                            <th width="80%">Status</th>
                            <th>Total</th>
                        </tr>
                        <tr style="cursor:pointer"
                            onclick="window.open('<?=base_url('client/tracking/p_status/0/'.$start.'/'.$end);?>','_blank')">
                            <td>Pending</td>
                            <td align="center">
                                <?=$st_pending;?> Students
                            </td>
                        </tr>
                        <tr style="cursor:pointer"
                            onclick="window.open('<?=base_url('client/tracking/p_status/1/'.$start.'/'.$end);?>','_blank')">
                            <td>Success</td>
                            <td align="center">
                                <?=$st_success;?> Students
                            </td>
                        </tr>
                        <tr style="cursor:pointer"
                            onclick="window.open('<?=base_url('client/tracking/p_status/2/'.$start.'/'.$end);?>','_blank')">
                            <td>Failed</td>
                            <td align="center">
                                <?=$st_failed;?> Students
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-2" style="background:#fff;">
            <div class="card-body">
                <h6>2. Program</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-warning">
                            <th colspan="4">Pending</th>
                        </tr>
                        <tr class="text-center bg-dark text-white">
                            <th width="5%">No</th>
                            <th width="20%">Main Program</th>
                            <th width="50%">Program Name</th>
                            <th width="15%">Total</th>
                        </tr>
                        <?php $no=1; foreach ($main_prog_pending as $mpp): ?>
                        <tr>
                            <td align="center"><?=$no;?></td>
                            <td align="center">
                                <h6>
                                <?= $mpp['prog_main'];?>
                                </h6>
                            </td> 
                            <td>
                                <table class="table table-striped table-hover" style="background-color: #fff0;">
                                    <?php 
                                        $sub_prog = $this->stprog->stprog_sub_program(0, $start, $end, $mpp['prog_main']);
                                        foreach ($sub_prog as $sp):
                                    ?>
                                        <tr style="cursor:pointer"
                            onclick="window.open('<?=base_url('client/tracking/p_program/0/'.$sp['prog_id'].'/'.$start.'/'.$end);?>','_blank')">
                                            <td>
                                                <?php
                                                if($sp['prog_sub']){
                                                    echo $sp['prog_sub']." : ".$sp['prog_program'];
                                                } else {
                                                    echo $sp['prog_program'];
                                                }
                                                ?>
                                            </td>
                                            <td align="center" width="15%"><?=$sp['tot'];?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </td>
                            <td align="center">
                                <h6>
                                    <?=$mpp['tot'];?> Students 
                                </h6>
                            </td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </table>
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-success text-white">
                            <th colspan="4">Success</th>
                        </tr>
                        <tr class="text-center bg-dark text-white">
                            <th width="5%">No</th>
                            <th width="20%">Main Program</th>
                            <th width="50%">Program Name</th>
                            <th width="15%">Total</th>
                        </tr>
                        <?php $no=1; foreach ($main_prog_success as $mps): ?>
                        <tr>
                            <td align="center"><?=$no;?></td>
                            <td align="center">
                                <h6>
                                <?= $mps['prog_main'];?>
                                </h6>
                            </td>
                            <td>
                                <table class="table table-striped table-hover" style="background-color: #fff0;">
                                    <?php 
                                        $sub_prog = $this->stprog->stprog_sub_program(1, $start, $end, $mps['prog_main']);
                                        foreach ($sub_prog as $sp):
                                    ?>
                                        <tr style="cursor:pointer"
                            onclick="window.open('<?=base_url('client/tracking/p_program/1/'.$sp['prog_id'].'/'.$start.'/'.$end);?>','_blank')">
                                            <td>
                                            <?php
                                                if($sp['prog_sub']){
                                                    echo $sp['prog_sub']." : ".$sp['prog_program'];
                                                } else {
                                                    echo $sp['prog_program'];
                                                }
                                            ?>
                                            </td>
                                            <td align="center" width="15%"><?=$sp['tot'];?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </td>
                            <td align="center">
                                <h6>
                                    <?=$mps['tot'];?> Students
                                </h6>
                            </td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </table>
                </div>
                <div class="card mt-1">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <?php 
                                $prog = $this->stprog->stprog_sub_program_ovl(1, $start, $end);
                                shuffle($color);
                                shuffle($prog);
                                $n=0; foreach ($prog as $ps): ?>
                                    <div id="tagcloud1">
                                        <a href="#" rel="<?=$ps['tot'];?>" style="background:<?=$color[$n];?>">
                                        <?php
                                            if($ps['prog_sub']=="") {
                                                echo $ps['prog_program'];
                                            } else {
                                                echo $ps['prog_sub'].": ".$ps['prog_program'];
                                            }
                                        ?>
                                        </a>
                                    </div>     
                                <?php $n++; endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-2" style="background:#fff;">
            <div class="card-body">
                <h6>3. Initial Assessment Progress</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-dark text-white"> 
                            <th width="5%"  style="vertical-align: middle;">No</th>
                            <th width="40"  style="vertical-align: middle;">Program Name</th>
                            <!-- <th width="20%"  style="vertical-align: middle;">Total Students</th> -->
                            <th width="15%"  style="vertical-align: middle;">Intial Assessment Making</th>
                            <th width="15%"  style="vertical-align: middle;">Converted</th>
                        </tr>
                        <?php 
                            $init_ass = $this->stprog->stprog_adm_init_avg(1, $start, $end);
                            $no=1; foreach ($init_ass as $init_ass):
                        ?>
                        <tr>
                            <td align="center"><?=$no;?></td>
                            <td><?=$init_ass['prog_sub']." - ".$init_ass['prog_program'];?></td>
                            <!-- <td align="center"><?=$init_ass['tot'];?> Students</td> -->
                            <td align="center">
                                <?=number_format($init_ass['init_make']/$init_ass['tot']);?> Days
                            </td>
                            <td align="center">
                                <?=number_format($init_ass['long_response']/$init_ass['tot']);?> Days
                            </td>
                        </tr>
                        <?php
                            $no++;
                            endforeach;
                        ?>
                    </table>
                </div>
                <br>
            </div>
        </div>
        <div class="card shadow mb-2" style="background:#fff;">
            <div class="card-body">
                <h6>4. Lead Source</h6>
                <div class="table-responsive"> 
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-light">
                            <th rowspan="2" style="vertical-align: middle;">No</th>
                            <th rowspan="2" style="vertical-align: middle;">Lead</th>
                            <th colspan="3">Status</th>
                        </tr>
                        <tr class="text-center">
                            <th class="bg-warning text-white">Pending</th>
                            <th class="bg-success text-white">Success</th>
                            <th class="bg-danger text-white">Failed</th>
                        </tr>
                        <?php $no=1; foreach ($leads as $lead_prog): ?>
                        <tr>
                            <td align="center" width="5%"><?=$no;?></td>
                            <td><?=$lead_prog['lead_name'];?></td>
                            <td align="center" style="cursor:pointer;" onMouseOver="this.style.background='#FF8507'"
                                onMouseOut="this.style.background='white'"
                                onclick="window.open('<?=base_url('client/tracking/p_lead/0/'.$lead_prog['lead_id'].'/'.$start.'/'.$end);?>','_blank')">
                                <?php 
                                    $l_pending = $this->stprog->stprog_leadID(0, $start, $end, $lead_prog['lead_id']);
                                    if($l_pending['tot']) {
                                        echo $l_pending['tot'];
                                    } else {
                                        echo "0";
                                    }
                                ?>
                            </td>
                            <td align="center" style="cursor:pointer;" onMouseOver="this.style.background='#28A745'"
                                onMouseOut="this.style.background='white'"
                                onclick="window.open('<?=base_url('client/tracking/p_lead/1/'.$lead_prog['lead_id'].'/'.$start.'/'.$end);?>','_blank')">
                                <?php 
                                    $l_success = $this->stprog->stprog_leadID(1, $start, $end, $lead_prog['lead_id']);
                                    if($l_success['tot']) {
                                        echo $l_success['tot'];
                                    } else {
                                        echo "0";
                                    }
                                ?>
                            </td>
                            <td align="center" style="cursor:pointer;" onMouseOver="this.style.background='#DC3545'"
                                onMouseOut="this.style.background='white'"
                                onclick="window.open('<?=base_url('client/tracking/p_lead/2/'.$lead_prog['lead_id'].'/'.$start.'/'.$end);?>','_blank')">
                                <?php 
                                    $l_failed = $this->stprog->stprog_leadID(2, $start, $end, $lead_prog['lead_id']);
                                    if($l_failed['tot']) {
                                        echo $l_failed['tot'];
                                    } else {
                                        echo "0";
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php $no++; endforeach;?>
                        <tr class="text-center bg-dark text-white font-weight-bold">
                            <td colspan="2">Total</td>
                            <td>
                                <?php 
                                $tot_pen = $this->stprog->stprog_leadTot(0, $start, $end);
                                echo $tot_pen['tot'];
                                ?>
                            </td>
                            <td>
                                <?php 
                                $tot_suc = $this->stprog->stprog_leadTot(1, $start, $end);
                                echo $tot_suc['tot'];
                                ?>
                            </td>
                            <td>
                                <?php 
                                $tot_fail = $this->stprog->stprog_leadTot(2, $start, $end);
                                echo $tot_fail['tot'];
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card mt-1">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <?php 
                                shuffle($color);
                                shuffle($lead_ovl);
                                $n=0; foreach ($lead_ovl as $lead_ovl): ?>
                                    <div id="tagcloud2">
                                        <a href="#" rel="<?=$lead_ovl['tot'];?>" style="background: <?=$color[$n];?>"><?=$lead_ovl['lead_name'];?></a>
                                    </div>     
                                <?php $n++; endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-2" style="background:#fff;">
            <div class="card-body">
                <h6>5. Average Time : Converted to Current Client</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-info text-white">
                            <th width="5%">No</th>
                            <th width="15%">Program Id</th>
                            <th width="65%">Program Name</th>
                            <th width="15%">Avg</th>
                        </tr>
                        <?php $no=1; foreach ($convert_avg as $avg):?>
                        <tr>
                            <td align="center"><?=$no;?></td>
                            <td align="center"><?=$avg['prog_id'];?></td>
                            <td>
                                <?php 
                                    if($avg['prog_sub']=='') {
                                        echo $avg['prog_program'];
                                    } else {
                                        echo $avg['prog_sub'].': '.$avg['prog_program'];
                                    }
                                ?>
                                <?php 
                                $cal_date = $avg['cal_date'];
                                $tot = $avg['tot'];
                                $avg_time = number_format($cal_date/$tot);
                            ?>
                            <td align="center">
                                <?=$avg_time." day";?>
                            </td>
                        </tr>
                        <?php $no++; endforeach;?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url('assets/js/jquery.tagcloud.js');?>"></script>
<script>
$("#tagcloud1 a").tagcloud({
	size: {start: 12, end: 25, unit: "px"},
	color: {start: '#000', end: '#000'}
});
$("#tagcloud2 a").tagcloud({
	size: {start: 12, end: 25, unit: "px"},
	color: {start: '#000', end: '#000'}
});
</script>