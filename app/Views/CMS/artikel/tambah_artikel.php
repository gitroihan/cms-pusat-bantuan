<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Tambah Artikel
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">

    <div class="card px-4 py-3 border-0  mb-4 shadow">
        <h1 class="h3 mr-auto mb-0 text-gray-800">Tambah artikel</h1>
        <form action=" " method="post">
            <div class="col-12 mt-3 ">
                <div class="ps-2" style="text-align: left;">
                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                        Layout : </label>
                </div>
                <div class="col-12 d-flex gap-2">
                    <div class="p-2 col" style="text-align: left;">
                        <div class="col-12 border border-dark d-flex justify-content-center align-items-center" style="height: 150px;">
                            <h4 class="text-middle">Layout A</h4>
                        </div>
                        <br>
                        <div class="form-check  col-12 d-flex justify-content-center">
                            <input class="form-check-input border-dark" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between ml-3">
                                A </label>

                        </div>
                    </div>
                    <div class="p-2 col " style="text-align: left;">
                        <div class="col-12 border border-dark d-flex justify-content-center align-items-center" style="height: 150px;">
                            <h4 class="text-middle">Layout B</h4>
                        </div>
                        <br>
                        <div class="form-check col-12 d-flex justify-content-center">
                            <input class="form-check-input border-dark" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between ml-3">
                                B </label>
                        </div>
                    </div>
                    <div class="p-2 col" style="text-align: left;">
                        <div class="col-12 border border-dark d-flex justify-content-center align-items-center" style="height: 150px;">
                            <h4 class="text-middle">Layout C</h4>
                        </div>
                        <br>
                        <div class="form-check col-12 d-flex justify-content-center">
                            <input class="form-check-input border-dark" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between ml-3">
                                C </label>
                        </div>
                    </div>
                </div>
                          
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-0">
                <div class="form-group col-12">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control border-dark" id="judul" name="judul">
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group col-6">
                    <label for="kategori">Kategori</label>
                    <select class="js-example-basic-single form-control border border-dark" name="state">
                        <option value="AL">kategori 1</option>
                        <option value="WY">kategori 2</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="tag">Tag</label>
                    <select class="js-example-basic-multiple form-control border border-dark" name="states[]" multiple="multiple">
                        <option>tag 1</option>
                        <option>tag 2</option>
                    </select>
                </div>
            </div>
            <div class="d-sm-flex mb-1 col-md-12 mx-auto mt-4">
                <div class="form-group col-7 mt-7">
                    <label for="editor">Isi</label>
                    <textarea id="editor" name="editor" class="form-control border-dark" cols="80" rows="10" placeholder="isi artikel"></textarea>
                </div>
                <div class="form-group row col-5 mt-7">
                    <label for="editor">upload gambar</label>
                    <input type="file" class="form-control border-dark" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <div class="form-group col-5 mt-3">
                        <div class="image-box border border-dark" style="width: 200px; height: 200px;">
                            <img id="previewImage" src="#" alt="Preview" style="width: 100%; height: 100%; object-fit: fit;">
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

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {})
        .catch(error => {
            console.error(error);
        });
</script>
<?php $this->endSection() ?>