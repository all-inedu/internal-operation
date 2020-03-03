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
                    <a href="<?=base_url('bizdev/edufair/edit/'.$eduf['eduf_id']);?>" class="btn btn-sm btn-info"><i
                            class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
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
                            <a href="<?=base_url('bizdev/corporate/');?>" class="btn btn-sm btn-info"><i
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
                                <div class="col-md-4">
                                    <small>Start Event :</small><br>
                                    <?php if($eduf['eduf_eventstartdate']) {
                                    echo date('d F Y', strtotime($eduf['eduf_eventstartdate']));} else {
                                        ?>
                                    <div class="text-danger">Not Available</div>
                                    <?php } ?>
                                    <hr class="mt-1">
                                </div>
                                <div class="col-md-4">
                                    <small>End Event :</small><br>
                                    <?php if($eduf['eduf_eventenddate']) {
                                    echo date('d F Y', strtotime($eduf['eduf_eventenddate'])); } else {
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
            </div>
        </div>
    </div>
</div>