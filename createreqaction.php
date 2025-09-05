<?php
include("conn.php");

if (isset($_POST['createreq1'])) {
    $name = $_POST['name'];
    $dateapply = $_POST['dateapply'];
    $appointment = $_POST['appointment'];
    $department = $_POST['department'];
    $supliername = $_POST['supliername'];
    $suplieraddress = $_POST['suplieraddress'];
    $attention = $_POST['attention'];

    $sql1 = "INSERT INTO request (
            namestaff, dateapply, appoiment, department, suppliername, supplieraddress, attention,
            termpayment, payto, accno, bankname, remark, signreq, signmanager, datemanager,
            signacc, dateacc, signdirector, datedirector
        ) VALUES (
        '$name', '$dateapply', '$appointment', '$department', '$supliername', '$suplieraddress', '$attention',
        NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$dateapply',
        NULL, '$dateapply', NULL, '$dateapply'
    )";

    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
        header("Location: createreq2.php?date=" . urlencode($dateapply));
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>