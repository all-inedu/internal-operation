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
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/invoice/student/');?>"> Students
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
        <div class="card shadow mb-2 ">
            <div class="card-body text-center">
                <img src="https://image.freepik.com/free-vector/man-with-headphones-microphone-with-computer_113065-136.jpg"
                    alt="client management" width="70%">
                <h5>Stella</h5>
                <h6>Program Name</h6>
                <hr>
                <a href="<?=base_url('finance/invoice/student/view/2');?>" class="btn btn-sm btn-secondary"><i
                        class="fas fa-arrow-circle-left"></i>&nbsp; Back</a>
            </div>
        </div>

        <div class="card shadow card-sticky mb-3">
            <div class="card-body">
                <div class="form-group text-center">
                    <label>Current USD
                    </label>
                    <?php
                        $data = file_get_contents("https://kurs.web.id/api/v1/bi");
                        $json = json_decode($data, TRUE);
                        $rupiah = $json['jual'];
                    ?>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Rp.</span>
                        </div>
                        <input type="text" class="form-control" id="currentUSD" aria-describedby="basic-addon3"
                            value="<?=round($rupiah);?>">
                    </div>
                </div>
                <a href="https://www.bi.go.id/id/moneter/informasi-kurs/transaksi-bi/Default.aspx"
                    class="btn btn-sm btn-primary btn-block" target="_blank"><i class="fas fa-search"></i>&nbsp; Check
                    BI (Bank
                    Indonesia)</a>
            </div>
        </div>
    </div>
    <div class="col-md-9">

        <!-- USD  -->
        <div class="card shadow mb-2">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="usd.php" name="usd" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            No Invoice :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <input id="invoice" name="invoice" type="number"
                                        class="form-control form-control-sm" readonly>
                                    <?=form_error('invoice', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Price :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">$</span>
                                        </div>
                                        <input id="pcDollar" name="pcDollar" type="number"
                                            class="form-control form-control-sm">
                                        <?=form_error('pcDollar', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="pcRupiah" name="pcRupiah" type="number"
                                            class="form-control form-control-sm" readonly>
                                        <?=form_error('pcRupiah', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Early Bird :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">$</span>
                                        </div>
                                        <input id="ebDollar" name="ebDollar" type="number"
                                            class="form-control form-control-sm">
                                        <?=form_error('ebDollar', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="ebRupiah" name="ebRupiah" type="number"
                                            class="form-control form-control-sm" readonly>
                                        <?=form_error('ebRupiah', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Discount :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">$</span>
                                        </div>
                                        <input id="dsDollar" name="dsDollar" type="number"
                                            class="form-control form-control-sm">
                                        <?=form_error('dsDollar', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="dsRupiah" name="dsRupiah" type="number"
                                            class="form-control form-control-sm" readonly>
                                        <?=form_error('dsRupiah', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <b>Total Price : </b>
                        </div>
                        <div class="col-md-9 mb-2">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">$</span>
                                        </div>
                                        <input id="tpDollar" name="tpDollar" type="number"
                                            class="form-control form-control-sm" readonly>
                                        <?=form_error('tpDollar', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="tpRupiah" name="tpRupiah" type="number"
                                            class="form-control form-control-sm" readonly>
                                        <?=form_error('tpRupiah', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <textarea id="tpWords1" name="tpWords" class="form-control form-control-sm"
                                        rows="1"></textarea>
                                    <?=form_error('tpWords', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Payment Method :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <select id="paymentMethod" name="paymentMethod" onChange="paymentMethods();">
                                        <option data-placeholder="true"></option>
                                        <option value="Full Payment">Full Payment</option>
                                        <option value="Installment">Installment</option>
                                    </select>
                                    <?=form_error('paymentMethod', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Date :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <small>Invoice Date</small>
                                    <input name="date" type="date" class="form-control form-control-sm">
                                    <?=form_error('date', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-3">
                                    <small>Due Date</small>
                                    <input id="dueDate" name="dueDate" type="date" class="form-control form-control-sm">
                                    <?=form_error('dueDate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Notes :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="notes" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Terms & Condition :
                        </div>
                        <div class="col-md-9 mb-2">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="tnc" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('tnc', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-9 text-right">
                            <button type="submit" class="btn btn-sm btn-info">Save changes</button>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <small>For Installment :</small>
                            <div class="float-right">
                                <a href="#" class="btn btn-sm btn-secondary" id="steps" data-toggle="modal"
                                    data-target="#addInstallment"><i class="fas fa-plus"></i>&nbsp; Add
                                    Installment</a>
                            </div>
                        </div>
                        <?php if($paymentMethod=='Installment'){ ?>
                        <div class="col-md-12 mt-3">
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Due Date</th>
                                    <th>Percent</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                                <?php for($i=1;$i<=4;$i++){ ?>
                                <tr>
                                    <td>Instalment <?=$i;?></td>
                                    <td>14 February 2020</td>
                                    <td>25%</td>
                                    <td>$400 (Rp. 9.000.000,-)</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editInstallment" onclick="editInstalments()"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger delete-button"
                                            data-message="installment"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="5">Full Payment Method</td>
                                </tr>
                            </table>
                        </div>
                        <?php }?>
                    </div>
                </form>
            </div>
        </div>

        <!-- Add Modal USD -->
        <div class="modal fade" id="addInstallment" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="addInstalment.php" name="addInstallment" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Installment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>Installment Name</label>
                                    <input type="text" name="statusName" class="form-control form-control-sm"
                                        placeholder="Installment 1" readonly>
                                    <?=form_error('statusName', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Due Date</label>
                                    <input type="date" name="dueDate" class="form-control form-control-sm">
                                    <?=form_error('dueDate', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Percent</label>
                                    <input id="percent" type="number" name="percent"
                                        class="form-control form-control-sm" max="100">
                                    <?=form_error('percent', '<small class="text-danger">', '</small>');?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Amount ($)</label>
                                    <input id="amountDollar" type="number" name="amountDollar"
                                        class="form-control form-control-sm">
                                    <?=form_error('amountDollar', '<small class="text-danger">', '</small>');?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Amount (Rp)</label>
                                    <input id="amountRupiah" type="number" name="amountRupiah"
                                        class="form-control form-control-sm">
                                    <?=form_error('amountRupiah', '<small class="text-danger">', '</small>');?>
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

        <!-- Edit Modal USD -->
        <div class="modal fade" id="editInstallment" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="addInstalment.php" name="addInstallment" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Installment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>Installment Name</label>
                                    <input type="text" name="statusName" class="form-control form-control-sm"
                                        placeholder="Installment 1" readonly>
                                    <?=form_error('statusName', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Due Date</label>
                                    <input type="date" name="dueDate" class="form-control form-control-sm">
                                    <?=form_error('dueDate', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Percent</label>
                                    <input id="percent1" type="number" name="percent"
                                        class="form-control form-control-sm" max="100">
                                    <?=form_error('percent', '<small class="text-danger">', '</small>');?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Amount ($)</label>
                                    <input id="amountDollar1" type="number" name="amountDollar"
                                        class="form-control form-control-sm">
                                    <?=form_error('amountDollar', '<small class="text-danger">', '</small>');?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Amount (Rp)</label>
                                    <input id="amountRupiah1" type="number" name="amountRupiah"
                                        class="form-control form-control-sm">
                                    <?=form_error('amountRupiah', '<small class="text-danger">', '</small>');?>
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

        <!-- IDR  -->
        <div class="card shadow mb-2">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="idr.php" method="post" name="idr">
                    <div class="row">
                        <div class="col-md-3">
                            No Invoice :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <input id="invoice" name="invoice" type="number"
                                        class="form-control form-control-sm" readonly>
                                    <?=form_error('invoice', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Price :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="pcRupiah1" name="pcRupiah" type="number"
                                            class="form-control form-control-sm">
                                        <?=form_error('pcRupiah', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Discount :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="dsRupiah1" name="dsRupiah" type="number"
                                            class="form-control form-control-sm">
                                        <?=form_error('dsRupiah', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <b>Total Price : </b>
                        </div>
                        <div class="col-md-9 mb-3">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="tpRupiah1" name="tpRupiah" type="number"
                                            class="form-control form-control-sm" readonly>
                                        <?=form_error('tpRupiah', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                            <textarea id="tpWords2" name="tpWords" class="form-control form-control-sm"
                                rows="1"></textarea>
                            <?=form_error('tpWords', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="col-md-3">
                            Date :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <small>Invoice Date</small>
                                    <input name="date" type="date" class="form-control form-control-sm">
                                    <?=form_error('date', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-3">
                                    <small>Due Date</small>
                                    <input name="dueDate" type="date" class="form-control form-control-sm">
                                    <?=form_error('dueDate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Notes :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="notes" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Terms & Condition :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="tnc" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('tnc', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-9 text-right">
                            <button type="submit" class="btn btn-sm btn-info">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Session -->
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-3">
                        No Invoice :
                    </div>
                    <div class="col-md-9">
                        <div class="form-group row">
                            <div class="col-md-5">
                                <input id="invoice" name="invoice" type="number" class="form-control form-control-sm"
                                    readonly>
                                <?=form_error('invoice', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        Price/Hours :
                    </div>
                    <div class="col-md-9">
                        <div class="form-group row">
                            <div class="col-md-5">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input id="priceHours" name="priceHours" type="number"
                                        class="form-control form-control-sm">
                                    <?=form_error('priceHours', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        Session :
                    </div>
                    <div class="col-md-9">
                        <div class="form-group row">
                            <div class="col-md-2">
                                <div class="input-group input-group-sm">
                                    <input id="amount" name="session" type="number"
                                        class="form-control form-control-sm">
                                    <?=form_error('session', '<small class="text-danger">', '</small>');?>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-times"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        Duration/Session :
                    </div>
                    <div class="col-md-9">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <div class="input-group input-group-sm">
                                    <input id="duration" name="duration" type="number"
                                        class="form-control form-control-sm">
                                    <?=form_error('duration', '<small class="text-danger">', '</small>');?>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Minutes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        Discount :
                    </div>
                    <div class="col-md-9">
                        <div class="form-group row">
                            <div class="col-md-5">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input id="discount" name="discount" type="number"
                                        class="form-control form-control-sm">
                                    <?=form_error('discount', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <b>Total Price : </b>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group row">
                            <div class="col-md-5 mb-3">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input id="totalPrice" name="totalPrice" type="number"
                                        class="form-control form-control-sm" readonly>
                                    <?=form_error('totalPrice', '<small class="text-danger">', '</small>');?>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <textarea id="tpWords3" name="tpWords" class="form-control form-control-sm"
                                    rows="1"></textarea>
                                <?=form_error('tpWords', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        Date :
                    </div>
                    <div class="col-md-9">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <input name="date" type="date" class="form-control form-control-sm">
                                <?=form_error('date', '<small class="text-danger">', '</small>');?>
                            </div>

                            <div class="col-md-3">
                                <input name="dueDate" type="date" class="form-control form-control-sm">
                                <?=form_error('dueDate', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        Notes :
                    </div>
                    <div class="col-md-9">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="notes" class="form-control form-control-sm" rows="6"></textarea>
                                <?=form_error('notes', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        Terms & Condition :
                    </div>
                    <div class="col-md-9">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="tnc" class="form-control form-control-sm" rows="6"></textarea>
                                <?=form_error('tnc', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script src="<?=base_url('assets/js/generate-number.js');?>"></script>
<script>
$('#usd').show();
$('#steps').hide();
$('#idr').hide();
$('#session').hide();

function cFunction() {
    let cat = $('#category').val();
    if (cat == "usd") {
        $('#usd').show();
        $('#idr').hide();
        $('#session').hide();
    } else if (cat == "idr") {
        $('#idr').show();
        $('#usd').hide();
        $('#session').hide();
    } else if (cat == "session") {
        $('#session').show();
        $('#usd').hide();
        $('#idr').hide();
    }
}

new SlimSelect({
    select: '#paymentMethod',
    placeholder: 'Select payment method ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});


$('#currentUSD').keyup(function() {
    let USD = $('#currentUSD').val();
    let pc = $('#pcDollar').val();
    let eb = $('#ebDollar').val();
    let ds = $('#dsDollar').val();
    let tp = $('#tpDollar').val();
    let pcTot = USD * pc;
    let tpRupiah = USD * tpDollar;
    let ebTot = USD * eb;
    let dsTot = USD * ds;
    let tpTot = USD * tp;


    $('#pcRupiah').val(pcTot);
    $('#ebRupiah').val(ebTot);
    $('#dsRupiah').val(dsTot);
    $('#tpRupiah').val(tpTot);

    $('#tpWords1').text(capitalize(tpTot));

});

$('#pcDollar').keyup(function() {
    let USD = $('#currentUSD').val();
    let eb = $('#ebDollar').val();
    let ds = $('#dsDollar').val();
    let pc = $('#pcDollar').val();
    let pcTot = USD * pc;
    let tpDollar = pc - ds - eb;
    let tpRupiah = USD * tpDollar;

    $('#pcRupiah').val(pcTot);
    $('#tpDollar').val(tpDollar);
    $('#tpRupiah').val(tpRupiah);

    $('#tpWords1').text(capitalize(tpRupiah));
});

$('#ebDollar').keyup(function() {
    let USD = $('#currentUSD').val();
    let eb = $('#ebDollar').val();
    let ds = $('#dsDollar').val();
    let pc = $('#pcDollar').val();
    let ebTot = USD * eb;
    $('#ebRupiah').val(ebTot);

    let tpDollar = pc - ds - eb;
    let tpRupiah = USD * tpDollar;

    $('#tpDollar').val(tpDollar);
    $('#tpRupiah').val(tpRupiah);

    $('#tpWords1').text(capitalize(tpRupiah));
});

$('#dsDollar').keyup(function() {
    let USD = $('#currentUSD').val();
    let ds = $('#dsDollar').val();
    let eb = $('#ebDollar').val();
    let pc = $('#pcDollar').val();
    let dsTot = USD * ds;
    $('#dsRupiah').val(dsTot);

    let tpDollar = pc - ds - eb;
    let tpRupiah = USD * tpDollar;

    $('#tpDollar').val(tpDollar);
    $('#tpRupiah').val(tpRupiah);

    $('#tpWords1').text(capitalize(tpRupiah));
});

function paymentMethods() {
    let pm = $('#paymentMethod').val();
    if (pm == "Full Payment") {
        $('#steps').hide();
        $('#dueDate').prop("disabled", false);;
    } else {
        $('#steps').show();
        $('#dueDate').prop("disabled", true);;
    }
}

$('#percent').keyup(function() {
    let USD = $('#currentUSD').val();
    let tpDollar = $('#tpDollar').val();
    let tpRupiah = $('#tpRupiah').val();
    let percent = $('#percent').val();
    let amountDollar = (percent / 100) * tpDollar;
    let amountRupiah = amountDollar * USD;
    $('#amountDollar').val(amountDollar);
    $('#amountRupiah').val(Math.round(amountRupiah));
});

$('#amountDollar').keyup(function() {
    let USD = $('#currentUSD').val();
    let tpDollar = parseInt($('#tpDollar').val());
    let tpRupiah = $('#tpRupiah').val();
    let amountDollar = $('#amountDollar').val();

    if ($(this).val() > tpDollar) {
        $(this).val(tpDollar);
    }

    let percent = (amountDollar / tpDollar) * 100;
    let amountRupiah = amountDollar * USD;
    $('#percent').val(percent.toFixed(1));
    $('#amountRupiah').val(Math
        .round(amountRupiah));
});

$('#percent1').keyup(function() {
    let USD = $('#currentUSD').val();
    let tpDollar = $('#tpDollar').val();
    let tpRupiah = $('#tpRupiah').val();
    let percent1 = $('#percent1').val();
    let amountDollar1 = (percent1 / 100) * tpDollar;
    let amountRupiah1 = amountDollar1 * USD;
    $('#amountDollar1').val(amountDollar1);
    $('#amountRupiah1').val(Math.round(amountRupiah1));
});

$('#amountDollar1').keyup(function() {
    let USD = $('#currentUSD').val();
    let tpDollar = parseInt($('#tpDollar').val());
    let tpRupiah = $('#tpRupiah').val();
    let amountDollar1 = $('#amountDollar1').val();

    if ($(this).val() > tpDollar) {
        $(this).val(tpDollar);
    }

    let percent1 = (amountDollar1 / tpDollar) * 100;
    let amountRupiah1 = amountDollar1 * USD;
    $('#percent1').val(percent1.toFixed(1));
    $('#amountRupiah1').val(Math
        .round(amountRupiah1));
});


$('#pcRupiah1').keyup(function() {
    let pcRupiah = $('#pcRupiah1').val();
    let dsRupiah = $('#dsRupiah1').val();
    let tpRupiah = pcRupiah - dsRupiah;
    $('#tpRupiah1').val(tpRupiah);
    $('#tpWords2').text(capitalize(tpRupiah));
});

$('#dsRupiah1').keyup(function() {
    let pcRupiah = $('#pcRupiah1').val();
    let dsRupiah = $('#dsRupiah1').val();
    let tpRupiah = pcRupiah - dsRupiah;
    $('#tpRupiah1').val(tpRupiah);
    $('#tpWords2').text(capitalize(tpRupiah));
});

$('#duration').keyup(function() {
    let ph = $('#priceHours').val();
    let ss = $('#amount').val();
    let dr = $('#duration').val();
    let ds = $('#discount').val();

    let tpRupiah = (ph * ss) * (dr / 60) - ds;
    $('#totalPrice').val(tpRupiah);
    $('#tpWords3').text(capitalize(tpRupiah));
});

$('#discount').keyup(function() {
    let ph = $('#priceHours').val();
    let ss = $('#amount').val();
    let dr = $('#duration').val();
    let ds = $('#discount').val();

    let tpRupiah = (ph * ss) * (dr / 60) - ds;
    $('#totalPrice').val(tpRupiah);
    $('#tpWords3').text(capitalize(tpRupiah));
});
</script>