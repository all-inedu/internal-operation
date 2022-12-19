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
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <h6><i class="icofont-notebook"></i>&nbsp; Purchase Request
                        <div class="float-right">
                            <a href="<?=base_url('finance/purchase-request/view/'.$purchase['purchase_id']);?>"
                                class="btn btn-sm btn-info"><i class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">

                        <div class="col-md-4 mb-2">
                            Purchase ID : <i class="text-danger font-weight-bold">*</i>
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <input name="purchase_id" type="text" class="form-control form-control-sm"
                                        value="<?=$purchase['purchase_id'];?>" readonly>
                                    <?=form_error('purchase_id', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            Division : <i class="text-danger font-weight-bold">*</i>
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <select name="purchase_department" id="division">
                                        <option data-placeholder="true"></option>
                                        <?php foreach($div as $d):?>
                                        <option value="<?=$d;?>"><?=$d;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?=form_error('purchase_department', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            Request Status : <i class="text-danger font-weight-bold">*</i>
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="purchase_statusrequest" id="reqStatus">
                                        <option data-placeholder="true"></option>
                                        <?php foreach($status as $st):?>
                                        <option value="<?=$st;?>"><?=$st;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?=form_error('purchase_statusrequest', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            Request Date : <i class="text-danger font-weight-bold">*</i>
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <input name="purchase_date" type="date" class="form-control form-control-sm"
                                        value="<?=$purchase['purchase_date'];?>">
                                    <?=form_error('purchase_date', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            Notes :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="purchase_notes" class="form-control form-control-sm"
                                        rows="4"><?=$purchase['purchase_notes'];?></textarea>
                                    <?=form_error('purchase_notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            Attachment :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="select_file" style="border: 1px solid #767676; border-radius: 2px; padding: 3px 7px">Choose File</button>
                                    <span id='val'>
                                        <?php
                                        if ($purchase['purchase_attachment'] != "") 
                                            echo $purchase['purchase_attachment'];
                                        else 
                                            echo "No file chosen";
                                        ?></span>
                                    <input type="file" name="attachment" style="visibility: hidden;"/>
                                    <input type="hidden" id="change_value" name="attachment_change" value="false">
                                    <input type="hidden" name="attachment_name" value="<?=$purchase['purchase_attachment']?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            Created by :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-sm" name="created_by" value="<?=$purchase['created_by']?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="float-right mb-2">
                                <a href="#" data-toggle="modal" data-target="#addPurchase"
                                    class="btn btn-info btn-sm"><i class="fas fa-plus-square"></i>
                                    &nbsp; Add Item
                                </a>
                            </div>
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

                                    <?php $i=1; foreach($detail as $d): ?>
                                    <tr class="text-center">
                                        <td width="5%" class="align-middle"><?=$i;?></td>
                                        <td class="align-middle"><?=$d['purchasedtl_good'];?></td>
                                        <td class="align-middle"><?=$d['purchasedtl_amount'];?></td>
                                        <td class="align-middle">Rp. <?=number_format($d['purchasedtl_priceperunit']);?>
                                        </td>
                                        <td class="align-middle">Rp. <?=number_format($d['purchasedtl_total']);?></td>
                                        <td width="15%" class="align-middle">
                                            <a href="#" data-toggle="modal" data-target="#editPurchase"
                                                onclick="editPurchases('<?=$d['purchasedtl_id'];?>')"
                                                class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="<?=base_url('finance/purchase-request/deleteDetail/'.$d['purchasedtl_id'].'/'.$purchase['purchase_id']);?>"
                                                class="btn btn-danger btn-sm delete-button" data-message="item"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
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

<!-- Add Modal -->
<div class="modal fade" id="addPurchase" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form action="../addDetail" method="post" name="addPurchase">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Item</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Item Name</label>
                                <input name="purchase_id" type="hidden" value="<?=$purchase['purchase_id'];?>">
                                <input name="purchasedtl_good" type="text" class="form-control form-control-sm"
                                    placeholder="Item Name">
                                <?=form_error('purchasedtl_good', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount
                                </label>
                                <input id="amountAdd" name="purchasedtl_amount" type="number"
                                    class="form-control form-control-sm" placeholder="0">
                                <?=form_error('purchasedtl_amount', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price/Unit
                                </label>
                                <input id="priceAdd" name="purchasedtl_priceperunit" type="number"
                                    class="form-control form-control-sm" placeholder="0">
                                <?=form_error('purchasedtl_priceperunit', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Total</label>
                                <input id="totalAdd" name="purchasedtl_total" type="number"
                                    class="form-control form-control-sm" placeholder="0" readonly>
                                <?=form_error('purchasedtl_total', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editPurchase" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form action="../updateDetail" method="post" name="editPurchase">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Item</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Item Name</label>
                                <input id="purchasedtl_id" name="purchasedtl_id" type="hidden">
                                <input id="purchase_id" name="purchase_id" type="hidden">
                                <input id="purchasedtl_good" name="purchasedtl_good" type="text"
                                    class="form-control form-control-sm" placeholder="Item Name">
                                <?=form_error('purchasedtl_good', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount
                                </label>
                                <input id="amount" name="purchasedtl_amount" type="number"
                                    class="form-control form-control-sm" placeholder="0">
                                <?=form_error('purchasedtl_amount', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price/Unit
                                </label>
                                <input id="price" name="purchasedtl_priceperunit" type="number"
                                    class="form-control form-control-sm" placeholder="0">
                                <?=form_error('purchasedtl_priceperunit', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Total</label>
                                <input id="total" name="purchasedtl_total" type="number"
                                    class="form-control form-control-sm" placeholder="0" readonly>
                                <?=form_error('purchasedtl_total', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
$("#select_file").click( function() {
    $("input[type=file][name=attachment]").trigger('click');
})

$("input[type=file][name=attachment]").change(function() {
    $("#val").text(this.value.replace(/C:\\fakepath\\/i, ''))
    $("#change_value").val("true");
})

let div = new SlimSelect({
    select: '#division',
    placeholder: 'Select division',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
div.set("<?=$purchase['purchase_department'];?>");

let st = new SlimSelect({
    select: '#reqStatus',
    placeholder: 'Select request status',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
st.set("<?=$purchase['purchase_statusrequest'];?>");

$('#amountAdd').keyup(function() {
    var val1 = $('#amountAdd').val();
    var val2 = $('#priceAdd').val();
    var val3 = val1 * val2;

    $('#totalAdd').val(val3);
})

$('#priceAdd').keyup(function() {
    var val1 = $('#amountAdd').val();
    var val2 = $('#priceAdd').val();
    var val3 = val1 * val2;

    $('#totalAdd').val(val3);
})

function editPurchases(x) {
    $('#amount').keyup(function() {
        var val1 = $('#amount').val();
        var val2 = $('#price').val();
        var val3 = val1 * val2;

        $('#total').val(val3);
    })

    $('#price').keyup(function() {
        var val1 = $('#amount').val();
        var val2 = $('#price').val();
        var val3 = val1 * val2;

        $('#total').val(val3);
    })

    console.log(x);
    $.ajax({
        type: "POST",
        url: "<?= base_url('finance/purchase-request/show/'); ?>" + x,
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('#purchasedtl_id').val(data.purchasedtl_id);
            $('#purchase_id').val(data.purchase_id);
            $('#purchasedtl_good').val(data.purchasedtl_good);
            $('#amount').val(data.purchasedtl_amount);
            $('#price').val(data.purchasedtl_priceperunit);
            $('#total').val(data.purchasedtl_total);
        }
    });
}
</script>