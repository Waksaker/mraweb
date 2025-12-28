<p?php 
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];

$sql = "SELECT * FROM mra_staff where name = '$name'"; // SQL with parameters
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$name2 = $row['name'];
$position2 = $row['position'];
$noic = $row['icno'];

$Date_now=date('D, M d, Y H:i:s');
$Year_now = date('Y',strtotime($Date_now));
?>
<style>
table.dataTable.dtr-inline.collapsed > tbody > tr > td.dtr-control:before {
    background-color: #0d6efd;
}
</style>
<div class="card">
    <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Hi, <?php echo $name; ?></h5>
    <p class="mb-0"><?php echo $position; ?></p>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Leave</h5>
        <br>
        <div>
            <?php
                $sql = "
                    SELECT COUNT(*) AS total FROM mra_leave
                ";
                $resultleavetotal=mysqli_query($conn, $sql);
                $rowleavetotal = mysqli_fetch_assoc($resultleavetotal);
                $leave = $rowleavetotal['total'];
                echo "
                    <h4 style='text-align:center;'><b>$leave apply</b></h4>
                "
            ?>
            <?php
                $sql = "SELECT COUNT(*) AS total FROM mra_leave WHERE statsupport = '1'";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                $pendingSupport = $row['total'];

                $sql1 = "
                    SELECT COUNT(*) AS total 
                    FROM mra_leave 
                    WHERE statsupport = '2' AND statapprove = '1'
                ";
                $res1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($res1);
                $pendingApprove = $row1['total'];

                $sql2 = "
                    SELECT COUNT(*) AS total 
                    FROM mra_leave 
                    WHERE statsupport = '2' AND statapprove = '2'
                ";
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);
                $approved = $row2['total'];

                $sql3 = "
                    SELECT COUNT(*) AS total 
                    FROM mra_leave 
                    WHERE statsupport = '4' OR statapprove = '4'
                ";
                $res3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($res3);
                $rejected = $row3['total'];
            ?>
                <strong>Pending Support<b> : <?php echo $pendingSupport;?></b></strong>
                <br>
                <strong>Pending Approve<b> : <?php echo $pendingApprove?></b></strong>
                <br>
                <strong>Approved<b> : <?php echo $approved;?></b></strong>
                <br>
                <strong>Rejected<b> : <?php echo $rejected;?></b></strong>
            <?php
            ?>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Claim</h5>
        <br>
        <div>
            
            <strong></strong>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Request</h5>
        <br>
        
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Quotation</h5>
        <br>
        
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Staff</h5>
        <br>
        
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Projek</h5>
        <br>
        
    </div>
</div>