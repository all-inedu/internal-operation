<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt : <?=$rec['receipt_id'];?></title>
</head>

<body>
    <style>
    h4 {
        font-size: 25px !important;
        margin: 20px 20px;
    }

    .pdf {
        font-size: 12px !important;
        font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
        margin: 0 20px;
    }

    table {
        border-collapse: collapse;
    }

    p {
        margin: 0;
        line-height: 1.6;
    }

    table tr td,
    th {
        padding: 8px 7px;
        line-height: 15px;
    }

    .table-detail td,
    th {
        border: 1px solid #dedede;
    }
    </style>
    <br><br><br><br>

    <table>
        <tr>
            <td>
                <h4 style="line-height:1.6; letter-spacing:2px; color:#bcbaba; font-size:18px; margin-bottom:10px; ">
                    PAYMENT
                    RECEIPT</h4>
            </td>
        </tr>
    </table>

    <div class="pdf">
        <div style="height:120px;">
            <table border="0" width="100%">
                <tr>
                    <td width="50%" valign="top">
                        <p>
                            PT. Jawara Edukasih Indonesia</b><br>
                            JL. Panjang No 36 <br>
                            Jakarta Barat 11530
                        </p>
                    </td>

                    <td valign="top" width="50%" style="margin:0;">
                        <table border=0 width="100%">
                            <tr>
                                <td width="20%" valign="top" align="right">
                                    Received from :
                                </td>
                                <td>
                                    <?=$rec['st_firstname'].' '.$rec['st_lastname'];?> <br>
                                    <?=$rec['st_address'];?>
                                    <?=$rec['st_city'].' '.$rec['st_state'];?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <table>
            <tr>
                <td>
                    Receipt No. <?=$rec['receipt_id'];?>
                </td>
            </tr>
        </table>

        <table width="100%" class="table-detail" style="padding:8px 5px;">
            <tr align="center" style="background:#008080; color:#fff;">
                <th width="30%">Payment Method</th>
                <th width="40%">Cheque No.</th>
                <th width="30%">Amount</th>
            </tr>
            <tr>
                <td align="center"><?=$rec['receipt_mtd'];?></td>
                <td align="center"><?=$rec['receipt_cheque'];?></td>
                <td align="right">$ <?=number_format($rec['receipt_amountusd']);?></td>
            </tr>
        </table>

        <table width="100%" class="table-detail" style="padding:8px 5px;">
            <tr align="center" style="background:#008080; color:#fff;">
                <th width="3%">No</th>
                <th width="50%">Description</th>
                <th width="23%">Price</th>
                <th>Total</th>
            </tr>
            <?php 
                $cat = $rec['inv_category'];
                $invdtl_id = $rec['invdtl_id'];
                if($invdtl_id==0) {
            ?>
            <tr>
                <td valign="top" align="center">1</td>
                <td valign="top" style="padding-bottom:50px;">
                    <div style="height:45px">
                        <b><?=$rec['prog_program'];?></b><br>
                    </div>

                    <?php if($rec['inv_earlybirdusd']) { ?>
                    <i>Early Bird</i> <br>
                    <?php } ?>

                    <?php if($rec['inv_discusd']) { ?>
                    <i>Discount</i> <br>
                    <?php } ?>

                </td>
                <td valign="top" align="right">
                    <div style="height:45px">
                        $ <?=number_format($rec['inv_priceusd']);?>
                    </div>
                </td>
                <td valign="top" align="right">
                    <div style="height:45px">
                        $ <?=number_format($rec['inv_priceusd']);?>
                    </div>
                    <?php if($rec['inv_earlybirdusd']) { ?>
                    ( $ <?=number_format($rec['inv_earlybirdusd']);?> ) <br>
                    <?php } ?>

                    <?php if($rec['inv_discusd']) { ?>
                    ( $ <?=number_format($rec['inv_discusd']);?> ) <br>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b>Total</b></td>
                <td valign="top" align="right">
                    <b>$ <?=number_format($rec['inv_totprusd']);?></b>
                </td>
            </tr>
            <?php } else { ?>
            <tr>
                <td valign="top" align="center">1</td>
                <td valign="top" style="padding-bottom:50px;">
                    <div style="height:45px">
                        <b><?=$rec['prog_program'];?></b> <br>
                        <?=$invdtl['invdtl_statusname'];?>
                    </div>
                </td>
                <td valign="top" align="right">
                    <div style="height:45px">
                        $ <?=number_format($invdtl['invdtl_amountusd']);?>
                    </div>
                </td>
                <td valign="top" align="right">
                    <div style="height:45px">
                        $ <?=number_format($invdtl['invdtl_amountusd']);?>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b>Total</b></td>
                <td valign="top" align="right">
                    <b>$ <?=number_format($invdtl['invdtl_amountusd']);?></b>
                </td>
            </tr>
            <?php } ?>
        </table>
        <table>
            <tr>
                <td>
                    <b style="letter-spacing:0.7px;">Total Amount : <i><?=$rec['receipt_wordsusd'];?></i> </b>
                    <br><br>
                </td>
            </tr>
        </table>
        <br><br>
        <table border=0 width="100%">
            <tr>
                <td width="60%" valign="top">

                </td>
                <td width="40%" align="center" valign="top">
                    Jakarta, <?=date('d F Y', strtotime($rec['receipt_date']));?>
                    <br><br><br><br><br><br><br>
                    Nicholas Hendra Soepriatna <br>
                    Director
                </td>
            </tr>
        </table>
        <br><br><br>
        <table width="100%">
            <tr>
                <td width="100%" align="center">
                    Thank You for Your Business
                </td>
            </tr>
        </table>
    </div>

</body>

</html>