<?php 
 
 include '../../config/Database.php';
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("location:/layanan_desa/admin");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new database();
    $db->select("akun","*","username='$username' AND password='$password'");
    $result = $db->sql;

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("location:/layanan_desa/admin");
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
        header("location:/layanan_desa/login.php");
    }
}
 
?>