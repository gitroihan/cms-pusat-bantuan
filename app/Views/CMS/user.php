<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
User
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <div class="card px-4 py-4 border-0 shadow w-50 mx-auto">
        <div>
        <div class="d-flex position-relative justify-content-center align-items-center mb-3 bordered ">
            <img id="profilePicture" class="rounded-circle border " src="cms/img/wall12.jpg" width="150" height="150">
        </div>
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" required readonly>
        </div>
        <div class="mb-3">
            <label for="username">Email</label>
            <input type="text" class="form-control" required readonly>
        </div>
        <div class="mb-3">
            <label for="nama">Role</label>
            <input type="text" class="form-control" readonly>
        </div>
        <a href="/edituser" class="btn text-light mt-3" style="background-color: #03C988;">
        UBAH
        </a>
        <button type="button" class=" btn text-light shadow-sm mt-3" data-toggle="modal" data-target="#passwordModal" style="background-color: #03C988;">
            UBAH PASSWORD
        </button>
    </div>
    </div>

    <div class="modal fade" id="profilepictureModal" tabindex="-1" role="dialog" aria-labelledby="profilepictureModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title centered text-center" id="profilepictureModalLabel">ubah poto profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 centered col-8 m-auto text-center">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input class="form-control border-dark" type='file' onchange="readURL(this);" accept="image/*" name="icon" />
                                <div class="d-flex position-relative justify-content-center align-items-center mb-3 mt-3 bordered ">
                                    <img id="profilePicture" class="rounded-circle border" alt="preview" src="" width="150" height="150">
                                </div>
                            </div>
                            <button type="submit" class="btn text-light ml-0" style="background-color: #03C988;">simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border bottom">
                    <h5 class="modal-title" id="passwordModalLabel">Tambah kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 p-2 pt-0">
                            <label for="password">password lama</label>
                            <input type="password" class="form-control" required>
                        </div>
                        <div class="mb-3 p-2 pt-0">
                            <label for="password">password baru</label>
                            <input type="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn" style="background-color: #03C988; color: white;">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>