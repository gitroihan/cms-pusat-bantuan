<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
content
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="cms/css2/style-konten2.css">

<div class="bungkus">
    <div class="konten-banner">
        
    <div class="d-sm-flex align-items-center justify-content-between mb-3 ml-3">
            <h1 class="h3 mr-auto mb-0 text-gray-800">Content</h1>
        </div>
        <div class="col-12 d-flex flex-wrap gap-3 mb-4" style="height: fit-content; display: flex; flex-wrap: wrap; ">
            <div class="card " style="padding: 24px; height: fit-content; width: 100%; flex: 1 0 500px;">
                <div class="card-kanan-atas">
                    <i class="fa-solid fa-pen-to-square mr-3" style="font-size: 30px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaleditartikel"></i>
                </div>
                <div class="align-items-center justify-content-center p-0 ml-5 mt-3">
                    <div class="image-box border align-items-center justify-content-center" style="width: 1000px; height: 400px;">
                        <img src="uploads/wall4.jpg" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="col text-center">
                    <h3 class="h3-0 m-0 fs-5-vw mt-3">PT GOLDSTEP INDONESIA
                       </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>