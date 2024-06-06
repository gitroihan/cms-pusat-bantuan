<?php $this->extend('cms/layout/main') ?>

<?php $this->section('layout') ?>
Tiket
<?php $this->endSection() ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card px-4 py-3 border-2 mb-5">
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mr-auto mb-0 text-gray-800">Tiket</h1>
        </div>
        <table id="table_tiket" class="table table-bordered table-md" style="text-align: center; ">
            <thead class="thead-dark">
                <td style="width: 20%; background-color: #03C988; color: #ffff;" class="text-center">nama</td>
                <td class="text-center" style="background-color: #03C988; color: #ffff;">email</td>
                <td style="width: 10%; background-color: #03C988; color: #ffff;" class="text-center"></td>
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
                        return '<a class="btn btn-primary" href="/detail_tiket/' + data + '">detail</a>';
                    },
                    orderable: false
                }
            ]
        });
    });
</script>
<?php $this->endSection() ?>