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
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(0);
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
</body>
</html>