<?php

include '../../../config/database.php';
if (isset($_POST['submit'])) {
    $no_kk = $_POST['no_kk'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $golongan_darah = $_POST['golongan_darah'];
    $alamat = $_POST['alamat'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];
    $agama = $_POST['agama'];
    $status_perkawinan = $_POST['status_perkawinan'];
    $pekerjaan = $_POST['pekerjaan'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $created_at = date("Y-m-d h:i:s");
    $updated_at = date("Y-m-d h:i:s");

    $db = new database();
    $db->insert('penduduk',[
        'nik'=>$nik,
        'no_kk'=>$no_kk,
        'nama'=>$nama,
        'tempat_lahir'=>$tempat_lahir,
        'tanggal_lahir'=>$tanggal_lahir,
        'jenis_kelamin'=>$jenis_kelamin,
        'golongan_darah'=>$golongan_darah,
        'alamat'=>$alamat,
        'rt'=>$rt,
        'rw'=>$rw,
        'kelurahan'=>$kelurahan,
        'kecamatan'=>$kecamatan,
        'kabupaten'=>$kabupaten,
        'provinsi'=>$provinsi,
        'kode_pos'=>$kode_pos,
        'agama'=>$agama,
        'status_perkawinan'=>$status_perkawinan,
        'pekerjaan'=>$pekerjaan,
        'kewarganegaraan'=>$kewarganegaraan,
        'created_at'=>$created_at,
        'updated_at'=>$updated_at
    ]);

    if ($db == true) {
        header('location:/layanan_desa/admin/penduduk');
    }else {
        header('location:/layanan_desa/admin/penduduk/create.php');
    }
}