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

<?php
$CI = &get_instance();
$CI->load->model('hr/Employee_model', 'empl');
$empl_id = $CI->session->userdata('empl_id');
$data = $CI->empl->showId($empl_id);
?>


<div class="container-fluid p-0 mt-3">
    <div class="content">
        <?php if ($data['empl_role'] == 0 || $data['empl_role'] == 3) { ?>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card border-0 shadow">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="">
                            <h5 class="m-0 p-0">
                                Total <br> Invoice
                            </h5>
                        </div>
                        <div class="text-right">
                            <h5>
                                <?= $tot_fullpayment_rev['tot_fullpayment_inv'] + $tot_installment_rev['tot_installment_inv']; ?>
                            </h5>
                            <strong>
                                $
                                <?= $tot_fullpayment_rev['tot_fullpayment_usd'] + $tot_installment_rev['tot_installment_usd']; ?>
                            </strong>
                            <br>
                            <strong>
                                Rp.
                                <?= number_format($tot_fullpayment_rev['tot_fullpayment_idr'] + $tot_installment_rev['tot_installment_idr']); ?>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="">
                            <h5 class="m-0 p-0">
                                Total Invoice <br> Paid
                            </h5>
                        </div>
                        <div class="text-right">
                            <h5>
                                <?= $fullpayment_rev['tot_fullpayment_inv'] + $installment_rev['tot_installment_inv']; ?>
                            </h5>
                            <strong>
                                $
                                <?= $fullpayment_rev['tot_fullpayment_usd'] + $installment_rev['tot_installment_usd']; ?>
                            </strong>
                            <br>
                            <strong>
                                Rp.
                                <?= number_format($fullpayment_rev['tot_fullpayment_idr'] + $installment_rev['tot_installment_idr']); ?>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="">
                            <h5 class="m-0 p-0">
                                Remaining <br> Invoice
                            </h5>
                        </div>
                        <div class="text-right">
                            <h5>
                                <?=
                                    ($tot_fullpayment_rev['tot_fullpayment_inv'] + $tot_installment_rev['tot_installment_inv']) - ($fullpayment_rev['tot_fullpayment_inv'] + $installment_rev['tot_installment_inv']); ?>
                            </h5>
                            <strong>
                                $
                                <?= ($tot_fullpayment_rev['tot_fullpayment_usd'] + $tot_installment_rev['tot_installment_usd']) - ($fullpayment_rev['tot_fullpayment_usd'] + $installment_rev['tot_installment_usd']); ?>
                            </strong>
                            <br>
                            <strong>
                                Rp.
                                <?= number_format(($tot_fullpayment_rev['tot_fullpayment_idr'] + $tot_installment_rev['tot_installment_idr']) - ($fullpayment_rev['tot_fullpayment_idr'] + $installment_rev['tot_installment_idr'])); ?>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

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
                    <th>Reminder Status</th>
                    <th>Notes</th>
                    <th>Action</th>
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
                    <td class="text-center"><?= $r['reminder_status'] ? $r['reminder_status'] . ' Sent' : '-' ?></td>
                    <td>
                        <?php
                            if ($r['reminder_status']) {
                                if ($r['reminder_notes']) {
                            ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <?= $r['reminder_notes']; ?>
                            </div>
                            <div class="ml-3">
                                <i class="fas fa-trash fa-fw text-danger" style="cursor:pointer"
                                    onclick="deleteNotes(<?= $r['id']; ?>, '<?= $r['method']; ?>')"></i>
                            </div>
                        </div>
                        <?php
                                } else {
                                    echo '<button class="btn btn-sm btn-outline-info"
                                     onclick="addNotes(' . $r['id'] . ', \'' . $r['method'] . '\')">
                                     <i class="fas fa-plus fa-fw"></i>
                                     </button>';
                                }
                            } else {
                                echo '-';
                            }
                            ?>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary"
                            onclick="checkReminder(<?= $r['id']; ?>, '<?= $r['method']; ?>', '<?= $r['prog_sub'] ? $r['prog_sub'] . ' - ' . ' ' . $r['prog_program'] : ' ' . $r['prog_program']; ?>', '<?= $r['due_date']; ?>')">
                            <i class="fas fa-paper-plane fa-fw mr-2"></i>
                            Send
                            WA</button>
                    </td>
                </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="sendWA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url('finance/invoice/reminder/store'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Remind Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="method" id="method">
                        <input type="hidden" name="program" id="program">
                        <input type="hidden" name="due_date" id="due_date">
                        <div class="col-md-6 mb-2">
                            <label for="" class="mb-0 pb-0">Name</label>
                            <input type="text" name="name" id="name" class="form-control form-control-sm"
                                placeholder="Full Name" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="" class="mb-0 pb-0">Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="form-control form-control-sm"
                                placeholder="6281xxxxxx" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Reminder Notes  -->
<div class="modal fade" id="addReminderNotes">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url('finance/invoice/reminder/notes'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="inv_id" name="id">
                            <input type="hidden" id="inv_method" name="method">
                            <textarea name="reminder_notes" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Reminder Notes  -->
<div class="modal fade" id="deleteReminderNotes">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url('finance/invoice/reminder/notes'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Are you sure, you want to delete this notes?</h6>
                            <input type="hidden" id="inv_del_id" name="id">
                            <input type="hidden" id="inv_del_method" name="method">
                            <input type="hidden" name="reminder_notes" value="">
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes, Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php if ($this->session->flashdata('reminder')) { ?>
<script>
const reminder = <?= json_encode($this->session->flashdata('reminder')); ?>;
const date = new Date();
const diff = reminder.due_date - date;
const message =
    "https://api.whatsapp.com/send?phone=" + reminder.phone +
    "&text=*" + reminder.type.replace('+', '%2B') +
    "*%0A%0ADear%20" + reminder.name +
    "%2C%0A%0AThank%20you%20for%20trusting%20ALL-in%20Eduspace%20as%20your%20independent%20university%20consultant%20to%20help%20your%20child%20reach%20their%20dream%20to%20top%20universities.%0A%0AThrough%20this%20message%2C%20we%20would%20like%20to%20remind%20you%20that%20*the%20payment%20deadline%20for%20" +
    reminder.program +
    "%20is%20due%20on%20" + reminder.due_date +
    "%20or%20in%20" + reminder.diff.replace('+', '%2B') +
    "%20days.*%0A%0APayment%20could%20be%20done%20through%20bank%20transfer%20to%3A%20*BCA%20" + '2483016611' +
    "%20a%2Fn%20PT%20Jawara%20Edukasih%20Indonesia.*%0A%0A*Thank%20you.%20ignore%20this%20message%20if%20payment%20has%20been%20made.* ";

window.open(message, '_blank');
</script>
<?php } ?>

<script>
function checkReminder(id, method, program, due_date) {
    $('#sendWA').modal('show')
    $('#id').val(id)
    $('#method').val(method)
    $('#program').val(program)
    $('#due_date').val(due_date)
}

function addNotes(id, method) {
    $('#addReminderNotes').modal('show')
    $('#inv_id').val(id)
    $('#inv_method').val(method)
}

function deleteNotes(id, method) {
    $('#deleteReminderNotes').modal('show')
    $('#inv_del_id').val(id)
    $('#inv_del_method').val(method)
}
</script>