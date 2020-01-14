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
            <tr>
                <th width="1%">No</th>
                <th width="5%" class="text-center">Full Name</th>
                <th width="5%" class="text-center">Email</th>
                <th width="5%" class="text-center">Phone Number</th>
                <th width="5%" class="text-center">Influencer Status</th>
                <th width="10%" class="text-center">Address</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=8;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center" style="cursor:pointer"
                    onclick="window.location='<?=base_url('hr/influencer/view');?>'">Budi Setiawan</td>
                <td class="text-center">mail@gmail.com</td>
                <td class="text-center">081212412xx</td>
                <td class="text-center">Active</td>
                <td class="text-center">Address</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>