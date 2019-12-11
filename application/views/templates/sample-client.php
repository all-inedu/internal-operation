<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 bg-warning">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-gray font-weight-bold shadow">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Prospective Client
                </div>
            </nav>
        </div>
        <div class="col-md-7 bg-primary">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-gray shadow">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
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
                <th width="10%" class="text-center">First name</th>
                <th width="10%" class="text-center">Last name</th>
                <th width="10%" class="text-center">Position</th>
                <th width="10%" class="text-center">Office</th>
                <th width="5%" class="text-center">Age</th>
                <th width="10%" class="text-center">Start date</th>
                <th width="10%" class="text-center">Salary</th>
                <th width="5%" class="text-center">Extn.</th>
                <th width="10%" class="text-center">E-mail</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=100;$i++) { ?>
            <tr>
                <td>Tiger <?=$i;?></td>
                <td>Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
                <td>542<?=$i;?></td>
                <td>t.nixon@datatables.net</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>