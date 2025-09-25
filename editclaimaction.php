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
include('conn.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dates = $_POST['date'];
    $title = $_POST['title'];
    $namefile = $_FILES['namefile']['name'];
	$tempfile = $_FILES['namefile']['tmp_name'];
	$excel = $_FILES['excel']['name'];
    $tempexcel = $_FILES['excel']['tmp_name'];
	$namefile2 = $_POST['namefile2'];
	$namefile3 = $_POST['namefile3'];
    $noics = $_POST['noic'];
	$status = $_POST['status'];
	$id = $_POST['id'];

    if ($namefile != '') {
		$target_pdf = "./claim/pdf/";
	    $target_excel = "./claim/excel/";
		$target_file_pdf = $target_pdf . basename($namefile);
	    $target_file_excel = $target_excel . basename($excel);
		
		$file_pdf = "claim/pdf/$namefile2";
		$file_excel = "claim/excel/$namefile3";
		
		if (file_exists($file_pdf) && file_exists($file_excel)) {
			if (unlink($file_pdf) && unlink($file_excel)) {
				if (move_uploaded_file($tempfile, $target_file_pdf) && move_uploaded_file($tempexcel, $target_file_excel)) {
					$sql = "UPDATE `mra_claim` SET `apply`='$dates',`tajuk`='$title',`ic`='$noics',`status`='$status',`folder`='$namefile', `excel`='$excel' WHERE ic = '$noics' AND id = '$id'";
					
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
	} elseif ($namefile == '' && $excel == '') {
		$sql1 = "UPDATE `mra_claim` SET `apply`='$dates',`tajuk`='$title',`ic`='$noics',`status`='$status',`folder`='$namefile2', `excel`='$namefile3' WHERE ic = '$noics' AND id = '$id'";
		if (mysqli_query($conn, $sql1)) {
			?>
				<script>
					Swal.fire({
					text: "Submit Successfull",
					icon: "success"
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
	}
}

?>
