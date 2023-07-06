<?php 
include('layouts/header.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<div class="container">
    <div class="card my-4">
        <div class="card-body">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.pexels.com/photos/1196121/pexels-photo-1196121.jpeg"
                            class="d-block w-100 h-100 rounded" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.pexels.com/photos/2922653/pexels-photo-2922653.jpeg"
                            class="d-block w-100 h-100 rounded" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.pexels.com/photos/126793/pexels-photo-126793.jpeg"
                            class="d-block w-100 h-100 rounded" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="py-4 mb-5">
        <h4 class="mb-4">Layanan Pengajuan</h4>
        <div class="row mb-5">
            <?php 
                include './config/database.php';
                $b = new database();
                $b->select("jenis_pengajuan","*");
                $result = $b->sql;
            ?>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-3 col-sm-2 py-2">
                <a href="/layanan_desa/pengajuan/create.php?id=<?php echo $row['id']; ?>">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3><i class="fas fa-file"></i></h3>
                            <p><?php echo $row['nama']; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php 
include('layouts/footer.php');
?>