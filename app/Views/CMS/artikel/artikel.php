<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Artikel
<?php $this->endSection() ?>
<?php $this->section('content') ?>

    <div class="container-fluid">

        <div class="card px-4 py-3 border-0 shadow mb-3" >
            <div class="d-sm-flex align-items-center justify-content-between mb-3">
                <h1 class="h3 mr-auto mb-0 text-gray-800">Artikel</h1>
                <div class="my-1">
                    <a href="/tambah_artikel" class="btn shadow-sm mr-3 text-light" style="background-color: #03C988;">
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
                <td style="width: 5%;"></td>
            </thead>
            <tbody>
                <tr>
                    <td>artikel A</td>
                    <td> Ahmad</td>
                    <td>onboarding</td>
                    <td>24-04-2024</td>
                    <td class="text-center"><a href="/detail_artikel"><i class="fa-solid fa-circle-info fa-2x"></i></a></td>
                </tr>
                <tr>
                    <td>artikel a</td>
                    <td>ghazi</td>
                    <td>radiologi</td>
                    <td>24-04-2024</td>
                    <td class="text-center"><a href=""><i class="fa-solid fa-circle-info fa-2x"></i></a></td>
                </tr>
                <tr>
                    <td>artikel A</td>
                    <td> Ahmad</td>
                    <td>onboarding</td>
                    <td>24-04-2024</td>
                    <td class="text-center"><a href=""><i class="fa-solid fa-circle-info fa-2x"></i></a></td>
                </tr>
                <tr>
                    <td>artikel a</td>
                    <td>ghazi</td>
                    <td>radiologi</td>
                    <td>24-04-2024</td>
                    <td class="text-center"><a href=""><i class="fa-solid fa-circle-info fa-2x"></i></a></td>
                </tr>
                <tr>
                    <td>artikel A</td>
                    <td> Ahmad</td>
                    <td>onboarding</td>
                    <td>24-04-2024</td>
                    <td class="text-center"><a href=""><i class="fa-solid fa-circle-info fa-2x"></i></a></td>
                </tr>
                <tr>
                    <td>artikel a</td>
                    <td>ghazi</td>
                    <td>radiologi</td>
                    <td>24-04-2024</td>
                    <td class="text-center"><a href=""><i class="fa-solid fa-circle-info fa-2x"></i></a></td>
                </tr>
                <tr>
                    <td>artikel A</td>
                    <td> Ahmad</td>
                    <td>onboarding</td>
                    <td>24-04-2024</td>
                    <td class="text-center"><a href=""><i class="fa-solid fa-circle-info fa-2x"></i></a></td>
                </tr>
                <tr>
                    <td>artikel a</td>
                    <td>ghazi</td>
                    <td>radiologi</td>
                    <td>24-04-2024</td>
                    <td class="text-center"><a href=""><i class="fa-solid fa-circle-info fa-2x"></i></a></td>
                </tr>
                <tr>
                    <td>artikel A</td>
                    <td> Ahmad</td>
                    <td>onboarding</td>
                    <td>24-04-2024</td>
                    <td class="text-center"><a href=""><i class="fa-solid fa-circle-info fa-2x"></i></a></td>
                </tr>
                <tr>
                    <td>artikel a</td>
                    <td>ghazi</td>
                    <td>radiologi</td>
                    <td>24-04-2024</td>
                    <td class="text-center"><a href=""><i class="fa-solid fa-circle-info fa-2x"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>

    </div>
<?php $this->endSection() ?>