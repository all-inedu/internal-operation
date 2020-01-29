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
                            <div class="row">
                                <div class="col-md-4">
                                    <input name="idPurchase" type="text" class="form-control form-control-sm"
                                        placeholder="PCS001">
                                    <?=form_error('idPurchase', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            Division :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <select name="division" id="division">
                                        <option data-placeholder="true"></option>
                                        <?php foreach($div as $d):?>
                                        <option value="<?=$d;?>"><?=$d;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?=form_error('division', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            Request Status :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="reqStatus" id="reqStatus">
                                        <option data-placeholder="true"></option>
                                        <?php foreach($status as $st):?>
                                        <option value="<?=$st;?>"><?=$st;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?=form_error('reqStatus', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            Request Date :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <input name="reqDate" type="date" class="form-control form-control-sm">
                                    <?=form_error('reqDate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            Notes :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="notes" class="form-control form-control-sm" rows="4"></textarea>
                                    <?=form_error('notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
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
                                        <th>Action</th>
                                    </tr>

                                    <?php for($i=1;$i<=4;$i++){ ?>
                                    <tr class="text-center">
                                        <td width="5%" class="align-middle"><?=$i;?></td>
                                        <td class="align-middle">Kertas A4</td>
                                        <td class="align-middle">2</td>
                                        <td class="align-middle">45000</td>
                                        <td class="align-middle">90000</td>
                                        <td width="15%" class="align-middle">
                                            <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>&nbsp;
                            Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>