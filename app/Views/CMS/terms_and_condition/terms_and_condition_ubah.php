<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
terms_and_condition
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<style>
    .editor-wrapper {
        border: 1px #000 solid !important;
    }

    .ck-editor__editable_inline {
        min-height: 450px !important;
        max-height: 450px !important;
        overflow-y: auto !important;
        border-top: 1px solid #000 !important;
    }
</style>
<div class="container-fluid">

    <div class="card px-4 py-3 border-2 mb-5">
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mr-auto mb-0 text-gray-800"><a href="/cmsterms_and_condition"><i class="fa-solid fa-arrow-left text-gray-800 mr-2"></i></a>
            terms and condition
        </h1>
        </div>
        <?php foreach ($terms as $list) : ?>
            <form action="/ubah_terms_and_condition" method="post" enctype="multipart/form-data">
                <div class="col-12 mt-3">
                    <div class="d-sm-flex mb-1 col-md-12 mx-auto">
                        <div class="form-group col-12">
                            <div class="editor-wrapper">
                                <input type="hidden" name="id" value="<?= $list['id'] ?>">
                                <textarea id="editor" name="isi" class="form-control border-dark" cols="80" rows="10" placeholder="isi artikel"><?= $list['isi'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-end mb-1 col-md-12 mx-auto mt-2">
                        <button type="submit" class="btn text-light mr-2" style="background-color: #03C988;"><i class="fa-solid fa-file-arrow-up mr-2"></i>SIMPAN</button>
                    </div>
            </form>
        <?php endforeach; ?>
    </div>

</div>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
<?php $this->endSection() ?>