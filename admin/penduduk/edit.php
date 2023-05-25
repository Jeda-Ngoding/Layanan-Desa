<?php require('../layouts/header.php'); ?>

<div class="container-fluid px-4 py-4">
    <form action="/layanan_desa/action/admin/penduduk/update.php" method="post">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Data Penduduk
                <a href="/layanan_desa/admin/penduduk">Kembali</a>
            </div>
            <div class="card-body">
                <?php 
                        include '../../config/database.php';

                        $id = $_GET['id'];

                        $db = new database();
                        $db->select("penduduk","*","id='$id'");
                        $result = $db->sql;

                        $row = mysqli_fetch_assoc($result);
                    ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php include 'form.php'; ?>
            </div>
            <div class="card-footer">
                <input type="reset" class="btn btn-warning" name="reset" value="Batal" />
                <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
            </div>
        </div>
    </form>
</div>

<?php require('../layouts/footer.php'); ?>