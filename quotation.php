<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<style>
/* =========================
   STAFF CARD (GLOBAL)
========================= */
.quotation-card {
    font-size: 14px;
}

.quotation-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 6px 12px;
}

.quotation-grid span {
    display: block;
    font-size: 11px;
    color: #6c757d;
}

/* =========================
   ACTION BUTTONS
========================= */
.action-btns {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}

/* =========================
   MOBILE VIEW
========================= */
@media (max-width: 768px) {

    /* Buang header table */
    #tablequotation thead {
        display: none;
    }

    /* Jadikan setiap row sebagai card */
    #tablequotation tbody tr {
        display: block;
        margin-bottom: 15px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,.08);
        padding: 12px;
    }

    #tablequotation tbody td {
        display: block;
        width: 100%;
        border: none;
        padding: 4px 0;
    }

    /* No staff kecil di atas */
    #tablequotation tbody td:first-child {
        text-align: right;
        font-size: 12px;
        color: #999;
    }

    /* Maklumat staff satu column */
    .quotation-grid {
        grid-template-columns: 1fr;
    }

    /* Action button bawah & kemas */
    .action-btns {
        justify-content: space-between;
        margin-top: 10px;
    }

    .action-btns .btn {
        flex: 1;
        padding: 6px 0;
    }
}
</style>
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
									<div class='fw-bold fs-6 mb-1'>{$row['project']}</div>
									<div class='text-muted small mb-2'>{$row['qtnno']} {$row['date']}</div>
									<div class='mb-2'>{$statusmana}</div>
									<div class='staff-grid'>
										<div><b>Name:</b> {$row['namecreate']}</div>
											<div><b>Location:</b> {$alamat}</div>
											<div><b>Contract No:</b> {$row['contractno']}</div>
											<div><b>Register No:</b> {$row['nodaftar']}</div>
											<div><b>Spare Part Cost:</b> {$row['sparepartcost']}</div>
											<div><b>Remarks:</b> {$row['remarks']}</div>
									</div>
								</div>
							";
						?>
							<tr>
								<td style="text-align: center;"><?php echo ($index++)?></td>
								<td style="text-align: center;"><?php echo $maklumat;?></td>
								<td>
									<div class="action-btns">

										<a href="printquotation.php?id=<?php echo $row['id']; ?>" 
											target="_blank" class="btn btn-primary btn-sm">
											<img src="assets/images/print.png" alt="" style="width:16px;height:16px;">
										</a>

										<a href="editquotation1.php?id=<?php echo base64_encode($row['id']);?>" 
											class="btn btn-primary btn-sm">
											<img src="assets/images/Pencil.png" alt="" style="width:16px;height:16px;">
										</a>

										<button type="button" class="btn btn-danger btn-sm"
											onclick="test('<?php echo $row['id']; ?>')">
											<img src="assets/images/Trash_Can.png" alt="" style="width:16px;height:16px;">
										</button>

									</div>
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
									<div class='fw-bold fs-6 mb-1'>{$row['project']}</div>
									<div class='text-muted small mb-2'>{$row['qtnno']} {$row['date']}</div>
									<div class='mb-2'>{$statusmana}</div>
									<div class='staff-grid'>
										<div><b>Name:</b> {$row['namecreate']}</div>
											<div><b>Location:</b> {$alamat}</div>
											<div><b>Contract No:</b> {$row['contractno']}</div>
											<div><b>Register No:</b> {$row['nodaftar']}</div>
											<div><b>Spare Part Cost:</b> {$row['sparepartcost']}</div>
											<div><b>Remarks:</b> {$row['remarks']}</div>
									</div>
								</div>
							";
							?>
								<tr>
									<td style="text-align: center;"><?php echo ($index++)?></td>
									<td style="text-align: center;"><?php echo $maklumat;?></td>
									<td>
										<div class="action-btns">

											<a href="printquotation.php?id=<?php echo $row['id']; ?>" 
												target="_blank" class="btn btn-primary btn-sm">
												<img src="assets/images/print.png" alt="" style="width:16px;height:16px;">
											</a>

											<a href="editquotation1.php?id=<?php echo base64_encode($row['id']);?>" 
												class="btn btn-primary btn-sm">
												<img src="assets/images/Pencil.png" alt="" style="width:16px;height:16px;">
											</a>

											<button type="button" class="btn btn-danger btn-sm"
												onclick="test('<?php echo $row['id']; ?>')">
												<img src="assets/images/Trash_Can.png" alt="" style="width:16px;height:16px;">
											</button>

										</div>
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
    responsive: false, // MATIKAN responsive DataTables
    paging: true,
    pageLength: 5,
    lengthChange: false,
    autoWidth: false,
    ordering: true,
    searching: true,
    columnDefs: [
        { targets: 0, width: "30px" },
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