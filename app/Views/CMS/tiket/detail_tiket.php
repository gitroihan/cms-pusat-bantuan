<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Tiket
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">

    <div class="card px-4 py-3 border-0 shadow">
        <h1 class="h3 mr-auto mb-3 text-gray-800">
            <a href="/cmstiket"><i class="fa-solid fa-arrow-left text-gray-800 mr-2"></i></a>
            Detail tiket
        </h1>
        <div class="p-1 pt-0 row">
            <label for="nama" class="col-sm-1 col-form-label">Nama</label>
            <div class="col-sm-11">
                <p class="form-control-plaintext">: <?= $tiket['nama_kontak'] ?></p>
            </div>
        </div>
        <div class="p-1 pt-0 row">
            <label for="email" class="col-sm-1 col-form-label">Email</label>
            <div class="col-sm-11">
                <p class="form-control-plaintext">: <?= $tiket['email'] ?></p>
            </div>
        </div>
        <div class="p-1 pt-0 row">
            <label for="subjek" class="col-sm-1 col-form-label">Subjek</label>
            <div class="col-sm-11">
                <p class="form-control-plaintext">: <?= $tiket['subjek'] ?></p>
            </div>
        </div>
        <div class="p-1 pt-0 row">
            <label for="subjek" class="col-sm-1 col-form-label">tanggal</label>
            <div class="col-sm-11">
                <p class="form-control-plaintext">: <?= $formattedDateTime ?></p>
            </div>
        </div>
        <div class="p-1 pt-0 row">
            <label for="deskripsi" class="col-sm-1 col-form-label">Deskripsi</label>
            <div class="col-sm-11">
                <p class="form-control-plaintext">: </p>
            </div>
            <!-- <textarea id="editor" name="editor" class="form-control" readonly cols="30" rows="10" style="background-color: white; height: 350px; overflow-y: auto;"></textarea> -->
            <p><?= $tiket['deskripsi'] ?></p>
        </div>
    </div>
    <div class="mb-3 p-1 text-right">
        <?php if ($tiket['status'] != 'Selesai') : ?>
            <form method="post" action="/ubah_status/<?= $tiket['id'] ?>">
                <button type="submit" class="btn text-light mt-3" style="background-color: #03C988;">
                    <i class="fa-regular fa-paper-plane mr-2"></i>Ubah Status
                </button>
            </form>
        <?php endif; ?>
    </div>
</div>

<?php $this->endSection() ?>