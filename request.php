<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<?php
set_time_limit(0);
error_reporting(E_NOTICE);
include("conn.php");
$name = $_SESSION['name'];
$position = $_SESSION['position'];

$result = mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE name = '$name'");
$row = mysqli_fetch_assoc($result);
$status = $row['status'];
?>
<div class="card">
	<div class="card-body">
		<h5 class="card-title fw-semibold mb-4">Request</h5>
		<div align="right">
			<?php
				if($status=='STAFF'){
			?>
				<a href="createreq.php" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Create Claim</a>
			<?php
				}
			?>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group row">
					<table id="request" class="display nowrap" style="width:100%">
						<thead class="bg-primary text-white">
							<tr>
								<th>NO</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("./components/footer.php"); ?>
<script>
	new DataTable('#request', {
		scrollX: true,
	});
</script>
