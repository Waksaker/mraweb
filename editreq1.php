<?php
include('conn.php');
if (!isset($_GET['id'])) exit();
$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM `request` WHERE id = '$id'");
$row = mysqli_fetch_assoc($res);
$id = $row['id'];
$name_staff = $row['namestaff'];
$date = $row['dateapply'];
$appoiment = $row['appoiment'];
$department = $row['department'];
$supplirename = $row['supplirename'];
$suppladderss = $row['suppladderss'];
$attention = $row['attention'];
$refno=$row['refno'];
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Create Request</h5>
        <div align="center">
            <h3>STEP 1</h3>
        </div>
        <br>
        <form name="createreq1" action="createreqaction.php" method="POST" enctype="multipart/form-data">
            <div class="customer_records">
                <div class="row mb-3">
                    <input type="text" class="form-control mb-3" id="id" name="id" value="<?php echo $id; ?>" style="display: none;">
                    <input type="text" class="form-control mb-3" id="name" name="name" value="<?php echo $name_staff; ?>" style="display: none;">
                    <label for="datestart" class="col-sm-2 col-form-label">REF NO</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="refno" name="refno" value="<?php echo $refno;?>">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">DATE :</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control mb-3" id="dateapply" name="dateapply" value="<?php echo $date; ?>">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">APPOINTMENT :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="appoinment" name="appoinment" value="<?php echo $appoiment; ?>">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">DEPARTMENT :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="department" name="department" value="<?php echo $department; ?>">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">SUPPLIER NAME :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="supplirename" name="supplirename" value="<?php echo $supplirename; ?>">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">SUPPLIER ADDRESS :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="suppladderss" name="suppladderss" value="<?php echo $suppladderss; ?>">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">ATTENTION :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="attention" name="attention" value="<?php echo $attention; ?>">
                    </div>
                </div>
            </div>
            <div align="right">
              <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="editreq1" onclick="return validate()">SUBMIT</button>
            </div>
        </form>
    </div>
</div>
<?php include("./components/footer.php"); ?>
<script>
    function validate() {
      form = document.createreq1;
      if (form.name.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your name!', confirmButtonColor: '#1B95CF' });
        form.name.focus();
        return false;
      }
      else if (form.dateapply.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your date!', confirmButtonColor: '#1B95CF' });
        form.dateapply.focus();
        return false;
      }
      else if (form.appoiment.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your appointment!', confirmButtonColor: '#1B95CF' });
        form.appoiment.focus();
        return false;
      }
      else if (form.department.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your department!', confirmButtonColor: '#1B95CF' });
        form.department.focus();
        return false;
      }
      else if (form.supplirename.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your supplier name!', confirmButtonColor: '#1B95CF' });
        form.supplirename.focus();
        return false;
      }
      else if (form.suppladderss.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your supplier address!', confirmButtonColor: '#1B95CF' });
        form.suppladderss.focus();
        return false;
      }
      else if (form.attention.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your attention!', confirmButtonColor: '#1B95CF' });
        form.attention.focus();
        return false;
      }
      return true; // bagi submit terus
    }
  </script>
