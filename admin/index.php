<?php
require('layouts/header.php');
include '../config/Database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new Database();
$db->select("penduduk", "count(*) as total");
$resultTotalPenduduk = $db->sql;
$rowPenduduk = mysqli_fetch_assoc($resultTotalPenduduk);

$db->select("surat_pengajuan","count(*) as total_pengajuan_masuk");
$resultTotalPengajuan = $db->sql;
$rowTotalPengajuan = mysqli_fetch_assoc($resultTotalPengajuan);

$db->select("surat_pengajuan","count(*) as total_pengajuan_proses","status='proses'");
$resultTotalPengajuanProses = $db->sql;
$rowTotalPengajuanProses = mysqli_fetch_assoc($resultTotalPengajuanProses);

$db->select("surat_pengajuan","count(*) as total_pengajuan_done","status='done'");
$resultTotalPengajuanDone = $db->sql;
$rowTotalPengajuanDone = mysqli_fetch_assoc($resultTotalPengajuanDone);

?>

<div class="container-fluid px-4 py-4">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="text-center">
                        <p><?php echo $rowPenduduk['total']; ?> <br /> Total Penduduk</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="text-center">
                        <p><?php echo $rowTotalPengajuan['total_pengajuan_masuk']; ?> <br /> Pengajuan Masuk</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="text-center">
                        <p><?php echo $rowTotalPengajuanProses['total_pengajuan_proses']; ?> <br /> Pengajuan Proses</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="text-center">
                        <p><?php echo $rowTotalPengajuanDone['total_pengajuan_done']; ?> <br /> Pengajuan Selesai</p>
                    </div>
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
                    <?php while ($rowSP = mysqli_fetch_assoc($suratKeluar)) { ?>
                        <tr>
                            <td><?php echo $rowSP['nama_penduduk']; ?></td>
                            <td><?php echo $rowSP['nama_pengajuan']; ?></td>
                            <td>
                                <div class="text-center"><?php echo date("D, d-M-Y H:m", strtotime($rowSP['created_at'])); ?></div>
                            </td>
                            <td>
                                <div class="text-center"><?php echo strtoupper($rowSP['status']); ?></div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <a href="/layanan_desa/admin/surat_pengajuan/detail.php?proses=false&id=<?php echo $rowSP['id']; ?>" class="btn btn-outline-secondary btn-sm">Detail</a>
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