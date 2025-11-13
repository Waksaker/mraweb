<?php
$sql_jan = "SELECT status AS status_jan FROM `mra_claim` WHERE MONTH(apply) = '01' AND ic = '$noic' AND YEAR(apply) = '$Year_now'";
$result_jan = mysqli_query($conn, $sql_jan);
$row_jan = mysqli_fetch_assoc($result_jan) ?? ['sum_jan' => 0];

$sql_feb = "SELECT status AS status_feb FROM `mra_claim` WHERE MONTH(apply) = '02' AND ic = '$noic' AND YEAR(apply) = '$Year_now'";
$result_feb = mysqli_query($conn, $sql_feb);
$row_feb = mysqli_fetch_assoc($result_feb);

$sql_mar = "SELECT status AS status_mar FROM `mra_claim` WHERE MONTH(apply) = '03' AND ic = '$noic' AND YEAR(apply) = '$Year_now'";
$result_mar = mysqli_query($conn, $sql_mar);
$row_mar = mysqli_fetch_assoc($result_mar);

$sql_apr = "SELECT status AS status_apr FROM `mra_claim` WHERE MONTH(apply) = '04' AND ic = '$noic' AND YEAR(apply) = '$Year_now'";
$result_apr = mysqli_query($conn, $sql_apr);   
$row_apr = mysqli_fetch_assoc($result_apr);

$sql_may = "SELECT status AS status_may FROM `mra_claim` WHERE MONTH(apply) = '05' AND ic = '$noic' AND YEAR(apply) = '$Year_now'";
$result_may = mysqli_query($conn, $sql_may);   
$row_may = mysqli_fetch_assoc($result_may);

$sql_jun = "SELECT status AS status_jun FROM `mra_claim` WHERE MONTH(apply) = '06' AND ic = '$noic' AND YEAR(apply) = '$Year_now'";
$result_jun = mysqli_query($conn, $sql_jun);
$row_jun = mysqli_fetch_assoc($result_jun);

$sql_jul = "SELECT status AS status_jul FROM `mra_claim` WHERE MONTH(apply) = '07' AND ic = '$noic' AND YEAR(apply) = '$Year_now'";
$result_jul = mysqli_query($conn, $sql_jul);
$row_jul = mysqli_fetch_assoc($result_jul);

$sql_aug = "SELECT status AS status_aug FROM `mra_claim` WHERE MONTH(apply) = '08' AND ic = '$noic' AND YEAR(apply) = '$Year_now'";
$result_aug = mysqli_query($conn, $sql_aug);
$row_aug = mysqli_fetch_assoc($result_aug);

$sql_sep = "SELECT status AS status_sep FROM `mra_claim` WHERE MONTH(apply) = '09' AND ic = '$noic' AND YEAR(apply) = '$Year_now'";
$result_sep = mysqli_query($conn, $sql_sep);
$row_sep = mysqli_fetch_assoc($result_sep);

$sql_oct = "SELECT status AS status_oct FROM `mra_claim` WHERE MONTH(apply) = '10' AND ic = '$noic' AND YEAR(apply) = '$Year_now'";
$result_oct = mysqli_query($conn, $sql_oct);
$row_oct = mysqli_fetch_assoc($result_oct);

$sql_nov = "SELECT status AS status_nov FROM `mra_claim` WHERE MONTH(apply) = '11' AND ic = '$noic' AND YEAR(apply) = '$Year_now'";
$result_nov = mysqli_query($conn, $sql_nov);
$row_nov = mysqli_fetch_assoc($result_nov);

