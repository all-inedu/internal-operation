<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Mentor
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mentor</li>
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
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr class="text-center">
                <th width="1%">No</th>
                <th width="15%" class="text-center bg-primary text-white">Full Name</th>
                <th width="10%">Graduated From</th>
                <th width="15%">Position</th>
                <th width="10%">Email</th>
                <th width="10%">Phone Number</th>
                <th width="15%">Major</th>
                <th width="10%">Mentor Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($mentor as $m): ?>
            <?php if($m['mt_status']=='1') 
                { $st = "text-center"; } else 
                { $st = "text-center bg-dark text-white"; }?>
            <tr class="<?=$st;?>">
                <td><?=$i;?></td>
                <td class="text-left" style="cursor:pointer"
                    onclick="window.location='<?=base_url('hr/mentor/view/'.$m['mt_id']);?>'">
                    <?=$m['mt_firstn'].' '.$m['mt_lastn'];?>
                </td>
                <td class="text-left"><?=$m['univ_name'];?></td>
                <td>
                    <?php
                        if($m['mt_istutor']==1){echo 'Mentor';} else 
                        if($m['mt_istutor']==2){echo 'Mentor & Tutor';} else
                        if($m['mt_istutor']==3){echo 'Tutor';}
                        ?>
                </td>
                <td><?=$m['mt_email'];?></td>
                <td><?=$m['mt_phone'];?></td>
                <td class="text-left"><?=$m['mt_major'];?></td>
                <td>
                    <?php
                                if($m['mt_status']==0){echo '<div class="p-2 badge badge-white shadow text-danger">Potential</div>';} else 
                                if($m['mt_status']==1){echo '<div class="p-2 badge bg-white shadow text-success">Active</div>';} else
                                if($m['mt_status']==2){echo '<div class="p-2 badge badge-white shadow text-danger">Not Active</div>';}
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