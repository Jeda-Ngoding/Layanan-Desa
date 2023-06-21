<?php
include '../../config/database.php';

$id = $_GET['id'];
$db = new database();
$db->selectSuratPengajuan("sp.id='$id'");
$result = $db->sql;
$row = mysqli_fetch_assoc($result);
$data = json_decode($row['data'], true);
$penduduk = $data['penduduk'];
$jenis_pengajuan = $data['jenis_pengajuan'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="/layanan_desa/assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .carousel-item {
            height: 500px;
        }
    </style>
</head>

<body class="">

    <main>
        <div class="container-fluid px-4 py-4">
            <div class="w-75 m-auto">
                <div class="card">
                    <div class="card-body">

                        <div class="p-5">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <h4>Surat Keterangan</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-center">Nomor : </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Yang bertanda tangan dibawah ini :</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">a</td>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">b</td>
                                        <td>Jabatan</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">dengan ini menerangkan bahwa :</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">a</td>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?php echo $penduduk['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">b</td>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td><?php echo $penduduk['jenis_kelamin']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gol.Darah : <?php echo $penduduk['golongan_darah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">c</td>
                                        <td>Tempat, Tanggal Lahir</td>
                                        <td>:</td>
                                        <td><?php echo $penduduk['tempat_lahir'] . "," . date('d-m-Y', strtotime($penduduk['tanggal_lahir'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">d</td>
                                        <td>NIK</td>
                                        <td>:</td>
                                        <td><?php echo $penduduk['nik']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">e</td>
                                        <td>Agama</td>
                                        <td>:</td>
                                        <td><?php echo $penduduk['agama']; ?></td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">f</td>
                                        <td>Kewarganeraan</td>
                                        <td>:</td>
                                        <td><?php echo $penduduk['kewarganegaraan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">g</td>
                                        <td>Status Perkawinan</td>
                                        <td>:</td>
                                        <td><?php echo $penduduk['status_perkawinan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">h</td>
                                        <td>Pekerjaan</td>
                                        <td>:</td>
                                        <td><?php echo $penduduk['pekerjaan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">i</td>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?php echo $penduduk['alamat']; ?> RT/RW <?php echo $penduduk['rt'] . "/" . $penduduk['rw']; ?> Desa <?php echo $penduduk['kelurahan']; ?> Kecamatan <?php echo $penduduk['kecamatan']; ?> Kabupaten <?php echo $penduduk['kabupaten']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">j</td>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">k</td>
                                        <td>Berlaku mulai tanggal</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">l</td>
                                        <td>Tujuan</td>
                                        <td>:</td>
                                        <td><?php echo $penduduk['status_perkawinan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya :</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <h5>Detail Pengajuan</h5>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Jenis Pengajuan</td>
                                        <td><?php echo $jenis_pengajuan['nama']; ?></td>
                                    </tr>
                                    <?php
                                    if ($row['id_jenis_pengajuan'] == 1 || $row['id_jenis_pengajuan'] == 2) {

                                        if ($row['id_jenis_pengajuan'] == 2) {
                                    ?>
                                            <tr>
                                                <td>Tanggal Acara</td>
                                                <td><?php echo date('d-m-Y H:i', strtotime($data['tanggal_acara'])); ?></td>
                                            </tr>

                                        <?php }; ?>

                                        <tr>
                                            <td>Keterangan</td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                        </tr>

                                    <?php

                                    } else if ($row['id_jenis_pengajuan'] == 3) {
                                    ?>

                                        <tr>
                                            <td>Tujuan Pengajuan</td>
                                            <td><?php echo $data['tujuan_pengajuan']; ?></td>
                                        </tr>

                                    <?php
                                    } else if ($row['id_jenis_pengajuan'] == 4) {
                                    ?>

                                        <tr>
                                            <td>Tujuan Pengajuan SKCK</td>
                                            <td><?php echo $data['tujuan_pengajuan_skck']; ?></td>
                                        </tr>

                                    <?php
                                    } else if ($row['id_jenis_pengajuan'] == 5) {
                                    ?>

                                        <tr>
                                            <td>Tempat, Tanggal Kematian</td>
                                            <td><?php echo $data['tempat_kematian'] . "," . date('d-m-Y H:i:s', strtotime($data['tanggal_kematian'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Sebab Kematian</td>
                                            <td><?php echo $data['sebab_kematian'] . "," . date('d-m-Y H:i:s', strtotime($data['tanggal_kematian'])); ?></td>
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
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/layanan_desa/assets/js/scripts.js"></script>
</body>

</html>