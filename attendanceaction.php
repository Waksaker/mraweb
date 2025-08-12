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
    $name_staff = isset($_POST['name_staff']) ? $_POST['name_staff'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $present = isset($_POST['present']) ? $_POST['present'] : '';

    // outstation
    $datestart = isset($_POST['datestart']) ? $_POST['datestart'] : ''; // Elak Undefined Index
    $purpose_outstation = isset($_POST['purpose_outstation']) ? $_POST['purpose_outstation'] : '';
    $details_outstation = isset($_POST['details_outstation']) ? $_POST['details_outstation'] : '';
    $amount = isset($_POST['amount']) ? $_POST['amount'] : '';

    // wfh
    $purpose_wfh = isset($_POST['purpose_wfh']) ? $_POST['purpose_wfh'] : '';
    $details_wfh = isset($_POST['details_wfh']) ? $_POST['details_wfh'] : '';
    $datesign = isset($_POST['datesign']) ? $_POST['datesign'] : '';
    
    //office
    $inout = isset($_POST['inout']) ? $_POST['inout'] : '';
    $officetime = isset($_POST['timeoffice']) ? $_POST['timeoffice'] : '';
    $officedate = isset($_POST['dateoffice']) ? $_POST['dateoffice'] : '';
    
    $sql_ic = "SELECT `icno` FROM `mra_staff` WHERE `name` = '$name_staff'";
    $result_ic = $conn->query($sql_ic);
    $row_ic = $result_ic->fetch_assoc();
    $ic_user = $row_ic['icno'];

    $sql_office = "SELECT * FROM `mra_office` WHERE `ic` = '$ic_user' AND `date_apply` = '$officedate'";
    $result_office = mysqli_query($conn, $sql_office);
    
    if ($present == 'outstation') {
        $sql = "INSERT INTO `mra_outstation` (name, ic, datestart, purpose, details, dateapply) VALUES ('$name_staff', '$ic_user', '$datestart', '$purpose_outstation', '$details_outstation', '$date')";
        $result = $conn->query($sql);

        $sqlclaim = "INSERT INTO mra_claims (date, purpose, details, amount, noic) VALUES ('$datestart', '$purpose_outstation', '$details_outstation', '$amount', '$ic_user')";
        $resultclaim = $conn->query($sqlclaim);

        if ($result === true && $resultclaim === true) {
            echo '
                <script>
                    Swal.fire({
                    text: "Submit Successfull",
                    icon: "warning"
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        window.location = "attandance.php";
                        } 
                    });
                </script>
            ';
        } else {
            echo "GAGAL: " . $conn->error;
        }
    } elseif ($present == 'wfh') {
        $sql = "INSERT INTO `mra_wfh`(`name`, `ic`, `purpose`, `details`, `datesign`, `dateapply`) VALUES ('$name_staff','$ic_user','$purpose_wfh','$details_wfh','$datesign','$date')";
        $result = $conn->query($sql);
        if ($result === true) {
            echo '
                <script>
                    Swal.fire({
                    text: "Submit Successfull",
                    icon: "warning"
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        window.location = "attandance.php";
                        } 
                    });
                </script>
            ';
        } else {
            echo "GAGAL: " . $conn->error;
        }
    } elseif ($present == 'office') {
        if (mysqli_num_rows($result_office) > 0) {
            if ($inout == 'in') {
                echo '
                    <script>
                        Swal.fire({
                        text: "Submit Successfull",
                        icon: "success"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "attandance.php";
                            } 
                        });
                    </script>
                ';
            } elseif ($inout == 'out') {
                $sql = "UPDATE `mra_office` SET `outoffice` = '$officetime' WHERE `ic` = '$ic_user' AND `date_apply` = '$officedate'";
                $result = $conn->query($sql);

                if ($result) {
                    echo '
                        <script>
                            Swal.fire({
                            text: "Submit Successfull",
                            icon: "success"
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                window.location = "attandance.php";
                                } 
                            });
                        </script>
                    ';
                } else {
                    echo '
                        <script>
                            Swal.fire({
                            text: "Submit Faile",
                            icon: "error"
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                window.location = "attandance.php";
                                } 
                            });
                        </script>
                    ';
                }
            }
        } else {
            if ($inout == "in") {
                $sql = "INSERT INTO `mra_office` (`ic`, `inoffice`, `date_apply`) VALUES ('$ic_user', '$officetime', '$officedate')";
                $result = $conn->query($sql);

                if ($result) {
                    echo '
                        <script>
                            Swal.fire({
                            text: "Submit Successfull",
                            icon: "success"
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                window.location = "attandance.php";
                                } 
                            });
                        </script>
                    ';
                } else {
                    echo '
                        <script>
                            Swal.fire({
                            text: "Submit Faile",
                            icon: "error"
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                window.location = "attandance.php";
                                } 
                            });
                        </script>
                    ';
                }
            } elseif ($inout == "out") {
                echo '
                    <script>
                        Swal.fire({
                        text: "Please reset your presence information.",
                        icon: "warning"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "attandance.php";
                            } 
                        });
                    </script>
                ';
            }
        }
    }
    
}
?>
<!-- <script>
    Swal.fire({
    text: "Submit Successfull",
    icon: "warning"
    }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
        window.location = "attandance.php";
        } 
    });
</script> -->