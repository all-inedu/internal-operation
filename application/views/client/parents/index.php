<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-users mt-1"></i>&nbsp;&nbsp; Parents
                </div>
            </nav>
        </div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Parents</li>
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
                <th width="10%" class="text-center">First Name</th>
                <th width="10%" class="text-center">Last Name</th>
                <th width="10%" class="text-center">Parent's Mail</th>
                <th width="5%" class="text-center">Parent's Instagram</th>
                <th width="5%" class="text-center">Lead</th>
                <th width="10%" class="text-center">Insterested Program</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=50;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td>Emilia</td>
                <td>Wati</td>
                <td>Emilia<?=$i;?>@all-inedu.com</td>
                <td class="text-center">@Irawan</td>
                <td class="text-center">SMA 75 JKT</td>
                <td class="text-center">Adimission Consulting, SAT Private</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>