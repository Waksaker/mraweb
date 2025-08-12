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
		<h5 class="card-title fw-semibold mb-4">Staff</h5>
        <div align="right">
          <!-- <a href="addstaff.php" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Add Staff</a> -->
        </div>
        <table id="example" class="display nowrap" style="width:100%">
			<thead class="bg-primary text-white">
				<tr>
					<th style="text-align: center;">No</th>
    				<th style="text-align: center;">Staff Information</th>
    				<th style="text-align: center;">Action</th>
				</tr>
			</thead> 
			<?php 
                $indexstaff = 1;
                $sql = "SELECT * FROM mra_staff";
                $result = mysqli_query($conn, $sql);
                while ($rowstaff = mysqli_fetch_assoc($result)) {
                    
                    $maklumat = "
                        <div>
                            <strong>Name:</strong> {$rowstaff['name']}<br>
                            <strong>Email:</strong> {$rowstaff['email']}<br>
                            <strong>Ic:</strong> {$rowstaff['icno']}<br>
                            <strong>Position:</strong> {$rowstaff['position']}<br>
                            <strong>Status:</strong> {$rowstaff['status']}<br>
                            <strong>Phone Number:</strong> {$rowstaff['phoneno']}<br>
                            <strong>Bank Name:</strong> {$rowstaff['bank_name']}<br>
                            <strong>Account Number:</strong> {$rowstaff['acc_no']}<br>
                            <strong>Syarikat:</strong> {$rowstaff['syarikat']}<br>
                        </div>
                    ";
                    $id = $rowstaff['id'];
			?>    
			<tbody>
				<tr>
					<td style="text-align:center;"><?php echo ($indexstaff++); ?></td>
					<td><?php echo $maklumat; ?></td>
					<td>
						<a href="kemaskinistaff.php?name=<?php echo $rowstaff['name'];?>&position=<?php echo $rowstaff['position']; ?>" class="btn btn-primary"><img src="assets/images/Pencil.png" alt="" style="width: 24; height: 24px;"></a>
            <button type="button" onclick="deletestaff('<?php echo $id ?>')" class="btn btn-danger"><img src="assets/images/Trash_Can.png" alt="" style="width: 24px;  height: 24px;"></button>
					</td>
				</tr>
			</tbody>  
			<?php } ?> 	
        </table>
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