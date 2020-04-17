<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Add Invoice
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/invoice/student/');?>"> Students
                            Program</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Invoice</li>
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
                <h5><?=$sp['st_firstname'].' '.$sp['st_lastname'];?></h5>
                <h6 class="text-info"><?=$sp['prog_program'];?></h6>
            </div>
        </div>
        <div class="card shadow card-sticky mb-3">
            <div class="card-body">
                <div class="form-group text-center">
                    <label>Current USD
                    </label>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Rp.</span>
                        </div>
                        <input type="text" class="form-control" id="currentUSD" aria-describedby="basic-addon3">
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
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; Add Invoice </h6>
                <div class="text-right" style="margin-top:-30px;">
                    <select id="category" onChange="cFunction();">
                        <option value="usd">USD</option>
                        <option value="idr">IDR</option>
                        <option value="session">Session</option>
                    </select>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <!-- With USD -->
                <div id="usd">
                    <form action="" method="post" name="usd">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Price <i class="text-danger font-weight-bold">*</i></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="stprog_id" value="<?=$sp['stprog_id'];?>">
                                        <input type="hidden" name="inv_category" value="usd">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>
                                                <input id="pcDollar" name="inv_priceusd" type="number"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <?=form_error('inv_priceusd', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                </div>
                                                <input id="pcRupiah" name="inv_priceidr" type="number"
                                                    class="form-control form-control-sm" readonly>
                                            </div>
                                            <?=form_error('inv_priceidr', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Early Bird</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>
                                                <input id="ebDollar" name="inv_earlybirdusd" type="number"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <?=form_error('inv_earlybirdusd', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                </div>
                                                <input id="ebRupiah" name="inv_earlybirdidr" type="number"
                                                    class="form-control form-control-sm" readonly>
                                                <?=form_error('inv_earlybirdidr', '<small class="text-danger">', '</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <label>Discount
                                </label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>
                                                <input id="dsDollar" name="inv_discusd" type="number"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <?=form_error('inv_discusd', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                </div>
                                                <input id="dsRupiah" name="inv_discidr" type="number"
                                                    class="form-control form-control-sm" readonly>
                                            </div>
                                            <?=form_error('inv_discidr', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Total Price</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>
                                                <input id="tpDollar" name="inv_totprusd" type="number"
                                                    class="form-control form-control-sm" readonly>
                                            </div>
                                            <?=form_error('inv_totprusd', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                </div>
                                                <input id="tpRupiah" name="inv_totpridr" type="number"
                                                    class="form-control form-control-sm" readonly>
                                            </div>
                                            <?=form_error('inv_totpridr', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Total Price</label>
                                    <input id="tpWords1" name="inv_words" class="form-control form-control-sm">
                                    <?=form_error('inv_words', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Payment Method <i class="text-danger font-weight-bold">*</i></label>
                                    <select id="paymentMethod" name="inv_paymentmethod" onChange="paymentMethods();">
                                        <option data-placeholder="true"></option>
                                        <option value="Full Payment">Full Payment</option>
                                        <option value="Installment">Installment</option>
                                    </select>
                                    <?=form_error('inv_paymentmethod', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date <i class="text-danger font-weight-bold">*</i></label>
                                    <input name="inv_date" type="date" class="form-control form-control-sm">
                                    <?=form_error('inv_date', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Due Date <i class="text-danger font-weight-bold">*</i></label>
                                    <input id="dueDate" name="inv_duedate" type="date"
                                        class="form-control form-control-sm">
                                    <?=form_error('inv_duedate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="inv_notes" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('inv_notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Terms and Condition</label>
                                    <textarea name="inv_tnc" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('inv_tnc', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                        <div class="row" id="steps">
                            <div class="col-md-12">
                                <button class="float-right btn btn-warning add_more_button"><i
                                        class="fas fa-plus-square"></i>&nbsp; Add Installment</button>
                            </div>
                            <div class="container mt-3" id="installmentUSD">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <small>Status Name</small>
                                            <input type="text" name="invdtl_statusname[]"
                                                class="form-control form-control-sm" value="Installment 1">
                                            <?=form_error('invdtl_statusname[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <small>Due Date</small>
                                            <input type="date" name="invdtl_duedate[]"
                                                class="form-control form-control-sm">
                                            <?=form_error('invdtl_duedate[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <small>Percent</small>
                                            <input id="percent1" type="number" name="invdtl_percentage[]"
                                                class="form-control form-control-sm">
                                            <?=form_error('invdtl_percentage[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <small>Amount ($)</small>
                                            <input id="amountDollar1" type="number" name="invdtl_amountusd[]"
                                                class="form-control form-control-sm">
                                            <?=form_error('invdtl_amountusd[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <small>Amount (Rp)</small>
                                            <input id="amountRupiah1" type="number" name="invdtl_amountidr[]"
                                                class="form-control form-control-sm">
                                            <?=form_error('invdtl_amountidr[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>&nbsp;
                                    Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End USD  -->

                <!-- With IDR -->
                <div id="idr">
                    <form action="" method="post" name="idr">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price <i class="text-danger font-weight-bold">*</i></label>
                                    <input type="hidden" name="stprog_id" value="<?=$sp['stprog_id'];?>">
                                    <input type="hidden" name="inv_category" value="idr">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="pcRupiah1" name="inv_priceidr" type="number"
                                            class="form-control form-control-sm">
                                    </div>
                                    <?=form_error('inv_priceidr', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="dsRupiah1" name="inv_discidr" type="number"
                                            class="form-control form-control-sm">
                                    </div>
                                    <?=form_error('inv_discidr', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Price (Rp)</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="tpRupiah1" name="inv_totpridr" type="number"
                                            class="form-control form-control-sm" readonly>
                                    </div>
                                    <?=form_error('inv_totpridr', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Total Price</label>
                                    <input type="text" id="tpWords2" name="inv_words"
                                        class="form-control form-control-sm">
                                    <?=form_error('inv_words', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Payment Method <i class="text-danger font-weight-bold">*</i></label>
                                    <select id="paymentMethodIDR" name="inv_paymentmethod"
                                        onChange="paymentMethodsIDR();">
                                        <option data-placeholder="true"></option>
                                        <option value="Full Payment">Full Payment</option>
                                        <option value="Installment">Installment</option>
                                    </select>
                                    <?=form_error('inv_paymentmethod', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date <i class="text-danger font-weight-bold">*</i></label>
                                    <input name="inv_date" type="date" class="form-control form-control-sm">
                                    <?=form_error('inv_date', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Due Date <i class="text-danger font-weight-bold">*</i></label>
                                    <input name="inv_duedate" type="date" class="form-control form-control-sm">
                                    <?=form_error('inv_duedate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="inv_notes" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('inv_notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Terms and Condition</label>
                                    <textarea name="inv_tnc" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('inv_tnc', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                        <div class="row" id="stepsIDR">
                            <div class="col-md-12">
                                <button class="float-right btn btn-warning add_more_button"><i
                                        class="fas fa-plus-square"></i>&nbsp; Add Installment</button>
                            </div>
                            <div class="container mt-3" id="installmentIDR">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <small>Status Name</small>
                                            <input type="text" name="invdtl_statusname[]"
                                                class="form-control form-control-sm" value="Installment 1">
                                            <?=form_error('invdtl_statusname[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <small>Due Date</small>
                                            <input type="date" name="invdtl_duedate[]"
                                                class="form-control form-control-sm">
                                            <?=form_error('invdtl_duedate[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <small>Percent</small>
                                            <input id="percentIDR1" type="number" name="invdtl_percentage[]"
                                                class="form-control form-control-sm">
                                            <?=form_error('invdtl_percentage[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <small>Amount (Rp)</small>
                                            <input id="amountIDR1" type="number" name="invdtl_amountidr[]"
                                                class="form-control form-control-sm">
                                            <?=form_error('invdtl_amountidr[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>&nbsp;
                                    Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End IDR  -->

                <!-- With session -->
                <div id="session">
                    <form action="" method="post" name="idr">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="hidden" name="stprog_id" value="<?=$sp['stprog_id'];?>">
                                    <input type="hidden" name="inv_category" value="session">
                                    <label>Price/<small>Hours</small> <i
                                            class="text-danger font-weight-bold">*</i></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="priceHours" name="inv_priceidr" type="number"
                                            class="form-control form-control-sm">
                                    </div>
                                    <?=form_error('inv_priceidr', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Session <i class="text-danger font-weight-bold">*</i></label>
                                    <div class="input-group input-group-sm">
                                        <input id="amount" name="inv_session" type="number"
                                            class="form-control form-control-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-times"></i></span>
                                        </div>
                                    </div>
                                    <?=form_error('inv_session', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Duration/<small>Minute</small> <i
                                            class="text-danger font-weight-bold">*</i></label>
                                    <div class="input-group input-group-sm">
                                        <input id="duration" name="inv_duration" type="number"
                                            class="form-control form-control-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-quote-right"></i></span>
                                        </div>
                                    </div>
                                    <?=form_error('inv_duration', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="Discount">
                                    <label>Discount</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="discount" name="inv_discidr" type="number"
                                            class="form-control form-control-sm">
                                    </div>
                                    <?=form_error('inv_discidr', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Total Price</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="totalPrice" name="inv_totpridr" type="number"
                                            class="form-control form-control-sm" readonly>
                                    </div>
                                    <?=form_error('inv_totpridr', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Total Price</label>
                                    <input type="text" id="tpWords3" name="inv_words"
                                        class="form-control form-control-sm">
                                    <?=form_error('inv_words', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date <i class="text-danger font-weight-bold">*</i></label>
                                    <input type="hidden" name="inv_paymentmethod" value="Full Payment">
                                    <input name="inv_date" type="date" class="form-control form-control-sm">
                                    <?=form_error('inv_date', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Due Date <i class="text-danger font-weight-bold">*</i></label>
                                    <input name="inv_duedate" type="date" class="form-control form-control-sm">
                                    <?=form_error('inv_duedate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="inv_notes" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('inv_notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Terms and Condition</label>
                                    <textarea name="inv_tnc" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('inv_tnc', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>&nbsp;
                                    Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End session  -->
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script src="<?=base_url('assets/js/generate-number.js');?>"></script>
<script>
$(document).ready(function() {
    $('#category').val("<?=$sp['prog_payment'];?>");
    cFunction();
});

$('#usd').show();
$('#steps').hide();
$('#idr').hide();
$('#stepsIDR').hide();
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

new SlimSelect({
    select: '#paymentMethodIDR',
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
    console.log(pm);
    if (pm == "Full Payment") {
        $('#steps').hide();
        $('#dueDate').prop("disabled", false);;
    } else {
        $('#steps').show();
        $('#dueDate').prop("disabled", false);;
    }
}

function paymentMethodsIDR() {
    let pm = $('#paymentMethodIDR').val();
    console.log(pm);
    if (pm == "Full Payment") {
        $('#stepsIDR').hide();
    } else {
        $('#stepsIDR').show();
    }
}

$('#percent1').keyup(function() {
    let USD = $('#currentUSD').val();
    let tpDollar = $('#tpDollar').val();
    let tpRupiah = $('#tpRupiah').val();
    let percent = $('#percent1').val();
    let amountDollar = (percent / 100) * tpDollar;
    let amountRupiah = amountDollar * USD;
    $('#amountDollar1').val(amountDollar.toFixed(1));
    $('#amountRupiah1').val(Math.round(amountRupiah));
});

$('#amountDollar1').keyup(function() {
    let USD = $('#currentUSD').val();
    let tpDollar = parseInt($('#tpDollar').val());
    let tpRupiah = $('#tpRupiah').val();
    let amountDollar = $('#amountDollar1').val();

    if ($(this).val() > tpDollar) {
        $(this).val(tpDollar);
    }

    let percent = (amountDollar / tpDollar) * 100;
    let amountRupiah = amountDollar * USD;
    $('#percent1').val(percent.toFixed(1));
    $('#amountRupiah1').val(Math
        .round(amountRupiah));
});


$(document).ready(function() {
    var max_fields_limit = 8; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    var sum = 0;
    $('.add_more_button').click(function(
        e) { //click event on add more fields button having class add_more_button
        e.preventDefault();
        if (x < max_fields_limit) { //check conditions
            x++; //counter increment
            $('#installmentUSD').append(
                '<div class="row">' +
                '<div class="line" style="margin-top:15px; margin-bottom:35px; width:"50%; "></div>' +
                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Status Name</small>' +
                ' <input type="text" name="invdtl_statusname[]" class="form-control form-control-sm" value="Installment ' +
                x + '">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Due Date</small>' +
                '<input type="date" name="invdtl_duedate[]" class="form-control form-control-sm" >' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2">' +
                '<div class="form-group">' +
                '<small>Percent</small>' +
                '<input id="percent' + x +
                '" type="number" name="invdtl_percentage[]" class="form-control form-control-sm">' +
                '</div>' +
                '</div>' +

                ' <div class="col-md-2">' +
                '<div class="form-group">' +
                '<small>Amount ($)</small>' +
                '<input id="amountDollar' + x +
                '" type="number" name="invdtl_amountusd[]" class="form-control form-control-sm">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2">' +
                '<div class="form-group">' +
                '<small>Amount (Rp)</small>' +
                '<input id="amountRupiah' + x +
                '" type="number" name="invdtl_amountidr[]" class="form-control form-control-sm">' +
                '</div>' +
                '</div>' +

                '<button style="position:absolute; left:20px; margin-top:22px;" class="btn btn-sm btn-danger remove_field float-right"><i class="fas fa-times-circle"></i></button>' +

                '</div>'
            ); //add input field

            $('#percent' + x).keyup(function() {
                let USD = $('#currentUSD').val();
                let tpDollar = $('#tpDollar').val();
                let tpRupiah = $('#tpRupiah').val();
                let percent = $('#percent' + x).val();
                let amountDollar = (percent / 100) * tpDollar;
                let amountRupiah = amountDollar * USD;
                $('#amountDollar' + x).val(amountDollar.toFixed(1));
                $('#amountRupiah' + x).val(Math.round(amountRupiah));
            });

            $('#amountDollar' + x).keyup(function() {
                let USD = $('#currentUSD').val();
                let tpDollar = $('#tpDollar').val();
                let tpRupiah = $('#tpRupiah').val();
                let amountDollar1 = $('#amountDollar1').val();
                let amountDollar = $('#amountDollar' + x).val();
                let percent = (amountDollar / tpDollar) * 100;
                let amountRupiah = amountDollar * USD;
                $('#percent' + x).val(percent.toFixed(1));
                $('#amountRupiah' + x).val(Math.round(amountRupiah));
            });

        }


    });
    $('#installmentUSD').on("click", ".remove_field", function(
        e) { //user click on remove text links
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
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


$('#percentIDR1').keyup(function() {
    let tpRupiah = $('#tpRupiah1').val();
    let percent = $('#percentIDR1').val();
    let amountIDR = (percent / 100) * tpRupiah;
    $('#amountIDR1').val(Math.round(amountIDR));
});

$('#amountIDR1').keyup(function() {
    let tpRupiah = $('#tpRupiah1').val();
    let amountIDR = $('#amountIDR1').val();
    let percent = (amountIDR / tpRupiah) * 100;
    $('#percentIDR1').val(percent.toFixed(1));
});

$(document).ready(function() {
    var max_fields_limit = 8; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    var sum = 0;
    $('.add_more_button').click(function(
        e) { //click event on add more fields button having class add_more_button
        e.preventDefault();
        if (x < max_fields_limit) { //check conditions
            x++; //counter increment
            $('#installmentIDR').append(
                '<div class="row">' +
                '<div class="line" style="margin-top:15px; margin-bottom:35px; width:"50%; "></div>' +
                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Status Name</small>' +
                ' <input type="text" name="invdtl_statusname[]" class="form-control form-control-sm" value="Installment ' +
                x + '">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Due Date</small>' +
                '<input type="date" name="invdtl_duedate[]" class="form-control form-control-sm" >' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Percent</small>' +
                '<input id="percentIDR' + x +
                '" type="number" name="invdtl_percentage[]" class="form-control form-control-sm">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Amount (Rp)</small>' +
                '<input id="amountIDR' + x +
                '" type="number" name="invdtl_amountidr[]" class="form-control form-control-sm">' +
                '</div>' +
                '</div>' +

                '<button style="position:absolute; left:20px; margin-top:22px;" class="btn btn-sm btn-danger remove_field float-right"><i class="fas fa-times-circle"></i></button>' +

                '</div>'
            ); //add input field

            $('#percentIDR' + x).keyup(function() {
                let tpRupiah = $('#tpRupiah1').val();
                let percent = $('#percentIDR' + x).val();
                let amountIDR = (percent / 100) * tpRupiah;
                $('#amountIDR' + x).val(Math.round(amountIDR));
            });

            $('#amountIDR' + x).keyup(function() {
                let tpRupiah = $('#tpRupiah1').val();
                let amountIDR = $('#amountIDR' + x).val();
                let percent = (amountIDR / tpRupiah) * 100;
                $('#percentIDR' + x).val(percent.toFixed(1));
            });

        }


    });
    $('#installmentIDR').on("click", ".remove_field", function(
        e) { //user click on remove text links
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
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