<?php
include('conn.php');
if (!isset($_GET['bulan']) && !isset($_GET['tahun'])) exit();
$bulan = base64_decode($_GET['bulan']);
$tahun = base64_decode($_GET['tahun']);

if ($bulan == '01') {
    $month3 = "January";
} else if ($bulan == '02') {
    $month3 = "February";
} else if ($bulan == '03') {
    $month3 = "March";
} else if ($bulan == '04') {
    $month3 = "April";
} else if ($bulan == '05') {
    $month3 = "May";
} else if ($bulan == '06') {
    $month3 = "June";
} else if ($bulan == '07') {
    $month3 = "July";
} else if ($bulan == '08') {
    $month3 = "August";
} else if ($bulan == '09') {
    $month3 = "September";
} else if ($bulan == '10') {
    $month3 = "October";
} else if ($bulan == '11') {
    $month3 = "November";
} else if ($bulan == '12') {
    $month3 = "December";
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @page {
            size: A4 landscape;
            max-height: 100%;
            max-width: 100%;
        }
        td, th {
            border: 1px solid black;   /* Border setiap cell */
            padding: 10px;             /* Ruang dalam kotak */
            vertical-align: middle;    /* Text align tengah (atas-bawah) */
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <h1 style="text-align: center;"><u>List of Attendance Reports for <?php echo $month3?></u></h1>
                    <br>
                    <br>
                    <h1 style="text-align: center;"><u>In Office</u></h1>
                    <table style="margin-right: -100px; float: right;  width: 145%; border: 1px solid black;  border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Time In</th>
                                <th style="text-align: center;">Time Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $index = 1;
                                $sql = "
                                    SELECT 
                                        staff.name as name,
                                        office.date_apply as date,
                                        office.inoffice as timein,
                                        office.outoffice as timeout
                                    FROM 
                                        `mra_office` as office
                                    LEFT JOIN
                                        `mra_staff` as staff
                                    ON
                                        office.ic = staff.icno
                                    WHERE
                                        MONTH(date_apply) = '$bulan'
                                    AND 
                                        YEAR(date_apply) = '$tahun'
                                ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo ($index++);?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td style="text-align: center;"><?php echo $row['date'];?></td>
                                    <td style="text-align: center;"><?php echo $row['timein'];?></td>
                                    <td style="text-align: center;"><?php echo $row['timeout'];?></td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
		    </table>

                    <div style="clear: both;"></div>

                    <h1 style="text-align: center; margin-top: 150px;"><u>Outstation</u></h1>

                    <table style="margin-right: -100px; float: right;  width: 145%; border: 1px solid black;  border-collapse: collapse;">
                        <thead>
                            <tr>
				<th>No</th>
				<th>Name</th>
				<th>Date</th>
				<th>Purpose</th>
                            </tr>
			</thead>
			<tbody>
			    <?php
				$index1 = 1;
				$result1=mysqli_query($conn, "SELECT * FROM `mra_outstation` WHERE MONTH(datestart) = '$bulan' AND YEAR(datestart) = '$tahun'");
				while ($row1=mysqli_fetch_assoc($result1)) {
			    ?>
				<tr>
				    <td><?php echo ($index1++);?></td>
				    <td><?php echo $row1['name'];?></td>
				    <td><?php echo $row1['datestart'];?></td>
				    <td>
					<?php echo $row1['purpose'];?>(<?php echo $row1['details'];?>)
				    </td>	
				</tr>	
  			    <?php
				}
			    ?>
			</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
