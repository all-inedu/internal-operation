<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Student's Program
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
                    <img src="<?=base_url('assets/img/student-prog.png');?>" alt="client management" width="70%">
                    <h6 class="mt-3">Student Name</h6>
                    <hr style="width:20%; margin-bottom:5px; margin-top:5px;">
                    <div class="text-info">
                        <p>Program Name : <br>
                            <b>Admission Consulting</b>
                    </div>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <a href="" class="btn btn-sm btn-primary">Add Initial Assessment</a>
                    <a href="" class="btn btn-sm btn-warning">Edit Initial Assessment</a>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <span class="text-muted"><i class="text-danger font font-weight-bold">*</i> Initial Assessment for
                        Admission
                        Program</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6 class="align-middle"><i class="fas fa-user"></i>&nbsp; &nbsp; Student's Program
                    <div class="float-right">
                        <a href="<?=base_url('client/client-program/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-4 mb-1">
                        <i class="fas fa-id-badge"></i>&nbsp; &nbsp; Date :
                    </div>
                    <div class="col-md-8 text-muted">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <small>First Discuss</small>
                                <input name="prFName" type="date" placeholder="First Discuss"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6 mb-3">
                                <small>Last Discuss</small>
                                <input name="prLName" type="date" placeholder="Last Discuss"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-1">
                        <i class="fas fa-envelope"></i>&nbsp; &nbsp; Notes :
                    </div>
                    <div class="col-md-8 text-muted">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <textarea name="prEmail" placeholder="Notes" class="form-control form-control-sm"
                                    rows="5">
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-1">
                        <i class="fas fa-mobile-alt"></i>&nbsp; &nbsp; Meeting Date :
                    </div>
                    <div class="col-md-8 text-muted">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input name="prPhone" type="date" placeholder="Phone Number"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-1">
                        <i class="fas fa-envelope"></i>&nbsp; &nbsp; Meeting Notes :
                    </div>
                    <div class="col-md-8 text-muted">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <textarea name="prEmail" placeholder="Notes" class="form-control form-control-sm"
                                    rows="5">
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-1">
                        <i class="fab fa-instagram"></i>&nbsp; &nbsp; Potential Status :
                    </div>
                    <div class="col-md-8 text-muted">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <select id="stPotential" name="stPotential">
                                    <option data-placeholder="true"></option>
                                    <option value="Pending">Pending</option>
                                    <option value="Failed">Failed</option>
                                    <option value="Success">Success</option>
                                </select>
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
new SlimSelect({
    select: '#stPotential',
    placeholder: 'Select potential status',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
</script>