<?php 
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

?>
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
                    SELECT COUNT(*) AS total FROM mra_leave where noic = '$noic'
                ";
                $resultleavetotal=mysqli_query($conn, $sql);
                $rowleavetotal = mysqli_fetch_assoc($resultleavetotal);
                $leave = $rowleavetotal['total'];
                echo "
                    <h4 style='text-align:center;'><b>$leave apply</b></h4>
                "
            ?>
            <br>
            <?php
                $sql = "
                    SELECT COUNT(*) AS total 
                    FROM mra_leave 
                    WHERE statsupport = '1'
                    AND noic = '$noic'
                ";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                $pendingSupport = $row['total'];

                $sql1 = "
                    SELECT COUNT(*) AS total 
                    FROM mra_leave 
                    WHERE statsupport = '2' 
                    AND statapprove = '1'
                    AND noic = '$noic' 
                ";
                $res1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($res1);
                $pendingApprove = $row1['total'];

                $sql2 = "
                    SELECT COUNT(*) AS total 
                    FROM mra_leave 
                    WHERE statsupport = '2' 
                    AND statapprove = '2'
                    AND noic = '$noic'
                ";
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);
                $approved = $row2['total'];

                $sql3 = "
                    SELECT COUNT(*) AS total 
                    FROM mra_leave 
                    WHERE statsupport = '4' 
                    OR statapprove = '4'
                    AND noic = '$noic'
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
        <?php
            $sql4 = "
                SELECT
                    SUM(CASE WHEN claim.status = 1 THEN 1 ELSE 0 END) AS pending,
                    SUM(CASE WHEN claim.status = 2 THEN 1 ELSE 0 END) AS approved,
                    SUM(CASE WHEN claim.status = 3 THEN 1 ELSE 0 END) AS rejected
                FROM mra_claim claim
                WHERE namestaff = '$name2'
            ";
            $result4 = mysqli_query($conn, $sql4);
            $row4 = mysqli_fetch_assoc($result4);
            $pendingClaim = $row4['pending'];
            $approvedClaim = $row4['approved'];
            $rejectedClaim = $row4['rejected'];
        ?>
        <strong>Pending :<b><?php echo $pendingClaim;?></b></strong>
        <br>
        <strong>Approved :<b><?php echo $approvedClaim;?></b></strong>
        <br>
        <strong>Rejected :<b><?php echo $rejectedClaim;?></b></strong>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Request</h5>
        <br>

    </div>
</div>
