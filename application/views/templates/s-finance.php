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
            <ul class="list-unstyled bg-primary">
                <p class="pt-2 pb-2 font-weight-bold">Finance</p>
            </ul>
            <li>
                <a href="<?=base_url('finance/home/');?>"><i class="fas fa-home fa-fw"></i>&nbsp; Home</a>
            </li>
            <li>
                <a href="<?=base_url('finance/assets/');?>"><i class="fas fa-toolbox fa-fw"></i>&nbsp;
                    Assets</a>
            </li>
            <li>
                <a href="<?=base_url('finance/vendor/');?>"><i class="fas fa-archive fa-fw"></i>&nbsp;
                    Vendor List</a>
            </li>
            <li>
                <a href="<?=base_url('finance/purchase-request/');?>"><i class="fas fa-comments fa-fw"></i>&nbsp;
                    Purchase Request</a>
            </li>
            <li>
                <a href="<?=base_url('finance/petty-cash/');?>"><i class="fas fa-comment-dollar fa-fw"></i>&nbsp;
                    Petty Cash</a>
            </li>
            <li>
                <a href="#invoice" data-toggle="collapse" aria-expanded="false"><i
                        class="fas fa-file-invoice-dollar fa-fw"></i>&nbsp;
                    Invoice</a>
                <ul class="list-unstyled collapse" id="invoice">
                    <li>
                        <a href="<?=base_url('finance/invoice/student/');?>"><i
                                class="fas fa-arrow-circle-right"></i>&nbsp; Student Program</a>
                    </li>
                    <li>
                        <a href="<?=base_url('finance/invoice/school/');?>"><i
                                class="fas fa-arrow-circle-right"></i>&nbsp; School Program</a>
                    </li>
                    <!-- <li>
                        <a href="<?=base_url('finance/invoice/corporate/');?>"><i
                                class="fas fa-arrow-circle-right"></i>&nbsp; Corporate Program</a>
                    </li> -->
                </ul>
            </li>
            <li>
                <a href="#receipt" data-toggle="collapse" aria-expanded="false"><i
                        class="fas fa-hand-holding-usd fa-fw"></i>&nbsp;
                    Receipt</a>
                <ul class="list-unstyled collapse" id="receipt">
                    <li>
                        <a href="<?=base_url('finance/receipt/student/');?>"><i
                                class="fas fa-arrow-circle-right"></i>&nbsp; Student Program</a>
                    </li>
                    <li>
                        <a href="<?=base_url('finance/receipt/school/');?>"><i
                                class="fas fa-arrow-circle-right"></i>&nbsp; School Program</a>
                    </li>
                    <!-- <li>
                        <a href="<?=base_url('finance/receipt/corporate/');?>"><i
                                class="fas fa-arrow-circle-right"></i>&nbsp; Corporate Program</a>
                    </li> -->
                </ul>
            </li>
            <li>
                <a href="<?=base_url('finance/pph-final/');?>"><i class="fas fa-chart-bar fa-fw"></i>&nbsp; PPH
                    Final</a>
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