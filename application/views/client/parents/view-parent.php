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
                <div class="row text-center">
                    <div class="col">
                        <a href="<?=base_url('client/parents/edit/');?>" class="btn btn-sm btn-info m-1"><i
                                class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
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
                        <a href="<?=base_url('client/parents/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:0px;"></div>
                <div class="text-left mb-3">
                    <small class="text-muted"><i class="far fa-calendar-alt text-danger"></i> &nbsp;Created date : 09
                        Jan
                        2019</small>
                    &nbsp; | &nbsp;
                    <small class="text-muted"><i class="fas fa-calendar-alt text-primary"></i> &nbsp;Last update : 09
                        Jan
                        2019</small>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-1">
                        <i class="fas fa-map-marker-alt"></i>&nbsp; &nbsp; Address :
                    </div>
                    <div class="col-md-8 text-muted">
                        Jl. Panjang No. 36, Kebon Jeruk <br>
                        Jakarta Barat<br>
                        11360
                    </div>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <i class="fas fa-users"></i>&nbsp; &nbsp; List of Children:
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>Full Name</th>
                                        <th>Current Education</th>
                                        <th>School Name</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Rizka Irawan</td>
                                        <td>SMA</td>
                                        <td>SMA N 1 Jakarta</td>
                                        <td>11</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>