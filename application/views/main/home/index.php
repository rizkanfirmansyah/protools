<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Dashboard</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ml-auto">
                        <li><a href="<?= base_url('assets/') ?>#">Dashboard</a></li>
                    </ol>
                    <a href="<?= base_url('assets/') ?>https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger  d-none d-md-block pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade
                        to Pro</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Project</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ml-auto"><span class="counter text-success">659</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Timeline</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash2"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ml-auto"><span class="counter text-purple">869</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Participant</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ml-auto"><span class="counter text-info">911</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-heading">
                        PROJECT LISTING
                    </div>
                    <div class="card-body">
                        <ul class="chatonline" id="projectListing">

                            <li>
                                <div class="call-chat">
                                    <button data-id="624562345632" class="klikForDetail btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-info"></i>
                                    </button>
                                    <button class="klikForTimeline btn btn-info btn-circle btn" type="button">
                                        <i class="fas fa-list"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img src="<?= base_url('assets/') ?>plugins/images/users/genu.jpg" alt="user-img" class="img-circle">
                                    <div class="ml-2">
                                        <span class="text-dark text-muted">Membuat ERP <small class="d-block text-warning">Away
                                                <img src="<?= base_url('assets/') ?>plugins/images/users/genu.jpg" alt="user-img" class="img-circle" style="width: 20px;">
                                                <img src="<?= base_url('assets/') ?>plugins/images/users/genu.jpg" alt="user-img" class="img-circle" style="width: 20px; margin-left: -15px;">
                                            </small></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8 col-sm-12" id="recent-timeline">

            </div>

        </div>
    </div>