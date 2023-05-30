<?php require('../layouts/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Surat Pengajuan
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
                        include '../../config/database.php';
                        $b = new Database();
                        $b->selectSuratPengajuan();
                        $result = $b->sql;
                    ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['nama_penduduk']; ?></td>
                        <td><?php echo $row['nama_pengajuan']; ?></td>
                        <td><div class="text-center"><?php echo date("D, d-M-Y H:m",strtotime($row['created_at'])); ?></div></td>
                        <td><div class="text-center"><?php echo strtoupper($row['status']); ?></div></td>
                        <td>
                            <div class="text-center">
                                <a href="detail.php?id=" class="btn btn-outline-secondary btn-sm">Detail</a>
                                <a href="edit.php?id=" class="btn btn-outline-warning btn-sm">Proses</a>
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