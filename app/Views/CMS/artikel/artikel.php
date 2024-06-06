<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Artikel
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">

    <div class="card px-4 py-3 border-2 mb-5">
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mr-auto mb-0 text-gray-800">Artikel</h1>
            <div class="my-1">
                <a href="/tambah_artikel" class="btn shadow-sm mr-3 text-light" style="background-color: #03C988;">
                    <i class="fa-solid fa-plus "></i>
                    Artikel
                </a>
            </div>
        </div>
        <table id="table_artikel" class="table table-bordered table-md" style="width:100%">
            <thead>
                    <td style="background-color: #03C988; color: #ffff;">Judul Artikel</td>
                    <td style="background-color: #03C988; color: #ffff;">Pembuat</td>
                    <td style="background-color: #03C988; color: #ffff;">Tanggal Unggah</td>
                    <td style="background-color: #03C988; color: #ffff;">Status</td>
                    <td style="background-color: #03C988; color: #ffff;" class="text-center"></td>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</div>
<!-- DataTables -->
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.6/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/r-3.0.2/datatables.min.css" rel="stylesheet">

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
            columns: [{
                    data: 'judul_artikel',
                    className: 'text-center'
                },
                {
                    data: 'pembuat',
                    className: 'text-center'
                },
                {
                    data: 'tanggal_unggah',
                    className: 'text-center',
                    render: function(data, type, row) {
                        var date = new Date(data);
                        var formattedDate = date.toLocaleTimeString('id-ID') + ' ' + date.toLocaleDateString('id-ID');
                        return formattedDate;
                    }
                },
                {
                    data: 'status',
                    render: function(data, type, row) {
                        if (data === 'publish') {
                            return '<div class="badge text-bg-success text-center" style="color: white; display: inline-block; width: 100%;">Publish</div>';
                        } else if (data === 'draft') {
                            return '<div class="badge text-bg-warning text-center" style="color: black; display: inline-block; width: 100%;">Draft</div>';
                        } else {
                            return data;
                        }
                    },
                    className: 'text-center'
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return '<a class="btn btn-primary" href="/detail_artikel/' + data + '">detail</a>';
                    },
                    orderable: false,
                    className: 'text-center'
                }
            ]
        });
    });
</script>
<?php $this->endSection() ?>