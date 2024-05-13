<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Kategori
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-5">
        <h1 class="h3 mr-auto mb-0 text-gray-800">Kategori</h1>
        <div class="my-1">
            <button type="button" class=" btn shadow-sm mr-3 text-light" data-toggle="modal" data-target="#createCategoryModal" style="background-color: #03C988;"><i class="fa-solid fa-plus"></i>
                kategori
            </button>
        </div>
        <div class="input-group" style="width: 300px;">
            <input type="text" class="form-control border-2 small" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2" style="background-color: white; color: white;">
            <div class="input-group-append">
            <button class="btn" type="button" style="background-color: #03C988;">
                    <i class="fas fa-search fa-sm text-light"></i>
                </button>
            </div>
        </div>
    </div>


    <div class="basis pengetahuan" style="overflow-y: auto; height: 555px;">
        <div class="row col-12">
            <div class="col-md-12 mb-2 my-2">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="image-box mr-3" style="width: 5%; height: 5%;">
                                <img src="logo-goldstep.png" alt="" class="img-fluid">
                            </div>

                            <div class="col">
                                <a href="#" class="text-decoration-none">
                                    <h5 class="card-title custom-title mb-2" style="color: #13005A;">Setting</h5>
                                </a>
                                <p class="card-text mb-0">Modul setting, digunakan untuk melakukan penyesuaian data-data master yang berkaitan dengan pelayanan saat menggunakan sistem HIS seperti master harga dan data pegawai</p>
                            </div>
                            <div class="dropdown no-arrow">
                                <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v" style="color: black;"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#updateCategoryModal">
                                        <i class="fa-regular fa-pen-to-square mr-2 text-gray-400"></i>
                                        Edit
                                    </a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteCategoryModal">
                                        <i class="fa-solid fa-trash mr-2 text-gray-400"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>


<!-- create category -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border bottom">
                <h5 class="modal-title" id="createCategoryModalLabel">Tambah kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 p-2 pt-0">
                        <label for="nama">Judul</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3 p-2 pt-0">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="mb-3 p-2 pt-0">
                        <label for="newProfilePicture">Pilih ikon:</label>
                        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                    <button type="submit" class="btn" style="background-color: #03C988; color: white;">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit category -->
<div class="modal fade" id="updateCategoryModal" tabindex="-1" role="dialog" aria-labelledby="updateCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCategoryModalLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div class="mt-5 col-8 m-auto"> -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 p-2 pt-0">
                        <label for="nama">Judul</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3 p-2 pt-0">
                        <label for="username">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="mb-3 p-2 pt-0">
                        <label for="newProfilePicture">Pilih ikon:</label>
                        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                    <button type="submit" class="btn" style="background-color: #03C988; color: white;">SIMPAN</button>
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
<!-- delete category -->
<div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title centered text-center" id="deleteCategoryModalLabel">Yakin ingin menghapus kategori ini?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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


<?php $this->endSection() ?>