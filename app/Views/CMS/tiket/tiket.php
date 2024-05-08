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
            <tbody>
                <tr>
                    <td>aditha</td>
                    <td>aditha@gmail.com</td>
                    <td><a href="/detail_tiket">detail</a></td>
                </tr>
                <tr>
                    <td>ahmad</td>
                    <td>ahmad@gmail.com</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>surya</td>
                    <td>surya@gmail.com</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>ghazi</td>
                    <td>ghazi@gmail.com</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>aditha</td>
                    <td>aditha@gmail.com</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>ahmad</td>
                    <td>ahmad@gmail.com</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>surya</td>
                    <td>surya@gmail.com</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>ghazi</td>
                    <td>ghazi@gmail.com</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>aditha</td>
                    <td>aditha@gmail.com</td>
                    <td><a href="">detail</a></td>
                </tr>
                <tr>
                    <td>ghazi</td>
                    <td>ghazi@gmail.com</td>
                    <td><a href="">detail</a></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
<?php $this->endSection() ?>