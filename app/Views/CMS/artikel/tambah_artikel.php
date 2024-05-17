<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Tambah Artikel
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">

    <div class="card px-4 py-3 border-0  mb-4 shadow">
        <h1 class="h3 mr-auto mb-0 text-gray-800">Tambah artikel</h1>
        <form action="<?= base_url('/aksi_tambah_artikel') ?>" method="post" enctype="multipart/form-data">
            <div class="col-12 mt-3">
                <div class="ps-2" style="text-align: left;">
                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                        Layout :
                    </label>
                </div>
                <div class="col-12 d-flex gap-2">
                    <div class="p-2 col" style="text-align: left;">
                        <div class="col-12 border border-dark d-flex justify-content-center align-items-center" style="height: 150px;">
                            <h4 class="text-middle">Layout A</h4>
                        </div>
                        <br>
                        <div class="form-check col-12 d-flex justify-content-center">
                            <input class="form-check-input border-dark" type="radio" name="id_layout" value="A" id="layoutA">
                            <label for="layoutA" class="form-label d-flex justify-content-between ml-3">A</label>
                        </div>
                    </div>
                    <div class="p-2 col" style="text-align: left;">
                        <div class="col-12 border border-dark d-flex justify-content-center align-items-center" style="height: 150px;">
                            <h4 class="text-middle">Layout B</h4>
                        </div>
                        <br>
                        <div class="form-check col-12 d-flex justify-content-center">
                            <input class="form-check-input border-dark" type="radio" name="id_layout" value="B" id="layoutB">
                            <label for="layoutB" class="form-label d-flex justify-content-between ml-3">B</label>
                        </div>
                    </div>
                    <div class="p-2 col" style="text-align: left;">
                        <div class="col-12 border border-dark d-flex justify-content-center align-items-center" style="height: 150px;">
                            <h4 class="text-middle">Layout C</h4>
                        </div>
                        <br>
                        <div class="form-check col-12 d-flex justify-content-center">
                            <input class="form-check-input border-dark" type="radio" name="id_layout" value="C" id="layoutC">
                            <label for="layoutC" class="form-label d-flex justify-content-between ml-3">C</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-0">
                <div class="form-group col-6">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control border-dark" id="judul" name="judul_artikel">
                </div>
                <div class="form-group col-3">
                    <label for="gambar_1">Gambar 1</label>
                    <input type="file" class="form-control border-dark" id="gambar_1" name="gambar_1">
                </div>
                <div class="form-group col-3">
                    <label for="gambar_2">Gambar 2</label>
                    <input type="file" class="form-control border-dark" id="gambar_2" name="gambar_2">
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group col-6">
                    <label for="kategori">Kategori</label>
                    <select class="js-example-basic-single form-control border border-dark" name="id_kategori" id="kategori">
                        <?php foreach ($kategori as $kat) : ?>
                            <option value="<?= $kat['id'] ?>"><?= $kat['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="tag">Tag</label>
                    <select class="js-example-basic-multiple form-control border border-dark" name="tags[]" multiple="multiple">
                        <?php foreach ($tags as $tag) : ?>
                            <option value="<?= $tag['nama_tag'] ?>"><?= $tag['nama_tag'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group col-7 mt-7">
                    <label for="editor">Isi</label>
                    <textarea id="editor" name="isi" class="form-control border-dark" cols="80" rows="10" placeholder="isi artikel"></textarea>
                </div>
                <div class="form-group row col-5 mt-7">
                    <label for="gambar_artikel">Gambar artikel</label>
                    <input type="file" class="form-control border-dark" id="gambar_artikel" name="gambar_artikel" onchange="readURL(this);" accept="image/*">
                    <div class="form-group col-5 mt-3">
                        <div class="image-box border border-dark" style="width: 200px; height: 200px;">
                            <img id="preaview" src="#" alt="preaview" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-1 col-md-12 mx-auto mt-2">
                <button type="submit" class="btn text-light ml-auto" style="background-color: #03C988;">DRAFT</button>
            </div>
        </form>

    </div>

</div>

<!-- preaview photo -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="preaviewgambar.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {})
        .catch(error => {
            console.error(error);
        });
</script>
<?php $this->endSection() ?>