<?php

include '../../../config/Database.php';

$id = $_GET['id'];
$db = new Database();

$updated_at = date("Y-m-d h:i:s");

$db->update('surat_pengajuan', [
    'status' => 'done',
    'updated_at' => $updated_at
], "id='$id'");

if ($db == true) {
    header('location:/layanan_desa/admin/surat_pengajuan');
} else {
    header('location:/layanan_desa/admin/surat_pengajuan/create.php');
}
