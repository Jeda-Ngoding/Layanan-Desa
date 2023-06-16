<?php 
require('layouts/header.php');
include '../config/database.php';

?>

<div class="container-fluid px-4 py-4">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Hari Ini</h5>
                    <div class="text-end">
                        <p><?php 
                        $db = new Database();
                        // total surat pengajuan hari ini
                        $start_date_today = date("Y-m-d 00:00:00");
                        $end_date_today = date("Y-m-d 23:59:59");
                        $db->select("surat_pengajuan","*","created_at between '$start_date_today' and '$end_date_today'");
                        $query_surat_pengajuan_today  = $db->sql;
                        $total_surat_pengajuan_today = count(mysqli_fetch_assoc($query_surat_pengajuan_today));
                        // total surat pengajuan hari ini
                        echo $total_surat_pengajuan_today;
                        $db->__destruct();
                        ?> Surat</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar w-75" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100">75%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Minggu Ini</h5>
                    <div class="text-end">
                        <p><?php 
                        $db = new Database();
                        // total surat pengajuan minggu ini
                        $start_date_weekly = date("Y-m-d 00:00:00", strtotime("this week monday"));
                        $end_date_weekly = date("Y-m-d 23:59:59", strtotime("last sunday"));
                        $db->select("surat_pengajuan","*","created_at between '$start_date_weekly' and  '$end_date_weekly'");
                        $query_surat_pengajuan_weekly  = $db->sql;
                        $total_surat_pengajuan_weekly = count(mysqli_fetch_assoc($query_surat_pengajuan_weekly));
                        // total surat pengajuan minggu ini
                        echo $total_surat_pengajuan_weekly;
                        $db->__destruct(); ?> Surat</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar w-75" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Bulan Ini</h5>
                    <div class="text-end">
                    <p><?php 
                    $db = new Database();
                    // total surat pengajuan bulan ini
                    $start_date_monthly = date("Y-m-01 00:00:00");
                    $end_date_monthly = date("Y-m-t 23:59:59");
                    $db->select("surat_pengajuan","*","created_at between '$start_date_monthly' and  '$end_date_monthly'");
                    $query_surat_pengajuan_monthly  = $db->sql;
                    $total_surat_pengajuan_monthly = count(mysqli_fetch_assoc($query_surat_pengajuan_monthly));
                    // total surat pengajuan bulan ini
                    echo $total_surat_pengajuan_monthly;
                    $db->__destruct(); ?> Surat</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar w-75" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Tahun Ini</h5>
                    <div class="text-end">
                    <p><?php 
                    $db = new Database();
                    // total surat pengajuan bulan ini
                    $start_date_annually = date("Y-01-01 00:00:00");
                    $end_date_annually = date("Y-12-t 23:59:59");
                    $db->select("surat_pengajuan","*","created_at between '$start_date_annually' and '$end_date_annually'");
                    $query_surat_pengajuan_annually  = $db->sql;
                    $total_surat_pengajuan_annually = count(mysqli_fetch_assoc($query_surat_pengajuan_annually));
                    // total surat pengajuan bulan ini
                    echo $total_surat_pengajuan_annually;
                    $db->__destruct(); ?> Surat</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar w-75" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100">25%</div>
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
                    <?php while ($row = mysqli_fetch_assoc($suratKeluar)) { ?>
                    <tr>
                        <td><?php echo $row['nama_penduduk']; ?></td>
                        <td><?php echo $row['nama_pengajuan']; ?></td>
                        <td><div class="text-center"><?php echo date("D, d-M-Y H:m",strtotime($row['created_at'])); ?></div></td>
                        <td><div class="text-center"><?php echo strtoupper($row['status']); ?></div></td>
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