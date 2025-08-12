<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
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
                <h3>Add Staff</h3>
            </div>
            <br>
            <form name="addstaff" method="POST" action="staffaction.php">
                <div class="customer_records">
                    <div class="row mb-3">
                        <input type="text" class="form-control mb-3" id="date" name="id" value="" style="display: none;">
                        <input type="text" class="form-control mb-3" id="fungsi" name="fungsi" value="addstaff" style="display: none;">
                        <label for="datestart" class="col-sm-2 col-form-label">NAME :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="name" name="name" value="">
                        </div>
                        <label for="dateend" class="col-sm-2 col-form-label">EMAIL :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-1" id="email" name="email" value="">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">IC :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="ic" name="ic" value="">
                        </div>
                        <label for="dateend" class="col-sm-2 col-form-label">POSITION :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-1" id="position" name="position" value="">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">PHONE NUMBER :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="number" name="number" value="">
                        </div>
                        <label for="dateend" class="col-sm-2 col-form-label">BANK NAME :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-1" id="bankname" name="bankname" value="">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">ACCOUNT NUMBER :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="account" name="account" value="">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">STATUS :</label>
                        <div class="col-sm-4">
                            <select name="status" id="status" class="form-control mb-3">
                                <option value="STAFF">STAFF</option>
                                <option value="HR STAFF">HR STAFF</option>
                            </select>
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">SYARIKAT :</label>
                        <div class="col-sm-4">
                            <select class="form-control mb-1" name="syarikat" id="syarikat">
                                <option value="">Please Choose</option>
                                <option value="MRA GLOBAL SDN BHD">MRA GLOBAL SDN BHD</option>
                                <option value="LETILICA SDN BHD">LETILICA SDN BHD</option>
                                <option value="MIM DEFENSE SDN BHD">MIM DEFENSE SDN BHD</option>
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary mt-3" onClick="submitAddStaff()">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("./components/footer.php"); ?>
<script>
function submitAddStaff() {
	const form = document.addstaff;
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