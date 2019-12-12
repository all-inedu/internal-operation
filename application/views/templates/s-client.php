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
            <p>Client Management</p>
            <li>
                <a href="#"><i class="fas fa-home"></i>&nbsp; Home</a>
            </li>
            <li>
                <a href="#settings" data-toggle="collapse" aria-expanded="false"><i class="fas fa-users-cog"></i>&nbsp;
                    Setting</a>
                <ul class="list-unstyled collapse" id="settings">
                    <li>
                        <a href="<?=base_url('client/programs/');?>"><i class="fas fa-arrow-circle-right"></i>&nbsp;
                            Programs</a>
                    </li>
                    <li>
                        <a href="<?=base_url('client/lead/');?>"><i class="fas fa-arrow-circle-right"></i>&nbsp;
                            Lead Source</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i
                        class="fas fa-users-cog"></i>&nbsp; Client</a>
                <ul class="list-unstyled collapse" id="homeSubmenu">
                    <li>
                        <a href="<?=base_url('client/prospective/');?>"><i class="fas fa-arrow-circle-right"></i>&nbsp;
                            Prospective</a>
                    </li>
                    <li>
                        <a href="<?=base_url('client/potential/');?>"><i class="fas fa-arrow-circle-right"></i>&nbsp;
                            Potential</a>
                    </li>
                    <li>
                        <a href="<?=base_url('client/fix/');?>"><i class="fas fa-arrow-circle-right"></i>&nbsp; Fix</a>
                    </li>
                    <li>
                        <a href="<?=base_url('client/parents/');?>"><i class="fas fa-arrow-circle-right"></i>&nbsp;
                            Parents</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fas fa-tags"></i>&nbsp;
                    Program</a>
                <ul class="list-unstyled collapse" id="pageSubmenu">
                    <li>
                        <a href="<?=base_url('client/client-program/');?>"><i
                                class="fas fa-arrow-circle-right"></i>&nbsp; Student's Program</a>
                    </li>
                    <li>
                        <a href="<?=base_url('client/initial-assessment/');?>"><i
                                class="fas fa-arrow-circle-right"></i>&nbsp; Initial Assessment</a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="#" class="download">Logout</a>
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