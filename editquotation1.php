<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<?php
if (!isset($_GET['id'])) die();
$id = base64_decode($_GET['id']);
$result=mysqli_query($conn, "SELECT *  FROM `quotation` WHERE id = '$id'");
$row=mysqli_fetch_assoc($result);
?>
<div class="card">
    <div class="card-body">
		<h5 class="card-title fw-semibold mb-4">Create Quotation</h5>
        <div align="center">
        	<h3>STEP 1</h3>
        </div>
        <br>
        <form name="editquo1" action="createquoaction.php" method="POST" enctype="multipart/form-data">
        	<div class="customer_records">
                <div class="row mb-3">
                    <input type="text" id="id" name="id" value="<?php echo $row['id'];?>" style="display:none;">
                    <input type="text" class="form-control mb-3" id="name" name="name" value="<?php echo $row['namecreate']; ?>" style="display:none;">
                    <label for="datestart" class="col-sm-2 col-form-label">LOCATION 1 :</label>
                    <div class="col-sm-4">
                        <textarea class="form-control mb-4" id="location1" name="location1" oninput="this.value = this.value.toUpperCase();"><?php echo $row['alamat1'];?></textarea>
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">LOCATION 2 :</label>
                    <div class="col-sm-4">
                        <textarea class="form-control mb-4" id="location2" name="location2" oninput="this.value = this.value.toUpperCase();"><?php echo $row['alamat2'];?></textarea>
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">LOCATION 3 :</label>
                    <div class="col-sm-4">
                        <textarea class="form-control mb-4" id="location3" name="location3" oninput="this.value = this.value.toUpperCase();"><?php echo $row['alamat3'];?></textarea>
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">LOCATION 4 :</label>
                    <div class="col-sm-4">
                        <textarea class="form-control mb-4" id="location4" name="location4" oninput="this.value = this.value.toUpperCase();"><?php echo $row['alamat4'];?></textarea>
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">LOCATION 5 :</label>
                    <div class="col-sm-4">
                        <textarea class="form-control mb-4" id="location5" name="location5" oninput="this.value = this.value.toUpperCase();"><?php echo $row['alamat5'];?></textarea>
                    </div>
		        </div>
            </div>
        	<div class="customer_records">
                <div class="row mb-3">
                    <label for="datestart" class="col-sm-2 col-form-label">QTN NO:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="qtnno" name="qtnno" value="<?php echo $row['qtnno'];?>" readonly>
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">DATE :</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control mb-3" id="date" name="date" value="<?php echo $row['date'];?>" readonly>
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">PAGE :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="page" name="page" value="<?php echo $row['page'];?>">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">PROJECT :</label>
                    <div class="col-sm-4">
                        <textarea class="form-control mb-4" id="project" name="project"><?php echo $row['project'];?></textarea>
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">CONTRACT NO :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="contractno" name="contractno" value="<?php echo $row['contractno'];?>">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">REGISTER NO :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="registerno" name="registerno" value="<?php echo $row['nodaftar'];?>">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">REMARKS :</label>
                    <div class="col-sm-4">
                        <textarea class="form-control mb-4" id="remarks" name="remarks"><?php echo $row['remarks']; ?></textarea>
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">SPARE PART COST(as attached) :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="sparepartcost" name="sparepartcost" value="<?php echo $row['sparepartcost'];?>">
                    </div>
		        </div>
            </div>
            <div align="right">
              <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="editquo1" onclick="return validate()">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php include("./components/footer.php"); ?>
<script>
    function validate() {
      form = document.editquo1;
      if (form.qtnno.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your qtn no!', confirmButtonColor: '#1B95CF' });
        form.qtnno.focus();
        return false;
      }
      else if (form.date.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your date!', confirmButtonColor: '#1B95CF' });
        form.date.focus();
        return false;
      }
      else if (form.page.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your page!', confirmButtonColor: '#1B95CF' });
        form.page.focus();
        return false;
      }
      else if (form.project.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your project!', confirmButtonColor: '#1B95CF' });
        form.project.focus();
        return false;
      }
      else if (form.contractno.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your contract no!', confirmButtonColor: '#1B95CF' });
        form.contractno.focus();
        return false;
      }
      else if (form.registerno.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your register no!', confirmButtonColor: '#1B95CF' });
        form.registerno.focus();
        return false;
      }
      else if (form.remarks.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your supplier remarks!', confirmButtonColor: '#1B95CF' });
        form.remarks.focus();
        return false;
      }
      else if (form.location.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your supplier location!', confirmButtonColor: '#1B95CF' });
        form.location.focus();
        return false;
      }
      return true; // bagi submit terus
    }
  </script>