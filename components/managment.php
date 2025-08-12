<?php
set_time_limit(0);
error_reporting(E_NOTICE);
include('C:\laragon\www\mraweb\conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];

$Date_now=date('D M d, Y H:i:s');
$Year_now = date('Y',strtotime($Date_now));
$tarikh = date('Y-m-d');

$sql = "SELECT * FROM mra_staff where name = '$name'"; // SQL with parameters
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$name2 = $row['name'];
$position2 = $row['position'];
$noic = $row['icno'];

$sql1 = "SELECT * FROM `mra_office` WHERE `date_apply` = '$tarikh'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

$date = $row1['outoffice'];
?>
<div class="card">
    <div class="card-body">
		<h5 class="card-title fw-semibold mb-4">Managment</h5>
        <div align="right">
			<!-- <a href="addstaff.php" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Add Managment</a> -->
        </div>
    </div>
</div>
<script type="text/javascript">
  function deletestaff(id) {
    var result = confirm("Adakah anda ingin memadam data ini?");

    if (result) {
      window.location.href = "delete.php?idstaff=" + id;
    }
  }
</script>