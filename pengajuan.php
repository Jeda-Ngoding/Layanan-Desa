<?php 
include('layouts/header.php');
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-2">
                        <label for="register-form-name">NIK:</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-2">
                        <label for="register-form-name">Jenis Pengajuan:</label>
                        <select name="" class="form-select">
                            <option value="">Semua</option>
                            <option value="">SKCK</option>
                            <option value="">Surat Izin Usaha</option>
                            <option value="">Surat Keterangan Tidak Mampu</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <input class="btn btn-primary mt-4" type="button" value="Submit">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="py-2">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Pengajuan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    include './config/database.php';
                    $b = new Database();
                    $b->selectSuratPengajuan();
                    $result = $b->sql;
                ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['nama_penduduk']; ?></td>
                            <td><?php echo $row['nama_pengajuan']; ?></td>
                            <td>
                                <div class="text-center">
                                    <?php echo date("D, d-M-Y H:m",strtotime($row['created_at'])); ?></div>
                            </td>
                            <td>
                                <div class="text-center"><?php echo strtoupper($row['status']); ?></div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php 
include('layouts/footer.php');
?>