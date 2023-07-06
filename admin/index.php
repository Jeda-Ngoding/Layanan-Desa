<?php
require('layouts/header.php');
include '../config/Database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<div class="container-fluid px-4 py-4">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            Data Surat Keluar
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Pengajuan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Pengajuan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $db = new Database();
                    $db->selectSuratPengajuan("sp.status='done'");
                    $suratKeluar = $db->sql;
                    ?>
                    <?php while ($row = mysqli_fetch_assoc($suratKeluar)) { ?>
                        <tr>
                            <td><?php echo $row['nama_penduduk']; ?></td>
                            <td><?php echo $row['nama_pengajuan']; ?></td>
                            <td>
                                <div class="text-center"><?php echo date("D, d-M-Y H:m", strtotime($row['created_at'])); ?></div>
                            </td>
                            <td>
                                <div class="text-center"><?php echo strtoupper($row['status']); ?></div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <a href="detail.php?id=" class="btn btn-outline-secondary btn-sm">Detail</a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require('layouts/footer.php'); ?>