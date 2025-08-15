<?php
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];

$Date_now=date('D, M d, Y H:i:s');
$Year_now = date('Y',strtotime($Date_now));
$tarikh = date('M Y',strtotime($Date_now));

$sql = "SELECT * FROM mra_staff where name = '$name'"; // SQL with parameters
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$name2 = $row['name'];
$position2 = $row['position'];
$noic = $row['icno'];
$status = $row['status'];
?>
<div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Claim</h5>
      <div align="right">
		<a href="assets/claim.xlsx" download="<?php echo "$name2"; ?>(<?php echo "$tarikh"; ?>).xlsx" class="btn btn-success py-8 fs-4 mb-4 rounded-2">Excel</a>
		<a href="applyclaim.php?id=<?php echo base64_encode($noic); ?>" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Upload Claim</a>
      </div>
      
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
					<table id="claim" class="display nowrap" style="width:100%">
						<thead class="bg-primary text-white">
							<tr>
								<th style="text-align: center;">No</th>
								<th style="text-align: center;">Name</th>
								<th style="text-align: center;">Date Apply</th>
								<th style="text-align: center;">Title</th>
								<th style="text-align: center;">Status</th>
								<th style="text-align: center;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$index = 1;
								$sql2 = "
										SELECT 
											`mra_claim`.`id` AS id,
											`mra_claim`.`apply` AS apply,
											`mra_claim`.`tajuk`AS tajuk,
											`mra_claim`.`ic`AS ic,
											`mra_claim`.`status` AS status,
											`mra_claim`.`folder` AS folder,
											`mra_staff`.`name` AS name
										FROM 
											`mra_claim`
										LEFT JOIN 
											`mra_staff`
										ON `mra_claim`.`ic` = `mra_staff`.`icno`
										WHERE `mra_claim`.`ic` = '$noic'
									";
								$result2 = mysqli_query($conn, $sql2);
								while ($row2 = mysqli_fetch_assoc($result2)) {
									$name = $row2['name'];
									$tarikh = $row2['apply'];
									$title = $row2['tajuk'];
									$status = $row2['status'];
									$folder = $row2['folder'];
									$claimid = $row2['id'];
									?>
										<tr>
											<td style="text-align: center;"><?php echo ($index++); ?></td>
											<td style="text-align: center;"><?php echo $name; ?></td>
											<td style="text-align: center;"><?php echo $tarikh; ?></td>
											<td style="text-align: center;"><?php echo $title; ?></td>
											<td style="text-align: center;">
												<?php 
													if ($status == "1") {
														echo "<span class='badge bg-secondary'>Pending</span>";
													} elseif ($status == "2") {
														echo "<span class='badge bg-success'>Approved</span>";
													} elseif ($status == "3") {
														echo "<span class='badge bg-warning'>Check Again</span>";
													} elseif ($status == "4") {
														echo "<span class='badge bg-danger'>Rejected</span>";
													}
												?>
											</td>
											<td style="text-align: center;">
												<a href="claim/<?php echo $folder; ?>" class="btn btn-primary">
													<img src="assets/images/eye.png" alt="" style="width: 24; height: 24px;">
												</a>
												<a href="editclaim.php?id=<?php echo $claimid; ?>" class="btn btn-primary">
													<img src="assets/images/Pencil.png" alt="" style="width: 24; height: 24px;">
												</a>
												<button type="button" class="btn btn-danger" onclick="test('<?php echo $claimid; ?>')" >
													<img src="assets/images/Trash_Can.png" alt="" style="width: 24px;  height: 24px;">
												</button>
											</td>
										</tr>
									<?php
								}							
							?>
						</tbody>
					</table>
                </div>
            </div>
        </div>
        <input type="hidden" name="ic" id="ic" value=<?php echo $noic; ?>>

        <div class="text-center">
			<div id="spinner-border3" class="spinner-border text-primary" role="status" style="display:none;">
				<span class="sr-only">Loading...</span>
			</div>
	    </div>

		<!-- <div id="list"></div> -->

      </div>
    </div>
</div>