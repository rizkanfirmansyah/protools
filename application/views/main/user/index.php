<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Basic Table</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ml-auto">
                        <li class="mr-3">
                            <div class="dropdown">
                                <a href="javascript:void()" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    User Role
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="start_projectList(1, 'Private')" href="javascript:void()">Private</a>
                                    <a class="dropdown-item" onclick="start_projectList(2, 'Public')" href="javascript:void()">Public</a>
                                </div>
                            </div>
                        </li>
                    </ol>
                    <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger  d-none d-md-block pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade
                        to Pro</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Basic Table</h3>
                    <p class="text-muted">Add class <code>.table</code></p>
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Username</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Image</th>
                                    <th class="border-top-0">Role</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Create At</th>
                                    <th class="border-top-0">Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>