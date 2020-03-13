<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Students
                </div>
            </nav>
        </div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Students</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="<?=base_url('client/student/add/');?>" class="btn btn-sm btn-success ml-2 add"><i
        class="fas fa-plus-circle"></i>&nbsp; Add Student</a>
<div class="content">
    <nav>
        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="all" data-toggle="tab" href="#all" role="tab" aria-controls="all"
                aria-selected="false">* All</a>
            <a class="nav-item nav-link" id="prospective" data-toggle="tab" href="#prospective" role="tab"
                aria-controls="prospective" aria-selected="true">Prospective</a>
            <a class="nav-item nav-link" id="potential" data-toggle="tab" href="#potential" role="tab"
                aria-controls="potential" aria-selected="false">Potential</a>
            <a class="nav-item nav-link" id="current" data-toggle="tab" href="#current" role="tab"
                aria-controls="current" aria-selected="false">Current</a>
        </div>
    </nav>

    <table id="studentTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr class="text-center">
                <th width="2%">No</th>
                <th width="15%" class="text-center bg-primary text-white">Full Name</th>
                <th width="10%">Parents Name</th>
                <th width="10%">Students Mail</th>
                <th width="10%">Phone Number</th>
                <th width="5%">Status</th>
                <th width="5%">School Name</th>
                <th width="5%">Student Year /<br>Grade</th>
                <th width="10%">Instagram</th>
                <th width="10%">State</th>
                <th width="10%">Address</th>
                <th width="10%">Lead</th>
                <th width="5%">Level of Interest</th>
                <th width="5%">Interested Program</th>
                <th width="5%">Year of Study Abroad</th>
                <th width="5%">Country of Study Abroad</th>
                <th width="5%">Univ Destination</th>
                <th width="5%">Major</th>
                <th width="5%">Created Date</th>
                <th width="5%">Updated Date</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($std as $s) : ?>
            <tr class=" text-center">
                <td><?=$i;?></td>
                <td class="text-left" style="cursor:pointer"
                    onclick="window.location='<?=base_url('client/student/view/'.$s['st_num']);?>'">
                    <?=$s['st_firstname']." ".$s['st_lastname'];?>
                </td>
                <td>
                    <?php 
                        $prt = $this->prt->showId($s['pr_id']);
                        if($prt) { echo $prt['pr_firstname'].' '.$prt['pr_lastname']; } else { echo '-'; }
                    ?>
                </td>
                <td><?=$s['st_mail'];?></td>
                <td><?=$s['st_phone'];?></td>
                <td>
                    <?php  if($s['st_statuscli']==0) {  ?>
                    <div class="badge border pt-2 pb-2 pl-3 pr-3 badge-light text-danger shadow">
                        Prospective
                    </div>
                    <?php } else if($s['st_statuscli']==1) {  ?>
                    <div class="badge border pt-2 pb-2 pl-3 pr-3 badge-light text-info shadow">
                        Potential
                    </div>
                    <?php } else if($s['st_statuscli']==2) {  ?>
                    <div class="badge border pt-2 pb-2 pl-3 pr-3 badge-light text-success shadow">
                        Current Student
                    </div>
                    <?php } ?>
                </td>
                <td class="text-left"><?=$s['sch_name'];?></td>
                <td>
                    <?php 
                        $ynow = date('Y');
                        $yinput = date('Y', strtotime($s['st_datecreate']));
                        $ginput = $s['st_grade'];
                        $gnow = ($ynow - $yinput) + $ginput;
                        if($gnow <= 12) {
                            echo $gnow;
                        } else {
                            echo 'Not High School';
                        }
                        ?>
                </td>
                <td><?=$s['st_insta'];?></td>
                <td><?=$s['st_state'];?></td>
                <td><?=$s['st_address'];?></td>
                <td><?=$s['lead_name'];?></td>
                <td><?=$s['st_levelinterest'];?></td>
                <td>
                    <?php 
                        $pdata = explode(", ", $s['prog_id']); 
                        $prog = [];
                        foreach ($pdata as $pd ) {
                            $progdata = $this->prog->showId($pd);
                            array_push($prog, $progdata['prog_program']);
                        }
                        echo implode(", ", $prog);
                    ?>
                </td>
                <td><?=$s['st_abryear'];?></td>
                <td><?=$s['st_abrcountry'];?></td>
                <td>
                    <?php 
                        $udata = explode(", ", $s['st_abruniv']); 
                        $univ = [];
                        foreach ($udata as $ud ) {
                            $univdata = $this->univ->showId($ud);
                            array_push($univ, $univdata['univ_name']);
                        }
                        echo implode(", ", $univ);
                    ?>
                </td>
                <td><?=$s['st_abrmajor'];?></td>
                <td><?=date('d M Y H:i:s', strtotime($s['st_datecreate']));?></td>
                <td><?=date('d M Y H:i:s', strtotime($s['st_datelastedit']));?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var tables = $('#studentTable').DataTable({
        "bLengthChange": true,
        "pageLength": 15,
        "bPaginate": true,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": true,
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excel',
            text: '<i class="fas fa-file-excel"></i> &nbsp; Export to Excell'
        }]
    });

    $("#prospective").click(function() {
        tables.column(5).search('Prospective').draw();
    });

    $("#potential").click(function() {
        tables.column(5).search('Potential').draw();
    });

    $("#current").click(function() {
        tables.column(5).search('Current').draw();
    });

    $("#all").click(function() {
        tables.column(5).search('').draw();
    });

});
</script>