<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Export Petty Cash
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/petty-cash');?>">Petty Cash</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Export</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Month
                                </label>
                                <select id="month" name="month">
                                    <option data-placeholder="true"></option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <?=form_error('month', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Year
                                </label>
                                <select id="year" name="year">
                                    <option data-placeholder="true"></option>
                                    <?php 
                                $year = date('Y');
                                for($i=$year-3;$i<=$year;$i++){
                                ?>
                                    <option value=<?=$i;?>><?=$i;?></option>
                                    <?php } ?>
                                </select>
                                <?=form_error('year', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <button type="submit" class="btn btn-sm btn-block btn-info"><i
                                    class="fas fa-search"></i>&nbsp;
                                Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-center mt-3">
                        <h5>PT JAWARA EDUKASIH INDONESIA (ALL-IN EDUSPACE)</h5>
                        <h6>Laporan Tagihan Dibayar</h6>
                        <p>Bulan April 2018</p>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Invoice</th>
                                        <th>Supplier</th>
                                        <th>Goods/Services</th>
                                        <th>From</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=1;$i<=6;$i++){ ?>
                                    <tr>
                                        <td>11 February 2020</td>
                                        <td>REC-08JEI</td>
                                        <td>Indomaret</td>
                                        <td>Tissu Nice</td>
                                        <td>Kas</td>
                                        <td>Rp. 35.000</td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th colspan="5" class="text-right">Total Petty Cash Expenditure</th>
                                        <td class="bg-danger text-white">Rp. 210.000</td>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Petty Cash April</th>
                                        <td class="bg-primary text-white">Rp. 500.000</td>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Saldo</th>
                                        <td class="bg-secondary text-white">Rp. 290.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
new SlimSelect({
    select: '#month',
    placeholder: 'Select month ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#year',
    placeholder: 'Select ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
</script>