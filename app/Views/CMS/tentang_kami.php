<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
tentang kami
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="cms/css2/style-konten.css">
<div class="bungkus">
    <div class="konten-banner">
        <div class="col-12 d-flex justify-content-between">
            <h1 class="h3 mr-auto mb-0 text-gray-800">Tentang Kami</h1>
            <div class="col-5 d-flex gap-2 justify-content-end">
                <button class="btn d-flex text-light" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaltambahbannerinformasi" style="background-color: #03C988;">
                    <span class="m-0 p-1 "><i class="fa-regular fa-pen-to-square mr-2"></i>Ubah banner</span>
                </button>
                <button class="btn d-flex text-light" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaltambahinformasi" style="background-color: #03C988;">
                    <span class="m-0 p-1 "><i class="fa-solid fa-plus mr-2"></i>Tambah Informasi</span>
                </button>
            </div>
            <div class="modal fade" id="exampleModaltambahbannerinformasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form action="/ubahbannerinformasi" method="post" id="form-data-solusi" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Banner</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <input type="text" value="<?= $head[0]['id'] ?>" name="id" id="id" hidden>
                                    <label for="exampleFormControlInput1" class="form-label">Judul :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama Artikel" name="judul_banner" value="<?= $head[0]['judul_banner'] ?>">
                                </div>
                                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi :</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8.5" name="deskripsi"><?= $head[0]['deskripsi'] ?></textarea>
                                </div>
                                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Gambar :</label>
                                    <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama Artikel" name="gambar" required>
                                </div>
                            </div>
                            <div class="modal-footer border-top pe-4">
                                <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;" id="btn-simpan"><i class="fa-solid fa-floppy-disk mr-2 mt-2"></i>
                                    <p class="m-0 p-1 align-middle">SIMPAN PERUBAHAN</p>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal Tambah Banner -->
            <div class="modal fade" id="exampleModaltambahinformasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg">
                    <form action="/tambahtentangkami" method="post" id="form-data-solusi" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Informasi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Judul :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Judul Informasi" name="judul">
                                </div>
                                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi :</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8.5" name="deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer border-top pe-4">
                                <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;" id="btn-simpan"><i class="fa-solid fa-floppy-disk mr-2 mt-2"></i>
                                    <p class="m-0 p-1 align-middle">SIMPAN</p>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="col-12 d-flex">
            <div class="col-6 d-block">
                <br>
                <br>
                <br>
                <div class="col-12 text-start mt-5">
                    <h2 class="fw-bolder"><?= $head[0]['judul_banner'] ?></h2>
                </div>
                <div class="col-12 text-start">
                    <p class="fs-5"><?= $head[0]['deskripsi'] ?></p>
                </div>
            </div>
            <div class="col-6">
                <div class="col-12 p-3">
                    <img src="<?= ('uploads/' . esc($head[0]['gambar'])); ?>" alt="" class="img-thumbnail">
                </div>
            </div>

        </div>
        <br>
        <div class="col-12 d-flex flex-wrap gap-3 mb-4" style="height: fit-content; display: flex; flex-wrap: wrap; ">
            <?php foreach ($tentang as $key => $value) { ?>
                <div class="card " style="padding: 24px; height: fit-content; width: 100%; flex: 1 0 500px;">
                    <div class="card-kanan-atas">
                        <i class="fa-solid fa-pen-to-square mr-3" style="font-size: 30px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaleditartikel<?= $value['id'] ?>"></i>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModaleditartikel<?= $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg ">
                                <form action="/ubahtentangkami" method="post" id="form-data-ubah" class="modal-dialog-scrollable" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" value="<?= $value['id'] ?>" name="id" id="id" hidden>
                                            <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Judul
                                                    :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama Solusi" value="<?= $value['judul'] ?>" name="judul" id="deskripsi">
                                            </div>
                                            <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi
                                                    :</label>
                                                <textarea class="form-control" id="deskripsi" rows="8.5" name="deskripsi"><?= $value['deskripsi'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-top pe-4">
                                            <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;"><i class="fa-solid fa-floppy-disk mr-2 mt-2"></i>
                                                <p class="m-0 p-1 align-middle">SIMPAN PERUBAHAN</p>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- ikon hapus -->
                        <i class="fa fa-x" style="font-size: 30px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalhapusinformasi<?= $value['id'] ?>"></i>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalhapusinformasi<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalhapusinformasi<?= $value['id'] ?>">Yakin ingin menghapus informasi ini?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <form action="/hapustentangkami" method="post">
                                            <?= csrf_field() ?>
                                            <input type="text" value="<?= $value['id'] ?>" name="id" id="id" hidden>
                                            <button type="submit" class="btn btn-danger">HAPUS</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col text-right p-0 mt-3">
                        <h3 class="fw-bolder"><?= $value['judul'] ?></h3>
                    </div>
                    <div class="col text-right">
                        <p class="p-0 m-0 fs-5-vw"><?= $value['deskripsi'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<?php $this->endsection() ?>