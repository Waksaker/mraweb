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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['applyinoffice'])) {
    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];
    $date = $_POST['date'];
    $noic = $_POST['noic'];
    $name = $_POST['name'];
    $reason = $_POST['reason'];
    if ($timein != '00:00:00' && $timeout == '00:00:00') {
        $result1 = mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='2', `dateattan`='$date', `timein`='$timein', `timeout`='$timeout' WHERE `icno`='$noic'");
        $result2 = mysqli_query($conn, "INSERT INTO `attandance`(`name`, `ic`, `timein`, `timeout`, `date`, `reason`) VALUES ('$name','$noic','$timein','00:00:00','$date','$reason')");
        if ($result1 && $result2) {
            echo "<script>Swal.fire('Update present Successful','Success','success').then(()=>window.location='inoffice.php');</script>";
        } else {
            echo "<script>Swal.fire('Update present Failed','Error','error').then(()=>window.location='inoffice.php');</script>";
        }
    } elseif ($timein != '00:00:00' && $timeout != '00:00:00') {
        $result1 = mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='1', `dateattan`='$date', `timein`='$timein', `timeout`='$timeout' WHERE `icno`='$noic'");
        $result2 = mysqli_query($conn, "UPDATE `attandance` SET `timeout`='$timeout' WHERE `ic` = '$noic' AND `date` = '$date'");
        if ($result1 && $result2) {
            echo "<script>Swal.fire('Update present Successful','Success','success').then(()=>window.location='inoffice.php');</script>";
        } else {
            echo "<script>Swal.fire('Update present Failed','Error','error').then(()=>window.location='inoffice.php');</script>";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['applyinoffice1'])) {
    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];
    $date = $_POST['date'];
    $noic = $_POST['noic'];
    $name = $_POST['name'];
    $reason = $_POST['reason'];
    $result = mysqli_query($conn, "DELETE FROM `mra_outstation` WHERE ic = '$noic' AND dateapply = '$date'");
    $result1 = mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='2', `dateattan`='$date', `timein`='$timein', `timeout`='$timeout' WHERE `icno`='$noic'");
    $result2 = mysqli_query($conn, "INSERT INTO `attandance`(`name`, `ic`, `timein`, `timeout`, `date`, `reason`) VALUES ('$name','$noic','$timein','00:00:00','$date','$reason')");
    $result3 = mysqli_query($conn, "DELETE FROM `mra_claims` WHERE noic = '$noic' AND date = '$date'");
    if ($result && $result1 && $result2 && $result3) {
        echo "<script>Swal.fire('Update present Successful','Success','success').then(()=>window.location='inoffice.php');</script>";
    } else {
        echo "<script>Swal.fire('Update present Failed','Error','error').then(()=>window.location='inoffice.php');</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['updatedate'])) {
    $datetoday = date("Y-m-d");
    $result=mysqli_query($conn, "TRUNCATE TABLE dateleave");
    if(!$result) exit("Error truncate");
    $result1 = mysqli_query($conn, "SELECT * FROM `mra_leave`");
    while ($row = mysqli_fetch_assoc($result1)) {
        // Convert string → DateTime object
        $datestart = new DateTime($row['datestart']);
        $dateend   = new DateTime($row['dateend']);
        $noic = $row['noic'];
        // Tambah 1 hari
        $dateend->modify('+1 day');
        while ($datestart < $dateend) {
            $tarikhsebenar = $datestart->format('Y-m-d');
            $result2=mysqli_query($conn, "INSERT INTO `dateleave`(`ic`,`dateleave`) VALUES ('$noic','$tarikhsebenar')");
            if(!$result2)exit("Error insert");            
            // Move next day
            $datestart->modify('+1 day');
        }
    }
    $result3=mysqli_query($conn, "SELECT * FROM `dateleave` WHERE dateleave = '$datetoday'");
    while($row1=mysqli_fetch_assoc($result3)){
        $ic = $row1['ic'];
	$result4=mysqli_query($conn,"UPDATE `mra_staff` SET `statattan`='4',`dateattan`='$datetoday',`timein`='00:00:00',`timeout`='00:00:00' WHERE icno = '$ic'");
	$result5=mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='1',`dateattan`='$datetoday',`timein`='00:00:00',`timeout`='00:00:00' WHERE icno != '$ic'");
	if($result4&&$result5){
	    echo "<script>Swal.fire('Update date success','Success','success').then(()=>window.location='inoffice.php');</script>";
	}else{
	    echo "<script>Swal.fire('Update date Failed','Error','error').then(()=>window.location='inoffice.php');</script>";
	}
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

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['notpresent'])){
    $date=$_POST['date'];
    $name=$_POST['name'];
    $ic=$_POST['ic'];
    $matter=$_POST['matter'];
    $reason=$_POST['reason'];
    $result=mysqli_query($conn, "INSERT INTO `notpresent` (`name`,`ic`,`date`,`matter`,`reason`) VALUES ('$name','$ic','$date','$matter','$reason')");
    $result1=mysqli_query($conn, "UPDATE `mra_staff` SET `statattan`='4',`timein`='00:00:00',`timeout`='00:00:00' WHERE icno = '$ic'");
    if($result&&$result1){
        echo "<script>Swal.fire('Update not present success','Success','success').then(()=>window.location='inoffice.php');</script>";
    }else{
        echo "<script>Swal.fire('Update not present failed','error','error').then(()=>window.location='inoffice.php');</script>";
    }
}
?>
