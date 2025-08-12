
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
    datestart,
    dateend,
    daysleave,
    purpose,
    contactno,
    matters)
    VALUES 
    ('$date',
    '$name',
    '$noic',
    '$position',
    '$datestart',
    '$dateend',
    '$days',
    '$purpose',
    '$contactno',
    '$matters')"; 

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

?>