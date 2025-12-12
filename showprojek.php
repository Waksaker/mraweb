<?php
include('conn.php');
if(!isset($_GET['idshow'])) exit("Not Found");
$id = base64_decode($_GET['idshow']);
$re=mysqli_query($conn, "SELECT * FROM `projekname` WHERE id = '$id'");
$row = mysqli_fetch_assoc($re);
$syarikat = $row['syarikat'];
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
        <table id="showprojek" class="display nowrap" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Company</th>
                    <th>LPO Number</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Repire</th>
                    <th>Payment</th>
                    <th>Price</th>
                    <th>Invoice</th>
                    <th>Status</th>
                    <th>Bil Date</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $index = 1;
                    $res=mysqli_query($conn, "SELECT * FROM `projek` WHERE `nameprojek` = '$namepro' AND `syarikat` = '$syarikat'");
                    while ($row=mysqli_fetch_assoc($res)) {
                ?>
                    <tr>
                        <td><?php echo ($index++);?></td>
                        <td><?php echo $row['syarikat'];?></td>
                        <td><?php echo $row['lponum'];?></td>
                        <td>
                            <?php
                                $star = new DateTime($row['stardate']);
                                echo $star->format('Y/m/d');
                            ?>
                        </td>
                        <td>
                            <?php
                                $end = new DateTime($row['duedate']);
                                echo $end->format('Y/m/d');
                            ?>
                        </td>
                        <td><?php echo $row['pembaikan'];?></td>
                        <td><?php echo number_format($row['payment'], 2, ',', '.');?></td>
                        <td><?php echo number_format($row['price'], 2, ',', '.');?></td>
                        <td>
                            <a href="./invoice/<?php echo $row['invoicedoc'];?>" target="_blank"><?php echo $row['invoice'];?></a>
                        </td>
                        <td>
                            <?php  
                                $status = $row['status'];
                                switch ($status) {
                                    case "1":
                                        echo "<span style='color:#0d6efd'>Repair in progress</span>";
                                        break;
                                    case "2":
                                        echo "<span style='color: #fd7e14;'>Pending spepart</span>";
                                        break;
                                    case "3":
                                        echo "<span style='color: #ffc107;'>Pending payment</span>";
                                        break;
                                    case "4":
                                        echo "<span style='color: #6f42c1;'>Pending claim</span>";
                                        break;
                                    case "5":
                                        echo "<span style='color: #198754;'>Settle</span>";
                                        break;
                                    default:
                                        echo "Error status";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $bildate = $row['bildate'];
                                echo "$bildate Days";
                            ?>
                        </td>
                        <td><?php echo $row['catatan'];?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List Document</h5>
         <table id="documenrprojek" class="display nowrap" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>LPO Number</th>
                    <th>Name Projek</th>
                    <th>Document</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $index1 = 1;
                    $res1=mysqli_query($conn, "SELECT * FROM `document` WHERE `namprojek` = '$namepro'");
                    while ($row1=mysqli_fetch_assoc($res1)) {
                ?>
                    <tr>
                        <td><?php echo ($index1++);?></td>
                        <td><?php echo $row1['lponum'];?></td>
                        <td><?php echo $row1['namprojek'];?></td>
                        <td>
                            <a href="./document/<?php echo $row1['document'];?>" target="_blank"><?php echo $row1['document'];?></a>
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
    new DataTable('#showprojek', {
        scrollX: true
    });
</script>
<script>
    new DataTable('#documenrprojek', {
        scrollX: true
    });
</script>