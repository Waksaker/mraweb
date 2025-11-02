<?php 
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$id = $_GET['id']; 

$sql = "SELECT * FROM `mra_leave` where leaveid = '$id'"; // SQL with parameters
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$dateapplyc = $row['dateapply'];
$dateapply =  date('d/m/Y', strtotime($dateapplyc));
$nameapply = $row['nameapply'];
$position = $row['position'];
$datestartc = $row['datestart'];
$datestart =  date('d/m/Y', strtotime($datestartc));
$dateendc = $row['dateend'];
$dateend =  date('d/m/Y', strtotime($dateendc));
$daysleave = $row['daysleave'];
$purpose = $row['purpose'];
$contactno = $row['contactno'];
$matters = $row['matters'];
$datestatsupport = $row['datestatsupport'];
$datestatsupport1 =  date('d/m/Y', strtotime($datestatsupport));
$datestatapprove = $row['datestatapprove'];
$datestatapprove1 = date('d/m/Y', strtotime($datestatapprove));
$namesupport = $row['namesupport'];
$nameapprove = $row['nameapprove'];

$sql1 = "SELECT * FROM `mra_staff` WHERE name = '$nameapply'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);

$sign = $row1['image'];
$syarikat = $row1['syarikat'];

$sql2 = "SELECT * FROM `mra_staff` WHERE name = '$namesupport'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$sign2 = $row2['image'];

$sql3 = "SELECT * FROM `mra_staff` WHERE name = '$nameapprove'";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$sign3 = $row3['image'];
?>
<?php
echo "$datestatsupport";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Leave Form</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 13px;
        margin: 30px;
    }

    @page {
        size: A4 portrait;
        margin: 20mm;
    }

    .header {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-bottom: 15px;
    }

    .header img {
        max-width: 90px;
        height: auto;
    }

    .header h2 {
        font-size: 32px;
        margin: 0;
        font-weight: bold;
    }

    .title h3 {
        text-align: center;
        font-size: 26px;
        margin-bottom: 20px;
        /* text-decoration: underline; */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 15px;
    }

    td {
        padding: 5px;
        vertical-align: top;
    }

    .tdapply .trapply {
        border: 1px solid black;
    }

    .underline {
        display: inline-block;
        border-bottom: 1px solid black;
        min-width: 200px;
    }

    .section {
        border: 1px solid black;
        padding: 10px;
        margin-top: 10px;
    }

    .remarks {
        border: 1px solid black;
        padding: 6px;
        text-align: left;
        margin-top: 8px;
    }

    .signature-section {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
        margin-top: 30px;
        font-family: Arial, sans-serif;
        font-size: 13px;
    }

    .signature-section td {
        width: 33%;
        padding: 20px 10px;
        vertical-align: bottom;
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
        border-top: 1.8px solid black;
        width: 100%;
        margin: 0 auto 4px auto;
        height: 2px;
    }

    /* Tarikh */
    .date-line {
        font-size: 12px;
        text-align: left;
        margin-top: 3px;
    }

