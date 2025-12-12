<?php
include('conn.php');

if (isset($_POST['editprojek1'])) {
    $id = $_POST['id'];
    $namecreate = $_POST['namecreate'];
    $ic = $_POST['ic'];
    $date = $_POST['date'];
    $syarikat = $_POST['syarikat'];
    $namepro = $_POST['namepro'];
    $res=mysqli_query($conn, "UPDATE `projekname` SET `name`='$namecreate',`ic`='$ic',`syarikat`='$syarikat',`namepro`='$namepro',`datecreate`='$date' WHERE `id` = '$id'");
    if ($res) {
        header("Location: ");
        exit();
    }
}
?>