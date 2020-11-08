<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand mb-3" href="<?= base_url('assets/') ?>dashboard.html">
                        <b class="logo-icon">
                            <img src="<?= base_url('assets/') ?>private/img/logo.png" alt="homepage" class="img-fluid" />
                        </b>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto d-flex align-items-center" style="margin-top: -13px;">

                        <li class="">
                            <!-- Example single danger button -->
                            <div class="btn-group ">
                                <a class="profile-pic" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?= base_url('assets/') ?>plugins/images/users/varun.jpg" alt="user-img" width="30" class="img-circle "><span class="text-white font-medium">Rizkan | Participant</span>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-book"></i> Create Project</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-key"></i> Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>