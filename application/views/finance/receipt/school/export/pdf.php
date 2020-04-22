<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt : <?=$rec['receipt_id'];?></title>
    <link rel="icon" href="<?=base_url('assets/img/bigdata.ico');?>" type="image/gif" sizes="16x16">
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
    <br><br>
    <img src="<?=base_url('assets/img/header-allin.png');?>" width="114%" style="margin:-83px -50px -30px -50px;">
    <img src="<?=base_url('assets/img/confidential.png');?>" width="85%"
        style="position:absolute; left:8%; top:25%; z-index:-999; opacity:0.04;">
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

                    <td valign="top">
                        <table border=0>
                            <tr>
                                <td valign="top" width="10px">
                                    Received from :
                                </td>
                                <td>
                                    <?=$rec['sch_name'];?>
                                    <?=$rec['sch_location'];?>
                                    <?=$rec['sch_city'];?>
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
                <td align="center">Rp. <?=number_format($rec['receipt_amount']);?></td>
            </tr>
        </table>

        <table width="100%" class="table-detail" style="padding:8px 5px;">
            <tr align="center" style="background:#008080; color:#fff;">
                <th width="8%">No</th>
                <th width="44%">Payment For</th>
                <th width="24%">Price/Students</th>
                <th width="24%">Total</th>
            </tr>
            <tr>
                <td valign="top" align="center">1</td>
                <td valign="top" style="padding-bottom:50px;">
                    <b><?=$rec['prog_program'];?></b>
                    for <?=$rec['invsch_participants'];?> students
                    <i><?=$rec['invsch_notes'];?></i>
                </td>
                <td valign="top" align="center">
                    Rp. <?=number_format($rec['invsch_price']);?>
                </td>
                <td valign="top" align="center">
                    Rp. <?=number_format($rec['invsch_totprice']);?>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b>Total</b></td>
                <td valign="top" align="center">
                    <b>Rp. <?=number_format($rec['invsch_totprice']);?></b>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <b style="letter-spacing:0.7px;">Total Amount : <i><?=$rec['receipt_words'];?></i> </b>
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
    <img src="<?=base_url('assets/img/footer-allin.png');?>" width="100%" style="bottom:60px; position:absolute;">
</body>

</html>