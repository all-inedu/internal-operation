<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Fix Client
                </div>
            </nav>
        </div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Fix Client</li>
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
                <th width="2%" class="text-center">No</th>
                <th width="15%" class="text-center bg-primary text-white">Full Name</th>
                <th width="10%" class="text-center">Parents Name</th>
                <th width="10%" class="text-center">Students Mail</th>
                <th width="10%" class="text-center">Phone Number</th>
                <th width="10%" class="text-center">Instagram</th>
                <th width="5%" class="text-center">School Name</th>
                <th width="5%" class="text-center">Student Year/Grade</th>
                <th width="10%" class="text-center">State</th>
                <th width="10%" class="text-center">Address</th>
                <th width="10%" class="text-center">Lead</th>
                <th width="5%" class="text-center">Level of Interest</th>
                <th width="5%" class="text-center">Interested Program</th>
                <th width="5%" class="text-center">Year of Study Abroad</th>
                <th width="5%" class="text-center">Country of Study Abroad</th>
                <th width="5%" class="text-center">Univ Destination</th>
                <th width="5%" class="text-center">Major</th>
                <th width="5%" class="text-center">Status</th>
                <th width="5%" class="text-center">Created Date</th>
                <th width="5%" class="text-center">Updated Date</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=50;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td style="cursor:pointer" onclick="window.location='<?=base_url('client/fix/view');?>'">Rizka
                    Irawan
                </td>
                <td class=" text-center">Irawan</td>
                <td class=" text-center">Rizka<?=$i;?>@all-inedu.com</td>
                <td class=" text-center">082233423xx</td>
                <td class=" text-center">@rizkairaw</td>
                <td class=" text-center">SMA 75 JKT</td>
                <td class="text-center">11</td>
                <td class="text-center">Jakarta</td>
                <td class="text-center">Jl Panjang No 36 Jakarta</td>
                <td class="text-center">Edufair</td>
                <td class="text-center">High</td>
                <td class="text-center">Admission Advisory, SAT Prep</td>
                <td class="text-center">2020</td>
                <td class="text-center">US, UK</td>
                <td class="text-center">Harvard, University of California</td>
                <td class="text-center">Computer Science</td>
                <td class="text-center">Active</td>
                <td class="text-center">03 Nov 2019</td>
                <td class="text-center">08 Des 2019</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>