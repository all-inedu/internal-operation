<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Edufair
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/edufair/');?>">Edufair</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>

<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card shadow card-sticky" style="background:#FAFAFA;">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/edufair.jpg');?>" alt="client management" width="80%">
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <h5>Organizer</h5>
                    <div class="text-info">
                        <p><i class="fas fa-envelope text-danger"></i>&nbsp; pic@gmail.com <br>
                            <i class="fas fa-phone text-danger"></i>&nbsp; 081231232xxx
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post">
                    <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Edufair
                        <div class="float-right">
                            <a href="<?=base_url('bizdev/edufair/view/');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-users fa-fw"></i>&nbsp; Organizer :
                        </div>
                        <div class="col-md-8 mb-3">
                            <input name="organizer" type="text" class="form-control form-control-sm"
                                placeholder="Organizer Name">
                            <?=form_error('organizer', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-id-card fa-fw"></i>&nbsp; PIC Name :
                        </div>
                        <div class="col-md-8 mb-3">
                            <input name="picName" type="text" class="form-control form-control-sm"
                                placeholder="PIC Name">
                            <?=form_error('picName', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-mobile-alt fa-fw"></i>&nbsp; PIC Contact :
                        </div>
                        <div class="col-md-8 mb-3">
                            <input name="picContact" type="text" class="form-control form-control-sm"
                                placeholder="PIC Contact">
                            <?=form_error('picContact', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-envelope fa-fw"></i>&nbsp; PIC Email :
                        </div>
                        <div class="col-md-8 mb-3">
                            <input name="picEmail" type="text" class="form-control form-control-sm"
                                placeholder="PIC Email">
                            <?=form_error('picEmail', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-calendar fa-fw"></i>&nbsp; Discuss :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <small>First Discuss :</small><br>
                                    <input name="firstDiscuss" type="date" class="form-control form-control-sm"
                                        placeholder="">
                                    <?=form_error('firstDiscuss', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-4">
                                    <small>Last Discuss :</small><br>
                                    <input name="lastDiscuss" type="date" class="form-control form-control-sm"
                                        placeholder="">
                                    <?=form_error('lastDiscuss', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-calendar-plus fa-fw"></i>&nbsp; Event :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <small>Start Event :</small><br>
                                    <input name="startEvent" type="date" class="form-control form-control-sm"
                                        placeholder="">
                                    <?=form_error('startEvent', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-4">
                                    <small>End Event :</small><br>
                                    <input name="endEvent" type="date" class="form-control form-control-sm"
                                        placeholder="">
                                    <?=form_error('endEvent', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-sticky-note fa-fw"></i>&nbsp; Notes :
                        </div>
                        <div class="col-md-8 mb-3">
                            <textarea class="form-control form-control-sm" name="notes" id="notes" rows="4"></textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-question-circle fa-fw"></i>&nbsp; Status :
                        </div>
                        <div class="col-md-8 mb-3">
                            <select name="status" id="status">
                                <option data-placeholder="true"></option>
                                <option value="Pending">Pending</option>
                                <option value="Denied">Denied</option>
                                <option value="Success">Success</option>
                            </select>
                            <?=form_error('status', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-users-cog fa-fw"></i>&nbsp; PIC All-In Eduspace :
                        </div>
                        <div class="col-md-8 mb-3">
                            <textarea class="form-control form-control-sm" name="notes" id="notes" rows="4"></textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-clipboard fa-fw"></i>&nbsp; Review :
                        </div>
                        <div class="col-md-8 mb-3">
                            <textarea class="form-control form-control-sm" name="notes" id="notes" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
var AS = new SlimSelect({
    select: '#status',
    placeholder: 'Select status',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
</script>