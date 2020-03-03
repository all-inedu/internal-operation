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
    <div class="col-md-4 mb-1">
        <div class="card shadow card-sticky" style="background:#FAFAFA;">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/edufair.jpg');?>" alt="client management" width="50%">
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <h5><?=$eduf['eduf_organizer'];?></h5>
                    <div class="text-info mb-2">
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$eduf['eduf_picmail'];?>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$eduf['eduf_picphone'];?>
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
                        <div class="col-md-4">
                            <i class="fas fa-users fa-fw"></i>&nbsp; Organizer :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="eduf_id" type="hidden" value="<?=$eduf['eduf_id'];?>">
                                    <input name="eduf_organizer" type="text" class="form-control form-control-sm"
                                        value="<?=$eduf['eduf_organizer'];?>">
                                    <?=form_error('eduf_organizer', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-map-marker fa-fw"></i>&nbsp; Place :
                        </div>
                        <div class="col-md-8 mb-3">
                            <textarea name="eduf_place"
                                class="form-control form-control-sm"><?=$eduf['eduf_place'];?></textarea>
                            <?=form_error('eduf_place', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-id-card fa-fw"></i>&nbsp; PIC Name :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <input name="eduf_picname" type="text" class="form-control form-control-sm"
                                        value="<?=$eduf['eduf_picname'];?>">
                                    <?=form_error('eduf_picname', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-mobile-alt fa-fw"></i>&nbsp; PIC Contact :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <input name="eduf_picphone" type="text" class="form-control form-control-sm"
                                        value="<?=$eduf['eduf_picphone'];?>">
                                    <?=form_error('eduf_picphone', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-envelope fa-fw"></i>&nbsp; PIC Email :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <input name="eduf_picmail" type="text" class="form-control form-control-sm"
                                        value="<?=$eduf['eduf_picmail'];?>">
                                    <?=form_error('eduf_picmail', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-calendar fa-fw"></i>&nbsp; Discuss :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <small>First Discuss :</small><br>
                                    <input name="eduf_firstdisdate" type="date" class="form-control form-control-sm"
                                        value="<?=$eduf['eduf_firstdisdate'];?>">
                                    <?=form_error('eduf_firstdisdate', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-4">
                                    <small>Last Discuss :</small><br>
                                    <input name="eduf_lastdisdate" type="date" class="form-control form-control-sm"
                                        value="<?=$eduf['eduf_lastdisdate'];?>">
                                    <?=form_error('eduf_lastdisdate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-calendar-plus fa-fw"></i>&nbsp; Event :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <small>Start Event :</small><br>
                                    <?php if($eduf['eduf_eventstartdate']) { ?>
                                    <input name="eduf_eventstartdate" type="datetime-local"
                                        class="form-control form-control-sm"
                                        value="<?=date('Y-m-d\TH:i:s', strtotime($eduf['eduf_eventstartdate']));?>">
                                    <?php } else { ?>
                                    <input name="eduf_eventstartdate" type="datetime-local"
                                        class="form-control form-control-sm" value="<?=date('Y-m-d\TH:i:s');?>">
                                    <?php } ?>
                                    <?=form_error('eduf_eventstartdate', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-6">
                                    <small>End Event :</small><br>
                                    <?php if($eduf['eduf_eventenddate']) { ?>
                                    <input name="eduf_eventenddate" type="datetime-local"
                                        class="form-control form-control-sm"
                                        value="<?=date('Y-m-d\TH:i:s', strtotime($eduf['eduf_eventenddate']));?>">
                                    <?php } else { ?>
                                    <input name="eduf_eventenddate" type="datetime-local"
                                        class="form-control form-control-sm" value="<?=date('Y-m-d\TH:i:s');?>">
                                    <?php } ?>
                                    <?=form_error('eduf_eventenddate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-sticky-note fa-fw"></i>&nbsp; Notes :
                        </div>
                        <div class="col-md-8 mb-3">
                            <textarea class="form-control form-control-sm" name="eduf_notes" id="notes"
                                rows="4"><?=$eduf['eduf_notes'];?></textarea>
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-question-circle fa-fw"></i>&nbsp; Status :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="eduf_status" id="status">
                                        <option data-placeholder="true"></option>
                                        <option value="0">Pending</option>
                                        <option value="2">Denied</option>
                                        <option value="1">Success</option>
                                    </select>
                                    <?=form_error('eduf_status', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-users-cog fa-fw"></i>&nbsp; PIC All-In Eduspace :
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="eduf_picallin[]" id="pic" multiple>
                                        <option data-placeholder="true"></option>
                                        <?php foreach($empl as $em) : ?>
                                        <option value="<?=$em['empl_firstname'].' '.$em['empl_lastname'];?>">
                                            <?=$em['empl_firstname'].' '.$em['empl_lastname'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                    <?=form_error('eduf_picallin', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
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
AS.set('<?=$eduf["eduf_status"];?>');

var PIC = new SlimSelect({
    select: '#pic',
    placeholder: 'Select PIC',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
var myJSON = '<?=$eduf["eduf_picallin"];?>';
if (myJSON) {
    var arr = myJSON.split(", ");
    PIC.set(arr)
}
</script>