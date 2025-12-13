<?php
set_time_limit(0);
include('conn.php');
if (isset($_POST['syarikat'])) {
	$syarikat = $_POST['syarikat'];
}
?>
<table id="listprojek" class="display nowrap" style="width:100%">
	<thead class="bg-primary text-white">
		<tr>
			<th>No</th>
			<th>Company</th>
			<th>Name Project</th>
			<th>#</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$index = 1;
			$res = mysqli_query($conn, "SELECT * FROM `projekname` WHERE `syarikat` = '$syarikat'");
			while ($row = mysqli_fetch_assoc($res)) {
		?>
			<tr>
				<td><?php echo ($index++);?></td>
				<td><?php echo $row['syarikat'];?></td>
				<td><?php echo $row['namepro'];?></td>
				<td>
					<a href="editprojek1.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-primary"><img src="assets/images/Pencil.png" alt="" style="width: 24px; height: 24px;"></a>
					<a href="showprojek.php?idshow=<?php echo base64_encode($row['id']);?>" class="btn btn-primary"><img src="assets/images/eye.png" alt="" style="width: 24px; height: 24px;"></a>
<!--					<a href="" class="btn btn-danger"><img src="assets/images/Trash_Can.png" alt="" style="width: 24px; height: 24px;"></a>-->
				</td>
			</tr>
		<?php
			}
		?>
	</tbody>
</table>
<?php include("./components/footer.php"); ?>
<script>
    new DataTable('#listprojek', {
        scrollX: true
    });
</script>