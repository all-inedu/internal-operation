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
            <tr class="text-center">
                <th width="1%">No</th>
                <th width="5%">Organizer Name</th>
                <th width="10%">PIC Name</th>
                <th width="10%">PIC Contact</th>
                <th width="5%">PIC Email</th>
                <th width="5%">First Discuss</th>
                <th width="5%">Last Discuss</th>
                <th width="5%">Start Event</th>
                <th width="5%">End Event</th>
                <th width="5%">Status</th>
                <th width="5%">PIC Team</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($eduf as $e): ?>
            <tr class="text-center">
                <td class="text-center"><?=$i;?></td>
                <td class="text-center" style="cursor:pointer"
                    onclick="window.location='<?=base_url('bizdev/edufair/view/'.$e['eduf_id']);?>'">
                    <?=$e['eduf_organizer'];?>
                </td>
                <td><?=$e['eduf_picname'];?></td>
                <td><?=$e['eduf_picphone'];?></td>
                <td><?=$e['eduf_picmail'];?></td>
                <td>
                    <?php if($e['eduf_firstdisdate']) {
                    echo date('d F Y', strtotime($e['eduf_firstdisdate']));
                    }
                    ?>
                </td>
                <td>
                    <?php if($e['eduf_lastdisdate']) {
                    echo date('d F Y', strtotime($e['eduf_lastdisdate']));
                    }
                    ?>
                </td>
                <td>
                    <?php if($e['eduf_eventstartdate']!='0000-00-00 00:00:00') {
                    echo date('d F Y', strtotime($e['eduf_eventstartdate']));
                    }
                    ?>
                </td>
                <td>
                    <?php if($e['eduf_eventenddate']!='0000-00-00 00:00:00') {
                    echo date('d F Y', strtotime($e['eduf_eventenddate']));
                    }
                    ?>
                </td>
                <td>
                    <?php if($e['eduf_status']==0){ ?>
                    <div class="badge badge-light p-2 shadow text-muted">Pending</div>
                    <?php } else if($e['eduf_status']==1) { ?>
                    <div class="badge badge-light p-2 shadow text-success">Success</div>
                    <?php } else { ?>
                    <div class="badge badge-light p-2 shadow text-danger">Denied</div>
                    <?php } ?>
                </td>
                <td><?=$e['eduf_picallin'];?></td>
            </tr>
            <?php $i++; endforeach; ?>
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
            <form action="" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Organizer <i class="text-danger font-weight-bold">*</i></label>
                                <input name="eduf_organizer" type="text" class="form-control form-control-sm"
                                    placeholder="Organizer Name">
                                <?=form_error('eduf_organizer', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Place</label>
                                <textarea name="eduf_place" class="form-control form-control-sm"></textarea>
                                <?=form_error('eduf_place', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>PIC Name <i class="text-danger font-weight-bold">*</i></label>
                                <input name="eduf_picname" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Name">
                                <?=form_error('eduf_picname', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>PIC Contact <i class="text-danger font-weight-bold">*</i></label>
                                <input name="eduf_picphone" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Contact">
                                <?=form_error('eduf_picphone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>PIC Email <i class="text-danger font-weight-bold">*</i></label>
                                <input name="eduf_picmail" type="text" class="form-control form-control-sm"
                                    placeholder="PIC Email">
                                <?=form_error('eduf_picmail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Discuss <i class="text-danger font-weight-bold">*</i></label>
                                <input name="eduf_firstdisdate" type="date" class="form-control form-control-sm">
                                <?=form_error('eduf_firstdisdate', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save</button>
                </div>
            </form>
        </div>
    </div>
</div>