<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Edit Invoice
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/invoice/school/');?>"> Schools
                            Program</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Invoice</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-3">
        <div class="card shadow mb-3">
            <div class="card-body text-center">
                <img src="https://image.freepik.com/free-vector/man-with-headphones-microphone-with-computer_113065-136.jpg"
                    alt="client management" width="60%">
                <h5><?=$schprog['sch_name'];?></h5>
                <div class="text-info">
                    <h6><?=$schprog['prog_program'];?></h6>
                </div>
                <?php if($fixprog) { ?>
                Program Date <br>
                <small>
                    <?=date('d F Y', strtotime($fixprog['schprogfix_eventstartdate'])).' - '.date('d F Y', strtotime($fixprog['schprogfix_eventenddate']));?>
                </small>
                <?php } ?>
                <hr>
                <a href="<?=base_url('finance/invoice/school/view/'.$schprog['schprog_id']);?>"
                    class="btn btn-sm btn-secondary"><i class="fas fa-arrow-circle-left"></i>&nbsp; Back</a>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow mb-3">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; Edit Invoice </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-2">
                            Price :
                        </div>
                        <div class="col-md-10">
                            <input type="hidden" name="schprog_id" value="<?=$schprog['schprog_id'];?>">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="price" name="invsch_price" type="number"
                                            class="form-control form-control-sm" value="<?=$schprog['invsch_price'];?>">
                                    </div>
                                    <?=form_error('invsch_price', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            Participans :
                        </div>
                        <div class="col-md-10">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-sm">
                                        <input id="participans" name="invsch_participants" type="number"
                                            class="form-control form-control-sm"
                                            value="<?=$schprog['invsch_participants'];?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Students</span>
                                        </div>
                                    </div>
                                    <?=form_error('invsch_participants', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            Discount :
                        </div>
                        <div class="col-md-10">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="discount" name="invsch_disc" type="number"
                                            class="form-control form-control-sm" value="<?=$schprog['invsch_disc'];?>">
                                    </div>
                                    <?=form_error('invsch_disc', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            Total Price :
                        </div>
                        <div class="col-md-10">
                            <div class="form-group row">
                                <div class="col-md-5 mb-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="tPrice" name="invsch_totprice" type="number"
                                            class="form-control form-control-sm"
                                            value="<?=$schprog['invsch_totprice'];?>" readonly>
                                    </div>
                                    <?=form_error('invsch_totprice', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" id="tpWords" name="invsch_words"
                                        class="form-control form-control-sm" value="<?=$schprog['invsch_words'];?>">
                                    <?=form_error('invsch_words', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            Date :
                        </div>
                        <div class="col-md-10 mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <small>Invoice Date </small><br>
                                    <input name="invsch_date" type="date" class="form-control form-control-sm"
                                        value="<?=$schprog['invsch_date'];?>">
                                    <?=form_error('invsch_date', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-3">
                                    <small>Due Date</small><br>
                                    <input id="dueDate" name="invsch_duedate" type="date"
                                        class="form-control form-control-sm" value="<?=$schprog['invsch_duedate'];?>">
                                    <?=form_error('invsch_duedate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 mb-3">
                            Notes :
                        </div>
                        <div class="col-md-10 mb-3">
                            <textarea name="invsch_notes" class="form-control form-control-sm"
                                rows="6"><?=$schprog['invsch_notes'];?></textarea>
                            <?=form_error('invsch_notes', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-2 mb-3">
                            Terms & Condition :
                        </div>
                        <div class="col-md-10 mb-3">
                            <textarea name="invsch_tnc" class="form-control form-control-sm"
                                rows="6"><?=$schprog['invsch_tnc'];?></textarea>
                            <?=form_error('invsch_tnc', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-10 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url('assets/js/generate-number.js');?>"></script>
<script>
$('#price').keyup(function() {
    let pc = $('#price').val();
    let pr = $('#participans').val();
    let ds = $('#discount').val();
    let tp = (pc * pr) - ds;

    $('#tPrice').val(tp);
    $('#tpWords').val(capitalize(tp));
});

$('#participans').keyup(function() {
    let pc = $('#price').val();
    let pr = $('#participans').val();
    let ds = $('#discount').val();
    let tp = (pc * pr) - ds;

    $('#tPrice').val(tp);
    $('#tpWords').val(capitalize(tp));
});

$('#discount').keyup(function() {
    let pc = $('#price').val();
    let pr = $('#participans').val();
    let ds = $('#discount').val();
    let tp = (pc * pr) - ds;

    $('#tPrice').val(tp);
    $('#tpWords').val(capitalize(tp));
});
</script>