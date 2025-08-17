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