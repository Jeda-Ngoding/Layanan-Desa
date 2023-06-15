<?php require('../layouts/header.php'); 
include '../../config/database.php';

$id = $_GET['id'];

$db = new database();
$db->select("penduduk","*","id='$id'");
$result = $db->sql;

$row = mysqli_fetch_assoc($result);
?>

<div class="container-fluid px-4 py-4">
<table>
    <tbody>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?php if(isset($row)) { echo $row['nik']; } ?></td>
        </tr>
    </tbody>
</table>
</div>

<?php require('../layouts/footer.php'); ?>