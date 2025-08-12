<?php
include('conn.php');
$id = $_GET['id'];
$sql = "SELECT nameapply FROM `mra_leave` WHERE `leaveid` = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$name = $row['nameapply'];

$sql2 = "SELECT syarikat FROM `mra_staff` WHERE `name` = '$name'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);

$syarikat = $row2['syarikat'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $syarikat ?></title>
    <!-- <link rel="shortcut icon" type="image/png" href="assets/images/logos/mra.PNG" /> -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        h3 {
            font-size: 16px;
        }

        p {
            font-size: 13px;
        }

        .underline-div {
            display: inline-block;
            border-bottom: 1px solid black;
        }
        @page {size: A4 landscape;max-height:100%; max-width:100%}
    </style>
</head>
<body onload="window.print()">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
            <?php include("printsection.php"); ?>
            </div>
            <div class="col-6">
            <?php include("./components/printsection2.php"); ?>
            </div>
        </div>
    </div>
</body>
</html>