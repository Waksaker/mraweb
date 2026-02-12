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
                $dataleave = [
                    "labels" => ["Pending Support", "Pending Approve", "Approved", "Rejected"],
                    "data" => [$pendingSupport, $pendingApprove, $approved, $rejected]
                ];
            ?>
                <strong>Pending Support<b> : <?php echo $pendingSupport;?></b></strong>
                <br>
                <strong>Pending Approve<b> : <?php echo $pendingApprove?></b></strong>
                <br>
                <strong>Approved<b> : <?php echo $approved;?></b></strong>
                <br>
                <strong>Rejected<b> : <?php echo $rejected;?></b></strong>
                <canvas id="leavegraf" width="400" height="200"></canvas>
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
            $dataclaim = [
                "labels" => ["Pending", "Approved", "Rejected"],
                "data" => [$pendingClaim, $approvedClaim, $rejectedClaim]
            ];
        ?>
        <strong>Pending :<b><?php echo $pendingClaim;?></b></strong>
        <br>
        <strong>Approved :<b><?php echo $approvedClaim;?></b></strong>
        <br>
        <strong>Rejected :<b><?php echo $rejectedClaim;?></b></strong>
        <canvas id="claimgraf" width="400" height="200"></canvas>    
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Request</h5>
        <br>
        <?php
            $sqlstatacc = "
                SELECT COUNT(*) AS totalstatusacc 
                FROM request 
                WHERE statusacc = '1'
                AND namestaff = '$name2'
            ";
            $resultstatacc=mysqli_query($conn, $sqlstatacc);
            $rowstatacc = mysqli_fetch_assoc($resultstatacc);
            $requestacc = $rowstatacc['totalstatusacc'];
                
            $sqlstatusmana = "
                SELECT COUNT(*) AS totalstatusmana 
                FROM request 
                WHERE statusacc = '2' 
                AND statusmana = '1'
                AND namestaff = '$name2'       
            ";
            $resultstatusmana=mysqli_query($conn, $sqlstatusmana);
            $rowstatusmana = mysqli_fetch_assoc($resultstatusmana);
            $requestmana = $rowstatusmana['totalstatusmana'];

            $sqlstatusdirec = "
                SELECT COUNT(*) AS totalstatusdirec 
                FROM request 
                WHERE statusacc = '2' 
                AND statusmana = '2' 
                AND statusdirec = '1'
                AND namestaff = '$name2'
            ";
            $resultstatusdirec=mysqli_query($conn, $sqlstatusdirec);
            $rowstatusdirec = mysqli_fetch_assoc($resultstatusdirec);
            $requestdirec = $rowstatusdirec['totalstatusdirec'];

            $sqlcompleted = "
                SELECT COUNT(*) AS totalcompleted 
                FROM request 
                WHERE statusacc = '2' 
                AND statusmana = '2' 
                AND statusdirec = '2'
                AND namestaff = '$name2'    
            ";
            $resultcompleted=mysqli_query($conn, $sqlcompleted);
            $rowcompleted = mysqli_fetch_assoc($resultcompleted);
            $requestcompleted = $rowcompleted['totalcompleted'];

            $sqlreject = "
                SELECT COUNT(*) AS totalreject 
                FROM request 
                WHERE statusacc = '3' 
                OR statusmana = '3' 
                OR statusdirec = '3'
                AND namestaff = '$name2'    
            ";
            $resultreject=mysqli_query($conn, $sqlreject);
            $rowreject = mysqli_fetch_assoc($resultreject);
            $requestreject = $rowreject['totalreject'];
        ?>
        <strong>Pending Accounting :<b><?php echo $requestacc;?></b></strong>
        <br>
        <strong>Pending Manager :<b><?php echo $requestmana;?></b></strong>
        <br>
        <strong>Pending Director :<b><?php echo $requestdirec;?></b></strong>
        <br>
        <strong>Completed :<b><?php echo $requestcompleted;?></b></strong>
        <br>
        <strong>Rejected :<b><?php echo $requestreject;?></b></strong>
    </div>
</div>
<script src="C:\xampp1\htdocs\mraweb\assets\js\chart.js"></script>
<script>
const ctx = document.getElementById('leavegraf').getContext('2d');
const leaveData = <?php echo json_encode($dataleave); ?>;
const myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: leaveData.labels,
        datasets: [{
            label: 'Leave',
            data: leaveData.data,
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>