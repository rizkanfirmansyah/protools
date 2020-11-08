<style>
    @media (min-width: 992px) {
        .card-width-rem {
            width: 18rem;
        }
    }

    @media (max-width: 576px) {
        .card-width-rem {
            width: 24rem;
        }
    }
</style>

<div class="page-wrapper" style="min-height: 250px;">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Profile Page</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ml-auto">
                        <li class="mr-3">
                            <div class="dropdown">
                                <a href="javascript:void()" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Project Type
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="start_projectList(1, 'Private')">Private</a>
                                    <a class="dropdown-item" onclick="start_projectList(2, 'Public')">Public</a>
                                </div>
                            </div>
                        </li>
                    </ol>
                    <a class="btn btn-secondary d-md-block pull-right m-l-20 waves-effect waves-light" id="btnCreate">Create a Project</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="box-title">Project List...</h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            <h3 class="box-title text-muted" id="box-title">Public</h3>
                        </div>
                    </div>

                    <div class="row" id="projectList">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('main/project/additional/modal_create'); ?>

    <!--  -->