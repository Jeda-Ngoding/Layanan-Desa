<?php

include '../../config/database.php';
if (isset($_POST['submit'])) {
    $id_jenis_pengajuan = $_POST['id_jenis_pengajuan'];
    $nik = $_POST['nik'];
    $data = [];
    foreach ($_POST as $key => $value) {
        $data[$key] =$value;
    }
    $created_at = date("Y-m-d h:i:s");
    $updated_at = date("Y-m-d h:i:s");

    $db = new database();

    $db->select("penduduk","*","nik='$nik'");
    $query_penduduk = $db->sql;
    $penduduk = mysqli_fetch_assoc($query_penduduk);
    $data['penduduk'] = $penduduk;

    $db->select("jenis_pengajuan","*","id='$id_jenis_pengajuan'");
    $query_jenis_pengajuan = $db->sql;
    $jenis_pengajuan = mysqli_fetch_assoc($query_jenis_pengajuan);
    $data['jenis_pengajuan'] = $jenis_pengajuan;

    $db->insert('surat_pengajuan',[
        'id_penduduk'=>$penduduk['id'],
        'id_jenis_pengajuan'=>$jenis_pengajuan['id'],
        'data'=>json_encode($data),
        'status'=>'pending',
        'created_at'=>$created_at,
        'updated_at'=>$updated_at
    ]);

    if ($db == true) {
        header('location:/layanan_desa/');
    }
}