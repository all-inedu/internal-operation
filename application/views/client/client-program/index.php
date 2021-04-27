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
                    <li class="breadcrumb-item active" aria-current="page">Students Program</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="text-left">
    <p class="badge badge-info p-2 pl-3 pr-3" onclick="filter()" style="cursor:pointer"><i
            class="fas fa-search fa-fw"></i>
        Filter</p>
</div>
<div class="row justify-content-md-center" id="filter" style="display:none;">
    <div class=" col-md-3 text-center">
        <select id="sProg" class="form-control form-control-sm">
            <option data-placeholder="true"></option>
            <?php foreach($program as $pr): ?>
            <?php 
                if($pr['prog_sub']=='') {
            ?>
            <option value="<?=$pr['prog_program'];?>"><?=$pr['prog_program']; ?></option>
            <?php
                } else {
            ?>
            <option value="<?=$pr['prog_sub'].": ".$pr['prog_program'];?>">
                <?=$pr['prog_sub'].": ".$pr['prog_program'];?></option>
            <?php
                }
            ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-md-3 text-center">
        <select id="sStatus" class="form-control form-control-sm">
            <option data-placeholder="true"></option>
            <option value="Pending">Pending</option>
            <option value="Success">Success</option>
            <option value="Failed">Failed</option>
        </select>
    </div>

    <div class="col-md-3 text-center">
        <select id="sConvLead" class="form-control form-control-sm">
            <option data-placeholder="true"></option>
            <?php 
                $lead = $this->lead->showAll();
                foreach ($lead as $l):
            ?>
            <option value="<?=$l['lead_name'];?>"><?=$l['lead_name'];?></option>
            <?php 
                endforeach;
            ?>
        </select>
    </div>

    <div class="col-md-3 text-center">
        <select id="sAss" class="form-control form-control-sm">
            <option data-placeholder="true"></option>
            <option value="-">-</option>
            <option value="Consultation">Consultation</option>
            <option value="Assessment Sent">Assessment Sent</option>
        </select>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="content">
    <table id="stprog" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr class="text-center">
                <th width="1%">No</th>
                <th width="10%" class="text-center bg-primary text-white">Students Name</th>
                <th width="10%">Program Name</th>
                <th width="10%">Lead Source</th>
                <th width="10%">Conversion Leads</th>
                <th width="5%">Program Status</th>
                <th width="5%">Running Status</th>
                <th width="15%">Reason</th>
                <th width="10%">PIC</th>
                <th width="10%">Initial Assessment Status</th>
                <th width="5%">Last Discuss</th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
</div>

<?php
    $CI =& get_instance();
    $CI->load->model('hr/Employee_model','empl');
    $empl_id = $CI->session->userdata('empl_id');
    $data = $CI->empl->showId($empl_id);
    // echo $data['empl_export'];
?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
<script src="<?=base_url('assets/js/disable-copas.js');?>"></script>
<script src="<?=base_url('assets/js/jquery-ui.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
function filter() {
    $("#filter").toggle();
}
$(document).ready(function() {
    $("#filter").hide();
});

new SlimSelect({
    select: '#sProg',
    placeholder: 'Select program name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#sStatus',
    placeholder: 'Select program status',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#sConvLead',
    placeholder: 'Select conversion leads',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#sAss',
    placeholder: 'Select assessment status',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

$(document).ready(function() {

    if ("<?=$data['empl_export'];?>" == 1) {
        var table = $('#stprog').DataTable({
            scrollY: 300,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            pageLength: 50,
            // fixedColumns: {
            //     leftColumns: 3,
            //     rightColumns: 1,
            // },
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> &nbsp; Export to Excell'
            }]
        });

    } else {
        var table = $('#stprog').DataTable({
            scrollY: 300,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            pageLength: 50,
            // fixedColumns: {
            //     leftColumns: 3,
            //     rightColumns: 1,
            // }
        });
    }

    $('#sProg').on('change', function() {
        table.column(2).search($(this).val()).draw();
    });

    $('#sStatus').on('change', function() {
        table.column(5).search($(this).val()).draw();
    });

    $('#sConvLead').on('change', function() {
        table.column(4).search($(this).val()).draw();
    });

    $('#sAss').on('change', function() {
        table.column(9).search($(this).val()).draw();
    });
});
</script>