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
                    <img src="<?=base_url('assets/img/school.png');?>" alt="client management" width="100%">
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <h5>Purchase Request</h5>
                    <a href="<?=base_url('finance/purchase-request/edit');?>" class="btn btn-sm btn-info m-1"><i
                            class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                    <a href="#" class="btn btn-danger btn-sm delete-button" data-message="purchase request"><i
                            class="fas fa-trash"></i>&nbsp; Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post">
                    <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Purchase Request
                        <div class="float-right">
                            <a href="<?=base_url('finance/purchase-request');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">

                        <div class="col-md-4 mb-2">
                            ID Purchase :
                        </div>
                        <div class="col-md-8 mb-3">
                            PCH001
                        </div>

                        <div class="col-md-4 mb-2">
                            Division :
                        </div>
                        <div class="col-md-8 mb-3">
                            Business Development
                        </div>

                        <div class="col-md-4 mb-2">
                            Request Status :
                        </div>
                        <div class="col-md-8 mb-3">
                            Urgent
                        </div>
                        <div class="col-md-4 mb-2">
                            Request Date :
                        </div>
                        <div class="col-md-8 mb-3">
                            28 January 2020
                        </div>

                        <div class="col-md-4 mb-2">
                            Notes :
                        </div>
                        <div class="col-md-8 mb-3">
                            Lorem Ipsum
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

                                    <?php for($i=1;$i<=4;$i++){ ?>
                                    <tr class="text-center">
                                        <td width="5%" class="align-middle"><?=$i;?></td>
                                        <td class="align-middle">Kertas A4</td>
                                        <td class="align-middle">2</td>
                                        <td class="align-middle">45000</td>
                                        <td class="align-middle">90000</td>
                                    </tr>
                                    <?php } ?>
                                    <tfoot>
                                        <tr class="text-center">
                                            <td colspan=4 class="align-middle">Total</td>
                                            <td class="align-middle"> 360000</td>
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