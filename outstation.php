<?php
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$icno = base64_decode($_GET['idoutstation']);

$sql = "SELECT * FROM mra_staff where icno ='$icno'"; // SQL with parameters
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$nameoutstation = $row['name'];
$position2 = $row['position'];
$icoutstation = $row['icno'];
$phoneno = $row['phoneno'];
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Outstation</h5>
    <form name="outstation" action="attendanceaction.php" method="POST" enctype="multipart/form-data">
        <div class="customer_records">
          <div class="row mb-3">
              <label for="datestart" class="col-sm-2 col-form-label">DATE</label>
              <div class="col-sm-4">
                  <input type="date" class="form-control mb-3" id="date" name="date">
              </div>
              <label for="dateend" class="col-sm-2 col-form-label">PURPOSE</label>
              <div class="col-sm-4">
                  <input type="text" class="form-control mb-1" id="purpose" name="purpose" maxlength="255">
                  <sup><font style="color:red">*Max character 255 only including space and break</font></sup>
              </div>
              <label for="dateend" class="col-sm-2 col-form-label">DETAILS</label>
              <div class="col-sm-4">
                  <input type="text" class="form-control mb-1" id="details" name="details" maxlength="255">
                  <sup><font style="color:red">*Max character 255 only including space and break</font></sup>
              </div>
              <label for="dateend" class="col-sm-2 col-form-label">AMOUNT</label>
              <div class="col-sm-4">
                  <input type="text" class="form-control mb-1" id="amount" name="amount">
                  <sup><font style="color:red">*Without 00.00, just enter amount! eg: 25</font></sup>
              </div>
              <label for="noic" class="col-sm-2 col-form-label">NO IC</label>
              <div class="col-sm-4">
                  <input type="text" class="form-control mb-3" id="noic" name="noic" value="<?php echo $icoutstation; ?>">
              </div>
              <label for="noic" class="col-sm-2 col-form-label">NAME</label>
              <div class="col-sm-4">
                  <input type="text" class="form-control mb-3" id="name" name="name" value="<?php echo $nameoutstation; ?>">
              </div>
          </div>
        </div>
    <div class="customer_records_dynamic"></div>
    <!-- <a for="plusinput" type="button" class="extra-fields-customer btn btn-primary mt-3" href="#">ADD MORE</a> -->
    <br>
      <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="outstation" onclick="return validate()">SUBMIT</button>
    </form>
  </div>
</div>
<?php include("./components/footer.php"); ?>
<script>
    function validate() {
      form = document.createreq1;
      if (form.date.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your date!', confirmButtonColor: '#1B95CF' });
        form.date.focus();
        return false;
      }
      else if (form.purpose.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your purpose!', confirmButtonColor: '#1B95CF' });
        form.purpose.focus();
        return false;
      }
      else if (form.details.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your details!', confirmButtonColor: '#1B95CF' });
        form.details.focus();
        return false;
      }
      else if (form.amount.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your amount!', confirmButtonColor: '#1B95CF' });
        form.amount.focus();
        return false;
      }
      return true; // bagi submit terus
    }
  </script>