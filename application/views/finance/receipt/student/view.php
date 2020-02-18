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
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/invoice/student/');?>"> Students
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
        <div class="card shadow mb-2 ">
            <div class="card-body text-center">
                <img src="https://image.freepik.com/free-vector/man-with-headphones-microphone-with-computer_113065-136.jpg"
                    alt="client management" width="70%">
                <h5>Stella</h5>
                <h6>Program Name</h6>
            </div>
        </div>
        <div class="card shadow card-sticky mb-3 ">
            <div class="card-body text-center">
                <h5>Receipt</h5>
                <table border=0 class="table">
                    <?php for($i=1;$i<=4;$i++) {?>
                    <tr>
                        <td>
                            Installment <?=$i;?>
                        </td>
                        <td>
                            Transfer
                        </td>
                        <td>
                            <a target="_blank" href="<?=base_url('finance/receipt/student/print-receipt');?>">
                                <div class="badge badge-primary p-1"><i class="fas fa-print"></i>&nbsp; Print</div>
                            </a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <div class="float-right" style="margin-top:-30px;">
                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#addReceipt"
                        onclick="addReceipt('2')"><i class="fas fa-plus"></i>&nbsp; Add Receipt</button>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-3">
                        No Invoice :
                    </div>
                    <div class="col-md-9">
                        JEI/XII/1231244/2020
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Price :
                    </div>
                    <div class="col-md-9">
                        $2200 ( Rp. 30.221.400,- )
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Early Bird :
                    </div>
                    <div class="col-md-9">
                        $150 ( Rp. 2.060.550,- )
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Discount :
                    </div>
                    <div class="col-md-9">
                        $50 ( Rp. 686.850,- )
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        <b>Total Price : </b>
                    </div>
                    <div class="col-md-9">
                        <b>$2000 ( Rp. 27.474.000,- )</b><br>
                        <small>Twenty seven million four hundred seventy four thousand rupiah only</small>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Payment Method :
                    </div>
                    <div class="col-md-9">
                        <?=$paymentMethod;?>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Date :
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <small>Invoice Date :</small><br>
                                23 February 2020
                            </div>
                            <div class="col-md-3">
                                <small>Due Date :</small><br>
                                27 February 2020
                            </div>
                        </div>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Notes :
                    </div>
                    <div class="col-md-9">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore harum esse commodi laudantium
                        dolorem enim aspernatur, quisquam unde doloribus hic provident nam, necessitatibus veritatis
                        nulla nemo cupiditate ipsam, beatae debitis!
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Terms & Condition :
                    </div>
                    <div class="col-md-9">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, asperiores. Omnis labore, earum
                        est necessitatibus sint dignissimos laudantium blanditiis similique officiis quidem, alias quo
                        rerum vitae inventore facilis mollitia! Officiis.
                        <hr class="mt-1 mb-2">
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
                                    <div>
                                        <button class="btn btn-sm btn-secondary" data-toggle="modal"
                                            data-target="#addReceipt" onclick="addReceiptInsallment(<?=$i;?>)"><i
                                                class="fas fa-plus"></i>&nbsp; Add
                                            Receipt</button>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <div class="float-right" style="margin-top:-30px;">
                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#addReceipt"
                        onclick="addReceipt('2')"><i class="fas fa-plus"></i>&nbsp; Add
                        Receipt</button>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-3">
                        No Invoice :
                    </div>
                    <div class="col-md-9">
                        JEI/XII/1231244/2020
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Price :
                    </div>
                    <div class="col-md-9">
                        Rp. 6.000.000,-
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Discount :
                    </div>
                    <div class="col-md-9">
                        Rp. 400.000,-
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        <b>Total Price : </b>
                    </div>
                    <div class="col-md-9">
                        <b>Rp. 5.600.000,-</b><br>
                        <small>Five million six hundred thousand rupiah only</small>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Payment Method :
                    </div>
                    <div class="col-md-9">
                        Full Payment
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Date :
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <small>Invoice Date :</small><br>
                                23 February 2020
                            </div>
                            <div class="col-md-3">
                                <small>Due Date :</small><br>
                                27 February 2020
                            </div>
                        </div>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Notes :
                    </div>
                    <div class="col-md-9">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore harum esse commodi laudantium
                        dolorem enim aspernatur, quisquam unde doloribus hic provident nam, necessitatibus veritatis
                        nulla nemo cupiditate ipsam, beatae debitis!
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Terms & Condition :
                    </div>
                    <div class="col-md-9">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, asperiores. Omnis labore, earum
                        est necessitatibus sint dignissimos laudantium blanditiis similique officiis quidem, alias quo
                        rerum vitae inventore facilis mollitia! Officiis.
                        <hr class="mt-1 mb-2">
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <div class="float-right" style="margin-top:-30px;">
                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#addReceipt"
                        onclick="addReceipt('2')"><i class="fas fa-plus"></i>&nbsp; Add
                        Receipt</button>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-3">
                        No Invoice :
                    </div>
                    <div class="col-md-9">
                        JEI/XII/1231244/2020
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Price/Hours :
                    </div>
                    <div class="col-md-9">
                        Rp. 600.000,-
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Session :
                    </div>
                    <div class="col-md-9">
                        5 x
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Duration/Session :
                    </div>
                    <div class="col-md-9">
                        45 Minutes
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Discount :
                    </div>
                    <div class="col-md-9">
                        Rp. 50.000,-
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        <b>Total Price : </b>
                    </div>
                    <div class="col-md-9">
                        <b>Rp. 2.200.000,-</b><br>
                        <small>Two million two hundred thousand rupiah only</small>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Payment Method :
                    </div>
                    <div class="col-md-9">
                        Full Payment
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Date :
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <small>Invoice Date :</small><br>
                                23 February 2020
                            </div>
                            <div class="col-md-3">
                                <small>Due Date :</small><br>
                                27 February 2020
                            </div>
                        </div>
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Notes :
                    </div>
                    <div class="col-md-9">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore harum esse commodi laudantium
                        dolorem enim aspernatur, quisquam unde doloribus hic provident nam, necessitatibus veritatis
                        nulla nemo cupiditate ipsam, beatae debitis!
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Terms & Condition :
                    </div>
                    <div class="col-md-9">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, asperiores. Omnis labore, earum
                        est necessitatibus sint dignissimos laudantium blanditiis similique officiis quidem, alias quo
                        rerum vitae inventore facilis mollitia! Officiis.
                        <hr class="mt-1 mb-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <i class="fas fa-plus"></i>&nbsp; Add Full Payment -->
<div class="modal fade" id="addReceipt" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i>&nbsp; Add Receipt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Amount</label>
                        <div class="form-group">
                            <input type="text" name="amount" id="amount" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Date</label>
                        <div class="form-group">
                            <input type="date" name="date" id="date" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Payment Method</label>
                        <div class="form-group">
                            <select name="paymentMethod" id="paymentMethod" class="form-control form-control-sm"
                                onchange="paymentMethod()">
                                <option value="Wire Transfer">Wire Transfer</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Cheque No</label>
                        <div class="form-group">
                            <input type="text" name="cheque" id="cheque" class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
function paymentMethod() {
    let pm = $('#paymentMethod').val();
    if (pm == 'Cheque') {
        $('#cheque').prop("disabled", false)
        $('#cheque').focus();
    } else {
        $('#cheque').prop("disabled", true)
    }
}

function addReceipt(x) {
    console.log(x);
}

function addReceiptInsallment(x) {
    console.log(x);
}
</script>