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
                    <li class="breadcrumb-item active" aria-current="page">Student's Program</li>
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
                <th width="1%" class="text-center">No</th>
                <th width="10%" class="text-center  bg-primary text-white">Full Name</th>
                <th width="10%" class="text-center">Program Name</th>
                <th width="5%" class="text-center">First Discuss</th>
                <th width="5%" class="text-center">Last Discuss</th>
                <th width="5%" class="text-center">Notes</th>
                <th width="5%" class="text-center">Meeting Date</th>
                <th width="10%" class="text-center">Meeting Notes</th>
                <th width="5%" class="text-center">Status Potential Client</th>
                <th width="5%" class="text-center">Potential Updated</th>
                <th width="5%" class="text-center">Status Program</th>
                <th width="5%" class="text-center">Program Updated</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=50;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td style="cursor:pointer" onclick="window.location='<?=base_url('client/client-program/view');?>'">
                    Emilia
                    Wati</td>
                <td class="text-center">SAT Prep</td>
                <td class="text-center">22 Nov 2019</td>
                <td class="text-center">02 Des 2019</td>
                <td class="text-center">Test ...</td>
                <td class="text-center">09 Des 2019</td>
                <td class="text-center">-</td>
                <td class="text-center">Pending</td>
                <td class="text-center">02 Des 2019</td>
                <td class="text-center">Not Yet</td>
                <td class="text-center">-</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>