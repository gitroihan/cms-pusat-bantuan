<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Tambah Artikel
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
            <a href="cmsartikel"><i class="fa-solid fa-arrow-left text-gray-800 mr-2"></i></a>
            Tambah artikel
        </h1>
        <form id="artikelForm" action="<?= base_url('/aksi_tambah_artikel') ?>" method="post" enctype="multipart/form-data">
            <div class="col-12 mt-3">
                <div class="ps-2" style="text-align: left;">
                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                        Layout :
                    </label>
                </div>
                <div class="col-12 d-flex gap-2">
                    <?php foreach ($layouts as $layout) : ?>
                        <div class="p-2 col" style="text-align: left;">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <img class="img-thumbnail" src="<?= base_url('uploads/layout/' . esc($layout['gambar_layout'])); ?>" alt="gambar" style="height: 228px; width: 150px; object-fit: cover;">
                            </div>
                            <br>
                            <div class="form-check col-12 d-flex justify-content-center">
                                <input class="form-check-input border-dark" type="radio" name="id_layout" value="<?= $layout['id'] ?>" id="layout<?= $layout['id'] ?>">
                                <label for="layout<?= $layout['id'] ?>" class="form-label d-flex justify-content-between ml-3"><?= $layout['nama_layout'] ?></label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-0">
                <div class="form-group col-12">
                    <label for="judul">Judul :</label>
                    <input type="text" class="form-control border-dark" id="judul" name="judul_artikel" maxlength="100" oninput="updateCharCounter()">
                    <div id="charCounter" class="char-counter">100 karakter</div>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-0">
                <div class="form-group col-6">
                    <label for="gambar_1">Gambar 1 :</label>
                    <input type="file" class="form-control border-dark" id="gambar_1" name="gambar_1" onchange="validateAndPreviewGambar1(this);" accept="image/*">
                    <small id="fileErrorGambar1" class="text-danger"></small>
                </div>
                <div class="form-group col-6">
                    <label for="gambar_2">Gambar 2 :</label>
                    <input type="file" class="form-control border-dark" id="gambar_2" name="gambar_2" onchange="validateAndPreviewGambar2(this);" accept="image/*">
                    <small id="fileErrorGambar2" class="text-danger"></small>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-0">
                <div class="form-group col-6">
                    <div class="image-box border border-dark" style="height: 250px;">
                        <img id="previewGambar1" src="#" alt="preview" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="form-group col-6">
                    <div class="image-box border border-dark" style="height: 250px;">
                        <img id="previewGambar2" src="#" alt="preview" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
            </div>

            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group col-6">
                    <label for="kategori">Kategori :</label>
                    <select class="js-example-basic-single form-control" name="id_kategori" id="kategori">
                        <?php foreach ($kategori as $kat) : ?>
                            <option value="<?= $kat['id'] ?>"><?= $kat['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="tag">Tag :</label>
                    <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                        <?php foreach ($tags as $tag) : ?>
                            <option value="<?= $tag['nama_tag'] ?>"><?= $tag['nama_tag'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group col-12 mt-7">
                    <label for="editor">paragraf 1 :</label>
                    <div class="editor-wrapper">
                        <textarea id="editor" name="isi" class="form-control border-dark" cols="80" rows="10" placeholder="isi artikel"></textarea>
                    </div>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group col-12 mt-7">
                    <label for="editor">paragraf 2 :</label>
                    <div class="editor-wrapper">
                        <textarea id="editor2" name="isi2" class="form-control border-dark" cols="80" rows="10" placeholder="isi artikel"></textarea>
                    </div>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group row col-5 mt-7 d-flex">
                    <label for="gambar_artikel_tambah">Gambar artikel :</label>
                    <input type="file" class="form-control border-dark" id="gambar_artikel_tambah" name="gambar_artikel" onchange="validateAndPreviewTambah(this);" accept="image/*">
                    <small id="fileErrorTambah" class="text-danger"></small>
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <div class="image-box border border-dark" style="width: 200px; height: 200px;">
                                <img id="previewTambah" src="#" alt="preview" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>
                    </div>

                    <div class="col-6 mt-3">
                        <p>Deskripsi :</p>
                        <ul>
                            <li>Ukuran file maksimum 2MB</li>
                            <li>Extensi file .jpeg|.jpg|.png</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-end mb-1 col-md-12 mx-auto mt-2">
                <button type="button" class="btn text-light mr-2" style="background-color: #03C988;" onclick="submitForm('<?= base_url('/aksi_tambah_artikel_publish') ?>')"><i class="fa-solid fa-file-arrow-up mr-2"></i>SIMPAN & PUBLISH</button>
                <button type="button" class="btn btn-warning text-light mr-2" onclick="submitForm('<?= base_url('/aksi_tambah_artikel') ?>')"><i class="fa-solid fa-file mr-2"></i>DRAFT</button>
            </div>
        </form>

    </div>

</div>
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

    function submitForm(actionUrl) {
        var form = document.getElementById('artikelForm');
        var layoutChecked = document.querySelector('input[name="id_layout"]:checked');

        if (!layoutChecked) {
            alert("Silakan pilih layout.");
            return;
        }

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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
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

                if (lines > 20) {
                    const trimmedData = data.split('<p>').slice(0, 21).join('<p>');
                    editor.setData(trimmedData);
                    alert('Batas maksimal 20 baris telah tercapai.');
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

                if (lines > 20) {
                    const trimmedData = data.split('<p>').slice(0, 21).join('<p>');
                    editor.setData(trimmedData);
                    alert('Batas maksimal 20 baris telah tercapai.');
                }
            });
        })
        .catch(error => {
            console.error(error);
        });
</script> -->
<?php $this->endSection() ?>