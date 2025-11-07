<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<?php 
set_time_limit(0);
error_reporting(E_NOTICE);
include("conn.php");
$name = $_SESSION['name'];

$result = mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE name = '$name'");
$row = mysqli_fetch_assoc($result);
$status = $row['status'];
?>
<div class="card">
    <div class="card-body">
		<h5 class="card-title fw-semibold mb-4">Quotation</h5>
        <div align="right">
        	<a href="createquotation1.php" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Add Quotation</a>
        </div>
        <table id="tablequotation" class="display nowrap" style="width:100%">
        	<thead class="bg-primary text-white">
        		<tr>
        			<th style="text-align: center;">No</th>
        			<th style="text-align: center;">Maklumat</th>
        			<th style="text-align: center;">#</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php
				echo "$status";
					if ($status == "MANAGER") {
						$index=1;
						$result=mysqli_query($conn, "SELECT * FROM `quotation`");
						while ($row=mysqli_fetch_assoc($result)) {
							$maklumat="
								<div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>NAME: </strong> {$row['namecreate']}<br></div>
										<div><strong>LOCATION: </strong> {$row['alamat']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>QTN NO: </strong> {$row['qtnno']}</div>
										<div><strong>DATE: </strong> {$row['date']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>PAGE: </strong> {$row['pages']}</div>
										<div><strong>PROJECT: </strong> {$row['project']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>CONTRACT NO: </strong> {$row['contractno']}</div>
										<div><strong>REGISTER NO: </strong> {$row['nodaftar']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>REMARKS: </strong> {$row['remarks']}</div>
										<div><strong>SPARE PART COST: </strong> {$row['sparepartcost']}</div>
									</div>
								</div>
							";
						?>
							<tr>
								<td style="text-align: center;"><?php echo ($index++)?></td>
								<td style="text-align: center;"><?php echo $maklumat;?></td>
								<td style="text-align: center;">
									<a href="" target="_blank" class="btn btn-primary"><img src="assets/images/print.png" alt="" style="width: 24; height: 24px;"></a>
									<a href="" class="btn btn-primary">
										<img src="assets/images/Pencil.png" alt="" style="width: 24; height: 24px;">
									</a>
									<button type="button"class="btn btn-danger"onclick="">
										<img src="assets/images/Trash_Can.png" style="width:24px;height:24px;">
									</button>
								</td>
							</tr>
						<?php
						}
					} else {
						$index=1;
						$result=mysqli_query($conn, "SELECT * FROM `quotation` WHERE namecreate = '$name'");
						while ($row=mysqli_fetch_assoc($result)) {
							$maklumat="
								<div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>NAME: </strong> {$row['namecreate']}<br></div>
										<div><strong>LOCATION: </strong> {$row['alamat']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>QTN NO: </strong> {$row['qtnno']}</div>
										<div><strong>DATE: </strong> {$row['date']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>PAGE: </strong> {$row['pages']}</div>
										<div><strong>PROJECT: </strong> {$row['project']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>CONTRACT NO: </strong> {$row['contractno']}</div>
										<div><strong>REGISTER NO: </strong> {$row['nodaftar']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>REMARKS: </strong> {$row['remarks']}</div>
										<div><strong>SPARE PART COST: </strong> {$row['sparepartcost']}</div>
									</div>
								</div>
							";
							?>
								<tr>
									<td style="text-align: center;"><?php echo ($index++)?></td>
									<td style="text-align: center;"><?php echo $maklumat;?></td>
									<td style="text-align: center;">
										<a href="" target="_blank" class="btn btn-primary"><img src="assets/images/print.png" alt="" style="width: 24; height: 24px;"></a>
										<a href="" class="btn btn-primary">
											<img src="assets/images/Pencil.png" alt="" style="width: 24; height: 24px;">
										</a>
										<button type="button"class="btn btn-danger"onclick="">
											<img src="assets/images/Trash_Can.png" style="width:24px;height:24px;">
										</button>
									</td>
								</tr>
							<?php
						}
					}
        		?>
        	</tbody>
        </table>
    </div>
</div>
<?php include("./components/footer.php"); ?>
<script>
    new DataTable('#tablequotation', {
        scrollX: true,
        // layout: {
        //     topStart: {
        //         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        //     }
        // }
    });
</script>