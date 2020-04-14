<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All-In Eduspace</title>
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/27e56cd4ff.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css');?>/icofont/icofont.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Monda&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Gugi&display=swap');

    body {
        font-family: 'Kanit', sans-serif;
        color: #63615f;
    }

    .home {
        background: #E88412;
        margin: -29px -11px;
        padding-top: 14px;
        padding-bottom: 12px;
        text-align: center;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
    }

    .allin-header {
        position: static;
        padding-top: 20px;
        background-image: url("assets/img/bg.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        /* background: rgb(76, 88, 158);
        background: linear-gradient(90deg, rgba(76, 88, 158, 1) 0%, rgba(9, 165, 196, 1) 100%); */
        height: auto;
        padding-bottom: 90px;
        color: #ffffff;
        border-radius: 0px 0px 15% 15%;
        z-index: 1;
        font-family: 'Gugi', cursive;
    }

    .allin-header .card {
        opacity: 0.9;
        padding: 10px 10px 2px 10px;
    }

    .logo {
        margin-top: 0;
        width: 60%;
    }

    .menus {
        margin-top: -5%;
    }

    .menus-card {
        background: #fff;
        transition: all .5s;
    }

    .menus-card:hover {
        background: #62A8DC;
        color: #fff;
    }

    .menus-card a {
        padding: 15px;
        color: #62A8DC;
    }

    .menus-card a:hover {
        color: #fff;
    }

    .divider {
        position: absolute;
        margin-top: -20%;
        background: #f2f2f2;
        width: 100%;
        height: 300px;
        z-index: -999;
    }

    .our-vision {
        position: static;
        background: #f2f2f2;
        width: 100%;
        padding-top: 20px;
        height: auto;
        padding-bottom: 30px;
        z-index: -999;
    }

    .our-vision .card {
        height: 330px;
    }

    .our-vision p {
        font-size: 14px;
        letter-spacing: 0.5px;

    }

    .core-values {
        background-image: url("assets/img/bg.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        position: static;
        width: 100%;
        padding-top: 20px;
        padding-bottom: 50px;
        height: auto;
    }

    .carousel-control-prev {
        position: absolute;
        top: 90%;
        left: 40%;
        background: #4066A5;
        padding: 20px;
        width: 50px;
        height: 20px;

    }

    .carousel-control-next {
        position: absolute;
        top: 90%;
        right: 40%;
        background: #4066A5;
        padding: 20px;
        width: 50px;
        height: 20px;
    }

    .oke {
        padding: 10px;
        position: absolute;
        top: 10px;
    }

    .carousel-indicators .active {
        background: #e74c3c;
    }

    .img-core {
        width: 80%;
        height: 300px;
    }

    ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
    }

    ::-webkit-scrollbar-thumb {
        background: #2e7ee8;
        border-radius: 10px;
    }

    @media only screen and (max-width: 500px) {
        .home {
            margin: -24px -12px;
            padding-top: 9px;
            padding-bottom: 7px;
        }

        .allin-header {
            border-radius: 0px 0px 5% 5%;
        }

        .allin-header .card h4 {
            font-size: 15px;
        }

        .logo {
            margin-top: 30px;
            width: 90%;
        }

        .menus {
            margin-top: -20%;
        }

        .menus-card {
            font-size: 12px;
        }

        .divider {
            margin-top: -50%;
            height: 20px;
        }

        .our-vision {
            position: relative;
            margin-top: -50%;
            padding-top: 185px;
            height: auto;
            padding-bottom: 30px;
            z-index: -1;
        }

        .our-vision .card {
            height: auto;
        }

        .carousel-control-prev {
            left: 29%;
            top: 80%;
        }

        .carousel-control-next {
            right: 29%;
            top: 80%;
        }

        .line {
            border: 1px solid #dedede;
            margin-top: 10px;
        }

        .img-core {
            width: 80%;
            height: 150px;
        }
    }
    </style>
</head>

<body>
    <?php
if ($this->session->flashdata('success')) {
    echo '<div class="flash-data" data-success="' . $this->session->flashdata('success') . '"></div>';
} else if ($this->session->flashdata('error')) {
    echo '<div class="flash-data" data-error="' . $this->session->flashdata('error') . '"></div>';
} else if ($this->session->flashdata('warning')) {
    echo '<div class="flash-data" data-warning="' . $this->session->flashdata('warning') . '"></div>';
}
?>
    <section class="allin-header">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card shadow">
                        <div class="row">
                            <div class="col-10 my-auto">
                                <h4 class="text-left">
                                    <a href="" class="text-decoration-none text-muted">Internal Operation</a>
                                </h4>
                            </div>
                            <div class="col-2 my-auto">
                                <div class="home">
                                    <a href="" class="text-decoration-none text-white"><i class="fas fa-home"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5 mb-3">
            <h1 style="font-size:50px;">ALL-IN EDUSPACE - PUSH GITHUB</h1>
        </div>
    </section>
    <section class="menus">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <div class="row pt-3">
                        <div class="col-md-3 col-6 text-center mb-2">
                            <div class="card shadow menus-card">
                                <a href="<?=base_url('auth/login/as/client');?>" class="text-decoration-none">
                                    <i class="icofont-bullhorn icofont-3x"></i>
                                    <p class="mb-0">Client Management</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 text-center  mb-2">
                            <div class="card shadow menus-card">
                                <a href="<?=base_url('auth/login/as/bizdev');?>" class="text-decoration-none">
                                    <i class="icofont-presentation icofont-3x"></i>
                                    <p class="mb-0">Business Development</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 text-center  mb-2">
                            <div class="card shadow menus-card">
                                <a href="<?=base_url('auth/login/as/finance');?>" class="text-decoration-none">
                                    <i class="icofont-dollar icofont-3x"></i>
                                    <p class="mb-0">Finance</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 text-center  mb-2">
                            <div class="card shadow menus-card">
                                <a href="<?=base_url('auth/login/as/hr');?>" class="text-decoration-none">
                                    <i class="icofont-group icofont-3x"></i>
                                    <p class="mb-0">Human Resource</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="divider">
    </div>
    <section class="our-vision">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-11 mx-auto">
                    <div class="row">
                        <div class="col-lg-6 col-12 text-center">
                            <div class="card shadow">
                                <div class="card-body">
                                    <img src="<?=base_url('assets/img/vision.png');?>" width="50%" class=-2">
                                    <p>
                                        ALL-in Eduspace aspires to be the cornerstone of student's educational journey,
                                        empowering
                                        them
                                        with requisite real-world skills and extensive network to achieve their dreams.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="col-lg-6 text-center">
                            <div class="card shadow">
                                <div class="card-body">
                                    <img src="<?=base_url('assets/img/mission.png');?>" width="50%" class=-2">
                                    <p>
                                        We make true impacts in students’ lives by: <br>
                                        1. Providing personal development guidance. <br>
                                        2. Developing leadership, communication, critical thinking and analytical
                                        skills.
                                        <br>
                                        3. Opening doors to a world class education abroad. <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="core-values">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h3 class="text-center pt-3 font-weight-bold text-white">Our Core Values</h3>
                    <hr width="10%" style="border:2px solid #fff; margin-top:-5px;">
                    <div class="card mt-3 shadow">
                        <div class="card-body">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active text-center">
                                        <img src="<?=base_url('assets/img/1-01.png');?>" class="img-core mt-2 mb-5-3">
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img src="<?=base_url('assets/img/2-01.png');?>" class="img-core mt-2 mb-5-3">
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img src="<?=base_url('assets/img/3-01.png');?>" class="img-core mt-2 mb-5-3">
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img src="<?=base_url('assets/img/4-01.png');?>" class="img-core mt-2 mb-5-3">
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img src="<?=base_url('assets/img/5-01.png');?>" class="img-core mt-2 mb-5-3">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleFade" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only bg-dark">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleFade" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
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
</script>

</html>