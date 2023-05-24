<div class="form-group">
    <label for="register-form-name">Nama:</label>
    <input type="text" name="nama" value="<?php if(isset($row)) { echo $row['nama']; } ?>" class="form-control" required>
</div>
<div class="form-group">
    <label for="register-form-name">Deskripsi:</label>
    <textarea name="deskripsi" class="form-control" required><?php if(isset($row)) { echo $row['deskripsi']; } ?></textarea>
</div>
<div class="form-group">
    <label for="register-form-name">Status:</label>
    <select name="status" class="form-control">
        <option <?php if(isset($row)) { if($row['status'] == "active") echo "selected"; } ?> value="active">Aktif</option>
        <option <?php if(isset($row)) { if($row['status'] == "inactive") echo "selected"; } ?> value="inactive">Non Aktif</option>
    </select>
</div>