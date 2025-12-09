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

if (isset($_GET['idpresent']) && isset($_GET['statusattan'])) {
    $id = base64_decode($_GET['idpresent']);
    $statattan = base64_decode($_GET['statusattan']);
    $time = date("H:i:s");
    $result=mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE id = '$id'");
    $row=mysqli_fetch_assoc($result);
    $date = $row['dateattan'];
    $icno = $row['icno'];
    $name = $row['name'];
    if ($statattan == 'masuk') {
        $result1 = mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='2', `dateattan`='$date', `timein`='$time' WHERE `id`='$id'");
        $result2 = mysqli_query($conn, "INSERT INTO `attandance`(`name`, `ic`, `timein`, `timeout`, `date`) VALUES ('$name','$icno','$time','00:00:00','$date')");
        if ($result1 && $result2) {
            echo '<script>Swal.fire("Update in office success.","Success","success").then(()=>window.location="inoffice.php");</script>';
        } else {
            echo '<script>Swal.fire("Update in office failed","Error","error").then(()=>window.locatio="inoffice.php");</script>';
        }
    } elseif ($statattan == 'balik') {
        $result1 = mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='1', `dateattan`='$date', `timeout`='$time' WHERE `id`='$id'");
        $result2 = mysqli_query($conn, "UPDATE `attandance` SET `timeout`='$time' WHERE `ic` = '$icno' AND `date` = '$date'");
        if ($result1 && $result2) {
            echo '<script>Swal.fire("Update in office success.","Success","success").then(()=>window.location="inoffice.php");</script>';
        } else {
            echo '<script>Swal.fire("Update in office failed","Error","error").then(()=>window.locatio="inoffice.php");</script>';
        }
    }
}

// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['updatedate'])) {
//     $datetoday = date("Y-m-d");
//     $result=mysqli_query($conn, "TRUNCATE TABLE dateleave");
//     if(!$result) exit("Error truncate");
//     $result1 = mysqli_query($conn, "SELECT * FROM `mra_leave`");
//     while ($row = mysqli_fetch_assoc($result1)) {
//         // Convert string → DateTime object
//         $datestart = new DateTime($row['datestart']);
//         $dateend   = new DateTime($row['dateend']);
//         $noic = $row['noic'];
//         // Tambah 1 hari
//         $dateend->modify('+1 day');
//         while ($datestart < $dateend) {
//             $tarikhsebenar = $datestart->format('Y-m-d');
//             $result2=mysqli_query($conn, "INSERT INTO `dateleave`(`ic`,`dateleave`) VALUES ('$noic','$tarikhsebenar')");
//             if(!$result2)exit("Error insert");            
//             // Move next day
//             $datestart->modify('+1 day');
//         }
//     }
//     $result3=mysqli_query($conn, "SELECT * FROM `dateleave` WHERE dateleave = '$datetoday'");
//     while($row1=mysqli_fetch_assoc($result3)){
//         $ic = $row1['ic'];
// 	$result4=mysqli_query($conn,"UPDATE `mra_staff` SET `statattan`='4',`dateattan`='$datetoday',`timein`='00:00:00',`timeout`='00:00:00' WHERE icno = '$ic'");
// 	$result5=mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='1',`dateattan`='$datetoday',`timein`='00:00:00',`timeout`='00:00:00' WHERE icno != '$ic'");
// 	if($result4&&$result5){
// 	    echo "<script>Swal.fire('Update date success','Success','success').then(()=>window.location='inoffice.php');</script>";
// 	}else{
// 	    echo "<script>Swal.fire('Update date Failed','Error','error').then(()=>window.location='inoffice.php');</script>";
// 	}
//     }
// } 

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['updatedate'])) {
    $datetoday = date("Y-m-d");
    $result=mysqli_query($conn,"UPDATE `mra_staff` SET `statattan`='1',`dateattan`='$datetoday',`timein`='00:00:00',`timeout`='00:00:00'");
    if($result){
        echo "<script>Swal.fire('Update date success','Success','success').then(()=>window.location='inoffice.php');</script>";
    }else{
        echo "<script>Swal.fire('Update date Failed','Error','error').then(()=>window.location='inoffice.php');</script>";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ic']) && isset($_GET['reset'])) {
	$ic = base64_decode($_GET['ic']);
	$reset = base64_decode($_GET['reset']);
	$datetoday = date("Y-m-d");
	switch ($reset) {
    		case "resetinoffice":
        		$result = mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='1',`timein`='00:00:00',`timeout`='00:00:00' WHERE icno = '$ic'");
        		$result1 = mysqli_query($conn, "DELETE FROM `attandance` WHERE ic = '$ic' AND date = '$datetoday'");
        		if ($result && $result1) {
            			echo "<script>
                    			Swal.fire('Reset in office success', 'Success', 'success')
                    			.then(()=>window.location='inoffice.php');
                  		     </script>";
        		} else {
            			echo "<script>
                    			Swal.fire('Reset in office failed', 'Error', 'error')
                    			.then(()=>window.location='inoffice.php');
                  		      </script>";
        		}
    		break;
		case "resetoutstation":
			$result = mysqli_query($conn, "DELETE FROM `mra_outstation` WHERE ic = '$ic' AND dateapply = '$datetoday'");
			$result1 = mysqli_query($conn, "DELETE FROM `mra_claims` WHERE date = '$datetoday' AND noic = '$ic'");
			$result2 = mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='1',`timein`='00:00:00',`timeout`='00:00:00' WHERE icno = '$ic'");
			if ($result && $result1 && $result2) {
				echo "<script>
					Swal.fire('Reset outstation success', 'Success', 'success')
     					.then(()=>window.location='inoffice.php');
				      </script>";
			} else {
				echo "<script>
				      	Swal.fire('Reset outstation file', 'Error', 'error')
					 .then(()=>window.location='inoffice.php');
               			      </script>";
			}
		break;
		case "resetnotpresent":
			$result=mysqli_query($conn, "DELETE FROM `notpresent` WHERE ic = '$ic' AND date = '$datetoday'");
			$result1=mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='1',`timein`='00:00:00',`timeout`='00:00:00' WHERE icno = '$ic'");
			if($result&&$result1){
				echo "<script>Swal.fire('Reset not present success','Success','success').then(()=>window.location='inoffice.php');</script>";
			}else{
				echo "<script>Swal.fire('Reset not present failed','Error','error').then(()=>window.location='inoffice.php');</script>";
			}
		break;
		default:
			echo "<script>
				Swal.fire('Fail reset', 'Error', 'error')
				 .then(()=>window.location='inoffice.php');
			      </script>";
	}	
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['outstation'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $date = $_POST['date'];
    $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    $noic = $_POST['noic'];
    $amount = $_POST['amount'];
    $datetoday = date("Y-m-d");

    $result1 = mysqli_query($conn, "INSERT INTO `mra_outstation`(`name`,`ic`,`datestart`,`purpose`,`details`,`dateapply`,`amount`) VALUES ('$name','$noic','$date','$purpose','$details','$datetoday','$amount')");
    $result2 = mysqli_query($conn, "INSERT INTO `mra_claims` (`date`,`noic`,`purpose`,`details`,`status`,`amount`) VALUES ('$date','$noic','$purpose','$details','1','$amount')");
    $result3 = mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='3' WHERE icno = '$noic'");

    if ($result1 && $result2 && $result3) {
        echo "<script>Swal.fire('Update outstation Successful','Success','success').then(()=>window.location='inoffice.php');</script>";
    } else {
        echo "<script>Swal.fire('Update outstation Failed','Error','error').then(()=>window.location='inoffice.php');</script>";
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['notpresent_value'])){
    $date=$_POST['date'];
    $name=$_POST['name'];
    $ic=$_POST['ic'];
    $matters=$_POST['matter'];
    $purpose=$_POST['purpose'];
    $res=mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE icno = '$ic'");
    $row=mysqli_fetch_assoc($res);
    $position = $row['position'];
    $status = $row['status'];
    $phoneno = $row['phoneno'];
    $result=mysqli_query($conn, "INSERT INTO `notpresent` (`name`,`ic`,`date`,`matter`,`reason`) VALUES ('$name','$ic','$date','$matters','$purpose')");
    $result1=mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='4',`timein`='00:00:00',`timeout`='00:00:00' WHERE icno = '$ic'");
    $result2=mysqli_query($conn, "INSERT INTO `mra_leave` (`dateapply`, `nameapply`, `noic`, `position`, `status`, `datestart`, `dateend`, `daysleave`, `purpose`, `contactno`, `matters`, `statsupport`, `statapprove`) VALUES ('$date','$name','$ic','$position','1','$date','$date','1','$purpose','$phoneno','$matters','1','1')");
    if($result&&$result1){
        echo "<script>Swal.fire('Update not present success','Success','success').then(()=>window.location='inoffice.php');</script>";
    }else{
        echo "<script>Swal.fire('Update not present failed','error','error').then(()=>window.location='inoffice.php');</script>";
    }
}
?>
