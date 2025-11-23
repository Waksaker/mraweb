<?php
include('conn.php');
if (!isset($_GET['name']) && !isset($_GET['date'])) exit();
$name = $_GET['name'];
$date = $_GET['date'];

// untuk request
$result = mysqli_query($conn, "SELECT * FROM `request` WHERE namestaff = '$name' AND 	dateapply = '$date'");
if (mysqli_num_rows($result) < 0) exit();
$row = mysqli_fetch_assoc($result);
$appoiment = $row['appoiment'];
$department = $row['department'];
$supplirename = $row['supplirename'];
$suppladderss = $row['suppladderss'];
$attention = $row['attention'];
$termpayment = $row['termpayment'];
$payto = $row['payto'];
$accno = $row['accno'];
$bankname = $row['bankname'];
$remark = $row['remark'];
$signreq = $row['signreq'];
$signmanager = $row['signmanager'];
$datemanager = $row['datemanager'];
$signacc = $row['signacc'];
$dateacc = $row['dateacc'];
$signdirector = $row['signdirector'];
$datedirector = $row['datedirector'];
$refno=$row['refno'];
$syarikat=$row['syarikat'];
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
        h3 {
            font-size: 16px;
        }

        p {
            font-size: 13px;
        }

        .underline-div {
            display: inline-block;
            border-bottom: 1px solid black;
        }

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

        img {
            max-width: 100px;          /* Control saiz logo */
            display: block;
            margin: auto;              /* Center gambar dalam cell */
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <table style="margin-right: -100px; float: right;  width: 145%; border: 1px solid black;  border-collapse: collapse;">
                        <?php
                            if ($syarikat == "MIM DEFENSE SDN BHD") {
                        ?>
                            <tr>
                                <td style="width: 40%; text-align: center;">
                                    <img src="assets/images/logos/mim.png" alt="Logo">
                                    <h5>MIM DEFENSE SDN BHD.</h5>
                                </td>
                                <td style="width: 160%;">
                                    <h5>MIM DEFENSE SDN BHD</h5>
                                    <h6>21-1, Jalan Wangsa Delima 2A, Pusat Bandar Wangsa Maju,</h6>
                                    <h6>53300 Kuala Lumpur, W.P Kuala Lumpur</h6>
                                    <!-- <h6>Tel: 05-3666166</h6> -->
                                </td>
                            </tr>
                        <?php
                            } elseif ($syarikat == "MRA GLOBAL SDN BHD") {
                        ?>
                            <tr>
                                <td style="width: 40%; text-align: center;">
                                    <img src="assets/images/logos/mra.PNG" alt="Logo">
                                    <h5>MRA GLOBAL SDN BHD.</h5>
                                </td>
                                <td style="width: 160%;">
                                    <h5>MRA GLOBAL SDN BHD</h5>
                                    <h6>No.23A, Laluan Industri 1, Kawasan Perindustrian Ringan Siputeh</h6>
                                    <h6>31560 Siputeh, Perak Darul Ridzuan</h6>
                                    <h6>Tel: 05-3666166</h6>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                    
                    <table style="margin-right: -100px; float: right;">
                        <tr>
                            <td style="text-align: right; border: none;"><h6><b>Ref No: <?php echo $refno;?></b></h6></td>
                        </tr>
                    </table>

                    <table style="margin-right: -100px; float: right; width: 145%; border: 1px solid black; border-collapse: collapse; margin-bottom: 20px;">
                        <tr>
                            <td colspan="2" style="text-align: center; border: none;">
                                <h6 style="color: #239BA7;">REQUISITION FORM</h6>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;"><h6>Staff Name: <?php echo ($name) ? $name : ''; ?></h6></td>
                            <td style="width: 50%;"><h6>Date: <?php echo ($date) ? $date : ''; ?></h6></td>
                        </tr>
                        <tr>
                            <td><h6>Appointment: <?php echo ($appoiment) ? $appoiment : ''; ?></h6></td>
                            <td><h6>Department: <?php echo ($department) ? $department : ''; ?></h6></td>
                        </tr>
                    </table>

                    <table style="margin-right: -100px; float: right; width: 145%; border: 1px solid black; border-collapse: collapse; margin-bottom: 20px;">
                        <tr>
                            <td style="width: 50%;"><h6>Supplier Name: <?php echo ($supplirename) ? $supplirename : ''; ?></h6></td>
                        </tr>
                        <tr>
                            <td style="width: 50%;"><h6>Supplier Address: <?php echo ($suppladderss) ? $suppladderss : ''; ?></h6></td>
                        </tr>
                        <tr>
                            <td style="width: 50%;"><h6>Attention: <?php echo ($attention) ? $attention : ''; ?></h6></td>
                        </tr>
                    </table>

                    <table style="margin-right: -100px; float: right; width: 145%; border: 1px solid black; border-collapse: collapse; margin-bottom: 20px;">
                        <tr>
                            <th style="text-align: center;"><h5><b>No.</b></h5></th>
                            <th style="text-align: center;"><h5><b>Descriptions</b></h5></th>
                            <th style="text-align: center;"><h5><b>Qty</b></h5></th>
                            <th style="text-align: center;"><h5><b>Price per Unit (RM)</b></h5></th>
                            <th style="text-align: center;"><h5><b>Amount (RM)</b></h5></th>
                        </tr>
                        <?php
                            // untuk list request
                            $index = 1;
                            $result1 = mysqli_query($conn, "SELECT * FROM `list_request` WHERE name = '$name' AND date = '$date'");
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo ($index++); ?></td>
                                    <td style="text-align: center;"><?php echo ($row1['descriptions']) ? $row1['descriptions'] : ''; ?></td>
                                    <td style="text-align: center;"><?php echo ($row1['quantity']) ? $row1['quantity'] : ''; ?></td>
                                    <td style="text-align: center;"><?php echo ($row1['price']) ? $row1['price'] : ''; ?></td>
                                    <td style="text-align: center;"><?php echo ($row1['amount']) ? $row1['amount'] : ''; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                        <tr>
                            <td style="border-right: none;"></td>
                            <td style="border-left: none; border-right: none;"></td>
                            <td style="border-right: none; border-left: none;"></td>
                            <td style="text-align: right; border-left: none;">Total (RM)</td>
                            <td style="text-align: center;">
                                <?php
                                    $result2 = mysqli_query($conn, "SELECT SUM(amount) as amount FROM `list_request` WHERE name = '$name' AND date = '$date'");
                                    if (mysqli_num_rows($result2) < 0) echo "00.00";
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $amount = $row2['amount'];
                                    echo "$amount";
                                ?>
                            </td>
                        </tr>
                    </table>

                    <table style="margin-right: -100px; float: right; width: 145%; border: 1px solid black; border-collapse: collapse; margin-bottom: 20px;">
                        <tr>
                            <td style="border-right: none;">
                                <h6>Terms of Payment: <?php echo ($termpayment) ? $termpayment : ''; ?></h6>
                                <h6>Pay to: <?php echo ($payto) ? $payto : ''; ?></h6>
                                <h6>Account No: <?php echo ($accno) ? $accno : ''; ?></h6>
                                <h6>Bank Name: <?php echo ($bankname) ? $bankname : ''; ?></h6>
                                <br>
                                <br>
                                <h6>Remarks: <?php echo ($remark) ? $remark : ''; ?></h6>
                            </td>
                        </tr>
                    </table>

                    <table style="margin-right: -100px; float: right; width: 145%; border: 1px solid black; border-collapse: collapse; margin-bottom: 20px;">
                        <tr>
                            <td style="text-align: center;">Request by</td>
                            <td style="text-align: center;">Authorized by Manager</td>
                            <td style="text-align: center;">Verified by Account Department</td>
                            <td style="text-align: center;">Approved by Director</td>
                        </tr>
                        <tr>
                            <td style="text-align: center; height: 80px;">
                                <?php
                                    echo '<img src="./image/' . $signreq . '" alt="" id="preview-img-sign">';
                                ?>
                            </td>
                            <td style="text-align: center; height: 80px;">
                                <?php
                                    echo '<img src="./image/' . $signmanager . '" alt="" id="preview-img-sign">';
                                ?>
                            </td>
                            <td style="text-align: center; height: 80px;">
                                <?php
                                    echo '<img src="./image/' . $signacc . '" alt="" id="preview-img-sign">';
                                ?>
                            </td>
                            <td style="text-align: center; height: 80px;">
                                <?php
                                    echo '<img src="./image/' . $signdirector . '" alt="" id="preview-img-sign">';
                                ?>
                            </td>
                        </tr>
                        <tr>
			    <td>Date: 
				<?php 
					if ($date != '0000-00-00') {
						echo date('d/m/Y', strtotime($date));
					} else {
						echo "";
					}
				?>
			    </td>
			    <td>Date: 
				<?php 
					if ($datemanager != '0000-00-00') {
						echo date('d/m/Y', strtotime($datemanager));
					}else{
						echo "";
					}
				?>
			    </td>
			    <td>Date: 
				<?php  
					if ($dateacc != '0000-00-00') {
						echo date('d/m/Y', strtotime($dateacc));
					} else {
						echo "";
					}
				?>
			    </td>
			    <td>Date: 
				<?php  
					
					if ($datedirector != '0000-00-00') {
						echo date('d/m/Y', strtotime($datedirector));
					} else {
						echo "";
					}
				
				?>
			    </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
