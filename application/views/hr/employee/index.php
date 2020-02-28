<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Employee
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Employee</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="<?=base_url('hr/employee/add');?>" class="btn btn-sm btn-success ml-2 add">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Employee
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr class="text-center">
                <th width="1%">#</th>
                <th width="5%">ID</th>
                <th width="5%" class="bg-primary text-white">Full Name</th>
                <th width="10%">Position</th>
                <th width="5%">Hire Date</th>
                <th width="5%">Length of Work</th>
                <th width="5%">Employee Status</th>
                <th width="5%">Email</th>
                <th width="5%">Graduated From</th>
                <th width="5%">Major</th>
                <th width="5%">Date of Birth</th>
                <th width="10%">Phone Number</th>
                <th width="10%">Status</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($empl as $e): ?>
            <tr class="text-center">
                <td><?=$i;?></td>
                <td><?=$e['empl_id'];?></td>
                <td style="cursor:pointer"
                    onclick="window.location='<?=base_url('hr/employee/view/'.strtolower($e['empl_id']));?>'">
                    <?=$e['empl_firstname']." ".$e['empl_lastname'];?>
                </td>
                <td><?=$e['empl_department'];?></td>
                <td><?=date('d M Y' , strtotime($e['empl_hiredate']));?></td>
                <td><?=date('Y')-date('Y', strtotime($e['empl_hiredate'])) ;?> Years</td>
                <td><?=$e['empl_status'];?></td>
                <td><?=$e['empl_email'];?></td>
                <td><?=$e['empl_graduatefr'];?></td>
                <td><?=$e['empl_major'];?></td>
                <td><?=date('d M Y' , strtotime($e['empl_datebirth']));?></td>
                <td><?=$e['empl_phone'];?></td>
                <td>
                    <?php
                    if($e['empl_isactive']==1){echo '<div class="badge badge-success">Active</div>';} else
                    if($e['empl_isactive']==2){echo '<div class="badge badge-danger">Not Active</div>';}
                    ?>
                </td>
                <td><?=$e['empl_address'];?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>