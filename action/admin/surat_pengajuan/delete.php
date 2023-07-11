<?php 
    
    include '../../../config/Database.php';

    $id = $_POST['id'];

    $a = new database();
    $a->delete('surat_pengajuan',"id='$id'");
?>