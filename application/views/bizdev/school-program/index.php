<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Schools Program
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Schools Program</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width="5%" class="text-center bg-primary text-white">School Name</th>
                <th width="5%" class="text-center">Program Name</th>
                <th width="5%" class="text-center">First Discuss</th>
                <th width="5%" class="text-center">Last Discuss</th>
                <th width="5%" class="text-center">Approach <br> Status</th>
                <th width="1%" class="text-center">Program Execution</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($sprog as $sp): ?>
            <tr class="text-center">
                <td><?=$i;?></td>
                <td style="cursor:pointer"
                    onclick="window.location='<?=base_url('bizdev/school-program/view/'.$sp['schprog_id']);?>'">
                    <?=$sp['sch_name'];?>
                </td>
                <td class="text-left">
                    <?=$sp['prog_program'];?>
                </td>
                <td><?=date('d F Y', strtotime($sp['schprog_datefirstdis']));?></td>
                <td><?=date('d F Y', strtotime($sp['schprog_datelastdis']));?></td>
                <td>
                    <?php if($sp['schprog_status']==1) { ?>
                    <span class="badge badge-pill badge-success p-1" data-toggle="tooltip" data-placement="top"
                        title="Success">
                        <i class="fas fa-check fa-2x"></i>
                    </span>
                    <?php } else if($sp['schprog_status']==0) {  ?>
                    <!-- Status Pending -->
                    <span class="badge badge-pill badge-warning p-1 text-dark" data-toggle="tooltip"
                        data-placement="top" title="Pending">
                        <i class="far fa-clock fa-2x"></i>
                    </span>
                    <?php } else if($sp['schprog_status']==2) {  ?>
                    <!-- Status Denied -->
                    <span class="badge badge-pill badge-danger p-1 text-white" data-toggle="tooltip"
                        data-placement="top" title="Denied">
                        <i class="fas fa-frown-open fa-2x"></i>
                    </span>
                    <?php } ?>
                </td>
                <td>
                    <?php 
                        $id = $sp['schprog_id'];
                        $data = $this->sprog->showProgramExec($id);
                        if($data) { 
                    ?>
                    <?php if($data['schprogfix_status']==0) {?>
                    <label class="badge badge-info p-1">Not Yet</label>
                    <?php } else if($data['schprogfix_status']==1) {?>
                    <label class="badge badge-primary p-1">Running</label>
                    <?php } else if($data['schprogfix_status']==2) {?>
                    <label class="badge badge-success p-1">Done</label>
                    <?php } else if($data['schprogfix_status']==3) {?>
                    <label class="badge badge-danger p-1">Not Running</label>
                    <?php } ?>
                    <?php } else { echo 'Not Available'; } ?>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>