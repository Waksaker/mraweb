<?php
include ('conn.php');
if (!isset($_GET['name']) && !isset($_GET['bulan']) && !isset($_GET['tahun'])) exit('Not Found');
$staff_name = base64_decode($_GET['name']);
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
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Update claim</h5>
        <form name="kemaskiniclaim" action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="bulan" value="<?php echo $bulan;?>">
            <input type="text" name="tahun" value="<?php echo $tahun;?>">
            <input type="text" name="name" value="<?php echo $name;?>">
            <div class="customer_record">
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Status</label>
                    <select name="statusclaim" id="status" class="form-control mb-1">
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Cliam In Month <?php echo $month3;?></h5>
        <table id="kemaskiniclaim" class="display" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Purpose</th>
                    <th style="text-align: center;">Details</th>
                    <th style="text-align: center;">Amounts</th>
                    <th style="text-align: center;">Resit</th>
			        <th style="text-align: center;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $index = 1;
                    $sql = "
                        SELECT 
                            claim.id AS id,
                            claim.date AS date,
                            claim.noic AS noic,
                            claim.purpose AS purpose,
                            claim.details AS details,
                            claim.amount AS amount,
                            claim.status AS status,
                            staff.name AS name,
                            claim.resit AS resit
                        FROM 
                            `mra_claims` AS claim
                        LEFT JOIN
                            `mra_staff` AS staff
                        ON
                            claim.noic = staff.icno
                        WHERE staff.name = '$staff_name' and YEAR(claim.date) = '$tahun' and MONTH(claim.date) = '$bulan' AND staff.status != 'MANAGER'
                    ";
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
                        $status = $row['status'];
                        $staff_name  = $row['name'];
                        $resit = $row['resit'];
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo ($index++); ?></td>
                            <td style="text-align: center;"><?php echo $staff_name; ?></td>
                            <td style="text-align: center;"><?php echo $date; ?></td>
                            <td style="text-align: center;"><?php echo $purpose; ?></td>
                            <td style="text-align: center;"><?php echo $details; ?></td>
                            <td style="text-align: center;"><?php echo $amount; ?></td>
                            <td style="text-align: center;"><?php echo $resit ? $resit : 'NULL'; ?></td>
                            <td style="text-align: center;">
                                <?php 
                                    if ($status == "1") {
                                        echo "<span class='badge bg-secondary'>Pending</span>";
                                    } elseif ($status == "2") {
                                        echo "<span class='badge bg-success'>Approved</span>";
                                    } elseif ($status == "3") {
                                        echo "<span class='badge bg-danger'>Rejected</span>";
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
            </tbody>
        </table>
        <br>
        <h3>
            <?php
                $sql1 = "
                    SELECT
                        SUM(claim.amount) AS total_claim
                    FROM 
                        `mra_claims` AS claim
                    LEFT JOIN
                        `mra_staff` AS staff
                    ON
                        claim.noic = staff.icno
                    WHERE staff.name = '$staff_name' and YEAR(claim.date) = '$tahun' and MONTH(claim.date) = '$bulan' AND staff.status != 'MANAGER'
                ";
                $result1 = mysqli_query($conn, $sql1);
                $row1=mysqli_fetch_assoc($result1);
                $total_claim = $row1['total_claim'];
                echo "<h3 style='text-align:center;'>Total: <b>$total_claim</b></h3>"
            ?>
        </h3>
    </div>
</div>
<?php include("./components/footer.php"); ?> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script>
    new DataTable('#kemaskiniclaim', {
      responsive: true,
      autoWidth: false,
      paging: false,
      searching: true,
      ordering: true,
      columnDefs: [
        { responsivePriority: 1, targets: 2 },  // Name
        { responsivePriority: 2, targets: 3 },  // tarikh
        { responsivePriority: 3, targets: -1 }, // Action
        { responsivePriority: 10001, targets: [1,3,4,5,6,7] }
      ]
    });
</script>