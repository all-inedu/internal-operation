<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Influencer
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Influencer</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="<?=base_url('hr/influencer/add');?>" class="btn btn-sm btn-success ml-2 add">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Influencer
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr class="text-center">
                <th width="1%">No</th>
                <th width="10%" class="text-white bg-primary">Full Name</th>
                <th width="5%">Email</th>
                <th width="5%">Phone Number</th>
                <th width="5%">Influencer Status</th>
                <th width="15%">Address</th>
                <th width="10%">Fee per Post</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($infl as $in): ?>
            <tr class="text-center">
                <td><?=$i;?></td>
                <td style="cursor:pointer"
                    onclick="window.location='<?=base_url('hr/influencer/view/'.$in['infl_id']);?>'">
                    <?=$in['infl_fn'];?>
                </td>
                <td><?=$in['infl_mail'];?></td>
                <td><?=$in['infl_phone'];?></td>
                <td>
                    <?php 
                        if($in['infl_status']==1){echo '<div class="p-2 badge badge-white shadow text-success">Active</div>';} else
                        if($in['infl_status']==2){echo '<div class="p-2 badge badge-white shadow text-danger">Not Active</div>';}
                    ?>
                </td>
                <td><?=$in['infl_address'];?></td>
                <td>Rp. <?=number_format($in['infl_feeperpost']);?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>