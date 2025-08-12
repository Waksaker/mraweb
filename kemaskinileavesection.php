<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
  </head>
  <script src="assets/js/sweetalert2.min.js"></script>
</html>
<?php
set_time_limit(0);
error_reporting(E_NOTICE);
include('/var/www/html/conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];

$id = $_GET['id'];

$sql = "SELECT * FROM mra_leave WHERE leaveid = '$id'"; // SQL with parameters
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$name2 = $row['nameapply'];
$position2 = $row['position'];
$noic = $row['noic'];
$position = $row['position'];
$dateapply = $row['datestart'];
$until = $row['dateend'];
$days = $row['daysleave'];
$purpose = $row['purpose'];
$contact = $row['contactno'];
$matter = $row['matters'];
?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Annual Leave</h5>
    <form name="kemaskinileave" action="kemaskinileaveaction.php" method="post">
        <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
        <div class="row mb-3">
          <label for="date" class="col-sm-2 col-form-label">DATE</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="dateapply" name="dateapply" value="<?php echo date("Y-m-d"); ?>">
          </div>
        </div>
        <div class="row mb-3">
          <label for="name" class="col-sm-2 col-form-label">NAME</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nameapply" name="nameapply" value="<?php echo $name2; ?>" readonly>
          </div>
        </div>
        <div class="row mb-3">
            <label for="noic" class="col-sm-2 col-form-label">IC NUMBER</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="noic" name="noic" value="<?php echo $noic; ?>" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <label for="position" class="col-sm-2 col-form-label">POSITION</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="position" name="position" value="<?php echo $position2; ?>" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <label for="datestart" class="col-sm-2 col-form-label">DATE APPLY</label>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="datestart" name="datestart" value="<?php echo $dateapply; ?>">
            </div>
            <label for="dateend" class="col-sm-2 col-form-label">UNTIL</label>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="dateend" name="dateend" value="<?php echo $until; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="days" class="col-sm-2 col-form-label">DAYS</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="daysleave" name="daysleave" readonly value="<?php echo $days; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="purpose" class="col-sm-2 col-form-label">PURPOSE</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="purpose" name="purpose" value="<?php echo $purpose; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="contactno" class="col-sm-2 col-form-label">CONTACT NO</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="contactno" name="contactno" value="<?php echo $contact; ?>" minlength="10" max="14">
            </div>
        </div>
        <div class="row mb-3">
            <label for="matter" class="col-sm-2 col-form-label">MATTERS</label>
            <div class="col-sm-10">
                <select class="form-select" id="matters" name="matters" value="<?php echo $matter; ?>">
                    <option value="ANNUAL LEAVE">ANNUAL LEAVE</option>
                    <option value="MEDICAL LEAVE">MEDICAL LEAVE</option>
                    <option value="UNPAID LEAVE">UNPAID LEAVE</option>
                    <option value="METERNITY LEAVE">METERNITY LEAVE</option>
                    <option value="HOSPITALITY LEAVE">HOSPITALITY LEAVE</option>
                    <option value="EMERGENCY LEAVE">EMERGENCY LEAVE</option>
                </select>
            </div>
        </div>
        <button type="button" class="btn btn-primary">SUBMIT</button>
      </form>
  </div>
</div>
