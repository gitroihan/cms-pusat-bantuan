<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Tiket
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <table class="table table-borderless table-sm">
        <tr>
            <th style="width: 15%;">Nama</th>
            <td style="width: 40%;">: aditha</td>
            <th style="width: 15%;">Prioritas</th>
            <td>:</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>: aditha@gmail.com</td>
            <th>Subjek</th>
            <td>:</td>
        </tr>
        <tr>
            <th>Modul</th>
            <td>:</td>
            <th>Deskripsi</th>
            <td>: </td>
        </tr>
        <tr>
            <th>Klasifikasi</th>
            <td>:</td>
        </tr>
    </table>
    <textarea id="editor" name="editor" class="form-control" cols="30" rows="10"></textarea>
    <button type="submit" class="btn btn-success mt-3">ubah status</button>
</div>
<?php $this->endSection() ?>