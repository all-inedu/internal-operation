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
            <a class="nav-item nav-link" id="completed" data-toggle="tab" href="#completed" role="tab"
                aria-controls="current" aria-selected="false">Completed</a>
        </div>
    </nav>

    <div class="row mb-2 mt-2">
        <p class="badge badge-info p-2 pl-3 pr-3 ml-3" onclick="filter()" style="cursor:pointer"><i
                class="fas fa-search fa-fw"></i>
            Filter</p>
        <div class="col-md-12" id="filter" style="display:none;">
            <div class="card p-2">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <select id="schName">
                            <option data-placeholder="true"></option>
                            <?php foreach($sch as $sc): ?>
                            <option value="<?=$sc['sch_name'];?>">
                                <?=$sc['sch_name'];?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <select id="grade">
                            <option data-placeholder="true"></option>
                            <?php for($i=1; $i<=12; $i++) { ?>
                            <option value="<?=$i;?>"><?=$i;?></option>
                            <?php } ?>
                            <option value="Not High School">Not High School</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                        <select id="leadName">
                            <option data-placeholder="true"></option>
                            <?php foreach($lead as $l): ?>
                            <option value="<?=$l['lead_name'];?>">
                                <?=$l['lead_name'];?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <select id="lvlInterest">
                            <option data-placeholder="true"></option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <select id="location">
                            <option data-placeholder="true"></option>
                            <?php foreach($states as $s): ?>
                            <option value="<?=$s;?>">
                                <?=$s;?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                        <select id="iProg">
                            <option data-placeholder="true"></option>
                            <?php foreach($prog as $pr): ?>
                            <option value="<?php
                                    if($pr['prog_sub']){
                                        echo $pr['prog_sub'].' - '.$pr['prog_program'];
                                    } else {
                                        echo $pr['prog_program'];
                                    }
                                ?>">
                                <?php
                                    if($pr['prog_sub']){
                                        echo $pr['prog_sub'].' - '.$pr['prog_program'];
                                    } else {
                                        echo $pr['prog_program'];
                                    }
                                ?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                        <select id="sProg">
                            <option data-placeholder="true"></option>
                            <?php foreach($prog as $pr): ?>
                            <option value="<?php
                                    if($pr['prog_sub']){
                                        echo $pr['prog_sub'].' - '.$pr['prog_program'];
                                    } else {
                                        echo $pr['prog_program'];
                                    }
                                ?>">
                                <?php
                                    if($pr['prog_sub']){
                                        echo $pr['prog_sub'].' - '.$pr['prog_program'];
                                    } else {
                                        echo $pr['prog_program'];
                                    }
                                ?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                        <select id="year">
                            <option data-placeholder="true"></option>
                            <?php
                                $start_year = 2016;
                                $year_now = date("Y");
                                $diff = $year_now-$start_year;
                                for($i=0;$i<=$diff+8;$i++){
                                    $year = $start_year+$i;
                                    echo '<option value="'.$year.'">'.$year.'</option>';
                                }    
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                        <select id="country">
                            <option data-placeholder="true"></option>
                            <?php foreach($con as $c): ?>
                            <option value="<?=$c;?>">
                                <?=$c;?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table id="studentTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr class="text-center">
                <th width="2%">No</th>
                <th width="15%" class="text-center bg-primary text-white">Students Name</th>
                <th width="10%">Students Mail</th>
                <th width="10%">Students Number</th>
                <th width="10%">Parents Name</th>
                <th width="10%">Parents Number</th>
                <th width="5%">School Name</th>
                <th width="5%">Student Year /<br>Grade</th>
                <th width="10%">Instagram</th>
                <th width="10%">Address</th>
                <th width="10%">Location</th>
                <th width="10%">Lead</th>
                <th width="5%">Level of Interest</th>
                <th width="60">Interested Program</th>
                <th width="10%">Success Program</th>
                <th width="5%">Year of Study Abroad</th>
                <th width="5%">Country of Study Abroad</th>
                <th width="5%">Univ Destination</th>
                <th width="5%">Major</th>
                <th width="5%">Created Date</th>
                <th width="5%">Status</th>
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
                <td><?=$s['st_mail'];?></td>
                <td><?=$s['st_phone'];?></td>
                <td>
                    <?php 
                        $prt = $this->prt->showId($s['pr_id']);
                        if($prt) { 
                            echo $prt['pr_firstname'].' '.$prt['pr_lastname']; 
                        } else { 
                            echo '-'; 
                        }
                    ?>
                </td>
                <td>
                    <?php 
                        if($prt) { 
                            echo $prt['pr_phone']; 
                        } else { 
                            echo '-'; 
                        }
                    ?>
                </td>
                <td class="text-left"><?=$s['sch_name'];?></td>
                <td>
                    <?php 
                        $ynow = date('Y');
                        $mnow = date('m'); 
                        $yinput = date('Y', strtotime($s['st_datecreate']));
                        $ginput = $s['st_grade'];
                        if($mnow==7) {
                            $gnow = ($ynow - $yinput) + $ginput;
                        } else {
                            $gnow = (($ynow - $yinput) + $ginput) - 1;
                        }

                        if($gnow <= 12) {
                            echo $gnow;
                        } else {
                            echo 'Not High School';
                        }
                        ?>
                </td>
                <td><?=$s['st_insta'];?></td>
                <td>
                    <?=$s['st_address'];?>
                </td>
                <td>
                    <?=$s['st_state'];?> <br>
                    <?=$s['st_city'];?>
                </td>
                <td>
                    <?php
                        $lead = $this->lead->showId($s['lead_id']);
                        ?>
                    <?=$lead['lead_name'];?>
                    <br>
                    <?php
                        if(!empty($s['eduf_id'])) {
                            $eduf = $this->eduf->showId($s['eduf_id']);
                            echo '('.$eduf['eduf_organizer'].')';
                        } else if(!empty($s['infl_id'])) {
                            $infl = $this->infl->showId($s['infl_id']);
                            echo '('.$infl['infl_fn'].')';
                        }
                        ?>
                </td>
                <td><?=$s['st_levelinterest'];?></td>
                <td>
                    <?php 
                        $pdata = explode(", ", $s['prog_id']); 
                        foreach ($pdata as $pd) {
                            $progdata = $this->prog->showId($pd);
                            if($progdata['prog_sub']==""){
                                echo "<div class='badge badge-warning p-2 m-1'>".$progdata['prog_program']."</div> <br>";
                            } else {
                                echo "<div class='badge badge-warning p-2 m-1'>".$progdata['prog_sub']." - ".$progdata['prog_program']."</div> <br>";
                            }
                        }
                        ?>
                </td>
                <td>
                    <?php
                        $st_num = $s['st_num']; 
                        $stprog = $this->stprog->showStProg($st_num);
                        $no=0;
                        foreach ($stprog as $p) {
                            if($p['stprog_status']==1) {
                                if($p['prog_sub']==""){
                                    echo "<div class='badge badge-success p-2 m-1'>".$p['prog_program']."</div> <br>";
                                } else {
                                    echo "<div class='badge badge-success p-2 m-1'>".$p['prog_sub']." - ".$p['prog_program']."</div> <br>";
                                }
                            }
                            $no++;
                        }
                    ?>
                </td>
                <td><?=$s['st_abryear'];?></td>
                <td><?=$s['st_abrcountry'];?></td>
                <td>
                    <?php 
                        $udata = explode(", ", $s['st_abruniv']); 
                        foreach ($udata as $ud ) {
                            $univdata = $this->univ->showId($ud);
                            echo "<div class='badge badge-primary p-2 m-1'>".$univdata['univ_name']."</div>";
                        }
                    ?>
                </td>
                <td><?=$s['st_abrmajor'];?></td>
                <td><?=date('d M Y H:i:s', strtotime($s['st_datecreate']));?></td>
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
                    <?php } else if($s['st_statuscli']==3) {  ?>
                    <div class="badge border pt-2 pb-2 pl-3 pr-3 badge-light text-primary shadow">
                        Completed
                    </div>
                    <?php } ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
