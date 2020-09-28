<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; View Invoice
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/invoice/student/');?>"> Students
                            Program</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Invoice</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-3">
        <div class="card shadow card-sticky mb-3 ">
            <div class="card-body text-center">
                <img src="<?=base_url('assets/img/user.png');?>" alt="client management" width="60%">
                <h5><a target="_blank" href="<?=base_url('client/profile/edit/'.$inv['st_num']);?>">
                        <?=$inv['st_firstname'].' '.$inv['st_lastname'];?>
                    </a></h5>
                <h6 class="text-info">
                    <?php 
                        if($inv['prog_sub']=='-') {
                            echo $inv['prog_program'];
                        } else {
                            echo $inv['prog_sub'].': '.$inv['prog_program'];
                        }
                    ?>
                </h6>
                <hr>
                <a href="<?=base_url('finance/invoice/student/cancel/'.$inv['inv_num']);?>"
                    class="btn btn-sm btn-danger cancel-button" data-message="invoice"><i
                        class="fas fa-times"></i>&nbsp; Cancel</a>
                <a href="<?=base_url('finance/invoice/student/edit/'.$inv['inv_num']);?>"
                    class="btn btn-sm btn-warning ml-2 mr-2"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                <a href="<?=base_url('finance/invoice/student/pdf/'.$inv['inv_num']);?>" class="btn btn-sm btn-primary"
                    target="_blank"><i class="fas fa-print"></i>&nbsp; Print</a>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <?php if($inv['inv_category']=="usd") { ?>
        <!-- USD  -->
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <?php if($inv['inv_paymentmethod']=="Full Payment") { ?>
                <div class="float-right" style="margin-top:-30px;">
                    <?php 
                    if(!$rec) {
                    ?>
                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#addReceipt"
                        onclick="addReceipt(<?=$inv['inv_num'];?>)"><i class="fas fa-plus"></i> &nbsp; Add
                        Receipt</button>
                    <?php } else { ?>
                    <a href="<?=base_url('finance/receipt/student/view/'.$rec['receipt_num']);?>"
                        class="btn btn-sm btn-success">
                        <i class="icofont-search"></i> &nbsp;
                        View Receipt
                    </a>
                    <?php } ?>
                </div>
                <?php } ?>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-3">
                        No Invoice :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_id'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Price :
                    </div>
                    <div class="col-md-9">
                        $<?=number_format($inv['inv_priceusd']);?> &nbsp; ( Rp.
                        <?=number_format($inv['inv_priceidr']);?> )
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Early Bird :
                    </div>
                    <div class="col-md-9">
                        $<?=number_format($inv['inv_earlybirdusd']);?> &nbsp; ( Rp.
                        <?=number_format($inv['inv_earlybirdidr']);?> )
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Discount :
                    </div>
                    <div class="col-md-9">
                        $<?=number_format($inv['inv_discusd']);?> &nbsp; ( Rp.
                        <?=number_format($inv['inv_discidr']);?> )
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        <b>Total Price : </b>
                    </div>
                    <div class="col-md-9">
                        <b>
                            $<?=number_format($inv['inv_totprusd']);?> &nbsp; ( Rp.
                            <?=number_format($inv['inv_totpridr']);?> )
                        </b><br>
                        <p>
                            <?=$inv['inv_words'];?>
                        </p>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Payment Method :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_paymentmethod'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Date :
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <small>Invoice Date :</small><br>
                                <?=date('d F Y', strtotime($inv['inv_date']));?>
                            </div>
                            <div class="col-md-3">
                                <small>Due Date :</small><br>
                                <?=date('d F Y', strtotime($inv['inv_duedate']));?>
                            </div>
                        </div>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Notes :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_notes'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Terms & Condition :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_tnc'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <?php if($inv['inv_paymentmethod']=='Installment'){ ?>
                    <div class="col-md-12 mt-3">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Due Date</th>
                                    <th>Percent</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($invdtl as $id){ ?>
                                <tr>
                                    <td><?=$id['invdtl_statusname'];?></td>
                                    <td><?=date('d F Y', strtotime($id['invdtl_duedate']));?></td>
                                    <td><?=$id['invdtl_percentage'];?>%</td>
                                    <td>
                                        $<?=number_format($id['invdtl_amountusd']);?>
                                        ( Rp. <?=number_format($id['invdtl_amountidr']);?> )
                                    </td>
                                    <td>
                                        <?php
                                            $invdtl_id = $id['invdtl_id'];
                                            $rec_detail = $this->receipt->showByInvdtlId($invdtl_id);
                                            if(!$rec_detail){
                                        ?>
                                        <button class="btn btn-sm btn-secondary" data-toggle="modal"
                                            data-target="#addReceipt"
                                            onclick="addReceiptInsallment(<?=$id['invdtl_id'];?>)"><i
                                                class="fas fa-plus"></i> &nbsp; Add
                                            Receipt</button>
                                        <?php } else { ?>
                                        <a href="<?=base_url('finance/receipt/student/view/'.$rec_detail['receipt_num']);?>"
                                            class="btn btn-sm btn-success">
                                            <i class="icofont-search"></i> &nbsp;
                                            View Receipt
                                        </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php } else if($inv['inv_category']=="idr") { ?>
        <!-- IDR  -->
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <?php if($inv['inv_paymentmethod']=="Full Payment") { ?>
                <div class="float-right" style="margin-top:-30px;">
                    <?php 
                    if(!$rec) {
                    ?>
                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#addReceipt"
                        onclick="addReceipt(<?=$inv['inv_num'];?>)"><i class="fas fa-plus"></i>&nbsp; Add
                        Receipt</button>
                    <?php } else { ?>
                    <a href="<?=base_url('finance/receipt/student/view/'.$rec['receipt_num']);?>"
                        class="btn btn-sm btn-success">
                        <i class="icofont-search"></i> &nbsp;
                        View Receipt
                    </a>
                    <?php } ?>
                </div>
                <?php } ?>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-3">
                        No Invoice :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_id'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Price :
                    </div>
                    <div class="col-md-9">
                        Rp. <?=number_format($inv['inv_priceidr']);?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Discount :
                    </div>
                    <div class="col-md-9">
                        Rp. <?=number_format($inv['inv_discidr']);?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        <b>Total Price : </b>
                    </div>
                    <div class="col-md-9">
                        <b>
                            Rp. <?=number_format($inv['inv_totpridr']);?>
                        </b><br>
                        <?=$inv['inv_words'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Payment Method :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_paymentmethod'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Date :
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <small>Invoice Date :</small><br>
                                <?=date('d F Y', strtotime($inv['inv_date']));?>
                            </div>
                            <div class="col-md-3">
                                <small>Due Date :</small><br>
                                <?=date('d F Y', strtotime($inv['inv_duedate']));?>
                            </div>
                        </div>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Notes :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_notes'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Terms & Condition :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_tnc'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <?php if($inv['inv_paymentmethod']=='Installment'){ ?>
                    <div class="col-md-12 mt-3">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Due Date</th>
                                    <th>Percent</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($invdtl as $id){ ?>
                                <tr>
                                    <td><?=$id['invdtl_statusname'];?></td>
                                    <td><?=date('d F Y', strtotime($id['invdtl_duedate']));?></td>
                                    <td><?=$id['invdtl_percentage'];?>%</td>
                                    <td>
                                        Rp. <?=number_format($id['invdtl_amountidr']);?>
                                    </td>
                                    <td>
                                        <?php
                                            $invdtl_id = $id['invdtl_id'];
                                            $rec_detail = $this->receipt->showByInvdtlId($invdtl_id);
                                            if(!$rec_detail){
                                        ?>
                                        <button class="btn btn-sm btn-secondary" data-toggle="modal"
                                            data-target="#addReceipt"
                                            onclick="addReceiptInsallment(<?=$id['invdtl_id'];?>)"><i
                                                class="fas fa-plus"></i> &nbsp; Add
                                            Receipt</button>
                                        <?php } else { ?>
                                        <a href="<?=base_url('finance/receipt/student/view/'.$rec_detail['receipt_num']);?>"
                                            class="btn btn-sm btn-success">
                                            <i class="icofont-search"></i> &nbsp;
                                            View Receipt
                                        </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php } else if($inv['inv_category']=="session") { ?>
        <!-- SESSION -->
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <?php if($inv['inv_paymentmethod']=="Full Payment") { ?>
                <div class="float-right" style="margin-top:-30px;">
                    <?php 
                    if(!$rec) {
                    ?>
                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#addReceipt"
                        onclick="addReceipt(<?=$inv['inv_num'];?>)"><i class="fas fa-plus"></i>&nbsp; Add
                        Receipt</button>
                    <?php } else { ?>
                    <a href="<?=base_url('finance/receipt/student/view/'.$rec['receipt_num']);?>"
                        class="btn btn-sm btn-success">
                        <i class="icofont-search"></i> &nbsp;
                        View Receipt
                    </a>
                    <?php } ?>
                </div>
                <?php } ?>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-3">
                        No Invoice :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_id'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Price/Hours :
                    </div>
                    <div class="col-md-9">
                        Rp. <?=number_format($inv['inv_priceidr']);?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Session :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_session'];?> x
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Duration/Session :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_duration'];?> Minutes
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Discount :
                    </div>
                    <div class="col-md-9">
                        Rp. <?=number_format($inv['inv_discidr']);?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        <b>Total Price : </b>
                    </div>
                    <div class="col-md-9">
                        <b>
                            Rp. <?=number_format($inv['inv_totpridr']);?>
                        </b><br>
                        <?=$inv['inv_words'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Payment Method :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_paymentmethod'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Date :
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <small>Invoice Date :</small><br>
                                <?=date('d F Y', strtotime($inv['inv_date']));?>
                            </div>
                            <div class="col-md-3">
                                <small>Due Date :</small><br>
                                <?=date('d F Y', strtotime($inv['inv_duedate']));?>
                            </div>
                        </div>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Notes :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_notes'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Terms & Condition :
                    </div>
                    <div class="col-md-9">
                        <?=$inv['inv_tnc'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<div class="modal fade" id="addReceipt" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i>&nbsp; Add Receipt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('finance/receipt/student/save');?>" method="post" name="receipt">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Amount <i class="text-danger font-weight-bold">*</i></label>
                            <div class="form-group">
                                <input type="hidden" name="inv_id" value="<?=$inv['inv_id'];?>">
                                <input type="hidden" id="invdtl_id" name="invdtl_id">
                                <input type="hidden" name="receipt_cat" value="1">
                                <input type="hidden" id="receipt_amountusd" name="receipt_amountusd">
                                <input type="number" name="receipt_amount" id="amount"
                                    class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Date <i class="text-danger font-weight-bold">*</i></label>
                            <div class="form-group">
                                <input type="date" name="receipt_date" id="date" class="form-control form-control-sm"
                                    value="<?=date('Y-m-d');?>">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" id="words" name="receipt_words" class="form-control form-control-sm"
                                readonly>
                            <input type="hidden" id="wordsusd" name="receipt_wordsusd"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6">
                            <label>Payment Method <i class="text-danger font-weight-bold">*</i></label>
                            <div class="form-group">
                                <select name="receipt_mtd" id="paymentMethod" class="form-control form-control-sm"
                                    onchange="paymentMethods()">
                                    <option value="Wire Transfer">Wire Transfer</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheque">Cheque</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Cheque No</label>
                            <div class="form-group">
                                <input type="text" name="receipt_cheque" id="cheque"
                                    class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url('assets/js/generate-number.js');?>"></script>
<script>
function paymentMethods() {
    let pm = $('#paymentMethod').val();
    if (pm == 'Cheque') {
        $('#cheque').prop("readonly", false)
        $('#cheque').focus();
    } else {
        $('#cheque').prop("readonly", true)
    }
}

function addReceipt(x) {
    $.ajax({
        type: 'post',
        url: '<?=base_url("finance/invoice/student/showinvnumjson/");?>' + x,
        dataType: 'json',
        success: function(data) {
            console.log(data)
            $('#amount').val(data.inv_totpridr);
            $('#words').val(capitalize(data.inv_totpridr));
            $('#receipt_amountusd').val(data.inv_totprusd);
            $('#wordsusd').val(capitalizeUSD(data.inv_totprusd));

        }
    });
}

function addReceiptInsallment(x) {
    $.ajax({
        type: 'post',
        url: '<?=base_url("finance/invoice/student/showinvdtljson/");?>' + x,
        dataType: 'json',
        success: function(data) {
            console.log(data)
            $('#invdtl_id').val(data.invdtl_id);
            $('#amount').val(data.invdtl_amountidr);
            $('#words').val(capitalize(data.invdtl_amountidr));
            $('#receipt_amountusd').val(data.invdtl_amountusd);
            $('#wordsusd').val(capitalizeUSD(data.invdtl_amountusd));
        }
    });
}

$('#amount').keyup(function() {
    let am = $(this).val();
    $('#words').val(capitalize(am));
});
</script>