$sql_dec = "SELECT status AS status_dec FROM `mra_claim` WHERE MONTH(apply) = '12' AND ic = '$noic' AND YEAR(apply) = '$Year_now'";
$result_dec = mysqli_query($conn, $sql_dec);
$row_dec = mysqli_fetch_assoc($result_dec);
?>
<table id="claim" class="display nowrap" style="width:100%">
	<thead>
		<tr>
			<th>Month</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>JANUARY</td>
			<td>
				<?php
					if ($row_jan['status_jan'] != "" && $row_jan['status_jan'] == "1") {
						echo "<span class='badge bg-secondary'>Pending</span>";
					} elseif ($row_jan['status_jan'] != "" && $row_jan['status_jan'] == "2") {
						echo "<span class='badge bg-success'>Approved</span>";
					} elseif ($row_jan['status_jan'] != "" && $row_jan['status_jan'] == "3") {
						echo "<span class='badge bg-danger'>Rejected</span>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td>FEBRUARY</td>
			<td>
				<?php
					if ($row_feb['status_feb'] != "" && $row_feb['status_feb'] == "1") {
						echo "<span class='badge bg-secondary'>Pending</span>";
					} elseif ($row_feb['status_feb'] != "" && $row_feb['status_feb'] == "2") {
						echo "<span class='badge bg-success'>Approved</span>";
					} elseif ($row_feb['status_feb'] != "" && $row_feb['status_feb'] == "3") {
						echo "<span class='badge bg-danger'>Rejected</span>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td>MARCH</td>
			<td>
				<?php
					if ($row_mar['status_mar'] != "" && $row_mar['status_mar'] == "1") {
						echo "<span class='badge bg-secondary'>Pending</span>";
					} elseif ($row_mar['status_mar'] != "" && $row_mar['status_mar'] == "2") {
						echo "<span class='badge bg-success'>Approved</span>";
					} elseif ($row_mar['status_mar'] != "" && $row_mar['status_mar'] == "3") {
						echo "<span class='badge bg-danger'>Rejected</span>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td>APRIL</td>
			<td>
				<?php
					if ($row_apr['status_apr'] != "" && $row_apr['status_apr'] == "1") {
						echo "<span class='badge bg-secondary'>Pending</span>";
					} elseif ($row_apr['status_apr'] != "" && $row_apr['status_apr'] == "2") {
						echo "<span class='badge bg-success'>Approved</span>";
					} elseif ($row_apr['status_apr'] != "" && $row_apr['status_apr'] == "3") {
						echo "<span class='badge bg-danger'>Rejected</span>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td>MAY</td>
			<td>
				<?php
					if ($row_may['status_may'] != "" && $row_may['status_may'] == "1") {
						echo "<span class='badge bg-secondary'>Pending</span>";
					} elseif ($row_may['status_may'] != "" && $row_may['status_may'] == "2") {
						echo "<span class='badge bg-success'>Approved</span>";
					} elseif ($row_may['status_may'] != "" && $row_may['status_may'] == "3") {
						echo "<span class='badge bg-danger'>Rejected</span>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td>JUNE</td>
			<td>
				<?php
					if ($row_jun['status_jun'] != "" && $row_jun['status_jun'] == "1") {
						echo "<span class='badge bg-secondary'>Pending</span>";
					} elseif ($row_jun['status_jun'] != "" && $row_jun['status_jun'] == "2") {
						echo "<span class='badge bg-success'>Approved</span>";
					} elseif ($row_jun['status_jun'] != "" && $row_jun['status_jun'] == "3") {
						echo "<span class='badge bg-danger'>Rejected</span>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td>JULY</td>
			<td>
				<?php
					if ($row_jul['status_jul'] != "" && $row_jul['status_jul'] == "1") {
						echo "<span class='badge bg-secondary'>Pending</span>";
					} elseif ($row_jul['status_jul'] != "" && $row_jul['status_jul'] == "2") {
						echo "<span class='badge bg-success'>Approved</span>";
					} elseif ($row_jul['status_jul'] != "" && $row_jul['status_jul'] == "3") {
						echo "<span class='badge bg-danger'>Rejected</span>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td>AUGUST</td>
			<td>
				<?php
					if ($row_aug['status_aug'] != "" && $row_aug['status_aug'] == "1") {
						echo "<span class='badge bg-secondary'>Pending</span>";
					} elseif ($row_aug['status_aug'] != "" && $row_aug['status_aug'] == "2") {
						echo "<span class='badge bg-success'>Approved</span>";
					} elseif ($row_aug['status_aug'] != "" && $row_aug['status_aug'] == "3") {
						echo "<span class='badge bg-danger'>Rejected</span>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td>SEPTEMBER</td>
			<td>
				<?php
					if ($row_sep['status_sep'] != "" && $row_sep['status_sep'] == "1") {
						echo "<span class='badge bg-secondary'>Pending</span>";
					} elseif ($row_sep['status_sep'] != "" && $row_sep['status_sep'] == "2") {
						echo "<span class='badge bg-success'>Approved</span>";
					} elseif ($row_sep['status_sep'] != "" && $row_sep['status_sep'] == "3") {
						echo "<span class='badge bg-danger'>Rejected</span>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td>OCTOBER</td>
			<td>
				<?php
					if ($row_oct['status_oct'] != "" && $row_oct['status_oct'] == "1") {
						echo "<span class='badge bg-secondary'>Pending</span>";
					} elseif ($row_oct['status_oct'] != "" && $row_oct['status_oct'] == "2") {
						echo "<span class='badge bg-success'>Approved</span>";
					} elseif ($row_oct['status_oct'] != "" && $row_oct['status_oct'] == "3") {
						echo "<span class='badge bg-danger'>Rejected</span>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td>NOVEMBER</td>
			<td>
				<?php
					if ($row_nov['status_nov'] != "" && $row_nov['status_nov'] == "1") {
						echo "<span class='badge bg-secondary'>Pending</span>";
					} elseif ($row_nov['status_nov'] != "" && $row_nov['status_nov'] == "2") {
						echo "<span class='badge bg-success'>Approved</span>";
					} elseif ($row_nov['status_nov'] != "" && $row_nov['status_nov'] == "3") {
						echo "<span class='badge bg-danger'>Rejected</span>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td>DECEMBER</td>
			<td>
				<?php
					if ($row_dec['status_dec'] != "" && $row_dec['status_dec'] == "1") {
						echo "<span class='badge bg-secondary'>Pending</span>";
					} elseif ($row_dec['status_dec'] != "" && $row_dec['status_dec'] == "2") {
						echo "<span class='badge bg-success'>Approved</span>";
					} elseif ($row_dec['status_dec'] != "" && $row_dec['status_dec'] == "3") {
						echo "<span class='badge bg-danger'>Rejected</span>";
					}
				?>
			</td>
		</tr>
	</tbody>
</table>