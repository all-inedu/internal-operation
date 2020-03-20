<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice : <?=$schprog['invsch_id'];?> - PDF</title>
</head>

<body>
    <style>
    h4 {
        font-size: 25px !important;
    }

    p {
        margin: 0;
        line-height: 1.6;
    }

    .pdf {
        font-size: 12px !important;
        font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
        margin: 0 20px;
    }

    table {
        border-collapse: collapse;
    }

    table tr td,
    th {
        padding: 8px 7px;
        line-height: 19px;
    }

    .table-detail td,
    th {
        border: 1px solid #dedede;
    }
    </style>
    <br><br><br>
    <div class="pdf">
        <h4
            style="line-height:1.6; letter-spacing:3px; font-weight:bold; text-align:center; color:#247df2; font-size:18px; margin-bottom:10px; ">
            <u><b>INVOICE</b></u>
        </h4>
        <br><br>
        <div style="height:190px;">
            <table border="0" width="100%">
                <tr>
                    <td width="60%">
                        <table width="100%">
                            <tr>
                                <td width="15%" valign="top">From : </td>
                                <td width="85%"><b>PT. Jawara Edukasih Indonesia</b><br>
                                    JL. Panjang No 36 <br>
                                    Jakarta Barat 11530
                                    <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">To : </td>
                                <td>
                                    <b><?=$schprog['sch_name'];?></b><br>
                                    <?=$schprog['sch_location'];?>
                                    <?=$schprog['sch_city'];?>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td valign="top" width="40%">
                        <table border=0>
                            <tr>
                                <td width="40%">
                                    Invoice No<br>
                                    Date<br>
                                    Due Date<br>
                                </td>
                                <td>
                                    : &nbsp; <?=$schprog['invsch_id'];?> <br>
                                    : &nbsp; <?=date('d F Y', strtotime($schprog['invsch_date']));?> <br>
                                    : &nbsp; <?=date('d F Y', strtotime($schprog['invsch_duedate']));?> <br>
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
                    Please process payment to PT Jawara Edukasih Indonesia for the following services rendered :
                </td>
            </tr>
        </table>
        <table width="100%" class="table-detail" style="padding:8px 5px;">
            <tr align="center">
                <th width="8%">No</th>
                <th width="44%">Description</th>
                <th width="24%">Price (IDR)</th>
                <th width="24%">Total (IDR)</th>
            </tr>
            <tr>
                <td valign="top" align="center">1</td>
                <td valign="top" style="padding-bottom:30px;">
                    <div style="height:70px;">
                        <b><?=$schprog['prog_program'];?></b> <br>
                        <i><?=$schprog['invsch_participants'];?> students</i>
                    </div>
                    <?php if($schprog['invsch_disc']!=0) { ?>
                    <i>Discount</i>
                    <?php } ?>
                    <?=$schprog['invsch_notes'];?>
                </td>
                <td valign="top" align="right">
                    <div style="height:70px;">
                        Rp. <?=number_format($schprog['invsch_price']);?>
                    </div>
                </td>
                <td valign="top" align="right">
                    <div style="height:70px;">
                        Rp. <?=number_format($schprog['invsch_price']*$schprog['invsch_participants']);?>
                    </div>
                    <?php if($schprog['invsch_disc']!=0) { ?>
                    ( Rp. <?=number_format($schprog['invsch_disc']);?> )
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b>Total</b></td>
                <td valign="top" align="right">
                    Rp. <?=number_format($schprog['invsch_totprice']);?>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td>
                    <b style="letter-spacing:0.7px;">Total Amount : <i><?=$schprog['invsch_words'];?></i> </b>
                    <br><br>
                    <?php if($schprog['invsch_tnc']) { ?>
                    Terms & Conditions :
                    <i>Rp. <?=$schprog['invsch_tnc'];?></i>
                    <?php } ?>

                </td>
            </tr>
        </table>
        <br><br>
        <table border=0 width="100%">
            <tr>
                <td width="60%" valign="top">
                    <b>Bank transfer details :</b>
                    <table border="0">
                        <tr>
                            <td width="22%">
                                Beneficiancy <br>
                                Bank <br>
                                A/C No. <br>
                                Branch <br>
                            </td>
                            <td width="78%">
                                : PT. Jawara Edukasih Indonesia <br>
                                : BCA <br>
                                : 2483016611 <br>
                                : KCP Pasar Kebayoran Lama Jakarta Selatan
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="40%" align="center" valign="top">
                    PT. Jawara Edukasih Indonesia
                    <br><br><br><br><br>
                    Nicholas Hendra Soepriatna <br>
                    Director
                </td>
            </tr>
        </table>
    </div>

</body>

</html>