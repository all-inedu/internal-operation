<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Receipt List
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Receipt List</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="content">
    <a href="#" class="btn btn-sm btn-warning ml-2 add" data-toggle="modal" data-target="#addReceipt">
        <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Receipt
    </a>
    <a href="<?=base_url('finance/receipt/referral/partners/');?>" class="btn btn-sm btn-success ml-2 add">
        <i class="fas fa-tasks"></i>&nbsp; Partner List
    </a>
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead class="text-center">
            <tr>
                <th width="1%">No</th>
                <th width="15%" class="bg-primary text-white">Receipt ID</th>
                <th width="15%">Partner</th>
                <th width="10%">Date</th>
                <th width="10%">Payment Method</th>
                <th width="15%">Amount</th>
                <th>Notes</th>
                <th width="5%"></th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php $i=1; foreach ($receipt as $r): ?>
            <tr>
                <td class="align-middle"><?=$i;?></td>
                <td class="align-middle" style="cursor:pointer"
                    onclick="window.location='<?=base_url('finance/receipt/referral/view/'.$r['receipt_num']);?>'"><?=$r['receipt_id'];?></td>
                <td class="align-middle"><?=$r['pt_name'];?></td>
                <td class="align-middle"><?=date('d F Y', strtotime($r['receipt_date']));?></td>
                <td class="align-middle"><?=$r['receipt_mtd'];?></td>
                <td class="align-middle">Rp. <?=number_format($r['receipt_amount']);?></td>
                <td class="align-middle"><?=$r['receipt_notes'];?></td>
                <td>
                    <a href="<?=base_url('finance/receipt/referral/delete/'.$r['receipt_num']);?>" class="btn btn-sm btn-danger delete-button" data-message="receipt" title="Delete"><i class="fa fa-trash"></i></a>

                    <a href="<?=base_url('finance/receipt/referral/pdf/'.$r['receipt_num']);?>"
                    class="btn btn-sm btn-primary m-1" target="_blank" title="print"><i class="fas fa-print"></i></a>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addReceipt" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?=base_url('finance/receipt/referral/save');?>" method="post" name="save">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Receipt</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Partner <i class="text-danger font-weight-bold">*</i></label>
                                <select id="partner" name="pt_id">
                                    <option data-placeholder="true"></option>
                                    <?php foreach($partners as $p): ?>
                                    <option value="<?=$p['pt_id'];?>"><?=$p['pt_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                                <?=form_error('pt_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Receipt Date <i class="text-danger font-weight-bold">*</i></label>
                                <input name="receipt_date" type="date" class="form-control form-control-sm"
                                    >
                                <?=form_error('receipt_date', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Payment Method <i class="text-danger font-weight-bold">*</i></label>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount (IDR) <i class="text-danger font-weight-bold">*</i></label>
                                <input type="number" name="receipt_amount" id="amount"
                                        class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Words <i class="text-danger font-weight-bold">*</i></label>
                                <input type="text" id="words" name="receipt_words" class="form-control form-control-sm"
                                readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notes <i class="text-danger font-weight-bold">*</i></label>
                                <textarea name="receipt_notes" class="form-control form-control-sm" placeholder="Address"
                                    rows="5" id="receipt_notes"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script src="<?=base_url('assets/js/generate-number.js');?>"></script>
<script src="<?=base_url('assets/js/disable-copas.js');?>"></script>

<script>
let Partner = new SlimSelect({
    select: '#partner',
    placeholder: 'Select partner ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

function paymentMethods() {
    let pm = $('#paymentMethod').val();
    if (pm == 'Cheque') {
        $('#cheque').prop("readonly", false)
        $('#cheque').focus();
    } else {
        $('#cheque').prop("readonly", true)
    }
}

$('#amount').keyup(function() {
    let am = $(this).val();
    $('#words').val(capitalize(am));

});
</script>