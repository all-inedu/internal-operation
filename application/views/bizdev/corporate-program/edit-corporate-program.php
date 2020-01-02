<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Corporate Program
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/corporate-program/');?>">Corporate
                            Program</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>

<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card shadow card-sticky">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/corporate.png');?>" alt="client management" width="80%"><br>

                    <!-- Status Fix -->
                    <span class="badge badge-pill badge-success mt-3 p-1" data-toggle="tooltip" data-placement="top"
                        title="Fix">
                        <i class="fas fa-check fa-2x"></i>
                    </span>

                    <!-- Status Pending -->
                    <span class="badge badge-pill badge-primary mt-3 p-1 text-white" data-toggle="tooltip"
                        data-placement="top" title="Pending">
                        <i class="fas fa-clock fa-2x"></i>
                    </span>

                    <!-- Status Denied -->
                    <span class="badge badge-pill badge-danger mt-3 p-1 text-white" data-toggle="tooltip"
                        data-placement="top" title="Denied">
                        <i class="fas fa-frown-open fa-2x"></i>
                    </span>


                    <h5 class="align-middle mt-1 mb-1">
                        Corporate Name</h5>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-info">
                        <p><i class="fas fa-envelope text-danger"></i>&nbsp; student@gmail.com <br>
                            <i class="fas fa-phone text-danger"></i>&nbsp; 081231232xxx &nbsp; | &nbsp;
                            <i class="fab fa-instagram text-danger"></i>&nbsp; @student</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-user"></i>&nbsp; &nbsp; Corporate Program
                    <div class="float-right">
                        <a href="<?=base_url('bizdev/corporate-program/view/');?>" class="btn btn-sm btn-info"><i
                                class="fas fa-arrow-circle-left"></i></a>
                    </div>
                </h6>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <form action="test.php" method="post" id="editSchoolProg">
                    <div class="row">
                        <div class="col-md-3">
                            <label><i class="fas fa-tag text-muted"></i>&nbsp; Program Name :</label>
                        </div>
                        <div class="col-md-9 mb-2">
                            <label>Admission Consultant</label>
                            <hr class="mt-1 mb-1">
                        </div>

                        <div class="col-md-3">
                            <label><i class="fas fa-tag text-muted"></i>&nbsp; Is Corporate Scheme ? :</label>
                        </div>
                        <div class="col-md-9 mb-2">
                            <label class="badge badge-success p-1">Yes</label>
                            <label class="badge badge-danger p-1">No</label>
                            <hr class="mt-1 mb-1">
                        </div>

                        <div class="col-md-3">
                            <label><i class="fas fa-calendar-alt text-muted"></i>&nbsp; First Discuss :</label>
                        </div>
                        <div class="col-md-9 mb-2">
                            <label>23 January 2019</label>
                            <hr class="mt-1 mb-1">
                        </div>

                        <div class="col-md-3">
                            <label><i class="fas fa-calendar text-muted"></i>&nbsp; Last Discuss :</label>
                        </div>
                        <div class="col-md-9 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <small>Date</small>
                                    <input name="lastDiscuss" type="date" class="form-control form-control-sm"
                                        placeholder="Last Discuss">
                                    <?=form_error('lastDiscuss', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="col-md-3">
                                    <small>Status</small>
                                    <select name="programStatus" id="programStatus" onchange="programFix()">
                                        <option value="Pending">Pending</option>
                                        <option value="Fix">Fix</option>
                                        <option value="Denied">Denied</option>
                                    </select>
                                    <?=form_error('lastDiscuss', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label><i class="far fa-sticky-note text-muted"></i>&nbsp; Notes :</label>
                        </div>
                        <div class="col-md-9 mb-2">
                            <textarea name="notes" class="form-control form-control-sm" rows="5"></textarea>
                            <?=form_error('notes', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="col-md-12" id="attachment">
                            <hr>
                            <label class="font-weight-bold">Attachment</label>
                            <div class="row">
                                <!-- Attach 1 -->
                                <div class="col-md-3">
                                    <label>Attachment 1</label>
                                </div>

                                <div class="col-md-9 mb-3">
                                    <input name="attach1" type="text" class="form-control form-control-sm"
                                        placeholder="File Name">
                                    <?=form_error('attach1', '<small class="text-danger">', '</small>');?>

                                    <div class="text-center file-drop-area mt-1">
                                        <span class="fake-btn">Choose files</span>
                                        <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                        <input name="file1" class="file-input" type="file">
                                    </div>
                                </div>

                                <!-- Attach 2 -->
                                <div class="col-md-3">
                                    <label>Attachment 2</label>
                                </div>

                                <div class="col-md-9 mb-3">
                                    <input name="attach2" type="text" class="form-control form-control-sm"
                                        placeholder="File Name">
                                    <?=form_error('attach2', '<small class="text-danger">', '</small>');?>

                                    <div class="text-center file-drop-area mt-1">
                                        <span class="fake-btn">Choose files</span>
                                        <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                        <input name="file2" class="file-input" type="file">
                                    </div>
                                </div>

                                <!-- Attach 3 -->
                                <div class="col-md-3">
                                    <label>Attachment 3</label>
                                </div>

                                <div class="col-md-9 mb-3">
                                    <input name="attach3" type="text" class="form-control form-control-sm"
                                        placeholder="File Name">
                                    <?=form_error('attach3', '<small class="text-danger">', '</small>');?>

                                    <div class="text-center file-drop-area mt-1">
                                        <span class="fake-btn">Choose files</span>
                                        <span class="file-msg">or drag and drop files here (docx, doc, pdf)</span>
                                        <input name="file3" class="file-input" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <hr>
                        </div>

                        <div class="col-md-3">
                        </div>

                        <div class="col-md-9 text-right">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save
                                changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
var PS = new SlimSelect({
    select: '#programStatus',
    placeholder: 'Select program status ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});
PS.set('Fix');

var PE = $("#programStatus").val();
if (PE == "Fix") {
    $("#attachment").show();
} else {
    $("#attachment").hide();
}

function programFix() {
    var PE = $("#programStatus").val();
    if (PE == "Fix") {
        $("#attachment").show();
    } else {
        $("#attachment").hide();
    }
}
</script>