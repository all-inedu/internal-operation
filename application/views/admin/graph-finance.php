<div class="container mt-4 mb-5">
    <hr>
    <div class="text-center">
        <h4>Finance</h4>
        <hr width="50px" class="mt-1">
    </div>
    <div class="row">
        <div class="col-md-3" style="cursor:pointer" onclick="window.location='<?=base_url('finance/petty-cash');?>'">
            <div class="card mb-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center align-middle p-4">
                        <img src="<?=base_url('assets/img/petty-cash.png');?>" alt="petty cash" width="100%">
                    </div>
                    <div class="col-md-8 bg-info text-white shadow align-middle">
                        <div class="card-body">
                            <h5 class="text-right mb-0">Petty Cash</h5>
                            <div class="line" style="margin-top:8px; margin-bottom:7px;"></div>
                            <h6 class="card-title text-right mb-0">Rp.
                                <?=number_format($saldo['pettysaldo_balance']);?>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3 shadow" style="cursor:pointer"
                onclick="window.location='<?=base_url('finance/invoice/student/');?>'">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center my-auto">
                        <h5 class="count-title"><?=$inv;?></h5>
                    </div>
                    <div class="col-md-8 bg-secondary text-white shadow align-middle">
                        <div class="card-body pt-4 pb-3 pr-2">
                            <h5 class="text-right mb-2">Total Invoice </h4>
                                <h6 class="text-right">Of B2C/Students</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3 shadow" style="cursor:pointer"
                onclick="window.location='<?=base_url('finance/invoice/school/');?>'">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center my-auto">
                        <h5 class="count-title"><?=$invsch;?></h5>
                    </div>
                    <div class="col-md-8 bg-primary text-white shadow align-middle">
                        <div class="card-body pt-4 pb-3 pr-2">
                            <h5 class="text-right mb-2">Total Invoice </h4>
                                <h6 class="text-right">Of B2B/Schools</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card mb-3 shadow" style="cursor:pointer"
                onclick="window.location='<?=base_url('finance/receipt/student/');?>'">
                <div class=" row no-gutters">
                    <div class="col-md-4 text-center my-auto">
                        <h5 class="count-title"><?=$receipt;?></h5>
                    </div>
                    <div class="col-md-8 bg-warning text-white shadow align-middle">
                        <div class="card-body pt-4 pb-3 pr-2">
                            <h5 class="text-right mb-2">Total Receipt</h5>
                            <h6 class="text-right">Of B2C/B2B</>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h4>Invoice</h4>
                    <hr>
                    <small>* All</small>
                    <canvas id="invoiceChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h4>Receipt</h4>
                    <hr>
                    <small>* All</small>
                    <canvas id="receiptChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h4>Revenue</h4>
                    <hr>
                    <small>M : Million</small>
                    <canvas id="myChart3"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$month = ['', 'January','February','March','April','May','June','July','August','September','October','November','December'];
$mon = [];
$totrev = [];

foreach($revenue as $rev) :
$tot = $rev['amount']-$rev['refund'];
array_push($mon, $month[$rev['m']].' '.$rev['y']);
array_push($totrev,$tot/1000000);
endforeach; 
$arr1 = implode(",",$mon);
$arr2 = implode(",",$totrev);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}



var invoice = $("#invoiceChart");
new Chart(invoice, {
    data: {
        datasets: [{
            data: ["<?=$inv;?>", "<?=$invsch;?>"],
            backgroundColor: ["#6C757D", "#1F7EE4"],
            label: 'My dataset' // for legend
        }],
        labels: ["B2C/Students", "B2B/Schools"]
    },
    type: 'polarArea'
});

var receipt = $("#receiptChart");
new Chart(receipt, {
    data: {
        datasets: [{
            data: ["<?=$rec;?>", "<?=$recsch;?>"],
            backgroundColor: ["#ff8507", "#976ef1"],
            label: 'My dataset' // for legend
        }],
        labels: ["B2C/Students", "B2B/Schools"]
    },
    type: 'polarArea'
});

let rev1 = "<?=$arr1;?>";
let array1 = rev1.split(",");

let rev2 = "<?=$arr2;?>";
let array2 = rev2.split(",");

var ctx3 = $("#myChart3");
new Chart(ctx3, {
    type: 'line',
    data: {
        labels: array1,
        datasets: [{
            data: array2,
            borderColor: '#fc840c',
            backgroundColor: 'rgba(255, 0, 0, 0.0)',
            borderWidth: 3,
            label: 'Total Revenue'
        }],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false,
                    callback: function(value, index, values) {
                        return 'Rp. ' + number_format(value) + ' M';
                    }
                }
            }],
            xAxes: [{
                ticks: {
                    display: true
                }
            }],
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || ' ';
                    return datasetLabel + ': Rp. ' + number_format(tooltipItem.yLabel, 2) + ' M';
                }
            }
        },
        legend: {
            display: false
        }
    }
});
</script>

</body>

</html>