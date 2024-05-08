<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Menu
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">

    <div class="card px-4 py-3 border-0 shadow">
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mr-auto mb-0 text-gray-800">Menu</h1>
            <div class="my-1">
                <button type="button" class=" btn btn-warning text-light shadow-sm mr-3" data-toggle="modal" data-target="#createmenuModal"><i class="fa-solid fa-plus"></i>
                    menu
                </button>
            </div>
        </div>
        <table id="myTable" class="table table-bordered table-sm" style="text-align: center; ">
            <thead class="thead-dark">
                <td style="width: 25%;">nama</td>
                <td>deskrpsi</td>
                <td style="width: 5%;"></td>
                <td style="width: 5%;"></td>
            </thead>
            <tbody>
                <tr>
                    <td>menu</td>
                    <td class="text-left">Menu adalah sebuah daftar yang berisi pilihan makanan dan minuman yang disajikan di sebuah tempat makan.</td>
                    <td class="text-center"><a type="button" class=" btn btn-primary" data-toggle="modal" data-target="#updatemenuModal"><i class="fa-regular fa-pen-to-square"></i></a></td>
                    <td class="text-center"><a type="button" class=" btn btn-danger" data-toggle="modal" data-target="#deletemenuModal"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- create menu -->
    <div class="modal fade" id="createmenuModal" tabindex="-1" role="dialog" aria-labelledby="createmenuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createmenuModalLabel">Tambah Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mt-5 col-8 m-auto">
                        <form action="/menu_save" method="post" enctype="multipart/form-data">
                            <div class="mb-3 p-2 pt-0">
                                <label for="nama">Nama</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3 p-2 pt-0">
                                <label for="username">Deskripsi</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3 p-2 pt-0">
                                <label for="nama">Link</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3 p-2 pt-0">
                                <label for="nama">Kategori</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3 p-2 pt-0">
                                <label for="nama">Urutan</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- edit menu -->
    <div class="modal fade" id="updatemenuModal" tabindex="-1" role="dialog" aria-labelledby="updatemenuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatemenuModalLabel">Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mt-5 col-8 m-auto">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3 p-2 pt-0">
                                <label for="nama">Nama</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3 p-2 pt-0">
                                <label for="username">Deskripsi</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="mb-3 p-2 pt-0">
                                <label for="nama">Link</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3 p-2 pt-0">
                                <label for="nama">Kategori</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3 p-2 pt-0">
                                <label for="nama">Urutan</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- delete menu -->
    <div class="modal fade" id="deletemenuModal" tabindex="-1" role="dialog" aria-labelledby="deletemenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title centered text-center" id="deletemenuModalLabel">Yakin ingin menghapus menu ini?</h5>
                </div>
                <div class="modal-body text-center"> <!-- Tambahkan kelas text-center di sini -->
                    <div class="mt-5 centered col-8 m-auto text-center">
                        <form action="" method="post" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-danger">HAPUS</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $this->endSection() ?>