<?php
if (!isset($_GET['func'])) exit('Not status');
$func = base64_decode($_GET['func']);
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card ">
	<div class="card-body">
	<div class="col">
		<h5 class="card-title fw-semibold mb-4">Apply Job</h5>
	</div>
	<div align="center">
		<h3>STEP 1</h3>
	</div>
	<br>
	<?php
		$res = mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE name = '$name'");
		$r=mysqli_fetch_assoc($res);
		$ic=$r['icno'];
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date=date("Y/m/d");
		if ($func == 'apply') {
	?>
		<form name="applyprojek1" action="projekaction.php" method="POST">
			<input type="text" name="apply" id="apply" value="apply1" style="display: none;">
			<div class="customer_records">
				<div class="row mb-3">
					<label for="" class="col-sm-2 col-form-label">NAME CREATE :</label>
					<div class="col-sm-4">
						<input class="form-control mb-3" type="text" name="namecreate" id="namecreate" value="<?php echo $name;?>" readonly>
					</div>
					<label for="" class="col-sm-2 col-form-label">IC :</label>
					<div class="col-sm-4">
						<input type="text" name="ic" id="ic" class="form-control mb-3" value="<?php echo $ic;?>" readonly>
					</div>
					<label for="" class="col-sm-2 col-form-label">DATE :</label>
					<div class="col-sm-4">
						<input type="text" class="form-control mb-3" name="date" id="date" value="<?php echo $date;?>" readonly>
					</div>
				</div>
				<div class="row mb-3">
					<label for="" class="col-sm-2 col-form-label">COMPANY :</label>
                        <div class="col-sm-4">
                            <select class="form-control mb-1" name="syarikat" id="syarikat">
                                <option value="">Please Choose</option>
                                <option value="MRA GLOBAL SDN BHD">MRA GLOBAL SDN BHD</option>
                                <option value="LETILICA SDN BHD">LETILICA SDN BHD</option>
                                <option value="MIM DEFENSE SDN BHD">MIM DEFENSE SDN BHD</option>
                            </select>
                        </div>
					<label for="" class="col-sm-2 col-form-label">NAME PROJECT :</label>
					<div class="col-sm-4">
						<input type="text" name="namepro" id="namepro" class="form-control mb-3">
					</div>
				</div>
			</div>
			<div align="right">
				<button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="" onclick="return validate1()">SUBMIT</button>
            </div>
		</form>
	<?php
		}
	?>
</div>
<?php include("./components/footer.php"); ?>
<script>
	function validate1() {
		const form1 = document.applyprojek1;
		
		if(form1.namepro.value == null || form1.namepro.value == ""){
			Swal.fire({
				icon: 'warning',
				text: 'Please fill in name project!',
				confirmButtonColor: '#1B95CF'
			})
			form1.namepro.focus();
			return false;
		} else {
			Swal.fire({
				text: "Please make sure everything is correct!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: '#1B95CF',
				cancelButtonColor: '#BF000E',
				confirmButtonText: 'Yes',
				cancelButtonText: 'No',
				reverseButtons: true,
			}).then((result) => {
				if (result.isConfirmed) {
					form1.submit();  // ✔ BETUL
				}
			})
		}
		return false;
	}
</script>