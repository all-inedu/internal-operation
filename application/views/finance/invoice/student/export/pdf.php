<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice : <?=$inv['inv_id'];?> - PDF</title>
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
                        <table width="110%">
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
                                <td><b>
                                        <?=$inv['st_firstname'].' '.$inv['st_lastname'];?>
                                    </b><br>
                                    <?=$inv['st_address'];?>
                                    <?=$inv['st_state'];?>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td valign="top" width="50%">
                        <table border=0>
                            <tr>
                                <td>
                                    Invoice No<br>
                                    Date<br>
                                    Due Date<br>
                                </td>
                                <td>
                                    : &nbsp; <?=$inv['inv_id'];?><br>
                                    : &nbsp; <?=date('d F Y', strtotime($inv['inv_date']));?> <br>
                                    : &nbsp; <?=date('d F Y', strtotime($inv['inv_duedate']));?> <br>
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

        <?php if($inv['inv_category']=="usd") { ?>
        <table width="100%" class="table-detail" style="padding:8px 5px;">
            <tr align="center">
                <th width="2%">No</th>
                <th width="25%">Description</th>
                <th width="10%">Price (IDR)</th>
                <th width="15%">Total (IDR)</th>
            </tr>
            <tr>
                <td valign="top" align="center">1</td>
                <td valign="top" style="padding-bottom:50px;">
                    <div style="height:35px;">
                        <b><?=$inv['prog_program'];?> ($<?=number_format($inv['inv_priceusd']);?>)</b>
                    </div>

                    <div style="margin-top:20px;">
                        <?php if($inv['inv_earlybirdusd']) {?>
                        <i>Early Bird ($<?=number_format($inv['inv_earlybirdusd']);?>)</i> <br>
                        <?php } ?>

                        <?php if($inv['inv_discusd']) {?>
                        <i>Discount ($<?=number_format($inv['inv_discusd']);?>)</i><br>
                        <?php } ?>

                        <i><?=$inv['inv_notes'];?></i>
                    </div>
                </td>
                <td valign="top" align="right">
                    Rp. <?=number_format($inv['inv_priceidr']);?>
                </td>
                <td valign="top" align="right">
                    <div style="height:35px;">
                        Rp. <?=number_format($inv['inv_priceidr']);?>
                    </div>

                    <div style="margin-top:20px;">
                        <?php if(!empty($inv['inv_earlybirdidr'])) {?>
                        (Rp. <?=number_format($inv['inv_earlybirdidr']);?>) <br>
                        <?php } if(!empty($inv['inv_discidr'])) {?>
                        (Rp. <?=number_format($inv['inv_discidr']);?>) <br>
                        <?php } ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b>Total</b></td>
                <td valign="top" align="right">
                    <b>Rp. <?=number_format($inv['inv_totpridr']);?></b>
                </td>
            </tr>
        </table>
        <?php } else if($inv['inv_category']=="idr") { ?>
        <table width="100%" class="table-detail" style="padding:8px 5px;">
            <tr align="center">
                <th width="5%">No</th>
                <th width="45%">Description</th>
                <th>Price (IDR)</th>
                <th width="15%">Total (IDR)</th>
            </tr>
            <tr>
                <td valign="top" align="center">1</td>
                <td valign="top" style="padding-bottom:50px;">
                    <div style="height:35px;">
                        <b><?=$inv['prog_program'];?></b>
                    </div>
                    <div style="margin-top:20px;">
                        <?php if($inv['inv_discidr']) {?>
                        <i>Discount</i><br>
                        <?php } ?>

                        <i><?=$inv['inv_notes'];?></i>
                    </div>
                </td>

                <td valign="top" align="right">
                    <div style="height:35px;">
                        Rp. <?=number_format($inv['inv_priceidr']);?>
                    </div>
                </td>

                <td valign="top" align="right">
                    <div style="height:35px;">
                        Rp. <?=number_format($inv['inv_priceidr']);?>
                    </div>
                    <div style="margin-top:20px;">
                        <?php if(!empty($inv['inv_discidr'])) {?>
                        (Rp. <?=number_format($inv['inv_discidr']);?>) <br>
                        <?php } ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b>Total</b></td>
                <td valign="top" align="right">
                    <b>Rp. <?=number_format($inv['inv_totpridr']);?></b>
                </td>
            </tr>
        </table>
        <?php } else if($inv['inv_category']=="session") {?>
        <table width="100%" class="table-detail" style="padding:8px 5px;">
            <tr align="center">
                <th width="5%">No</th>
                <th width="45%">Description</th>
                <th>Hours</th>
                <th width="10%">Price (IDR)</th>
                <th width="10%">Total (IDR)</th>
            </tr>
            <tr>
                <td valign="top" align="center">1</td>
                <td valign="top" style="padding-bottom:50px;">
                    <div style="height:45px;">
                        <b><?=$inv['prog_program'];?></b> <br>
                        <i><?=$inv['inv_session'];?> sessions</i>
                        <i><?=$inv['inv_notes'];?></i>
                    </div>
                    <div style="margin-top:20px;">
                        <?php if($inv['inv_discidr']) {?>
                        <i>Discount</i><br>
                        <?php } ?>
                    </div>
                </td>
                <td valign="top" align="center">
                    <div style="height:45px;">
                        <?=$inv['inv_duration']/60;?>
                    </div>
                </td>
                <td valign="top" align="right">
                    <div style="height:35px;">
                        Rp. <?=number_format($inv['inv_priceidr']);?>
                    </div>
                </td>
                <td valign="top" align="right">
                    <div style="height:35px;">
                        Rp. <?=number_format($inv['inv_totpridr']);?>
                    </div>
                    <div style="margin-top:20px;">
                        <?php if(!empty($inv['inv_discidr'])) {?>
                        (Rp. <?=number_format($inv['inv_discidr']);?>) <br>
                        <?php } ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4" align="right"><b>Total</b></td>
                <td valign="top" align="right">
                    <b>Rp. <?=number_format($inv['inv_totpridr']);?></b>
                </td>
            </tr>
        </table>
        <?php } ?>


        <table>
            <tr>
                <td>
                    <b style="letter-spacing:0.7px;"><i>Total Amount : <?=$inv['inv_words'];?></i> </b>
                    <br><br>

                    <?php if($inv['inv_paymentmethod']=="Installment") { ?>
                    Terms of Payment :
                    <div style="margin-left:2px;">
                        <?php foreach ($invdtl as $id) : ?>
                        -
                        <?=$id['invdtl_statusname'].' '.$id['invdtl_percentage'].'% on '.date('d F Y', strtotime($id['invdtl_duedate'])).' : Rp. '.number_format($id['invdtl_amountidr']) ;?>
                        <br>
                        <?php endforeach; ?>
                    </div>
                    <br>
                    <?php } ?>

                    <?php if($inv['inv_tnc']) {?>
                    Terms & Conditions :
                    <div style="margin-left:2px;">
                        <?=$inv['inv_tnc'];?>
                    </div>
                    <?php } ?>
                </td>
            </tr>
        </table>
        <br><br>
        <table border=0 width="100%">
            <tr>
                <td width="60%" valign="top">
                    <b>Bank transfer details :</b>
                    <table border="0" width="100%" style="padding:3px;">
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