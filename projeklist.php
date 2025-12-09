<?php
set_time_limit(0);
include('conn.php');
if (isset($_POST['syarikat'])) {
	$syarikat = $_POST['syarikat'];
}
?>
<table id="projeklist" class="display nowrap" style="width:100%">
	<tr>
		<th>No</th>
		<th>Company</th>
		<th>LPO Number</th>
		<th>Start Date</th>
		<th>Due Date</th>
		<th>Repair</th>
		<th>Payment</th>
		<th>Price</th>
		<th>Invoice</th>
		<th>Status</th>
		<th>Bil days</th>
		<th>Note</th>
	</tr>
	<tr>
		<td></td>
	</tr>
</table>
<?php include("./components/footer.php"); ?>
<script>
    new DataTable('#projeklist', {
        scrollX: true
    });
</script>