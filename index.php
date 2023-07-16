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
                        <img src="assets/image-1.jpeg"
                            class="d-block w-100 h-100 rounded" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Pelantikan & Pengambilan Sumpah Jabatan</h5>
                            <p>Pelantikan & Pengambilan Sumpah Jabatan Kepala Dusun Punden Sebelum Menjalani Masa Tugas.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/image-2.jpeg"
                            class="d-block w-100 h-100 rounded" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Kegiatan Sosialisasi Hidup Sehat</h5>
                            <p>Kegiatan Positif Untuk Meningkatkan Wawasan Masyarakat Akan Pentingnya Menjaga Pola Hidup Sehat.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/image-3.jpeg"
                            class="d-block w-100 h-100 rounded" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Jum'at Sehat</h5>
                            <p>Kegiatan Olahraga Rutin Sekecamatan Yang Dilaksanakan Tiap Akhir Bulan.</p>
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
                include 'config/Database.php';
                $b = new database();
                $b->select("jenis_pengajuan","*","status='active'");
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