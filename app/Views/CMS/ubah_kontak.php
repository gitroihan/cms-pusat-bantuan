<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Kontak
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <div class="card px-4 py-3 border-2 mb-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mr-auto mb-0 text-gray-800"><a href="/cmskontak"><i class="fa-solid fa-arrow-left text-gray-800 mr-2"></i></a>
                Kontak
            </h1>
        </div>
        <?php foreach ($kontak as $list) : ?>
            <form action="/ubah_kontak" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $list['id'] ?>">
                <div class="mb-3 p-1">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control bg-light" value="<?= $list['nama_lengkap'] ?>">
                </div>
                <div class="mb-3 p-1">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $list['nama'] ?>" required>
                </div>
                <div class="mb-3 p-1">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $list['email'] ?>">
                </div>
                <div class="mb-3 p-1">
                    <label for="nomor">No Telepon</label>
                    <input type="text" name="nomor" class="form-control" value="<?= $list['nomor_telepon'] ?>">
                </div>
                <div class="mb-3 p-1">
                    <label for="nama">Alamat</label>
                    <textarea name="alamat" id="" class="form-control"><?= $list['alamat'] ?></textarea>
                </div>
                <div class="mb-3 p-1">
                    <label for="hak_cipta">Hak Cipta</label>
                    <input type="text" name="hak_cipta" class="form-control bg-light" value="<?= $list['hak_cipta'] ?>">
                </div>
                <div class="mb-3 p-1">
                    <label for="whatsapp">Link Whatsapp</label>
                    <input type="text" name="whatsapp" class="form-control" value="<?= $list['link_whatsapp'] ?>">
                </div>
                <div class="mb-3 p-1">
                    <label for="instagram">Link Instagram</label>
                    <input type="text" name="instagram" class="form-control" value="<?= $list['link_instagram'] ?>">
                </div>
                <div class="mb-3 p-1 text-right">
                    <button type="submit" class="btn text-light" data-toggle="modal" data-target="#kontakModal" style="background-color: #03C988"><i class="fa-solid fa-floppy-disk mr-2 mt-2"></i>SIMPAN</button>
                </div>
            </form>
        <?php endforeach; ?>
    </div>

</div>
<?php $this->endSection() ?>