<?php

include '../../../config/Database.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];
    $updated_at = date("Y-m-d h:i:s");

    $db = new database();
    $db->update('jenis_pengajuan',['nama'=>$nama,'deskripsi'=>$deskripsi,'status'=>$status,'updated_at'=>$updated_at],"id='$id'");

    if ($db == true) {
        header('location:/layanan_desa/admin/jenis_pengajuan');
    }else {
        header('location:/layanan_desa/admin/jenis_pengajuan/create.php');
    }
}