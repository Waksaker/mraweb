<?php
set_time_limit(0);
//error_reporting(E_NOTICE);
include('conn.php');
?>
<?php
if (isset($_POST['name']) && $_POST['name'] != '') {
    $name = $_POST['name'];
    $year = $_POST['tahun'];
    $month = $_POST['bulan'];
    $result = mysqli_query($conn, "SELECT * FROM mra_staff where name = '$name'");
    $row1 = mysqli_fetch_assoc($result);
    $noic1 = $row1['icno'];
?>
<div class="mt-3" align="right">
    <a href="kemaskiniclaims.php?name=<?php echo base64_encode($name);?>&bulan=<?php echo base64_encode($month)?>&tahun=<?php echo base64_encode($year)?>" class="btn btn-primary"><img src="assets/images/Pencil.png" alt="" style="width: 24; height: 24px;"></a>
    <a href="printclaim1.php?id=<?php echo base64_encode($noic1); ?>&month=<?php echo $month; ?>&year=<?php echo $year; ?>" target="_blank" class="btn btn-primary"><img src="assets/images/print.png" alt="" style="width: 24px; height: 24;"></a>
    <button href="" class="btn btn-warning" onclick="test('<?php echo $month; ?>')">Delete All</button>
</div>
<?php
} else {
    $year = $_POST['tahun'];
    $month = $_POST['bulan'];
    $noic = $_POST['ic'];
?>
<div class="mt-3" align="right">
    <a href="printclaim1.php?id=<?php echo base64_encode($noic); ?>&month=<?php echo $month; ?>&year=<?php echo $year; ?>" target="_blank" class="btn btn-primary"><img src="assets/images/print.png" alt="" style="width: 24px; height: 24;"></a>
    <button href="" class="btn btn-warning" onclick="test('<?php echo $month; ?>')">Delete All</button>
</div>
<?php
}
?>
<br>
<table id="claim" class="display" style="width:100%">
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
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $index = 1;
        if (isset($_POST['name']) && $_POST['name'] != '') {
            $name = $_POST['name'];
            $year = $_POST['tahun'];
            $month = $_POST['bulan'];
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
                WHERE
                    staff.name = '$name' and YEAR(claim.date) = '$year' AND MONTH(claim.date) = '$month' AND staff.status != 'MANAGER'
            ";
        } else {
            $year = $_POST['tahun'];
            $month = $_POST['bulan'];
            $noic = $_POST['ic'];
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
                WHERE
                    claim.noic = '$noic' and YEAR(claim.date) = '$year' AND MONTH(claim.date) = '$month' AND staff.status != 'MANAGER'
            ";
        }
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
            $name  = $row['name'];
            $resit = $row['resit'];
        ?>
        <tr>
            <td style="text-align: center;"><?php echo ($index++); ?></td>
            <td style="text-align: center;"><?php echo $name; ?></td>
            <td style="text-align: center;"><?php echo $date; ?></td>
            <td style="text-align: center;"><?php echo $purpose; ?></td>
            <td style="text-align: center;"><?php echo $details; ?></td>
            <td style="text-align: center;"><?php echo $amount; ?></td>
            <td style="text-align: center;"><?php echo $resit; ?></td>
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
            <td style="text-align: center;">
                <a href="editapplyclaim1.php?id=<?php echo base64_encode($id); ?>" class="btn btn-primary">
                    <img src="assets/images/Pencil.png" alt="" style="width: 24; height: 24px;">
                </a>
                <button class="btn btn-danger" onclick="test1('<?php echo $id; ?>')"><img src="assets/images/Trash_Can.png" alt="" style="width: 24px; height: 24px;"></button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
	 new DataTable('#claim', {
      responsive: true,
      autoWidth: false,
      paging: true,
      searching: true,
      ordering: true,
      columnDefs: [
        { responsivePriority: 1, targets: 2 },  // Name
        { responsivePriority: 2, targets: 8 },  // Status
        { responsivePriority: 3, targets: -1 }, // Action
        { responsivePriority: 10001, targets: [1,3,4,5,6,7] }
      ]
    });
</script>
<script type="text/javascript">
    function test(date) {
        var result = confirm("Are you sure you want to delete all this data??");
        if (result) {
            window.location.href = "delete.php?date=" + date;
        }
    }

    function test1(no) {
        var result1 = confirm("Are you sure you want to delete this data?");

        if (result1) {
            window.location.href = "delete.php?idapplyclaim=" + no;
        }
    }
</script>