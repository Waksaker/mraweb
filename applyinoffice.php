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
$name3 = $row['name'];
$timein = $row['timein'];
$timeout = $row['timeout'];

$result2 = mysqli_query($conn, "SELECT * FROM `attandance` WHERE ic = '$ic' AND date = '$datetoday'");
if (mysqli_num_rows($result2) > 0) {
    $row1 = mysqli_fetch_assoc($result2);
    $reason = $row1['reason'];
    $timein = $row1['timein'];
}
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Apply in office</h5>
        <form name="applyinoffice" action="attendanceaction.php" method="POST" enctype="multipart/form-data">
            <div class="customer_records">
                <div class="row mb-3">
                    <label for="datestart" class="col-sm-2 col-form-label">DATE</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control mb-3" id="date" name="date" value="<?php echo $datetoday;?>">
                    </div>
                    <?php
                        if ($timein == "00:00:00" && $timeout == "00:00:00") {
                    ?>
                        <label for="dateend" class="col-sm-2 col-form-label">TIME IN</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-1" id="timein" name="timein" value="<?php echo $time?>">
                        </div>
                        <label for="dateend" class="col-sm-2 col-form-label" style="display: none;">TIME OUT</label>
                        <div class="col-sm-4" style="display: none;">
                            <input type="text" class="form-control mb-1" id="timeout" name="timeout" value="00:00:00">
                        </div>

                    <?php
                        } elseif ($timein != "00:00:00" && $timeout == "00:00:00") {
                    ?>
                        <label for="dateend" class="col-sm-2 col-form-label" style="display: none;">TIME IN</label>
                        <div class="col-sm-4" style="display: none;">
                            <input type="text" class="form-control mb-1" id="timein" name="timein" value="<?php echo $timein ? $timein : '';?>">
                        </div>
                        <label for="dateend" class="col-sm-2 col-form-label">TIME OUT</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-1" id="timeout" name="timeout" value="<?php echo $time?>">
                        </div>
                    <?php
                        }
                    ?>
                    
                    <label for="noic" class="col-sm-2 col-form-label">NO IC</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="noic" name="noic" value="<?php echo $ic; ?>">
                    </div>
                    <label for="noic" class="col-sm-2 col-form-label">NAME</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="name" name="name" value="<?php echo $name3; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="dateend" class="col-sm-2 col-form-label">REASON</label>
                    <div class="col-sm-4">
                        <textarea name="reason" id="reason" class="form-control mb-3"><?php echo $reason ? $reason : '';?></textarea>
                    </div>
                </div>
            </div>
            <div class="customer_records_dynamic"></div>
            <!-- <a for="plusinput" type="button" class="extra-fields-customer btn btn-primary mt-3" href="#">ADD MORE</a> -->
            <br>
            <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="applyinoffice">SUBMIT</button>
        </form>
    </div>
</div>
<?php include("./components/footer.php"); ?>