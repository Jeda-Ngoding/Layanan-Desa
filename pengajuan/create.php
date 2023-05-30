<?php 
    include('../layouts/header.php');

    include '../config/database.php';

    $id = $_GET['id'];

    $db = new database();
    $db->select("jenis_pengajuan","*","id='$id'");
    $result = $db->sql;

    $row = mysqli_fetch_assoc($result);
?>

<div class="container">

    <form action="/layanan_desa/action/pengajuan/insert.php" method="post">
        <input type="hidden" name="id_jenis_pengajuan" value="<?php echo $id; ?>">
        <div class="card">
            <div class="card-header">
                <?php if(isset($row)) { echo $row['nama']; } ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="register-form-name">Nama:</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="register-form-name">NIK:</label>
                            <input type="text" name="nik" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="register-form-name">Keterangan:</label>
                    <textarea class="form-control" name="keterangan" rows="10"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <input type="reset" class="btn btn-warning" name="reset" value="Batal" />
                <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
            </div>
        </div>
    </form>

</div>

<?php 
include('../layouts/footer.php');
?>