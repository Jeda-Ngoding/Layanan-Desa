<?php require('layouts/header.php'); ?>

<div class="container-fluid px-4 py-4">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Hari Ini</h5>
                    <div class="text-end">
                        <p>Surat</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar w-75" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100">75%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Minggu Ini</h5>
                    <div class="text-end">
                        <p>Surat</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar w-75" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Bulan Ini</h5>
                    <div class="text-end">
                        <p>Surat</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar w-75" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Tahun Ini</h5>
                    <div class="text-end">
                        <p>Surat</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar w-75" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            Data Surat Keluar
        </div>
        <div class="card-body">
        <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Pengajuan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Pengajuan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php 
                        include '../config/database.php';
                        $db = new Database();
                        $db->selectSuratPengajuan("sp.status='done'");
                        $result = $b->sql;
                    ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['nama_penduduk']; ?></td>
                        <td><?php echo $row['nama_pengajuan']; ?></td>
                        <td><div class="text-center"><?php echo date("D, d-M-Y H:m",strtotime($row['created_at'])); ?></div></td>
                        <td><div class="text-center"><?php echo strtoupper($row['status']); ?></div></td>
                        <td>
                            <div class="text-center">
                                <a href="detail.php?id=" class="btn btn-outline-secondary btn-sm">Detail</a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require('layouts/footer.php'); ?>