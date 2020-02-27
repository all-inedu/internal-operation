</div>
</div>

<div class="overlay"></div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src='<?=base_url();?>assets/js/jquery.zoom.js'></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/fc-3.3.0/fh-3.1.6/datatables.min.js">
</script>

<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
</script>
<!-- jQuery Custom Scroller CDN -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js">
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
$("textarea").each(function() {
    CKEDITOR.replace(this, {
        toolbar: [{
                name: 'document',
            }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
            ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo',
                'Redo'
            ], // Line break - next group will be placed in new line.
            {
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Underline']
            }
        ],
        height: 100
    });
});



$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})

const flashSuccess = $('.flash-data').data('success');
const flashError = $('.flash-data').data('error');
const flashWarning = $('.flash-data').data('warning');
const flashLogin = $('.flash-data').data('login');

if (flashSuccess) {
    Swal.fire(
        'Congratulations !',
        '' + flashSuccess,
        'success'
    )
} else if (flashError) {
    Swal.fire(
        'Error !',
        '' + flashError,
        'error'
    )
} else if (flashLogin) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    Toast.fire({
        type: 'success',
        title: '' + flashLogin
    })
} else if (flashWarning) {
    Swal.fire(
        'Information !',
        '' + flashWarning,
        'info'
    )
}

// delete-button
$('.delete-button').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    const message = $(this).data('message');
    Swal.fire({
        icon: 'question',
        title: 'Are you sure,',
        text: 'Delete this ' + message + ' data?',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        showCancelButton: true
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

// delete-button
$('.cancel-button').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    const message = $(this).data('message');
    Swal.fire({
        icon: 'question',
        title: 'Are you sure,',
        text: 'Cancel this ' + message + ' ?',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, cancel',
        showCancelButton: true
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

// convert-button
$('.convert-button').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    const message = $(this).data('message');
    Swal.fire({
        icon: 'info',
        title: 'Are you sure,',
        text: message,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, convert it!',
        showCancelButton: true
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
$(document).ready(function() {
    var tables = $('table.display').DataTable({
        "bLengthChange": true,
        "pageLength": 15,
        "bPaginate": true,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": true,
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excel',
            text: '<i class="fas fa-file-excel"></i> &nbsp; Export to Excell'
        }]
    });

    $('#searchData1').on('keyup', function() {
        tables.column(1).search($(this).val()).draw();
    });

    $('#searchData2').on('keyup', function() {
        tables.column(2).search($(this).val()).draw();
    });

    $('#searchData3').on('keyup', function() {
        tables.column(3).search($(this).val()).draw();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function() {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});

var userList = new List('users', {
    valueNames: ['name', 'born', 'email'],
    page: 5,
    pagination: true
});
</script>
</body>

</html>