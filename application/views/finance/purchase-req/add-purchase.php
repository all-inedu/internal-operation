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
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                            Division :
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
                            Request Status :
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
                            Request Date :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <input name="purchase_date" type="date" class="form-control form-control-sm">
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
                                        rows="4"></textarea>
                                    <?=form_error('purchase_notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Item List</label>
                            <button class="float-right btn btn-warning add_more_button"><i
                                    class="fas fa-plus-square"></i>&nbsp; Add Item</button>
                        </div>
                        <div class="container mt-3" id="item">
                            <div class="row p-0">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <small>Item Name</small>
                                        <input type="text" name="purchasedtl_good[]"
                                            class="form-control form-control-sm" placeholder="Name" rows="4">
                                        <?=form_error('purchasedtl_good[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <small>Amount</small>
                                        <input type="number" name="purchasedtl_amount[]"
                                            class="form-control form-control-sm" placeholder="0" rows="4" id="amount">
                                        <?=form_error('purchasedtl_amount[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <small>Price/Unit</small>
                                        <input type="text" name="purchasedtl_priceperunit[]"
                                            class="form-control form-control-sm" placeholder="Price/Unit" rows="4"
                                            id="price">
                                        <?=form_error('purchasedtl_priceperunit[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <small>Total</small>
                                        <input readonly type="text" name="purchasedtl_total[]"
                                            class="form-control form-control-sm" placeholder="Total" rows="4"
                                            id="total">
                                        <?=form_error('purchasedtl_total[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
new SlimSelect({
    select: '#division',
    placeholder: 'Select division',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#reqStatus',
    placeholder: 'Select request status',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

$('#price').keyup(function() {
    var val1 = $('#amount').val();
    var val2 = $('#price').val();
    var val3 = val1 * val2;

    $('#total').val(val3);
})

$(document).ready(function() {
    var max_fields_limit = 5; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(
        e) { //click event on add more fields button having class add_more_button
        e.preventDefault();
        if (x < max_fields_limit) { //check conditions
            x++; //counter increment
            $('#item').append(
                '<div class="row">' +
                '<div class="line" style="margin-top:15px; margin-bottom:35px; width:"50%; "></div>' +
                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Item Name</small>' +
                ' <input type="text" name="purchasedtl_good[]" class="form-control form-control-sm" placeholder="Name" rows="4">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Amount</small>' +
                '<input type="number" name="purchasedtl_amount[]" class="form-control form-control-sm" placeholder="0" rows="4" id="amount' +
                x + '">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Price/Unit</small>' +
                '<input type="text" name="purchasedtl_priceperunit[]" class="form-control form-control-sm" placeholder="Price/Unit" rows="4" id="price' +
                x + '">' +
                '</div>' +
                '</div>' +

                ' <div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Total</small>' +
                '<input readonly type="text" name="purchasedtl_total[]" class="form-control form-control-sm" placeholder="Total" rows="4" id="total' +
                x + '">' +
                '</div>' +
                '</div>' +

                '<button style="position:absolute; right:20px; margin-top:23px;" class="btn btn-sm btn-danger remove_field float-right"><i class="fas fa-times-circle"></i>&nbsp; Remove</button>' +

                '</div>'
            ); //add input field

            $('#price' + x).keyup(function() {
                var val1 = $('#amount' + x).val();
                var val2 = $('#price' + x).val();
                var val3 = val1 * val2;

                $('#total' + x).val(val3);
            })
        }
    });
    $('#item').on("click", ".remove_field", function(
        e) { //user click on remove text links
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>