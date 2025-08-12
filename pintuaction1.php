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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['name_staff']) ? $_POST['name_staff'] : '';
    $time = isset($_POST['timeoffice']) ? $_POST['timeoffice'] : '';
    $inout = isset($_POST['inout']) ? $_POST['inout'] : '';
    $date = isset($_POST['dateoffice']) ? $_POST['dateoffice'] : '';

    $sql = "SELECT icno FROM `mra_staff` WHERE `name` = '$name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $ic = $row['icno'];

    $sql_attan = "SELECT * FROM `mra_office` WHERE `ic` = '$ic' AND `date_apply` = '$date'";
    $result_attan = mysqli_query($conn, $sql_attan);

    if (mysqli_num_rows($result_attan) > 0) {
        if ($inout == 'in') {
            $response = @file_get_contents('http://192.168.0.53/');
            if ($response) {
                echo '
                    <script>
                        Swal.fire({
                        text: "Welcome Back",
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
                        text: "Error from link "http://192.168.0.53"",
                        icon: "error"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "index.php";
                            } 
                        });
                    </script>
                ';
            }
        } elseif ($inout == 'out') {
            $sqloffice = "UPDATE `mra_office` SET `outoffice` = '$time' WHERE `ic` = '$ic' AND `date_apply` = '$date'";
            $resultoffice = $conn->query($sqloffice);
            if ($resultoffice === true) {
                $response = @file_get_contents('http://192.168.0.53/');
                if ($response) {
                    echo '
                        <script>
                            Swal.fire({
                            text: "Nice to meet you again.",
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
                            text: "Error from link "http://192.168.0.53"",
                            icon: "error"
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = "index.php";
                                } 
                            });
                        </script>
                    ';
                }
            }
        }
    } else {
        if ($inout == 'in') {
            $sqloffice = "INSERT INTO `mra_office` (`ic`, `inoffice`, `date_apply`) VALUES ('$ic', '$time', '$date')";
            $resultoffice = $conn->query($sqloffice);
            if ($resultoffice === true) {
                $response = @file_get_contents('http://192.168.0.53/');
                if ($response) {
                    echo '
                        <script>
                            Swal.fire({
                                text: "Welcome, Nice to meet you.",
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
                            text: "Error from link "http://192.168.0.53"",
                            icon: "error"
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = "index.php";
                                } 
                            });
                        </script>
                    ';
                }
            }
        } elseif ($inout == 'out') {
                echo '
                <script>
                    Swal.fire({
                    text: "Please reset your presence information.",
                    icon: "warning"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "index.php";
                        } 
                    });
                </script>
            ';
        }
    }
} 
?>