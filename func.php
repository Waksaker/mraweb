<?php
include 'conn.php';

if (isset($_GET['delattan'])) {
	$id_delattan = $_GET['delattan'];
	$sql4 = "DELETE FROM `mra_office` WHERE `id` = '$id_delattan'";
	$result_delattan = $conn->query($sql4);

	if ($result_delattan) {
		header("Location: attandance.php");
		exit();
	} else {
		echo "Fail delete attandance.";
	}
} elseif (isset($_GET['deletout'])) {
	$id_deletout = $_GET['deletout'];

	$sqloutstation = "SELECT datestart FROM `mra_outstation` WHERE id = '$id_deletout'";
	$resultoutstation = $conn->query($sqloutstation);

	if ($resultoutstation->num_rows > 0) {
		$row = $resultoutstation->fetch_assoc();
		$date = $row['datestart'];

		$sql7 = "DELETE FROM `mra_outstation` WHERE `id` = '$id_deletout'";
		$result_delattan = $conn->query($sql7);

		$sql_claim = "DELETE FROM `mra_claims` WHERE date = '$date'";
		$result_delclaim = $conn->query($sql_claim);

		if ($result_delattan && $result_delclaim) {
			header("Location: attandance.php");
			exit();
		} else {
			echo "Fail delete attandance.";
		}
	} else {
		echo "TIADA DATA mra_outstation";
	}
} elseif (isset($_GET['outattan']) && isset($_GET['tarikh'])) {
	$id_outattan = base64_decode($_GET['outattan']);
	$tarikh = $_GET['tarikh'];
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$time_out = date("H:i:s");

	$sql5 = "UPDATE `mra_office` SET `outoffice`='$time_out' WHERE ic = '$id_outattan' AND date_apply = '$tarikh'";
	$result_outattan = $conn->query($sql5);

	if ($result_outattan) {
		header("Location: attandance.php");
		exit();
	} else {
		echo "Fail update time out attandance";
	}
} elseif (isset($_GET['inattan'])) {
	$ic_inattan = base64_decode($_GET['inattan']);
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$sql6 = "SELECT * FROM `mra_staff` WHERE `icno` = '$ic_inattan'";
	$result_upattan = $conn->query($sql6);
	$row_upattan = $result_upattan->fetch_assoc();

	$name = $row_upattan['name'];
	$ic = $row_upattan['icno'];
	$in = date("H:i:s");
	$date = date("Y-m-d");

	$insert = "INSERT INTO `mra_office` (ic, inoffice, date_apply) VALUES ('$ic', '$in', '$date')";
	$result_insert = $conn->query($insert);
	if ($result_insert) {
		// Nombor WhatsApp yang hendak dihantar
	    $phone = "601156640727"; // Tukar ke format antarabangsa (tanpa '+')
	    
	    // Mesej yang akan dihantar
	    $message = "Makluman: $name telah masuk ke pejabat pada $in, $date.";

	    // API Key (Dapatkan dari CallMeBot)
	    $api_key = "YOUR_API_KEY_HERE"; // Tukar dengan API Key sebenar

	    // URL API CallMeBot
	    $url = "https://api.callmebot.com/whatsapp.php?phone=$phone&text=" . urlencode($message) . "&apikey=$api_key";

	    // Hantar permintaan HTTP ke API
	    file_get_contents($url);

		header("Location: attandance.php");
		exit();
	} else {
		echo "INSERT COME OFFICE FAIL";
	}
} elseif (isset($_GET['outatts']) && isset($_GET['tarikhout']) && isset($_GET['alasan'])) {
	$ic_user = base64_decode($_GET['outatts']);
	$tarikhout = $_GET['tarikhout'];
	$alasan = $_GET['alasan'];

	$sql7 = "UPDATE `mra_office` SET `alasan` = '$alasan' WHERE ic = '$ic_user' AND `date_apply` = '$tarikhout'";
	$result_alasan = $conn->query($sql7);
	if ($result_alasan) {
		header("Location: attandance.php");
		exit();
	} else {
		echo "Fail update time out attandance";
	}
} elseif (isset($_GET['deletwfh'])) {
	$id_deletwfh = $_GET['deletwfh'];
	$sql9 = "DELETE FROM `mra_wfh` WHERE `id` = '$id_deletwfh'";
	$result_deletwfh = $conn->query($sql9);

	if ($result_deletwfh) {
		header("Location: attandance.php");
		exit();
	} else {
		echo "Fail delete attandance work from home.";
	}
}
?>