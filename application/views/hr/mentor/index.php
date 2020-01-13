<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Mentor
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mentor</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3 shadow">
            <div class="row no-gutters bg-warning">
                <div class="col-md-2 text-center align-middle my-auto">
                    <i class="fas fa-search fa-4x text-white p-2"></i>
                </div>
                <div class="col-md-10 bg-primary text-white shadow align-middle">
                    <div class="card-body pt-2 pl-4 pr-4 pb-0">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <small>Full Name : </small>
                                <input type="text" placeholder="Search" id="searchData1"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4 mb-3">
                                <small>Graduated From : </small>
                                <input type="text" placeholder="Search" id="searchData2"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4 mb-3">
                                <small>Major : </small>
                                <input type="text" placeholder="Search" id="searchData3"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width="5%" class="text-center">Full Name</th>
                <th width="5%" class="text-center">Graduated From</th>
                <th width="5%" class="text-center">Major</th>
                <th width="5%" class="text-center">Email</th>
                <th width="5%" class="text-center">Phone Number</th>
                <th width="5%" class="text-center">Mentor Status</th>
                <th width="10%" class="text-center">Position</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=8;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center" style="cursor:pointer"
                    onclick="window.location='<?=base_url('hr/mentor/view');?>'">Budi Setiawan</td>
                <td class="text-center">Business & Development</td>
                <td class="text-center">2018</td>
                <td class="text-center">mail@gmail.com</td>
                <td class="text-center">081212412xx</td>
                <td class="text-center">Potential</td>
                <td class="text-center">Just Mentor</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>