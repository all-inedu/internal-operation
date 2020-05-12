<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Parent's Profile
                </div>
            </nav>
        </div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Profile</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card shadow card-sticky">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/parents.png');?>" alt="client management" width="50%">
                    <h6 class="mt-3">
                        <?=$parent['pr_firstname'].' '.$parent['pr_lastname'];?>
                    </h6>
                    <hr style="width:20%; margin-bottom:5px; margin-top:5px;">
                    <div class="text-info mb-2">
                        <?php if($parent['pr_mail']) {?>
                        <i class="fas fa-envelope text-danger"></i>&nbsp; <?=$parent['pr_mail'];?> <br>
                        <?php } ?>
                        <?php if($parent['pr_phone']) {?>
                        <i class="fas fa-phone text-danger"></i>&nbsp; <?=$parent['pr_phone'];?> <br>
                        <?php } ?>
                        <?php if($parent['pr_insta']) {?>
                        <i class="fab fa-instagram text-danger"></i>&nbsp; @<?=$parent['pr_insta'];?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6 class="align-middle"><i class="fas fa-user"></i>&nbsp; &nbsp; Parent's Profile
                    <div class="float-right">
                        <a href="<?=base_url('client/parents/view/'.$parent['pr_id']);?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <i class="fas fa-id-badge"></i>&nbsp; &nbsp; Full Name :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input name="pr_id" type="hidden" value="<?=$parent['pr_id'];?>">
                                    <small>First Name</small>
                                    <input name="pr_firstname" type="text" value="<?=$parent['pr_firstname'];?>"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small>Last Name</small>
                                    <input name="pr_lastname" type="text" value="<?=$parent['pr_lastname'];?>"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-envelope"></i>&nbsp; &nbsp; E-mail :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <input name="pr_mail" type="text" value="<?=$parent['pr_mail'];?>"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-mobile-alt"></i>&nbsp; &nbsp; Phone Number :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <input name="pr_phone" type="text" value="<?=$parent['pr_phone'];?>"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fab fa-instagram"></i>&nbsp; &nbsp; Instagram :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <input name="pr_insta" type="text" value="<?=$parent['pr_insta'];?>"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <i class="fas fa-map-marker-alt"></i>&nbsp; &nbsp; Address :
                        </div>
                        <div class="col-md-8 text-muted">
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <small>State</small>
                                    <input name="pr_state" type="text" id="state" class="form-control form-control-sm"
                                        value="<?=$parent['pr_state'];?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <small>Address</small>
                                    <textarea name="pr_address" id="" rows="5"
                                        class="form-control"><?=$parent['pr_address'];?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-save"></i>&nbsp; Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var states = '<?=implode(", ", $states);?>';
    var arr = states.split(", ")
    $("#state").autocomplete({
        source: arr
    });
});
</script>