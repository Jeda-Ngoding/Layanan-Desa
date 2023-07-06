<?php
include('layouts/header.php');
include 'config/database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db = new Database();
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="register-form-name">NIK:</label>
                            <input type="number" name="nik" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="register-form-name">Jenis Pengajuan:</label>
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
                    <div class="col-md-4">
                        <input class="btn btn-primary mt-4 w-100" type="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="py-2">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Pengajuan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_GET['nik']) || isset($_GET['jenis_pengajuan'])) {
                            $id_jenis_pengajuan = $_GET['jenis_pengajuan'];
                            $nik = $_GET['nik'];
                            $db->select("penduduk", "*", "nik='$nik'");
                            $query_penduduk = $db->sql;
                            $penduduk = mysqli_fetch_assoc($query_penduduk);
                            $id_penduduk = $penduduk['id'];
                            if (!empty($id_jenis_pengajuan)) {
                                $db->selectSuratPengajuan("sp.id_penduduk='$id_penduduk'AND sp.id_jenis_pengajuan='$id_jenis_pengajuan'");
                            } else {
                                $db->selectSuratPengajuan("sp.id_penduduk='$id_penduduk'");
                            }

                            $surat_pengajuan = $db->sql;
                        ?>
                            <?php

                            $row = mysqli_fetch_assoc($surat_pengajuan);

                            if (count($row) > 0) {

                                while ($row = mysqli_fetch_assoc($surat_pengajuan)) { ?>
                                    <tr>
                                        <td><?php echo $row['nama_penduduk']; ?></td>
                                        <td><?php echo $row['nama_pengajuan']; ?></td>
                                        <td>
                                            <div class="text-center">
                                                <?php echo date("D, d-M-Y H:m", strtotime($row['created_at'])); ?></div>
                                        </td>
                                        <td>
                                            <div class="text-center"><?php echo strtoupper($row['status']); ?></div>
                                        </td>
                                    </tr>

                            <?php }
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">
                                    <div class="text-center">
                                        Data tidak tersedia !
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }


                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include('layouts/footer.php');
?>