<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Corporate Programs
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Corporate Programs</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>

<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr class="text-center">
                <th width="1%">No</th>
                <th width="10%" class="bg-primary text-white">Corporate Name</th>
                <th width="20%">Program Name</th>
                <th width="5%">First Discuss</th>
                <th width="5%">Last Discuss</th>
                <th width="1%">Approach <br>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($cprog as $cp) : ?>
            <tr class="text-center">
                <td><?=$i;?></td>
                <td class="text-left" style="cursor:pointer"
                    onclick="window.location='<?=base_url('bizdev/corporate-program/view/'.$cp['corprog_id']);?>'">
                    <?=$cp['corp_name'];?>
                </td>
                <td class="text-left"><?=$cp['prog_program'];?></td>
                <td><?=date('d F Y', strtotime($cp['corprog_datefirstdiscuss']));?></td>
                <td><?=date('d F Y', strtotime($cp['corprog_datelastdiscuss']));?></td>
                <td>
                    <?php if($cp['corprog_status']==1) { ?>
                    <span class="badge badge-pill p-1 text-white" data-toggle="tooltip" data-placement="top"
                        title="Success" style="background:#C686FF;">
                        <i class="fas fa-check fa-2x"></i>
                    </span>
                    <?php } else if($cp['corprog_status']==0) { ?>
                    <span class="badge badge-pill badge-info p-1 text-white" data-toggle="tooltip" data-placement="top"
                        title="Pending">
                        <i class="far fa-clock fa-2x"></i>
                    </span>
                    <?php } else if($cp['corprog_status']==2) { ?>
                    <span class="badge badge-pill p-1 text-white" data-toggle="tooltip" data-placement="top"
                        title="Denied" style="background:#F27313;">
                        <i class="fas fa-frown-open fa-2x"></i>
                    </span>
                    <?php } ?>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url('assets/js/disable-copas.js');?>"></script>