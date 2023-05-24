<?php require('../layouts/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 mb-4">
        <form action="/layanan_desa/action/admin/jenis_pengajuan/update.php" method="post">
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit Jenis Pengajuan
                    <a href="/layanan_desa/admin/jenis_pengajuan">Kembali</a>
                </div>
                <div class="card-body">
                    <?php 
                        include '../../config/database.php';

                        $id = $_GET['id'];

                        $db = new database();
                        $db->select("jenis_pengajuan","*","id='$id'");
                        $result = $db->sql;

                        $row = mysqli_fetch_assoc($result);
                    ?>  
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <?php include 'form.php'; ?>
                </div>
                <div class="card-footer"> 
                    <input type="reset" class="btn btn-warning" name="reset" value="Batal"/>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require('../layouts/footer.php'); ?>
