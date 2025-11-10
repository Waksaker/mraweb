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
							$maklumat="
								<div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>NAME: </strong> {$row['namecreate']}<br></div>
									</div>
                                    <div style='display: flex; justify-content: space-between;'>
										<div><strong>LOCATION: </strong> {$alamat}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>QTN NO: </strong> {$row['qtnno']}</div>
									</div>
                                    <div style='display: flex; justify-content: space-between;'>
										<div><strong>DATE: </strong> {$row['date']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>PROJECT: </strong> {$row['project']}</div>
									</div>
                                    <div style='display: flex; justify-content: space-between;'>
										<div><strong>PAGE: </strong> {$row['page']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>REGISTER NO: </strong> {$row['nodaftar']}</div>
									</div>
                                    <div style='display: flex; justify-content: space-between;'>
										<div><strong>CONTRACT NO: </strong> {$row['contractno']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>SPARE PART COST: </strong> {$row['sparepartcost']}</div>
									</div>
                                    <div style='display: flex; justify-content: space-between;'>
										<div><strong>REMARKS: </strong> {$row['remarks']}</div>
									</div>
                                    <div style='display: flex; justify-content: space-between;'>
										<div><strong>STATUS MANAGER: </strong> {$statusmana}</div>
									</div>
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
							$maklumat="
								<div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>NAME: </strong> {$row['namecreate']}<br></div>
									</div>
                                    <div style='display: flex; justify-content: space-between;'>
										<div><strong>LOCATION: </strong> {$alamat}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>QTN NO: </strong> {$row['qtnno']}</div>
									</div>
                                    <div style='display: flex; justify-content: space-between;'>
										<div><strong>DATE: </strong> {$row['date']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>PROJECT: </strong> {$row['project']}</div>
									</div>
                                    <div style='display: flex; justify-content: space-between;'>
										<div><strong>PAGE: </strong> {$row['page']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>REGISTER NO: </strong> {$row['nodaftar']}</div>
									</div>
                                    <div style='display: flex; justify-content: space-between;'>
										<div><strong>CONTRACT NO: </strong> {$row['contractno']}</div>
									</div>
									<div style='display: flex; justify-content: space-between;'>
										<div><strong>SPARE PART COST: </strong> {$row['sparepartcost']}</div>
									</div>
                                    <div style='display: flex; justify-content: space-between;'>
										<div><strong>REMARKS: </strong> {$row['remarks']}</div>
									</div>
                                    <div style='display: flex; justify-content: space-between;'>
										<div><strong>STATUS MANAGER: </strong> {$statusmana}</div>
									</div>
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
        scrollX: true,
        // layout: {
        //     topStart: {
        //         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        //     }
        // }
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