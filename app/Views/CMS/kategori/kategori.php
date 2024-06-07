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
            <form action="/cari_kategori" method="GET" class="d-flex" role="search">
                <input type="text" class="form-control border-2 small" placeholder="Cari..." aria-label="Search" name="cari" aria-describedby="basic-addon2" style="background-color: white; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                <div class="input-group-append">
                    <button class="btn" type="submit" style="background-color: #03C988;border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                        <i class="fas fa-search fa-sm text-light"></i>
                    </button>
                </div>
            </form>
        </div>

    </div>

    <div class="basis pengetahuan" style="overflow-y: auto; height: 555px; display: flex; flex-wrap: wrap;">
        <?php foreach ($kategori as $kat) : ?>
            <div class="col-md-4 mb-2">
                <div class="card px-4 py-3 border-0 shadow" style="height: 250px;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="image-box mr-3" style="width: 45px; height: 45px;">
                            <img src="<?= base_url('uploads/icons/' . esc($kat['ikon'])); ?>" alt="" style="width: 100%; height: 100%; object-fit: fit;">
                        </div>
                        <div class="title-category flex-grow-1">
                            <?php if (!$kategori_articles[$kat['id']]) : ?>
                                <a href="/cmssubkategori/<?= $kat['id'] ?>" style="text-decoration: none;">
                                <?php endif; ?>
                                <p class="m-0 fw-semibold" style="font-size: 20px; color: #13005A; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <?= esc($kat['nama_kategori']) ?>
                                </p>
                                </a>
                        </div>
                        <div class="menu">
                            <div class="dropdown no-arrow">
                                <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v" style="color: black;"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#updateCategoryModal<?= $kat['id'] ?>">
                                        <i class="fa-regular fa-pen-to-square mr-2 text-gray-400"></i>
                                        edit
                                    </a>
                                    <?php if (!in_array($kat['id'], $id_parents) && !$kategori_articles[$kat['id']]) : ?>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteCategoryModal<?= $kat['id'] ?>">
                                            <i class="fa-solid fa-trash mr-2 text-gray-400"></i>
                                            hapus
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-truncate" style="max-height: 4.5em; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            <?= esc($kat['deskripsi_kategori']) ?>
                        </p>
                    </div>
                    <div class="card-footer bg-white border-0"></div>
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
                <form id="create-category-form" method="post" enctype="multipart/form-data">
                    <div class="mb-2 p-2 pt-0">
                        <label for="nama">Judul</label>
                        <input type="text" id="judul" name="nama_kategori" class="form-control" maxlength="45" oninput="updateCharCounter('judul', 'charCounter')" required>
                        <div id="charCounter" class="char-counter">0/45 karakter</div>
                    </div>
                    <div class="mb-2 p-2 pt-0">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi_kategori" class="form-control" rows="5" id="deskripsi" maxlength="100" oninput="updateCharCounter('deskripsi', 'charCounterdeskripsi')"></textarea>
                        <div id="charCounterdeskripsi" class="char-counter">0/100 karakter</div>
                    </div>
                    <div class="p-2 pt-0">
                        <label for="newProfilePicture">Pilih ikon:</label>
                        <div class="image-box border border" style="width: 100px; height: 100px;">
                            <img id="previewTambah" src="#" alt="preview" style="width: 100%; height: 100%; object-fit: fit;">
                        </div>
                    </div>
                    <div class="mb-2 p-2 pt-0">
                        <input type="file" name="ikon" class="form-control" id="inputGroupFile04" onchange="validateAndPreviewTambah(this);" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        <small id="fileErrorTambah" class="text-danger"></small>
                    </div>
                    <div class="p-2 pt-0 text-right">
                        <button type="button" id="btn-save" class="btn" style="background-color: #03C988; color: white;"><i class="fa-solid fa-floppy-disk mr-2 mt-2"></i>SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit category -->
