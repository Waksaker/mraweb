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

$Date_now=date('D, M d, Y H:i:s');
$Year_now = date('Y',strtotime($Date_now));
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
        <table id="leavelist" class="display nowrap" style="width: 100%">
            <thead class="bg-primary text-white">
                <tr>
		            <th style="text-align: center">No</th>
 		            <th style="text-align: center">Name</th>
		            <th style="text-align: center">Ic</th>
                    <th style="text-align: center">Start date</th>
                    <th style="text-align: center">End date</th>
                    <th style="text-align: center">Matters</th>
                    <th style="text-align: center">Days</th>
                    <th style="text-align: center">Status support</th>
                    <th style="text-align: center">Status approve</th>
		            <th style="text-align: center">#</th>
                </tr>
            </thead>
	        <tbody>
                <?php
		            $index1 = 1;
		            $result1 = mysqli_query($conn, "SELECT * FROM mra_leave");
		            while ($row1=mysqli_fetch_assoc($result1)) {
                        $mc = $row1['mc'];
		        ?>
		            <tr>
                        <td style="text-align: center"><?php echo ($index1++);?></td>
                        <td><?php echo $row1['nameapply'];?></td>
                        <td style="text-align: center"><?php echo $row1['noic'];?></td>
                        <td style="text-align: center">
                            <?php
                                $datestart = $row1['datestart'];
                                echo date('d/m/Y', strtotime($datestart));
                            ?>
                        </td>
                        <td style="text-align: center">
                            <?php
                                $enddate=$row1['dateend'];
                                echo date('d/m/Y', strtotime($enddate));
                            ?>
                        </td>
                        <td style="text-align: center"><?php echo $row1['matters'];?></td>
                        <td style="text-align: center">
                            <?php
                                $days = $row1['daysleave'];
                                echo "$days days";
                            ?>
                        </td>
                        <?php
                            if ($row1['statsupport'] == '1') {
                                echo "<td style='background-color:#ffc107; text-align:center; color: #0c0c0c;'><b>PENDING</b></td>";
                            } elseif ($row1['statsupport'] == '2') {
                                echo "<td style='background-color:#198754; text-align:center; color: #0c0c0c;'><b>APPROVED</b></td>";
                            } elseif ($row1['statsupport'] == '3') {
                                echo "<td style='background-color:#fd7e14; text-align:center; color: #0c0c0c;'><b>CHECK AGAIN</b></td>";
                            } elseif ($row1['statsupport'] == '4') {
                                echo "<td style='background-color:#dc3545; text-align:center; color: #0c0c0c;'><b>REJECTED</b></td>";
                            }
                        ?>
                        <?php
                            if ($row1['statapprove'] == '1') {
                                echo "<td style='background-color:#ffc107; text-align:center; color: #0c0c0c;'><b>PENDING</b></td>";
                            } elseif ($row1['statapprove'] == '2') {
                                echo "<td style='background-color:#198754; text-align:center; color: #0c0c0c;'><b>APPROVED</b></td>";
                            } elseif ($row1['statapprove'] == '3') {
                                echo "<td style='background-color:#fd7e14; text-align:center; color: #0c0c0c;'><b>CHECK AGAIN</b></td>";
                            } elseif ($row1['statapprove'] == '4') {
                                echo "<td style='background-color:#dc3545; text-align:center; color: #0c0c0c;'><b>REJECTED</b></td>";
                            }
                        ?>
                        <td style="text-align: center">
                            <a href="printleave.php?id=<?php echo $row1['leaveid']; ?>" target="_blank" class="btn btn-primary"><img src="assets/images/print.png" alt="" style="width: 24px; height: 24px;"></a>
                            <?php if($mc!="") echo '<a href="./mc/' . $mc . '" download="MC(' . $row1['nameapply'] . ').png" class="btn btn-primary"><img src="assets/images/file.png" style="width: 24px; height: 24px;"></a>';?>
                        </td>
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
        <h5 class="card-title fw-semibold mb-4">Staff</h5>
        <br>
        <table id="stafflist" class="display nowrap" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Status</th>
                </tr>
            </thead    ead>
            <tbody>
                <?php
                    $index5 = 1;
                    $result5 = mysqli_query($conn, "SELECT * FROM mra_staff");
                    while ($row5 = mysqli_fetch_assoc($result5)) {
                ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $index5++; ?></td>
                        <td style="text-align: center;"><?php echo $row5['name'] ? $row5['name'] : ''; ?></td>
                        <td style="text-align: center;"><?php echo $row5['position'] ? $row5['position'] : ''; ?></td>
                        <td style="text-align: center;"><?php echo $row5['status'] ? $row5['status'] : ''; ?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <br>
        <h1 style="text-align: center;">Total: <?php echo mysqli_num_rows($result); ?></h1>
    </div>
</div>
