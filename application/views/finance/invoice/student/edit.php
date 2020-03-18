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
                <h5><?=$inv['st_firstname'].' '.$inv['st_lastname'];?></h5>
                <h6 class="text-info"><?=$inv['prog_program'];?></h6>
                <hr>
                <a href="<?=base_url('finance/invoice/student/view/'.$inv['stprog_id']);?>"
                    class="btn btn-sm btn-secondary"><i class="fas fa-arrow-circle-left"></i>&nbsp; Back</a>
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
    <div class="col-md-9 mb-3">

        <?php if($inv['inv_category']=="usd") { ?>
        <!-- USD  -->
        <div class="card shadow mb-2">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="<?=base_url('finance/invoice/student/update');?>" name="usd" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            No Invoice :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <input name="inv_num" type="hidden" value="<?=$inv['inv_num'];?>">
                                    <input id="invoice" name="inv_id" type="text" class="form-control form-control-sm"
                                        value="<?=$inv['inv_id'];?>" readonly>
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
                                        <input id="pcDollar" name="inv_priceusd" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_priceusd'];?>">
                                        <?=form_error('inv_priceusd', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="pcRupiah" name="inv_priceidr" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_priceidr'];?>"
                                            readonly>
                                        <?=form_error('inv_priceidr', '<small class="text-danger">', '</small>');?>
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
                                        <input id="ebDollar" name="inv_earlybirdusd" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_earlybirdusd'];?>">
                                        <?=form_error('inv_earlybirdusd', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="ebRupiah" name="inv_earlybirdidr" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_earlybirdidr'];?>"
                                            readonly>
                                        <?=form_error('inv_earlybirdidr', '<small class="text-danger">', '</small>');?>
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
                                        <input id="dsDollar" name="inv_discusd" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_discusd'];?>">
                                        <?=form_error('inv_discusd', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="dsRupiah" name="inv_discidr" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_discidr'];?>"
                                            readonly>
                                        <?=form_error('inv_discidr', '<small class="text-danger">', '</small>');?>
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
                                        <input id="tpDollar" name="inv_totprusd" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_totprusd'];?>"
                                            readonly>
                                        <?=form_error('inv_totprusd', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="tpRupiah" name="inv_totpridr" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_totpridr'];?>"
                                            readonly>
                                        <?=form_error('inv_totpridr', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input id="tpWords1" name="inv_words" class="form-control form-control-sm"
                                        value="<?=$inv['inv_words'];?>">
                                    <?=form_error('inv_words', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Payment Method :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <select id="paymentMethod" name="inv_paymentmethod" onChange="paymentMethods();">
                                        <option data-placeholder="true"></option>
                                        <option value="Full Payment">Full Payment</option>
                                        <option value="Installment">Installment</option>
                                    </select>
                                    <?=form_error('inv_paymentmethod', '<small class="text-danger">', '</small>');?>
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
                                    <input name="inv_date" type="date" class="form-control form-control-sm"
                                        value="<?=$inv['inv_date'];?>">
                                    <?=form_error('inv_date', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-3">
                                    <small>Due Date</small>
                                    <input id="dueDate" name="inv_duedate" type="date"
                                        class="form-control form-control-sm" value="<?=$inv['inv_duedate'];?>">
                                    <?=form_error('inv_duedate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Notes :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="inv_notes" class="form-control form-control-sm"
                                        rows="6"><?=$inv['inv_notes'];?></textarea>
                                    <?=form_error('inv_notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Terms & Condition :
                        </div>
                        <div class="col-md-9 mb-2">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="inv_tnc" class="form-control form-control-sm"
                                        rows="6"><?=$inv['inv_tnc'];?></textarea>
                                    <?=form_error('inv_tnc', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-9 text-right">
                            <button type="submit" class="btn btn-sm btn-info">Save changes</button>
                        </div>

                        <div class="col-md-12" id="steps">
                            <hr>
                            <div class="float-right">
                                <a href="#" class="btn btn-sm btn-secondary" data-toggle="modal"
                                    data-target="#addInstallment"><i class="fas fa-plus"></i>&nbsp; Add
                                    Installment</a>
                            </div>
                        </div>
                        <?php if($inv['inv_paymentmethod']=='Installment'){ ?>
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
                                        $<?=number_format($id['invdtl_amountusd']);?>
                                        ( Rp. <?=number_format($id['invdtl_amountidr']);?> )
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editInstallment"
                                            onclick="editInstalments(<?=$id['invdtl_id'];?>)"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="<?=base_url('finance/invoice/student/delete-detail/'.$id['invdtl_id'].'/'.$inv['inv_num']);?>"
                                            class="btn btn-sm btn-danger delete-button" data-message="installment"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <?php }?>
                    </div>
                </form>
            </div>
        </div>

        <!-- Add Modal USD -->
        <div class="modal fade" id="addInstallment" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="<?=base_url('finance/invoice/student/save-detail');?>" name="addInstallment"
                        method="post">
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
                                    <input type="hidden" name="inv_id" value="<?=$inv['inv_id'];?>">
                                    <input type="hidden" name="inv_num" value="<?=$inv['inv_num'];?>">
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
                                    <input id="percent" type="number" name="invdtl_percentage"
                                        class="form-control form-control-sm" max="100">
                                    <?=form_error('invdtl_percentage', '<small class="text-danger">', '</small>');?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Amount ($)</label>
                                    <input id="amountDollar" type="number" name="invdtl_amountusd"
                                        class="form-control form-control-sm">
                                    <?=form_error('invdtl_amountusd', '<small class="text-danger">', '</small>');?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Amount (Rp)</label>
                                    <input id="amountRupiah" type="number" name="invdtl_amountidr"
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

        <!-- Edit Modal USD -->
        <div class="modal fade" id="editInstallment" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="<?=base_url('finance/invoice/student/update-detail');?>" name="updateInstallment"
                        method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Installment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>Installment Name</label>
                                    <input type="hidden" name="inv_num" value="<?=$inv['inv_num'];?>">
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
                                    <input id="percent1" type="number" name="invdtl_percentage"
                                        class="form-control form-control-sm" max="100">
                                    <?=form_error('invdtl_percentage', '<small class="text-danger">', '</small>');?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Amount ($)</label>
                                    <input id="amountDollar1" type="number" name="invdtl_amountusd"
                                        class="form-control form-control-sm">
                                    <?=form_error('invdtl_amountusd', '<small class="text-danger">', '</small>');?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Amount (Rp)</label>
                                    <input id="amountRupiah1" type="number" name="invdtl_amountidr"
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
        <?php } else if($inv['inv_category']=="idr") { ?>
        <!-- IDR  -->
        <div class="card shadow mb-2">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="<?=base_url('finance/invoice/student/update');?>" method="post" name="idr">
                    <div class="row">
                        <div class="col-md-3">
                            No Invoice :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <input type="hidden" name="inv_num" value="<?=$inv['inv_num'];?>">
                                    <input name="inv_id" type="text" class="form-control form-control-sm"
                                        value="<?=$inv['inv_id'];?>" readonly>
                                    <?=form_error('inv_id', '<small class="text-danger">', '</small>');?>
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
                                        <input id="pcRupiah1" name="inv_priceidr" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_priceidr'];?>">
                                        <?=form_error('inv_priceidr', '<small class="text-danger">', '</small>');?>
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
                                        <input id="dsRupiah1" name="inv_discidr" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_discidr'];?>">
                                        <?=form_error('inv_discidr', '<small class="text-danger">', '</small>');?>
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
                                        <input id="tpRupiah1" name="inv_totpridr" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_totpridr'];?>"
                                            readonly>
                                        <?=form_error('inv_totpridr', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                            <input type="text" id="tpWords2" name="inv_words" class="form-control form-control-sm"
                                value="<?=$inv['inv_words'];?>">
                            <?=form_error('inv_words', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class=" col-md-3">
                            Date :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <input name="inv_paymentmethod" type="hidden" value="Full Payment">
                                    <small>Invoice Date</small>
                                    <input name="inv_date" type="date" class="form-control form-control-sm"
                                        value="<?=$inv['inv_date'];?>">
                                    <?=form_error('inv_date', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-3">
                                    <small>Due Date</small>
                                    <input name="inv_duedate" type="date" class="form-control form-control-sm"
                                        value="<?=$inv['inv_duedate'];?>">
                                    <?=form_error('inv_duedate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Notes :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="inv_notes" class="form-control form-control-sm"
                                        rows="6"><?=$inv['inv_notes'];?></textarea>
                                    <?=form_error('inv_notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Terms & Condition :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="inv_tnc" class="form-control form-control-sm"
                                        rows="6"><?=$inv['inv_tnc'];?></textarea>
                                    <?=form_error('inv_tnc', '<small class="text-danger">', '</small>');?>
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
        <?php } else if($inv['inv_category']=="session") { ?>
        <!-- Session -->
        <div class="card shadow">
            <div class="card-body">
                <form action="<?=base_url('finance/invoice/student/update');?>" method="post" name="session">
                    <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-3">
                            No Invoice :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <input type="hidden" name="inv_num" value="<?=$inv['inv_num'];?>">
                                    <input name="inv_id" type="text" class="form-control form-control-sm"
                                        value="<?=$inv['inv_id'];?>" readonly>
                                    <?=form_error('inv_id', '<small class="text-danger">', '</small>');?>
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
                                        <input id="priceHours" name="inv_priceidr" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_priceidr'];?>">
                                        <?=form_error('inv_priceidr', '<small class="text-danger">', '</small>');?>
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
                                        <input id="amount" name="inv_session" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_session'];?>">
                                        <?=form_error('inv_session', '<small class="text-danger">', '</small>');?>
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
                                        <input id="duration" name="inv_duration" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_duration'];?>">
                                        <?=form_error('inv_duration', '<small class="text-danger">', '</small>');?>
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
                                        <input id="discount" name="inv_discidr" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_discidr'];?>">
                                        <?=form_error('inv_discidr', '<small class="text-danger">', '</small>');?>
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
                                        <input id="totalPrice" name="inv_totpridr" type="number"
                                            class="form-control form-control-sm" value="<?=$inv['inv_totpridr'];?>"
                                            readonly>
                                        <?=form_error('inv_totpridr', '<small class="text-danger">', '</small>');?>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <input type="text" id="tpWords3" name="inv_words"
                                        class="form-control form-control-sm" value="<?=$inv['inv_words'];?>">
                                    <?=form_error('inv_words', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Date :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <input name="inv_paymentmethod" type="hidden" value="Full Payment">
                                    <input name="inv_date" type="date" class="form-control form-control-sm"
                                        value="<?=$inv['inv_date'];?>">
                                    <?=form_error('inv_date', '<small class="text-danger">', '</small>');?>
                                </div>

                                <div class="col-md-3">
                                    <input name="inv_duedate" type="date" class="form-control form-control-sm"
                                        value="<?=$inv['inv_duedate'];?>">
                                    <?=form_error('inv_duedate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Notes :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="inv_notes" class="form-control form-control-sm"
                                        rows="6"><?=$inv['inv_notes'];?></textarea>
                                    <?=form_error('inv_notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            Terms & Condition :
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="inv_tnc" class="form-control form-control-sm"
                                        rows="6"><?=$inv['inv_tnc'];?></textarea>
                                    <?=form_error('inv_tnc', '<small class="text-danger">', '</small>');?>
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
        <?php } ?>
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
</script>
<?php if($inv['inv_category']=='usd'){ ?>
<script>
let PM = new SlimSelect({
    select: '#paymentMethod',
    placeholder: 'Select payment method ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

PM.set("<?=$inv['inv_paymentmethod'];?>");
</script>
<?php } ?>
<script>
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

    $('#tpWords1').val(capitalize(tpTot));

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

    $('#tpWords1').val(capitalize(tpRupiah));
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

    $('#tpWords1').val(capitalize(tpRupiah));
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

    $('#tpWords1').val(capitalize(tpRupiah));
});

function paymentMethods() {
    let pm = $('#paymentMethod').val();
    if (pm == "Full Payment") {
        $('#steps').hide();
        $('#dueDate').prop("disabled", false);;
    } else {
        $('#steps').show();
        $('#dueDate').prop("disabled", false);;
    }
}

function editInstalments(x) {
    $.ajax({
        type: 'post',
        url: '<?=base_url("finance/invoice/student/view-detail/");?>' + x,
        dataType: 'json',
        success: function(data) {
            $('#invdtl_id').val(data.invdtl_id);
            $('#invdtl_statusname').val(data.invdtl_statusname);
            $('#invdtl_duedate').val(data.invdtl_duedate);
            $('#percent1').val(data.invdtl_percentage);
            $('#amountDollar1').val(data.invdtl_amountusd);
            $('#amountRupiah1').val(data.invdtl_amountidr);
        }
    });
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
    $('#tpWords2').val(capitalize(tpRupiah));
});

$('#dsRupiah1').keyup(function() {
    let pcRupiah = $('#pcRupiah1').val();
    let dsRupiah = $('#dsRupiah1').val();
    let tpRupiah = pcRupiah - dsRupiah;
    $('#tpRupiah1').val(tpRupiah);
    $('#tpWords2').val(capitalize(tpRupiah));
});

$('#duration').keyup(function() {
    let ph = $('#priceHours').val();
    let ss = $('#amount').val();
    let dr = $('#duration').val();
    let ds = $('#discount').val();

    let tpRupiah = (ph * ss) * (dr / 60) - ds;
    $('#totalPrice').val(tpRupiah);
    $('#tpWords3').val(capitalize(tpRupiah));
});

$('#discount').keyup(function() {
    let ph = $('#priceHours').val();
    let ss = $('#amount').val();
    let dr = $('#duration').val();
    let ds = $('#discount').val();

    let tpRupiah = (ph * ss) * (dr / 60) - ds;
    $('#totalPrice').val(tpRupiah);
    $('#tpWords3').val(capitalize(tpRupiah));
});
</script>