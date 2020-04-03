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
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/invoice/school/');?>"> Schools
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
        <div class="card shadow mb-3">
            <div class="card-body text-center">
                <img src="<?=base_url('assets/img/user.png');?>" alt="client management" width="60%">
                <h5><?=$schprog['sch_name'];?></h5>
                <div class="text-info">
                    <h6><?=$schprog['prog_program'];?></h6>
                </div>
                <?php if($fixprog) { ?>
                Program Date <br>
                <small>
                    <?=date('d F Y', strtotime($fixprog['schprogfix_eventstartdate'])).' - '.date('d F Y', strtotime($fixprog['schprogfix_eventenddate']));?>
                </small>
                <?php } ?>
                <hr>
                <a href="<?=base_url('finance/invoice/school/cancel/'.$schprog['schprog_id']);?>"
                    class="btn btn-sm btn-danger cancel-button" data-message="invoice"><i
                        class="fas fa-times"></i>&nbsp; Cancel</a>

                <a href="<?=base_url('finance/invoice/school/edit/'.$schprog['schprog_id']);?>"
                    class="btn btn-sm btn-warning ml-2 mr-2"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>

                <a href="<?=base_url('finance/invoice/school/pdf/'.$schprog['schprog_id']);?>"
                    class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-print"></i>&nbsp; Print</a>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow mb-3">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <div class="float-right" style="margin-top:-30px;">
                    <?php 
                    if(!$rec) {
                    ?>
                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#addReceipt"
                        onclick="addReceipt(<?=$schprog['invsch_num'];?>)"><i class="fas fa-plus"></i> &nbsp; Add
                        Receipt</button>
                    <?php } else { ?>
                    <a href="<?=base_url('finance/receipt/school/view/'.$rec['receipt_num']);?>"
                        class="btn btn-sm btn-success">
                        <i class="icofont-search"></i> &nbsp;
                        View Receipt
                    </a>
                    <?php } ?>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-2">
                        Invoice ID :
                    </div>
                    <div class="col-md-10">
                        <?=$schprog['invsch_id'];?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-2">
                        Price :
                    </div>
                    <div class="col-md-10">
                        Rp. <?=number_format($schprog['invsch_price']);?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-2">
                        Participans :
                    </div>
                    <div class="col-md-10 ">
                        <?=$schprog['invsch_participants'];?> Students
                        <hr class="mt-1 mb-2">
                    </div>

                    <div class="col-md-2">
                        Discount :
                    </div>
                    <div class="col-md-10 ">
                        Rp. <?=number_format($schprog['invsch_disc']);?>
                        <hr class="mt-1 mb-2">
                    </div>

                    <div class="col-md-2">
                        Total Price :
                    </div>
                    <div class="col-md-10 ">
                        Rp. <?=number_format($schprog['invsch_totprice']);?> <br>
                        <small><?=$schprog['invsch_words'];?></small>
                        <hr class="mt-1 mb-2">
                    </div>

                    <div class="col-md-2">
                        Date :
                    </div>
                    <div class="col-md-10 ">
                        <div class="row">
                            <div class="col-md-3">
                                <small>Invoice Date </small><br>
                                <?=date('d F Y', strtotime($schprog['invsch_date']));?>
                                <hr class="mt-1 mb-2">
                            </div>
                            <div class="col-md-3">
                                <small>Due Date</small><br>
                                <?=date('d F Y', strtotime($schprog['invsch_duedate']));?>
                                <hr class="mt-1 mb-2">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 ">
                        Notes :
                    </div>
                    <div class="col-md-10 mb-3">
                        <?=$schprog['invsch_notes'];?>
                    </div>

                    <div class="col-md-2 mb-3">
                        Terms & Condition :
                    </div>
                    <div class="col-md-10 mb-3">
                        <?=$schprog['invsch_tnc'];?>
                    </div>
                </div>
            </div>
        </div>
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
            <form action="<?=base_url('finance/receipt/school/save');?>" method="post" name="receipt">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Amount <i class="text-danger font-weight-bold">*</i></label>
                            <div class="form-group">
                                <input type="hidden" name="invsch_id" value="<?=$schprog['invsch_id'];?>">
                                <input type="hidden" name="schprog_id" value="<?=$schprog['schprog_id'];?>">
                                <input type="hidden" name="receipt_cat" value="2">
                                <input type="number" name="receipt_amount" id="amount"
                                    class="form-control form-control-sm" value="<?=$schprog['invsch_totprice'];?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Date <i class="text-danger font-weight-bold">*</i></label>
                            <div class="form-group">
                                <input type="date" name="receipt_date" id="date" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" id="words" name="receipt_words" class="form-control form-control-sm"
                                value="<?=$schprog['invsch_words'];?>" readonly>
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
</script>