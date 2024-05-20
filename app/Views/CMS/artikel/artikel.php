<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Artikel
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">

    <div class="card px-4 py-3 border-0 shadow mb-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mr-auto mb-0 text-gray-800">Artikel</h1>
            <div class="my-1">
                <a href="/tambah_artikel" class="btn shadow-sm mr-3 text-light" style="background-color: #03C988;">
                    <i class="fa-solid fa-plus "></i>
                    Artikel
                </a>
            </div>
        </div>
        <table id="table_artikel" class="table table-hover table-md" style="width:100%">
            <thead>
                    <td>Judul Artikel</td>
                    <td>Pembuat</td>
                    <td>Tanggal Unggah</td>
                    <td class="text-center">Detail</td>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</div>
<?php $this->endSection() ?>