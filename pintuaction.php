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
set_time_limit(0);
//error_reporting(E_NOTICE);
include('conn.php');

$response = @file_get_contents('http://192.168.0.53/');
if ($response) {
    echo '
        <script>
            Swal.fire({
            text: "Berjaya Dibuka",
            icon: "success"
            }).then((result) => {
            if (result.isConfirmed) {
                window.location = "index.php";
                } 
            });
        </script>
    ';
} else {
    echo '
        <script>
            Swal.fire({
            text: "Gagal Dibuka",
            icon: "error"
            }).then((result) => {
            if (result.isConfirmed) {
                window.location = "index.php";
                } 
            });
        </script>
    ';
}
?>