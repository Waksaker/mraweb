<?php
include('conn.php');
if (!isset($_GET['date'])) exit();
$date = base64_decode($_GET['date']);
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
                    <h1 style="text-align: center;"><u>List of Attendance Reports for <?php echo $date?></u></h1>
                    <br>
                    <br>
                    <h1 style="text-align: center;"><u>In Office</u></h1>
                    <table style="margin-right: -100px; float: right;  width: 145%; border: 1px solid black;">
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
                                $sql = "SELECT * FROM `attandance` WHERE date = '$date'";
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

                    <h1 style="text-align: center; margin-top: 50px;"><u>Outstation</u></h1>

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
                            $result1=mysqli_query($conn, "SELECT * FROM `mra_outstation` WHERE datestart = '$date'");
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
                    
                    <h1 style="text-align: center; margin-top: 50px;"><u>Not Present</u></h1>
                    
                    <table style="margin-right: -100px; float: right; width: 145%; border: 1px solid black; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>date</th>
                                <th>Matter</th>
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $index2 = 1;
                                $result2=mysqli_query($conn, "SELECT * FROM `notpresent` WHERE date = '$date'");
                                    while ($row2=mysqli_fetch_assoc($result2)) {
                                        ?>
                                            <tr>
                                                <td><?php echo ($index2++);?></td>
                                                <td><?php echo $row2['name'] ? $row2['name'] : '';?></td>
                                                <td><?php echo $row2['date'] ? $row2['date'] : '';?></td>
                                                <td><?php echo $row2['matter'] ? $row2['matter'] : '';?></td>
                                                <td><?php echo $row2['reason'] ? $row2['reason'] : '';?></td>
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
