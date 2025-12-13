<?php
include('conn.php');
if(!isset($_GET['idshow'])) exit("Not Found");
$id = base64_decode($_GET['idshow']);
$re=mysqli_query($conn, "SELECT * FROM `projekname` WHERE id = '$id'");
$row = mysqli_fetch_assoc($re);
$rendom = $row['rendom'];
$namepro = $row['namepro'];
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Project</h5>
        <div align="center">
            <h3><?php echo "$namepro";?></h3>
        </div>
        <br>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List information project</h5>
        <table id="tablelistprojek1" class="display nowrap" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Company</th>
                    <th style="text-align: center;">LPO Number</th>
                    <th style="text-align: center;">Start Date</th>
                    <th style="text-align: center;">End Date</th>
                    <th style="text-align: center;">Repair</th>
                    <th style="text-align: center;">Payment</th>
                    <th style="text-align: center;">Price</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Bil Date</th>
                    <th style="text-align: center;">Note</th>
                    <th style="text-align: center;">Invoice</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $index1 = 1;
                    $re=mysqli_query($conn, "SELECT * FROM `projek` WHERE rendom = '$rendom'");
                    while ($row1 = mysqli_fetch_assoc($re)) {
                        ?>
                            <tr>
                                <td><?php echo ($index1++)?></td>
                                <td><?php echo $row1['syarikat'];?></td>
                                <td><?php echo $row1['lponum'];?></td>
                                <td>
                                    <?php
                                        $startdate = new DateTime($row1['stardate']);
                                        echo $startdate->format('d/m/Y');
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $enddate = new DateTime($row1['duedate']);
                                        echo $enddate->format('d/m/Y');
                                    ?>
                                </td>
                                <td><?php echo $row1['pembaikan'];?></td>
                                <td><?php echo $row1['payment'];?></td>
                                <td><?php echo $row1['price'];?></td>
                                <?php
                                switch ($row1['status']) {
                                    case '1':
                                        echo '<td style="background-color: #0d6efd; color: #0c0c0c; text-align: center"><b>Repaire in progress</b></td>';
                                        break;
                                    case '2':
                                        echo '<td style="background-color: #fd7e14; color: #0c0c0c; text-align: center"><b>Pending spepart</b></td>';
                                        break;
                                    case '3':
                                        echo '<td style="background-color: #dc3545; color: #0c0c0c; text-align: center"><b>Pending payment</b></td>';
                                        break;
                                    case '4':
                                        echo '<td style="background-color: #ffc107; color: #0c0c0c; text-align: center"><b>Pending claim</b></td>';
                                        break;
                                    case '5':
                                        echo '<td style="background-color: #198754; color: #0c0c0c; text-align: center"><b>Settle</b></td>';
                                        break;
                                    default:
                                        echo '<td>NULL</td>';
                                }
                                ?>
                                <?php
                                if ($row1['bildate'] > 30) {
                                    echo '<td style="background-color: #198754; color: #0c0c0c; text-align: center"><b>' . $row1['bildate'] . ' Days</b></td>';
                                } elseif ($row1['bildate'] < 30) {
                                    echo '<td style="background-color: #ffc107; color: #0c0c0c; text-align: center"><b>' . $row1['bildate'] . ' Days</b></td>';
                                } elseif ($row1['bildate'] < 14) {
                                    echo '<td style="background-color: #fd7e14; color: #0c0c0c; text-align: center"><b>' . $row1['bildate'] . ' Days</b></td>';
                                } elseif ($row1['bildate'] == 0) {
                                    echo '<td style="background-color: #dc3545; color: #0c0c0c; text-align: center"><b>' . $row1['bildate'] . ' Days</b></td>';
                                }
                                ?>
                                <td style="color: #0c0c0c; text-align: center">
                                    <?php echo $row1['catatan'];?>
                                </td>
                                <td>
                                    <a href="invoice/<?php echo $row1['invoicedoc'];?>" download="<?php echo $row1['invoice'];?>" class="btn btn-primary"><img src="assets/images/file.png" style="height: 24px; width: 24px;"></a>
                                    <a href="invoice/<?php echo $row1['invoicedoc'];?>" target="_blank" class="btn btn-primary"><img src="assets/images/eye.png" style="height: 24px; width: 24px;"></a>
                                </td>
                            </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
        <br>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List Document</h5>
        <table id="tablelistdocument" class="display nowrap" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Repair</th>
                    <th style="text-align: center;">LPO Number</th>
                    <th style="text-align: center;">Document</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $index2 = 1;
                    $re1 = mysqli_query($conn, "SELECT * FROM `document` WHERE rendom = '$rendom'");
                    while ($row2 = mysqli_fetch_assoc($re1)) {
                        ?>
                            <tr>
                                <td><?php echo ($index2);?></td>
                                <td><?php echo $row2['pembaikan'];?></td>
                                <td><?php echo $row2['lponum'];?></td>
                                <td>
                                    <a href="document/<?php echo $row2['document'];?>" download="<?php echo $row2['document'];?>" class="btn btn-primary"><img src="assets/images/file.png" style="height: 24px; width: 24px;"></a>
                                    <a href="document/<?php echo $row2['document'];?>" target="_blank" class="btn btn-primary"><img src="assets/images/eye.png" style="height: 24px; width: 24px;"></a>
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include("./components/footer.php"); ?>
<script>
    new DataTable('#tablelistprojek1', {
        scrollX: true
    });
</script>
<script>
    new DataTable('#tablelistdocument', {
        scrollX: true
    });
</script>