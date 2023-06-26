<?php require('../layouts/header.php'); ?>

<div class="container-fluid px-4 py-4">
    <form action="/layanan_desa/action/admin/akun/insert.php" method="post">
        <div class="card mt-4 mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Buat Akun Baru
                <a href="/layanan_desa/admin/akun">Kembali</a>
            </div>
            <div class="card-body">
                <?php include 'form.php'; ?>
            </div>
            <div class="card-footer"> 
                <input type="reset" class="btn btn-warning" name="reset" value="Batal"/>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
            </div>
        </div>
    </form>
</div>

<?php require('../layouts/footer.php'); ?>
