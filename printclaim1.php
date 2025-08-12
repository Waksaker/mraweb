<?php

include('conn.php');

$Date_now=date('D, M d, Y H:i:s');
// $days = date("t",strtotime($Date_now));

$noic = base64_decode($_GET['id']);
$month = isset($_GET['month']) ? $_GET['month'] : null;
$year = isset($_GET['year']) ? $_GET['year'] : null;

if (in_array($month, ['01', '03', '05', '07', '08', '10', '12'])) {
    $days = 31;
}elseif (in_array($month, ['04', '06', '09', '11'])) {
    $days = 30;
} elseif ($month == "02") {
    $days = (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) ? 29 : 28;
}

if ($month == '01') {
    $month2 = "1";
} else if ($month == '02') {
    $month2 = "2";
} else if ($month == '03') {
    $month2 = "3";
} else if ($month == '04') {
    $month2 = "4";
} else if ($month == '05') {
    $month2 = "5";
} else if ($month == '06') {
    $month2 = "6";
} else if ($month == '07') {
    $month2 = "7";
} else if ($month == '08') {
    $month2 = "8";
} else if ($month == '09') {
    $month2 = "9";
} else if ($month == '10') {
    $month2 = "10";
} else if ($month == '11') {
    $month2 = "11";
} else if ($month == '12') {
    $month2 = "12";
} 

if ($month == '01') {
    $month3 = "JANUARI";
} else if ($month == '02') {
    $month3 = "FEBRUARI";
} else if ($month == '03') {
    $month3 = "MAC";
} else if ($month == '04') {
    $month3 = "APRIL";
} else if ($month == '05') {
    $month3 = "MEI";
} else if ($month == '06') {
    $month3 = "JUN";
} else if ($month == '07') {
    $month3 = "JULAI";
} else if ($month == '08') {
    $month3 = "OGOS";
} else if ($month == '09') {
    $month3 = "SEPTEMBER";
} else if ($month == '10') {
    $month3 = "OKTOBER";
} else if ($month == '11') {
    $month3 = "NOVEMBER";
} else if ($month == '12') {
    $month3 = "DISEMBER";
}   

$sqlp = "SELECT name, icno, bank_name, acc_no, syarikat FROM mra_staff, mra_claims where icno = '$noic' and icno = noic and YEAR(date) = '$year' AND MONTH(date) = '$month'"; // SQL with parameters
$resultp = mysqli_query($conn, $sqlp);
$rowp = mysqli_fetch_array($resultp);
$namep  = $rowp['name'];
$icnop  = $rowp['icno'];
$bank_name  = $rowp['bank_name'];
$acc_no  = $rowp['acc_no'];
$syarikat = $rowp['syarikat'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLAIM (<?php echo $month3; ?>)</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/mra.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Apply this to your `table` element. */
        #page {
        border-collapse: collapse;
        }

        /* And this to your table's `td` elements. */
        #page td {
        padding: 0; 
        margin: 0;
        }

        @page {size: A4;max-height:100%; max-width:100%}

    </style>
</head>
<body onload="window.print()">
    <div class="container-fluid">
        <table id="page" style="width:100%; margin-bottom: 10px">
            <tr>
                <td><strong><?php echo $syarikat; ?></strong></td>
                <td></td>
                <td align="center"><strong>CLAIM PERIOD</strong></td>
            </tr>
            <tr>
                <td>PERSONAL CLAIM - <b><?php echo $month3; ?>&nbsp;&nbsp;<?php echo $year; ?></b></td>
                <td align="right">From :</td>
                <td style="border: 1px solid black; text-align:center;">1/<?php echo $month2; ?>/<?php echo $year; ?></td>
            </tr>
            <tr>
                <td></td>
                <td align="right">To :</td>
                <td style="border: 1px solid black; text-align:center;"><?php echo $days ?>/<?php echo $month2; ?>/<?php echo $year; ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <td><strong>NAME</strong></td>
                <td><strong>:</strong></td>
                <td><strong>&nbsp;&nbsp;<?php echo $namep; ?></strong></td>
            </tr>
            <tr>
                <td><strong>IC NO</strong></td>
                <td><strong>:</strong></td>
                <td><strong>&nbsp;&nbsp;<?php echo $icnop; ?></strong></td>
            </tr>
            <tr>
                <td><strong>ACC NO</strong></td>
                <td><strong>:</strong></td>
                <td><strong>&nbsp;&nbsp;<?php echo $acc_no; ?> (<?php echo $bank_name; ?>)</strong></td>
            </tr>
        </table>
        <br>
        <table style="width:100%">
            <thead style="background-color: #E8E8E8">
                <tr>
                <th style="border: 2px solid; text-align: center; padding-bottom: 5px;">DATE</th>
                <th style="border: 2px solid; text-align: center; padding-bottom: 5px;">PAID TO</th>
                <th style="border: 2px solid; text-align: center; padding-bottom: 5px;">PURPOSE</th>
                <th style="border: 2px solid; text-align: center; padding-bottom: 5px;">AMOUNTS</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM mra_staff, mra_claims where icno = '$noic' and icno = noic and YEAR(date) = $year AND MONTH(date) = $month"; // SQL with parameters
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result))
            {
                $id = $row['id'];
                $datec = $row['date'];
                $date =  date('d/m/Y', strtotime($datec));
                $noic2  = $row['noic'];
                $purpose = $row['purpose'];
                $details = $row['details'];
                $amount = $row['amount'];
                $name  = $row['name'];
            
            ?>
            <tbody>
                <tr>
                    <td style="border: 2px solid; text-align: center" width="15%"><?php echo $date; ?></td>
                    <td style="border: 2px solid; text-align: center" width="15%"></td>
                    <td style="border: 2px solid; text-align: center" width="50%"><?php echo $purpose; ?>(<?php echo $details; ?>)</td>
                    <td style="border: 2px solid; text-align: center" width="10%" align="center"><?php echo number_format($amount,2); ?></td>
                </tr>
            </tbody>
            <?php } 
            
            $sqltotal = "SELECT SUM(amount) AS total_amount FROM mra_staff, mra_claims where icno = '$noic' and icno = noic and YEAR(date) = $year AND MONTH(date) = $month"; // SQL with parameters
            $resulttotal = mysqli_query($conn, $sqltotal);
            $rowtotal = mysqli_fetch_array($resulttotal);
            $total_amount = $rowtotal['total_amount'];
            ?>
            <tfoot>
                <tr>
                    <td width="10%"></td>
                    <td  width="30%"></td>
                    <td style="text-align: right; padding-right: 15px" width="35%"><strong>TOTAL (RM)</strong></td>
                    <td style="text-align: right; border-bottom: 2px solid" width="10%" align="center"><strong><?php echo number_format($total_amount,2); ?></strong></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <footer>
        <table>
            <tr>
                <td><strong>CLAIM TO BE PRODUCED BY OR BEFORE 15TH ON EACH MONTH</strong></td>
            </tr>
        </table>
        <br>
        <table style="width:100%">
            <tr>
                <td style="border:2px solid" width="50%"><font style="padding-left: 5px; padding-top: 5px;"><u style="text-decoration: none; border-bottom: 2px solid">Remark's</u></font><br><br><br><br><br><br><br><br><br><br><br></td>
                <td width="30%">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;................................................................
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(STAFF SIGNATURE)
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;Date:
                <br><br><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;................................................................
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(SIGNATURE)
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;Date:
                </td>
                <td width="30%"></td>
            </tr>
        </table>
    </footer>
</body>
</html>