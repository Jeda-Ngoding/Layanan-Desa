<?php
session_start();
include '../../config/Database.php';

$id = $_GET['id'];
$db = new Database();
$db->selectSuratPengajuan("sp.id='$id'");
$result = $db->sql;
$row = mysqli_fetch_assoc($result);
$data = json_decode($row['data'], true);
$penduduk = $data['penduduk'];
$jenis_pengajuan = $data['jenis_pengajuan'];
$idJenisPengajuan = $jenis_pengajuan['id'];

// update data pengajuan
$updated_at = date("Y-m-d h:i:s");
$db->update('surat_pengajuan', [
    'status' => 'proses',
    'id_akun' => $_SESSION["user_id"],
    'updated_at' => $updated_at
], "id=$id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Informasi Pengajuan Surat (SIPS)</title>
    <link href="/layanan_desa/assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" crossorigin="anonymous"></script>
    <style>
        .carousel-item {
            height: 500px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        window.jsPDF = window.jspdf.jsPDF;
        var docPDF = new jsPDF();

        function print() {
            var elementHTML = document.querySelector("#printTable");
            docPDF.html(elementHTML, {
                callback: function(docPDF) {
                    docPDF.save('<?php echo strtoupper($jenis_pengajuan['nama']); ?>');
                    window.close();
                },
                x: 5,
                y: 0,
                width: 200,
                windowWidth: 900,
            })
        }
    </script>
</head>

<body onload="print()">
    <main class="m-2" id="printTable">
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <td colspan="2" class="text-center">
                        <div class="text-center">
                            <img width="100" src="/layanan_desa/assets/logo_kabupaten_madiun.gif" alt="">
                        </div>
                    </td>
                    <td colspan="2" class="text-center">
                        <h5>PEMERINTAH&nbsp;&nbsp;KABUPATEN&nbsp;&nbsp;MADIUN <br> KECAMATAN&nbsp;&nbsp;WUNGU <br>
                            DESA&nbsp;&nbsp;NGLANDUK</h5>
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
                    <td><?php echo $penduduk['jenis_kelamin']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gol.Darah :
                        <?php echo $penduduk['golongan_darah']; ?></td>
                </tr>
                <tr>
                    <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c&nbsp;&nbsp;&nbsp;</td>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo $penduduk['tempat_lahir'] . "," . date('d-m-Y', strtotime($penduduk['tanggal_lahir'])); ?>
                    </td>
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
                    <td><?php echo $penduduk['status_perkawinan']; ?></td>
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
                    <td><?php echo $penduduk['alamat']; ?> RT/RW <?php echo $penduduk['rt'] . "/" . $penduduk['rw']; ?>
                        Desa <?php echo $penduduk['kelurahan']; ?> Kecamatan <?php echo $penduduk['kecamatan']; ?>
                        Kabupaten <?php echo $penduduk['kabupaten']; ?></td>
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
                    <td colspan="4">Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya :
                    </td>
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

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="/layanan_desa/assets/js/scripts.js"></script>
</body>

</html>