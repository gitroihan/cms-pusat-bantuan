<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Riwayat
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">

    <div class="card px-4 py-3 border-0 shadow">
        <div class="d-sm-flex align-items-center justify-content-between mb-5">
            <h1 class="h3 mr-auto mb-0 text-gray-800">Riwayat</h1>
        </div>
        <table id="table_riwayat" class="table table-bordered table-md" style="text-align: center; ">
            <thead class="thead-dark">
                <td>id_ref</td>
                <td>log_tipe</td>
                <td>aktivitas</td>
                <td>Alamat IP</td>
                <td>user</td>
                <td>tanggal</td>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</div>
<?php $this->endSection() ?>