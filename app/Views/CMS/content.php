<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Beranda
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="cms/css2/style-konten2.css">
 
<div class="bungkus">
    <div class="konten-banner">
        
    <div class="d-sm-flex align-items-center justify-content-between mb-3 ml-3">
            <h1 class="h3 mr-auto mb-0 text-gray-800">Beranda</h1>
        </div>
        <?php foreach ($banner as $list) : ?>
        <div class="col-12 d-flex flex-wrap gap-3 mb-4" style="height: fit-content; display: flex; flex-wrap: wrap; ">
            <div class="card " style="padding: 24px; height: fit-content; width: 100%; flex: 1 0 500px;">
                <div class="card-kanan-atas">
                    <i class="fa-solid fa-pen-to-square mr-3" style="font-size: 30px;" type="button" data-bs-toggle="modal" data-bs-target="#ubahbanner<?= $list['id'] ?>"></i>
                </div>
                <div class="align-items-center justify-content-center p-0 ml-5 mt-3">
                    <div class="image-box border align-items-center justify-content-center" style="width: 1000px; height: 400px;">
                        <img src="<?= base_url('uploads/' . esc($list['gambar'])) ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                        
                    </div>
                </div>
                <div class="col text-center">
                    <h3 class="h3-0 m-0 fs-5-vw mt-3"><?= $list['teks'] ?></h3>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php foreach ($banner as $list) : ?>
    <div class="modal fade" id="ubahbanner<?= $list['id'] ?>" tabindex=" -1" role="dialog" aria-labelledby="ubahbannerLabel<?= $list['id'] ?>" aria-hidden=" true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahbannerLabel<?= $list['id'] ?>">Ubah Banner</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/ubah_content/<?= $list['id'] ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="mb-3 p-2 pt-0">
                            <label for="nama">Teks :</label>
                            <input type="text" name="teks" class="form-control" value="<?= $list['teks'] ?>" required>
                        </div>
                        <div class="mb-3 p-2 pt-0">
                            <label for="newProfilePicture">Pilih Gambar :</label>
                            <input type="file" name="gambar" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>
                        <button type="submit" class="btn" style="background-color: #03C988; color: white;">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php $this->endSection() ?>