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
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/invoice/student/');?>"> Schools
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
                    alt="client management" width="70%">
                <h5>School Name</h5>
                <h6>Program Name</h6>
                02 February 2020 - 14 February 2020
                <hr>
                <a href="<?=base_url('finance/invoice/school/view/2');?>" class="btn btn-sm btn-secondary"><i
                        class="fas fa-arrow-circle-left"></i>&nbsp; Back</a>
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
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="price" name="price" type="number"
                                            class="form-control form-control-sm">
                                        <?=form_error('price', '<small class="text-danger">', '</small>');?>
                                    </div>
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
                                        <input id="participans" name="participans" type="number"
                                            class="form-control form-control-sm" value="10">
                                        <?=form_error('participans', '<small class="text-danger">', '</small>');?>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Persons</span>
                                        </div>
                                    </div>
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
                                        <input id="discount" name="discount" type="number"
                                            class="form-control form-control-sm">
                                        <?=form_error('discount', '<small class="text-danger">', '</small>');?>
                                    </div>
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
                                        <input id="tPrice" name="tprice" type="number"
                                            class="form-control form-control-sm" readonly>
                                        <?=form_error('tprice', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <textarea id="tpWords" name="tpWords" class="form-control form-control-sm"
                                        rows="1"></textarea>
                                    <?=form_error('tpWords', '<small class="text-danger">', '</small>');?>
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
                                    <input name="date" type="date" class="form-control form-control-sm">
                                    <?=form_error('date', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-3">
                                    <small>Due Date</small><br>
                                    <input id="dueDate" name="dueDate" type="date" class="form-control form-control-sm">
                                    <?=form_error('dueDate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 mb-3">
                            Notes :
                        </div>
                        <div class="col-md-10 mb-3">
                            <textarea name="notes" class="form-control form-control-sm" rows="6"></textarea>
                            <?=form_error('notes', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-2 mb-3">
                            Terms & Condition :
                        </div>
                        <div class="col-md-10 mb-3">
                            <textarea name="tnc" class="form-control form-control-sm" rows="6"></textarea>
                            <?=form_error('tnc', '<small class="text-danger">', '</small>');?>
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