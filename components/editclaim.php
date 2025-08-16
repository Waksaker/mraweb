<?php
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];

if ($_GET['id']) {
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM `mra_claim` WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$date = $row['apply'];
	$tajuk = $row['tajuk'];
	$ic = $row['ic'];
	$status = $row['status'];
	$folder = $row['folder'];
	
	$sql1 = "SELECT * FROM `mra_staff` WHERE icno = '$ic'";
	$result1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_assoc($result1);
	$status1 = $row1['status'];
}
?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Edit Claim</h5>
    <form name="claim" action="editclaimaction.php" method="post"  enctype="multipart/form-data">
        <div class="customer_records">
            <div class="row mb-3">
            <label for="datestart" class="col-sm-2 col-form-label">DATE</label>
            <div class="col-sm-4">
                <input type="date" class="form-control mb-3" id="date" name="date" value="<?php echo $date; ?>">
            </div>
            <label for="dateend" class="col-sm-2 col-form-label">TITLE</label>
            <div class="col-sm-4">
                <input type="text" class="form-control mb-1" id="title" name="title" maxlength="255" value="<?php echo $tajuk; ?>">
                <sup><font style="color:red">*Max character 255 only including space and break</font></sup>
            </div>
            <label for="noic" class="col-sm-2 col-form-label">NO IC</label>
            <div class="col-sm-4">
                <input type="text" class="form-control mb-3" id="noic" name="noic" value="<?php echo $ic; ?>">
            </div>
			<?php
				if ($status1 == "STAFF") {
					?>
						<label for="dateend" class="col-sm-2 col-form-label">UPLOAD FILE</label>
						<div class="col-sm-4">
							<input type="file" name="namefile" id="namefile" value="<?php echo $namefile; ?>">
							<sup><font style="color:red">*Please upload file</font></sup>
						</div>
						<input type="text" name"namefile2" id="namefile2" value="<?php echo "$folder"; ?>">
						<input type="text" name"status" id="status" value="<?php echo "$status"; ?>">
					<?php
				} else {
					?>
						<label for="dateend" class="col-sm-2 col-form-label">UPLOAD FILE</label>
						<div class="col-sm-4">
							<input type="file" name="namefile" id="namefile" value="<?php echo $namefile; ?>">
							<sup><font style="color:red">*Please upload file</font></sup>
						</div>
						<label for="noic" class="col-sm-2 col-form-label">STATUS</label>
						<div class="col-sm-4">
							<select class="form-control mb-1" name="status" id="status">
								<option value="1" <?php echo ($status == '1') ? 'selected' : ''; ?>>PENDING</option>
								<option value="2" <?php echo ($status == '2') ? 'selected' : ''; ?>>APPROVED</option>
								<option value="3" <?php echo ($status == '3') ? 'selected' : ''; ?>>CHECK AGAIN</option>
								<option value="4" <?php echo ($status == '4') ? 'selected' : ''; ?>>REJECTED</option>
							</select>
						</div>
						<input type="text" name"namefile2" id="namefile2" value="<?php echo "$folder"; ?>">
					<?php
				}
			?>
        </div>
    </div>
    <div class="customer_records_dynamic"></div>
    <!-- <a for="plusinput" type="button" class="extra-fields-customer btn btn-primary mt-3" href="#">ADD MORE</a> -->
    <br>
    <button type="button" class="btn btn-primary mt-3" onClick="validateclaim()">SUBMIT</button>
    </form>
  </div>
</div>