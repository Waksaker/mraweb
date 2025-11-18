<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mra Global</title>
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <script src="assets/js/sweetalert2.min.js"></script>
</head>
<body>
    
</body>
</html>
<?php
include('conn.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['idpresent'], $_GET['statusattan'], $_GET['ic'])) {
    $idpresent = base64_decode($_GET['idpresent']);
    $statusattan = base64_decode($_GET['statusattan']);
    $ic = base64_decode($_GET['ic']);
    $datetoday = date("Y-m-d");
    $time_out = date("H:i:s");

    if ($statusattan == 'hadir') {
        $result1 = mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='2',`dateattan`='$datetoday',`timein`='$time_out' WHERE id = '$idpresent'");
        $result2 = mysqli_query($conn, "INSERT INTO `mra_office` (`ic`, `statattan`, `inoffice`, `outoffice`, `date_apply`) VALUES ('$ic','in office','$time_out', '00:00:00', '$datetoday')");
    } elseif ($statusattan == 'tidak hadir') {
        $result1 = mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='1',`timeout`='$time_out' WHERE id = '$idpresent'");
        $result2 = mysqli_query($conn, "UPDATE `mra_office` SET `outoffice` = '$time_out' WHERE `ic` = '$ic' AND `date_apply` = '$datetoday'");
    }

    if ($result1 && $result2) {
        echo "<script>Swal.fire('Update present Successful','Success','success').then(()=>window.location='inoffice.php');</script>";
    } else {
        echo "<script>Swal.fire('Update present Failed','Error','error').then(()=>window.location='inoffice.php');</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['outstation'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $date = $_POST['date'];
    $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    $noic = $_POST['noic'];
    $amount = $_POST['amount'];
    $datetoday = date("Y-m-d");

    $result1 = mysqli_query($conn, "INSERT INTO `mra_outstation`(`name`,`ic`,`datestart`,`purpose`,`details`,`dateapply`,`amount`) VALUES ('$name','$noic','$date','$purpose','$details','$datetoday','$amount')");
    $result2 = mysqli_query($conn, "INSERT INTO `mra_claims` (`date`,`noic`,`purpose`,`details`,`status`,`amount`) VALUES ('$date','$noic','$purpose','$details','1','$amount')");
    $result3 = mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='3' WHERE icno = '$noic'");

    if ($result1 && $result2 && $result3) {
        echo "<script>Swal.fire('Update outstation Successful','Success','success').then(()=>window.location='inoffice.php');</script>";
    } else {
        echo "<script>Swal.fire('Update outstation Failed','Error','error').then(()=>window.location='inoffice.php');</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['updatedate'])) {
    $datetoday = date("Y-m-d");
    $result1=mysqli_query($conn, "UPDATE `mra_staff` SET statattan = '1',dateattan = '$datetoday',timein = '00:00:00',timeout = '00:00:00'");
    if ($result1) {
        echo "<script>Swal.fire('Update date and time Successful','Success','success').then(()=>window.location='inoffice.php');</script>";
    } else {
        echo "<script>Swal.fire('Update date and time Failed','Error','error').then(()=>window.location='inoffice.php');</script>";
    }
    
}
?>