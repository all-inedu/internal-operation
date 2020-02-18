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
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/invoice/student/');?>"> Schools
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
        <div class="card shadow mb-2">
            <div class="card-body text-center">
                <img src="https://image.freepik.com/free-vector/man-with-headphones-microphone-with-computer_113065-136.jpg"
                    alt="client management" width="70%">
                <h5>School Name</h5>
                <h6>Program Name</h6>
                02 February 2020 - 14 February 2020
            </div>
        </div>
        <div class="card shadow card-sticky mb-3 ">
            <div class="card-body text-center">
                <h5>Receipt</h5>
                <table border=0 class="table">
                    <tr>
                        <td>
                            Full Payment
                        </td>
                        <td>
                            Transfer
                        </td>
                        <td>
                            <a target="_blank" href="<?=base_url('finance/receipt/school/print-receipt');?>">
                                <div class="badge badge-primary p-1"><i class="fas fa-print"></i>&nbsp; Print</div>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow mb-3">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
                <div class="float-right" style="margin-top:-30px;">
                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#addReceipt"
                        onclick="addReceipt('2')"><i class="fas fa-plus"></i>&nbsp; Add Receipt</button>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-2">
                        Price :
                    </div>
                    <div class="col-md-10 mb-3">
                        Rp. 100.000,-
                    </div>
                    <div class="col-md-2">
                        Participans :
                    </div>
                    <div class="col-md-10 mb-3">
                        10 Person
                    </div>

                    <div class="col-md-2">
                        Discount :
                    </div>
                    <div class="col-md-10 mb-3">
                        Rp. 150.000,-
                    </div>

                    <div class="col-md-2">
                        Total Price :
                    </div>
                    <div class="col-md-10 mb-3">
                        Rp. 850.000,-
                    </div>

                    <div class="col-md-2">
                        Date :
                    </div>
                    <div class="col-md-10 mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <small>Invoice Date </small><br>
                                02 February 2020
                            </div>
                            <div class="col-md-3">
                                <small>Due Date</small><br>
                                14 February 2020
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 mb-3">
                        Notes :
                    </div>
                    <div class="col-md-10 mb-3 mb-3">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo repudiandae itaque adipisci quia,
                        similique dignissimos eos error recusandae quas laborum sapiente quidem. Provident itaque sed
                        omnis vel? Aut, iure expedita! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil
                        voluptate veritatis, quae aut ipsum nostrum? Provident illo ullam numquam assumenda sunt? Nisi
                        nemo odit quos velit odio mollitia, vero eaque!
                    </div>

                    <div class="col-md-2 mb-3">
                        Terms & Condition :
                    </div>
                    <div class="col-md-10 mb-3 mb-3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet dicta asperiores provident at
                        temporibus libero, unde aperiam. Numquam natus, officiis saepe iure blanditiis facilis odio
                        iusto quis molestias optio?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla placeat officiis exercitationem
                        aut minus ullam necessitatibus esse. Soluta voluptates delectus vel doloremque quae inventore
                        earum. Magni dolorum asperiores necessitatibus non.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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