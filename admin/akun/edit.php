<?php require('../layouts/header.php'); ?>

<div class="container-fluid px-4 py-4">
    <form action="/layanan_desa/action/admin/akun/update.php" method="post">
        <div class="card mt-4 mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <i class="fas fa-table me-1"></i>
                        Edit Akun
                    </div>
                    <div class="col-6 text-end">
                        <a href="/layanan_desa/admin/akun" class="btn btn-warning btn-sm"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php 
                        include '../../config/Database.php';

                        $id = $_GET['id'];

                        $db = new Database();
                        $db->select("akun","*","id='$id'");
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