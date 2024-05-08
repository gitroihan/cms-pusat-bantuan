<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Dashboard
<?php $this->endSection() ?>

<?php $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-between h-100">

        <div class="col-xl-4 col-md-6 mb-3 ">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1 ml-3">
                                kategori</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800 ml-3">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-regular fa-folder-open fa-5x text-success mr-5 mt-3"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1 ml-3">
                                artikel </div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800 ml-3">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-regular fa-newspaper fa-5x text-primary mr-5 mt-3"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card border-left-warning shadow h-100 w-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-warning text-uppercase mb-1 ml-3 ">
                                tiket</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800 ml-3">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-ticket-simple fa-5x text-warning mr-5 mt-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $this->endSection() ?>