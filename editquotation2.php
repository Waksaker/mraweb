<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<?php
$name2=base64_decode($_GET['name']);
$date=base64_decode($_GET['date']);
$qtnno=base64_decode($_GET['qtnno']);

$result=mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE name = '$name'");
$row=mysqli_fetch_assoc($result);
$status=$row['status'];

$result2=mysqli_query($conn, "SELECT SUM(manhour) AS manhour FROM `list_quotation` WHERE name = '$name2' AND qtnno = '$qtnno' AND DATE(date) = '$date'");
$row2=mysqli_fetch_assoc($result2);
$manhour=$row2['manhour'];

$result3=mysqli_query($conn, "SELECT * FROM `quotation` WHERE namecreate = '$name2' AND qtnno = '$qtnno' AND DATE(date) = '$date'");
$row3=mysqli_fetch_assoc($result3);
$sparepart=$row3['sparepartcost'];
$statusmana=$row3['status'];
$maintotal=$manhour+$sparepart;
?>
<div class="card">
    <div class="card-body">
		<h5 class="card-title fw-semibold mb-4">Create Quotation</h5>
        <div align="center">
        	<h3>STEP 2</h3>
        </div>
        <br>
        <?php
            if ($status == 'MANAGER') {
        ?>
            <form name="editquo2" action="createquoaction.php" method="POST" enctype="multipart/form-data">
                <div class="customer_records">
                    <div class="row mb-3">
                        <input type="text" class="form-control mb-3" id="name" name="name" value="<?php echo ($_GET['name'] ? base64_decode($_GET['name']) : ''); ?>" style="display:none;">
                        <input type="text" class="form-control mb-3" id="date" name="date" value="<?php echo ($_GET['date'] ? base64_decode($_GET['date']) : ''); ?>" style="display:none;">
                        <input type="text" class="form-control mb-3" id="qtnno" name="qtnno" value="<?php echo ($_GET['qtnno'] ? base64_decode($_GET['qtnno']) : ''); ?>" style="display:none;">
                        <input type="text" class="form-control mb-3" id="name" name="name1" value="<?php echo ($name ? $name : ''); ?>" style="display: none;">
                        <label for="datestart" class="col-sm-2 col-form-label">TOTAL MAN HOURS :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" name="" id="" value="<?php echo $manhour; ?>">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">SPARE PART COST (as attached) :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="hours" name="hours" value="<?php echo $sparepart; ?>">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">MAIN TOTAL :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="manhour" name="manhour" value="<?php echo number_format($maintotal, 2, '.', ''); ?>">
                        </div>
                    </div>
                </div>
                <div class="customer_records">
                    <div class="row mb-3">
                        <label for="datestart" class="col-sm-2 col-form-label">YOUR OPTION :</label>
                        <div class="col-sm-4">
                            <select class="form-control mb-3" name="statmana" id="statmana">
                                <option value="">Please Choose</option>
                                <option value="1" <?php echo ($statusmana == '1') ? 'selected' : ''; ?>>PENDING</option>
                                <option value="2" <?php echo ($statusmana == '2') ? 'selected' : ''; ?>>APPROVED</option>
                                <option value="3" <?php echo ($statusmana == '3') ? 'selected' : ''; ?>>REJECTED</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div align="right">
                    <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="editquo2" onclick="return validate()">Done</button>
                </div>
            </form>
        <?php
            } else {
        ?>
            <form name="createquo2" action="createquoaction.php" method="POST" enctype="multipart/form-data">
                <div class="customer_records">
                    <div class="row mb-3">
                        <input type="text" class="form-control mb-3" id="name" name="name" value="<?php echo ($_GET['name'] ? base64_decode($_GET['name']) : ''); ?>" style="display:none;">
                        <input type="text" class="form-control mb-3" id="date" name="date" value="<?php echo ($_GET['date'] ? base64_decode($_GET['date']) : ''); ?>" style="display:none;">
                        <input type="text" class="form-control mb-3" id="qtnno" name="qtnno" value="<?php echo ($_GET['qtnno'] ? base64_decode($_GET['qtnno']) : ''); ?>" style="display:none;">
                        <label for="datestart" class="col-sm-2 col-form-label">DESCRIPTION:</label>
                        <div class="col-sm-4">
                            <textarea class="form-control mb-4" id="description" name="description"></textarea>
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">HOURS :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="hours" name="hours">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">MAN HOUR :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="manhour" name="manhour">
                        </div>
                    </div>
                </div>
                <div align="right">
                    <a href="quotation.php" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Done</a>
                    <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="createquo2" onclick="return validate()">+</button>
                </div>
            </form>
        <?php
            }
        ?>
    </div>
</div>
<div class="card">
    <div class="card-body">
		<table id="tablelistid" class="display nowrap" style="width:100%">
			<thead class="bg-primary text-white">
				<tr>
					<th style="text-align: center;">No</th>
					<th style="text-align: center;">Description</th>
					<th style="text-align: center;">Hours</th>
					<th style="text-align: center;">X</th>
					<th style="text-align: center;">Man Hour</th>
					<th style="text-align: center;">Man Hour Cost (RM)</th>
					<th style="text-align: center;">#</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				    $index = 1;
				    $date = base64_decode($_GET['date']);
				    $name = base64_decode($_GET['name']);
				    $qtnno = base64_decode($_GET['qtnno']);
				    $result=mysqli_query($conn, "SELECT * FROM `list_quotation` WHERE `qtnno` = '$qtnno' AND `name` = '$name'");
				    while ($row=mysqli_fetch_assoc($result)) {
				        ?>
    		        		<tr>
    		        			<td style="text-align: center;"><?php echo ($index++);?></td>
    		        			<td style="text-align: center;"><?php echo $row['description']?></td>
    		        			<td style="text-align: center;"><?php echo $row['hours']?></td>
    		        			<td style="text-align: center;">x</td>
    		        			<td style="text-align: center;"><?php echo $row['manhour']?></td>
    		        			<td style="text-align: center;"><?php echo $row['manhourcost']?></td>
    		        			<td style="text-align: center;">
    		        				<button type="button" class="btn btn-danger" onclick="test('<?php echo $row['id']; ?>')">
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
<?php include("./components/footer.php"); ?>
<script>
    new DataTable('#tablelistid', {
        scrollX: true,
        // layout: {
        //     topStart: {
        //         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        //     }
        // }
    });
</script>
<script>
    function validate() {
      form = document.createquo2;
      if (form.description.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your description!', confirmButtonColor: '#1B95CF' });
        form.description.focus();
        return false;
      }
      else if (form.hours.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your hours!', confirmButtonColor: '#1B95CF' });
        form.hours.focus();
        return false;
      }
      else if (form.manhour.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your man hour!', confirmButtonColor: '#1B95CF' });
        form.manhour.focus();
        return false;
      }
      else if (form.statmana.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your option!', confirmButtonColor: '#1B95CF' });
        form.statmana.focus();
        return false;
      }
      return true; // bagi submit terus
    }
</script>
<script type="text/javascript">
  function test(idcreatequo2) {
    var result = confirm("Adakah anda ingin memadam data ini?");

    if (result) {
      window.location.href = "delete.php?idcreatequo2=" + idcreatequo2;
    }
  }
</script>