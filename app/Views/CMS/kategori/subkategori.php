<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Kategori
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mr-auto mb-0 text-gray-800">Sub Kategori</h1>
        <div class="my-1">
            <button type="button" class="btn shadow-sm mr-3 text-light" data-toggle="modal" data-target="#createCategoryModal" style="background-color: #03C988;">
                <i class="fa-solid fa-plus"></i> kategori
            </button>
        </div>
        <div class="input-group" style="width: 300px;">
            <form action="/cari_subkategori" method="GET" class="d-flex" role="search">
                <input type="hidden" name="id_parent" value="<?= $id_kat ?>" />
                <input type="text" class="form-control border-2 small" placeholder="Cari..." aria-label="Search" name="cari" aria-describedby="basic-addon2" style="background-color: white; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                <div class="input-group-append">
                    <button class="btn" type="submit" style="background-color: #03C988;border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
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
                <a class="text-decoration-none h5 mr-auto mb-0 text-gray-800" href="/cmskategori">kategori</a>
            </li>
            </?php foreach ($breadcrumb as $category) : ?>
                <li class="breadcrumb-item">
                    <a class="text-decoration-none h5 mr-auto mb-0 text-gray-800" href="/cmssubkategori/</?= $category['id_parent'] ?>"></?= esc($category['nama_kategori']) ?></a>
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
                        <a class="text-decoration-none h5 mr-auto mb-0 text-gray-800" href="/cmskategori"><?= esc($category['nama_kategori']) ?></a>
                    <?php else : ?>
                        <a class="text-decoration-none h5 mr-auto mb-0 text-gray-800" href="/cmssubkategori/<?= $category['id_parent'] ?>"><?= esc($category['nama_kategori']) ?></a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </nav>

    <div class="kategori" style="overflow-y: auto; height: 500px;">
        <?php foreach ($subkategori as $sub) : ?>
            <div class="row col-12">
                <div class="col-md-12 mb-2 my-2">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="image-box mr-3" style="flex: 0 0 60px; width: 60px; height: 60px;">
                                    <img src="<?= base_url('uploads/icons/' . esc($sub['ikon'])); ?>" alt="" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                                </div>


                                <div class="d-flex flex-column flex-grow-1">
                                    <?php if ($total_subkategori < 3 && !$subkategori_has_articles && $subkategori_depth < 3) : ?>
                                        <a href="/cmssubkategori/<?= $sub['id'] ?>" class="text-decoration-none">
                                        <?php endif; ?>
                                        <h5 class="card-title custom-title mb-2" style="color: #13005A;"><?= esc($sub['nama_kategori']) ?></h5>
                                        </a>
                                        <p class="card-text mb-0 " style="max-width: 700px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            <?= esc($sub['deskripsi_kategori']) ?>
                                        </p>
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
                                        <?php if (!in_array($sub['id'], $parentIds) && !$subkategori_articles[$sub['id']]) : ?>
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
                    <div class="mb-2 p-2 pt-0">
                        <label for="nama">Judul</label>
                        <input type="text" name="nama_kategori" class="form-control" id="judul" maxlength="45" oninput="updateCharCounter()" required>
                        <div id="charCounter" class="char-counter">45 karakter</div>
                    </div>
                    <div class="mb-2 p-2 pt-0">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi_kategori" class="form-control" rows="5" id="deskripsi" maxlength="100" oninput="updateCharCounterdeskripsi()"></textarea>
                        <div id="charCounterdeskripsi" class="char-counter">100 karakter</div>
                    </div>
                    <div class="mb-2 p-2 pt-0">
                        <label for="newProfilePicture">Pilih ikon:</label>
                        <input type="file" name="ikon" class="form-control" id="inputGroupFile04" onchange="validateAndPreviewTambah(this);" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        <small id="fileErrorTambah" class="text-danger"></small>
                    </div>
                    <div class="p-2 pt-0">
                        <div class="image-box border border" style="width: 100px; height: 100px;">
                            <img id="previewTambah" src="#" alt="preview" style="width: 100%; height: 100%; object-fit: fit;">
                        </div>
                    </div>
                    <div class="p-2 pt-0 text-right">
                        <button type="button" id="btn-save-subcategory" class="btn" style="background-color: #03C988; color: white;"><i class="fa-solid fa-floppy-disk mr-2 mt-2"></i>SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit category -->
