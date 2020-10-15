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
<a href="<?=base_url('client/parents/add/');?>" class="btn btn-sm btn-success ml-2 add"><i
        class="fas fa-plus-circle"></i>&nbsp; Add Parent</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width="10%" class="text-center bg-primary text-white">Full Name</th>
                <th width="10%" class="text-center">E-mail</th>
                <th width="10%" class="text-center">Instagram</th>
                <th width="15%" class="text-center">Childs Name</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($parents as $p) : ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td style="cursor:pointer"
                    onclick="window.location='<?=base_url('client/parents/view/'.$p['pr_id']);?>'">
                    <?=$p['pr_firstname'].' '.$p['pr_lastname'];?>
                </td>
                <td><?=$p['pr_mail'];?></td>
                <td class="text-center"><?=$p['pr_insta'];?></td>
                <td class="text-center">
                    <?php 
                        $st = $this->prt->showChildsParent($p['pr_id']);
                        $students = [];
                        foreach ($st as $s) {
                            array_push($students, $s['st_firstname'].' '.$s['st_lastname']);
                        }
                        echo implode(", ", $students);
                    ?>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url('assets/js/disable-copas.js');?>"></script>