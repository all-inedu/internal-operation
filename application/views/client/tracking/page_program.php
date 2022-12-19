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
                    <li class="breadcrumb-item active" aria-current="page">Students Program</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr class="text-center">
                <th width="1%">No</th>
                <th width="10%" class="text-center bg-primary text-white">Full Name</th>
                <th width="10%">Program Name</th>
                <th width="10%">Lead Source</th>
                <th width="10%">Conversion Lead</th>
                <th width="5%">Program Status</th>
                <th width="5%">Running Status</th>
                <th width="15%">Reason</th>
                <th width="10%">PIC</th>
                <th width="5%">Last Discuss</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($program as $stpr): ?>
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
                <td><?=$stpr['st_lead_name'];?></td>
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
                <td data-sort="<?=$stpr['stprog_statusprogdate'];?>">
                    <?php
                    if(($stpr['stprog_statusprogdate']!="0000-00-00")AND($stpr['stprog_statusprogdate']!="")) {
                        echo date('d F Y', strtotime($stpr['stprog_statusprogdate']));
                    } else if(($stpr['stprog_ass_sent']!="0000-00-00")AND($stpr['stprog_ass_sent']!="")) { 
                        echo date('d F Y', strtotime($stpr['stprog_ass_sent']));
                    } else if(($stpr['stprog_init_consult']!="0000-00-00")AND($stpr['stprog_init_consult']!="")) { 
                        echo date('d F Y', strtotime($stpr['stprog_init_consult']));
                    } else if(($stpr['stprog_firstdisdate']!="0000-00-00")AND($stpr['stprog_firstdisdate']!="")) { 
                        echo date('d F Y', strtotime($stpr['stprog_firstdisdate']));
                    } else {
                        echo '-';
                    }
                    ?>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>