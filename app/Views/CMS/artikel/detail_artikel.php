<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Detail Artikel
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<style>
    .editor-wrapper {
        border: 1px #000 solid !important;
    }

    .ck-editor__editable_inline {
        min-height: 250px !important;
        max-height: 250px !important;
        overflow-y: auto !important;
        border-top: 1px solid #000 !important;
    }

    .select2-container--default .select2-selection--multiple {
        border: 1px solid #000;
        height: 38px !important
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #000;
        height: 38px !important
    }
</style>
<div class="container-fluid">

    <div class="card px-4 py-3 border-0  mb-4 shadow">
        <h1 class="h3 mr-auto mb-0 text-gray-800">
            <a href="/cmsartikel"><i class="fa-solid fa-arrow-left text-gray-800 mr-2"></i></a>
            Detail artikel
        </h1>
        <form id="artikelForm" action="/ubah_artikel/<?= $artikel['id'] ?>" method="post" enctype="multipart/form-data">
            <div class="col-12 mt-3">
                <div class="ps-2" style="text-align: left;">
                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                        Layout :
                    </label>
                </div>
                <div class="col-12 d-flex gap-2">
                    <?php foreach ($layouts as $layout) : ?>
                        <div class="p-2 col-4" style="text-align: left;">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <img class="img-thumbnail" src="<?= base_url('uploads/layout/' . esc($layout['gambar_layout'])); ?>" alt="gambar" style="height: 228px; width: 150px; object-fit: cover;">
                            </div>
                            <br>
                            <div class="form-check col-12 d-flex justify-content-center">
                                <input class="form-check-input border-dark" type="radio" name="id_layout" value="<?= $layout['id'] ?>" id="layout<?= $layout['id'] ?>" <?= $layout['id'] == $artikel['id_layout'] ? 'checked' : '' ?>>
                                <label for="layout<?= $layout['id'] ?>" class="form-label d-flex justify-content-between ml-3"><?= $layout['nama_layout'] ?></label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-0">
                <div class="form-group col-12">
                    <label for="judul">Judul :</label>
                    <input type="text" class="form-control border-dark" id="judul" value="<?= $artikel['judul_artikel'] ?>" name="judul_artikel" maxlength="100" oninput="updateCharCounter()">
                    <div id="charCounter" class="char-counter">0/100 karakter</div>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-0">
                <div class="form-group col-6">
                    <label for="gambar_1">Gambar 1 :</label>
                    <input type="file" class="form-control border-dark" id="gambar_1" name="gambar_1" onchange="updatePreview(this, 'preview2', 'fileErrorGambar1');" accept="image/jpeg, image/png">
                    <small id="fileErrorGambar1" class="text-danger"></small>
                </div>
                <div class="form-group col-6">
                    <label for="gambar_2">Gambar 2 :</label>
                    <input type="file" class="form-control border-dark" id="gambar_2" name="gambar_2" onchange="updatePreview(this, 'preview3', 'fileErrorGambar2');" accept="image/jpeg, image/png">
                    <small id="fileErrorGambar2" class="text-danger"></small>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-0">
                <div class="form-group col-6">
                    <div class="image-box border border-dark" style="height: 250px;">
                        <img id="preview2" src="<?= base_url('uploads/' . esc($artikel['gambar_1'])) ?>" alt="preview" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="form-group col-6">
                    <div class="image-box border border-dark" style="height: 250px;">
                        <img id="preview3" src="<?= base_url('uploads/' . esc($artikel['gambar_2'])) ?>" alt="preview" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group col-6">
                    <label for="kategori">Kategori :</label>
                    <select class="js-example-basic-single form-control border border-dark" name="id_kategori" id="kategori">
                        <?php foreach ($kategori as $kat) : ?>
                            <option value="<?= $kat['id'] ?>" <?= $kat['id'] == $artikel['id_kategori'] ? 'selected' : '' ?>><?= $kat['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="tag">Tag :</label>
                    <select class="js-example-basic-multiple form-control border border-dark" name="tags[]" multiple="multiple">
                        <?php
                        $artikelTags = array_column($artikel_tags, 'nama_tag');
                        foreach ($tags as $tag) : ?>
                            <option value="<?= $tag['nama_tag'] ?>" <?= in_array($tag['nama_tag'], $artikelTags) ? 'selected' : '' ?>><?= $tag['nama_tag'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group col-12 mt-7">
                    <label for="editor">paragraf 1 :</label>
                    <div class="editor-wrapper">
                        <textarea id="editor" name="isi" class="form-control border-dark" cols="80" rows="10" placeholder="isi artikel"><?= $artikel['isi'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group col-12 mt-7">
                    <label for="editor">paragraf 2 :</label>
                    <div class="editor-wrapper">
                        <textarea id="editor2" name="isi2" class="form-control border-dark" cols="80" rows="10" placeholder="isi artikel"><?= $artikel['isi2'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group row col-5 mt-7 d-flex">
                    <label for="gambar_artikel_ubah">Gambar artikel :</label>
                    <input type="file" class="form-control border-dark" id="gambar_artikel_ubah" name="gambar_artikel" onchange="validateAndPreviewUbah(this);" accept="image/jpeg, image/png">
                    <small id="fileErrorUbah" class="text-danger"></small>
                    <?php if (!empty($artikel['gambar_artikel'])) : ?>
                        <div class="col-6">
                            <div class="form-group mt-3">
                                <div class="image-box border border-dark" style="width: 200px; height: 200px;">
                                    <img id="previewUbah" src="<?= base_url('uploads/' . esc($artikel['gambar_artikel'])) ?>" alt="preview" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <p>Deskripsi:</p>
                            <ul>
                                <li>Ukuran file maksimum 2MB</li>
                                <li>Extensi file .jpeg|.jpg|.png</li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-end mb-1 col-md-12 mx-auto mt-2">
                <button type="button" class="btn text-light mr-2" style="background-color: #03C988;" onclick="submitForm('<?= base_url('/ubah_artikel_publish/' . $artikel['id']) ?>')"><i class="fa-solid fa-file-arrow-up mr-2"></i>SIMPAN & PUBLISH</button>
                <button type="button" class="btn btn-warning text-light mr-2" onclick="submitForm('<?= base_url('/ubah_artikel/' . $artikel['id']) ?>')"><i class="fa-solid fa-file mr-2"></i>DRAFT</button>

                <button type="button" class="btn btn-danger text-light" data-toggle="modal" data-target="#deleteartikelModal<?= $artikel['id'] ?>">
                    <i class="fa-solid fa-trash mr-2"></i>HAPUS
                </button>
        </form>
    </div>
</div>
</div>

<!-- delete modal -->
<div class="modal fade" id="deleteartikelModal<?= $artikel['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteartikelModalLabel<?= $artikel['id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteartikelModalLabel<?= $artikel['id'] ?>">Yakin ingin menghapus artikel ini?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form action="/hapus_artikel/<?= $artikel['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-danger">HAPUS</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function updateCharCounter() {
        const input = document.getElementById('judul');
        const counter = document.getElementById('charCounter');
        const maxLength = input.getAttribute('maxlength');
        const currentLength = input.value.length;

        counter.textContent = `${currentLength}/${maxLength} karakter`;
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        updateCharCounter();
    });
</script>

<script>
    function submitForm(actionUrl) {
        var form = document.getElementById('artikelForm');

        var formData = new FormData($("#artikelForm")[0]);

        var isValid = true;
        if (!$('input[name="judul_artikel"]').val()) {
            isValid = false;
            $('input[name="judul_artikel"]').addClass('is-invalid');
            alert('isi judul terlenih dahulu')
        } else {
            $('input[name="judul_artikel"]').removeClass('is-invalid');
        }

        if (!isValid) {
            form.reportValidity();
            return;
        }

        form.action = actionUrl;
        form.submit();
    }
</script>

<!-- preaview photo -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="preaviewgambar.js"></script>
<!-- <script>
    ClassicEditor
        .create(document.querySelector('#editor'), {})
        .then(editor => {
            editor.model.document.on('change:data', () => {
                const data = editor.getData();
                const lines = data.split('<p>').length - 1;

                if (lines > 10) {
                    const trimmedData = data.split('<p>').slice(0, 21).join('<p>');
                    editor.setData(trimmedData);
                    alert('Batas maksimal 10 baris telah tercapai.');
                }
            });
        })
        .catch(error => {
            console.error(error);
        });
</script> -->
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
        });
</script>
<!-- <script>
    ClassicEditor
        .create(document.querySelector('#editor2'), {})
        .then(editor => {
            editor.model.document.on('change:data', () => {
                const data = editor.getData();
                const lines = data.split('<p>').length - 1;

                if (lines > 10) {
                    const trimmedData = data.split('<p>').slice(0, 21).join('<p>');
                    editor.setData(trimmedData);
                    alert('Batas maksimal 10 baris telah tercapai.');
                }
            });
        })
        .catch(error => {
            console.error(error);
        });
</script> -->
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

    function validateAndPreviewUbah(input) {
        updatePreview(input, 'previewUbah', 'fileErrorUbah');
    }
</script>
<?php $this->endSection() ?>