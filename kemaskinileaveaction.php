
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
session_start();
set_time_limit(0);
//error_reporting(E_NOTICE);
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['dateapply'];
    $name = $_POST['nameapply'];
    $noic = $_POST['noic'];
    $position = $_POST['position'];
    $datestart = $_POST['datestart'];
    $dateend = $_POST['dateend'];
    $days = $_POST['daysleave'];
    $purpose = $_POST['purpose'];
    $contactno = $_POST['contactno'];
    $matters = $_POST['matters'];
    $id = $_POST['id'];
    $nameuser = $_POST['name'];
    $statusleave = $_POST['statusleave'];
    $mc = $_FILES['mc']['name'] ?? '';
    $tempmc = $_FILES['mc']['tmp_name'] ?? '';
    $mc1 = $_POST['mc1'];

    // upload file
    $target_mc = "./mc/";
    $file_mc="mc/$mc1";
    $target_file_mc = $target_mc . basename($mc);

    $result = mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE name = '$nameuser'");
    $row = mysqli_fetch_assoc($result);
    $statususer = $row['status'];

    date_default_timezone_set('Asia/Kuala_Lumpur');
    $date = date("Y-m-d");

    if ($statususer=="LEADER STAFF") {
        $sqlinsert="
            UPDATE `mra_leave` 
            SET 
                `dateapply`='$date',
                `nameapply`='$name',
                `noic`='$noic',
                `position`='$position',
                `status`='$statusleave',
                `datestart`='$datestart',
                `dateend`='$dateend',
                `daysleave`='$days',
                `purpose`='$purpose',
                `contactno`='$contactno',
                `matters`='$matters',
                `statsupport`='$statusleave',
                `namesupport`='$nameuser',
                `datestatsupport`='$date' 
            WHERE `leaveid` = '$id'
        ";
    }elseif ($statususer=="MANAGER") {
        $sqlinsert="
            UPDATE `mra_leave` 
            SET 
                `dateapply`='$date',
                `nameapply`='$name',
                `noic`='$noic',
                `position`='$position',
                `status`='$statusleave',
                `datestart`='$datestart',
                `dateend`='$dateend',
                `daysleave`='$days',
                `purpose`='$purpose',
                `contactno`='$contactno',
                `matters`='$matters',
                `statapprove`='$statusleave',
                `nameapprove`='$nameuser',
                `datestatapprove`='$date' 
            WHERE `leaveid` = '$id'
        ";
    }elseif ($statususer == "ADMIN STAFF" || $statususer == "HR STAFF" || $statususer == "STAFF") {
        // Jika upload mc baru
        if ($mc != "") {

            if (!empty($mc1) && file_exists("mc/$mc1") && !is_dir("mc/$mc1")) {
                unlink("mc/$mc1");
            }

            if (move_uploaded_file($tempmc, $target_file_mc)) {
                $sqlinsert = "UPDATE `mra_leave` SET 
                    `dateapply`='$date',
                    `nameapply`='$name',
                    `noic`='$noic',
                    `position`='$position',
                    `status`='$statusleave',
                    `datestart`='$datestart',
                    `dateend`='$dateend',
                    `daysleave`='$days',
                    `purpose`='$purpose',
                    `contactno`='$contactno',
                    `matters`='$matters',
                    `mc`='$mc'
                WHERE `leaveid`='$id'";
            } else {
                echo "<script>Swal.fire('Failed upload mc','Error','error').then(()=>window.location='leave.php');</script>";
                exit;
            }

        } else {

            // Jika MC lama masih digunakan (tiada upload baru)
            $sqlinsert = "UPDATE `mra_leave` SET 
                `dateapply`='$date',
                `nameapply`='$name',
                `noic`='$noic',
                `position`='$position',
                `status`='$statusleave',
                `datestart`='$datestart',
                `dateend`='$dateend',
                `daysleave`='$days',
                `purpose`='$purpose',
                `contactno`='$contactno',
                `matters`='$matters',
                `mc`='$mc1'
            WHERE `leaveid`='$id'";
        }
    }

        if(mysqli_query($conn, $sqlinsert)) {
            echo "
                <script>
                    Swal.fire({
                        text: 'Submit Successfull.',
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#F7E836',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        window.location='leave.php';
                        }
                    })
                </script>
            ";
        } else {
            echo "ERROR: Record cannot be submit $sqlinsert. " . mysqli_error($conn);
        }
        // Close connection
        mysqli_close($conn);
}
?>
