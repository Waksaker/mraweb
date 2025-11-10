<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("conn.php");

if (!isset($_GET['id'])) exit();
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM `quotation` WHERE id = '$id'");
$row = mysqli_fetch_assoc($result);
$d = date('d', strtotime($row['date']));
$month = date('m', strtotime($row['date']));
if ($month == '01') {
    $m = "Jan";
} else if ($month == '02') {
    $m = "Feb";
} else if ($month == '03') {
    $m = "Mac";
} else if ($month == '04') {
    $m = "Apr";
} else if ($month == '05') {
    $m = "Mei";
} else if ($month == '06') {
    $m = "Jun";
} else if ($month == '07') {
    $m = "Jul";
} else if ($month == '08') {
    $m = "Ogos";
} else if ($month == '09') {
    $m = "Sep";
} else if ($month == '10') {
    $m = "Okt";
} else if ($month == '11') {
    $m = "Nov";
} else if ($month == '12') {
    $m = "Dis";
}
$y=date('y', strtotime($row['date']));
$date = $d . " " . $m . " " . $y;
$page= 1 . " of " . $row['page'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quotation Form</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<head>
	<style>
	   .title h1{
	       text-align: right;
	   }
	   .details {
            text-align: right;
            margin-top: 5px;
        }
        .details-table td {
            padding: 2px 8px;
            font-family: monospace; /* keeps perfect alignment */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th td {
            padding: 5px;
            vertical-align: top;
        }
        .signature-section { width: 100%; border-collapse: collapse; text-align: center; margin-top: 200px; font-family: Arial, sans-serif; font-size: 13px; } 
        .signature-section td { width: 50%; vertical-align: top; padding: 10px; } /* Tajuk (APPLICANT / SUPPORT / APPROVE) */ 
        .signature-section tr:first-child td { font-weight: bold; padding-bottom: 10px; } /* Gaya gambar tandatangan */ 
        .signature-section img { width: 150px; /* saiz tandatangan */ height: auto; display: block; margin: 0 auto 5px auto; /* tengah + jarak bawah */ object-fit: contain; /* supaya tak terpotong */ } /* Garisan tandatangan */ 
        .signature-line { border-top: 1px solid black; margin-top: 40px; display: flex; justify-content: flex-end; /* teks ke sebelah kanan */ align-items: center; height: 20px; } /* Tarikh */ 
        .date-line { font-size: 12px; text-align: left; margin-top: 3px; } 
        .signature-line h6 { margin: 0; font-weight: normal; font-size: 13px; text-align: right; } 
        img { max-width: 200px; /* Control saiz logo */ display: block; margin: auto; /* Center gambar dalam cell */ }
	</style>
</head>
<body onload="window.print()">
	<!-- HEADER IMAGE -->
    <div style="text-align:center; margin-bottom:10px;">
        <img src="assets/images/mra_header.png" alt="MRA Global Header" style="width:100%; max-width:900px;">
    </div>
    
	<div class="title">
		<h1>Quotation</h1>
	</div>
	
	<table>
		<tr>
			<td style="border: 2px solid black">
				<h6><strong><?php echo $row['alamat1'] ? $row['alamat1'] : '';?></strong></h6>
				<h6><strong><?php echo $row['alamat2'] ? $row['alamat2'] : '';?></strong></h6>
				<h6><strong><?php echo $row['alamat3'] ? $row['alamat3'] : '';?></strong></h6>
				<h6><strong><?php echo $row['alamat4'] ? $row['alamat4'] : '';?></strong></h6>
				<h6><strong><?php echo $row['alamat5'] ? $row['alamat5'] : '';?></strong></h6>
			</td>
			<td style="width: 100px;"></td>
			<td style="text-align: left;">
				<table class="details-table">
                    <tr>
                        <td>Qtn No</td>
                        <td>:</td>
                        <td><strong><?php echo $row['qtnno'] ? $row['qtnno'] : '';?></strong></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>:</td>
                        <td><strong><?php echo $date ? $date : '';?></strong></td>
                    </tr>
                    <tr>
                        <td>Page</td>
                        <td>:</td>
                        <td><strong><?php echo $page ? $page : '';?></strong></td>
                    </tr>
                </table>
			</td>
		</tr>
	</table>
	<br>
	<div>
		<h6>Project:</h6>
		<h6>
			<strong><?php echo $row['project'] ? $row['project'] : '';?></strong>
		</h6>
	</div>
	<br>
	<div>
		<h6>Contract No: <strong><?php echo $row['contractno'] ? $row['contractno'] : '';?></strong></h6>
	</div>
	<br>
	<div>
		<h6>Thank you for your inquiry. We are pleased to submit our quote as follows:</h6>
	</div>
	<br>
	<div>
		<strong><?php echo $row['nodaftar'] ? $row['nodaftar'] : '';?></strong>
	</div>
	<br>
	<table style="border-collapse: collapse; width: 100%;">
        <tr style="background-color: yellow; text-align:center;">
            <th style="padding:3px; width:5%; border:2px solid black;">Ser</th>
            <th style="padding:3px; width:20%; border:2px solid black;">Description</th>
            <th style="padding:3px; width:2%; border:2px solid black;">Hours</th>
            <th style="padding:3px; width:1%; border:2px solid black;">x</th>
            <th style="padding:3px; width:9%; border:2px solid black;">Man Hour</th>
            <th style="padding:3px; width:15%; border:2px solid black;">Man Hour Cost (RM)</th>
        </tr>
        <tr style="background-color: yellow; text-align:center;">
            <th style="border:2px solid black;">(a)</th>
            <th style="border:2px solid black;">(b)</th>
            <th style="border:2px solid black;">(c)</th>
            <th style="border:2px solid black;">(d)</th>
            <th style="border:2px solid black;">(e)</th>
            <th style="border:2px solid black;">(f)</th>
        </tr>
        <?php
            $index = 1;
            $name = $row['namecreate'];
            $date = $row['date'];
            $qtnno = $row['qtnno'];
            $result1 = mysqli_query($conn, "SELECT * FROM `list_quotation` WHERE name = '$name' AND DATE(date) = '$date' AND qtnno = '$qtnno'");
            while ($row1=mysqli_fetch_assoc($result1)) {
         ?>
         	<tr>
                <td style="text-align:center; border:2px solid black;"><?php echo ($index++);?></td>
                <td style="border:2px solid black;"><?php echo $row1['description'] ? $row1['description'] : '';?></td>
                <td style="text-align:center; border:2px solid black;"><?php echo $row1['hours'] ? $row1['hours'] : '';?></td>
                <td style="text-align:center; border:2px solid black;">X</td>
                <td style="text-align:center; border:2px solid black;"><?php echo $row1['manhour'] ? $row1['manhour'] : '';?></td>
                <td style="text-align:right; border:2px solid black;"><?php echo $row1['manhourcost'] ? $row1['manhourcost'] : '';?></td>
            </tr>
         <?php
            }
        ?>
        <tr>
            <td colspan="5" style="text-align:left; padding:3px 5px; border:2px solid black;">
                <strong>Total Man Hours</strong>
            </td>
            <td style="text-align:right; padding:3px 5px; border:2px solid black;">
                <?php 
                    $index = 1;
                    $result2 = mysqli_query($conn, "SELECT SUM(manhourcost) AS manhourcost FROM `list_quotation` WHERE name = '$name' AND DATE(date) = '$date' AND qtnno = '$qtnno'");
                    while ($row2=mysqli_fetch_assoc($result2)) {
                        $manhourcost = $row2['manhourcost'];
                        $manhourcost1 = number_format($row2['manhourcost'], 2, '.', ',');
                        echo "<strong>$manhourcost1</strong>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:left; padding:3px 5px; border:2px solid black;">
                <strong>Spare Part Cost (as attached)</strong>
            </td>
            <td style="text-align:right; padding:3px 5px; border:2px solid black;">
                <strong>
                	<?php 
                	   echo number_format($row['sparepartcost'], 2, '.', ',');
                	?>
                </strong>
            </td>
        </tr>
        <tr style="background-color: yellow;">
            <td colspan="5" style="text-align:left; padding:3px 5px; border:2px solid black;">
                <strong>Main Total</strong>
            </td>
            <td style="text-align:right; padding:3px 5px; border:2px solid black;">
                <strong>
                <?php
                    $total = $manhourcost + $row['sparepartcost'];
                    echo number_format($total, 2, '.', ',');
                ?>
                </strong>
            </td>
        </tr>
    </table>
	<br>
	<div>
		<h6>Ringgit Malaysia: <strong><?php echo numberToWordsEnglish($total);?></strong></h6>
	</div>
	<br>
	<div>
		<h6><strong>REMARKS:</strong></h6>
		<h6><?php echo $row['remarks'] ? $row['remarks'] : '';?></h6>
	</div>
	<br>
	<table class="signature-section">
        <tr>
            <td><h6>Best regards,</h6></td>
            <td><h6>We Comfirm the order by accepting the terms</h6></td>
        </tr>
            <td>
                <img src='image/<?php echo $row['signmana'] ? $row['signmana'] : '';?>' alt='Signature'>
                <div class="signature-line"></div>
                <div class="date-line"><strong><?php echo $row['name'] ? $row['name'] : '';?></strong></div>
                <div class="date-line">Managing Director</div>
            </td>
            <td>
            	<br>
                <img src="image/chop_placeholder.png" alt="Signature Placeholder" style="opacity:0;"> <!-- untuk balance tinggi -->
                <div class="signature-line"><h6>Chop & Sign</h6></div>
                <div class="date-line">Verified by:</div>
                <div class="date-line">Date:</div>
            </td>
        </tr>
    </table>
</body>
<?php
function numberToWordsEnglish($total)
{
    $ones = array("", "ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX", "SEVEN", "EIGHT", "NINE", "TEN", 
                  "ELEVEN", "TWELVE", "THIRTEEN", "FOURTEEN", "FIFTEEN", "SIXTEEN", "SEVENTEEN", 
                  "EIGHTEEN", "NINETEEN");
    $tens = array("", "", "TWENTY", "THIRTY", "FORTY", "FIFTY", "SIXTY", "SEVENTY", "EIGHTY", "NINETY");
    $thousands = array("", "THOUSAND", "MILLION", "BILLION");

    if ($total == 0) return "Zero Ringgit Only";

    $numStr = number_format($total, 2, '.', '');
    $parts = explode('.', $numStr);
    $ringgit = intval($parts[0]);
    $sen = intval($parts[1]);

    // ---- convert ringgit part ----
    $ringgitWords = "";
    $group = 0;

    while ($ringgit > 0) {
        $chunk = $ringgit % 1000;
        if ($chunk > 0) {
            $chunkWords = "";

            if ($chunk > 99) {
                $chunkWords .= $ones[intval($chunk / 100)] . " HUNDRED ";
                $chunk = $chunk % 100;
            }

            if ($chunk > 19) {
                $chunkWords .= $tens[intval($chunk / 10)] . " ";
                $chunk = $chunk % 10;
            }

            if ($chunk > 0) {
                $chunkWords .= $ones[$chunk] . " ";
            }

            $ringgitWords = trim($chunkWords) . " " . $thousands[$group] . " " . $ringgitWords;
        }

        $ringgit = intval($ringgit / 1000);
        $group++;
    }

    $result = trim($ringgitWords) . " ";

    // ---- convert sen part ----
    if ($sen > 0) {
        $senWords = "";
        if ($sen < 20) {
            $senWords = $ones[$sen];
        } else {
            $senWords = $tens[intval($sen / 10)];
            if ($sen % 10 > 0) {
                $senWords .= " " . $ones[$sen % 10];
            }
        }
        $result .= " AND " . trim($senWords) . " SEN";
    }

    $result .= " ONLY";

    return ucwords(trim($result));
}
?>