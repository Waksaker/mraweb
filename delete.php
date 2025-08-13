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
}