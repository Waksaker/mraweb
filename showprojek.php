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
.tablelistprojek1 td,
.tablelistprojek1 th {
    white-space: normal !important;
    word-wrap: break-word;
}

.tablelistprojek2 td,
.tablelistprojek2 th {
    white-space: normal !important;
    word-wrap: break-word;
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
                <br>
                <strong>LPO Number:</strong><br>
                <p class="text-muted mb-2">
                    <?php echo $row['lponum'] ? $row['lponum'] : '';?>
                </p>
                <br>
                <strong>Start Date:</strong><br>
                <p class="text-muted mb-2">
                    <?php
                        $startdate = new DateTime($row['stardate']);
                        echo $startdate->format('d/m/Y');
                    ?>
                </p>
                <br>
                <strong>End Date:</strong><br>
                <p class="text-muted mb-2">
                    <?php
                        $enddate = new DateTime($row['duedate']);
                        echo $enddate->format('d/m/Y');
                    ?>
                </p>
                <br>
                <strong>Payment:</strong><br>
                <p class="text-muted mb-2">
                    <?php echo $row['payment'] ? $row['payment'] : '';?>
                </p>
                <strong>Price:</strong><br>
                <p class="text-muted mb-2">
                    <?php echo $row['price'] ? $row['price'] : '';?>
                </p>
                <br>
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
                <br>
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
                <br>
                <strong>Note:</strong><br>
                <p class="text-muted mb-2">
                    <?php echo $row['catatan'] ? $row['catatan'] : '';?>
                </p>
                <br>
                <strong>Invoice:</strong><br>
                <table id="" class="display tablelistprojek1" style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td style="text-align: center;"><?php echo $row['invoice'];?></td>
                            <td style="text-align: center;">
                                <a href="invoice/<?php echo $row['invoicedoc'];?>" download="<?php echo $row['invoice'];?>" class="btn btn-primary"><img src="assets/images/file.png" alt="" style="width: 24px; height: 24px;"></a>
                                <a href="invoice/<?php echo $row['invoicedoc'];?>" target="_blank" class="btn btn-primary"><img src="assets/images/eye.png" alt="" style="width: 24px; height: 24px;"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <strong>Document:</strong><br>
                <table id="" class="display tablelistprojek2" style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Document</th>
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
                                    <td style="text-align: center;"><?php echo ($index1++);?></td>
                                    <td style="text-align: center;"><?php echo $row1['document'];?></td>
                                    <td style="text-align: center;">
                                        <a href="document/<?php echo $row1['document'];?>" download="<?php echo $row1['document'];?>" class="btn btn-primary"><img src="assets/images/file.png" alt="" style="width: 24px; height: 24px;"></a>
                                        <a href="document/<?php echo $row1['document'];?>" target="_blank" class="btn btn-primary"><img src="assets/images/eye.png" alt="" style="width: 24px; height: 24px;"></a>
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
<?php
    }
} else {

}
?>
<?php include("./components/footer.php"); ?>
<script>
$('.tablelistprojek1').DataTable({
    responsive: true,
    autoWidth: false,
    lengthChange: false,
    paging: false,
    searching: false,
    info: false
});

$('.tablelistprojek2').DataTable({
    responsive: true,
    autoWidth: false,
    lengthChange: false,
    paging: false,
    searching: false,
    info: false
});
</script>