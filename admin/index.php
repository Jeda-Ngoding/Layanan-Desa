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

if (!empty($_GET['start_date_sum']) && !empty($_GET['end_date_sum'])) {
    $start_date = $_GET['start_date_sum'] . " 00:00:00";
    $end_date = $_GET['end_date_sum'] . " 23:59:59";
    $db->select("surat_pengajuan", "count(*) as total_pengajuan_masuk", "created_at between '$start_date' AND '$end_date'");
} else {
    $db->select("surat_pengajuan", "count(*) as total_pengajuan_masuk");
}

$resultTotalPengajuan = $db->sql;
$rowTotalPengajuan = mysqli_fetch_assoc($resultTotalPengajuan);

if (!empty($_GET['start_date_sum']) && !empty($_GET['end_date_sum'])) {
    $start_date = $_GET['start_date_sum'] . " 00:00:00";
    $end_date = $_GET['end_date_sum'] . " 23:59:59";
    $db->select("surat_pengajuan", "count(*) as total_pengajuan_proses", "status='proses' AND created_at between '$start_date' AND '$end_date'");
} else {
    $db->select("surat_pengajuan", "count(*) as total_pengajuan_proses", "status='proses'");
}
$resultTotalPengajuanProses = $db->sql;
$rowTotalPengajuanProses = mysqli_fetch_assoc($resultTotalPengajuanProses);

if (!empty($_GET['start_date_sum']) && !empty($_GET['end_date_sum'])) {
    $start_date = $_GET['start_date_sum'] . " 00:00:00";
    $end_date = $_GET['end_date_sum'] . " 23:59:59";
    $db->select("surat_pengajuan", "count(*) as total_pengajuan_done", "status='proses' AND created_at between '$start_date' AND '$end_date'");
} else {
    $db->select("surat_pengajuan", "count(*) as total_pengajuan_done", "status='done'");
}
$resultTotalPengajuanDone = $db->sql;
$rowTotalPengajuanDone = mysqli_fetch_assoc($resultTotalPengajuanDone);

?>

<div class="container-fluid px-4 py-4">
    <div class="form-group mb-3">
        <form action="" method="get">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Mulai Tanggal</label>
                        <input type="date" name="start_date_sum" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Sampai Tanggal</label>
                        <input type="date" name="end_date_sum" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <input class="btn btn-primary mt-4 w-100" type="submit" value="Filter">
                </div>
            </div>
        </form>
    </div>
    <hr>
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
            <div class="md-3">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Mulai Tanggal</label>
                                <input type="date" name="start_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Sampai Tanggal</label>
                                <input type="date" name="end_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Jenis Pengajuan</label>
                                <select name="jenis_pengajuan" class="form-select">
                                    <option value="">Semua</option>
                                    <?php
                                    $db->select("jenis_pengajuan", "*");
                                    $jenis_pengajuan = $db->sql;
                                    ?>
                                    <?php while ($row = mysqli_fetch_assoc($jenis_pengajuan)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input class="btn btn-primary mt-4 w-100" type="submit" value="Cari Data">
                        </div>
                    </div>
                </form>
            </div>
            <hr>
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

                    if (!empty($_GET['start_date']) && !empty($_GET['end_date']) && !empty($_GET['jenis_pengajuan']) && !empty($_GET['status'])) {
                        $start_date = $_GET['start_date'] . " 00:00:00";
                        $end_date = $_GET['end_date'] . " 23:59:59";
                        $id_jenis_pengajuan = $_GET['jenis_pengajuan'];
                        $status = $_GET['status'];
                        $db->selectSuratPengajuan("sp.id_jenis_pengajuan='$id_jenis_pengajuan' AND sp.status='done' AND sp.created_at between '$start_date' AND '$end_date'");
                        $resultSP = $db->sql;
                    } else {
                        if (!empty($_GET['start_date']) && !empty($_GET['end_date']) && !empty($_GET['jenis_pengajuan'])) {
                            $start_date = $_GET['start_date'] . " 00:00:00";
                            $end_date = $_GET['end_date'] . " 23:59:59";
                            $id_jenis_pengajuan = $_GET['jenis_pengajuan'];
                            $db->selectSuratPengajuan("sp.status='done' AND sp.id_jenis_pengajuan='$id_jenis_pengajuan' AND sp.created_at between '$start_date' AND '$end_date'");
                            $resultSP = $db->sql;
                        } else if (!empty($_GET['start_date']) && !empty($_GET['end_date']) && !empty($_GET['status'])) {
                            $start_date = $_GET['start_date'] . " 00:00:00";
                            $end_date = $_GET['end_date'] . " 23:59:59";
                            $status = $_GET['status'];
                            $db->selectSuratPengajuan("sp.status='done' AND sp.created_at between '$start_date' AND '$end_date'");
                            $resultSP = $db->sql;
                        } else if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {
                            $start_date = $_GET['start_date'] . " 00:00:00";
                            $end_date = $_GET['end_date'] . " 23:59:59";
                            $db->selectSuratPengajuan("sp.status='done' AND sp.created_at between '$start_date' AND '$end_date'");
                            $resultSP = $db->sql;
                        } else {
                            if (!empty($_GET['jenis_pengajuan'])) {
                                $id_jenis_pengajuan = $_GET['jenis_pengajuan'];
                                $db->selectSuratPengajuan("sp.status='done' AND sp.id_jenis_pengajuan='$id_jenis_pengajuan'");
                                $resultSP = $db->sql;
                            } else if (!empty($_GET['status'])) {
                                $status = $_GET['status'];
                                $db->selectSuratPengajuan("sp.status='done'");
                                $resultSP = $db->sql;
                            } else {
                                $db->selectSuratPengajuan("sp.status='done'");
                                $resultSP = $db->sql;
                            }
                        }
                    }
                    while ($row = mysqli_fetch_assoc($resultSP)) { ?>
                        <tr>
                            <td><?php echo $row['nama_penduduk']; ?></td>
                            <td><?php echo $row['nama_pengajuan']; ?></td>
                            <td>
                                <div class="text-center"><?php echo date("D, d-M-Y H:m", strtotime($row['created_at'])); ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <?php if ($row['status'] == 'done') echo 'Selesai';
                                    else if ($row['status'] == 'proses') echo 'Proses';
                                    else if ($row['status'] == 'pending') echo 'Belum Diproses'; ?>
                                </div>
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