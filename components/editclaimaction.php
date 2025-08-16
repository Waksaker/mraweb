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
//error_reporting(E_NOTICE);
include('../conn.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dates = $_POST['date'];
    $title = $_POST['title'];
    $namefile = $_FILES['namefile']['name'];
	$tempfile = $_FILES['namefile']['tmp_name'];
	$namefile2 = $_POST['namefile2'];
    $noics = $_POST['noic'];
	$status = $_POST['status'];

    if ($namefile != '') {
		$target_dir = "./claim/";
		$target_file = $target_dir . basename($namefile);
		
		$file = "claim/$namefile2";
		
		if (file_exists($file)) {
			if (unlink($file)) {
				if (move_uploaded_file($tempfile, $target_file)) {
					$sql = "UPDATE `mra_claim` SET `apply`='$dates',`tajuk`='$title',`ic`='$noics',`status`='$status',`folder`='$namefile' WHERE ic = '$noics' AND apply = '$dates'";
					
					if (mysqli_query($conn, $sql)) {
						?>
							<script>
								Swal.fire({
								text: "Submit Successfull",
								icon: "warning"
								}).then((result) => {
								/* Read more about isConfirmed, isDenied below */
								if (result.isConfirmed) {
									window.location = "claim.php";
									} 
								});
							</script>
						<?php
					} else {
						echo "error";
					}
					
					mysqli_close($conn);
				}
			} else {
				echo "Gagal padam";
			}
		} else {
			echo "File tidak dijumpai";
		}
	} elseif ($namefile == '') {
		
}

?>
