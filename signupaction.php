<?php
include 'conn.php';

// Untuk debugging selama pengembangan:
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $ic = $_POST['ic'];
    $position = $_POST['position'];
    $nophone = $_POST['nophone'];
    $namebank = $_POST['namebank'];
    $accbank = $_POST['accbank'];
    $katalaluan = $_POST['katalaluan'];
    $katalaluan1 = $_POST['katalaluan1'];
    $syarikat = $_POST['syarikat'];

    if ($katalaluan == $katalaluan1) {
        $sql = "INSERT INTO mra_staff (`name`, `email`, `icno`, `position`, `password`, `status`, `phoneno`, `bank_name`, `acc_no`, `image`, `syarikat`) VALUES ('$name', '$email', '$ic', '$position', '$katalaluan1', 'STAFF', '$nophone', '$namebank', '$accbank', '', '$syarikat')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: index.php");
            exit();
        } else {
            header("Location: signup.php");
            exit();
        }
    } else {
        header("Location: signup.php");
    }
}
?>