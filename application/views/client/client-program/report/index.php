<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Students Program
                </div>
            </nav>
        </div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('client/student/');?>">Students</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('client/students-program/report');?>">Students
                            Program</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Report</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-search fa-fw"></i>
                Filter
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row p-0">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Month</label>
                                <select id="months" name="month">
                                    <option data-placeholder="true"></option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Year</label>
                                <select id="years" name="year">
                                    <option data-placeholder="true"></option>
                                    <?php 
                                $year = date('Y');
                                for($i=$year-3;$i<=$year;$i++){
                                ?>
                                    <option value=<?=$i;?>><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Program</label>
                        <select id="sProg" name="prog_id">
                            <option data-placeholder="true"></option>
                            <option value="all">All Programs</option>
                            <?php foreach($program as $pr): ?>
                            <?php 
                                if($pr['prog_sub']=='') {
                            ?>
                            <option value="<?=$pr['prog_id'];?>"><?=$pr['prog_program']; ?></option>
                            <?php
                                } else {
                            ?>
                            <option value="<?=$pr['prog_id'];?>">
                                <?=$pr['prog_sub'].": ".$pr['prog_program'];?></option>
                            <?php
                                }
                            ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Program Status</label>
                        <select id="status" name="status">
                            <option data-placeholder="true"></option>
                            <option value="1">Success</option>
                            <option value="0">Pending</option>
                            <option value="2">Failed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm btn-block">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-file-alt fa-fw"></i> Report
            </div>
            <div class="card-body">
                <table id="stprog" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th width="1%">No</th>
                            <th width="10%">Students Name</th>
                            <th width="10%">Program Name</th>
                            <th width="10%">Lead Source</th>
                            <th width="10%">Conversion Leads</th>
                            <th width="5%">Program Status</th>
                            <th width="5%">Running Status</th>
                            <th>Mentor/Tutor</th>
                            <th width="15%">Reason</th>
                            <th width="10%">PIC</th>
                            <th width="10%">Initial Assessment Status</th>
                            <th width="5%">Last Discuss</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($stprog!='') {
                    ?>
                        <?php $i=1; foreach($stprog as $stpr): ?>
                        <tr class="text-center">
                            <td><?=$i;?></td>
                            <td class="text-left" style="cursor:pointer"
                                onclick="window.location='<?=base_url('client/students-program/view/'.$stpr['stprog_id']);?>'">
                                <?=$stpr['st_firstname'].' '.$stpr['st_lastname'];?>
                            </td>
                            <td class="text-left">
                                <?php 
                                    if($stpr['prog_sub']=='') {
                                        echo $stpr['prog_program'];
                                    } else {
                                        echo $stpr['prog_sub'].': '.$stpr['prog_program'];
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    $std = $this->std->showId($stpr['st_num']);
                                    echo $std['lead_name'];
                                ?>
                            </td>
                            <td><?=$stpr['lead_name'];?></td>
                            <td>
                                <?php if($stpr['stprog_status']==0) { ?>
                                <div class="badge badge-light p-2 pl-3 pr-3 text-muted shadow border">Pending
                                </div>
                                <?php } else if($stpr['stprog_status']==1) { ?>
                                <div class="badge badge-light p-2 pl-3 pr-3 text-success shadow border">Success
                                </div>
                                <?php } else if($stpr['stprog_status']==2) { ?>
                                <div class="badge badge-light p-2 pl-3 pr-3 text-danger shadow border">Failed
                                </div>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($stpr['stprog_runningstatus']==0) {  ?>
                                <div class="badge badge-light p-2 pl-3 pr-3 text-info shadow border">Not Yet
                                </div>
                                <?php } else if($stpr['stprog_runningstatus']==1) { ?>
                                <div class="badge badge-light p-2 pl-3 pr-3 text-primary shadow border">Ongoing
                                </div>
                                <?php } else if($stpr['stprog_runningstatus']==2) { ?>
                                <div class="badge badge-light p-2 pl-3 pr-3 text-success shadow border">Done
                                </div>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                    $mentor = $this->stprog->getMentorById($stpr['stprog_id']);
                                    echo $mentor['mt_firstn'].' '.$mentor['mt_lastn'];
                                ?>
                            </td>
                            <td>
                                <?php 
                                if($stpr['stprog_status']==2) { 
                                    $reason_id= $stpr['reason_id'];
                                    $reason = $this->reason->showId($reason_id);
                                    echo $reason['reason_name'];
                                } else { 
                                    echo '-' ;
                                } 
                                ?>
                            </td>
                            <td>
                                <?php 
                                $id = $stpr['empl_id'];
                                $empl = $this->empl->showId($id);
                                echo $empl['empl_firstname']
                                ?>
                            </td>
                            <td data-sort="<?=$stpr['stprog_init_consult'];?>">
                                <?php
                                if($stpr['stprog_init_consult']=="0000-00-00") {
                                    echo '-';
                                } 
                                else if (($stpr['stprog_init_consult']!="0000-00-00")AND($stpr['stprog_ass_sent']=="0000-00-00")) {
                                    echo 'Consultation<br>'. date('d F Y', strtotime($stpr['stprog_init_consult']));
                                }
                                else if (($stpr['stprog_ass_sent']) AND ($stpr['stprog_ass_sent']!="0000-00-00")) {
                                    echo 'Assessment Sent<br>'. date('d F Y', strtotime($stpr['stprog_ass_sent']));
                                } 
                                ?>
                            </td>
                            <td data-sort="<?=$stpr['stprog_statusprogdate'];?>">
                                <?php
                                if($stpr['stprog_statusprogdate']!="0000-00-00") {
                                    echo date('d F Y', strtotime($stpr['stprog_statusprogdate']));
                                } else if($stpr['stprog_ass_sent']!="0000-00-00") { 
                                    echo date('d F Y', strtotime($stpr['stprog_ass_sent']));
                                } else if($stpr['stprog_init_consult']!="0000-00-00") { 
                                    echo date('d F Y', strtotime($stpr['stprog_init_consult']));
                                } else if($stpr['stprog_firstdisdate']!="0000-00-00") { 
                                    echo date('d F Y', strtotime($stpr['stprog_firstdisdate']));
                                }
                                ?>
                            </td>
                        </tr>
                        <?php $i++; endforeach; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
var mt = new SlimSelect({
    select: '#months',
    placeholder: 'Select month ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
mt.set('<?=$m;?>');

var yr = new SlimSelect({
    select: '#years',
    placeholder: 'Select ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
yr.set('<?=$y;?>');

var pr = new SlimSelect({
    select: '#sProg',
    placeholder: 'Select program name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
pr.set('<?=$p;?>');

var st = new SlimSelect({
    select: '#status',
    placeholder: 'Select program status',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
st.set('<?=$s;?>');

$(document).ready(function() {
    var tables = $('#stprog').DataTable({
        scrollY: 300,
        scrollX: true,
        scrollCollapse: true,
        paging: true,
        pageLength: 50,
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excel',
            text: '<i class="fas fa-file-excel"></i> &nbsp; Export to Excell'
        }]
    });
});
</script>