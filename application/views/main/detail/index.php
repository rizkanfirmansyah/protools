<span id="idProjectGoal" data-id="<?= $project->id ?>"></span>
<div class="page-wrapper" style="display: block;">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Profile Page</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ml-auto">
                        <li><a href="#">Dashboard</a></li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col text-left">
                                <h2 class="card-title"><?= $project->title ?> <?= check_type($project->type) ?></h2>
                                <h6 class="card-subtitle"><?= date('d-M-Y', strtotime($project->deadline)) ?></h6>
                            </div>
                            <div class="col text-right">
                                <h3><?= $project->client_company ?></h3>
                                <button onclick="joinProject('<?= $project->id ?>', 'participant')" class="btn btn-info btn-rounded btn-sm mr-1" data-toggle="tooltip" title="" data-original-title="Join to project <?= $project->title ?>"> Join <i class="fas fa-user"></i></button>
                                <button onclick="joinProject('<?= $project->id ?>', 'pic')" class="btn btn-primary btn-rounded btn-sm" data-toggle="tooltip" title="" data-original-title="Join to project <?= $project->title ?> as PIC"> Join as PIC <i class="fas fa-user-check"></i></button>
                                <button onclick="editProject('<?= $project->id ?>')" class="btn btn-warning btn-rounded btn-sm"> Edit <i class="fas fa-edit"></i></button>
                                <button onclick="deleteProject('<?= $project->id ?>')" class="btn btn-danger btn-rounded btn-sm"> Delete <i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 pl-4 col-md-6 col-sm-6">
                                <img src="<?= base_url('assets/private/img/' . check_image($project->thumbnail)) ?>" class="img-fluid">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <h3 class="box-title mt-5">Product description</h3>
                                <p><?= $project->description ?></p>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="box-title mt-2">Key Highlights</h3>
                                        <ul class="list-unstyled">
                                            <?php foreach ($key as $k) : ?>
                                                <li data-toggle="tooltip" data-html="true" id="detailPoint<?= $k->idp ?>" title="<?= coba_res($k->idp) ?>"><i class="<?= status_icon($k->status) ?> pointProject"></i> <?= $k->point ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3 class="box-title mt-2">Team mate</h3>
                                        <div id="cardParticipant">
                                            <span class="text-muted">Team Not Found </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h3 class="box-title mt-5">General Info</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Company Name</td>
                                                <td> <?= $project->client_company ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Client Name</td>
                                                <td> <?= $project->client_name ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Create At</td>
                                                <td> <?= date('d-M-Y', strtotime($project->create_at)) ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Deadline</td>
                                                <td> <?= date('d-M-Y', strtotime($project->deadline)) ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Create By</td>
                                                <td> <?= $project->create_by ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h3 class="box-title mt-5">Rules</h3>
                                <?php if ($project->rules == 1) : ?>
                                    <div class="table-responsive">
                                        <table class="table" id="TableRules">
                                            <tbody>
                                                <?php foreach ($rules as $r) : ?>
                                                    <tr>
                                                        <td><?= $r->param ?></td>
                                                        <td><?= $r->value ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php else : ?>
                                    <h3 class="text-muted text-center">Rules nothing</h3>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('main/detail/additional/modal'); ?>