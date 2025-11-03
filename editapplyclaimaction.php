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

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $date = $_POST['date'] ?? '';
    $purpose = $_POST['purpose'] ?? '';
    $details = $_POST['details'] ?? '';
    $amount = $_POST['amount'] ?? '';
    $ic = $_POST['noic'] ?? '';
    $resit = $_FILES['resit']['name'] ?? '';
    $tempresit = $_FILES['resit']['tmp_name'] ?? '';
    $resit1 = $_POST['resit1'];
    $id=$_POST['id'];
    // folder upload
    $target_resit = "./resitclaim/";
    $file_resit="resitclaim/$resit1";
    if (!is_dir($target_resit)) {
        mkdir($target_resit, 0777, true);
    }
    
    if ($resit!="") {
        $target_file_resit = $target_resit . basename($resit);
        
        if (file_exists($file_resit)) {
            if (unlink($file_resit)) {
                if (move_uploaded_file($tempresit, $target_file_resit)) {
                    $sql = "UPDATE `mra_claims` SET `date`='$date',`noic`='$ic',`purpose`='$purpose',`details`='$details',`resit`='$resit',`amount`='$amount' WHERE id = '$id'";
                } else {
                    die("<p>Gagal muat naik fail resit. Pastikan folder boleh ditulis.</p>");
                }
            } else {
                echo "<p>File tidak berjaya padam</p>";
            }
        } else {
            die("<p>Tiada file.</p>");
        }
    } else {
        // jika tiada fail resit
        $sql = "UPDATE `mra_claims` SET `date`='$date',`noic`='$ic',`purpose`='$purpose',`details`='$details',`resit`='$resit1',`amount`='$amount' WHERE id = '$id'";
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