<div class="form-group">
    <label for="register-form-name">Nama:</label>
    <input type="text" name="nama" value="<?php if(isset($row)) { echo $row['nama']; } ?>" class="form-control" required>
</div>
<div class="form-group">
    <label for="register-form-name">Username:</label>
    <input type="text" name="username" value="<?php if(isset($row)) { echo $row['username']; } ?>" class="form-control" required>
</div>
<div class="form-group">
    <label for="register-form-name">Password:</label>
    <input type="password" name="password" value="<?php if(isset($row)) { echo $row['password']; } ?>" class="form-control" required>
</div>