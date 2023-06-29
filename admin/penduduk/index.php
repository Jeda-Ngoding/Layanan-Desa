<?php require('../layouts/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <i class="fas fa-table me-1"></i>
                    Data Penduduk
                </div>
                <div class="col-6 text-end">
                    <a href="/layanan_desa/admin/penduduk/create.php" class="btn btn-success btn-sm"><i class="fas fa-plus me-1"></i> Tambah Penduduk</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>No KK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>RT/RW</th>
                        <th>Kelurahan/Desa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NIK</th>
                        <th>No KK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>RT/RW</th>
                        <th>Kelurahan/Desa</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    include '../../config/database.php';
                    $b = new database();
                    $b->select("penduduk", "*");
                    $result = $b->sql;
                    ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td>
                                <div class="text-center"><?php echo $row['nik']; ?></div>
                            </td>
                            <td>
                                <div class="text-center"><?php echo $row['no_kk']; ?></div>
                            </td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['jenis_kelamin']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td>
                                <div class="text-center"><?php echo $row['rt'] . "/" . $row['rw']; ?></div>
                            </td>
                            <td><?php echo $row['kelurahan']; ?></td>
                            <td>
                                <div class="text-center">
                                    <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-secondary btn-sm">Detail</a>
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-warning btn-sm">Edit</a>
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