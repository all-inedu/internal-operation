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
                    <th>Reminder Status</th>
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
                        <button class="btn btn-sm btn-primary"
                            onclick="checkReminder(<?= $r['id']; ?>, '<?= $r['method']; ?>', '<?= $r['prog_sub'] ? $r['prog_sub'] . ' - ' . ' ' . $r['prog_program'] : ' ' . $r['prog_program']; ?>', '<?= $r['due_date']; ?>')">Send
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php if ($this->session->flashdata('reminder')) { ?>
<script>
const reminder = <?= json_encode($this->session->flashdata('reminder')); ?>;
const date = new Date();
const diff = reminder.due_date - date;
console.log(date);
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
</script>