<?php require('../layouts/header.php');
include '../../config/database.php';

$id = $_GET['id'];

$db = new database();
$db->select("penduduk", "*", "id='$id'");
$result = $db->sql;

$penduduk = mysqli_fetch_assoc($result);
?>

<div class="container-fluid px-4 py-4">
    <form action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <i class="fas fa-table me-1"></i>
                        Detail Penduduk
                    </div>
                    <div class="col-6 text-end">
                        <a href="/layanan_desa/admin/penduduk" class="btn btn-warning btn-sm"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="p-5">
                    <h5>Data Penduduk</h5>
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>NIK</td>
                                <td>:&nbsp;<?php echo $penduduk['nik']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:&nbsp;<?php echo $penduduk['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir</td>
                                <td>:&nbsp;<?php echo $penduduk['tempat_lahir'] . "," . date('d-m-Y', strtotime($penduduk['tanggal_lahir'])); ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:&nbsp;<?php echo $penduduk['jenis_kelamin']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gol.Darah : <?php echo $penduduk['golongan_darah']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:&nbsp;<?php echo $penduduk['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RT/RW</td>
                                <td>:&nbsp;<?php echo $penduduk['rt'] . "/" . $penduduk['rw']; ?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kel/Desa</td>
                                <td>:&nbsp;<?php echo $penduduk['kelurahan']; ?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kecamatan</td>
                                <td>:&nbsp;<?php echo $penduduk['kecamatan']; ?></td>
                            </tr>
                            <tr>
                                <td>Status Perkawinan</td>
                                <td>:&nbsp;<?php echo $penduduk['status_perkawinan']; ?></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>:&nbsp;<?php echo $penduduk['pekerjaan']; ?></td>
                            </tr>
                            <tr>
                                <td>Kewarganeraan</td>
                                <td>:&nbsp;<?php echo $penduduk['kewarganegaraan']; ?></td>
                            </tr>
                            <tr>
                                <td>Berlaku Hingga</td>
                                <td>:&nbsp;<?php echo $penduduk['status_perkawinan']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require('../layouts/footer.php'); ?>