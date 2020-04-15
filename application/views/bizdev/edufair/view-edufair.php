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
                    <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>

<div class="row">
    <div class="col-md-4 mb-1">
        <div class="card shadow" style="background:#FAFAFA;">
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
                    <a href="<?=base_url('bizdev/edufair/edit/'.$eduf['eduf_id']);?>" class="btn btn-sm btn-info"><i
                            class="fas fa-pencil-alt"></i>&nbsp; Edit</a>

                    <a href="<?=base_url('bizdev/edufair/delete/'.$eduf['eduf_id']);?>"
                        class="delete-button btn btn-sm btn-danger ml-2" data-message="edufair"><i
                            class="fas fa-trash"></i>&nbsp; Delete</a>
                </div>
            </div>
        </div>
        <?php if($eduf['eduf_status']==1){ ?>
        <div class="card shadow card-sticky mt-2" style="background:#FAFAFA;">
            <div class="card-body text-center">
                <h5><i class="icofont-user-alt-5"></i>&nbsp; Students</h5>
                <hr class="m-0 mb-3">
                <h6>
                    <div class="row">
                        <div class="col-md-8 mb-1 text-left">
                            <i class="icofont-arrow-right"></i> Prospective Client
                        </div>
                        <div class="col-md-4 mb-2 text-right">
                            <?=$prosp;?>
                        </div>
                        <div class="col-md-8 mb-1 text-left">
                            <i class="icofont-arrow-right"></i> Potential Client
                        </div>
                        <div class="col-md-4 mb-2 text-right">
                            <?=$pot;?>
                        </div>
                        <div class="col-md-8 mb-1 text-left">
                            <i class="icofont-arrow-right"></i> Current Client
                        </div>
                        <div class="col-md-4 mb-2 text-right">
                            <?=$curr;?>
                        </div>
                        <div class="col-md-8 mb-1 text-left">
                            <i class="icofont-arrow-right"></i> Completed Client
                        </div>
                        <div class="col-md-4 mb-2 text-right">
                            <?=$comp;?>
                        </div>
                    </div>
                </h6>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post">
                    <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Edufair
                        <div class="float-right">
                            <a href="<?=base_url('bizdev/edufair/');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-users fa-fw"></i>&nbsp; Organizer :
                        </div>
                        <div class="col-md-8 mb-1">
                            <?=$eduf['eduf_organizer'];?>
                            <hr class="mt-1">
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-map-marker fa-fw"></i>&nbsp; Place :
                        </div>
                        <div class="col-md-8 mb-1">
                            <?=$eduf['eduf_place'];?>
                            <hr class="mt-1">
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-id-card fa-fw"></i>&nbsp; PIC Name :
                        </div>
                        <div class="col-md-8 mb-1">
                            <?=$eduf['eduf_picname'];?>
                            <hr class="mt-1">
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-mobile-alt fa-fw"></i>&nbsp; PIC Contact :
                        </div>
                        <div class="col-md-8 mb-1">
                            <?=$eduf['eduf_picphone'];?>
                            <hr class="mt-1">
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-envelope fa-fw"></i>&nbsp; PIC Email :
                        </div>
                        <div class="col-md-8 mb-1">
                            <?=$eduf['eduf_picmail'];?>
                            <hr class="mt-1">
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-calendar fa-fw"></i>&nbsp; Discuss :
                        </div>
                        <div class="col-md-8 mb-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <small>First Discuss :</small><br>
                                    <?php if($eduf['eduf_firstdisdate']) {
                                    echo date('d F Y', strtotime($eduf['eduf_firstdisdate']));}
                                    ?>
                                    <hr class="mt-1">
                                </div>
                                <div class="col-md-4">
                                    <small>Last Discuss :</small><br>
                                    <?php if($eduf['eduf_lastdisdate']) {
                                    echo date('d F Y', strtotime($eduf['eduf_lastdisdate']));}
                                    ?>
                                    <hr class="mt-1">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-calendar-plus fa-fw"></i>&nbsp; Event :
                        </div>
                        <div class="col-md-8 mb-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <small>Start Event :</small><br>
                                    <?php if($eduf['eduf_eventstartdate']!='0000-00-00 00:00:00') {
                                    echo date('d F Y - H:i', strtotime($eduf['eduf_eventstartdate']));} else {
                                        ?>
                                    <div class="text-danger">Not Available</div>
                                    <?php } ?>
                                    <hr class="mt-1">
                                </div>
                                <div class="col-md-6">
                                    <small>End Event :</small><br>
                                    <?php if($eduf['eduf_eventenddate']!='0000-00-00 00:00:00') {
                                    echo date('d F Y - H:i', strtotime($eduf['eduf_eventenddate'])); } else {
                                    ?>
                                    <div class="text-danger">Not Available</div>
                                    <?php } ?>
                                    <hr class="mt-1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-sticky-note fa-fw"></i>&nbsp; Notes :
                        </div>
                        <div class="col-md-8 mb-1">
                            <?php if($eduf['eduf_notes']){ ?>
                            <?=$eduf['eduf_notes'];?>
                            <?php } else { ?>
                            <div class="text-danger">Not Available</div>
                            <?php } ?>
                            <hr class="mt-1">
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-question-circle fa-fw"></i>&nbsp; Status :
                        </div>
                        <div class="col-md-8 mb-3">
                            <?php if($eduf['eduf_status']==0){ ?>
                            <div class="badge badge-warning p-2 shadow text-muted">Pending</div>
                            <?php } else if($eduf['eduf_status']==1) { ?>
                            <div class="badge badge-light p-2 shadow text-success">Success</div>
                            <?php } else { ?>
                            <div class="badge badge-light p-2 shadow text-danger">Denied</div>
                            <?php } ?>
                        </div>
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-users-cog fa-fw"></i>&nbsp; PIC All-In Eduspace :
                        </div>
                        <div class="col-md-8 mb-1">
                            <?php if($eduf['eduf_picallin']){ ?>
                            <?=$eduf['eduf_picallin'];?>
                            <?php } else { ?>
                            <div class="text-danger">Not Available</div>
                            <?php } ?>
                            <hr class="mt-1">
                        </div>
                    </div>
                </form>
                <div class="row">
                    <?php if($eduf['eduf_status']==1){ ?>
                    <div class="col-md-12">
                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                        <h6 class="text-info">Review : </h6>
                        <div class="float-right" style="margin-top:-30px;">
                            <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                data-target="#addReview">Add Review</a>
                        </div>

                        <div class="row mt-3">
                            <?php foreach ($review as $r): ?>
                            <div class="col-md-12">
                                <i class="fas fa-user-circle fa-fw"></i> &nbsp; <?=$r['edufreview_name'];?>
                                <a href="#" data-toggle="modal" data-target="#editReview" class="text-primary ml-1"
                                    onclick="editReviewId('<?=$r['edufreview_id'];?>')">
                                    <i class="fas fa-edit"></i></a>
                                <a href="<?=base_url('bizdev/edufair/deleteReview/'.$r['edufreview_id'].'/'.$r['eduf_id']);?>"
                                    class="delete-button text-danger ml-1" data-message="review"><i
                                        class="fas fa-trash"></i></a>
                                <br>
                                <small class="ml-4"><b>Score : <?=$r['edufreview_score'];?></b> </small>
                                <div class="ml-4 mt-2">
                                    <?=$r['edufreview_desc'];?>
                                </div>
                                <hr>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addReview" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
            </div>
            <form action="<?=base_url('bizdev/edufair/saveReview');?>" method="post" name="addReview">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7 mb-3">
                            <label>Review Name :</label>
                            <input type="hidden" name="eduf_id" id="eduf_id" value="<?=$eduf['eduf_id'];?>">
                            <select name="edufreview_name" id="edufreview_name">
                                <option data-placeholder="true"></option>
                                <?php foreach($empl as $em) : ?>
                                <option value="<?=$em['empl_firstname'].' '.$em['empl_lastname'];?>">
                                    <?=$em['empl_firstname'].' '.$em['empl_lastname'];?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label>Score :</label>
                            <select name="edufreview_score" id="edufreview_score">
                                <option data-placeholder="true"></option>
                                <option value="Excellent">Excellent</option>
                                <option value="Good">Good</option>
                                <option value="Fair">Fair</option>
                                <option value="Poor">Poor</option>
                                <option value="Bad">Bad</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Description :</label>
                            <textarea name="edufreview_desc" id="edufreview_desc"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editReview" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
            </div>
            <form action="<?=base_url('bizdev/edufair/updateReview');?>" method="post" name="addReview">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7 mb-3">
                            <label>Review Name :</label>
                            <input type="hidden" name="edufreview_id" id="edufreview_id">
                            <input type="hidden" name="eduf_id" id="eduf_id" value="<?=$eduf['eduf_id'];?>">
                            <select name="edufreview_name" id="reviewname">
                                <option data-placeholder="true"></option>
                                <?php foreach($empl as $em) : ?>
                                <option value="<?=$em['empl_firstname'].' '.$em['empl_lastname'];?>">
                                    <?=$em['empl_firstname'].' '.$em['empl_lastname'];?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label>Score :</label>
                            <select name="edufreview_score" id="reviewscore">
                                <option data-placeholder="true"></option>
                                <option value="Excellent">Excellent</option>
                                <option value="Good">Good</option>
                                <option value="Fair">Fair</option>
                                <option value="Poor">Poor</option>
                                <option value="Bad">Bad</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Description :</label>
                            <textarea name="edufreview_desc" id="edufreview_desc"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
new SlimSelect({
    select: '#edufreview_name',
    placeholder: 'Select review name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

new SlimSelect({
    select: '#edufreview_score',
    placeholder: 'Select review score',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var EN = new SlimSelect({
    select: '#reviewname',
    placeholder: 'Select review name',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

var ES = new SlimSelect({
    select: '#reviewscore',
    placeholder: 'Select review score',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});

function editReviewId(x) {
    $.ajax({
        type: 'post',
        url: '<?=base_url("bizdev/edufair/showReviewId/");?>' + x,
        dataType: 'json',
        success: function(data) {
            $('#edufreview_id').val(data.edufreview_id)
            $('#eduf_id').val(data.eduf_id)
            EN.set(data.edufreview_name)
            ES.set(data.edufreview_score)
            CKEDITOR.instances.edufreview_desc.setData(data.edufreview_desc);
        }
    });
}
</script>