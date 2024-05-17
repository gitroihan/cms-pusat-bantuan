<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $this->renderSection('layout') ?></title>
    <link href="<?= base_url('cms/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('cms/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= base_url('fontawesome/css/fontawesome.css') ?>">
    <link rel="stylesheet" href="<?= base_url('fontawesome/css/all.css') ?>">
    <!-- bootstrap -->
    <link href="<?= base_url('bootstrap-5.3.0-dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- ckeditor -->
    <script src="<?= base_url('ckeditor5-41.3.1-z2x1ah3b0t8e/build/ckeditor.js') ?>"></script>
    <!-- datatable -->
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.6/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/r-3.0.2/datatables.min.css" rel="stylesheet">
    <!-- tag atau select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/cmshome">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="<?= base_url('cms/img/logo-goldstep.png') ?> " alt="Nama Gambar" class="fas fa-laugh-wink" width="45" height="45">
                </div>
                <div class="sidebar-brand-text mx-3">
                    <div class="" style="color: #03C988;">Goldstep</div>indonesia
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] === '/cmshome') ? 'active' : ''; ?>">
                <a class="nav-link" href="/cmshome">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] === '/cmskategori' || $_SERVER['REQUEST_URI'] === '/cmskategori2') ? 'active' : ''; ?>"">
                <a class=" nav-link" href="/cmskategori">
                <i class="fa-solid fa-folder-open"></i>
                <span>Kategori</span></a>
            </li>

            <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] === '/cmsartikel' || $_SERVER['REQUEST_URI'] === '/tambah_artikel' || $_SERVER['REQUEST_URI'] === '/detail_artikel') ? 'active' : ''; ?>"">
                <a class=" nav-link" href="/cmsartikel">
                <i class="fa-solid fa-newspaper"></i>
                <span>Artikel</span></a>
            </li>
            <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] === '/cmstiket' || $_SERVER['REQUEST_URI'] === '/detail_tiket') ? 'active' : ''; ?>"">
                <a class=" nav-link" href="/cmstiket">
                <i class="fa-solid fa-ticket-simple"></i>
                <span>Tiket</span></a>
            </li>

            <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] === '/cmskontak') ? 'active' : ''; ?>"">
                <a class=" nav-link" href="/cmskontak">
                <i class="fa-solid fa-address-book"></i>
                <span>Kontak</span></a>
            </li>
            <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] === '/cmshistori') ? 'active' : ''; ?>"">
                <a class=" nav-link" href="/cmshistori">
                <i class="fa-solid fa-rectangle-history-circle-user"></i>
                <span>Riwayat</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="logoutmodalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title centered text-center" id="logoutmodalLabel">yakin ingin keluar dari akun ini?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="mt-5 centered col-8 m-auto text-center">
                            <form action="/logout" method="post" enctype="multipart/form-data">
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    </form>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle mr-3" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-3 d-none d-lg-inline text-gray-600 small"><?= esc($data['nama']); ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('uploads/' . esc($data['foto_profile'])); ?>">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/lihat_profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutmodal">
                                    <i class="fa-solid fa-right-from-bracket mr-2 text-gray-400"></i>
                                    logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <main class="" style="display: flex;">
                        <?= $this->renderSection('content') ?>
                    </main>
                </div>


            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</body>

<!-- sidebar css -->
<style>
    .nav-item.active .nav-link {
        color: #ffffff;
        background-color: #03C988;
    }
</style>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('cms/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('cms/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('cms/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('cms/js/sb-admin-2.min.js') ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('cms/vendor/chart.js/Chart.min.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('cms/js/demo/chart-area-demo.js') ?>"></script>
<script src="<?= base_url('cms/js/demo/chart-pie-demo.js') ?>"></script>
<!-- bootstrap -->
<script src="<?= base_url('bootstrap-5.3.0-dist/js/bootstrap.min.js') ?>"></script>
<!-- DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.6/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/r-3.0.2/datatables.min.js"></script>

<!-- table artikel -->
<script>
    $(document).ready(function() {
        $('#table_artikel').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= base_url('/artikel/getArtikelData') ?>', // URL ke controller untuk mendapatkan data
                type: 'POST'
            },
            language: {
                "sEmptyTable": "Tidak ada data yang tersedia di tabel",
                "sInfo": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ total entri)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Tampilkan _MENU_",
                "sLoadingRecords": "Memuat...",
                "sProcessing": "Memproses...",
                "sSearch": "Cari:",
                "sZeroRecords": "Tidak ada data yang cocok ditemukan",
                "oAria": {
                    "sSortAscending": ": aktifkan untuk mengurutkan kolom secara meningkat",
                    "sSortDescending": ": aktifkan untuk mengurutkan kolom secara menurun"
                }
            },
            columns: [
                { data: 'judul_artikel' },
                { data: 'pembuat' },
                { data: 'tanggal_unggah' },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return '<a href="/detail_artikel/' + data + '"><i class="fa-solid fa-circle-info fa-2x"></i></a>';
                    },
                    orderable: false,
                    className: 'text-center'
                }
            ]
        });
    });
</script>

<!-- table tiket -->
<script>
    $(document).ready(function() {
        $('#table_tiket').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= base_url('/tiket/getTiketData') ?>', // URL ke controller untuk mendapatkan data
                type: 'POST'
            },
            language: {
                "sEmptyTable": "Tidak ada data yang tersedia di tabel",
                "sInfo": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ total entri)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Tampilkan_MENU_",
                "sLoadingRecords": "Memuat...",
                "sProcessing": "Memproses...",
                "sSearch": "Cari:",
                "sZeroRecords": "Tidak ada data yang cocok ditemukan",
                "oAria": {
                    "sSortAscending": ": aktifkan untuk mengurutkan kolom secara meningkat",
                    "sSortDescending": ": aktifkan untuk mengurutkan kolom secara menurun"
                }
            },
            columns: [{
                    data: 'nama_kontak'
                },
                {
                    data: 'email'
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return '<a href="/detail_tiket/' + data + '"><i class="fa-solid fa-circle-info fa-2x"></i></a>';
                    },
                    orderable: false
                }
            ]
        });
    });
</script>
<!-- table riwayat -->
<script>
    $(document).ready(function() {
        $('#table_riwayat').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= base_url('/riwayat/getRiwayatData') ?>', // URL ke controller untuk mendapatkan data riwayat
                type: 'POST'
            },
            language: {
                "sEmptyTable": "Tidak ada data yang tersedia di tabel",
                "sInfo": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ total entri)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Tampilkan_MENU_",
                "sLoadingRecords": "Memuat...",
                "sProcessing": "Memproses...",
                "sSearch": "Cari:",
                "sZeroRecords": "Tidak ada data yang cocok ditemukan",
                "oAria": {
                    "sSortAscending": ": aktifkan untuk mengurutkan kolom secara meningkat",
                    "sSortDescending": ": aktifkan untuk mengurutkan kolom secara menurun"
                }
            },
            columns: [{
                    data: 'id_ref'
                },
                {
                    data: 'log_tipe'
                },
                {
                    data: 'aktivitas'
                },
                {
                    data: 'alamat_ip'
                },
                {
                    data: 'id_user'
                },
                {
                    data: 'updated_at'
                }
            ]
        });
    });
</script>

<!-- tag atau select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- tag -->
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            tags: true, // Ini memungkinkan penambahan tag baru
            tokenSeparators: [',', ' ']
        });
    });
</script>
<!-- tag -->
<!-- kategori -->
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

</html>