<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Schools Program
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Schools Program</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead class="text-center">
            <tr>
                <th width="1%">No</th>
                <th width="10%" class="bg-primary text-white">School Name</th>
                <th width="10%">Program</th>
                <th width="5%">Invoice</th>
                <th width="5%">Date</th>
                <th width="5%">Due Date</th>
                <th width="5%">Total Price</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php for($i=1;$i<=25;$i++) { ?>
            <tr>
                <td><?=$i;?></td>
                <td style="cursor:pointer"
                    onclick="window.location='<?=base_url('finance/receipt/school/view/'.$i);?>'">School Name
                </td>
                <td>Academic Writing</td>
                <td>JEI/1231/12312</td>
                <td>02 February 2020</td>
                <td>14 February 2020</td>
                <td>Rp. 30.000.000,-</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>