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
                <th width="1%">#</th>
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
            <?php $i=1; foreach($corp as $c): ?>
            <tr class="text-center">
                <td><?=$i;?></td>
                <td style="cursor:pointer"
                    onclick="window.location='<?=base_url('bizdev/corporate/view/'.$c['corp_id']);?>'">
                    <?=$c['corp_name'];?></td>
                <td><?=$c['corp_industry'];?></td>
                <td><?=$c['corp_mail'];?></td>
                <td><?=$c['corp_phone'];?></td>
                <td><?=$c['corp_insta'];?></td>
                <td><?=$c['corp_region'];?></td>
                <td><?=$c['corp_address'];?></td>
                <td>
                    <?php if($c['corp_status']!=0){ ?>
                    <div class="badge bg-white shadow text-success p-2">Approached</div>
                    <?php } else { ?>
                    <div class="badge bg-white shadow text-danger p-2">Not Yet</div>
                    <?php } ?>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>