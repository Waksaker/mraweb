<?php
include("conn.php");
if (!$_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['idpresent'], $_GET['statusattan'], $_GET['ic'])) exit();
date_default_timezone_set("Asia/Kuala_Lumpur");
$datetoday = date("Y-m-d");
$time = date("H:i:s");
$idpresent = base64_decode($_GET['idpresent']);
$statusattan = base64_decode($_GET['statusattan']);
$ic = base64_decode($_GET['ic']);

$result = mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE id = '$idpresent'");
$row = mysqli_fetch_assoc($result);
$row = $row['name'];
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
        <?php echo "$idpresent";?>
        <h5 class="card-title fw-semibold mb-4">Apply in office</h5>
        <form name="outstation" action="attendanceaction.php" method="POST" enctype="multipart/form-data">
            <div class="customer_records">
                <div class="row mb-3">
                    <label for="datestart" class="col-sm-2 col-form-label">DATE</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control mb-3" id="date" name="date" value="<?php echo $datetoday;?>">
                    </div>
                    <label for="dateend" class="col-sm-2 col-form-label">TIME IN</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-1" id="time" name="time" value="<?php echo $time?>">
                    </div>
                    <label for="dateend" class="col-sm-2 col-form-label">TIME OUT</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-1" id="time" name="time" value="<?php echo $time?>">
                    </div>
                    <label for="dateend" class="col-sm-2 col-form-label">DETAIL</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-1" id="amount" name="amount">
                        <sup><font style="color:red">*Without 00.00, just enter amount! eg: 25</font></sup>
                    </div>
                    <label for="noic" class="col-sm-2 col-form-label">NO IC</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="noic" name="noic" value="<?php echo $ic; ?>">
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