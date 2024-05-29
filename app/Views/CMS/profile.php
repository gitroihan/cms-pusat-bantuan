<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
User
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <div class="card px-4 py-4 border-0 shadow w-50 mx-auto">
        <div>
            <div class="d-flex position-relative justify-content-center align-items-center mb-3 bordered ">
                <img id="profilePicture" class="rounded-circle border " src="<?= base_url('uploads/' . esc($data['foto_profile'])); ?>" width="150" height="150">
            </div>
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" required value="<?= esc($data['nama']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="username">Email</label>
                <input type="text" class="form-control" required value="<?= esc($data['email']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama">Role</label>
                <input type="text" class="form-control" value="<?= esc($data['role']); ?>" readonly>
            </div>
            <a href="/ubah_profile" class="btn text-light mt-3" style="background-color: #03C988;">
                UBAH
            </a>
            <button type="button" class="btn text-light shadow-sm mt-3" data-toggle="modal" data-target="#passwordModal" style="background-color: #03C988;">
                UBAH PASSWORD
            </button>
        </div>
    </div>

    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h5 class="modal-title" id="passwordModalLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $modal = session()->getFlashdata('modal');
                    if ($modal && $modal['name'] == 'exampleModaleditpassword') : ?>
                        <?php if ($modal['type'] === 'error') : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $modal['message']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php elseif ($modal['type'] === 'success') : ?>
                            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                <?php echo $modal['message']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <form id="form-ubah-password" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= esc($data['id']); ?>">
                        <div class="mb-3 p-2 pt-0">
                            <label for="password">Password Lama</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3 p-2 pt-0">
                            <label for="password-baru">Password Baru</label>
                            <input type="password" name="password-baru" class="form-control" required>
                        </div>
                        <button type="button" id="btn-ubah" class="btn" style="background-color: #03C988; color: white;">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function() {
            $('#btn-ubah').click(function() {
                const formdata = new FormData($("#form-ubah-password")[0]);
                console.log(formdata);

                $.ajax({
                    type: 'POST',
                    url: '/ubahpassword',
                    data: formdata,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        // Optional: Show overlay or loading spinner
                    },
                    success: function(res) {
                        if (res.status == true) {
                            alert('Anda berhasil menyimpan data');
                        } else {
                            alert('Anda gagal menyimpan data');
                        }
                    },
                    complete: function() {
                        // Optional: Hide overlay or loading spinner
                    },
                    error: function(res) {
                        alert('Terjadi kesalahan dalam pengiriman data');
                    }
                });
            });

            var modalData = <?php echo json_encode(session()->getFlashdata('modal')); ?>;
            if (modalData) {
                $('#' + modalData.name).modal('show');
            }
        });
    </script>

<?php $this->endSection() ?>