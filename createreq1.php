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
        <form action="createreqaction.php" method="post" enctype="multipart/form-data">
            <div class="customer_records">
                <div class="row mb-3">
                    <input type="text" class="form-control mb-3" id="name" name="name" value="<?php echo $name; ?>">
                    <label for="datestart" class="col-sm-2 col-form-label">DATE :</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control mb-3" id="dateapply" name="dateapply">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">APPOINTMENT :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="appointment" name="appointment">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">DEPARTMENT :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="department" name="department">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">SUPPLIER NAME :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="supliername" name="supliername">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">SUPPLIER ADDRESS :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="suplieraddress" name="suplieraddress">
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
