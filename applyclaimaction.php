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
include('conn.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$date = $_POST['date'];
	$purpose = $_POST['purpose'];
	$details = $_POST['details'];
	$amount = $_POST['amount'];
	$ic = $_POST['noic'];
	$resit = $_FILES['resit']['name'];
	$tempresit = $_FILES['resit']['tmp_name'];

	if ($resit != "") {
		$target_resit = "./resitclaim/";
		$target_file_resit = $target_resit . basename($resit);
		if (move_uploaded_file($tempresit, $target_file_resit)) {
			$sql = "INSERT INTO `mra_claims` (`date`,`noic`,`purpose`,`details`,`status`,`resit`,`amount`) VALUES ('$date','$ic','$purpose','$details','1','$resit','$amount')";
			if (mysqli_query($conn, $sql)) {
			
			?>
				<script>
					Swal.fire({
					text: "Submit Successfull",
					icon: "warning"
					}).then((result) => {
					/* Read more about isConfirmed, isDenied below */
					if (result.isConfirmed) {
						window.location = "claim1.php";
						} 
					});
				</script>
			<?php
			
			} else {
				echo "error";
			}
			
			mysqli_close($conn);
		}
	} elseif ($resit == "") {
		$sql = "INSERT INTO `mra_claims` (`date`,`noic`,`purpose`,`details`,`status`,`resit`,`amount`) VALUES ('$date','$ic','$purpose','$details','1','','$amount')";
			if (mysqli_query($conn, $sql)) {
			
			?>
				<script>
					Swal.fire({
					text: "Submit Successfull",
					icon: "warning"
					}).then((result) => {
					/* Read more about isConfirmed, isDenied below */
					if (result.isConfirmed) {
						window.location = "claim1.php";
						} 
					});
				</script>
			<?php
			
			} else {
				echo "error";
			}
			
			mysqli_close($conn);
	}
}
?>