<?php foreach ($subkategori as $sub) : ?>
    <div class="modal fade" id="updateCategoryModal<?= $sub['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="updateCategoryModalLabel<?= $sub['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCategoryModalLabel<?= $sub['id'] ?>">Ubah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="mt-5 col-8 m-auto"> -->
                    <form action="/ubah_subkategori/<?= $sub['id'] ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_parent" value="<?= $id_kat ?>" />
                        <div class="mb-2 p-2 pt-0">
                            <label for="nama">Judul</label>
                            <input type="text" name="nama_kategori" class="form-control" value="<?= $sub['nama_kategori'] ?>" required>
                        </div>
                        <div class="mb-2 p-2 pt-0">
                            <label for="username">Deskripsi</label>
                            <textarea name="deskripsi_kategori" class="form-control" rows="5"><?= $sub['deskripsi_kategori'] ?></textarea>
                        </div>
                        <div class="mb-2 p-2 pt-0">
                            <label for="newProfilePicture">Pilih ikon:</label>
                            <input type="file" name="ikon" class="form-control" id="inputGroupFile04_<?= $sub['id'] ?>" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="validateAndPreviewUbah(this, <?= $sub['id'] ?>)">
                            <small id="fileErrorUbah_<?= $sub['id'] ?>" class="text-danger"></small>
                        </div>
                        <div class="p-2 pt-0">
                            <div class="image-box border border" style="width: 100px; height: 100px;">
                                <img id="previewUbah_<?= $sub['id'] ?>" src="<?= base_url('uploads/icons/' . esc($sub['ikon'])); ?>" alt="preview" style="width: 100%; height: 100%; object-fit: fit;">
                            </div>
                        </div>
                        <div class="p-2 pt-0 text-right">
                            <button type="submit" class="btn" style="background-color: #03C988; color: white;"><i class="fa-solid fa-floppy-disk mr-2 mt-2"></i>SIMPAN</button>
                        </div>
                    </form>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- delete category -->
<?php foreach ($subkategori as $sub) : ?>
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

            var isValid = true;
            if (!$('input[name="nama_kategori"]').val()) {
                isValid = false;
                $('input[name="nama_kategori"]').addClass('is-invalid');
            } else {
                $('input[name="nama_kategori"]').removeClass('is-invalid');
            }

            if (!isValid) {
                form.reportValidity();
                return;
            }

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
<script>
    function validateAndPreviewTambah(input) {
        const maxFileSize = 2 * 1024 * 1024; // 2MB in bytes
        const validFileExtensions = ['image/jpeg', 'image/jpg', 'image/png'];
        const file = input.files[0];
        const errorElement = document.getElementById('fileErrorTambah');

        if (file) {
            // Check file size
            if (file.size > maxFileSize) {
                errorElement.textContent = 'Ukuran file maksimum 2MB';
                input.value = ''; // Clear the input
                return;
            }

            // Check file type
            if (!validFileExtensions.includes(file.type)) {
                errorElement.textContent = 'Format file tidak valid. Harus .jpeg, .jpg, atau .png';
                input.value = ''; // Clear the input
                return;
            }

            errorElement.textContent = ''; // Clear any previous errors

            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewTambah').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>
<script>
    function updatePreview(input, previewId, errorId) {
        const file = input.files[0];
        const preview = document.getElementById(previewId);
        const error = document.getElementById(errorId);
        const fileTypes = ['image/jpeg', 'image/jpg', 'image/png'];

        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                error.textContent = 'Ukuran file maksimum adalah 2MB';
                input.value = '';
                preview.src = '';
            } else if (!fileTypes.includes(file.type)) {
                error.textContent = 'Format file tidak valid. Harus .jpeg, .jpg, atau .png';
                input.value = '';
                preview.src = '';
            } else {
                error.textContent = '';
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        } else {
            preview.src = '';
            error.textContent = '';
        }
    }

    function validateAndPreviewUbah(input, id) {
        updatePreview(input, 'previewUbah_' + id, 'fileErrorUbah_' + id);
    }
</script>
<!-- validasi judul -->
<script>
    function updateCharCounter() {
        const input = document.getElementById('judul');
        const counter = document.getElementById('charCounter');
        const maxLength = input.getAttribute('maxlength');
        const currentLength = input.value.length;

        counter.textContent = `${maxLength - currentLength} karakter tersisa`;
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        updateCharCounter();
    });
</script>
<!-- validasi deskripsi -->
<script>
    function updateCharCounterdeskripsi() {
        const input = document.getElementById('deskripsi');
        const counter = document.getElementById('charCounterdeskripsi');
        const maxLength = input.getAttribute('maxlength');
        const currentLength = input.value.length;

        counter.textContent = `${maxLength - currentLength} karakter tersisa`;
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        updateCharCounter();
    });
</script>

<?php $this->endSection() ?>