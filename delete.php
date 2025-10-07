<?php

include 'conn.php';

if (isset($_GET['date'])) {
	$date = $_GET['date'];

	$sql1 = "DELETE FROM `mra_claims` WHERE MONTH(date) = '$date'";
	$result_sql1 = mysqli_query($conn, $sql1);

	if ($result_sql1) {
		header("Location: claim.php");
		exit();
	} else {
		echo "Gagal delete semua claim";
	}
} elseif (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sqlclaim = "SELECT date FROM `mra_claims` WHERE id = '$id'";
	$resultclaim = $conn->query($sqlclaim);

	if ($resultclaim->num_rows > 0) {
		$rowclaim = $resultclaim->fetch_assoc();
		$date = $rowclaim['date'];

		$sql2 = "DELETE FROM `mra_claims` WHERE id = '$id'";
		$result_id = mysqli_query($conn, $sql2);

		$sql3 = "DELETE FROM `mra_outstation` WHERE datestart = '$date'";
		$result_delclaim = $conn->query($sql3);

		if ($result_id && $result_delclaim) {
			header("Location: claim.php");
			exit();
		} else {
			echo "Fail delete claim persenal";
		}
	} else {
		echo "DATA TABLE MRA CLAIM TIDAK WUJUD";
	}
} elseif (isset($_GET['leaveid'])) {
	$leaveid = $_GET['leaveid'];

	$sql3 = "DELETE FROM `mra_leave` WHERE leaveid  = '$leaveid'"; 
	$result_ic = mysqli_query($conn, $sql3);

	if ($result_ic) {
		header("Location: leave.php");
		exit();
	} else {
		echo "Fail delete leave";
	}
} elseif (isset($_GET['idstaff'])) {
    $idstaff = $_GET['idstaff'];

    // Elakkan SQL injection
    $idstaff = mysqli_real_escape_string($conn, $idstaff);

	$sql1 = "SELECT * FROM `mra_staff` WHERE `id` = '$idstaff'";
	$result1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_assoc($result1);
	$ic = $row1['icno'];
	
	mysqli_query($conn, "DELETE FROM `mra_staff` WHERE `id` = '$idstaff'");
	mysqli_query($conn, "DELETE FROM `mra_claims` WHERE noic = '$ic'");
	mysqli_query($conn, "DELETE FROM `mra_leave` WHERE noic = '$ic'");

    header("Location: staff.php");
	exit();
} elseif (isset($_GET['claimid'])) {
	$idclaim = $_GET['claimid'];
	$sql = "SELECT * FROM `mra_claim` WHERE id = '$idclaim'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$folder = $row['folder'];
	
	$file = "claim/$folder"; 
	
	if (file_exists($file)) {
		if (unlink($file)) {
			mysqli_query($conn, "DELETE FROM `mra_claim` WHERE id = '$idclaim'");
			header("Location: claim.php");
			exit();
		} else {
			echo "Gagal padam";
		}
	} else {
		echo "File tidak dijumpai";
	}

} elseif (isset($_GET['idcreatereq2'])) {
	$idcreatereq2 = $_GET['idcreatereq2'];
	$re=mysqli_query($conn,"SELECT * FROM `list_request` WHERE id = '$createreq2'");
	$row=mysqli_fetch_assoc($re);
	$name=$row['name'];
	$date=$row['date'];
	$appoinment=$row['appoinment'];
	mysqli_query($conn, "DELETE FROM `list_request` WHERE id = '$idcreatereq2'");
	header("Location: createreq2.php?date=" . urlencode($date) . "&name=" . urlencode($name) . "&appoinment=" . urlencode($appoinment));
	exit();
} elseif(isset($_GET['ideditreq2'])) {
	$ideditreq2=$_GET['ideditreq2'];
	$req=mysqli_query($conn,"SELECT * FROM `list_request` WHERE id = '$ideditreq2'");
	$row=mysqli_fetch_assoc($req);
	$name=$row['name'];
	$date=$row['date'];
	$appoinment=$row['appoinment'];
	mysqli_query($conn, "DELETE FROM `list_request` WHERE id = '$ideditreq2'");
	header("Location: editreq2.php?date=" . urlencode($date) . "&name=" . urlencode($name) . "&appoinment=" . urlencode($appoinment));
	exit();
} elseif (isset($_GET['idreq'])) {
	$idreq = $_GET['idreq'];
	$s1 = mysqli_query($conn, "SELECT * FROM `request` WHERE id = '$idreq'");
	$r1 = mysqli_fetch_assoc($s1);
	$name = $r1['namestaff'];
	$date = $r1['dateapply'];
	$appoiment = $rl['appoiment'];
	mysqli_query($conn, "DELETE FROM `request` WHERE namestaff = '$name' AND dateapply = '$date' AND appoiment='$appoiment'");
	mysqli_query($conn, "DELETE FROM `list_request` WHERE name = '$name' AND date = '$date'ANDappoiment='$appoiment'");
	header("Location: request.php");
	exit();
}
