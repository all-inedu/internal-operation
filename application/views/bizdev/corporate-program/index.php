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
            <tr>
                <th width="1%">No</th>
                <th width="5%" class="text-center bg-primary text-white">Corporate Name</th>
                <th width="5%" class="text-center">Program Name</th>
                <th width="5%" class="text-center">Is Corporate Scheme?</th>
                <th width="5%" class="text-center">First Discuss</th>
                <th width="5%" class="text-center">Last Discuss</th>
                <th width="5%" class="text-center">Status</th>
                <th width="10%" class="text-center">Notes</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=25;$i++) { ?>
            <tr>
                <td class="text-center align-middle"><?=$i;?></td>
                <td class="text-center align-middle" style="cursor:pointer"
                    onclick="window.location='<?=base_url('bizdev/corporate-program/view');?>'">Lorem Ipsum</td>
                <td class="text-center align-middle">Lorem Ipsum</td>
                <td class="text-center align-middle">Lorem Ipsum</td>
                <td class="text-center align-middle">Lorem Ipsum</td>
                <td class="text-center align-middle">Lorem Ipsum</td>
                <td class="text-center align-middle">
                    <!-- Status Success -->
                    <span class="badge badge-pill badge-success p-1" data-toggle="tooltip" data-placement="top"
                        title="Fix">
                        <i class="fas fa-check fa-2x"></i>
                    </span>

                    <!-- Status Pending -->
                    <span class="badge badge-pill badge-primary p-1 text-white" data-toggle="tooltip"
                        data-placement="top" title="Pending">
                        <i class="fas fa-clock fa-2x"></i>
                    </span>

                    <!-- Status Denied -->
                    <span class="badge badge-pill badge-danger p-1 text-white" data-toggle="tooltip"
                        data-placement="top" title="Denied">
                        <i class="fas fa-frown-open fa-2x"></i>
                    </span>
                </td>
                <td class="text-center align-middle">Lorem Ipsum</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>