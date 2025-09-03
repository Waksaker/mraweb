<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Create Request</h5>
        <form action="" method="" enctype="multipart/form-data">\
            <div class="customer_records">
                <div class="row mb-3">
                    <label for="datestart" class="col-sm-2 col-form-label">NAME :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="date" name="name">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">DATE :</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control mb-1" id="password" name="dateapply">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">APPOINTMENT :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-1" id="password" name="appointment">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">DEPARTMENT :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-1" id="password" name="department">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">SUPPLIER NAME :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-1" id="password" name="supliername">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">SUPPLIER ADDRESS :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-1" id="password" name="suplieraddress">
                    </div>
                    <label for="datestart" class="col-sm-2 col-form-label">ATTENTION :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-1" id="password" name="attention">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include("./components/footer.php"); ?> 