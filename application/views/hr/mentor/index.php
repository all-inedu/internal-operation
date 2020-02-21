<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Potential Mentor
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Potential Mentor</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-12 text-center">
        <h6>Search :</h6>
        <input type="text" placeholder="Graduated From" id="searchData2" class="text-center m-2">
        <input type="text" placeholder="Major" id="searchData3" class="text-center m-2">
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="<?=base_url('hr/mentor/potential/add');?>" class="btn btn-sm btn-success ml-2 add">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Potential Mentor
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width="5%" class="text-center">Full Name</th>
                <th width="5%" class="text-center">Graduated From</th>
                <th width="5%" class="text-center">Major</th>
                <th width="5%" class="text-center">Email</th>
                <th width="5%" class="text-center">Phone Number</th>
                <th width="5%" class="text-center">Mentor Status</th>
                <th width="10%" class="text-center">Position</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($mentor as $m): ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center" style="cursor:pointer"
                    onclick="window.location='<?=base_url('hr/mentor/view/'.$m['mt_id']);?>'">
                    <?=$m['mt_firstn'].' '.$m['mt_lastn'];?>
                </td>
                <td class="text-center"><?=$m['univ_name'];?></td>
                <td class="text-center"><?=$m['mt_major'];?></td>
                <td class="text-center"><?=$m['mt_email'];?></td>
                <td class="text-center"><?=$m['mt_phone'];?></td>
                <td class="text-center">
                    <?php
                        if($m['mt_status']==0){echo 'Potential';} else 
                        if($m['mt_status']==1){echo 'Active';} else
                        if($m['mt_status']==2){echo 'Inactive';}
                    ?>
                </td>
                <td class="text-center">
                    <?php
                        if($m['mt_istutor']==1){echo 'Mentor';} else 
                        if($m['mt_istutor']==2){echo 'Mentor & Tutor';} else
                        if($m['mt_istutor']==3){echo 'Tutor';}
                    ?>
                </td>
            </tr>
            <?php $i++; endforeach;?>
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
</script>