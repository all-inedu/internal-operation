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
                                            <a href="#" data-toggle="modal" data-target="#editPurchase"
                                                onclick="editPurchases('<?=$i;?>')" class="btn btn-warning btn-sm"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm delete-button"
                                                data-message="item"><i class="fas fa-trash"></i></a>
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

<!-- Edit Modal -->
<div class="modal fade" id="editPurchase" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form action="test.php" method="post" name="editPurchase">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Item</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Item Name</label>
                                <input id="itemName" name="itemName" type="text" class="form-control form-control-sm"
                                    placeholder="Item Name">
                                <?=form_error('itemName', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount
                                </label>
                                <input id="amount" name="amount" type="number" class="form-control form-control-sm"
                                    placeholder="0">
                                <?=form_error('amount', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price/Unit
                                </label>
                                <input id="price" name="price" type="number" class="form-control form-control-sm"
                                    placeholder="0">
                                <?=form_error('price', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Program Name</label>
                                <input id="total" name="total" type="number" class="form-control form-control-sm"
                                    placeholder="0">
                                <?=form_error('total', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i>&nbsp; Close</button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save
                        changes</button>
                </div>
            </form>
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

function editPurchases(x) {
    $('#price').keyup(function() {
        var val1 = $('#amount').val();
        var val2 = $('#price').val();
        var val3 = val1 * val2;

        $('#total').val(val3);
    })

    $.ajax({
        type: "POST",
        url: "<?= base_url('finance/purchase-request/edit_json/'); ?>" + x,
        dataType: 'json',
        success: function(response) {
            console.log(response);
            $('#itemName').val(response.item);
            $('#amount').val(response.amount);
            $('#price').val(response.price);
            $('#total').val(response.total);
        }
    });
}
</script>