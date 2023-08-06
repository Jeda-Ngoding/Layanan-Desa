<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">No KK:</label>
                    <input type="number" name="no_kk" value="<?php if (isset($row)) {
                                                                    echo $row['no_kk'];
                                                                } ?>" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">NIK:</label>
                    <input type="number" name="nik" value="<?php if (isset($row)) {
                                                                echo $row['nik'];
                                                            } ?>" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="form-group mb-2">
            <label for="register-form-name">Nama:</label>
            <input type="text" name="nama" value="<?php if (isset($row)) {
                                                        echo $row['nama'];
                                                    } ?>" class="form-control" required>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">Tempat Lahir:</label>
                    <input type="text" name="tempat_lahir" value="<?php if (isset($row)) {
                                                                        echo $row['tempat_lahir'];
                                                                    } ?>" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">Tanggal Lahir:</label>
                    <input type="date" name="tanggal_lahir" value="<?php if (isset($row)) {
                                                                        echo $row['tanggal_lahir'];
                                                                    } ?>" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">Jenis Kelamin:</label>
                    <select class="form-select" name="jenis_kelamin" required>
                        <option <?php if (isset($row) && $row['jenis_kelamin'] == "Laki-laki") {
                                    echo "selected";
                                } ?> value="Laki-laki">Laki-laki</option>
                        <option <?php if (isset($row) && $row['jenis_kelamin'] == "Perempuan") {
                                    echo "selected";
                                } ?> value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">Golongan Darah:</label>
                    <input type="text" name="golongan_darah" value="<?php if (isset($row)) {
                                                                        echo $row['golongan_darah'];
                                                                    } ?>" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">Agama:</label>
                    <select class="form-select" name="agama" required>
                        <?php while ($row_agama = mysqli_fetch_assoc($result_agama)) { ?>
                            <option <?php if (isset($row) && $row['agama'] == $row_agama['nama']) {
                                        echo "selected";
                                    } ?> value="<?php if (isset($row)) {
                                                    echo $row['agama'];
                                                } ?>"><?php if (isset($row_agama)) {
                                                            echo $row_agama['nama'];
                                                        } ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">Status Perkawinan:</label>
                    <select class="form-select" name="status_perkawinan" required>
                        <?php while ($row_status_perkawinan = mysqli_fetch_assoc($result_status_perkawinan)) { ?>
                            <option <?php if (isset($row) && $row['status_perkawinan'] == $row_status_perkawinan['nama']) {
                                        echo "selected";
                                    } ?> value="<?php if (isset($row)) {
                                                    echo $row['status_perkawinan'];
                                                } ?>"><?php if (isset($row_status_perkawinan)) {
                                                            echo $row_status_perkawinan['nama'];
                                                        } ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">Pekerjaan:</label>
                    <input type="text" name="pekerjaan" value="<?php if (isset($row)) {
                                                                    echo $row['pekerjaan'];
                                                                } ?>" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">Kewarganegaraan:</label>
                    <select class="form-select" name="jenis_kelamin" required>
                        <option <?php if (isset($row) && $row['kewarganegaraan'] == "WNI") {
                                    echo "selected";
                                } ?> value="WNI">WNI</option>
                        <option <?php if (isset($row) && $row['kewarganegaraan'] == "WNA") {
                                    echo "selected";
                                } ?> value="WNA">WNA</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-2">
            <label for="register-form-name">Alamat:</label>
            <textarea class="form-control" name="alamat" rows="4" required><?php if (isset($row)) {
                                                                                echo $row['alamat'];
                                                                            } ?></textarea>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">RT:</label>
                    <input type="number" name="rt" value="<?php if (isset($row)) {
                                                                echo $row['rt'];
                                                            } ?>" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">RW:</label>
                    <input type="number" name="rw" value="<?php if (isset($row)) {
                                                                echo $row['rw'];
                                                            } ?>" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">Provinsi:</label>
                    <select class="form-select" name="provinsi" required>
                        <?php while ($row_provincies = mysqli_fetch_assoc($result_provincied)) { ?>
                            <option <?php if (isset($row) && $row['provinsi'] == $row_provincies['name']) {
                                        echo "selected";
                                    } ?> value="<?php if (isset($row)) {
                                                    echo $row['provinsi'];
                                                } ?>"><?php if (isset($row_provincies)) {
                                                            echo $row_provincies['name'];
                                                        } ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">Kabupaten/Kota:</label>
                    <input type="text" name="kabupaten" value="<?php if (isset($row)) {
                                                                    echo $row['kabupaten'];
                                                                } ?>" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">Kecamatan:</label>
                    <input type="text" name="kecamatan" value="<?php if (isset($row)) {
                                                                    echo $row['kecamatan'];
                                                                } ?>" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">Kelurahan / Desa:</label>
                    <input type="text" name="kelurahan" value="<?php if (isset($row)) {
                                                                    echo $row['kelurahan'];
                                                                } ?>" class="form-control" required>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="register-form-name">Kode Pos:</label>
                    <input type="number" name="kode_pos" value="<?php if (isset($row)) {
                                                                    echo $row['kode_pos'];
                                                                } ?>" class="form-control" required>
                </div>
            </div>
        </div>
    </div>
</div>