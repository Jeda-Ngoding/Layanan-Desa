<?php require('../layouts/header.php'); ?>

<div class="container-fluid px-4 py-4">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <i class="fas fa-table me-1"></i>
                    Detail Surat Pengajuan
                </div>
                <div class="col-6 text-end">
                    <a href="/layanan_desa/admin/surat_pengajuan" class="btn btn-warning btn-sm"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php
            include '../../config/Database.php';

            $id = $_GET['id'];
            $db = new Database();
            $db->selectSuratPengajuan("sp.id='$id'");
            $result = $db->sql;
            $row = mysqli_fetch_assoc($result);
            $data = json_decode($row['data'], true);
            $penduduk = $data['penduduk'];
            $jenis_pengajuan = $data['jenis_pengajuan'];
            ?>

            <div class="border p-2" id="template-data">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center">
                                <div class="text-center">
                                    <img width="100" src="/layanan_desa/assets/logo_kabupaten_madiun.gif" alt="">
                                </div>
                            </td>
                            <td colspan="2" class="text-center">
                                <h5>PEMERINTAH KABUPATEN MADIUN <br> KECAMATAN WUNGU <br> DESA NGLANDUK</h5>
                                <span>Jalan Tanjung Anom Nomer 14 Kode Pos 63181</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center"></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center">
                                <h5><?php echo strtoupper($jenis_pengajuan['nama']); ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center">
                                <div class="row">
                                    <div class="col-4 text-end py-1">Nomor :</div>
                                    <div class="col-8"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <td colspan="4">Yang bertanda tangan dibawah ini :</td>
                        </tr>
                        <tr>
                            <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a&nbsp;&nbsp;&nbsp;</td>
                            <td>Nama</td>
                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b&nbsp;&nbsp;&nbsp;</td>
                            <td>Jabatan</td>
                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <td colspan="4">dengan ini menerangkan bahwa :</td>
                        </tr>
                        <tr>
                            <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a&nbsp;&nbsp;&nbsp;</td>
                            <td>Nama</td>
                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td><?php echo $penduduk['nama']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b&nbsp;&nbsp;&nbsp;</td>
                            <td>Jenis Kelamin</td>
                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td><?php echo $penduduk['jenis_kelamin']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gol.Darah : <?php echo $penduduk['golongan_darah']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c&nbsp;&nbsp;&nbsp;</td>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td><?php echo $penduduk['tempat_lahir'] . "," . date('d-m-Y', strtotime($penduduk['tanggal_lahir'])); ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;&nbsp;</td>
                            <td>NIK</td>
                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td><?php echo $penduduk['nik']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e&nbsp;&nbsp;&nbsp;</td>
                            <td>Agama</td>
                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td><?php echo $penduduk['agama']; ?></td>
                        </tr>

                        <tr>
                            <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;f&nbsp;&nbsp;&nbsp;</td>
                            <td>Kewarganeraan</td>
                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td><?php echo $penduduk['kewarganegaraan']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;g&nbsp;&nbsp;&nbsp;</td>
                            <td>Status Perkawinan</td>
                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td><?php

                                switch ($penduduk['status_perkawinan']) {
                                    case 1:
                                        echo 'Lajang';
                                        break;
                                    case 2:
                                        echo 'Menikah';
                                        break;
                                    case 3:
                                        echo 'Cerai Hidup';
                                        break;
                                    case 4:
                                        echo  'Cerai Mati';
                                        break;
                                    default:
                                        echo '-';
                                        break;
                                }

                                ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;h&nbsp;&nbsp;&nbsp;</td>
                            <td>Pekerjaan</td>
                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td><?php echo $penduduk['pekerjaan']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i&nbsp;&nbsp;&nbsp;</td>
                            <td>Alamat</td>
                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td><?php echo $penduduk['alamat']; ?> RT/RW <?php echo $penduduk['rt'] . "/" . $penduduk['rw']; ?> Desa <?php echo $penduduk['kelurahan']; ?> Kecamatan <?php echo $penduduk['kecamatan']; ?> Kabupaten <?php echo $penduduk['kabupaten']; ?></td>
                        </tr>
                        <?php
                        if ($jenis_pengajuan['id'] == 1) {
                            include 'keterangan/sku.php';
                        } elseif ($jenis_pengajuan['id'] == 2) {
                            include 'keterangan/sik.php';
                        } elseif ($jenis_pengajuan['id'] == 3) {
                            include 'keterangan/sktm.php';
                        } elseif ($jenis_pengajuan['id'] == 4) {
                            include 'keterangan/skck.php';
                        } elseif ($jenis_pengajuan['id'] == 5) {
                            include 'keterangan/sk.php';
                        }
                        ?>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <td colspan="4">Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya :</td>
                        </tr>
                    </tbody>
                </table>
                <!-- SKCK -->
                <?php
                if ($jenis_pengajuan['id'] == 1) {
                    include 'ttd/sku.php';
                } elseif ($jenis_pengajuan['id'] == 2) {
                    include 'ttd/sik.php';
                } elseif ($jenis_pengajuan['id'] == 3) {
                    include 'ttd/sktm.php';
                } elseif ($jenis_pengajuan['id'] == 4) {
                    include 'ttd/skck.php';
                } elseif ($jenis_pengajuan['id'] == 5) {
                    include 'ttd/sk.php';
                }
                ?>
            </div>
        </div>
        <div class="card-footer">
            <a href="proses.php?id=<?php echo $row['id']; ?>" target="_blank" class="btn btn-primary">Proses & Download Dokumen</a>
        </div>
    </div>
</div>

<?php require('../layouts/footer.php'); ?>