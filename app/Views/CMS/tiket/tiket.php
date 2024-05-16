<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Tiket
<?php $this->endSection() ?>
<?php $this->section('content') ?>

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="card px-4 py-3 border-0 shadow" >
            <div class="d-sm-flex align-items-center justify-content-between mb-3">
                <h1 class="h3 mr-auto mb-0 text-gray-800">Tiket</h1>
            </div>
        <table id="myTable" class="table table-bordered  table-sm" style="text-align: center; ">
            <thead class="thead-dark">
                <td style="width: 20%;">nama</td>
                <td>email</td>
                <td style="width: 10%;"></td>
            </thead>
            <?php foreach ($tiket as $tiket) : ?>
            <tbody>
                <tr>
                    <td><?= $tiket['nama_kontak'] ?></td>
                    <td><?= $tiket['email'] ?></td>
                    <td class="text-center"><a href="/detail_tiket/<?= $tiket['id'] ?>"><i class="fa-solid fa-circle-info fa-2x"></i></a></td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
        </div>
    </div>
<?php $this->endSection() ?>