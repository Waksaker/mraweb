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
include("conn.php");

if (isset($_POST['createreq1'])) {
    $name = $_POST['name']; 
    $dateapply = $_POST['dateapply'];
    $appoiment = $_POST['appoiment'];
    $department = $_POST['department'];
    $supplirename = $_POST['supplirename'];
    $suppladderss = $_POST['suppladderss'];
    $attention = $_POST['attention'];

    $s = mysqli_query($conn, "SELECT image FROM `mra_staff` WHERE name = '$name'");
    $r = mysqli_fetch_assoc($s);
    $sign = $r['image'];

    $sql1 = "
       INSERT INTO `request`
       (`namestaff`, `dateapply`, `appoiment`, `department`, `supplirename`, `suppladderss`, `attention`, 
       `termpayment`, `payto`, `accno`, `bankname`, `remark`, `signreq`, `signmanager`, `datemanager`, 
       `signacc`, `dateacc`, `signdirector`, `datedirector`, `statusacc`, `statusmana`, `statusdirec`) 
        VALUES 
       (
            '$name', '$dateapply', '$appoiment', '$department', '$supplirename', '$suppladderss', '$attention',
            'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '$sign', 'NULL', '0000-00-00',
            'NULL', '0000-00-00', 'NULL', '0000-00-00', '1', '1', '1')
    ";

    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
        // echo '
        //     <script>
        //         Swal.fire({
        //             text: "Submit Successful",
        //             icon: "success"
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 window.location = "createreq2.php?date=' . urlencode($dateapply) . '&name=' . urlencode($name) . '";
        //             } 
        //         });
        //     </script>
        // ';
        header("Location: createreq2.php?date=" . urlencode($dateapply) . "&name=" . urlencode($name));
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
} elseif (isset($_POST['createreq2'])) {
    $name2 = $_POST['name'];
    $date2 = $_POST['date'];
    $discriptions = $_POST['discriptions'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $amount = $price * $quantity;

    $sql2 = "
        INSERT INTO `list_request`(`name`, `date`, `descriptions`, `quantity`, `price`, `amount`) VALUES ('$name2','$date2','$discriptions','$quantity','$price','$amount')
    ";

    $result2 = mysqli_query($conn, $sql2);

    if ($result2) {
        echo '
            <script>
                Swal.fire({
                    text: "Submit Successful",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "createreq2.php?date=' . urlencode($date2) . '&name=' . urlencode($name2) . '";
                    } 
                });
            </script>
        ';
        // header("Location: createreq2.php?date=" . urlencode($date2) . "&name=" . urlencode($name2));
        // exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
} elseif (isset($_POST['editreq1'])) {
    $name = $_POST['name']; 
    $dateapply = $_POST['dateapply'];
    $appoiment = $_POST['appoiment'];
    $department = $_POST['department'];
    $supplirename = $_POST['supplirename'];
    $suppladderss = $_POST['suppladderss'];
    $attention = $_POST['attention'];
    $id = $_POST['id'];

    $s = mysqli_query($conn, "SELECT image FROM `mra_staff` WHERE name = '$name'");
    $r = mysqli_fetch_assoc($s);
    $sign = $r['image'];

    $sql1 = "
        UPDATE `request` SET `namestaff` = '$name', `dateapply` = '$dateapply', `appoiment`='$appoiment',`department`='$department',`supplirename`='$supplirename',`suppladderss`='$suppladderss',`attention`='$attention' WHERE id = '$id'
    ";

    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
        // echo '
        //     <script>
        //         Swal.fire({
        //             text: "Submit Successful",
        //             icon: "success"
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 window.location = "editreq2.php?date=' . urlencode($dateapply) . '&name=' . urlencode($name) . '";
        //             } 
        //         });
        //     </script>
        // ';
        header("Location: editreq2.php?date=" . urlencode($dateapply) . "&name=" . urlencode($name));
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
} elseif (isset($_POST['editreq2mana'])) {
    $namemana = $_POST['namemana'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $statusmana = $_POST['statusmana'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $datetoday = date("Y-m-d");
    $res = mysqli_query($conn, "SELECT image FROM `mra_staff` WHERE name = '$namemana'");
    $row = mysqli_fetch_assoc($res);
    $sign = $row['image'];
    $res1 = mysqli_query($conn, "UPDATE `request` SET `signmanager` = '$sign', `datemanager` = '$datetoday', `statusmana` = '$statusmana' WHERE namestaff = '$name' AND dateapply = '$date'");
    if ($res1) {
        echo '
            <script>
                Swal.fire({
                    text: "Submit Successful",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "request.php";
                    } 
                });
            </script>
        ';
        // header("Location: request.php");
        // exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
} elseif (isset($_POST['editreq2admin'])) {
    $nameadmin = $_POST['nameadmin'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $statusadmin = $_POST['statusadmin'];
    $termpayment = $_POST['termpyment'];
    $payto = $_POST['payto'];
    $acc = $_POST['acc'];
    $bank = $_POST['bank'];
    $remarks = $_POST['remarks'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $datetoday = date("Y-m-d");
    $res = mysqli_query($conn, "SELECT image FROM `mra_staff` WHERE name = '$nameadmin'");
    $row = mysqli_fetch_assoc($res);
    $sign = $row['image'];
    $res1 = mysqli_query($conn, "UPDATE `request` SET `signacc` = '$sign', `dateacc` = '$datetoday', `statusacc` = '$statusadmin', `termpayment` = '$termpayment', `payto` = '$payto', `accno` = '$acc', `bankname` = '$bank', `remark` = '$remarks' WHERE namestaff = '$name' AND dateapply = '$date'");
    if ($res1) {
        echo '
            <script>
                Swal.fire({
                    text: "Submit Successful",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "request.php";
                    } 
                });
            </script>
        ';
        // header("Location: request.php");
        // exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>
