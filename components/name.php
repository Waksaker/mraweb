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