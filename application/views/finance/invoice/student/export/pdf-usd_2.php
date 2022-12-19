<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice : <?=$inv['inv_id'];?> - PDF</title>
    <link rel="icon" href="<?=base_url('assets/img/bigdata.ico');?>" type="image/gif" sizes="16x16">
</head>

<body>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Archivo+Black&display=swap');

    h4 {
        font-size: 25px !important;
        font-family: 'Archivo Black', sans-serif;
        letter-spacing: 10px !important;
    }

    p {
        margin: 0;
        line-height: 1.5;
    }

    .pdf {
        font-size: 11px !important;
        font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
        margin: 0 20px;
    }

    table {
        border-collapse: collapse;
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
    <div class=" pdf">
        <h4
            style="line-height:1.6; letter-spacing:3px; font-weight:bold; text-align:center; color:#247df2; font-size:18px; margin-bottom:10px; ">
            <u><b>INVOICE</b></u>
        </h4>
        <br><br>
        <div style="height:150px;">
            <table border="0" width="100%">
                <tr>
                    <td width="60%">
                        <table width="100%" style="padding:0px; margin-left:-10px;">
                            <tr>
                                <td width="15%" valign="top">From : </td>
                                <td width="85%"><b>PT. Jawara Edukasih Indonesia</b><br>
                                    Jl Jeruk Kembar Blok Q9, No. 15 <br>
                                    Srengseng, Kembangan, Jakarta Barat 11630
                                    <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">To : </td>
                                <td><b>
                                        <?=$inv['st_firstname'].' '.$inv['st_lastname'];?>
                                    </b><br>
                                    <?=$inv['st_address'];?>
                                    <?=$inv['st_city'].' '.$inv['st_state'];?>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td valign="top" width="45%">
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

        <table width="100%" class="table-detail" style="padding:8px 5px;">
            <tr align="center">
                <th width="5%">No</th>
                <th width="55%">Description</th>
                <th width="20%">Price</th>
                <th width="20%">Total</th>
            </tr>
            <tr>
                <td valign="top" align="center">1</td>
                <td valign="top" style="padding-bottom:50px;">
                    <div style="height:35px;">
                        <b>
                            <?php 
                                if($inv['prog_sub']=='') {
                                    echo $inv['prog_program'];
                                } else {
                                    echo $inv['prog_sub'].': '.$inv['prog_program'];
                                }
                            ?>
                            <i><?=$inv['inv_notes'];?></i>
                        </b>
                    </div>

                    <div style="margin-top:5px;">

                        <?php if($inv['inv_earlybirdusd']) {?>
                        <i>Early Bird</i> <br>
                        <?php } ?>
                        <?php if($inv['inv_discusd']) {?>
                        <i>Discount</i><br>
                        <?php } ?>

                    </div>
                </td>
                <td valign="top" align="center">
                    $<?=number_format($inv['inv_priceusd']);?>
                </td>
                <?php 
                    if(!empty($inv['inv_earlybirdusd'])) {
                        $early = "$".number_format($inv['inv_earlybirdusd']);
                    } else {
                        $early = "";
                    }

                    if(!empty($inv['inv_discusd'])) {
                        $disc = "$".number_format($inv['inv_discusd']);
                    } else {
                        $disc = "";
                    }
                ?>
                <td valign="top" align="center">
                    <div style="height:35px;">
                        $<?=number_format($inv['inv_priceusd']);?>
                    </div>
                    <div style="margin-top:5px;">
                        <?=$early;?> <br>
                        <?=$disc;?><br>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b>Total</b></td>
                <td valign="middle" align="center">
                    <b>$<?=number_format($inv['inv_totprusd']);?></b>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td>
                    <b style="letter-spacing:0.7px;"><i>Total Amount : <?=$inv['inv_wordsusd'];?></i> </b>
                    <br><br>

                    <?php if($inv['inv_paymentmethod']=="Installment") { ?>
                    Terms of Payment :
                    <div style="margin-left:2px;">
                        <?php foreach ($invdtl as $id) : ?>
                        -
                        <?=$id['invdtl_statusname'].' '.$id['invdtl_percentage'].'% on '.date('d F Y', strtotime($id['invdtl_duedate'])).' : $'.number_format($id['invdtl_amountusd']) ;?>
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
                    <table border="0" style="padding:0px; margin-left:-6px;">
                        <tr>
                            <td>
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
                    <br><br><br><br><br><br>
                    Nicholas Hendra Soepriatna <br>
                    Director
                </td>
            </tr>
        </table>
    </div>
    <img src="<?=base_url('assets/img/footer-allin.png');?>" width="100%" style="bottom:60px; position:absolute;">
</body>

</html>