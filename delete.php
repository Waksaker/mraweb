<?php

include 'conn.php';

if (isset($_GET['date'])) {
	$date = $_GET['date'];

	$sql1 = "DELETE FROM `mra_claims` WHERE MONTH(date) = '$date'";
	$result_sql1 = mysqli_query($conn, $sql1);

	if ($result_sql1) {
		header("Location: claim1.php");
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
	$appoiment = $r1['appoiment'];
	mysqli_query($conn, "DELETE FROM `request` WHERE namestaff = '$name' AND dateapply = '$date' AND appoiment='$appoiment'");
	mysqli_query($conn, "DELETE FROM `list_request` WHERE name = '$name' AND date = '$date'AND appoinment='$appoiment'");
	header("Location: request.php");
	exit();
} elseif (isset($_GET['idapplyclaim'])) {
	$idapplyclaim = $_GET['idapplyclaim'];
	$result = mysqli_query($conn, "SELECT * FROM `mra_claims` WHERE id = '$idapplyclaim'");
	$row = mysqli_fetch_assoc($result);
	$resit = $row['resit'];
	$file_resit = "/var/www/html/resitclaim/$resit";
	if (file_exists($file_resit)) {
		if (unlink($file_resit)) {
			mysqli_query($conn, "DELETE FROM `mra_claims` WHERE id = '$idapplyclaim'");
			header("Location: claim1.php");
			exit();
		}
	} else {
		mysqli_query($conn, "DELETE FROM `mra_claims` WHERE id = '$idapplyclaim'");
		header("Location: claim1.php");
		exit();
		echo "File tidak dijumpai";
	}
} elseif (isset($_GET['idcreatequo2'])) {
    $idcreatequo2 = $_GET['idcreatequo2'];
    $result=mysqli_query($conn, "SELECT * FROM `list_quotation` WHERE id = '$idcreatequo2'");
    $row=mysqli_fetch_assoc($result);
    $qtnno=$row['qtnno'];
    $name=$row['name'];
    $date=$row['date'];
    mysqli_query($conn, "DELETE FROM `list_quotation` WHERE id = '$idcreatequo2'");
    header("Location: createquotation2.php?date=" . base64_encode($date) . "&name=" . base64_encode($name) . "&qtnno=" . base64_encode($qtnno));
    exit();
} elseif (isset($_GET['idquotation'])) {
    $idquotation = $_GET['idquotation'];
    $quo1 = mysqli_query($conn, "SELECT * FROM `quotation` WHERE id = '$idquotation'");
    $row = mysqli_fetch_assoc($quo1);
    $name = $row['namecreate'];
    $qtnno = $row['qtnno'];
    $date = $row['date'];
    mysqli_query($conn, "DELETE FROM `quotation` WHERE namecreate = '$name' AND date = '$date' AND qtnno='$qtnno'");
    mysqli_query($conn, "DELETE FROM `list_quotation` WHERE name = '$name' AND date = '$date' AND qtnno='$qtnno'");
    header("Location: quotation.php");
    exit();
} elseif (isset($_GET['rendom'])) {

    $rendom = base64_decode($_GET['rendom']);

    if (empty($rendom)) {
        exit("Invalid data");
    }

    /* ========= DELETE INVOICE FILE ========= */
    $result = mysqli_query($conn, "SELECT invoicedoc FROM projek WHERE rendom='$rendom'");
    while ($row = mysqli_fetch_assoc($result)) {
        if (!empty($row['invoicedoc'])) {
            $file_invoice = "invoice/" . $row['invoicedoc'];
            if (file_exists($file_invoice)) {
                unlink($file_invoice);
				// echo "$file_invoice<br>";
            }
        }
    }

    /* ========= DELETE DOCUMENT FILE ========= */
    $result2 = mysqli_query($conn, "SELECT document FROM document WHERE rendom='$rendom'");
    while ($row2 = mysqli_fetch_assoc($result2)) {
        if (!empty($row2['document'])) {
            $document = trim($row2['document']);

			if (!empty($document)) {
				$file_document = "document/" . $document;
				if (file_exists($file_document)) {
					unlink($file_document);
				}
			}
        }
    }

    /* ========= DELETE DATABASE RECORD ========= */
    mysqli_query($conn, "DELETE FROM projekname WHERE rendom='$rendom'");
    mysqli_query($conn, "DELETE FROM projek WHERE rendom='$rendom'");
    mysqli_query($conn, "DELETE FROM document WHERE rendom='$rendom'");

    header("Location: projek.php");
    exit();
}