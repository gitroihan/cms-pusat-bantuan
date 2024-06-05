<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
User
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <div class="card px-4 py-4 border-0 shadow w-50 mx-auto">
        <a href="/lihat_profile" class="btn rounded-circle position-absolute" style="z-index: 10; top: 20px; left: 10px;">
            <i class="fa-solid fa-backward"></i>
        </a>
        <form action="/simpan_profile" method="post" enctype="multipart/form-data">
            <div class="d-flex position-relative justify-content-center align-items-center mb-3 bordered ">
                <img id="profilePictureedit" class="rounded-circle border " src="<?= base_url('uploads/' . esc($data['foto_profile'])); ?>" width="150" height="150">
                <button type="button" class="btn btn-light rounded-circle position-absolute shadow" style="top: 75%; left: 55%;" data-toggle="modal" data-target="#profilepictureModal">
                    <i class="fas fa-camera fa-1x"></i>
                </button>
            </div>
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($data['nama']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="username">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= esc($data['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama">Role</label>
                <input type="text" class="form-control" value="<?= esc($data['role']); ?>" readonly>
            </div>
            <div class="text-right">
                <button type="submit" id="editProfileButton" class="btn text-light mt-3" style="background-color: #03C988;"><i class="fa-solid fa-floppy-disk mr-2 mt-2"></i>
                SIMPAN</button>
            </div>
        </form>
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
                        <form action="/ubah_foto" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input class="form-control border-dark" type='file' onchange="readURL(this);" accept="image/*" name="foto_profile" />
                                <small id="fileError" class="text-danger"></small>
                                <div class="d-flex position-relative justify-content-center align-items-center mb-3 mt-3 bordered ">
                                    <img id="preaview" class="rounded-circle border" alt="preview" src="<?= base_url('uploads/' . esc($data['foto_profile'])); ?>" width="150" height="150">
                                </div>
                            </div>
                            <button type="submit" class="btn text-light ml-0" style="background-color: #03C988;"><i class="fa-solid fa-floppy-disk mr-2 mt-2"></i>
                            SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- preaview photo -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="preaviewgambar.js"></script>
</div>
<?php $this->endSection() ?>