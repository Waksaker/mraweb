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
                    $index = 1;
                    $result = mysqli_query($conn, "SELECT * FROM mra_staff");
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $index++; ?></td>
                        <td style="text-align: center;"><?php echo $row['name'] ? $row['name'] : ''; ?></td>
                        <td style="text-align: center;"><?php echo $row['position'] ? $row['position'] : ''; ?></td>
                        <td style="text-align: center;"><?php echo $row['status'] ? $row['status'] : ''; ?></td>
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