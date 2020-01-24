<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Vendor
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('vendor/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vendor</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="<?=base_url('finance/purchase-request/add');?>" class="btn btn-sm btn-success ml-2 add">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Purchase
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%" class="text-center">No</th>
                <th width="10%" class="text-center">ID Purchase</th>
                <th width="10%" class="text-center">Division</th>
                <th width="5%" class="text-center">Request Status</th>
                <th width="5%" class="text-center">Request Date</th>
                <th width="5%" class="text-center">Last Updated Date</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=25;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center">Encrihment Program</td>
                <td class="text-center">Academic Writing</td>
                <td class="text-center">Academic Writing</td>
                <td class="text-center">B2B/B2C</td>
                <td class="text-center">B2B/B2C</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>