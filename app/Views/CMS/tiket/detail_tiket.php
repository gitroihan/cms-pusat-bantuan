<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Tiket
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <?php foreach ($tiket as $tiket) : ?>
        <div class="card px-4 py-3 border-0 shadow">
            <div class="p-2 pt-0 row">
                <label for="nama" class="col-sm-1 col-form-label">Judul</label>
                <div class="col-sm-11">
                    <p class="form-control-plaintext">: <?= $tiket['nama_kontak'] ?></p>
                </div>
            </div>
            <div class="p-2 pt-0 row">
                <label for="email" class="col-sm-1 col-form-label">Email</label>
                <div class="col-sm-11">
                    <p class="form-control-plaintext">: <?= $tiket['email'] ?></p>
                </div>
            </div>
            <div class="p-2 pt-0 row">
                <label for="subjek" class="col-sm-1 col-form-label">Subjek</label>
                <div class="col-sm-11">
                    <p class="form-control-plaintext">: <?= $tiket['subjek'] ?></p>
                </div>
            </div>
            <div class="p-2 pt-0 row">
                <label for="deskripsi" class="col-sm-1 col-form-label">Deskripsi</label>
                <div class="col-sm-11">
                    <p class="form-control-plaintext">:  </p>
                </div>
                <textarea id="editor" name="editor" class="form-control" readonly cols="30" rows="10" style="background-color: white; height: 350px; overflow-y: auto;"><?= $tiket['deskripsi'] ?></textarea>
            </div>
        </div>
        <button type="submit" class="btn text-light mt-3" style="background-color: #03C988;">ubah status</button>
    <?php endforeach; ?>
</div>

<?php $this->endSection() ?>