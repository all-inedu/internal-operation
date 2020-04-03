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
                    <li class="breadcrumb-item"><a href="<?=base_url('finance');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/purchase-request');?>">Purchase
                            Request</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-3 mb-2">
        <div class="card shadow card-sticky">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/purchase.png');?>" alt="client management" width="50%">
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <h5>Purchase Request</h5>
                    <a href="<?=base_url('finance/purchase-request/edit/'.$purchase['purchase_id']);?>"
                        class="btn btn-sm btn-info m-1"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                    <a href="<?=base_url('finance/purchase-request/delete/'.$purchase['purchase_id']);?>"
                        class="btn btn-danger btn-sm delete-button" data-message="purchase request"><i
                            class="fas fa-trash"></i>&nbsp; Delete</a>
                    <a href="<?=base_url('finance/purchase-request/print/'.$purchase['purchase_id']);?>"
                        class="btn btn-primary btn-sm m-1" target="_blank"><i class="fas fa-print"></i>&nbsp; Print</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post">
                    <h6><i class="icofont-notebook"></i>&nbsp; Purchase Request
                        <div class="float-right">
                            <a href="<?=base_url('finance/purchase-request');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">

                        <div class="col-md-4 mb-2">
                            Purchase ID :
                        </div>
                        <div class="col-md-7 mb-3">
                            <?=$purchase['purchase_id'];?>
                            <hr class="mt-1 mb-1">
                        </div>

                        <div class="col-md-4 mb-2">
                            Division :
                        </div>
                        <div class="col-md-7 mb-3">
                            <?=$purchase['purchase_department'];?>
                            <hr class="mt-1 mb-1">
                        </div>

                        <div class="col-md-4 mb-2">
                            Request Status :
                        </div>
                        <div class="col-md-7 mb-3">
                            <?=$purchase['purchase_statusrequest'];?>
                            <hr class="mt-1 mb-1">
                        </div>
                        <div class="col-md-4 mb-2">
                            Request Date :
                        </div>
                        <div class="col-md-7 mb-3">
                            <?=date('d M Y', strtotime($purchase['purchase_date']));?>
                            <hr class="mt-1 mb-1">
                        </div>

                        <div class="col-md-4 mb-2">
                            Notes :
                        </div>
                        <div class="col-md-7 mb-3">
                            <?=$purchase['purchase_notes'];?>
                            <hr class="mt-1 mb-1">
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Item Name</th>
                                        <th>Amount</th>
                                        <th>Price/Unit</th>
                                        <th>Total</th>
                                    </tr>

                                    <?php 
                                    $total = 0;
                                    $i=1; foreach($detail as $d): ?>
                                    <tr class="text-center">
                                        <td width="5%" class="align-middle"><?=$i;?></td>
                                        <td class="align-middle"><?=$d['purchasedtl_good'];?></td>
                                        <td class="align-middle"><?=$d['purchasedtl_amount'];?></td>
                                        <td class="align-middle">Rp. <?=number_format($d['purchasedtl_priceperunit']);?>
                                        </td>
                                        <td class="align-middle">Rp. <?=number_format($d['purchasedtl_total']);?></td>
                                    </tr>
                                    <?php 
                                    $total += $d['purchasedtl_total'];
                                    $i++; endforeach; 
                                    ?>
                                    <tfoot>
                                        <tr class="text-center">
                                            <td colspan=4 class="align-middle">Total</td>
                                            <td class="align-middle">Rp. <?=number_format($total);?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>