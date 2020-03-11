<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Editor
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editor</li>
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
<a href="<?=base_url('hr/editor/add');?>" class="btn btn-sm btn-success ml-2 add">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Editor
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr class="text-center">
                <th width="1%">No</th>
                <th width="5%" class="bg-primary text-white">Full Name</th>
                <th width="5%">Graduated From</th>
                <th width="5%">Major</th>
                <th width="5%">Email</th>
                <th width="5%">Phone Number</th>
                <th width="5%">Editor Status</th>
                <th width="10%">Position</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($editor as $e) : ?>
            <tr class="text-center">
                <td><?=$i;?></td>
                <td class="text-left" style="cursor:pointer"
                    onclick="window.location='<?=base_url('hr/editor/view/'.$e['editor_id']);?>'">
                    <?=$e['editor_fn']." ".$e['editor_ln'];?>
                </td>
                <td class="text-left"><?=$e['univ_name'];?></td>
                <td class="text-left"><?=$e['editor_major'];?></td>
                <td><?=$e['editor_mail'];?></td>
                <td><?=$e['editor_phone'];?></td>
                <td>
                    <?php 
                    if($e['editor_status']==1){echo '<div class="p-2 badge badge-white shadow text-success">Active</div>';} else
                    if($e['editor_status']==2){echo '<div class="p-2 badge badge-white shadow text-danger">Not Active</div>';} else {echo '<div class="badge badge-warning p-2">Potential</div>';}
                ?>
                </td>
                <td class="text-center">
                    <?php 
                    if($e['editor_position']==3){echo 'Managing Editor';} else
                    if($e['editor_position']==2){echo 'Senior Editor';} 
                    else {echo 'Associate Editor';}
                ?>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>