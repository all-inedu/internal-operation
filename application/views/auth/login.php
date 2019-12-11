<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/27e56cd4ff.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Kanit', sans-serif;
        color: #63615f;
        font-size: 14px;
    }

    .login {
        height: 100vh;
        min-height: 100vh;
        background: #dedede;
        background: rgb(76, 88, 158);
        background: linear-gradient(90deg, rgba(76, 88, 158, 1) 0%, rgba(9, 165, 196, 1) 100%);
        padding-top: 8%;
    }

    @media only screen and (max-width: 700px) {
        .login {
            padding-top: 20%;
        }
    }
    </style>
</head>

<body>
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <img src="<?=base_url('assets/img/'.$img);?>" width="40px">
                            </div>
                            <div class="float-right mt-2">
                                <?=$role;?>
                            </div>
                        </div>
                        <div class="card-body pb-4">
                            <h4 class="text-center">Login</h4>
                            <hr width="30%">
                            <label>E-mail :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="far fa-envelope"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" placeholder="Input your email">
                            </div>
                            <label>Password :</label>
                            <div class="input-group mb-3 pb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Input your password">
                            </div>
                            <hr class="pt-2">
                            <div class="row">
                                <div class="col">
                                    <a href="<?=base_url('home');?>" class="btn btn-sm btn-warning btn-block"><i
                                            class="fas fa-chevron-circle-left"></i>&nbsp; Cancel</a>
                                </div>

                                <div class="col">
                                    <button type="button" class="btn btn-sm btn-primary btn-block"><i
                                            class="fas fa-unlock-alt"></i>&nbsp; Login</button>
                                </div>
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