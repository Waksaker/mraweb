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
        header("Location: createreq2.php?date=" . urlencode($date2) . "&name=" . urlencode($name2));
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>
