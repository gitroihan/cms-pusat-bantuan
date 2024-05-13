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
            <button type="button" class=" btn text-light shadow-sm mr-3" data-toggle="modal" data-target="#createCategoryModal" style="background-color: #03C988;"><i class="fa-solid fa-plus"></i>
                Kategori
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

    <div class="basis pengetahuan" style="overflow-y: auto; height: 555px; display: flex; flex-wrap: wrap;">

        <div class="col-md-4 mb-2">
            <div class="card px-4 py-3 border-0 shadow" style="height: 250px; width: 370px">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="image-box mr-3" style="width: 45px; height: 45px;">
                        <img src="logo-goldstep.png" alt="" style="width: 100%; height: 100%; object-fit: fit;">
                    </div>
                    <div class="title-category flex-grow-1">
                        <a href="/cmskategori2" style="text-decoration: none;">
                            <p class="m-0 fw-semibold" style="font-size: 20px; color: #13005A;">
                                produk
                            </p>
                        </a>
                    </div>
                    <div class="menu">
                        <div class="dropdown no-arrow">
                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v" style="color: black;"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#updateCategoryModal">
                                <i class="fa-regular fa-pen-to-square mr-2 text-gray-400"></i>
                                    edit
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteCategoryModal">
                                    <i class="fa-solid fa-trash mr-2 text-gray-400"></i>
                                    hapus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>Goldstep Product</p>
                </div>
                <div class="card-footer bg-white border-0">
                    <p class="m-0 text-muted fw-semibold small">kategori</p>
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