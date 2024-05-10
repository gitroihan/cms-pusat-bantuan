<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Tambah Artikel
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">

    <div class="card px-4 py-3 border-0 shadow">
        <h1 class="h3 mr-auto mb-0 text-gray-800">Tambah artikel</h1>
        <form action="/submit_article" method="post">
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group col-8">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                </div>
                <div class="form-group col-4">
                    <label for="pembuat">Pembuat</label>
                    <input type="text" class="form-control" id="pembuat" name="pembuat">
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group col-6">
                    <label for="kategori">Kategori</label>
                    <button type="button" class="btn btn-light border form-control" data-toggle="modal" data-target="#kategoriModal">
                    </button>
                </div>
                <div class="form-group col-6">
                    <label for="tag">Tag</label>
                    <input type="text" class="form-control" id="tag" name="tag">
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group col-7 mt-7">
                    <label for="editor">Isi</label>
                    <textarea id="" name="editor" class="form-control" cols="80" rows="10" placeholder="isi artikel"></textarea>
                </div>
                <div class="form-group col-5 mt-7">
                    <label for="editor">upload gambar</label>
                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <div class="form-group col-5 mt-7">
                        <img id="previewImage" src="#" alt="Preview">
                        <label for="editor">Deskripsi</label>
                    </div>
                </div>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-1 col-md-12 mx-auto mt-4">
                <button type="submit" class="btn btn-primary">Draft</button>
            </div>
        </form>
    </div>

</div>

<div class="modal fade" id="kategoriModal" tabindex="-1" role="dialog" aria-labelledby="kategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriModalLabel">Tambah kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mt-2 col-12 m-auto">
                    <form action=" " method="post" enctype="multipart/form-data">
                        <input type="text" class="form-control bg-light border-2 small" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
                        <table class="table table-bordered table-sm" style="text-align: center; ">
                            <tbody class="">
                                <tr>
                                    <td>kategori</td>
                                </tr>
                                <tr>
                                    <td>kategori</td>
                                </tr>
                                <tr>
                                    <td>kategori</td>
                                </tr>
                                <tr>
                                    <td>kategori</td>
                                </tr>
                                <tr>
                                    <td>kategori</td>
                                </tr>
                            </tbody>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {})
        .catch(error => {
            console.error(error);
        });
</script>
<?php $this->endSection() ?>