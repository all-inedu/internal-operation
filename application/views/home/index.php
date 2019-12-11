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
    <style>
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
        background: rgb(76, 88, 158);
        background: linear-gradient(90deg, rgba(76, 88, 158, 1) 0%, rgba(9, 165, 196, 1) 100%);
        height: auto;
        padding-bottom: 90px;
        color: #ffffff;
        border-radius: 0px 0px 15% 15%;
        z-index: 1;
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
        margin-top: -7%;
    }

    .menus-img {
        width: 30%;
        cursor: pointer;
    }

    .menus-title {
        margin-top: 5px;
        font-size: 14px;
        font-weight: bold;
        color: #626d70;
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
        background: rgb(245, 188, 107);
        background: linear-gradient(90deg, rgba(245, 188, 107, 1) 0%, rgba(232, 132, 18, 1) 100%);
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

    @media only screen and (max-width: 500px) {
        .home {
            margin: -24px -12px;
            padding-top: 9px;
            padding-bottom: 7px;
        }

        .allin-header {
            border-radius: 0px 0px 5% 5%;
            height: 55vh;
            min-height: 55vh;
        }

        .allin-header .card h4 {
            font-size: 15px;
        }

        .logo {
            margin-top: 30px;
            width: 90%;
        }

        .menus {
            margin-top: -25%;
        }

        .menus-img {
            margin-top: -5px;
            width: 45px;
        }

        .menus-title {
            font-size: 11px;
            margin-bottom: -5px;
        }

        .pb {
            padding-bottom: 20px;
        }

        .divider {
            margin-top: -50%;
            height: 20px;
        }

        .our-vision {
            margin-top: -23%;
            padding-top: 100px;
            height: auto;
            padding-bottom: 30px;
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
        <div class="text-center">
            <img src="<?=base_url('assets/img/header1.png');?>" class="logo">
        </div>
    </section>
    <section class="menus">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-6 text-center pb">
                                    <a href="<?=base_url('auth/login/as/client');?>" class="text-decoration-none">
                                        <img src="<?=base_url('assets/img/m-client.png');?>"
                                            class="menus-img  animated infinite pulse">
                                        <p class="menus-title">Client Management</p>
                                    </a>
                                </div>
                                <div class="col-md-3 col-6 text-center pb">
                                    <a href="<?=base_url('auth/login/as/bizdev');?>" class="text-decoration-none">
                                        <img src="<?=base_url('assets/img/m-bizdev.png');?>"
                                            class="menus-img animated infinite pulse">
                                        <p class="menus-title">Business Development</p>
                                    </a>
                                </div>
                                <div class="col-md-3 col-6 text-center">
                                    <a href="<?=base_url('auth/login/as/finance');?>" class="text-decoration-none">
                                        <img src="<?=base_url('assets/img/m-finance.png');?>"
                                            class="menus-img animated infinite pulse">
                                        <p class="menus-title">Finance</p>
                                    </a>
                                </div>
                                <div class="col-md-3 col-6 text-center">
                                    <a href="<?=base_url('auth/login/as/hr');?>" class="text-decoration-none">
                                        <img src="<?=base_url('assets/img/m-hr.png');?>"
                                            class="menus-img animated infinite pulse">
                                        <p class="menus-title">Human Resource</p>
                                    </a>
                                </div>
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
                                    <img src="<?=base_url('assets/img/vision.png');?>" width="50%" class="pb-2">
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
                                    <img src="<?=base_url('assets/img/mission.png');?>" width="50%" class="pb-2">
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
                    <h3 class="text-center pt-3 font-weight-bold">Our Core Values</h3>
                    <hr width="10%" style="border:2px solid #704d28; margin-top:-5px;">
                    <div class="card mt-3 shadow">
                        <div class="card-body">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active text-center">
                                        <img src="<?=base_url('assets/img/1-01.png');?>"
                                            class="img-core mt-2 mb-5 pb-3">
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img src="<?=base_url('assets/img/2-01.png');?>"
                                            class="img-core mt-2 mb-5 pb-3">
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img src="<?=base_url('assets/img/3-01.png');?>"
                                            class="img-core mt-2 mb-5 pb-3">
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img src="<?=base_url('assets/img/4-01.png');?>"
                                            class="img-core mt-2 mb-5 pb-3">
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img src="<?=base_url('assets/img/5-01.png');?>"
                                            class="img-core mt-2 mb-5 pb-3">
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

</html>