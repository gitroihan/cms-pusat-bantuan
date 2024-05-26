<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Kontak
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <div class="card px-4 py-3 border-0 shadow mb-4">
        <?php foreach ($kontak as $list) : ?>
            <form action="/ubah_kontak" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $list['id'] ?>">
                <div class="mb-3 p-1">
                    <label for="nama">nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $list['nama'] ?>" required>
                </div>
                <div class="mb-3 p-1">
                    <label for="email">email</label>
                    <input type="text" name="email" class="form-control" value="<?= $list['email'] ?>">
                </div>
                <div class="mb-3 p-1">
                    <label for="nomor">no telepon</label>
                    <input type="text" name="nomor" class="form-control" value="<?= $list['nomor_telepon'] ?>">
                </div>
                <div class="mb-3 p-1">
                    <label for="nama">alamat</label>
                    <textarea name="alamat" id="" class="form-control"><?= $list['alamat'] ?></textarea>
                </div>
                <div class="mb-3 p-1">
                    <label for="whatsapp">link whatsapp</label>
                    <input type="text" name="whatsapp" class="form-control" value="<?= $list['link_whatsapp'] ?>">
                </div>
                <div class="mb-3 p-1">
                    <label for="instagram">link instagram</label>
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