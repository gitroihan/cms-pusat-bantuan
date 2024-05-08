<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
User
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <div class="card px-4 py-4 border-0 shadow w-50 mx-auto">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="d-flex position-relative justify-content-center align-items-center mb-3 bordered ">
                <img id="profilePicture" class="rounded-circle border " src="cms/img/wall12.jpg" width="150" height="150">
                <button type="button" class="btn btn-light rounded-circle position-absolute shadow" style="top: 75%; left: 55%;" data-toggle="modal" data-target="#profilepictureModal">
                    <i class="fas fa-camera fa-1x"></i>
                </button>
            </div>
            <div class="mb-3">
                <label for="nama">nama</label>
                <input type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username">email</label>
                <input type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama">role</label>
                <input type="text" class="form-control">
            </div>
            <label for="password">password</label>
            <input type="password" class="form-control" required>
            <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
        </form>
    </div>

    <div class="modal fade" id="profilepictureModal" tabindex="-1" role="dialog" aria-labelledby="profilepictureModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title centered text-center" id="profilepictureModalLabel">edit photo profile</h5>
                </div>
                <div class="modal-body text-center">
                    <div class="mt-5 centered col-8 m-auto text-center">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="newProfilePicture">Pilih gammbar:</label>
                                <input type='file' onchange="readURL(this);" accept="image/*" name="icon" />
                            </div>
                            <button type="submit" class="btn btn-success">simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>