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
        <div class="card shadow ">
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
        <div class="card shadow mb-2">
            <div class="card-body">
                <h6>1. Program Status</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-dark text-white">
                            <th width="80%">Status</th>
                            <th>Total</th>
                        </tr>
                        <tr>
                            <td>Pending</td>
                            <td align="center"><?=$st_pending;?></td>
                        </tr>
                        <tr>
                            <td>Success</td>
                            <td align="center"><?=$st_success;?></td>
                        </tr>
                        <tr>
                            <td>Failed</td>
                            <td align="center"><?=$st_failed;?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-2">
            <div class="card-body">
                <h6>2. Lead Source</h6>
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
                        <tr>
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
                        <tr>
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
                        <tr>
                            <td align="center"><?=$no;?></td>
                            <td><?=$lead['lead_name'];?></td>
                            <td align="center"><?=$lead['tot'];?></td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-2">
            <div class="card-body">
                <h6>3. Program</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-warning">
                            <th colspan="4">Pending</th>
                        </tr>
                        <tr class="text-center bg-dark text-white">
                            <th width="5%">No</th>
                            <th width="15%">Program Id</th>
                            <th width="65%">Program Name</th>
                            <th width="15%">Total</th>
                        </tr>
                        <?php $no=1; foreach ($prog_pending as $prog): ?>
                        <tr>
                            <td align="center"><?=$no;?></td>
                            <td align="center"><?=$prog['prog_id'];?></td>
                            <td><?=$prog['prog_program'];?></td>
                            <td align="center"><?=$prog['tot'];?></td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </table>
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-success text-white">
                            <th colspan="4">Success</th>
                        </tr>
                        <tr class="text-center bg-dark text-white">
                            <th width="5%">No</th>
                            <th width="15%">Program Id</th>
                            <th width="65%">Program Name</th>
                            <th width="15%">Total</th>
                        </tr>
                        <?php $no=1; foreach ($prog_success as $prog): ?>
                        <tr>
                            <td align="center"><?=$no;?></td>
                            <td align="center"><?=$prog['prog_id'];?></td>
                            <td><?=$prog['prog_program'];?></td>
                            <td align="center"><?=$prog['tot'];?></td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </table>
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center bg-danger text-white">
                            <th colspan="4">Failed</th>
                        </tr>
                        <tr class="text-center bg-dark text-white">
                            <th width="5%">No</th>
                            <th width="15%">Program Id</th>
                            <th width="65%">Program Name</th>
                            <th width="15%">Total</th>
                        </tr>
                        <?php $no=1; foreach ($prog_failed as $prog): ?>
                        <tr>
                            <td align="center"><?=$no;?></td>
                            <td align="center"><?=$prog['prog_id'];?></td>
                            <td><?=$prog['prog_program'];?></td>
                            <td align="center"><?=$prog['tot'];?></td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-2">
            <div class="card-body">
                <h6>4. Average Time : Converted to Current Client</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th width="15%">Program Id</th>
                            <th width="65%">Program Name</th>
                            <th width="15%">Avg</th>
                        </tr>
                        <?php $no=1; foreach ($convert_avg as $avg):?>
                        <tr>
                            <td align="center"><?=$no;?></td>
                            <td align="center"><?=$avg['prog_id'];?></td>
                            <td><?=$avg['prog_program'];?></td>
                            <?php 
                                $f_date = $avg['f_date'];
                                $l_date = $avg['l_date'];
                                $tot = $avg['tot'];
                                $avg_time = number_format(($l_date - $f_date)/$tot);
                            ?>
                            <td align="center"><?=$avg_time." day";?></td>
                        </tr>
                        <?php $no++; endforeach;?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>