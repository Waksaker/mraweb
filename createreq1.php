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
        <?php ?>
        <form name="createreq1" action="createreqaction.php" method="POST" enctype="multipart/form-data">
            <div class="customer_records">
                <div class="row mb-3">
                    <input type="text" class="form-control mb-3" id="name" name="name" value="<?php echo $name; ?>">
                    <label for="datestart" class="col-sm-2 col-form-label">DATE :</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control mb-3" id="dateapply" name="dateapply">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">APPOINTMENT :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="appoiment" name="appoiment">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">DEPARTMENT :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="department" name="department">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">SUPPLIER NAME :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="supplirename" name="supplirename">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">SUPPLIER ADDRESS :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="suppladderss" name="suppladderss">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">ATTENTION :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="attention" name="attention">
                    </div>
		        </div>
            </div>
            <div align="right">
                <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="createreq1">SUBMIT</button>
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
      return true; // allow submit
    }
  </script>
