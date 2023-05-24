<?php require('../layouts/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Surat Pengajuan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Jenis Pengajuan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Jenis Pengajuan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Andri</td>
                        <td>Pengajuan Izin Acara</td>
                        <td>23 Mei 2023</td>
                        <td>Pending</td>
                        <td>
                            <div class="text-center">
                                <a href="detail.php?id=" class="btn btn-outline-secondary btn-sm">Detail</a>
                                <a href="edit.php?id=" class="btn btn-outline-warning btn-sm">Proses</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require('../layouts/footer.php'); ?>