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
                                <?=$st_pending;?>
                            </td>
                        </tr>
                        <tr style="cursor:pointer"
                            onclick="window.open('<?=base_url('client/tracking/p_status/1/'.$start.'/'.$end);?>','_blank')">
                            <td>Success</td>
                            <td align="center">
                                <?=$st_success;?>
                            </td>
                        </tr>
                        <tr style="cursor:pointer"
                            onclick="window.open('<?=base_url('client/tracking/p_status/2/'.$start.'/'.$end);?>','_blank')">
                            <td>Failed</td>
                            <td align="center">
                                <?=$st_failed;?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-2" style="background:#fff;">
            <div class="card-body">
                <h6>2. Lead Source</h6>
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
                <!-- 
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-warning">
                            <th colspan="3">Pending</th>
                        </tr>
                        <tr class="text-center bg-dark text-white">
                            <th width="5%">No</th>
                            <th width="80%">Lead Name</th>
                            <th width="15%">Total</th>
                        </tr>
                        <?php $no=1; foreach ($lead_pending as $lead): ?>
                        <tr style="cursor:pointer"
                            onclick="window.open('<?=base_url('client/tracking/p_lead/0/'.$lead['lead_id'].'/'.$start.'/'.$end);?>','_blank')">
                            <td align="center"><?=$no;?></td>
                            <td><?=$lead['lead_name'];?></td>
                            <td align="center"><?=$lead['tot'];?></td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </table>
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-success text-white">
                            <th colspan="3">Success</th>
                        </tr>
                        <tr class="text-center bg-dark text-white">
                            <th width="5%">No</th>
                            <th width="80%">Lead Name</th>
                            <th width="15%">Total</th>
                        </tr>
                        <?php $no=1; foreach ($lead_success as $lead): ?>
                        <tr style="cursor:pointer"
                            onclick="window.open('<?=base_url('client/tracking/p_lead/1/'.$lead['lead_id'].'/'.$start.'/'.$end);?>','_blank')">
                            <td align="center"><?=$no;?></td>
                            <td><?=$lead['lead_name'];?></td>
                            <td align="center"><?=$lead['tot'];?></td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </table>
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-danger text-white">
                            <th colspan="3">Failed</th>
                        </tr>
                        <tr class="text-center bg-dark text-white">
                            <th width="5%">No</th>
                            <th width="80%">Lead Name</th>
                            <th width="15%">Total</th>
                        </tr>
                        <?php $no=1; foreach ($lead_failed as $lead): ?>
                        <tr style="cursor:pointer"
                            onclick="window.open('<?=base_url('client/tracking/p_lead/2/'.$lead['lead_id'].'/'.$start.'/'.$end);?>','_blank')">
                            <td align="center"><?=$no;?></td>
                            <td><?=$lead['lead_name'];?></td>
                            <td align="center"><?=$lead['tot'];?></td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </table>
                </div> -->
            </div>
        </div>
        <div class="card shadow mb-2" style="background:#fff;">
            <div class="card-body">
                <h6>3. Program</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-warning">
                            <th colspan="4">Pending</th>
                        </tr>
                        <tr class="text-center bg-dark text-white">
                            <th width="5%">No</th>
                            <th width="20%">Program Name</th>
                            <th width="50%">Lead</th>
                            <th width="15%">Total</th>
                        </tr>
                        <?php $no=1; foreach ($prog_pending as $prog): ?>
                        <tr style="cursor:pointer"
                            onclick="window.open('<?=base_url('client/tracking/p_program/0/'.$prog['prog_id'].'/'.$start.'/'.$end);?>','_blank')">
                            <td align="center"><?=$no;?></td>
                            <td align="center">
                                <h6>
                                    <?php
                                    if($prog['prog_sub']=='-') {
                                        echo $prog['prog_program'];
                                    } else {
                                        echo $prog['prog_sub'].': '.$prog['prog_program'];
                                    }
                                ?>
                                </h6>
                            </td>
                            <td>
                                <table class="table table-striped table-hover" style="background-color: #fff0;">
                                    <?php 
                                        $lead = $this->stprog->stprog_lead_dtl(0, $start, $end, $prog['prog_id']);
                                        foreach ($lead as $lead) {
                                    ?>
                                    <tr>
                                        <td><?=$lead['lead_name'];?></td>
                                        <td align="center" width="15%"><?=$lead['tot'];?></td>
                                    </tr>
                                    <?php 
                                        }
                                    ?>
                                </table>
                            </td>
                            <td align="center">
                                <h6>
                                    <?=$prog['tot'];?>
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
                            <th width="20%">Program Name</th>
                            <th width="50%">Lead</th>
                            <th width="15%">Total</th>
                        </tr>
                        <?php $no=1; foreach ($prog_success as $prog): ?>
                        <tr style="cursor:pointer"
                            onclick="window.open('<?=base_url('client/tracking/p_program/1/'.$prog['prog_id'].'/'.$start.'/'.$end);?>','_blank')">
                            <td align="center"><?=$no;?></td>
                            <td align="center">
                                <h6>
                                    <?php
                                    if($prog['prog_sub']=='-') {
                                        echo $prog['prog_program'];
                                    } else {
                                        echo $prog['prog_sub'].': '.$prog['prog_program'];
                                    }
                                ?>
                                </h6>
                            </td>
                            <td>
                                <table class="table table-striped table-hover" style="background-color: #fff0;">
                                    <?php 
                                        $lead = $this->stprog->stprog_lead_dtl(1, $start, $end, $prog['prog_id']);
                                        foreach ($lead as $lead) {
                                    ?>
                                    <tr>
                                        <td><?=$lead['lead_name'];?></td>
                                        <td align="center" width="15%"><?=$lead['tot'];?></td>
                                    </tr>
                                    <?php 
                                        }
                                    ?>
                                </table>
                            </td>
                            <td align="center">
                                <h6>
                                    <?=$prog['tot'];?>
                                </h6>
                            </td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </table>
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-danger text-white">
                            <th colspan="4">Failed</th>
                        </tr>
                        <tr class="text-center bg-dark text-white">
                            <th width="5%">No</th>
                            <th width="20%">Program Name</th>
                            <th width="50%">Lead</th>
                            <th width="15%">Total</th>
                        </tr>
                        <?php $no=1; foreach ($prog_failed as $prog): ?>
                        <tr style="cursor:pointer"
                            onclick="window.open('<?=base_url('client/tracking/p_program/2/'.$prog['prog_id'].'/'.$start.'/'.$end);?>','_blank')">
                            <td align="center"><?=$no;?></td>
                            <td align="center">
                                <h6>
                                    <?php
                                    if($prog['prog_sub']=='-') {
                                        echo $prog['prog_program'];
                                    } else {
                                        echo $prog['prog_sub'].': '.$prog['prog_program'];
                                    }
                                ?>
                                </h6>
                            </td>
                            <td>
                                <table class="table table-striped table-hover" style="background-color: #fff0;">
                                    <?php 
                                        $lead = $this->stprog->stprog_lead_dtl(2, $start, $end, $prog['prog_id']);
                                        foreach ($lead as $lead) {
                                    ?>
                                    <tr>
                                        <td><?=$lead['lead_name'];?></td>
                                        <td align="center" width="15%"><?=$lead['tot'];?></td>
                                    </tr>
                                    <?php 
                                        }
                                    ?>
                                </table>
                            </td>
                            <td align="center">
                                <h6>
                                    <?=$prog['tot'];?>
                                </h6>
                            </td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-2" style="background:#fff;">
            <div class="card-body">
                <h6>4. Average Time : Converted to Current Client</h6>
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
                                    if($avg['prog_sub']=='-') {
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
                                <?=$cal_date;?><br>
                                <?=$tot;?><br>
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