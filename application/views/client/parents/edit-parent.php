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
                    <img src="<?=base_url('assets/img/parents.png');?>" alt="client management" width="70%">
                    <h6 class="mt-3">Parents Name</h6>
                    <hr style="width:20%; margin-bottom:5px; margin-top:5px;">
                    <div class="text-info">
                        <p><i class="fas fa-envelope text-danger"></i>&nbsp; parent@gmail.com <br>
                            <i class="fas fa-phone text-danger"></i>&nbsp; 081231232xxx &nbsp; | &nbsp;
                            <i class="fab fa-instagram text-danger"></i>&nbsp; @parent</p>
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
                        <a href="<?=base_url('client/parents/view');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4 mb-1">
                        <i class="fas fa-id-badge"></i>&nbsp; &nbsp; Full Name :
                    </div>
                    <div class="col-md-8 text-muted">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <small>First Name</small>
                                <input name="prFName" type="text" placeholder="First Name"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6 mb-3">
                                <small>Last Name</small>
                                <input name="prLName" type="text" placeholder="Last Name"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-1">
                        <i class="fas fa-envelope"></i>&nbsp; &nbsp; E-mail :
                    </div>
                    <div class="col-md-8 text-muted">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input name="prEmail" type="text" placeholder="E-mail"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-1">
                        <i class="fas fa-mobile-alt"></i>&nbsp; &nbsp; Phone Number :
                    </div>
                    <div class="col-md-8 text-muted">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input name="prPhone" type="text" placeholder="Phone Number"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-1">
                        <i class="fab fa-instagram"></i>&nbsp; &nbsp; Instagram :
                    </div>
                    <div class="col-md-8 text-muted">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input name="prPhone" type="text" placeholder="Instagram"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-1">
                        <i class="fas fa-map-marker-alt"></i>&nbsp; &nbsp; Address :
                    </div>
                    <div class="col-md-8 text-muted">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <small>Address</small>
                                <textarea name="prAddress" id="" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="col-md-8 mb-3">
                                <small>State/Region</small>
                                <input name="prState" type="text" placeholder="State/Region"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4 mb-3">
                                <small>Postal Code</small>
                                <input name="prPostalCode" type="number" placeholder="Postal Code"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-sm btn-info">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>