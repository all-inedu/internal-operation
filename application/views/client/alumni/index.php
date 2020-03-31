<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Alumni
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Alumni</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="<?=base_url('client/alumni/add');?>" class="btn btn-sm btn-success ml-2 add">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Alumni
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr class="text-center">
                <th width="1%" rowspan="2">No</th>
                <th width="10%" rowspan="2" class="bg-primary text-white">Student Name</th>
                <th width="5%" rowspan="2">Graduate Date</th>
                <th width="50%" colspan="3">University Name</th>
            </tr>
            <tr class="text-center">
                <td>Waitlist</td>
                <td>Accepted</td>
                <td>Selected Uni</td>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($alumni as $alu): ?>
            <tr class="text-center">
                <td><?=$i;?></td>
                <td class="text-left" style="cursor:pointer"
                    onclick="window.location='<?=base_url('client/alumni/view/'.$alu['alu_id']);?>'">
                    <?=$alu['st_firstname'].' '.$alu['st_lastname'];?>
                </td>
                <td><?=date('d F Y',strtotime($alu['alu_graduatedate']));?></td>
                <?php 
                    $id = $alu['alu_id'];
                    $wait = $this->alu->showDetail($id, 1);
                    $accept = $this->alu->showDetail($id, 2);
                    $select = $this->alu->showDetail($id, 3);
                ?>
                <td>
                    <?php 
                    if(empty($wait)) { echo '-';  } else {
                        foreach ($wait as $w):
                        echo $w['univ_name'].' ('.$w['aludetail_major'].')<br>';
                        endforeach;
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if(empty($accept)) { echo '-';  } else {
                        foreach ($accept as $a):
                        echo $a['univ_name'].' ('.$a['aludetail_major'].')<br>';
                        endforeach;
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if(empty($select)) { echo '-';  } else {
                        foreach ($select as $s):
                        echo $s['univ_name'].' ('.$s['aludetail_major'].')<br>';
                        endforeach;
                    }
                    ?>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>