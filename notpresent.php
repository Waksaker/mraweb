<?php
include('conn.php');
if(!isset($_GET['idnotpresent'])) exit();
date_default_timezone_set('Asia/Kuala_Lumpur');
$idnotpresent=base64_decode($_GET['idnotpresent']);
$datetoday = date("Y-m-d");
$result=mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE id = '$idnotpresent'");
$row=mysqli_fetch_assoc($result);
$name1=$row['name'];
$icno1=$row['icno'];
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
	<h5 class="card-title fw-semibold mb-4">Not present</h5>
	<form action="attendanceaction.php" method="POST">
	    <input type="text" name="notpresent" style="display: none;">
	    <div class="customer_records">
		<div class="row mb-3">
		    <label class="col-sm-2 col-form-label">DATE</label>
		    <div class="col-sm-4">
		        <input type="date" class="form-control mb-1" id="date" name="date" value="<?php echo $datetoday;?>">
		    </div>
		    <label class="col-sm-2 col-form-label">NAME</label>
		    <div class="col-sm-4">
		        <input type="text" class="form-control mb-3" name="name" id="name" value="<?php echo $name1;?>">
		    </div>
		    <label class="col-sm-2 col-form-label">IC</label>
		    <div class="col-sm-4">
		        <input type="text" class="form-control mb-3" id="ic" name="ic" value="<?php echo $icno1;?>">
		    </div>
		    <label class="col-sm-2 col-form-label">MATTERS</label>
		    <div class="col-sm-4">
			<select class="form-control mb-3" id="matter" name="matter">
			    <option value="">Please choose</option>
			    <option value="ANNUAL LEAVE">ANNUAL LEAVE</option>
			    <option value="MEDICAL LEAVE">MEDICAL LEAVE</option>
			    <option value="UNPAID LEAVE">UNPAID LEAVE</option>
			    <option value="METERNITY LEAVE">METERNITY LEAVE</option>
			    <option value="HOSPITALITY LEAVE">HOSPITALITY LEAVE</option>
			    <option VALUE="EMERGENCY LEAVE">EMERGENCY LEAVE</option>
			    <option value="OTHERS">OTHERS</option>
		        </select>
		    </div>
		    <label class="col-sm-2 col-form-label">REASON</label>
		    <div class="col-sm-4">
		        <textarea class="form-control mb-3" name="reason" id="reason"></textarea>
		    </div>
		</div>
	    </div>

	    <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">SUBMIT</button>
	</form>
    </div>
</div>
