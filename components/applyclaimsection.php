<?php
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];

$icno = base64_decode($_GET['id']);

$sql = "SELECT * FROM mra_staff where name = '$name' and icno ='$icno'"; // SQL with parameters
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$name2 = $row['name'];
$position2 = $row['position'];
$noic = $row['icno'];
$phoneno = $row['phoneno'];
?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Claim</h5>
    <form name="claim" action="claimaction.php" method="post"  enctype="multipart/form-data">
        <div class="customer_records">
            <div class="row mb-3">
			<label for="dateend" class="col-sm-2 col-form-label">UPLOAD FILE</label>
            <div class="col-sm-4">
				<input type="file" name="namefile" id="namefile" value="<?php echo $namefile; ?>">
                <sup><font style="color:red">*Please upload file</font></sup>
            </div>
            <label for="datestart" class="col-sm-2 col-form-label">DATE</label>
            <div class="col-sm-4">
                <input type="date" class="form-control mb-3" id="date" name="date">
            </div>
            <label for="dateend" class="col-sm-2 col-form-label">TITLE</label>
            <div class="col-sm-4">
                <input type="text" class="form-control mb-1" id="title" name="title" maxlength="255">
                <sup><font style="color:red">*Max character 255 only including space and break</font></sup>
            </div>
            <label for="noic" class="col-sm-2 col-form-label">NO IC</label>
            <div class="col-sm-4">
                <input type="text" class="form-control mb-3" id="noic" name="noic" value="<?php echo $noic; ?>">
            </div>
        </div>
    </div>
    <div class="customer_records_dynamic"></div>
    <!-- <a for="plusinput" type="button" class="extra-fields-customer btn btn-primary mt-3" href="#">ADD MORE</a> -->
    <br>
    <button type="button" class="btn btn-primary mt-3" onClick="validateclaim()">SUBMIT</button>
    </form>
  </div>
</div>
<script>
  function validateclaim() 
  {
    form = document.claim;
	if (form.namefile.value == null || form.namefile.value=="") {
		Swal.fire({
			icon: 'warning',
			text: 'Please upload in file!',
			confirmButtonColor: '#1B95CF'
		})
		form.namefile.focus();
		return;
    }
	else if (form.date.value == null || form.date.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in date!',
        confirmButtonColor: '#1B95CF'
      })
      form.date.focus();
      return;
    }
    else if (form.noic.value == null || form.noic.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Ic No!',
        confirmButtonColor: '#1B95CF'
      })
      form.noic.focus();
      return;
    }
    else 
    {
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
        form.submit();
        }
      })
    }
  }
</script>
