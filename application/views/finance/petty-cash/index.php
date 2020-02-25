<style>
.income {
    width: 100%;
    height: 260px;
    overflow-y: scroll;
}

.expense {
    width: 100%;
    height: 432px;
    overflow-y: scroll;
    overflow-x: hidden;
    padding: 10px;
}
</style>
<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Petty Cash
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Petty Cash</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-5">
        <div class="card mb-3 shadow">
            <div class="row no-gutters">
                <div class="col-md-4 text-center align-middle p-4">
                    <img src="https://image.flaticon.com/icons/png/512/1192/premium/1192896.png" alt="prospective"
                        width="70%">
                </div>
                <div class="col-md-8 bg-info text-white shadow align-middle">
                    <div class="card-body">
                        <div class="float-left mt-2">
                            <?= date('d/m/Y');?>
                        </div>
                        <h3 class="text-right mb-0">Saldo</h3>
                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                        <div class="float-left" style="margin-top:-10px;">
                            <a href="<?=base_url('finance/petty-cash/export');?>" class="btn btn-sm btn-danger mt-2"><i
                                    class="fas fa-file-excel"></i>&nbsp;
                                Export/Month</a>
                        </div>
                        <h5 class="card-title text-right mb-0">Rp. 800.000,-</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
        <div class="float-left">
            <h5>Income</h5>
        </div>
        <div class="text-right mb-2">
            <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#addIncome"><i></i> <i
                    class="fas fa-plus"></i>&nbsp; Add</a>
        </div>
        <div class="income shadow">
            <div class="card">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="2%">No</th>
                            <th class="text-center bg-primary text-white">Date
                            </th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($income as $in): ?>
                        <tr>
                            <td class="text-center"><?=$i;?></td>
                            <td class="text-center" style="cursor:pointer" data-toggle="modal"
                                data-target="#viewIncomes" onclick="viewIncome('<?=$in['pettyinflow_id'];?>')">
                                <?=date('d M Y',strtotime($in['pettyinflow_date']));?></td>
                            <td class="text-center">Rp. <?=number_format($in['pettyinflow_total']);?></td>
                        </tr>
                        <?php $i++; endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="float-left">
            <h5>Expense</h5>
        </div>
        <div class="text-right mb-2">
            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addExpense"><i></i> <i
                    class="fas fa-plus"></i>&nbsp; Add</a>
        </div>
        <div class="expense shadow">
            <div class="">
                <table class="table table-bordered" id="expense">
                    <thead>
                        <tr>
                            <th class="text-center" width="2%">No</th>
                            <th class="text-center bg-primary text-white">Date</th>
                            <th class="text-center">Invoice</th>
                            <th class="text-center">Supplier</th>
                            <th class="text-center">Goods/Service</th>
                            <th class="text-center">From</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($expense as $ex): ?>
                        <tr>
                            <td class="text-center"><?=$i;?></td>
                            <td class="text-center" style="cursor:pointer" data-toggle="modal"
                                data-target="#viewExpenses" onclick="viewExpense('<?=$ex['pettyexpenses_id'];?>')">
                                <?=date('d M Y', strtotime($ex['pettyexpenses_date']));?>
                            </td>
                            <td class="text-left"><?=$ex['pettyexpenses_inv'];?></td>
                            <td class="text-left"><?=$ex['pettyexpenses_supplier'];?></td>
                            <td class="text-left"><?=$ex['pettyexpenses_type'];?></td>
                            <td class="text-left"><?=$ex['pettyexpenses_paymentfrom'];?></td>
                            <td class="text-center">Rp. <?=number_format($ex['pettyexpenses_total']);?></td>
                        </tr>
                        <?php $i++; endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Income -->
