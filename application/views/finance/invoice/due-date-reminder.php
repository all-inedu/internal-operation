<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Due Date Reminder
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?= base_url('finance/home'); ?>">Home</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid p-0">
    <form action="">
        <div class="row justify-content-start">
            <div class="col-md-3">
                <input type="month" class="form-control rounded" name="month" onchange="this.form.submit()"
                    value="<?= $date; ?>">
            </div>
        </div>
    </form>
</div>

<div class="container-fluid p-0 mt-3">
    <div class="content">
        <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead class="text-center">
                <tr>
                    <th width="1%">No</th>
                    <th width="15%" class="bg-primary text-white">Students Name</th>
                    <th width="15%">Program</th>
                    <th width="10%">Payment Method</th>
                    <th width="10%">Detail Installment</th>
                    <th width="5%">Amount USD</th>
                    <th width="5%">Amount IDR</th>
                    <th width="5%">Due Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($reminder as $r) : ?>
                <tr>
                    <td class="text-center"><?= $i; ?></td>
                    <td class="text-start" style="cursor: pointer;"
                        onclick="window.location='<?= base_url('finance/invoice/student/view/' . $r['stprog_id']); ?>'">
                        <?= $r['first_name'] . ' ' . $r['last_name']; ?></td>
                    <td class="text-start">
                        <?= $r['prog_sub'] ? $r['prog_sub'] . ' - ' . ' ' . $r['prog_program'] : ' ' . $r['prog_program']; ?>
                    </td>
                    <td class="text-center"><?= $r['method']; ?></td>
                    <td class="text-center"><?= isset($r['status']) ? $r['status'] : '-'; ?></td>
                    <td class="text-center"><?= $r['tot_usd'] ? '$' . $r['tot_usd'] : '-'; ?></td>
                    <td class="text-center"><?= $r['tot_idr'] ? 'Rp. ' . number_format($r['tot_idr']) : '-'; ?></td>
                    <td class="text-center"><?= date('d F Y', strtotime($r['due_date'])); ?></td>
                </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</div>