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
if (isset($_POST['funcclaim']) && $_POST['funcclaim'] == '1') {
    $name = $_POST['name'];
    $date = $_POST['date'] ?? '';
    $purpose = $_POST['purpose'] ?? '';
    $details = $_POST['details'] ?? '';
    $amount = $_POST['amount'] ?? '';

    $result=mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE id = '$name'");
    $row=mysqli_fetch_assoc($result);
    $ic=$row['icno'];
    $namestaff=$row['name'];

    $resit = $_FILES['resit']['name'] ?? '';
    $tempresit = $_FILES['resit']['tmp_name'] ?? '';

    // folder upload
    $target_resit = "./resitclaim/";
    if (!is_dir($target_resit)) {
        mkdir($target_resit, 0777, true);
    }

    //tambah bahagian claim
    $date1 = new DateTime($date);
    $bulan = $date1->format('m');
    $tahun = $date1->format('Y');
    $result1 = mysqli_query($conn, "SELECT * FROM `mra_claim` WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun");
    if (mysqli_num_rows($result1) > 0) {
	    $sqlupdateclaim = "
            UPDATE `mra_claim`
            SET
                `date`='$date',
                `nameapprove`='NULL',
                `status`='1',
                `resit`='NULL'
            WHERE YEAR(date)='$tahun'
            AND MONTH(date)='$bulan'
            AND namestaff='$namestaff'
        ";
        mysqli_query($conn, $sqlupdateclaim);
    } else {
        $sqlinsertclaim = "
            INSERT INTO `mra_claim`
            (`date`, `namestaff`, `nameapprove`, `status`, `resit`)
            VALUES
            ('$date','$namestaff','NULL','1','NULL')
        ";
        mysqli_query($conn, $sqlinsertclaim);
    }

    // jika ada fail resit
    if (!empty($resit)) {
        $target_file_resit = $target_resit . basename($resit);

        if (move_uploaded_file($tempresit, $target_file_resit)) {
            $sql = "INSERT INTO `mra_claims` (`date`,`noic`,`purpose`,`details`,`status`,`resit`,`amount`)
            VALUES ('$date','$ic','$purpose','$details','1','$resit','$amount')";
        } else {
            die("<p>Gagal muat naik fail resit. Pastikan folder boleh ditulis.</p>");
        }
    } else {
        // jika tiada fail resit
        $sql = "INSERT INTO `mra_claims` (`date`,`noic`,`purpose`,`details`,`status`,`resit`,`amount`)
        VALUES ('$date','$ic','$purpose','$details','1','','$amount')";
    }

    if (mysqli_query($conn, $sql)) {
        ?>
        <script>
        Swal.fire({
            text: "Submit Successful",
            icon: "success"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "claim1.php";
            }
        });
        </script>
        <?php
    } else {
        echo "<p>SQL Error: " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
} elseif (isset($_POST['funcclaim']) && $_POST['funcclaim'] == '2') {
    $date = $_POST['date'] ?? '';
    $purpose = $_POST['purpose'] ?? '';
    $details = $_POST['details'] ?? '';
    $amount = $_POST['amount'] ?? '';
    $ic = $_POST['noic'] ?? '';
    $resit = $_FILES['resit']['name'] ?? '';
    $tempresit = $_FILES['resit']['tmp_name'] ?? '';

    // folder upload
    $target_resit = "./resitclaim/";
    if (!is_dir($target_resit)) {
        mkdir($target_resit, 0777, true);
    }

    //tambah bahagian claim
    $result=mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE icno = '$ic'");
    $row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $date1 = new DateTime($date);
    $bulan = $date1->format('m');
    $tahun = $date1->format('Y');
    $result1 = mysqli_query($conn, "SELECT * FROM `mra_claim` WHERE MONTH(date) = $bulan AND YEAR(date) = $tahun");
    if (mysqli_num_rows($result1) > 0) {
	    $sqlupdateclaim = "
            UPDATE `mra_claim`
            SET
                `date`='$date',
                `name`='NULL',
                `status`='1',
                `resit`='NULL'
            WHERE YEAR(date)='$tahun'
            AND MONTH(date)='$bulan'
            AND namestaff='$name'
        ";
        mysqli_query($conn, $sqlupdateclaim);
    } else {
        $sqlinsertclaim = "
            INSERT INTO `mra_claim`
            (`date`, `namestaff`, `nameapprove`, `status`, `resit`)
            VALUES
            ('$date','$name','NULL','1','NULL')
        ";
        mysqli_query($conn, $sqlinsertclaim);
    }

    // jika ada fail resit
    if (!empty($resit)) {
        $target_file_resit = $target_resit . basename($resit);

        if (move_uploaded_file($tempresit, $target_file_resit)) {
            $sql = "INSERT INTO `mra_claims` (`date`,`noic`,`purpose`,`details`,`status`,`resit`,`amount`)
            VALUES ('$date','$ic','$purpose','$details','1','$resit','$amount')";
        } else {
            die("<p>Gagal muat naik fail resit. Pastikan folder boleh ditulis.</p>");
        }
    } else {
        // jika tiada fail resit
        $sql = "INSERT INTO `mra_claims` (`date`,`noic`,`purpose`,`details`,`status`,`resit`,`amount`)
        VALUES ('$date','$ic','$purpose','$details','1','','$amount')";
    }

    if (mysqli_query($conn, $sql)) {
        ?>
        <script>
        Swal.fire({
            text: "Submit Successful",
            icon: "success"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "claim1.php";
            }
        });
        </script>
        <?php
    } else {
        echo "<p>SQL Error: " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
}
?>
