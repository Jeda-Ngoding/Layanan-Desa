<?php require('../layouts/header.php'); ?>

<div class="container-fluid px-4 py-4">
    <form action="">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                    Detail Surat Pengajuan
                    <a href="/layanan_desa/admin/surat_pengajuan">Kembali</a>
            </div>
            <div class="card-body">
                    <?php 
                        include '../../config/database.php';

                        $id = $_GET['id'];
                        $db = new database();
                        $db->selectSuratPengajuan("sp.id='$id'");
                        $result = $db->sql;
                        $row = mysqli_fetch_assoc($result);
                        $data = json_decode($row['data'],true);
                        $penduduk = $data['penduduk'];
                        $jenis_pengajuan = $data['jenis_pengajuan'];
                    ?>

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
                                <td>:&nbsp;<?php echo $penduduk['tempat_lahir'].",".date('d-m-Y',strtotime($penduduk['tanggal_lahir'])); ?></td>
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
                                <td>:&nbsp;<?php echo $penduduk['rt']."/".$penduduk['rw']; ?></td>
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
                    <hr>
                    <h5>Detail Pengajuan</h5>
                    <table>
                        <tbody>
                            <tr>
                                <td>Jenis Pengajuan</td>
                                <td>:&nbsp;<?php echo $jenis_pengajuan['nama']; ?></td>
                            </tr>
                            <?php 
                                if($row['id_jenis_pengajuan'] == 1 || $row['id_jenis_pengajuan'] == 2){

                                    if($row['id_jenis_pengajuan'] == 2){
                                    ?>
                                    <tr>
                                        <td>Tanggal Acara</td>
                                        <td>:&nbsp;<?php echo date('d-m-Y H:i',strtotime($data['tanggal_acara'])); ?></td>
                                    </tr>

                                    <?php }; ?>

                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:&nbsp;<?php echo $data['keterangan']; ?></td>
                                    </tr>

                                    <?php

                                }else if($row['id_jenis_pengajuan'] == 3){
                                    ?>

                                    <tr>
                                        <td>Tujuan Pengajuan</td>
                                        <td>:&nbsp;<?php echo $data['tujuan_pengajuan']; ?></td>
                                    </tr>

                                    <?php
                                }else if($row['id_jenis_pengajuan'] == 4){
                                    ?>

                                    <tr>
                                        <td>Tujuan Pengajuan SKCK</td>
                                        <td>:&nbsp;<?php echo $data['tujuan_pengajuan_skck']; ?></td>
                                    </tr>

                                    <?php
                                }else if($row['id_jenis_pengajuan'] == 5){
                                    ?>

                                    <tr>
                                        <td>Tempat, Tanggal Kematian</td>
                                        <td>:&nbsp;<?php echo $data['tempat_kematian'] .",".date('d-m-Y H:i:s',strtotime($data['tanggal_kematian'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sebab Kematian</td>
                                        <td>:&nbsp;<?php echo $data['sebab_kematian'] .",".date('d-m-Y H:i:s',strtotime($data['tanggal_kematian'])); ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                    <input type="reset" class="btn btn-warning" name="reset" value="Batal" />
                    <input type="submit" class="btn btn-primary" name="submit" value="Proses" />
                </div>
        </div>
    </form>
</div>

<?php require('../layouts/footer.php'); ?>