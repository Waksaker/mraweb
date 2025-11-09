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
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("conn.php");

if (isset($_POST['createquo1'])) {
    $location1 = $_POST['location1'];
    $location2 = $_POST['location2'];
    $location3 = $_POST['location3'];
    $location4 = $_POST['location4'];
    $location5 = $_POST['location5'];
    
    $name = $_POST['name'];
    $qtnno = $_POST['qtnno'];
    $date = $_POST['date'];
    $page = $_POST['page'];
    $project = $_POST['project'];
    $contractno = $_POST['contractno'];
    $registerno = $_POST['registerno'];
    $remarks = $_POST['remarks'];
    $sparepartcost=$_POST['sparepartcost'];
    
    $sql = "INSERT INTO `quotation`(`namecreate`, `alamat1`, `alamat2`, `alamat3`, `alamat4`, `alamat5`,`qtnno`, `date`, `page`, `project`, `contractno`, `nodaftar`, `remarks`, `sparepartcost`, `signmana`, `name`,`status`)
VALUES ('$name','$location1','$location2','$location3','$location4','$location5','$qtnno','$date','$page','$project','$contractno','$registerno','$remarks','$sparepartcost','','','1')";
    $result=mysqli_query($conn, $sql);
    if ($result) {
        header("Location: createquotation2.php?date=" . base64_encode($date) . "&name=" . base64_encode($name) . "&qtnno=" . base64_encode($qtnno));
        exit();
    }
} elseif (isset($_POST['createquo2'])) {
    $name1 = $_POST['name'];
    $date1 = $_POST['date'];
    $qtnno1 = $_POST['qtnno'];
    $description = $_POST['description'];
    $hours = $_POST['hours'];
    $manhour = $_POST['manhour'];
    $manhourcost = $manhour * $hours;
    $sql="
        INSERT INTO `list_quotation`(`name`, `date`, `qtnno`, `description`, `hours`, `manhour`, `manhourcost`) VALUES ('$name1','$date1','$qtnno1','$description','$hours','$manhour','$manhourcost')
    ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "
            <script>
                Swal.fire({
                    text: 'Submit Successful',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'createquotation2.php?date=" . base64_encode($date1) . "&name=" . base64_encode($name1) . "&qtnno=" . base64_encode($qtnno1) . "';
                    }
                });
            </script>
        ";
    } else {
        die("Error: " . mysqli_error($conn));
    }
} elseif (isset($_POST['editquo1'])) {
    $location1 = $_POST['location1'];
    $location2 = $_POST['location2'];
    $location3 = $_POST['location3'];
    $location4 = $_POST['location4'];
    $location5 = $_POST['location5'];
    
    $name = $_POST['name'];
    $qtnno = $_POST['qtnno'];
    $date = $_POST['date'];
    $page = $_POST['page'];
    $project = $_POST['project'];
    $contractno = $_POST['contractno'];
    $registerno = $_POST['registerno'];
    $remarks = $_POST['remarks'];
    $sparepartcost=$_POST['sparepartcost'];
    $id = $_POST['id'];
    $sql = "UPDATE `quotation` SET `alamat1`='$location1',`alamat2`='$location2',`alamat3`='$location3',`alamat4`='$location4',`alamat5`='$location5',`qtnno`='$qtnno',`date`='$date',`page`='$page',`project`='$project',`contractno`='$contractno',`nodaftar`='$registerno',`remarks`='$remarks',`sparepartcost`='$sparepartcost' WHERE id = '$id'";
    $result=mysqli_query($conn, $sql);
    if ($result) {
        header("Location: editquotation2.php?date=" . base64_encode($date) . "&name=" . base64_encode($name) . "&qtnno=" . base64_encode($qtnno));
        exit();
    }
} elseif (isset($_POST['editquo2'])) {
    $name1 = $_POST['name'];
    $date1 = $_POST['date'];
    $qtnno1 = $_POST['qtnno'];
    
    $statmana = $_POST['statmana'];
    $namemana = $_POST['name1'];

    $result = mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE name = '$namemana'");
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $sign = $row['image'];
    
    $result2=mysqli_query($conn, "UPDATE `quotation` SET `signmana`='$sign',`name`='$name',`status`='$statmana' WHERE `namecreate`='$name1' AND `qtnno`='$qtnno1' AND `date`='$date1'");
    if ($result2) {
        echo "
            <script>
                Swal.fire({
                    text: 'Submit Successful',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'quotation.php';
                    }
                });
            </script>
        ";
    }else{
        echo "GAGAL";
    }
}
?>