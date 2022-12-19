<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; PPH Final
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">PPH Final</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-3 mb-2">
        <div class="card shadow card-sticky">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Month
                                </label>
                                <select id="months" name="month">
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
                                <select id="years" name="year">
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
                        <?php if(!empty($receipt)) { ?>
                        <div class="line" style="margin-top:15px; margin-bottom:10px;"></div>
                        <div class="col-md-4 mt-2 pt-1">
                            PPh 4(2) :
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="input-group input-group-sm">
                                <input type="text" placeholder="0.5" id="pph" class="form-control form-control-sm">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">%</span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <?php if(empty($receipt)) { ?>
                <h6 class="text-center mt-3 mb-3">Data not found!</h6>
                <?php } else { ?>
                <h3>PPH Final</h3>
                <div class="float-right" style="margin-top:-40px;">
                    <a href="<?=base_url('finance/pph-final/pdf/'.$m.'/'.$y.'/');?>" class="btn btn-outline-info btn-sm"
                        id="print" target="_blank">Print Pdf</a>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center bg-secondary text-white">
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
                        } else if($cat==2) {
                            $inv = $this->invsch->showInvId($rec['inv_id']);
                        } else if($cat==3) {
                            $inv = $this->partners->showId($rec['pt_id']);
                        }
                    ?>
                        <tr>
                            <td><?=$rec['receipt_id'];?></td>
                            <td>
                                <?php if($inv!=null && $cat==1) { ?>
                                <?=$inv['st_firstname'].' '.$inv['st_lastname'];?>
                                <?php } else if($inv!=null && $cat==2) { ?>
                                <?=$inv['sch_name'];?>
                                <?php } else if($inv!=null && $cat==3) { ?>
                                <?=$inv['pt_name'];?>
                                <?php } ?>
                            </td>
                            <td>
                            <?php if($inv!=null && $cat!=3) { ?>
                            <?=$inv['prog_program'];?>
                            <?php } else { ?>
                            <?=$rec['receipt_notes'];?>
                            <?php } ?>
                            </td>
                            <td class="text-center">
                                <?=isset($invdtl) ? $invdtl['invdtl_statusname']:'';?>
                                <?php if($rec['receipt_status']==2) { echo "<br><small>Cancel/Refund</small>"; }?>
                            </td>
                            <td class="text-center">Rp.
                                <?=number_format($rec['receipt_amount']-$rec['receipt_refund']);?></td>
                        </tr>
                        <?php
                            endforeach; 
                            $pph = (0.5/100) * $totrec;
                        ?>
                        <tr class="text-right">
                            <th colspan=4>Total</th>
                            <th class="text-center">
                                Rp. <?=number_format($totrec);?>
                                <input type="hidden" id="totrec" value="<?=$totrec;?>">
                            </th>
                        </tr>
                        <tr class="text-right" style="background:#FFFF00;">
                            <th colspan=4>PPh 4(2) Periode <?=date('F', mktime(0, 0, 0, $m, 10)).' '.$y;?></th>
                            <th class="text-center">
                                Rp. <span id="totpph"></span>
                            </th>
                        </tr>
                    </table>
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
    select: '#months',
    placeholder: 'Select month ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
mt.set("<?=$m;?>")

var yr = new SlimSelect({
    select: '#years',
    placeholder: 'Select ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
yr.set("<?=$y;?>")
</script>

<?php if(!empty($receipt)) { ?>
<script>
let pphfinal = parseInt("<?=$pph;?>");

$("#totpph").html(pphfinal.toLocaleString());


$("#pph").keyup(function() {
    let pph = $(this).val();
    let totrec = $("#totrec").val();

    let totpph = pph / 100 * totrec;
    let fixtot = parseInt(totpph);
    $("#totpph").html(fixtot.toLocaleString());

    $("#print").attr("href", 'pdf/<?=$m."/".$y."/";?>' + pph + '/')
});
</script>
<?php } ?>