<?php foreach ($kategori as $kat) : ?>
    <div class="modal fade" id="updateCategoryModal<?= $kat['id'] ?>" tabindex=" -1" role="dialog" aria-labelledby="updateCategoryModalLabel<?= $kat['id'] ?>" aria-hidden=" true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCategoryModalLabel<?= $kat['id'] ?>">Ubah Kategori</h5>
                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="mt-5 col-8 m-auto"> -->
                    <form action="/ubah_kategori/<?= $kat['id'] ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="mb-2 p-2 pt-0">
                            <label for="nama">Judul</label>
                            <input type="text" id="judulubah<?= $kat['id'] ?>" name="nama_kategori" class="form-control" value="<?= $kat['nama_kategori'] ?>" maxlength="45" oninput="updateCharCounter('judulubah<?= $kat['id'] ?>', 'charCounterubah<?= $kat['id'] ?>')" required>
                            <div id="charCounterubah<?= $kat['id'] ?>" class="char-counter">0/45 karakter</div>
                        </div>
                        <div class="mb-2 p-2 pt-0">
                            <label for="username">Deskripsi</label>
                            <textarea name="deskripsi_kategori" class="form-control" rows="5" id="deskripsiubah<?= $kat['id'] ?>" maxlength="100" oninput="updateCharCounter('deskripsiubah<?= $kat['id'] ?>', 'charCounterdeskripsiubah<?= $kat['id'] ?>')"><?= $kat['deskripsi_kategori'] ?></textarea>
                            <div id="charCounterdeskripsiubah<?= $kat['id'] ?>" class="char-counter">0/100 karakter</div>
                        </div>
                        <div class="p-2 pt-0">
                            <label for="newProfilePicture">Pilih ikon:</label>
                            <div class="image-box border border" style="width: 100px; height: 100px;">
                                <img id="previewUbah_<?= $kat['id'] ?>" src="<?= base_url('uploads/icons/' . esc($kat['ikon'])); ?>" alt="preview" style="width: 100%; height: 100%; object-fit: fit;">
                            </div>
                        </div>
                        <div class="mb-2 p-2 pt-0">
                            <input type="file" name="ikon" class="form-control" id="inputGroupFile04_<?= $kat['id'] ?>" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="validateAndPreviewUbah(this, <?= $kat['id'] ?>)">
                            <small id="fileErrorUbah_<?= $kat['id'] ?>" class="text-danger"></small>
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


<!-- Delete Category Modal -->
<?php foreach ($kategori as $kat) : ?>
    <div class="modal fade" id="deleteCategoryModal<?= $kat['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteCategoryModalLabel<?= $kat['id'] ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCategoryModalLabel<?= $kat['id'] ?>">Yakin ingin menghapus kategori ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <form action="/hapus_kategori/<?= $kat['id'] ?>" method="post">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger">HAPUS</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script src="preaviewgambar.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#btn-save').click(function() {
            var formData = new FormData($("#create-category-form")[0]);

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
                url: '/tambah_kategori',
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === true) {
                        alert('Kategori berhasil ditambahkan!');
                        $('#createCategoryModal').modal('hide');
                        $('#create-category-form')[0].reset();
                        window.location.href = '/cmskategori';
                    } else {
                        alert('Gagal menambahkan kategori.');
                    }
                },
                beforeSend: function() {
                    // Optional: Logic before sending the request
                },
                complete: function() {
                    // Optional: Logic after the request is complete
                },
                error: function(response) {
                    alert('Terjadi kesalahan saat menambahkan kategori.');
                }
            });
        });
    });
</script>
<!-- preview validasi gambar -->
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
<!-- validasi judul dan deskripsi -->
<script>
    function updateCharCounter(inputId, counterId) {
        const input = document.getElementById(inputId);
        const counter = document.getElementById(counterId);
        const maxLength = input.getAttribute('maxlength');
        const currentLength = input.value.length;

        counter.textContent = `${currentLength}/${maxLength} karakter`;
    }

    function initializeCharCounters() {
        // Initialize counters for 'Tambah kategori' modal
        updateCharCounter('judul', 'charCounter');
        updateCharCounter('deskripsi', 'charCounterdeskripsi');

        // Initialize counters for 'Ubah kategori' modals
        <?php foreach ($kategori as $kat) : ?>
            updateCharCounter('judulubah<?= $kat['id'] ?>', 'charCounterubah<?= $kat['id'] ?>');
            updateCharCounter('deskripsiubah<?= $kat['id'] ?>', 'charCounterdeskripsiubah<?= $kat['id'] ?>');
        <?php endforeach; ?>
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        initializeCharCounters();
    });
</script>



<?php $this->endSection() ?>