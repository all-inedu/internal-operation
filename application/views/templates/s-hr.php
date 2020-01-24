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
            <p>Human Resource</p>
            <li>
                <a href="<?=base_url('hr/home/');?>"><i class="fas fa-home fa-fw"></i>&nbsp; Home</a>
            </li>
            <li>
                <a href="#employee" data-toggle="collapse" aria-expanded="false"><i
                        class="fas fa-users fa-fw"></i>&nbsp;
                    Employee</a>
                <ul class="list-unstyled collapse" id="employee">
                    <li>
                        <a href="<?=base_url('hr/employee/candidate');?>"><i
                                class="fas fa-arrow-circle-right"></i>&nbsp;
                            Employee Candidate</a>
                    </li>
                    <li>
                        <a href="<?=base_url('hr/employee/list');?>"><i class="fas fa-arrow-circle-right"></i>&nbsp;
                            Employee</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#mentor" data-toggle="collapse" aria-expanded="false"><i
                        class="fas fa-users-cog fa-fw"></i>&nbsp;
                    Mentor</a>
                <ul class="list-unstyled collapse" id="mentor">
                    <li>
                        <a href="<?=base_url('hr/mentor/potential');?>"><i class="fas fa-arrow-circle-right"></i>&nbsp;
                            Potential</a>
                    </li>
                    <li>
                        <a href="<?=base_url('hr/mentor/list');?>"><i class="fas fa-arrow-circle-right"></i>&nbsp;
                            Mentor / Tutor</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?=base_url('hr/editor/');?>"><i class="fas fa-user-edit fa-fw"></i>&nbsp; Editor</a>
            </li>
            <li>
                <a href="<?=base_url('hr/volunteer/');?>"><i class="fas fa-user-shield fa-fw"></i>&nbsp; Volunteer</a>
            </li>
            <li>
                <a href="<?=base_url('hr/influencer/');?>"><i class="fas fa-user-tag fa-fw"></i>&nbsp; Influencer</a>
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