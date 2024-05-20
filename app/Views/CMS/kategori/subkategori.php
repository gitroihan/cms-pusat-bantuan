<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Kategori
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-5">
        <h1 class="h3 mr-auto mb-0 text-gray-800">Sub Kategori</h1>
        <div class="my-1">
            <button type="button" class="btn shadow-sm mr-3 text-light" data-toggle="modal" data-target="#createCategoryModal" style="background-color: #03C988;">
                <i class="fa-solid fa-plus"></i> kategori
            </button>
        </div>
        <div class="input-group" style="width: 300px;">
            <form action="/cari_subkategori" method="GET" class="d-flex" role="search">
                <input type="hidden" name="id_parent" value="<?= $id_kat ?>" />
                <input type="text" class="form-control border-2 small" placeholder="Cari..." aria-label="Search" name="cari" aria-describedby="basic-addon2" style="background-color: white;">
                <div class="input-group-append">
                    <button class="btn" type="submit" style="background-color: #03C988;">
                        <i class="fas fa-search fa-sm text-light"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Breadcrumb -->
    <!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="/cmskategori">kategori</a>
            </li>
            </?php foreach ($breadcrumb as $category) : ?>
                <li class="breadcrumb-item">
                    <a href="/cmssubkategori/</?= $category['id_parent'] ?>"></?= esc($category['nama_kategori']) ?></a>
                </li>
            </?php endforeach; ?>
        </ol>
    </nav>
    <nav aria-label="breadcrumb"> -->
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php foreach ($breadcrumb as $category) : ?>
                <li class="breadcrumb-item">
                    <?php if ($category['id_parent'] === null) : ?>
                        <a href="/cmskategori"><?= esc($category['nama_kategori']) ?></a>
                    <?php else : ?>
                        <a href="/cmssubkategori/<?= $category['id_parent'] ?>"><?= esc($category['nama_kategori']) ?></a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </nav>
    </nav>

    <div class="basis pengetahuan" style="overflow-y: auto; height: 555px;">
        <?php foreach ($subkategori_limit as $sub) : ?>
            <div class="row col-12">
                <div class="col-md-12 mb-2 my-2">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="image-box mr-3" style="width: 5%; height: 5%;">
                                    <img src="<?= base_url('uploads/icons/' . esc($sub['ikon'])); ?>" alt="" class="img-fluid">
                                </div>

                                <div class="col">
                                <?php if ($total_subkategori < 3 && !$subkategori_has_articles && $subkategori_depth < 3) : ?>
                                        <a href="/cmssubkategori/<?= $sub['id'] ?>" class="text-decoration-none">
                                        <?php endif; ?>
                                        <h5 class="card-title custom-title mb-2" style="color: #13005A;"><?= esc($sub['nama_kategori']) ?></h5>
                                        </a>
                                        <p class="card-text mb-0"><?= esc($sub['deskripsi_kategori']) ?></p>
                                </div>
                                <div class="dropdown no-arrow">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v" style="color: black;"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#updateCategoryModal<?= $sub['id'] ?>">
                                            <i class="fa-regular fa-pen-to-square mr-2 text-gray-400"></i>
                                            Edit
                                        </a>
                                        <?php if (!$subkategori_articles[$sub['id']]) : ?>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteCategoryModal<?= $sub['id'] ?>">
                                                <i class="fa-solid fa-trash mr-2 text-gray-400"></i>
                                                Hapus
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

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
                <form id="create-subcategory-form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_parent" value="<?= $id_kat ?>" />
                    <div class="mb-3 p-2 pt-0">
                        <label for="nama">Judul</label>
                        <input type="text" name="nama_kategori" class="form-control" required>
                    </div>
                    <div class="mb-3 p-2 pt-0">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi_kategori" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="mb-3 p-2 pt-0">
                        <label for="newProfilePicture">Pilih ikon:</label>
                        <input type="file" name="ikon" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                    <button type="button" id="btn-save-subcategory" class="btn" style="background-color: #03C988; color: white;">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit category -->
<?php foreach ($subkategori_limit as $sub) : ?>
    <div class="modal fade" id="updateCategoryModal<?= $sub['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="updateCategoryModalLabel<?= $sub['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCategoryModalLabel<?= $sub['id'] ?>">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="mt-5 col-8 m-auto"> -->
                    <form action="/ubah_subkategori/<?= $sub['id'] ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_parent" value="<?= $id_kat ?>" />
                        <div class="mb-3 p-2 pt-0">
                            <label for="nama">Judul</label>
                            <input type="text" name="nama_kategori" class="form-control" value="<?= $sub['nama_kategori'] ?>" required>
                        </div>
                        <div class="mb-3 p-2 pt-0">
                            <label for="username">Deskripsi</label>
                            <textarea name="deskripsi_kategori" class="form-control" rows="5"><?= $sub['deskripsi_kategori'] ?></textarea>
                        </div>
                        <div class="mb-3 p-2 pt-0">
                            <label for="newProfilePicture">Pilih ikon:</label>
                            <input type="file" name="ikon" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>
                        <button type="submit" class="btn" style="background-color: #03C988; color: white;">SIMPAN</button>
                    </form>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- delete category -->
<?php foreach ($subkategori_limit as $sub) : ?>
    <div class="modal fade" id="deleteCategoryModal<?= $sub['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteCategoryModalLabel<?= $sub['id'] ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title centered text-center" id="deleteCategoryModalLabel<?= $sub['id'] ?>">Yakin ingin menghapus kategori ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center"> <!-- Tambahkan kelas text-center di sini -->
                    <div class="mt-5 centered col-8 m-auto text-center">
                        <form action="/hapus_subkategori/<?= $sub['id'] ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id_parent" value="<?= $id_kat ?>" />
                            <button type="submit" class="btn btn-danger">HAPUS</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#btn-save-subcategory').click(function() {
            var formData = new FormData($("#create-subcategory-form")[0]);

            $.ajax({
                type: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                url: '/tambah_subkategori',
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === true) {
                        alert('Subkategori berhasil ditambahkan!');
                        $('#createSubCategoryModal').modal('hide');
                        $('#create-subcategory-form')[0].reset();
                        window.location.href = '/cmssubkategori/<?= $id_kat; ?>';
                    } else {
                        alert('Gagal menambahkan subkategori.');
                    }
                },
                beforeSend: function() {},
                complete: function() {},
                error: function(response) {
                    alert('Terjadi kesalahan saat menambahkan subkategori.');
                }
            });
        });
    });
</script>
<?php $this->endSection() ?>