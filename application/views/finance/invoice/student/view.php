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
                <a href="#" class="btn btn-sm btn-danger cancel-button" data-message="invoice"><i
                        class="fas fa-times"></i>&nbsp; Cancel</a>
                <a href="<?=base_url('finance/invoice/student/edit/2');?>" class="btn btn-sm btn-warning ml-2 mr-2"><i
                        class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
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
                            </tr>
                            <?php for($i=1;$i<=4;$i++){ ?>
                            <tr>
                                <td>Instalment <?=$i;?></td>
                                <td>14 February 2020</td>
                                <td>25%</td>
                                <td>$400 (Rp. 9.000.000,-)</td>
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