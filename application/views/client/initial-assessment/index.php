<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Initial Assessment
                </div>
            </nav>
        </div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Initial Assessment</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="content">
    <table id="myTable" class="display shadow table table-striped table-bordered dt-responsive nowrap"
        style="width:100%">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width="5%" class="text-center">ID Activity</th>
                <th width="10%" class="text-center">Client's Name</th>
                <th width="10%" class="text-center">Program Name</th>
                <th width="5%" class="text-center">Initial Consultation Date</th>
                <th width="5%" class="text-center">Initial Assessment Date</th>
                <th width="5%" class="text-center">Final Initial Assessment Date</th>
                <th width="5%" class="text-center">Initial Assessment Type</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=50;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center">AC3</td>
                <td>Emilia Wati</td>
                <td>Admission Consulting</td>
                <td class="text-center">21 Nov 2019</td>
                <td class="text-center">28 Nov 2019</td>
                <td class="text-center">24 Nov 2019</td>
                <td class="text-center">Short</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>