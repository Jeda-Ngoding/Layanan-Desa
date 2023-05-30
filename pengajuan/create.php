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
                <div class="row">
                    <div class="col-6">
                        <h5><?php if(isset($row)) { echo $row['nama']; } ?></h5>
                    </div>
                    <div class="col-6">
                        <div class="text-end"><a href="/layanan_desa">Kembali</a></div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php include $row['file']; ?>
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