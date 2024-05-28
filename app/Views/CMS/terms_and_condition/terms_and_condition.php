<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
terms and condition
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">

    <div class="card px-4 py-3 border-2 mb-2">
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mr-auto mb-0 text-gray-800">terms and condition</h1>
            <div class="my-1">
                <a href="/cmsubah_terms_and_condition" class="btn shadow-sm mr-3 text-light" style="background-color: #03C988;">
                    <i class="fa-solid fa-plus "></i>
                    Ubah Teks
                </a>
            </div>
        </div>
        <div>
            <?php foreach ($terms as $list) : ?>
                <p><?= $list['isi'] ?></p>
            <?php endforeach; ?>
        </div>
    </div>

</div>
<?php $this->endSection() ?>