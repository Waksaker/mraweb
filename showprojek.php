<?php
include('conn.php');
if(!isset($_GET['idshow'])) exit("Not Found");
$id = base64_decode($_GET['idshow']);
$re=mysqli_query($conn, "SELECT * FROM `projekname` WHERE id = '$id'");
$row = mysqli_fetch_assoc($re);
$rendom = $row['rendom'];
$namepro = $row['namepro'];
$syarikat1 = $row['syarikat'];
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<style>
table.dataTable td {
    white-space: normal !important;
}
</style>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Company</h5>
            <div align="center">
            <div class="text-center mb-3">
                <?php
                    if ($syarikat1 == 'MRA GLOBAL SDN BHD') {
                        echo '<img src="assets/images/logos/mra.png" width="100" style="margin: 0 10px;" alt="Logo 1">';
                    } else if ($syarikat1 == 'LETILICA SDN BHD') {
                        echo '<img src="assets/images/logos/letilica.png" width="50" style="margin: 0 10px;" alt="Logo 2">';
                    } else if ($syarikat1 == 'MIM DEFENSE SDN BHD') {
                        echo '<img src="assets/images/logos/mim.png" width="50" style="margin: 0 10px;" alt="Logo 3">';
                    }
                ?>
            </div>
            <h3><?php echo "$syarikat1";?></h3>
        </div>
        <br>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Project</h5>
        <div align="center">
            <h3><?php echo "$namepro";?></h3>
        </div>
        <br>
    </div>
</div>
<?php
$index = 1;
$result=mysqli_query($conn, "SELECT * FROM `projek` WHERE rendom = '$rendom'");
if (mysqli_num_rows($result) > 0) {
    while ($row=mysqli_fetch_assoc($result)) {
?>
    <div class="card">
        <div class="card-body">
            <h5>Information <?php echo ($index++);?></h5>
            <div>
                <strong>Repair:</strong><br>
                <p class="text-muted mb-2">
                    <?php echo $row['pembaikan'] ? $row['pembaikan'] : '';?>
                </p>
                <strong>LPO Number:</strong><br>
                <p class="text-muted mb-2">
                    <?php echo $row['lponum'] ? $row['lponum'] : '';?>
                </p>
                <strong>Start Date:</strong><br>
                <p class="text-muted mb-2">
                    <?php
                        $startdate = new DateTime($row['stardate']);
                        echo $startdate->format('d/m/Y');
                    ?>
                </p>
                <strong>End Date:</strong><br>
                <p class="text-muted mb-2">
                    <?php
                        $enddate = new DateTime($row['duedate']);
                        echo $enddate->format('d/m/Y');
                    ?>
                </p>
                <strong>Payment:</strong><br>
                <p class="text-muted mb-2">
                    <?php echo $row['payment'] ? $row['payment'] : '';?>
                </p>
                <strong>Price:</strong><br>
                <p class="text-muted mb-2">
                    <?php echo $row['price'] ? $row['price'] : '';?>
                </p>
                <strong>Invoice:</strong><br>
                <p class="text-muted mb-2">
                    <a href="invoice/<?php echo $row['invoicedoc'] ? $row['invoicedoc'] : '';?>"><?php echo $row['invoice'] ? $row['invoice'] : '';?></a>
                </p>
                <strong>Status:</strong><br>
                <?php
                    switch ($row['status']) {
                        case '1':
                            echo '<p class="text-muted mb-2"><b style="color: #0d6efd;">Repaire in progress</b></p>';
                            break;
                        case '2':
                            echo '<p class="text-muted mb-2"><b style="color: #fd7e14;">Pending spepart</b></p>';
                            break;
                        case '3':
                            echo '<p class="text-muted mb-2"><b style="color: #dc3545;">Pending payment</b></p>';
                            break;
                        case '4':
                            echo '<p class="text-muted mb-2"><b style="color: #ffc107;">Pending claim</b></p>';
                            break;
                        case '5':
                            echo '<p class="text-muted mb-2"><b style="color: #198754;">Settle</b></p>';
                            break;
                        default:
                            echo '<td>NULL</td>';
                    }
                ?>
                <strong>Bil. Date:</strong><br>
                <?php
                if ($row['bildate'] == 0) {
                    echo '<p class="text-muted mb-2"><b style="color: #dc3545;">' . $row['bildate'] . ' Days</b></p>';
                } elseif ($row['bildate'] < 14) {
                    echo '<p class="text-muted mb-2"><b style="color: #fd7e14;">' . $row['bildate'] . ' Days</b></p>';
                } elseif ($row['bildate'] < 30) {
                    echo '<p class="text-muted mb-2"><b style="color: #ffc107;">' . $row['bildate'] . ' Days</b></p>';
                } else {
                    echo '<p class="text-muted mb-2"><b style="color: #198754;">' . $row['bildate'] . ' Days</b></p>';
                }
                ?>
                <strong>Note:</strong><br>
                <p class="text-muted mb-2">
                    <?php echo $row['catatan'] ? $row['catatan'] : '';?>
                </p>
                <div class="table-responsive">
                    <table id="tablelistprojek" class="table table-sm table-bordered align-middle w-100">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Document</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $index1 = 1;
                                $ren=$row['rendom'];
                                $pem=$row['pembaikan'];
                                $sql1 = "SELECT * FROM `document` WHERE rendom='$ren' AND pembaikan='$pem'";
                                $res1=mysqli_query($conn, $sql1);

                                while ($row1=mysqli_fetch_assoc($res1)) {
                            ?>
                                    <tr>
                                        <td><?php echo ($index1++);?></td>
                                        <td>
                                            <a href="document/<?php echo $row1['document'];?>" target="_blank"><?php echo $row1['document'];?></a>
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
<?php
    }
} else {

}
?>
<?php include("./components/footer.php"); ?>
<script>
$('tablelistprojek').DataTable({
    scrollX: true,
    responsive: false,
    autoWidth: false,
    pageLength: 10
});
</script>
