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
            <?php $i=1; foreach($sch_prog as $sp): ?>
            <tr>
                <td><?=$i;?></td>
                <td class="text-left" style="cursor:pointer"
                    onclick="window.location='<?=base_url('finance/invoice/school/view/'.$sp['schprog_id']);?>'">
                    <?=$sp['sch_name'];?>
                </td>
                <td class="text-left"><?=$sp['prog_program'];?></td>
                <td>
                    <?php 
                        $inv = $this->invsch->showId($sp['schprog_id']);
                        echo $inv['invsch_id'];
                    ?>
                </td>
                <td>
                    <?php if($inv['invsch_date']) { echo date('d F Y', strtotime($inv['invsch_date'])); }?>
                </td>
                <td>
                    <?php if($inv['invsch_date']) { echo date('d F Y', strtotime($inv['invsch_duedate'])); }?>
                </td>
                <td>
                    <?php if($inv['invsch_totprice']) { echo 'Rp. '.number_format($inv['invsch_totprice']); }?>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url('assets/js/disable-copas.js');?>"></script>