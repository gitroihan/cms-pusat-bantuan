<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Kontak
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <div class="card px-4 py-3 border-2 mb-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mr-auto mb-0 text-gray-800">
                Kontak
            </h1>
        </div>
        <?php foreach ($kontak as $list) : ?>
            <div class="mb-3 p-1">
                <label for="nama">nama</label>
                <input type="text" name="nama" class="form-control bg-light" value="<?= $list['nama'] ?>" readonly>
            </div>
            <div class="mb-3 p-1">
                <label for="email">email</label>
                <input type="text" name="email" class="form-control bg-light" value="<?= $list['email'] ?>" readonly>
            </div>
            <div class="mb-3 p-1">
                <label for="nomor">no telepon</label>
                <input type="text" name="nomor" class="form-control bg-light" value="<?= $list['nomor_telepon'] ?>" readonly>
            </div>
            <div class="mb-3 p-1">
                <label for="nama">alamat</label>
                <textarea name="alamat" id="" class="form-control bg-light" readonly><?= $list['alamat'] ?></textarea>
            </div>
            <div class="mb-3 p-1">
                <label for="whatsapp">link whatsapp</label>
                <input type="text" name="whatsapp" class="form-control bg-light" value="<?= $list['link_whatsapp'] ?>" readonly>
            </div>
            <div class="mb-3 p-1">
                <label for="instagram">link instagram</label>
                <input type="text" name="instagram" class="form-control bg-light" value="<?= $list['link_instagram'] ?>" readonly>
            </div>
            <div class="mb-3 p-1 text-right">
                <a href="/cmsubah_kontak" class="btn text-light mt-3" style="background-color: #03C988;">
                    <i class="fa-regular fa-pen-to-square mr-2"></i>UBAH
                </a>
            </div>

        <?php endforeach; ?>
    </div>

</div>
<?php $this->endSection() ?>