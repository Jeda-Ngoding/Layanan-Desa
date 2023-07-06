<?php

include '../../../config/Database.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];
    $created_at = date("Y-m-d h:i:s");
    $updated_at = date("Y-m-d h:i:s");

    $db = new database();
    $db->insert('jenis_pengajuan',[
        'nama'=>$nama,
        'deskripsi'=>$deskripsi,
        'status'=>$status,
        'created_at'=>$created_at,
        'updated_at'=>$updated_at
    ]);

    if ($db == true) {
        header('location:/layanan_desa/admin/jenis_pengajuan');
    }else {
        header('location:/layanan_desa/admin/jenis_pengajuan/create.php');
    }
}