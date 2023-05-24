<?php 
include('layouts/header.php');
?>

<div class="container">
    <div class="row justify-content-center py-5">
        <?php 
            include 'config/database.php';
            $b = new database();
            $b->select("jenis_pengajuan","*");
            $result = $b->sql;
        ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <?php echo $row['nama']; ?>
                    </div>
                </div>
            </div>
        </div>      
        <?php } ?>   
    </div>
</div>

<?php 
include('layouts/footer.php');
?>