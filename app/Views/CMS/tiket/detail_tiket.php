<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Tiket
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <?php foreach ($tiket as $tiket) : ?>
        <table class="table table-borderless table-sm">
            <tr>
                <th style="width: 15%;">Nama</th>
                <td style="width: 40%;">: <?= $tiket['nama_kontak'] ?></td>
                <th style="width: 15%;">Prioritas</th>
                <td>: <?= $tiket['prioritas'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td>: <?= $tiket['email'] ?></td>
                <th>Subjek</th>
                <td>: <?= $tiket['subjek'] ?></td>
            </tr>
            <tr>-
                <th>Modul</th>
                <td>: <?= $tiket['modul'] ?></td>
            </tr>
            <tr>
                <th>Klasifikasi</th>
                <td>: <?= $tiket['klasifikasi'] ?></td>
            </tr>
        </table>
        <th>Deskripsi :</th>
        <textarea id="editor" name="editor" class="form-control" readonly cols="30" rows="10"><?= $tiket['deskripsi'] ?></textarea>
    <?php endforeach; ?>
    <button type="submit" class="btn text-light mt-3" style="background-color: #03C988;">ubah status</button>
</div>
<?php $this->endSection() ?>