</style>
</head>
<body onload="window.print()">
    <div class="header">
        <?php
            if ($syarikat=="MRA GLOBAL SDN BHD") {
                echo '
                    <img src="assets/images/logos/mra.PNG" alt="Logo MRA">
                    <h2>MRA GLOBAL SDN BHD</h2>
                ';
            } elseif ($syarikat=="LETILICA SDN BHD") {
                echo '
                    <img src="assets/images/logos/letilica.png" alt="Logo MRA">
                    <h2>LETILICA SDN BHD</h2>
                ';
            } elseif ($syarikat=="MIM DEFENSE SDN BHD") {
                echo '
                    <img src="assets/images/logos/mim.png" alt="Logo MRA">
                    <h2>MIM DEFENSE SDN BHD</h2>
                ';
            }
        ?>
        
    </div>

    <div class="title">
        <h3>LEAVE FORM</h3>
    </div>

    <table>
        <tr><td><strong>DATE</strong></td><td>: <?php echo $dateapply; ?></td></tr>
        <tr><td><strong>NAME</strong></td><td>: <?php echo $nameapply; ?></td></tr>
        <tr><td><strong>IC NUMBER</strong></td><td>: <?php echo $row1['icno']; ?></td></tr>
        <tr><td><strong>POSITION</strong></td><td>: <?php echo $position; ?></td></tr>
        <tr><td><strong>DATE APPLY</strong></td><td>: <?php echo $datestart; ?> &nbsp;&nbsp; <strong>UNTIL</strong> : <?php echo $dateend; ?></td></tr>
        <tr><td><strong>DAYS</strong></td><td>: <?php echo $daysleave; ?></td></tr>
        <tr><td><strong>PURPOSE</strong></td><td>: <?php echo $purpose; ?></td></tr>
        <tr><td><strong>CONTACT NO</strong></td><td>: <?php echo $contactno; ?></td></tr>
    </table>

    <table style="border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <?php if ($matters == "ANNUAL LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 1px solid black; text-align:center;"><img src="assets/images/check.png" width="20" alt=""></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 1px solid black; text-align:center;"></td>
            <?php } ?>
            <td style="border: 1px solid black;"><strong>ANNUAL LEAVE</strong></td>
            <?php if ($matters == "MATERNITY LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 1px solid black; text-align:center;"><img src="assets/images/check.png" width="20" alt=""></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 1px solid black; text-align:center;"></td>
            <?php } ?>
            <td style="border: 1px solid black;"><strong>MATERNITY LEAVE</strong></td>
        </tr>
        <tr style="border: 1px solid black;">
            <?php if ($matters == "MEDICAL LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 1px solid black; text-align:center;"><img src="assets/images/check.png" width="20" alt=""></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 1px solid black; text-align:center;"></td>
            <?php } ?>
            <td style="border: 1px solid black;"><strong>MEDICAL LEAVE</strong></td>
            <?php if ($matters == "HOSPITALITY LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 1px solid black; text-align:center;"><img src="assets/images/check.png" width="20" alt=""></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 1px solid black; text-align:center;"></td>
            <?php } ?>
            <td style="border: 1px solid black;"><strong>HOSPITALITY LEAVE</strong></td>
        </tr>
        <tr style="border: 1px solid black;">
            <?php if ($matters == "UNPAID LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 1px solid black; text-align:center;"><img src="assets/images/check.png" width="20" alt=""></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 1px solid black; text-align:center;"></td>
            <?php } ?>
            <td style="border: 1px solid black;"><strong>UNPAID LEAVE</strong></td>
            <?php if ($matters == "EMERGENCY LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 1px solid black; text-align:center;"><img src="assets/images/check.png" width="20" alt=""></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 1px solid black; text-align:center;"></td>
            <?php } ?>
            <td style="border: 1px solid black;"><strong>EMERGENCY LEAVEs</strong></td>
        </tr>
    </table>

    <div class="remarks">
        <strong>REMARKS:</strong> (Please Key In Balance of AL - Annual Leave)
    </div>

    <table class="signature-section">
        <tr>
            <td><strong>APPLICANT</strong></td>
            <td><strong>SUPPORT BY</strong></td>
            <td><strong>APPROVE BY</strong></td>
        </tr>
        <tr>
            <td>
                <?php if ($sign != "") echo "<img src='image/$sign' alt='Signature'>"; ?>
                <div class="signature-line"></div>
                <div class="date-line">DATE: <?php echo $dateapply; ?></div>
            </td>
            <td>
                <?php if ($sign2 != "") echo "<img src='image/$sign2' alt='Signature'>"; ?>
                <div class="signature-line"></div>
                <div class="date-line">
                    DATE: <?php echo ($datestatsupport != "") ? $datestatsupport1 : ""; ?>
                </div>
            </td>
            <td>
                <?php if ($sign3 != "") echo "<img src='image/$sign3' alt='Signature'>"; ?>
                <div class="signature-line"></div>
                <div class="date-line">
                    DATE: <?php echo ($datestatapprove != "") ? $datestatapprove1 : ""; ?>
                </div>
            </td>
        </tr>
    </table>

</body>
</html>