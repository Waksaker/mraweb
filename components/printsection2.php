<?php 
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$id = $_GET['id']; 

$sql = "SELECT * FROM `mra_leave` where leaveid = '$id'"; // SQL with parameters
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$nameapply = $row['nameapply'];

$sql1 = "SELECT * FROM `mra_staff` WHERE name = '$nameapply'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);

$sign1 = $row1['image'];
$syarikat = $row1['syarikat'];
?>

<div class="container" style="margin-top: 9px">
    <table width="100%">
        <tr>
        <?php 
                if ($syarikat == "MRA GLOBAL SDN BHD") {
                    echo '
                        <td style="width: 30%"><img src="assets/images/logos/mra.PNG" width="84" alt=""></td>
                        <td style="width: 70%">
                            <h4><strong>MRA GLOBAL SDN BHD</strong><br><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LEAVE FORM</h6></h4>
                        </td>
                    ';
                } elseif ($syarikat == "LETILICA SDN BHD") {
                    echo '
                        <td style="width: 30%"><img src="assets/images/logos/letilica.PNG" width="84" alt=""></td>
                        <td style="width: 70%">
                            <h4><strong>LETILICA SDN BHD</strong><br><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LEAVE FORM</h6></h4>
                        </td>
                    ';
                } elseif ($syarikat == "MIM DEFENSE SDN BHD") {
                    echo '
                        <td style="width: 30%"><img src="assets/images/logos/mim.PNG" width="84" alt=""></td>
                        <td style="width: 70%">
                            <h4><strong>MIM DEFENSE SDN BHD</strong><br><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LEAVE FORM</h6></h4>
                        </td>
                    ';
                }
            ?>
        </tr>
    </table>
    <br>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">DATE</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">NAME</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">IC NUMBER</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">POSITION</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">DATE APPLY</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 29%; border-bottom: 2px solid"></td>
            <td style="padding-top:3px; padding-bottom:3px; width: 10%">UNTIL</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 29%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%"></td>
            <td style="padding-top:3px; padding-bottom:3px; width: 10%">DAYS</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%; border-bottom: 2px solid"></td>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">PURPOSE</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">CONTACT NO</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <br>
    <table class="text-black" width="100%">
        <tr>
            <?php if ($matters == "ANNUAL LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;ANNUAL LEAVE</td>
            <?php if ($matters == "METERNITY LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;METERNITY LEAVE</td>
        </tr>
        <tr>
            <?php if ($matters == "MEDICAL LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;MEDICAL LEAVE</td>
            <?php if ($matters == "HOSPITALITY LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;HOSPITALITY LEAVE</td>
        </tr>
        <tr>
            <?php if ($matters == "UNPAID LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;UNPAID LEAVE</td>
            <?php if ($matters == "EMERGENCY LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
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
            <?php 
                if ($sign1 != "") {
                    echo '
                        <td rowspan="15" style="padding-top:13px; padding-bottom:15px; width: 33.33333333333333%; text-align:center;"></td>
                        <td rowspan="15" style="padding-top:13px; padding-bottom:15px; width: 33.33333333333333%; text-align:center;"></td>
                        <td rowspan="15" style="padding-top:13px; padding-bottom:15px; width: 33.33333333333333%; text-align:center;"></td>
                    ';
                } else {
                    echo '
                        <td rowspan="15" style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;"></td>
                        <td rowspan="15" style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;"></td>
                        <td rowspan="15" style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;"></td>
                    ';
                }
            ?>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:1px; padding-bottom:1px;width: 2%;"></td>
            <td style="padding-top:1px; padding-bottom:1px;width: 29.33333333333333%; border-top: 2px solid">DATE :</td>
            <td style="padding-top:1px; padding-bottom:1px;width: 2%;"></td>
            <td style="padding-top:1px; padding-bottom:1px;width: 2%;"></td>
            <td style="padding-top:1px; padding-bottom:1px;width: 29.33333333333333%; border-top: 2px solid">DATE :</td>
            <td style="padding-top:1px; padding-bottom:1px;width: 2%;"></td>
            <td style="padding-top:1px; padding-bottom:1px;width: 1%;"></td>
            <td style="padding-top:1px; padding-bottom:1px;width: 30.33333333333333%; border-top: 2px solid">DATE :</td>
            <td style="padding-top:1px; padding-bottom:1px;width: 1%;"></td>
        </tr>
    </table>
</div>