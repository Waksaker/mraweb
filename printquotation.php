<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("conn.php");

if (!isset($_GET['id'])) exit();
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM `quotation` WHERE id = '$id'");
$row = mysqli_fetch_assoc($result);
$alamat = $row['alamat'];
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
        .signature-section {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            margin-top: 200px;
            font-family: Arial, sans-serif;
            font-size: 13px;
        }
    
        .signature-section td {
    width: 50%;
    vertical-align: top;
    padding: 10px;
}
    
        /* Tajuk (APPLICANT / SUPPORT / APPROVE) */
        .signature-section tr:first-child td {
            font-weight: bold;
            padding-bottom: 10px;
        }
    
        /* Gaya gambar tandatangan */
        .signature-section img {
            width: 150px;         /* saiz tandatangan */
            height: auto;
            display: block;
            margin: 0 auto 5px auto; /* tengah + jarak bawah */
            object-fit: contain;  /* supaya tak terpotong */
        }
    
        /* Garisan tandatangan */
        .signature-line {
            border-top: 1px solid black;
            margin-top: 40px;
            display: flex;
            justify-content: flex-end; /* teks ke sebelah kanan */
            align-items: center;
            height: 20px;
        }
    
        /* Tarikh */
        .date-line {
            font-size: 12px;
            text-align: left;
            margin-top: 3px;
        }
        .signature-line h6 {
    margin: 0;
    font-weight: normal;
    font-size: 13px;
    text-align: right;
}
	</style>
</head>
<body onload="window.print()">
	<div class="title">
		<h1>Quotation</h1>
	</div>
	
	<table>
		<tr>
			<td style="border: 2px solid black">
				<h6><strong><?php echo $alamat; ?></strong></h6>
<!-- 				<h6><strong>KUMPULAN JURUTERA, ELEKTRIK DAN JENTERA</strong></h6> -->
<!-- 				<h6><strong>MARKAS PEMERINTAHAN LOGISTIK TENTERA DARAT</strong></h6> -->
<!-- 				<h6><strong>KEM IMPHAL, JALAN PADANG TEMBAK</strong></h6> -->
<!-- 				<h6><strong>50634 KUALA LUMPUR</strong></h6> -->
<!-- 				<h6><strong>ATTN:KETUA KUMPULAN</strong></h6> -->
			</td>
			<td style="width: 100px;"></td>
			<td style="text-align: left;">
				<table class="details-table">
                    <tr>
                        <td>Qtn No</td>
                        <td>:</td>
                        <td><strong>QTN-24027</strong></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>:</td>
                        <td><strong>22 Okt 24</strong></td>
                    </tr>
                    <tr>
                        <td>Page</td>
                        <td>:</td>
                        <td><strong>1 of 1</strong></td>
                    </tr>
                </table>
			</td>
		</tr>
	</table>
	<br>
	<div>
		<h6>Project:</h6>
		<h6>
			<strong>PEROLEHAN PERKHIDMATAN SENGGARAAN DAN MEMBEKALKAN ALAT GANTI SISTEM RADAR AMARAN TEMPATAN 3D/32 KEPADA RADAR 1001 DAN RADAR 1002 SECARA KOMPREHENSIF UNTUK TENTERA DARAT</strong>
		</h6>
	</div>
	<br>
	<div>
		<h6>Contract No: <strong>KP/PERO1B/T300/2021/OE.Jil.3 bertarikh 3 Januari 2024</strong></h6>
	</div>
	<br>
	<div>
		<h6>Thank you for your inquiry. We are pleased to submit our quote as follows:</h6>
	</div>
	<br>
	<div>
		<strong>4. KPR NOMBOR DAFTAR ZC 1437 : SPEEDOMETER</strong>
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
        <tr>
            <td style="text-align:center; border:2px solid black;">1</td>
            <td style="border:2px solid black;">Membuat diagnose dan mengenalpasti kerosakan</td>
            <td style="text-align:center; border:2px solid black;">2</td>
            <td style="text-align:center; border:2px solid black;">X</td>
            <td style="text-align:center; border:2px solid black;">150.00</td>
            <td style="text-align:right; border:2px solid black;">300.00</td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:left; padding:3px 5px; border:2px solid black;">
                <strong>Total Man Hours</strong>
            </td>
            <td style="text-align:right; padding:3px 5px; border:2px solid black;">
                <strong>300.00</strong>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:left; padding:3px 5px; border:2px solid black;">
                <strong>Spare Part Cost (as attached)</strong>
            </td>
            <td style="text-align:right; padding:3px 5px; border:2px solid black;">
                <strong>400.00</strong>
            </td>
        </tr>
        <tr style="background-color: yellow;">
            <td colspan="5" style="text-align:left; padding:3px 5px; border:2px solid black;">
                <strong>Main Total</strong>
            </td>
            <td style="text-align:right; padding:3px 5px; border:2px solid black;">
                <strong>700.00</strong>
            </td>
        </tr>
    </table>
	<br>
	<div>
		<h6>Ringgit Malaysia: <strong><?php echo numberToWordsEnglish(70000.00);?></strong></h6>
	</div>
	<br>
	<div>
		<h6><strong>REMARKS:</strong></h6>
		<h6>We hope our quotation is favouravle to you and we are looking forward to receive your valued orders. If you require further clarification, please do not hesitate to contact us.</h6>
	</div>
	<br>
	<table class="signature-section">
        <tr>
            <td><h6>Best regards,</h6></td>
            <td><h6>We Comfirm the order by accepting the terms</h6></td>
        </tr>
        <tr>
            <td>
                <img src='' alt='Signature'>
                <div class="signature-line"></div>
                <div class="date-line"><strong>Nor Fazlina Binti Yahaya</strong></div>
                <div class="date-line">Managing Director</div>
            </td>
            <td>
                <br>
                <div class="signature-line"><h6>chop & sign</h6></div>
                <div class="date-line">Verified by: </div>
                <div class="date-line">Date: </div>
            </td>
        </tr>
    </table>
</body>
<?php
function numberToWordsEnglish($num)
{
    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", 
                  "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", 
                  "Eighteen", "Nineteen");
    $tens = array("", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety");
    $thousands = array("", "Thousand", "Million", "Billion");

    if ($num == 0) return "Zero Ringgit Only";

    $numStr = number_format($num, 2, '.', '');
    $parts = explode('.', $numStr);
    $ringgit = intval($parts[0]);
    $sen = intval($parts[1]);

    $ringgitWords = "";
    $group = 0;

    while ($ringgit > 0) {
        $chunk = $ringgit % 1000;
        if ($chunk > 0) {
            $chunkWords = "";

            if ($chunk > 99) {
                $chunkWords .= $ones[intval($chunk / 100)] . " Hundred ";
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

    $result = trim($ringgitWords) . " Ringgit";

    if ($sen > 0) {
        $result .= " and " . $sen . " Sen";
    }

    $result .= " Only";

    return ucwords(trim($result));
}

?>