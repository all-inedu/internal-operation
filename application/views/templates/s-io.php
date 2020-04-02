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
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Hafidz Annur Fanany &nbsp; &nbsp;<i
                                        class="fas fa-user"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>