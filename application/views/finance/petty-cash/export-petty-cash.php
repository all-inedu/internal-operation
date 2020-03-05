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
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/petty-cash/');?>">Petty Cash</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Export</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card shadow card-sticky">
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
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <?php if(empty($saldo)){ ?>
                <div class="row">
                    <div class="col-md-12 text-center mb-3">
                        <i class="fas fa-search fa-2x mt-4 mb-2"></i>
                        <h4>List of Petty Cash Not Found</h4>
                    </div>
                </div>
                <?php } else {?>
                <div class="row">
                    <div class="col-md-12 text-center mt-3">
                        <div class="position-absolute">
                            <a href="<?=base_url('finance/petty-cash/print/'.$m.'/'.$y);?>"
                                class="btn btn-sm btn-primary" target="_blank">
                                <i class="fas fa-print"></i>&nbsp; Print
                            </a>
                        </div>
                        <h5>PT JAWARA EDUKASIH INDONESIA (ALL-IN EDUSPACE)</h5>
                        <h6>Laporan Tagihan Dibayar</h6>
                        <p>Bulan <?=$month." ".$y;?></p>
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
                                    <?php 
                                        $totalExpense = 0; 
                                        foreach($expense as $ex): 
                                    ?>
                                    <tr>
                                        <td class="p-1"><?=date('d F Y', strtotime($ex['pettyexpenses_date']));?></td>
                                        <td class="p-1"><?=$ex['pettyexpenses_inv'];?></td>
                                        <td class="p-1"><?=$ex['pettyexpenses_supplier'];?></td>
                                        <td class="p-1"><?=$ex['pettyexpenses_type'];?></td>
                                        <td class="p-1"><?=$ex['pettyexpenses_paymentfrom'];?></td>
                                        <td class="p-1">Rp. <?=number_format($ex['pettyexpenses_total']);?></td>
                                    </tr>
                                    <?php 
                                        $totalExpense += $ex['pettyexpenses_total'];
                                        endforeach; 
                                    ?>
                                    <tr>
                                        <th colspan="5" class="text-right">Total Expense</th>
                                        <td class="bg-danger text-white">Rp.
                                            <?=number_format($totalExpense);?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Petty Cash <?=$month;?></th>
                                        <td class="bg-warning text-white">Rp.
                                            <?=number_format($saldo['pettysaldo_inflow']);?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Saldo Petty Cash <?=$lmonth;?></th>
                                        <td class="bg-primary text-white">Rp.
                                            <?=number_format($lastsaldo);?></td>
                                    </tr>
                                    <tr>
                                        <?php 
                                            $totalSaldo = $saldo['pettysaldo_inflow'] + $lastsaldo - $totalExpense;
                                        ?>
                                        <th colspan="5" class="text-right">Saldo</th>
                                        <td class="bg-secondary text-white">Rp. <?=number_format($totalSaldo);?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
var mt = new SlimSelect({
    select: '#month',
    placeholder: 'Select month ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
mt.set("<?=$m;?>");

var yr = new SlimSelect({
    select: '#year',
    placeholder: 'Select ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
yr.set("<?=$y;?>");
</script>