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
				<a href="createreq1.php" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Create Request</a>
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
								<th style="text-align: center;">NO</th>
								<th style="text-align: center;">MAKLUMAT</th>
								<th style="text-align: center;">#</th>
							</tr>
						</thead>
						<?php
							if ($status == 'STAFF') {
								$index = 1;
								$sql = "SELECT * FROM `request` WHERE namestaff = '$name'";
								$result = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									if ($row['statusacc']=='1'){
										$statusacc = "<span class='badge bg-secondary'>Pending</span>";
									} elseif ($row['statusacc']=='2') {
										$statusacc = "<span class='badge bg-success'>Approved</span>";
									} elseif ($row['statusacc']=='3') {
										$statusacc = "<span class='badge bg-danger'>Rejected</span>";
									}

									if ($row['statusmana']=='1') {
										$statusmana = "<span class='badge bg-secondary'>Pending</span>";
									} elseif ($row['statusmana']=='2') {
										$statusmana = "<span class='badge bg-success'>Approved</span>";
									} elseif ($row['statusmana']=='3') {
										$statusmana = "<span class='badge bg-danger'>Rejected</span>";
									}

									if ($row['statusdirec']=='1') {
										$statusdirec = "<span class='badge bg-secondary'>Pending</span>";
									} elseif ($row['statusdirec']=='2') {
										$statusdirec = "<span class='badge bg-success'>Approved</span>";
									} elseif ($row['statusdirec']=='3') {
										$statusdirec = "<span class='badge bg-danger'>Rejected</span>";
									}
									$maklumat = "
										<div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>NAME: </strong> {$row['namestaff']}<br></div>
												<div><strong>DATE: </strong> {$row['dateapply']}</div>
											</div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>APPOINTMENT: </strong> {$row['appoiment']}</div>
												<div><strong>DEPARTMENT: </strong> {$row['department']}</div>
											</div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>SUPPLIER NAME: </strong> {$row['supplirename']}</div>
												<div><strong>SUPPLIER ADDRESS: </strong> {$row['suppladderss']}</div>
											</div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>ATTENTION: </strong> {$row['attention']}</div>
												<div><strong>TERMS OF PAYMENT: </strong> {$row['termpayment']}</div>
											</div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>PAY TO: </strong> {$row['payto']}</div>
												<div><strong>ACCOUNT NO: </strong> {$row['accno']}</div>
											</div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>BANK: </strong> {$row['bankname']}</div>
												<div><strong>REMARK: </strong> {$row['remark']}</div>
											</div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>STATUS MANAGER: </strong> {$statusmana}</div>
												<div><strong>STATUS ACCOUNTING: </strong> {$statusacc}</div>
											</div>
											<strong>STATUS DIRECTOR: </strong> {$statusdirec}<br>
										</div>
									";
									?>
										<tbody>
											<tr>
												<td style="text-align: center;"><?php echo ($index++); ?></td>
												<td><?php echo $maklumat; ?></td>
												<td style="text-align: center;">
													<a href="printreq.php?name=<?php echo $row['namestaff']; ?>&date=<?php echo $row['dateapply']; ?>" target="_blank" class="btn btn-primary"><img src="assets/images/print.png" alt="" style="width: 24; height: 24px;"></a>
													<a href="editreq1.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
														<img src="assets/images/Pencil.png" alt="" style="width: 24; height: 24px;">
													</a>
													<button type="button" class="btn btn-danger" onclick="test('<?php echo $row['id']; ?>')" >
														<img src="assets/images/Trash_Can.png" alt="" style="width: 24px;  height: 24px;">
													</button>
												</td>
											</tr>
										</tbody>
									<?php
								}
							} else {
								$index = 1;
								$sql = "SELECT * FROM `request`";
								$result = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									if ($row['statusacc']=='1'){
										$statusacc = "<span class='badge bg-secondary'>Pending</span>";
									} elseif ($row['statusacc']=='2') {
										$statusacc = "<span class='badge bg-success'>Approved</span>";
									} elseif ($row['statusacc']=='3') {
										$statusacc = "<span class='badge bg-danger'>Rejected</span>";
									}

									if ($row['statusmana']=='1') {
										$statusmana = "<span class='badge bg-secondary'>Pending</span>";
									} elseif ($row['statusmana']=='2') {
										$statusmana = "<span class='badge bg-success'>Approved</span>";
									} elseif ($row['statusmana']=='3') {
										$statusmana = "<span class='badge bg-danger'>Rejected</span>";
									}

									if ($row['statusdirec']=='1') {
										$statusdirec = "<span class='badge bg-secondary'>Pending</span>";
									} elseif ($row['statusdirec']=='2') {
										$statusdirec = "<span class='badge bg-success'>Approved</span>";
									} elseif ($row['statusdirec']=='3') {
										$statusdirec = "<span class='badge bg-danger'>Rejected</span>";
									}
									$maklumat = "
										<div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>NAME: </strong> {$row['namestaff']}<br></div>
												<div><strong>DATE: </strong> {$row['dateapply']}</div>
											</div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>APPOINTMENT: </strong> {$row['appoiment']}</div>
												<div><strong>DEPARTMENT: </strong> {$row['department']}</div>
											</div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>SUPPLIER NAME: </strong> {$row['supplirename']}</div>
												<div><strong>SUPPLIER ADDRESS: </strong> {$row['suppladderss']}</div>
											</div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>ATTENTION: </strong> {$row['attention']}</div>
												<div><strong>TERMS OF PAYMENT: </strong> {$row['termpayment']}</div>
											</div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>PAY TO: </strong> {$row['payto']}</div>
												<div><strong>ACCOUNT NO: </strong> {$row['accno']}</div>
											</div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>BANK: </strong> {$row['bankname']}</div>
												<div><strong>REMARK: </strong> {$row['remark']}</div>
											</div>
											<div style='display: flex; justify-content: space-between;'>
												<div><strong>STATUS MANAGER: </strong> {$statusmana}</div>
												<div><strong>STATUS ACCOUNTING: </strong> {$statusacc}</div>
											</div>
											<strong>STATUS DIRECTOR: </strong> {$statusdirec}<br>
										</div>
									";
									?>
										<tbody>
											<tr>
												<td style="text-align: center;"><?php echo ($index++); ?></td>
												<td><?php echo $maklumat; ?></td>
												<td style="text-align: center;">
												<a href="printreq.php?name=<?php echo $row['namestaff']; ?>&date=<?php echo $row['dateapply']; ?>" target="_blank" class="btn btn-primary"><img src="assets/images/print.png" alt="" style="width: 24; height: 24px;"></a>
													<a href="editreq1.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
														<img src="assets/images/Pencil.png" alt="" style="width: 24; height: 24px;">
													</a>
												</td>
											</tr>
										</tbody>
									<?php
								}
							}
						?>
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
<script type="text/javascript">
	function test(idreq) {
    	var result = confirm("Adakah anda ingin memadam data ini?");

    	if (result) {
    		window.location.href = "delete.php?idreq=" + idreq;
    	}
  	}
</script>
