<?php require('../layouts/header.php'); ?>

<?php

include '../../config/Database.php';
$db = new Database();
$db->select("agama", "*");
$result_agama = $db->sql;

$db->select("status_perkawinan", "*");
$result_status_perkawinan = $db->sql;

?>

<div class="container-fluid px-4 py-4">
    <form action="/layanan_desa/action/admin/penduduk/insert.php" method="post">
        <div class="card mt-4 mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <i class="fas fa-table me-1"></i>
                        Tambah Data Penduduk
                    </div>
                    <div class="col-6 text-end">
                        <a href="/layanan_desa/admin/penduduk" class="btn btn-warning btn-sm"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
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