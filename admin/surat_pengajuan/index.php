<?php
require('../layouts/header.php');

include '../../config/Database.php';
$db = new Database();
?>

<div class="container-fluid px-4">
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Surat Pengajuan
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

                    if ($_GET['start_date'] && $_GET['end_date'] && $_GET['jenis_pengajuan']) {
                        echo "Full Filter";
                        $start_date = $_GET['start_date'] . " 00:00:00";
                        $end_date = $_GET['start_date'] . " 23:59:59";
                        $id_jenis_pengajuan = $_GET['jenis_pengajuan'];
                        $db->selectSuratPengajuan("sp.id_jenis_pengajuan='$id_jenis_pengajuan' AND sp.created_at between '$start_date' AND '$end_date'");
                        $resultSP = $db->sql;
                    } else {
                        if (!empty($_GET['start_date'])) {
                            echo "Start Date";
                            $start_date = $_GET['start_date'] . " 00:00:00";
                            $end_date = $_GET['start_date'] . " 23:59:59";
                            $db->selectSuratPengajuan("sp.created_at between '$start_date' AND '$end_date'");
                            $resultSP = $db->sql;
                        } else if (!empty($_GET['end_date'])) {
                            echo "End Date";
                            $start_date = $_GET['end_date'] . " 00:00:00";
                            $end_date = $_GET['end_date'] . " 23:59:59";
                            $db->selectSuratPengajuan("sp.created_at between '$start_date' AND '$end_date'");
                            $resultSP = $db->sql;
                        } else if (!empty($_GET['jenis_pengajuan'])) {
                            echo "Jenis Pengajuan";
                            $id_jenis_pengajuan = $_GET['jenis_pengajuan'];
                            $db->selectSuratPengajuan("sp.id_jenis_pengajuan='$id_jenis_pengajuan'");
                            $resultSP = $db->sql;
                        } else {
                            $db->selectSuratPengajuan();
                            $resultSP = $db->sql;
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
                                <div class="text-center"><?php echo strtoupper($row['status']); ?></div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-secondary btn-sm">Detail</a>
                                    <?php
                                    if ($row['status'] == 'proses') {
                                    ?>
                                        <a href="/layanan_desa/action/admin/surat_pengajuan/done.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Selesai</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="#" class="btn btn-success btn-sm disabled" disabled>Selesai</a>
                                    <?php
                                    }

                                    ?>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require('../layouts/footer.php'); ?>