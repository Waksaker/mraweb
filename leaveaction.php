
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
error_reporting(E_NOTICE);
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['leave'])) {
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

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sqlinsert="INSERT INTO mra_leave 
    (dateapply,
    nameapply,
    noic,
    position,
	status,
    datestart,
    dateend,
    daysleave,
    purpose,
    contactno,
    matters,
    mc,
    statsupport,
    statapprove)
    VALUES 
    ('$date',
    '$name',
    '$noic',
    '$position',
	'1',
    '$datestart',
    '$dateend',
    '$days',
    '$purpose',
    '$contactno',
    '$matters',
    'NULL',
    '1',
    '1')"; 

if(mysqli_query($conn, $sqlinsert)){
    //echo "Rekod berjaya disimpan.";
?>
<script>
    Swal.fire({
        text: "Submit Successfull.",
        icon: "success",
        showCancelButton: false,
        confirmButtonColor: '#F7E836',
        confirmButtonText: 'Ok'
    }).then((result) => {
        if (result.isConfirmed) {
        window.location="leave.php";
        }
    })
</script>
<?php
    } else {
        echo "ERROR: Record cannot be submit $sqlinsert. " . mysqli_error($conn);
    }
// Close connection
mysqli_close($conn);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['leave1'])) {
$dateapply = $_POST['dateapply'];
$nameapply = $_POST['nameapply'];
$datestart = $_POST['datestart'];
$dateend = $_POST['dateend'];
$daysleave = $_POST['daysleave'];
$purpose = $_POST['purpose'];
$matters = $_POST['matters'];

$result = mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE name = '$nameapply'");
$row = mysqli_fetch_assoc($result);
$ic = $row['icno'];
$position = $row['position'];
$phoneno = $row['phoneno'];

$insert="INSERT INTO `mra_leave` (`dateapply`, `nameapply`, `noic`, `position`, `status`, `datestart`, `dateend`, `daysleave`, `purpose`, `contactno`, `matters`, `mc`, `statsupport`, `statapprove`) VALUES ('$dateapply','$nameapply','$ic','$position','1','$datestart','$dateend','$daysleave','$purpose','$phoneno','$matters','NULL','1','1')";
if (mysqli_query($conn, $insert)) {
?>
<script>
    Swal.fire({
        text: "Submit Successfull.",
        icon: "success",
        showCancelButton: false,
        confirmButtonColor: '#F7E836',
        confirmButtonText: 'Ok'
    }).then((result) => {
        if (result.isConfirmed) {
        window.location="leave.php";
        }
    })
</script>
<?php
    } else {
        echo "ERROR: Record cannot be submit $insert. " . mysqli_error($conn);
    }
    // Close connection
    mysqli_close($conn);
}
?>
