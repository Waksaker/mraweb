<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php 
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$name = $_GET['name'];
$position = $_GET['position'];

$sql = "SELECT * FROM mra_staff WHERE name = '$name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $email = $row['email'];
        $ic = $row['icno'];
        $position = $row['position'];
        $phone = $row['phoneno'];
        $bank = $row['bank_name'];
        $acc = $row['acc_no'];
        $namefile = $row['image_sign'];
        $nameimage = $row['image_user'];
        $password = $row['password'];
        $id = $row['id'];
        $status = $row['status'];
        $syarikat = $row['syarikat'];
        $iduser = $row['id_user'];
    }
}
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
    width: 62%;
    height: 74%;
    border-radius: 23px;
    border: 2px dashed lightgrey;
    background: whitesmoke;
    background-position: center;
    background-size: cover;
    background-repeat: none;
    position: relative;
}

#img-view img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensure the image covers the area while maintaining aspect ratio */
    border-radius: 15px;
}

#img-view h3, #img-view p {
    font-size: 20px;
    font-weight: 500;
    margin-bottom: 6px;
}
</style>
<div class="container">
    <div class="row3">
        <div class="card">
            <div class="card-body">
            <div class="col">
                <h3>Information Staff</h3>
            </div>
            <br>
            <form method="POST" enctype="multipart/form-data" action="staffaction.php">
                <div class="customer_records">
                    <div class="row mb-3">
                        <input type="text" class="form-control mb-3" id="date" name="id" value="<?php echo $id; ?>" style="display: none;">
                        <input type="text" class="form-control mb-3" id="fungsi" name="fungsi" value="kemaskinistaff" style="display: none;">
                        <label for="datestart" class="col-sm-2 col-form-label">NAME :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="date" name="name" value="<?php echo $name; ?>" oninput="this.value = this.value.toUpperCase();">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">ID :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="iduser" name="iduser" value="<?php echo $iduser; ?>">
                        </div>
                        <label for="dateend" class="col-sm-2 col-form-label">EMAIL :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-1" id="purpose" name="email" value="<?php echo $email; ?>">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">IC :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="date" name="ic" value="<?php echo $ic; ?>">
                        </div>
                        <label for="dateend" class="col-sm-2 col-form-label">POSITION :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-1" id="purpose" name="position" value="<?php echo $position; ?>">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">PHONE NUMBER :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="date" name="number" value="<?php echo $phone; ?>">
                        </div>
                        <label for="dateend" class="col-sm-2 col-form-label">BANK NAME :</label>
                        <div class="col-sm-4">
                            <select class="form-control mb-1" id="bankname" name="bankname">
                                <option value="Maybank" <?php echo ($bank == 'Maybank') ? 'selected' : ''; ?>>Maybank</option>
                                <option value="CIMB" <?php echo ($bank == 'CIMB') ? 'selected' : ''; ?>>CIMB</option>
                                <option value="Public Bank" <?php echo ($bank == 'Public Bank') ? 'selected' : ''; ?>>Public Bank</option>
                                <option value="RHB Bank" <?php echo ($bank == 'RHB Bank') ? 'selected' : ''; ?>>RHB Bank</option>
                                <option value="Hong Leong Bank" <?php echo ($bank == 'Hong Leong Bank') ? 'selected' : ''; ?>>Hong Leong Bank</option>
                                <option value="AmBank" <?php echo ($bank == 'AmBank') ? 'selected' : ''; ?>>AmBank</option>
                                <option value="Bank Islam" <?php echo ($bank == 'Bank Islam') ? 'selected' : ''; ?>>Bank Islam</option>
                                <option value="Bank Rakyat" <?php echo ($bank == 'Bank Rakyat') ? 'selected' : ''; ?>>Bank Rakyat</option>
                                <option value="Affin Bank" <?php echo ($bank == 'Affin Bank') ? 'selected' : ''; ?>>Affin Bank</option>
                                <option value="Alliance Bank" <?php echo ($bank == 'Alliance Bank') ? 'selected' : ''; ?>>Alliance Bank</option>
                                <option value="HSBC Bank" <?php echo ($bank == 'HSBC Bank') ? 'selected' : ''; ?>>HSBC Bank</option>
                                <option value="OCBC Bank" <?php echo ($bank == 'OCBC Bank') ? 'selected' : ''; ?>>OCBC Bank</option>
                                <option value="Standard Chartered" <?php echo ($bank == 'Standard Chartered') ? 'selected' : ''; ?>>Standard Chartered</option>
                                <option value="UOB Bank" <?php echo ($bank == 'UOB Bank') ? 'selected' : ''; ?>>UOB Bank</option>
                                <option value="Agrobank" <?php echo ($bank == 'Agrobank') ? 'selected' : ''; ?>>Agrobank</option>
                                <option value="Bank Muamalat" <?php echo ($bank == 'Bank Muamalat') ? 'selected' : ''; ?>>Bank Muamalat</option>
                                <option value="BSN" <?php echo ($bank == 'BSN') ? 'selected' : ''; ?>>Bank Simpanan Nasional (BSN)</option>
                                <option value="Kuwait Finance House" <?php echo ($bank == 'Kuwait Finance House') ? 'selected' : ''; ?>>Kuwait Finance House</option>
                                <option value="Citybank" <?php echo ($bank == 'Citybank') ? 'selected' : ''; ?>>Citybank</option>
                            </select>
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">ACCOUNT NUMBER :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="date" name="account" value="<?php echo $acc; ?>">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">STATUS :</label>
                        <div class="col-sm-4">
							<select class="form-control mb-1" name="status" id="status">
								<option value="STAFF" <?php echo ($status == 'STAFF') ? 'selected' : ''; ?>>STAFF</option>
								<option value="HR STAFF" <?php echo ($status == 'HR STAFF') ? 'selected' : ''; ?>>HR STAFF</option>
								<option value="ADMIN STAFF" <?php echo ($status == 'ADMIN STAFF') ? 'selected' : ''; ?>>ADMIN STAFF</option>
								<option value="LEADER STAFF" <?php echo ($status == 'LEADER STAFF') ? 'selected' : ''; ?>>LEADER STAFF</option>
								<option value="MANAGER" <?php echo ($status == 'MANAGER') ? 'selected' : ''; ?>>MANAGER</option>
							</select>
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">SYARIKAT :</label>
                        <div class="col-sm-4">
                            <select class="form-control mb-1" name="syarikat" id="syarikat">
                                <option value="MRA GLOBAL SDN BHD" <?php echo ($syarikat == 'MRA GLOBAL SDN BHD') ? 'selected' : ''; ?>>MRA GLOBAL SDN BHD</option>
                                <option value="LETILICA SDN BHD" <?php echo ($syarikat == 'LETILICA SDN BHD') ? 'selected' : ''; ?>>LETILICA SDN BHD</option>
                                <option value="MIM DEFENSE SDN BHD" <?php echo ($syarikat == 'MIM DEFENSE SDN BHD') ? 'selected' : ''; ?>>MIM DEFENSE SDN BHD</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" onClick="kemaskinistaff()">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function kemaskinistaff() {
	form = document.leave;
	if (form.name.value == null || form.name.value == "") {
		Swal.fire({
            icon: 'warning',
            text: 'Please fill in Date!',
            confirmButtonColor: '#1B95CF'
        })
        form.name.focus();
        return;
	} else if (form.email.value == null || form.email.value == "") {
		Swal.fire({
            icon: 'warning',
            text: 'Please fill in Date!',
            confirmButtonColor: '#1B95CF'
        })
        form.email.focus();
        return;
	} else if (form.ic.value == null || form.ic.value == "") {
		Swal.fire({
            icon: 'warning',
            text: 'Please fill in Date!',
            confirmButtonColor: '#1B95CF'
        })
        form.ic.focus();
        return;
	} else if (form.position.value == null || form.position.value == "") {
		Swal.fire({
            icon: 'warning',
            text: 'Please fill in Date!',
            confirmButtonColor: '#1B95CF'
        })
        form.position.focus();
        return;
	} else if (form.number.value == null || form.number.value == "") {
		Swal.fire({
            icon: 'warning',
            text: 'Please fill in Date!',
            confirmButtonColor: '#1B95CF'
        })
        form.number.focus();
        return;
	} else if (form.bankname.value == null || form.bankname.value == "") {
		Swal.fire({
            icon: 'warning',
            text: 'Please fill in Date!',
            confirmButtonColor: '#1B95CF'
        })
        form.bankname.focus();
        return;
	} else if (form.account.value == null || form.account.value == "") {
		Swal.fire({
            icon: 'warning',
            text: 'Please fill in Date!',
            confirmButtonColor: '#1B95CF'
        })
        form.bankname.focus();
        return;
	} else if (form.status.value == null || form.status.value == "") {
		Swal.fire({
            icon: 'warning',
            text: 'Please fill in Date!',
            confirmButtonColor: '#1B95CF'
        })
        form.status.focus();
        return;
	} else if (form.syarikat.value == null || form.syarikat.value == "") {
		Swal.fire({
            icon: 'warning',
            text: 'Please fill in Date!',
            confirmButtonColor: '#1B95CF'
        })
        form.syarikat.focus();
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
          form.submit();
        }
      })
	}
}
</script>
<?php include("./components/footer.php"); ?> 
