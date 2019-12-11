<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/27e56cd4ff.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.css" rel="stylesheet"> -->
<style>
@import url('https://fonts.googleapis.com/css?family=Varela+Round&display=swap');

body {
    font-family: 'Varela Round', sans-serif;
}

.zoom {
    display: inline-block;
    position: relative;
}

/* magnifying glass icon */
.zoom:after {
    content: '';
    display: block;
    width: 33px;
    height: 33px;
    position: absolute;
    top: 0;
    right: 0;
    /* background: url(icon.png); */
}

.zoom img {
    display: block;
}

.zoom img::selection {
    background-color: transparent;
}

.pagination {
    display: flex;
    justify-content: center;
}

.pagination li {
    right: 0;
    margin-top: 10px;
    display: inline-block;
    padding: 5px;
}

.pagination li a {
    text-decoration: none;
    color: #ffffff;
    background: #0069D9;
    padding: 5px 15px;
    border-radius: 15px;
    transition: 0.4s;
}

.pagination li a:hover {
    text-decoration: none;
    color: #ffffff;
    background: #ea7f15;
    transition: 0.4s;
}

.file-drop-area {
    position: relative;
    display: flex;
    align-items: center;
    margin: 5px 0px;
    width: 100%;
    padding: 5px;
    border: 1px solid #dedede;
    ;
    border-radius: 3px;
    transition: 0.2s;

    &.is-active {
        background-color: red;
    }
}

.fake-btn {
    flex-shrink: 0;
    background-color: #3b6ddb;
    border: 1px solid #dedede;
    color: white;
    border-radius: 3px;
    padding: 15px 15px;
    margin-right: 0px;
    font-size: 12px;
    text-transform: uppercase;
}

.file-msg {
    width: 100%;
    padding: 15px 15px;
    font-size: small;
    font-weight: 300;
    line-height: 1.4;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    border: 1px dashed #dedede;
    border-radius: 3px;
}

.file-input {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    cursor: pointer;
    opacity: 0;

    &:focus {
        outline: none;
    }
}

.see-detail {
    background: #113c73;
    margin: -20px -5px;
    padding: 32px 0px;
    transition: 1s;
}

.see-detail:hover {
    background: #f37441;
    transition: 1s;
}
</style>
<!-- </head>

