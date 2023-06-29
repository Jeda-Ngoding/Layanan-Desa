<?php require('../layouts/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <i class="fas fa-table me-1"></i>
                    Data Jenis Pengajuan
                </div>
                <div class="col-6 text-end">
                    <a href="/layanan_desa/admin/jenis_pengajuan/create.php" class="btn btn-success btn-sm"><i class="fas fa-plus me-1"></i> Tambah Jenis Pengajuan</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    include '../../config/database.php';
                    $b = new database();
                    $b->select("jenis_pengajuan", "*");
                    $result = $b->sql;
                    ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['deskripsi']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <div class="text-center">
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