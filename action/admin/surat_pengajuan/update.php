<?php

include '../../../config/Database.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];
    $updated_at = date("Y-m-d h:i:s");

    $db = new Database();
    $db->update('surat_pengajuan',[
        'nama'=>$nama,
        'deskripsi'=>$deskripsi,
        'status'=>$status,
        'created_at'=>$created_at,
        'updated_at'=>$updated_at
    ],"id='$id'");

    if ($db == true) {
        header('location:/layanan_desa/admin/surat_pengajuan');
    }else {
        header('location:/layanan_desa/admin/surat_pengajuan/create.php');
    }
}