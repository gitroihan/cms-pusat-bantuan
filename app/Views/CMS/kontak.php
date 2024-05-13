<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Kontak
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <div class="card px-4 py-3 border-0 shadow">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama">nama</label>
                <input type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username">email</label>
                <input type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="telephon">no telepon</label>
                <input type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama">alamat</label>
                <textarea name="" id="" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="nama">link whatsapp</label>
                <input type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama">link instagram</label>
                <input type="text" class="form-control" required>
            </div>
            <button type="submit" class="btn text-light" data-toggle="modal" data-target="#kontakModal" style="background-color: #03C988">SIMPAN</button>
        </form>
    </div>

    <div class="modal fade" id="kontakModal" tabindex="-1" role="dialog" aria-labelledby="kontakModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title centered text-center" id="kontakModalLabel">kontak terperbaharui</h5>
                </div>
                <div class="modal-body text-center"> <!-- Tambahkan kelas text-center di sini -->
                    <div class="mt-5 centered col-8 m-auto text-center">
                        <form action="" method="post" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-success">OK</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $this->endSection() ?>