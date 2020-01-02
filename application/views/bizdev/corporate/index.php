<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Corporates
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Corporate</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="<?=base_url('bizdev/corporate/add');?>" class="btn btn-sm btn-success ml-2 add">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Corporate
</a>

<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width="5%" class="text-center bg-primary text-white">Corporate Name</th>
                <th width="5%" class="text-center">Industry</th>
                <th width="5%" class="text-center">E-mail</th>
                <th width="5%" class="text-center">Office Number</th>
                <th width="5%" class="text-center">Instagram</th>
                <th width="10%" class="text-center">Region</th>
                <th width="5%" class="text-center">Address</th>
                <th width="5%" class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=25;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center" style="cursor:pointer"
                    onclick="window.location='<?=base_url('bizdev/corporate/view');?>'">Lorem Ipsum</td>
                <td class="text-center">Lorem Ipsum</td>
                <td class="text-center">Lorem Ipsum</td>
                <td class="text-center">Lorem Ipsum</td>
                <td class="text-center">Lorem Ipsum</td>
                <td class="text-center">Lorem Ipsum</td>
                <td class="text-center">Lorem Ipsum</td>
                <td class="text-center">
                    <div class="badge bg-white shadow text-success p-2">Approach</div>
                    <div class="badge bg-white shadow text-danger p-2">Not Yet</div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>