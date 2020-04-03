<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Internal Operation</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/style-sidebars.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/fc-3.3.0/fh-3.1.6/datatables.min.css" />
    <link rel="stylesheet" href="<?=base_url('assets/css');?>/icofont/icofont.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/all-in.css">
</head>
<style>
body {
    height: 100vh;
    min-height: 100vh;
    background-image: linear-gradient(90deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0.93) 0%), url("<?=base_url('assets/img/bg.jpg');?>");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
}

.card {
    background-image: linear-gradient(90deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0.93) 0%), url("<?=base_url('assets/img/bg.jpg');?>");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
}
</style>

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
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <h3>Internal Operation</h3>
            </div>

            <ul class="list-unstyled components">
                <?php foreach($menus as $m): ?>
                <?php if(empty($m['menus_menu'])) { ?>
                <li>
                    <a href="<?=base_url($m['menus_link']);?>">
                        <i class="<?=$m['menus_icon'];?>"></i>&nbsp; <?=$m['menus_mainmenu'];?>
                    </a>
                </li>
                <?php } else { ?>
                <li>
                    <a href="#<?=$m['menus_id'];?>" data-toggle="collapse" aria-expanded="false">
                        <i class="<?=$m['menus_icon'];?>"></i>&nbsp;
                        <?=$m['menus_mainmenu'];?>
                    </a>
                    <ul class="list-unstyled collapse" id="<?=$m['menus_id'];?>">
                        <?php
                        $mainmenu = $m['menus_mainmenu'];
                        $submenu = $this->menu->showMainMenu($empl_id, $mainmenu, 1);
                    ?>
                        <?php foreach ($submenu as $sm ) : ?>
                        <li>
                            <a href="<?=base_url($sm['menus_link']);?>">
                                <i class="fas fa-arrow-circle-right"></i>&nbsp;
                                <?=$sm['menus_menu'];?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php } ?>
                <?php endforeach; ?>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="<?=base_url('auth/login/sign-out');?>" class="download">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <section class="container-fluid sticky-top bg-white mb-2 shadow" style="padding:0; z-index:900">
                <div class="allin-head"> </div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light shadow" style="margin-bottom:10px;">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                            <span></span>
                        </button>

                        <div>
                            <?php 
                            $firstname = $this->session->userdata('empl_firstname');
                            $lastname = $this->session->userdata('empl_lastname');
                            $fullname = $firstname.' '.$lastname;
                        ?>
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><?=$fullname;?>
                                        &nbsp; &nbsp;<i class="fas fa-user"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </section>