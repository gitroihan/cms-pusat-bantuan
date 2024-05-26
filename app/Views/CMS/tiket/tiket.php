<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Tiket
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card px-4 py-3 border-2 mb-5">
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mr-auto mb-0 text-gray-800">Tiket</h1>
        </div>
        <table id="table_tiket" class="table table-hover table-md" style="text-align: center; ">
            <thead class="thead-dark">
                <td style="width: 20%;">nama</td>
                <td>email</td>
                <td style="width: 10%;"></td>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection() ?>