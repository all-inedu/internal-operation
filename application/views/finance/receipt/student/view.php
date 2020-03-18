<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; View Receipt
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/receipt/student/');?>"> Receipt List</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">View Receipt</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-3">
        <div class="card shadow mb-2 ">
            <div class="card-body text-center">
                <img src="https://image.freepik.com/free-vector/man-with-headphones-microphone-with-computer_113065-136.jpg"
                    alt="client management" width="70%">
                <h5><?=$rec['st_firstname'].' '.$rec['st_lastname'];?></h5>
                <h6 class="text-info"><?=$rec['prog_program'];?></h6>
                <hr>
                <a href="<?=base_url('finance/receipt/student/cancel/'.$rec['receipt_num']);?>"
                    class="btn btn-sm btn-danger cancel-button" data-message="receipt"><i
                        class="fas fa-times"></i>&nbsp; Cancel</a>
                <a href="<?=base_url('finance/receipt/student/edit/'.$rec['receipt_num']);?>"
                    class="btn btn-sm btn-warning ml-2 mr-2"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                <a href="<?=base_url('finance/receipt/student/pdf/'.$rec['receipt_num']);?>"
                    class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-print"></i>&nbsp; Print</a>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card shadow mb-2">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Receipt </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-3">
                        No Receipt :
                    </div>
                    <div class="col-md-9">
                        <?=$rec['receipt_id'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Receipt Date :
                    </div>
                    <div class="col-md-9">
                        <?=date('d F Y', strtotime($rec['receipt_date']));?>
                        <hr class="mt-1 mb-2">
                    </div>

                    <?php if($rec['invdtl_id']) { ?>
                    <div class="col-md-3">
                        Installment Name :
                    </div>
                    <div class="col-md-9">
                        <?php 
                            $invdtl_id = $rec['invdtl_id'];
                            $invdtl = $this->invdetail->showDetailId($invdtl_id);
                            echo $invdtl['invdtl_statusname'];
                        ?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <?php } ?>

                    <div class="col-md-3">
                        Amount :
                    </div>
                    <div class="col-md-9">
                        Rp. <?=number_format($rec['receipt_amount']);?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Payment Method :
                    </div>
                    <div class="col-md-9">
                        <?=$rec['receipt_mtd'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Cheque Number :
                    </div>
                    <div class="col-md-9">
                        <?=$rec['receipt_cheque'];?>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-3">
                        No Invoice :
                    </div>
                    <div class="col-md-9">
                        <?=$rec['inv_id'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Price :
                    </div>
                    <div class="col-md-9">
                        <?php if($rec['inv_category']=='usd') { ?>
                        $<?=number_format($rec['inv_priceusd']);?> ( Rp. <?=number_format($rec['inv_priceidr']);?> )
                        <?php } else { ?>
                        Rp. <?=number_format($rec['inv_priceidr']);?>
                        <?php } ?>
                        <hr class="mt-1 mb-2">
                    </div>

                    <?php if($rec['inv_category']=='usd') { ?>
                    <div class="col-md-3">
                        Early Bird :
                    </div>
                    <div class="col-md-9">
                        $<?=number_format($rec['inv_earlybirdusd']);?> ( Rp.
                        <?=number_format($rec['inv_earlybirdidr']);?> )
                        <hr class="mt-1 mb-2">
                    </div>
                    <?php } ?>


                    <?php if($rec['inv_category']=='session') { ?>
                    <div class="col-md-3">
                        Session :
                    </div>
                    <div class="col-md-9">
                        <?=$rec['inv_session'];?> x
                        <hr class="mt-1 mb-2">
                    </div>

                    <div class="col-md-3">
                        Duration :
                    </div>
                    <div class="col-md-9">
                        <?=$rec['inv_duration'];?> Minutes
                        <hr class="mt-1 mb-2">
                    </div>
                    <?php } ?>

                    <div class="col-md-3">
                        Discount :
                    </div>
                    <div class="col-md-9">
                        <?php if($rec['inv_category']=='usd') { ?>
                        $<?=number_format($rec['inv_discusd']);?> ( Rp. <?=number_format($rec['inv_discidr']);?> )
                        <?php } else { ?>
                        Rp. <?=number_format($rec['inv_discidr']);?>
                        <?php } ?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        <b>Total Price : </b>
                    </div>
                    <div class="col-md-9">
                        <b>
                            <?php if($rec['inv_category']=='usd') { ?>
                            $<?=number_format($rec['inv_totprusd']);?> ( Rp. <?=number_format($rec['inv_totpridr']);?> )
                            <?php } else { ?>
                            Rp. <?=number_format($rec['inv_totpridr']);?>
                            <?php } ?>
                        </b>
                        <br>
                        <small>
                            <?=$rec['inv_words'];?>
                        </small>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Payment Method :
                    </div>
                    <div class="col-md-9">
                        <?=$rec['inv_paymentmethod'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Date :
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <small>Invoice Date :</small><br>
                                <?=date('d F Y', strtotime($rec['inv_date']));?>
                            </div>
                            <div class="col-md-3">
                                <small>Due Date :</small><br>
                                <?=date('d F Y', strtotime($rec['inv_duedate']));?>
                            </div>
                        </div>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Notes :
                    </div>
                    <div class="col-md-9">
                        <?=$rec['inv_notes'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Terms & Condition :
                    </div>
                    <div class="col-md-9">
                        <?=$rec['inv_tnc'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <?php if($rec['inv_paymentmethod']=='Installment'){ ?>
                    <div class="col-md-12 mt-3">
                        <table class="table table-bordered text-center">
                            <tr>
                                <th>Name</th>
                                <th>Due Date</th>
                                <th>Percent</th>
                                <th>Amount</th>
                            </tr>
                            <?php foreach($invdtls as $id){ ?>
                            <tr>
                                <td><?=$id['invdtl_statusname'];?></td>
                                <td><?=date('d F Y', strtotime($id['invdtl_duedate']));?></td>
                                <td><?=$id['invdtl_percentage'];?>%</td>
                                <td>
                                    $<?=number_format($id['invdtl_amountusd']);?>
                                    ( Rp. <?=number_format($id['invdtl_amountidr']);?> )
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>