<?php
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];

$Date_now=date('D, M d, Y H:i:s');
$Year_now = date('Y',strtotime($Date_now));
$tarikh = date('d M Y',strtotime($Date_now));

echo "$tarikh";

$sql = "SELECT * FROM mra_staff where name = '$name'"; // SQL with parameters
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$name2 = $row['name'];
$position2 = $row['position'];
$noic = $row['icno'];
?>
<div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Claim</h5>
      <div align="right">
		<a href="assets/claim.xlsx" download="<?php echo "$name2"; ?>(<?php echo "$tarikh"; ?>).xlsx" class="btn btn-success py-8 fs-4 mb-4 rounded-2">Download</a>
		<a href="applyclaim.php?id=<?php echo base64_encode($noic); ?>" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Upload Claim</a>
      </div>
      
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
					<table>
						<thead>
							<tr>
								<th>No</th>
								<th>Date Apply</th>
								<th>Title</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>1</td>
								<td>1</td>
								<td>1</td>
								<td>1</td>
							</tr>
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

		<div id="list"></div>

      </div>
    </div>
</div>