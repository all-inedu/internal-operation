<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Corporate Program
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/corporate-program/');?>">Corporate
                            Program</a>
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
                    <img src="<?=base_url('assets/img/corporate.png');?>" alt="client management" width="80%"><br>

                    <!-- Status Success -->
                    <span class="badge badge-pill badge-success mt-3 p-1" data-toggle="tooltip" data-placement="top"
                        title="Fix">
                        <i class="fas fa-check fa-2x"></i>
                    </span>

                    <!-- Status Pending -->
                    <span class="badge badge-pill badge-primary mt-3 p-1 text-white" data-toggle="tooltip"
                        data-placement="top" title="Pending">
                        <i class="fas fa-clock fa-2x"></i>
                    </span>

                    <!-- Status Denied -->
                    <span class="badge badge-pill badge-danger mt-3 p-1 text-white" data-toggle="tooltip"
                        data-placement="top" title="Denied">
                        <i class="fas fa-frown-open fa-2x"></i>
                    </span>


                    <h5 class="align-middle mt-2">
                        Corporate Name</h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-info">
                        <p><i class="fas fa-envelope text-danger"></i>&nbsp; student@gmail.com <br>
                            <i class="fas fa-phone text-danger"></i>&nbsp; 081231232xxx &nbsp; | &nbsp;
                            <i class="fab fa-instagram text-danger"></i>&nbsp; @student</p>
                    </div>
                    <a href="<?=base_url('bizdev/corporate/view');?>" class="btn btn-sm btn-info m-1"><i
                            class="fas fa-search"></i>&nbsp; Profile</a>
                    <a href="<?=base_url('bizdev/corporate-program/edit');?>" class="btn btn-sm btn-primary m-1"><i
                            class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Corporate Program
                    <div class="float-right">
                        <a href="<?=base_url('bizdev/corporate-program/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-3">
                        <label><i class="fas fa-tag text-muted"></i>&nbsp; Program Name :</label>
                    </div>
                    <div class="col-md-9 mb-2">
                        <label>Admission Consultant</label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-3">
                        <label><i class="fas fa-question-circle text-muted"></i>&nbsp; Is Corporate Scheme ? :</label>
                    </div>
                    <div class="col-md-9 mb-2">
                        <label class="badge badge-success p-1">Yes</label>
                        <label class="badge badge-danger p-1">No</label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-3">
                        <label><i class="fas fa-calendar-alt text-muted"></i>&nbsp; First Discuss :</label>
                    </div>
                    <div class="col-md-9 mb-2">
                        <label>23 January 2019</label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-3">
                        <label><i class="fas fa-calendar text-muted"></i>&nbsp; Last Discuss :</label>
                    </div>
                    <div class="col-md-9 mb-2">
                        <label>24 January 2019</label>
                        <hr class="mt-1 mb-1">
                    </div>

                    <div class="col-md-3">
                        <label><i class="far fa-sticky-note text-muted"></i>&nbsp; Notes :</label>
                    </div>
                    <div class="col-md-9 mb-2">
                        <label>What is Lorem Ipsum?
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.</label>
                    </div>

                </div>

                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th colspan=3 class="text-center">Attachment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td><label class="font-weight-bold"> MoU 1 </label>
                                        <a href="#" class="text-primary pl-2" data-toggle="tooltip" data-placement="top"
                                            title="Download">
                                            <i class="fas fa-file-download"></i>
                                        </a>
                                    </td>
                                    <td><label class="font-weight-bold"> MoU 2 </label>
                                        <a href="#" class="text-primary pl-2" data-toggle="tooltip" data-placement="top"
                                            title="Download">
                                            <i class="fas fa-file-download"></i>
                                        </a>
                                    </td>
                                    <td><label class="font-weight-bold"> Others </label>
                                        <a href="#" class="text-primary pl-2" data-toggle="tooltip" data-placement="top"
                                            title="Download">
                                            <i class="fas fa-file-download"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>