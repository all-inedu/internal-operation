<style>
h4 {
    font-size: 25px !important;
}

h6 {
    font-size: 15px !important;
}

.pdf {
    font-size: 12px !important;
    font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
    margin: 0 20px;
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
}

.table-detail td,
th {
    border: 1px solid #dedede;
    padding: 8px 7px;
}
</style>
<div class="pdf">
    <h4
        style="line-height:1.6; letter-spacing:3px; font-weight:bold; text-align:center; color:#606060; font-size:18px; margin-bottom:10px; ">
        <b>PT. JAWARA EDUKASIH INDONESIA</b>
    </h4>
    <hr style="border:1px dashed #606060;">
    <h6 style="text-align:center; color:#247df2;"><u>PURCHASE REQUEST</u></h6>
    <div class="box">
        <small>Purchase ID</small>
        <br>
        <b><?=$purchase['purchase_id'];?></b>
    </div>
    <table border="0" width="100%" class="tables">
        <tr>
            <td width="15%" valign="top">Division</td>
            <td width="3%">:</td>
            <td width="84%"><?=$purchase['purchase_department'];?></td>
        </tr>
        <tr>
            <td width="15%" valign="top">Request Status</td>
            <td width="3%">:</td>
            <td width="84%"><?=$purchase['purchase_statusrequest'];?></td>
        </tr>
        <tr>
            <td width="15%" valign="top">Request Date</td>
            <td width="3%">:</td>
            <td width="84%"><?=date('D, d M Y', strtotime($purchase['purchase_date']));?></td>
        </tr>
        <tr>
            <td width="15%" valign="top">Notes</td>
            <td width="3%">:</td>
            <td width="85%"><?=$purchase['purchase_notes'];?></td>
        </tr>
    </table>
    <br><br>
    <table width="100%" class="table-detail">
        <tr align="center"">
            <th width=" 3%">No</th>
            <th width="3%">Item Name</th>
            <th width="3%">Amount</th>
            <th width="3%">Price</th>
            <th width="3%">Total Price</th>
        </tr>
        <?php 
            $total = 0;
            $i=1;
            foreach($detail as $d): 
        ?>
        <tr align="center"">
            <td width=" 5%"><?=$i;?></td>
            <td width="40%" align="left"><?=$d['purchasedtl_good'];?></td>
            <td width="15%"><?=$d['purchasedtl_amount'];?></td>
            <td width="15%">Rp. <?=number_format($d['purchasedtl_priceperunit']);?></td>
            <td width="15%">Rp. <?=number_format($d['purchasedtl_total']);?></td>
        </tr>
        <?php
            $total += $d['purchasedtl_total'];
            $i++;
            endforeach;
        ?>
        <tr>
            <th colspan=4 align="center">
                Total
            </th>
            <th align="center">
                Rp. <?=number_format($total);?>
            </th>
        </tr>
    </table>

    <br><br>
    <table border=0 width="100%">
        <tr>
            <td width="30%" align="center" valign="bottom">
                Created by
                <br><br><br><br><br>
                (.....................................................)
            </td>
            <td width="40%"></td>
            <td width="30%" align="center" valign="top">
                Jakarta, <?=date('D d M Y');?><br>
                Approved by
                <br><br><br><br><br>
                Devi Kasih
            </td>
        </tr>
    </table>
    <br>
</div>