<body> -->
<nav aria-label="breadcrumb" style="margin-top:10px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
</nav>
<div class="line" style="margin-top:0px;"></div>
<div class="form">
    <div class="row mb-5">
        <div class="col-md-5 mb-3">
            <form action="" method="post">
                <div class="card">
                    <div class="card-header">
                        <i class="far fa-keyboard"></i>&nbsp; Form
                    </div>
                    <div class="card-body">
                        <span class='zoom' id='ex1'>
                            <img src='<?=base_url();?>assets/img/daisy.jpg' width='100%' alt='Daisy on the Ohoopee' />
                        </span>

                        <!-- one coloumn -->
                        <div class="form-group">
                            <label>Input Text</label>
                            <input name="" type="text" class="form-control form-control-sm" placeholder="Enter text">
                            <?=form_error('text', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>

                        <!-- much coloumn -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Input Number
                                    </label>
                                    <input name="phone" type="text" class="form-control form-control-sm"
                                        placeholder="Enter text">
                                    <?=form_error('phone', '<small class="form-text text-muted">Please input.</small>');?>
                                </div>
                            </div>
                            <div class="col-md-4 col">
                                <div class="form-group">
                                    <label>Input password</label>
                                    <input name="" type="password" class="form-control form-control-sm"
                                        placeholder="Enter text">
                                    <?=form_error('text', '<small class="form-text text-muted">Please input.</small>');?>
                                </div>
                            </div>
                            <div class="col-md-4 col">
                                <div class="form-group">
                                    <label>Input Number</label>
                                    <input name="" type="number" class="form-control form-control-sm"
                                        placeholder="Enter text">
                                    <?=form_error('text', '<small class="form-text text-muted">Please input.</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Textarea</label>
                            <textarea class="form-control form-control-sm" rows="3"></textarea>
                            <?=form_error('text', '<small class="form-text text-muted">Please input.</small>');?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select</label>
                                    <select id="select">
                                        <option data-placeholder="true"></option>
                                        <option value="1">Test 1</option>
                                        <option value="2">Test 2</option>
                                        <option value="3">Test 3</option>
                                        <option value="4">Test 4</option>
                                    </select>
                                    <?=form_error('text', '<small class="form-text text-muted">Please input.</small>');?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Input Date</label>
                                    <input name="" type="date" id="date" class="form-control form-control-sm"
                                        placeholder="Enter text">
                                    <?=form_error('text', '<small class="form-text text-muted">Please input.</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class=" text-center file-drop-area">
                            <span class="fake-btn">Choose files</span>
                            <span class="file-msg">or drag and drop files here</span>
                            <input class="file-input" type="file">
                        </div>
                        <div class=" text-center file-drop-area">
                            <span class="fake-btn">Choose files</span>
                            <span class="file-msg">or drag and drop files here</span>
                            <input class="file-input" type="file" multiple>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <a href="" class="btn btn-block btn-sm btn-warning"><i
                                        class="fas fa-arrow-circle-left"></i>&nbsp; Cancel</a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-block btn-sm btn-primary"><i
                                        class="far fa-save"></i>&nbsp; Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-7">
            <div id="users">
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-7">
                        <div class="input-group mb-3">
                            <input type="text" class="search form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="sort btn btn-outline-secondary" data-sort="name">Name</button>
                                <button class="sort btn btn-outline-secondary" data-sort="born">Year</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Child elements of container with class="list" becomes list items -->
                <div class="list">
                    <div class="card mb-1 shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <h6 class="name">Jonny Stromberg</h6>
                                    <spam class="born">1986</spam> |
                                    <spam class="email">jonny@gmail.com</spam>
                                </div>
                                <div class="col text-center see-detail" style="">
                                    <a href="" class="text-white icon-hover"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card  mb-1 shadow">
                        <div class="card-body">
                            <h6 class="name">Jonas Arnklint</h6>
                            <spam class="born">1985</spam> |
                            <spam class="email">jonas@gmail.com</spam>
                        </div>
                    </div>
                    <div class="card  mb-1 shadow">
                        <div class="card-body">
                            <h6 class="name">Martina Elm</h6>
                            <spam class="born">1986</spam> |
                            <spam class="email">martina@gmail.com</spam>
                        </div>
                    </div>
                    <div class="card mb-1 shadow">
                        <div class="card-body">
                            <h6 class="name">Gustaf Lindqvist</h6>
                            <spam class="born">1983</spam> |
                            <spam class="email">gustaf@gmail.com</spam>
                        </div>
                    </div>
                    <div class="card mb-1 shadow">
                        <div class="card-body">
                            <h6 class="name">Gandi Tua</h6>
                            <spam class="born">1983</spam> |
                            <spam class="email">gandi@gmail.com</spam>
                        </div>
                    </div>
                    <div class="card mb-1 shadow">
                        <div class="card-body">
                            <h6 class="name">Hartini</h6>
                            <spam class="born">1985</spam> |
                            <spam class="email">hartini@gmail.com</spam>
                        </div>
                    </div>
                    <div class="card mb-1 shadow">
                        <div class="card-body">
                            <h6 class="name">Rizka Iraw</h6>
                            <spam class="born">1989</spam> |
                            <spam class="email">rizka@gmail.com</spam>
                        </div>
                    </div>
                    <div class="card mb-1 shadow">
                        <div class="card-body">
                            <h6 class="name">Anggita Pratiwi</h6>
                            <spam class="born">1986</spam> |
                            <spam class="email">anggita@gmail.com</spam>
                        </div>
                    </div>
                    <div class="card mb-1 shadow">
                        <div class="card-body">
                            <h6 class="name">Ihsan Tri</h6>
                            <spam class="born">1993</spam> |
                            <spam class="email">ihsan@gmail.com</spam>
                        </div>
                    </div>
                    <div class="card mb-1 shadow">
                        <div class="card-body">
                            <h6 class="name">Emilia Wati</h6>
                            <spam class="born">1996</spam> |
                            <spam class="email">emilia@gmail.com</spam>
                        </div>
                    </div>
                    <div class="card mb-1 shadow">
                        <div class="card-body">
                            <h6 class="name">Edward Wati</h6>
                            <spam class="born">1996</spam> |
                            <spam class="email">edward@gmail.com</spam>
                        </div>
                    </div>
                </div>
                <div class="center">
                    <ul class="pagination"></ul>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    Automatic USD
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <?php
                                    $data = file_get_contents("https://kurs.web.id/api/v1/bi");
                                    $json = json_decode($data, TRUE);
                                ?>
                            <div class="form-group">
                                <label>Current USD</label>
                                <input name="" type="number" class="form-control form-control-sm" placeholder=""
                                    value="<?=round($json['jual']);?>" id="currentUSD">
                                <?=form_error('text', '<small class="form-text text-muted">Please input.</small>');?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Input USD</label>
                                <input name="" type="number" class="form-control form-control-sm" placeholder=""
                                    id="usd">
                                <?=form_error('text', '<small class="form-text text-muted">Please input.</small>');?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Convert Rupiah</label>
                                <input name="" type="text" class="form-control form-control-sm" placeholder="" id="idr">
                                <?=form_error('text', '<small class="form-text text-muted">Please input.</small>');?>
                            </div>
                        </div>
                    </div>
                    <div class="input_fields_container_part">
                        <div>
                            <select name="" id="select1">
                                <option value="1">2019</option>
                                <option value="2">2020</option>
                                <option value="3">2021</option>
                            </select>
                            <button class="btn btn-sm btn-primary add_more_button">Add More Fields</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </body> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<!-- <script src='<?=base_url();?>assets/js/jquery.zoom.js'></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

<script>
new SlimSelect({
    select: '#select1',
    placeholder: 'Select ..',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
})

$(document).ready(function() {
    var max_fields_limit = 8; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(
        e) { //click event on add more fields button having class add_more_button
        e.preventDefault();
        if (x < max_fields_limit) { //check conditions
            x++; //counter increment
            $('.input_fields_container_part').append(
                '<div><select name="" id="select' + x + '">' +
                '<option value="1">2019</option>' +
                '<option value="2">2020</option>' +
                '<option value="3">2021</option>' +
                '</select>' +
                '<a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'
            ); //add input field
            new SlimSelect({
                select: '#select' + x,
                placeholder: 'Select ..',
                allowDeselect: true,
                deselectLabel: '<span class="text-danger">✖</span>'
            })
        }
    });
    $('.input_fields_container_part').on("click", ".remove_field", function(
        e) { //user click on remove text links
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>

<script>
var idr = document.getElementById('idr');
$('#usd').keyup(function() {
    var val1 = $('#currentUSD').val();
    var val2 = $('#usd').val();
    var val3 = val1 * val2;

    var number_string = val3.toString(),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    $('#idr').val('Rp ' + rupiah + ',00');
})


var userList = new List('users', {
    valueNames: ['name', 'born', 'email'],
    page: 5,
    pagination: true
});


new SlimSelect({
    select: '#select',
    placeholder: 'Select ..',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
})

$(document).ready(function() {
    $('.zoom').zoom();
});

var $fileInput = $('.file-input');
var $droparea = $('.file-drop-area');


// highlight drag area
$fileInput.on('dragenter focus click', function() {
    $droparea.addClass('is-active');
});

// back to normal state
$fileInput.on('dragleave blur drop', function() {
    $droparea.removeClass('is-active');
});

// change inner text
$fileInput.on('change', function() {
    var filesCount = $(this)[0].files.length;
    var $textContainer = $(this).prev();

    if (filesCount === 1) {
        // if single file is selected, show file name
        var fileName = $(this).val().split('\\').pop();
        $textContainer.text(fileName);
    } else {
        // otherwise show number of files
        $textContainer.text(filesCount + ' files selected');
    }
});
</script>
<!-- 
    </html> -->