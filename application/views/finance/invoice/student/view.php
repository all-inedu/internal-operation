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
        <div class="card shadow card-sticky mb-3 ">
            <div class="card-body text-center">
                <img src="https://image.freepik.com/free-vector/man-with-headphones-microphone-with-computer_113065-136.jpg"
                    alt="client management" width="70%">
                <h5>Stella</h5>
                <h6>Program Name</h6>
                <hr>
                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-times"></i>&nbsp; Cancel</a>
                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                <a href="<?=base_url('finance/invoice/student/dompdf');?>" class="btn btn-sm btn-primary"
                    target="_blank"><i class="fas fa-print"></i>&nbsp; Print</a>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; View Invoice </h6>
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
                        $2200 (RP. 33.000.000,00)
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Early Bird :
                    </div>
                    <div class="col-md-9">
                        $2200 (RP. 33.000.000,00)
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Discount :
                    </div>
                    <div class="col-md-9">
                        $2200 (RP. 33.000.000,00)
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Total Price :
                    </div>
                    <div class="col-md-9">
                        $2200 (RP. 33.000.000,00)
                        <hr class="mt-1 mb-2">
                    </div>
                    <div class="col-md-3">
                        Payment Method :
                    </div>
                    <div class="col-md-9">
                        Installment
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
                    </div>
                    <div class="col-md-12 mt-3">
                        <table class="table table-bordered text-center">
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Due Date
                                </th>
                                <th>
                                    Percent
                                </th>
                                <th>
                                    Amount
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>