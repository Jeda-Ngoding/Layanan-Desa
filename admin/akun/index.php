<?php require('../layouts/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Akun
            <a href="/layanan_desa/admin/akun/create.php">Tambah Akun</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php 
                        include '../../config/database.php';
                        $b = new database();
                        $b->select("akun","*");
                        $result = $b->sql;
                    ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['level']; ?></td>
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