<div class="modal fade" id="addIncome" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form action="addIncome" name="income" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Income</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <input name="pettyinflow_date" type="date" class="form-control form-control-sm">
                                <?=form_error('pettyinflow_date', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount</label>
                                <input name="pettyinflow_total" type="number" class="form-control form-control-sm"
                                    placeholder="0">
                                <?=form_error('pettyinflow_total', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <small class="text-info">* Please double check, if you want to save this income.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="viewIncomes" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form action="updateIncome" name="updateIncome" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Income</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <input id="pettyinflow_id" name="pettyinflow_id" type="hidden"
                                    class="form-control form-control-sm">
                                <input id="pettyinflow_date" name="pettyinflow_date" type="date"
                                    class="form-control form-control-sm">
                                <?=form_error('pettyinflow_date', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount</label>
                                <input id="pettyinflow_total" name="pettyinflow_total" type="number"
                                    class="form-control form-control-sm" placeholder="0">
                                <?=form_error('pettyinflow_total', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <small class="text-info">* Please double check, if you want to edit or delete this
                                income.</small>
                        </div>
                        <div class="col-md-12 mt-1">
                            <hr>
                            <div class="float-left">
                                <a href="" class="btn btn-danger float-left btn-sm delete-button" data-message="income"
                                    id="deleteIncome"><i class="fas fa-trash"></i>&nbsp;
                                    Delete</a>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;
                                    Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Expense -->
<div class="modal fade" id="addExpense" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form action="addExpense" name="addExpense" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Expense</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <input name="pettyexpenses_date" type="date" class="form-control form-control-sm">
                                <?=form_error('pettyexpenses_date', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Invoice</label>
                                <input name="pettyexpenses_inv" type="text" class="form-control form-control-sm">
                                <?=form_error('pettyexpenses_inv', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Supplier</label>
                                <input name="pettyexpenses_supplier" type="text" class="form-control form-control-sm">
                                <?=form_error('pettyexpenses_supplier', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Goods/Service</label>
                                <input name="pettyexpenses_type" type="text" class="form-control form-control-sm">
                                <?=form_error('pettyexpenses_type', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>From</label>
                                <input name="pettyexpenses_paymentfrom" type="text"
                                    class="form-control form-control-sm">
                                <?=form_error('pettyexpenses_paymentfrom', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total</label>
                                <input name="pettyexpenses_total" type="number" class="form-control form-control-sm"
                                    placeholder="0">
                                <?=form_error('pettyexpenses_total', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <small class="text-info">* Please double check, if you want to save this expense.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="viewExpenses" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form action="updateExpense" name="updateExpense" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Expense</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <input id="pettyexpenses_id" name="pettyexpenses_id" type="hidden">
                                <input id="pettyexpenses_date" name="pettyexpenses_date" type="date"
                                    class="form-control form-control-sm">
                                <?=form_error('pettyexpenses_date', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Invoice</label>
                                <input id="pettyexpenses_inv" name="pettyexpenses_inv" type="text"
                                    class="form-control form-control-sm">
                                <?=form_error('pettyexpenses_inv', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Supplier</label>
                                <input id="pettyexpenses_supplier" name="pettyexpenses_supplier" type="text"
                                    class="form-control form-control-sm">
                                <?=form_error('pettyexpenses_supplier', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Goods/Service</label>
                                <input id="pettyexpenses_type" name="pettyexpenses_type" type="text"
                                    class="form-control form-control-sm">
                                <?=form_error('pettyexpenses_type', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>From</label>
                                <input id="pettyexpenses_paymentfrom" name="pettyexpenses_paymentfrom" type="text"
                                    class="form-control form-control-sm">
                                <?=form_error('pettyexpenses_paymentfrom', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total</label>
                                <input id="pettyexpenses_total" name="pettyexpenses_total" type="number"
                                    class="form-control form-control-sm" placeholder="0">
                                <?=form_error('pettyexpenses_total', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <small class="text-info">* Please double check, if you want to save this expense.</small>
                        </div>
                        <div class="col-md-12 mt-1">
                            <hr>
                            <div class="float-left">
                                <a href="#" class="btn btn-danger float-left btn-sm delete-button"
                                    data-message="expense" id="deleteExpense"><i class="fas fa-trash"></i>&nbsp;
                                    Delete</a>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;
                                    Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
$(document).ready(function() {
    $('#expense').DataTable();
});

function viewIncome(x) {
    $.ajax({
        type: 'post',
        url: '<?=base_url("finance/petty-cash/view-income/");?>' + x,
        dataType: 'json',
        success: function(data) {
            $('#pettyinflow_id').val(data.pettyinflow_id);
            $('#pettyinflow_date').val(data.pettyinflow_date);
            $('#pettyinflow_total').val(data.pettyinflow_total);
            $('#deleteIncome').attr('href', 'deleteIncome/' + data.pettyinflow_id)
        }
    });
}

function viewExpense(x) {
    $.ajax({
        type: 'post',
        url: '<?=base_url("finance/petty-cash/view-expense/");?>' + x,
        dataType: 'json',
        success: function(data) {
            $('#pettyexpenses_id').val(data.pettyexpenses_id);
            $('#pettyexpenses_date').val(data.pettyexpenses_date);
            $('#pettyexpenses_inv').val(data.pettyexpenses_inv);
            $('#pettyexpenses_supplier').val(data.pettyexpenses_supplier);
            $('#pettyexpenses_type').val(data.pettyexpenses_type);
            $('#pettyexpenses_paymentfrom').val(data.pettyexpenses_paymentfrom);
            $('#pettyexpenses_total').val(data.pettyexpenses_total);
            $('#deleteExpense').attr('href', 'deleteExpense/' + data.pettyexpenses_id)
        }
    });
}
</script>