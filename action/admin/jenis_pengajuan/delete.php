<?php 
    
    include '../../../config/database.php';

    $id = $_POST['id'];

    $a = new database();
    $a->delete('jenis_pengajuan',"id='$id'");
?>