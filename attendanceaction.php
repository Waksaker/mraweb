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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['applyinoffice'])) {
    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];
    $date = $_POST['date'];
    $noic = $_POST['noic'];
    $name = $_POST['name'];
    $reason = $_POST['reason'];
    if ($timein != '00:00:00' && $timeout == '00:00:00') {
        $result1 = mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='2', `dateattan`='$date', `timein`='$timein', `timeout`='$timeout' WHERE `icno`='$noic'");
        $result2 = mysqli_query($conn, "INSERT INTO `attandance`(`name`, `ic`, `timein`, `timeout`, `date`, `reason`) VALUES ('$name','$noic','$timein','00:00:00','$date','$reason')");
        if ($result1 && $result2) {
            echo "<script>Swal.fire('Update present Successful','Success','success').then(()=>window.location='inoffice.php');</script>";
        } else {
            echo "<script>Swal.fire('Update present Failed','Error','error').then(()=>window.location='inoffice.php');</script>";
        }
    } elseif ($timein != '00:00:00' && $timeout != '00:00:00') {
        $result1 = mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='1', `dateattan`='$date', `timein`='$timein', `timeout`='$timeout' WHERE `icno`='$noic'");
        $result2 = mysqli_query($conn, "UPDATE `attandance` SET `timeout`='$timeout' WHERE `ic` = '$noic' AND `date` = '$date'");
        if ($result1 && $result2) {
            echo "<script>Swal.fire('Update present Successful','Success','success').then(()=>window.location='inoffice.php');</script>";
        } else {
            echo "<script>Swal.fire('Update present Failed','Error','error').then(()=>window.location='inoffice.php');</script>";
        }
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
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['outstation2'])) {
	
}
?>
