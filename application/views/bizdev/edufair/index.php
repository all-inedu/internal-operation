<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Edufair
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edufair</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<a href="#" class="btn btn-sm btn-success ml-2 add" data-toggle="modal" data-target="#addEdufair">
    <i class="fas fa-plus-circle mt-1"></i>&nbsp; Add Edufair
</a>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width="5%" class="text-center">ID Edufair</th>
                <th width="10%" class="text-center">Organizer</th>
                <th width="10%" class="text-center">PIC Name</th>
                <th width="10%" class="text-center">PIC Contact</th>
                <th width="5%" class="text-center">PIC Email</th>
                <th width="5%" class="text-center">First Discuss</th>
                <th width="5%" class="text-center">Last Discuss</th>
                <th width="5%" class="text-center">Start Event</th>
                <th width="5%" class="text-center">End Event</th>
                <th width="5%" class="text-center">Notes</th>
                <th width="5%" class="text-center">Status</th>
                <th width="5%" class="text-center">PIC Team</th>
                <th width="5%" class="text-center">Review</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=25;$i++) { ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center" style="cursor:pointer"
                    onclick="window.location='<?=base_url('bizdev/edufair/view');?>'">EDF01</td>
                <td>Organizer</td>
                <td>PIC Name</td>
                <td class="text-center">Contact</td>
                <td class="text-center">Email</td>
                <td class="text-center">03-01-2020</td>
                <td class="text-center">05-01-2020</td>
                <td class="text-center">23-02-2020</td>
                <td class="text-center">24-02-2020</td>
                <td class="text-center">Notes</td>
                <td class="text-center">
                    <div class="badge badge-danger p-1">Denied</div>
                    <div class="badge badge-warning p-1">Pending</div>
                    <div class="badge badge-success p-1">Fix</div>
                </td>
                <td class="text-center">All-In Team</td>
                <td class="text-center">Review</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addEdufair" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Edufair</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Organizer</label>
                            <input name="organizer" type="text" class="form-control form-control-sm"
                                placeholder="Organizer Name">
                            <?=form_error('organizer', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>PIC Name</label>
                            <input name="picName" type="text" class="form-control form-control-sm"
                                placeholder="PIC Name">
                            <?=form_error('picName', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>PIC Contact</label>
                            <input name="picCOntact" type="text" class="form-control form-control-sm"
                                placeholder="PIC Contact">
                            <?=form_error('picCOntact', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>PIC Email</label>
                            <input name="picEmail" type="text" class="form-control form-control-sm"
                                placeholder="PIC Email">
                            <?=form_error('picEmail', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Discuss</label>
                            <input name="organizer" type="date" class="form-control form-control-sm"
                                placeholder="ID Program">
                            <?=form_error('organizer', '<small class="text-danger">', '</small>');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fas fa-times-circle"></i>&nbsp; Close</button>
                <button type="button" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
new SlimSelect({
    select: '#mainProgram',
    placeholder: 'Select main program ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
</script>