<script src="<?=base_url('assets/js/disable-copas.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>

<script>
function filter() {
    $("#filter").toggle();
}
$(document).ready(function() {
    $("#filter").hide();
    new SlimSelect({
        select: '#schName',
        placeholder: 'School Name',
        allowDeselect: true,
        deselectLabel: '<span class="text-danger">✖</span>'
    });

    new SlimSelect({
        select: '#grade',
        placeholder: 'Grade',
        allowDeselect: true,
        deselectLabel: '<span class="text-danger">✖</span>'
    });

    new SlimSelect({
        select: '#leadName',
        placeholder: 'Lead Source',
        allowDeselect: true,
        deselectLabel: '<span class="text-danger">✖</span>'
    });

    new SlimSelect({
        select: '#lvlInterest',
        placeholder: 'Level of Interest',
        allowDeselect: true,
        deselectLabel: '<span class="text-danger">✖</span>'
    });

    new SlimSelect({
        select: '#location',
        placeholder: 'Location',
        allowDeselect: true,
        deselectLabel: '<span class="text-danger">✖</span>'
    });

    new SlimSelect({
        select: '#iProg',
        placeholder: 'Interested Program',
        allowDeselect: true,
        deselectLabel: '<span class="text-danger">✖</span>'
    });

    new SlimSelect({
        select: '#sProg',
        placeholder: 'Success Program',
        allowDeselect: true,
        deselectLabel: '<span class="text-danger">✖</span>'
    });

    new SlimSelect({
        select: '#year',
        placeholder: 'Year',
        allowDeselect: true,
        deselectLabel: '<span class="text-danger">✖</span>'
    });

    new SlimSelect({
        select: '#country',
        placeholder: 'Country',
        allowDeselect: true,
        deselectLabel: '<span class="text-danger">✖</span>'
    });



    if ("<?=$data['empl_export'];?>" == 1) {
        var tables = $('#studentTable').DataTable({
            scrollY: 300,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            pageLength: 50,
            // fixedColumns: {
            //     leftColumns: 2,
            //     rightColumns: 1,
            // },
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> &nbsp; Export to Excell'
            }]
        });
    } else {
        var tables = $('#studentTable').DataTable({
            scrollY: 300,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            pageLength: 50,
            // fixedColumns: {
            //     leftColumns: 2,
            // },
        });
    }

    // Students Status
    tables.column(20).search('<?=$status;?>').draw();
    $("#prospective").click(function() {
        tables.column(20).search('Prospective').draw();
    });
    $("#potential").click(function() {
        tables.column(20).search('Potential').draw();
    });
    $("#current").click(function() {
        tables.column(20).search('Current').draw();
    });
    $("#completed").click(function() {
        tables.column(20).search('Completed').draw();
    });
    $("#all").click(function() {
        tables.column(20).search('').draw();
    });

    //Filter
    $('#schName').on('change', function() {
        tables.column(6).search($(this).val()).draw();
    });
    $('#grade').on('change', function() {
        tables.column(7).search($(this).val()).draw();
    });
    $('#location').on('change', function() {
        tables.column(10).search($(this).val()).draw();
    });
    $('#leadName').on('change', function() {
        tables.column(11).search($(this).val()).draw();
    });
    $('#lvlInterest').on('change', function() {
        tables.column(12).search($(this).val()).draw();
    });
    $('#iProg').on('change', function() {
        console.log($(this).val())
        tables.column(13).search($(this).val()).draw();
    });
    $('#sProg').on('change', function() {
        tables.column(14).search($(this).val()).draw();
    });
    $('#year').on('change', function() {
        tables.column(15).search($(this).val()).draw();
    });
    $('#country').on('change', function() {
        tables.column(16).search($(this).val()).draw();
    });


});
</script>