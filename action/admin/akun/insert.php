<?php

include '../../../config/database.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $created_at = date("Y-m-d h:i:s");
    $updated_at = date("Y-m-d h:i:s");

    $db = new database();
    $db->insert('akun',[
        'nama'=>$nama,
        'username'=>$username,
        'password'=>$password,
        'created_at'=>$created_at,
        'updated_at'=>$updated_at
    ]);

    if ($db == true) {
        header('location:/layanan_desa/admin/akun');
    }else {
        header('location:/layanan_desa/admin/akun/create.php');
    }
}