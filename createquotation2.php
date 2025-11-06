<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
		<h5 class="card-title fw-semibold mb-4">Create Quotation</h5>
        <div align="center">
        	<h3>STEP 2</h3>
        </div>
        <br>
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