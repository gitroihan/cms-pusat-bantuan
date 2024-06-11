<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
User
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<!-- <style>
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .spinner-border {
        width: 3rem;
        height: 3rem;
        border-width: .3rem;
    }
</style> -->

<div class="container-fluid">
    <div class="card px-4 py-4 border-0 shadow w-50 mx-auto">
        <div>
            <div class="d-flex position-relative justify-content-center align-items-center mb-3 bordered ">
                <img id="profilePicture" class="rounded-circle border " src="<?= base_url('uploads/' . esc($data['foto_profile'])); ?>" width="150" height="150">
            </div>
            <div class="mb-3">
                <label for="">Username</label>
                <input type="text" class="form-control" required value="<?= esc($data['username']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="">Nama</label>
                <input type="text" class="form-control" required value="<?= esc($data['nama']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" class="form-control" required value="<?= esc($data['email']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="">Role</label>
                <input type="text" class="form-control" value="<?= esc($data['role']); ?>" readonly>
            </div>
            <div class="text-right">
                <a href="/ubah_profile" class="btn text-light mt-3" style="background-color: #03C988;"><i class="fa-solid fa-pen-to-square mr-1"></i>
                    UBAH
                </a>
                <button class="btn text-light  mt-3" data-bs-toggle="modal" data-bs-target="#passwordModal" style="background-color: #03C988;"><i class="fa-solid fa-pen-to-square mr-1"></i>
                    UBAH PASSWORD
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h5 class="modal-title" id="passwordModalLabel">Ubah Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                        <div class="text-right">
                            <button type="button" id="btn-ubah" class="btn" style="background-color: #03C988; color: white;"><i class="fa-solid fa-floppy-disk mr-2 mt-2"></i>
                                SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5); z-index:1000;">
        <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); color:white;">
            Loading...
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
                    $('.overlay').show();
                },
                success: function(res) {
                    if (res.status == true) {
                        $('.overlay').hide();
                        alert('Anda berhasil menyimpan data');
                        $('#form-ubah-password')[0].reset();
                        $('#passwordModal').modal('hide');
                    } else {
                        $('.overlay').hide();
                        alert('Anda gagal menyimpan data');
                        $('#form-ubah-password')[0].reset();
                    }
                },
                complete: function() {
                    $('.overlay').hide();
                },
                error: function(res) {
                    $('.overlay').hide();
                    alert('Terjadi kesalahan dalam pengiriman data');
                }
            });
        });

    });
</script>

<?php $this->endSection() ?>