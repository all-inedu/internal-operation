<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPH Final <?=date('F', mktime(0, 0, 0, $m, 10)).' '.$y;?></title>
    <style>
    h3,
    h4 {
        margin: 5px;
    }

    hr {
        margin-bottom: 20px;
    }

    .table {
        border-collapse: collapse;
        font-size: 12px;
    }

    table tr td,
    th {
        padding: 8px 7px;
        line-height: 19px;
    }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td align="center">
                <h3>PT. JAWARA EDUKASIH INDONESIA</h3>
                <h4>PPh 4(2) Periode <?=date('F', mktime(0, 0, 0, $m, 10)).' '.$y;?></h4>
            </td>
        </tr>
    </table>
    <hr>
    <table class="table" border=1 width="100%">
        <tr align="center">
            <th>Receipt No</th>
            <th>Name of Client/School</th>
            <th>Program Name</th>
            <th>Notes</th>
            <th>Amount</th>
        </tr>
        <?php 
                        $totrec = 0;
                        foreach ($receipt as $rec) :
                        $invdtl = $this->invdtl->showDetailId($rec['invdtl_id']);
                        $totrec += $rec['receipt_amount']-$rec['receipt_refund'];

                        $cat = $rec['receipt_cat'];
                        if($cat==1) {
                            $inv = $this->inv->showInvId($rec['inv_id']);
                        } else {
                            $inv = $this->invsch->showInvId($rec['inv_id']);
                        }
                    ?>
        <tr>
            <td align="center"><?=$rec['receipt_id'];?></td>
            <td>
                <?php if($cat==1) { ?>
                <?=$inv['st_firstname'].' '.$inv['st_lastname'];?>
                <?php } else { ?>
                <?=$inv['sch_name'];?>
                <?php } ?>
            </td>
            <td><?=$inv['prog_program'];?></td>
            <td align="center">
                <?=$invdtl['invdtl_statusname'];?>
                <?php if($rec['receipt_status']==2) { echo "<br><small>Cancel/Refund</small>"; }?>
            </td>
            <td align="center">Rp.
                <?=number_format($rec['receipt_amount']-$rec['receipt_refund']);?></td>
        </tr>
        <?php
                            endforeach; 
                            $pph = ($x/100) * $totrec;
                        ?>
        <tr align="right">
            <th colspan=4>Total</th>
            <th align="center">
                Rp. <?=number_format($totrec);?>
                <input type="hidden" id="totrec" value="<?=$totrec;?>">
            </th>
        </tr>
        <tr align="right" style="background:#FFFF00;">
            <th colspan=4>PPh 4(2) Periode <?=date('F', mktime(0, 0, 0, $m, 10)).' '.$y;?></th>
            <th align="center">
                Rp. <?=number_format($pph);?>
            </th>
        </tr>
    </table>
</body>

</html>