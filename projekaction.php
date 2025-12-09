<?php
include('conn.php');
if (isset($_POST['apply1'])) {
    $namecreate = $_POST['namecreate'];
    $ic = $_POST['ic'];
    $date = $_POST['date'];
    $namepro = $_POST['namepro'];
    $func=$_POST['apply1'];
    $re=mysqli_query($conn, "INSERT INTO `projekname`(`name`, `ic`, `namepro`, `datecreate`) VALUES ('$namecreate','$ic','$$namepro','$date')");
    if ($re) {
        header("Location: applyprojek2.php?date=" . urlencode($date) . "&ic=" . urlencode($ic) . "&namepro=" . urlencode($namepro)."&func=".urlencode($func));
        exit();
    }
}
?>