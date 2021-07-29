<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Edit Invoice
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/invoice/school/');?>"> Schools
                            Program</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Invoice</li>
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
                <a href="<?=base_url('finance/invoice/school/view/'.$schprog['schprog_id']);?>"
                    class="btn btn-sm btn-secondary"><i class="fas fa-arrow-circle-left"></i>&nbsp; Back</a>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow mb-3">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; Edit Invoice </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="" method="post">
                    <input type="hidden" name="invsch_id" value="<?=$schprog['invsch_id'];?>">
                    <div class="row">
                        <div class="col-md-2">
                            Price : <i class="text-danger font-weight-bold">*</i>
                        </div>
                        <div class="col-md-10">
                            <input type="hidden" name="schprog_id" value="<?=$schprog['schprog_id'];?>">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="price" name="invsch_price" type="number"
                                            class="form-control form-control-sm" value="<?=$schprog['invsch_price'];?>">
                                    </div>
                                    <?=form_error('invsch_price', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            Participans : <i class="text-danger font-weight-bold">*</i>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-sm">
                                        <input id="participans" name="invsch_participants" type="number"
                                            class="form-control form-control-sm"
                                            value="<?=$schprog['invsch_participants'];?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Students</span>
                                        </div>
                                    </div>
                                    <?=form_error('invsch_participants', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            Discount :
                        </div>
                        <div class="col-md-10">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="discount" name="invsch_disc" type="number"
                                            class="form-control form-control-sm" value="<?=$schprog['invsch_disc'];?>">
                                    </div>
                                    <?=form_error('invsch_disc', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            Total Price :
                        </div>
                        <div class="col-md-10">
                            <div class="form-group row">
                                <div class="col-md-5 mb-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="tPrice" name="invsch_totprice" type="number"
                                            class="form-control form-control-sm"
                                            value="<?=$schprog['invsch_totprice'];?>">
                                    </div>
                                    <?=form_error('invsch_totprice', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" id="tpWords" name="invsch_words"
                                        class="form-control form-control-sm" value="<?=$schprog['invsch_words'];?>">
                                    <?=form_error('invsch_words', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            Date : <i class="text-danger font-weight-bold">*</i>
                        </div>
                        <div class="col-md-10 mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <small>Invoice Date </small><br>
                                    <input name="invsch_date" type="date" class="form-control form-control-sm"
                                        value="<?=$schprog['invsch_date'];?>">
                                    <?=form_error('invsch_date', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-3">
                                    <small>Due Date </small><br>
                                    <input id="dueDate" name="invsch_duedate" type="date"
                                        class="form-control form-control-sm" value="<?=$schprog['invsch_duedate'];?>">
                                    <?=form_error('invsch_duedate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            Payment Method :
                        </div>
                        <div class="col-md-10 mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <select id="paymentMethod" name="invsch_pm" onChange="paymentMethods();">
                                        <option data-placeholder="true"></option>
                                        <option value="Full Payment">Full Payment</option>
                                        <option value="Installment">Installment</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 mb-3">
                            Notes :
                        </div>
                        <div class="col-md-10 mb-3">
                            <textarea name="invsch_notes" class="form-control form-control-sm"
                                rows="6"><?=$schprog['invsch_notes'];?></textarea>
                            <?=form_error('invsch_notes', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-2 mb-3">
                            Terms & Condition :
                        </div>
                        <div class="col-md-10 mb-3">
                            <textarea name="invsch_tnc" class="form-control form-control-sm"
                                rows="6"><?=$schprog['invsch_tnc'];?></textarea>
                            <?=form_error('invsch_tnc', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-10 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                        </div>

                        <?php if($schprog['invsch_pm']=='Installment'){ ?>
                        <div class="container-fluid" id="steps">
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <div class="float-right">
                                        <a href="#" class="btn btn-sm btn-secondary" data-toggle="modal"
                                            data-target="#addInstallment"><i class="fas fa-plus"></i>&nbsp; Add
                                            Installment</a>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
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
                                                <a href="#" class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#editInstallment"
                                                    onclick="editInstalments(<?=$id['invdtl_id'];?>)"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="<?=base_url('finance/invoice/school/delete-detail/'.$id['invdtl_id'].'/'.$schprog['schprog_id']);?>"
                                                    class="btn btn-sm btn-danger delete-button"
                                                    data-message="installment"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addInstallment" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?=base_url('finance/invoice/school/save-detail');?>" name="addInstallment" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Installment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Installment Name</label>
                            <input type="hidden" name="id" value="<?=$schprog['schprog_id'];?>">
                            <input type="hidden" name="inv_id" value="<?=$schprog['invsch_id'];?>">
                            <input type="hidden" name="inv_num" value="<?=$schprog['invsch_num'];?>">
                            <input type="text" name="invdtl_statusname" class="form-control form-control-sm"
                                placeholder="Installment 1">
                            <?=form_error('invdtl_statusname', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Due Date</label>
                            <input type="date" name="invdtl_duedate" class="form-control form-control-sm">
                            <?=form_error('invdtl_duedate', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Percent</label>
                            <input id="percent" type="text" name="invdtl_percentage"
                                class="form-control form-control-sm" max="100">
                            <?=form_error('invdtl_percentage', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Amount (Rp)</label>
                            <input id="amount" type="number" name="invdtl_amountidr"
                                class="form-control form-control-sm">
                            <?=form_error('invdtl_amountidr', '<small class="text-danger">', '</small>');?>
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

<div class="modal fade" id="editInstallment" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?=base_url('finance/invoice/school/update-detail');?>" name="updateInstallment"
                method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Installment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Installment Name</label>
                            <input type="hidden" name="inv_num" value="<?=$schprog['invsch_num'];?>">
                            <input type="hidden" name="id" value="<?=$schprog['schprog_id'];?>">
                            <input type="hidden" id="invdtl_id" name="invdtl_id">
                            <input type="text" id="invdtl_statusname" name="invdtl_statusname"
                                class="form-control form-control-sm">
                            <?=form_error('invdtl_statusname', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Due Date</label>
                            <input type="date" id="invdtl_duedate" name="invdtl_duedate"
                                class="form-control form-control-sm">
                            <?=form_error('invdtl_duedate', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Percent</label>
                            <input id="percentIDR2" type="text" name="invdtl_percentage"
                                class="form-control form-control-sm" max="100">
                            <?=form_error('invdtl_percentage', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Amount (Rp)</label>
                            <input id="amountIDR2" type="number" name="invdtl_amountidr"
                                class="form-control form-control-sm">
                            <?=form_error('invdtl_amountidr', '<small class="text-danger">', '</small>');?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script src="<?=base_url('assets/js/generate-number.js');?>"></script>
<script>
let PM = new SlimSelect({
    select: '#paymentMethod',
    placeholder: 'Select payment method ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

PM.set("<?=$schprog['invsch_pm'];?>");

function paymentMethods() {
    let pm = $('#paymentMethod').val();
    console.log(pm);
    if (pm == "Full Payment") {
        $('#steps').hide();
        $('#dueDate').prop("disabled", false);;
    } else {
        $('#steps').show();
        $('#dueDate').prop("disabled", false);;
    }
}

$('#price').keyup(function() {
    let pc = $('#price').val();
    let pr = $('#participans').val();
    let ds = $('#discount').val();
    let tp = (pc * pr) - ds;

    $('#tPrice').val(tp);
    $('#tpWords').val(capitalize(tp));
});

$('#participans').keyup(function() {
    let pc = $('#price').val();
    let pr = $('#participans').val();
    let ds = $('#discount').val();
    let tp = (pc * pr) - ds;

    $('#tPrice').val(tp);
    $('#tpWords').val(capitalize(tp));
});

$('#discount').keyup(function() {
    let pc = $('#price').val();
    let pr = $('#participans').val();
    let ds = $('#discount').val();
    let tp = (pc * pr) - ds;

    $('#tPrice').val(tp);
    $('#tpWords').val(capitalize(tp));
});

$('#tPrice').keyup(function() {
    let tp = $('#tPrice').val();
    $('#tpWords').val(capitalize(tp));
});

$('#percent').keyup(function() {
    let tpRupiah = $('#tPrice').val();
    let percent = $('#percent').val();
    let amount = (percent / 100) * tpRupiah;
    $('#amount').val(amount);
});

function editInstalments(x) {
    $.ajax({
        type: 'post',
        url: '<?=base_url("finance/invoice/school/view-detail/");?>' + x,
        dataType: 'json',
        success: function(data) {
            $('#invdtl_id').val(data.invdtl_id);
            $('#invdtl_statusname').val(data.invdtl_statusname);
            $('#invdtl_duedate').val(data.invdtl_duedate);
            $('#percent1').val(data.invdtl_percentage);
            $('#amountDollar1').val(data.invdtl_amountusd);
            $('#amountRupiah1').val(data.invdtl_amountidr);
            $('#percentIDR2').val(data.invdtl_percentage);
            $('#amountIDR2').val(data.invdtl_amountidr);
        }
    });
}

$('#percentIDR2').keyup(function() {
    let tpRupiah = $('#tPrice').val();
    let percent = $('#percentIDR2').val();
    let amount = (percent / 100) * tpRupiah;
    $('#amountIDR2').val(amount);
});
</script>