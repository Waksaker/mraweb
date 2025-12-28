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
        <table id="tablequotation" class="display" style="width:100%">
        	<thead class="bg-primary text-white">
        		<tr>
        			<th style="text-align: center;">No</th>
        			<th style="text-align: center;">Maklumat</th>
        			<th style="text-align: center;">#</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php
					if ($status == "MANAGER") {
						$index=1;
						$result=mysqli_query($conn, "SELECT * FROM `quotation`");
						while ($row=mysqli_fetch_assoc($result)) {
						    if ($row['status'] == '1') {
						        $statusmana = "<span class='badge bg-secondary'>Pending</span>";
						    } elseif ($row['status'] == '2') {
						        $statusmana = "<span class='badge bg-success'>Approved</span>";
						    } elseif ($row['status'] == '3') {
						        $statusmana = "<span class='badge bg-danger'>Rejected</span>";
						    } else {
						        $statusmana = "<span class='badge bg-dark'>Unknown</span>";
						    }
						    $alamat = $row['alamat1'] . ' ' . $row['alamat2'] . ' ' . $row['alamat3'] . ' ' . $row['alamat4'] . ' ' . $row['alamat5'];
							$maklumat = "
								<div class='quotation-card'>
									<div class='fw-bold'>{$row['project']}</div>
									<div class='text-muted small'>{$row['qtnno']} {$row['date']}</div>

									<div class='mt-1'>
										{$statusmana}
									</div>

									<details class='mt-2'>
										<summary class='text-primary'>View Details</summary>
										<div class='mt-2 small'>
											<div><b>Name:</b> {$row['namecreate']}</div>
											<div><b>Location:</b> {$alamat}</div>
											<div><b>Contract No:</b> {$row['contractno']}</div>
											<div><b>Register No:</b> {$row['nodaftar']}</div>
											<div><b>Spare Part Cost:</b> {$row['sparepartcost']}</div>
											<div><b>Remarks:</b> {$row['remarks']}</div>
										</div>
									</details>
								</div>
							";
						?>
							<tr>
								<td style="text-align: center;"><?php echo ($index++)?></td>
								<td style="text-align: center;"><?php echo $maklumat;?></td>
								<td style="text-align: center;">
									<a href="printquotation.php?id=<?php echo $row['id']; ?>" target="_blank" class="btn btn-primary"><img src="assets/images/print.png" alt="" style="width: 24; height: 24px;"></a>
									<a href="editquotation1.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-primary">
										<img src="assets/images/Pencil.png" alt="" style="width: 24; height: 24px;">
									</a>
									<button type="button"class="btn btn-danger"onclick="test('<?php echo $row['id']; ?>')">
										<img src="assets/images/Trash_Can.png" style="width:24px;height:24px;">
									</button>
								</td>
							</tr>
						<?php
						}
					} else {
						$index=1;
						$result=mysqli_query($conn, "SELECT * FROM `quotation` WHERE namecreate = '$name'");
						while ($row = mysqli_fetch_assoc($result)) {
						    if ($row['status'] == '1') {
						        $statusmana = "<span class='badge bg-secondary'>Pending</span>";
						    } elseif ($row['status'] == '2') {
						        $statusmana = "<span class='badge bg-success'>Approved</span>";
						    } elseif ($row['status'] == '3') {
						        $statusmana = "<span class='badge bg-danger'>Rejected</span>";
						    } else {
						        $statusmana = "<span class='badge bg-dark'>Unknown</span>";
						    }
						    $alamat = $row['alamat1'] . ' ' . $row['alamat2'] . ' ' . $row['alamat3'] . ' ' . $row['alamat4'] . ' ' . $row['alamat5'];
							$maklumat = "
								<div class='quotation-card'>
									<div class='fw-bold'>{$row['project']}</div>
									<div class='text-muted small'>{$row['qtnno']}</div>
									<div class='text-muted small'>{$row['date']}</div>
									<div class='mt-1'>
										{$statusmana}
									</div>

									<details class='mt-2'>
										<summary class='text-primary'>View Details</summary>
										<div class='mt-2 small'>
											<div><b>Name:</b> {$row['namecreate']}</div>
											<div><b>Location:</b> {$alamat}</div>
											<div><b>Contract No:</b> {$row['contractno']}</div>
											<div><b>Register No:</b> {$row['nodaftar']}</div>
											<div><b>Spare Part Cost:</b> {$row['sparepartcost']}</div>
											<div><b>Remarks:</b> {$row['remarks']}</div>
										</div>
									</details>
								</div>
							";
							?>
								<tr>
									<td style="text-align: center;"><?php echo ($index++)?></td>
									<td style="text-align: center;"><?php echo $maklumat;?></td>
									<td style="text-align: center;">
										<a href="printquotation.php?id=<?php echo $row['id']; ?>" target="_blank" class="btn btn-primary"><img src="assets/images/print.png" alt="" style="width: 24; height: 24px;"></a>
										<a href="editquotation1.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-primary">
											<img src="assets/images/Pencil.png" alt="" style="width: 24; height: 24px;">
										</a>
										<button type="button"class="btn btn-danger"onclick="test('<?php echo $row['id']; ?>')">
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
    responsive: {
        details: {
            type: 'column',
            target: 'tr'
        }
    },
    scrollX: false,
    pageLength: 5,
    lengthChange: false,
    autoWidth: false,
    columnDefs: [
        { targets: 0, width: "40px" },
        { targets: 2, orderable: false }
    ]
});
</script>
<script type="text/javascript">
  function test(idquotation) {
    var result = confirm("Adakah anda ingin memadam data ini?");

    if (result) {
      window.location.href = "delete.php?idquotation=" + idquotation;
    }
  }
</script>