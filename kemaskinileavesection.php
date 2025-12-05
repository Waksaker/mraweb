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
include('conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];

$id = $_GET['id'];

$sql = "SELECT * FROM mra_leave WHERE leaveid = '$id'"; // SQL with parameters
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$name2 = $row['nameapply'];
$position2 = $row['position'];
$noic = $row['noic'];
$dateapply = $row['datestart'];
$until = $row['dateend'];
$days = $row['daysleave'];
$purpose = $row['purpose'];
$contact = $row['contactno'];
$matter = $row['matters'];
$statsupport = $row['statsupport'];
$statapprove = $row['statapprove'];
$mc=$row['mc'];

$result2 = mysqli_query($conn, "SELECT status AS statusstaff FROM `mra_staff` WHERE name = '$name'");
$row2 = mysqli_fetch_assoc($result2);
$statusstaff = $row2['statusstaff'];
?>
<style>
.container-img {
    display: flex;
    width: 100%;
    text-align: center;
    /* align-content: center;
    justify-content: center; */
    align-items: center;
}

#drop-area {
    width: 500px;
    height: 300px;
    background: white;
    border-radius: 15px;
    margin-bottom: 30px;
    padding: 30px;
}

#img-view {
    width: 100%;
    height: 100%;
    border-radius: 23px;
    border: 2px dashed lightgrey;
    background: whitesmoke;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden; /* penting untuk elak overflow image */
}

#img-view img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain; /* atau 'cover' jika nak penuh */
    border-radius: 15px;
}

#img-view h3, #img-view p {
    font-size: 20px;
    font-weight: 500;
    margin-bottom: 6px;
}
</style>
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Annual Leave</h5>
    <form name="kemaskinileave" action="kemaskinileaveaction.php" method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
        <input type="text" name="name" value="<?php echo $name; ?>" style="display: none;">
        <div class="row mb-3">
          <label for="date" class="col-sm-2 col-form-label">DATE</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="dateapply" name="dateapply" value="<?php echo date("Y-m-d"); ?>">
          </div>
        </div>
        <div class="row mb-3">
          <label for="name" class="col-sm-2 col-form-label">NAME</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nameapply" name="nameapply" value="<?php echo $name2; ?>">
          </div>
        </div>
        <div class="row mb-3">
            <label for="noic" class="col-sm-2 col-form-label">IC NUMBER</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="noic" name="noic" value="<?php echo $noic; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="position" class="col-sm-2 col-form-label">POSITION</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="position" name="position" value="<?php echo $position2; ?>">
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
              <input type="text" class="form-control" id="daysleave" name="daysleave" value="<?php echo $days; ?>">
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
            <div class="col-sm-4">
                <select class="form-select form-control mb-1" id="matters" name="matters">
              		<option value="ANNUAL LEAVE" <?php echo ($matter == 'ANNUAL LEAVE') ? 'selected' : '';?>>ANNUAL LEAVE</option>
              		<option value="MEDICAL LEAVE" <?php echo ($matter == 'MEDICAL LEAVE') ? 'selected' : '';?>>MEDICAL LEAVE</option>
              		<option value="UNPAID LEAVE" <?php echo ($matter == 'UNPAID LEAVE') ? 'selected' : '';?>>UNPAID LEAVE</option>
              		<option value="METERNITY LEAVE" <?php echo ($matter == 'METERNITY LEAVE') ? 'selected' : '';?>>METERNITY LEAVE</option>
              		<option value="HOSPITALITY LEAVE" <?php echo ($matter == 'HOSPITALITY LEAVE') ? 'selected' : '';?>>HOSPITALITY LEAVE</option>
              		<option value="EMERGENCY LEAVE" <?php echo ($matter == 'EMERGENCY LEAVE') ? 'selected' : ''; ?>>EMERGENCY LEAVE</option>
                </select>
            </div>
        </div>
        <?php
          if ($statusstaff == 'ADMIN STAFF' || $statusstaff == 'HR STAFF' || $statusstaff == 'STAFF') {
        ?>
          <div class="row mb-3" style="display: none;">
            <label for="noic" class="col-sm-2 col-form-label">STATUS</label>
            <div class="col-sm-4">
              <select class="form-select form-control mb-1" name="statusleave" id="statusleave">
                <option value="1">PENDING</option>
                <option value="2">APPROVED</option>
                <option value="3">CHECK AGAIN</option>
                <option value="4">REJECTED</option>
              </select>
            </div>
          </div>
          <?php
            if ($matter == 'MEDICAL LEAVE') {
          ?>
            <div class="row mb-3">
              <label for="dateend" class="col-sm-2 col-form-label">MC</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control mb-1" id="mc" name="mc" onchange="previewImageMc(event)">
                  <input type="text" name="mc1" value="<?php echo $mc; ?>" style="display: none;">
                  <sup><font style="color:red">Please fill the resit</font></sup>
                </div>
                <div class="container-img">
                  <label for="input-file" id="drop-area">
                      <div id="img-view">
                        <?php 
                        if ($mc!="") {
                           echo '<img src="./mc/' . $mc . '" alt="" id="preview-img-sign">';
                        } else {
                           echo '<img alt="" id="preview-img-sign">';
                        }
                        ?>
                      </div>
                  </label>
                </div>
            </div>
          <?php
            }
          ?>
        <?php
          } elseif ($statusstaff == 'LEADER STAFF' || $statusstaff == 'MANAGER') {
        ?>
          <div class="row mb-3">
            <label for="noic" class="col-sm-2 col-form-label">STATUS</label>
            <div class="col-sm-4">
              <select class="form-select form-control mb-1" name="statusleave" id="statusleave">
      	      <option value="1" <?php echo ($statsupport == '1' && $statapprove == '1') ? 'selected' : '';?>>PENDING</option>
      	      <option value="2" <?php echo ($statsupport == '2' && $statapprove == '2') ? 'selected' : '';?>>APPROVED</option>
      	      <option value="3" <?php echo ($statsupport == '3' && $statapprove == '3') ? 'selected' : '';?>>CHECK AGAIN</option>
      	      <option value="4" <?php echo ($statsupport == '4' && $statapprove == '4') ? 'selected' : '';?>>REJECTED</option>
              </select>
            </div>
          </div>
        <?php
          }
        ?>
        <button type="button" class="btn btn-primary" onClick="validateleave()">SUBMIT</button>
        <!-- <input type="submit" value="SUBMIT" class="btn btn-primary"> -->
      </form>
  </div>
</div>
<script>
  function validateleave() 
  {
    kemaskinileave = document.kemaskinileave;
    if	(kemaskinileave.statusleave.value == null || kemaskinileave.statusleave.value=="") {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in status!',
        confirmButtonColor: '#1B95CF'
      })
      kemaskinileave.statusleave.focus();
      return;
    } else {
      swal.fire({
      text: "Please make sure everything is correct!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#1B95CF',
      cancelButtonColor: '#BF000E',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No',
      reverseButtons: true,
      }).then((result) => {
        if (result.isConfirmed) {
        kemaskinileave.submit();
        }
      })
    }
  }
</script>
<script>
function previewImageMc(event) {
    const input = event.target;
    const preview = document.getElementById('preview-img-sign');


    // Check if a file was selected
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        // Once the image is read, set it as the source of the preview image
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; // Show the image

            // Hide the text and subtext once the image is displayed
            // uploadText.style.display = 'none';
            // uploadSubtext.style.display = 'none';
        }

        // Read the image file as a data URL
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
