<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Artikel
<?php $this->endSection() ?>
<?php $this->section('content') ?>

    <div class="container-fluid">

        <div class="card px-4 py-3 border-0 shadow" >
            <div class="d-sm-flex align-items-center justify-content-between mb-3">
                <h1 class="h3 mr-auto mb-0 text-gray-800">Artikel</h1>
                <div class="my-1">
                    <a href="/tambah_artikel" class="btn btn-warning shadow-sm mr-3 text-light" >
                        <i class="fa-solid fa-plus "></i>
                        Artikel
                    </a>
                </div>
            </div>
        <table id="myTable" class="table table-bordered table-sm" style="text-align: center; ">
            <thead class="thead-dark">
                <td>Judul</td>
                <td>Pembuat</td>
                <td>Kategori</td>
                <td>Tanggal unggah</td>
                <td></td>
            </thead>
            <tbody>
                <tr>
                    <td>artikel A</td>
                    <td> Ahmad</td>
                    <td>onboarding</td>
                    <td>24-04-2024</td>
                    <td><a href="/detail_artikel">detail</a></td>
                </tr>
                <tr>
                    <td>artikel a</td>
                    <td>ghazi</td>
                    <td>radiologi</td>
                    <td>24-04-2024</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>artikel A</td>
                    <td> Ahmad</td>
                    <td>onboarding</td>
                    <td>24-04-2024</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>artikel a</td>
                    <td>ghazi</td>
                    <td>radiologi</td>
                    <td>24-04-2024</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>artikel A</td>
                    <td> Ahmad</td>
                    <td>onboarding</td>
                    <td>24-04-2024</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>artikel a</td>
                    <td>ghazi</td>
                    <td>radiologi</td>
                    <td>24-04-2024</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>artikel A</td>
                    <td> Ahmad</td>
                    <td>onboarding</td>
                    <td>24-04-2024</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>artikel a</td>
                    <td>ghazi</td>
                    <td>radiologi</td>
                    <td>24-04-2024</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>artikel A</td>
                    <td> Ahmad</td>
                    <td>onboarding</td>
                    <td>24-04-2024</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>artikel a</td>
                    <td>ghazi</td>
                    <td>radiologi</td>
                    <td>24-04-2024</td>
                    <td><a href="">detail</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    </div>
<?php $this->endSection() ?>