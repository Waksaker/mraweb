<?php 
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$noic = base64_decode($_GET['id']); 

$sql = "SELECT * FROM mra_leave where noic ='$noic'"; // SQL with parameters
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


?>

<div class="container">
    <table width="100%">
        <tr>
            <td style="width: 30%"><img src="assets/images/logos/mra.png" width="120" alt=""></td>
            <td style="width: 70%">
                <h4><strong>LETILICA SDN BHD</strong><br><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LEAVE FORM</h6></h4>
            </td>
        </tr>
    </table>
    <br>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">DATE</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"><?php echo $dateapply; ?></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">NAME</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"><?php echo $nameapply; ?></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">IC NUMBER</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"><?php echo $noic; ?></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">POSITION</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"><?php echo $position; ?></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">DATE APPLY</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 29%; border-bottom: 2px solid"><?php echo $datestart; ?></td>
            <td style="padding-top:3px; padding-bottom:3px; width: 10%">UNTIL</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 29%; border-bottom: 2px solid"><?php echo $dateend; ?></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%"></td>
            <td style="padding-top:3px; padding-bottom:3px; width: 10%">DAYS</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%; border-bottom: 2px solid"><?php echo $daysleave; ?></td>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">PURPOSE</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"><?php echo $purpose; ?></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">CONTACT NO</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"><?php echo $contactno; ?></td>
        </tr>
    </table>
    <br>
    <table class="text-black" width="100%">
        <tr>
            <?php if ($matters == "ANNUAL LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"><img src="assets/images/check.png" width="20" alt=""></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;ANNUAL LEAVE</td>
            <?php if ($matters == "METERNITY LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"><img src="assets/images/check.png" width="20" alt=""></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;METERNITY LEAVE</td>
        </tr>
        <tr>
            <?php if ($matters == "MEDICAL LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"><img src="assets/images/check.png" width="20" alt=""></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;MEDICAL LEAVE</td>
            <?php if ($matters == "HOSPITALITY LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"><img src="assets/images/check.png" width="20" alt=""></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;HOSPITALITY LEAVE</td>
        </tr>
        <tr>
            <?php if ($matters == "UNPAID LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"><img src="assets/images/check.png" width="20" alt=""></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;UNPAID LEAVE</td>
            <?php if ($matters == "EMERGENCY LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"><img src="assets/images/check.png" width="20" alt=""></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;EMERGENCY LEAVE</td>
        </tr>
    </table>
    <br>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid"></td>
            <td style="padding-top:3px; padding-bottom:3px; width: 90%; border: 2px solid">&nbsp;&nbsp;<strong>REMARKS: (Please Key In Balance of AL (Annual Leave)</strong></td>
        </tr>
    </table>
    <br>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;">APPLICANT</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;">SUPPORT BY</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;">APPROVE BY</td>
        </tr>
    </table>
    <br>
    <table class="text-black" width="100%" height="100%">
    <br>
    <br>
    <br>
        <tr>
            <td rowspan="15" style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;"></td>
            <td rowspan="15" style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;"></td>
            <td rowspan="15" style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px;width: 2%;"></td>
            <td style="padding-top:3px; padding-bottom:3px;width: 29.33333333333333%; border-top: 2px solid">DATE :<?php echo $dateapply; ?></td>
            <td style="padding-top:3px; padding-bottom:3px;width: 2%;"></td>
            <td style="padding-top:3px; padding-bottom:3px;width: 2%;"></td>
            <td style="padding-top:3px; padding-bottom:3px;width: 29.33333333333333%; border-top: 2px solid">DATE :</td>
            <td style="padding-top:3px; padding-bottom:3px;width: 2%;"></td>
            <td style="padding-top:3px; padding-bottom:3px;width: 1%;"></td>
            <td style="padding-top:3px; padding-bottom:3px;width: 30.33333333333333%; border-top: 2px solid">DATE :</td>
            <td style="padding-top:3px; padding-bottom:3px;width: 1%;"></td>
        </tr>
    </table>
</div>