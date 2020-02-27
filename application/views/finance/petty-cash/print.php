<style>
h4 {
    font-size: 25px !important;
}

h5 {
    margin-top: -15px;
    font-size: 20px !important;
}

h6 {
    font-size: 15px !important;
}

.pdf {
    font-size: 12px !important;
    font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
    margin: 0 20px;
    margin-top: -40px;
}

.box {
    float: right;
    border: 1px solid #000;
    right: 40px;
    padding: 10px 30px;
    text-align: center;
    margin-top: 20px;
    background: #efefef;
}

.box small {
    font-size: 10px !important;
}

.box b {
    font-size: 15px !important;
}

table {
    border-collapse: collapse;
}

table tr td,
th {
    padding: 4px 0px;
    border: 1px solid #dedede;
}

.table-detail td,
th {
    border: 1px solid #dedede;
    padding: 6px 7px;
}
</style>
<div class="pdf">
    <h4
        style="line-height:1.6; letter-spacing:3px; font-weight:bold; text-align:center; color:#606060; font-size:18px; margin-bottom:10px; ">
        <b>PT. JAWARA EDUKASIH INDONESIA</b>
    </h4>
    <h5 style="text-align:center; color:#606060;">Laporan Tagihan Dibayar</h5>
    <h6 style="text-align:center; color:#606060; margin-top:-20px;">Bulan <?=$month." ".$y;?></h6>
    <hr style="border:0.1px solid #606060; margin-top:-20px;">
    <br>
    <table width="100%" class="table-see-detail">
        <tr align="center" style="background:#606060; color:white;">
            <th>Date</th>
            <th width="30%">Invoice</th>
            <th>Supplier</th>
            <th>Goods/Services</th>
            <th>From</th>
            <th>Total</th>
        </tr>
        <?php 
            $totalExpense = 0; 
            foreach($expense as $ex): 
        ?>
        <tr>
            <td align="center"><?=date('d F Y', strtotime($ex['pettyexpenses_date']));?></td>
            <td style="padding-left:10px;"><?=$ex['pettyexpenses_inv'];?></td>
            <td align="center"><?=$ex['pettyexpenses_supplier'];?></td>
            <td align="center"><?=$ex['pettyexpenses_type'];?></td>
            <td align="center"><?=$ex['pettyexpenses_paymentfrom'];?></td>
            <td align="center">Rp. <?=number_format($ex['pettyexpenses_total']);?></td>
        </tr>
        <?php 
            $totalExpense += $ex['pettyexpenses_total'];
            endforeach; 
        ?>
        <tr>
            <th colspan="5" align="right">Total Expense</th>
            <td align="center">Rp.
                <?=number_format($totalExpense);?></td>
        </tr>
        <tr>
            <th colspan="5" align="right">Petty Cash <?=$month;?></th>
            <td align="center">Rp.
                <?=number_format($saldo['pettysaldo_inflow']);?></td>
        </tr>
        <tr>
            <th colspan="5" align="right">Saldo Petty Cash <?=$lmonth;?></th>
            <td align="center">Rp.
                <?=number_format($lastsaldo);?></td>
        </tr>
        <tr>
            <?php 
              $totalSaldo = $saldo['pettysaldo_inflow'] + $lastsaldo - $totalExpense;
            ?>
            <th colspan="5" align="right">Saldo</th>
            <td align="center" style="background:#dedede;"><b>Rp. <?=number_format($totalSaldo);?></b></td>
        </tr>
    </table>
    <br>
</div>