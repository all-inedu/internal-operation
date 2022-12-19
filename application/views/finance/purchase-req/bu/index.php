<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Purchase Request
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Purchase Request</li>
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
            <tr class="text-center">
                <th width="1%">No</th>
                <th width="10%" class="bg-primary text-white">ID Purchase</th>
                <th width="10%">Division</th>
                <th width="5%">Request Status</th>
                <th width="5%">Request Date</th>
                <th width="5%">Last Updated Date</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($purchase as $p) : ?>
            <tr class="text-center">
                <td><?=$i;?></td>
                <td style="cursor:pointer"
                    onclick="window.location='<?=base_url('finance/purchase-request/view/'.$p['purchase_id']);?>'">
                    <?=$p['purchase_id'];?>
                </td>
                <td><?=$p['purchase_department'];?></td>
                <td><?=$p['purchase_statusrequest'];?></td>
                <td><?=date('d M Y', strtotime($p['purchase_date']));?></td>
                <td><?=date('d M Y', strtotime($p['purchase_lastupdate']));?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>