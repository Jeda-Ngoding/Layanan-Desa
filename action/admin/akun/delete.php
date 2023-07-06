<?php 
    include '../../../config/Database.php';
    $id = $_POST['id'];
    $a = new database();
    $a->delete('akun',"id='$id'");
?>