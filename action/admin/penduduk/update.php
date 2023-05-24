<?php

include '../../../config/database.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $updated_at = date("Y-m-d h:i:s");

    $db = new database();
    $db->update('penduduk',['nama'=>$nama,'username'=>$username,'password'=>$password,'updated_at'=>$updated_at],"id='$id'");
    if ($db == true) {
        header('location:/layanan_desa/admin/penduduk');
    }
}