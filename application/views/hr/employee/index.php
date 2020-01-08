<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Employee
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('hr/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Employee</li>
                </ol>
            </nav>
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
                <th width="10%" class="text-center">Position</th>
                <th width="5%" class="text-center">Hire Date</th>
                <th width="5%" class="text-center">Length of Work</th>
                <th width="5%" class="text-center">Employee Status</th>
                <th width="5%" class="text-center">Email</th>
                <th width="5%" class="text-center">Graduated From</th>
                <th width="5%" class="text-center">Major</th>
                <th width="5%" class="text-center">Date of Birth</th>
                <th width="10%" class="text-center">Phone Number</th>
                <th width="10%" class="text-center">Is Active</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=8;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center" style="cursor:pointer"
                    onclick="window.location='<?=base_url('hr/employee/view');?>'">Budi Setiawan</td>
                <td class="text-center">Business & Development</td>
                <td class="text-center">2018</td>
                <td class="text-center"><?= date('Y')-2018 . " Years" ;?></td>
                <td class="text-center">Contract</td>
                <td class="text-center">mail@gmail.com</td>
                <td class="text-center">STIE Kasih Bangsa</td>
                <td class="text-center">Akuntansi</td>
                <td class="text-center">01 Jan 1998</td>
                <td class="text-center">0812312312321</td>
                <td class="text-center">Inacive</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>