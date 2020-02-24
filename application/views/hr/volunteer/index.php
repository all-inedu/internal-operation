<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Volunteer
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Volunteer</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="<?=base_url('hr/volunteer/add');?>" class="btn btn-sm btn-success ml-2 add">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Volunteer
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width="5%" class="text-center bg-primary text-white">Full Name</th>
                <th width="5%" class="text-center">Graduated From</th>
                <th width="5%" class="text-center">Major</th>
                <th width="5%" class="text-center">Email</th>
                <th width="5%" class="text-center">Phone Number</th>
                <th width="5%" class="text-center">Volunteer Status</th>
                <th width="10%" class="text-center">Position</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;foreach($volunt as $v): ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center" style="cursor:pointer"
                    onclick="window.location='<?=base_url('hr/volunteer/view/'.$v['volunt_id']);?>'">
                    <?=$v['volunt_firstname']." ".$v['volunt_lastname'];?></td>
                <td class="text-center"><?=$v['volunt_graduatedfr']; ?></td>
                <td class="text-center"><?=$v['volunt_major']; ?></td>
                <td class="text-center"><?=$v['volunt_mail']; ?></td>
                <td class="text-center"><?=$v['volunt_phone']; ?></td>
                <td class="text-center">
                    <?php
                        if($v['volunt_status']==1){echo '<div class="badge badge-success">Active</div>';} else
                        if($v['volunt_status']==2){echo '<div class="badge badge-danger">Not Active</div>';}
                    ?>
                </td>
                <td class="text-center"><?=$v['volunt_position']; ?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>