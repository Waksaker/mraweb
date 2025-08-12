<?php
set_time_limit(0);
error_reporting(E_NOTICE);
include('C:\laragon\www\mraweb\conn.php');
// include('/var/www/html/conn.php');

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
$status = $row['status'];

$nameList = []; // Simpan semua nama dalam array
$sql2 = "SELECT name FROM `mra_staff`";
$result2 = $conn->query($sql2);

while ($row2 = $result2->fetch_assoc()) {
    $nameList[] = $row2['name']; // Tambah setiap nama dalam array
}

date_default_timezone_set("Asia/Kuala_Lumpur");
$Date_now = date("H:i:s");
$tarikh = date("Y-m-d");

?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Attendance</h5>
    <form name="attendance" action="attendanceaction.php" method="post">
    <div class="customer_records">
        <div class="row mb-3">
            <label for="noic" class="col-sm-2 col-form-label">ATTENDANCE STATUS</label>
            <div class="col-sm-4">
                <select class="form-control" name="present" id="present" onchange="toggleDaysInput()">
                    <option value="" style="text-transform: uppercase">Please Choose...</option>
                    <option value="office">OFFICE</option>
                    <option value="outstation">OUTSTATION</option>
                    <option value="wfh">WORK FROM HOME</option>
                </select>
                <sup><font style="color:red">*Please Choose Attendance Status</font></sup>
            </div>
            <?php 
                if ($status == "HR STAFF") {
            ?>
                <label for="noic" class="col-sm-2 col-form-label">NAME STAFF</label>
                <div class="col-sm-4">
                    <select class="form-control" name="name_staff" id="name_staff">
                        <option value="" style="text-transform: uppercase">Please Choose...</option>
                        <?php foreach ($nameList as $name3): ?>
                            <option value="<?php echo $name3; ?>"><?php echo $name3; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <sup><font style="color:red">*Please Choose Name Staff</font></sup>
                </div>
            <?php
                } else {
            ?>
                <label for="noic" class="col-sm-2 col-form-label">NAME STAFF</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control mb-1" id="name_staff" name="name_staff" maxlength="255" value="<?php echo $name2; ?>">
                    <sup><font style="color:red">*Please Choose Name Staff</font></sup>
                </div>
            <?php
                }
            ?>
            <div class="col-sm-4" style="display: none;">
                <input type="date" class="form-control mb-3" id="date" name="date" value="<?php echo $tarikh; ?>">
            </div>
        </div>
        <br>
        <br>
        <!-- outstation -->
        <div id="outstation1" class="row mb-3" style="display: none;">
            <label for="noic" class="col-sm-2 col-form-label">DATE</label>
            <div class="col-sm-4">
                <input type="date" class="form-control mb-3" id="datestart" name="datestart">
            </div>
            <label for="dateend" class="col-sm-2 col-form-label">PURPOSE</label>
            <div class="col-sm-4">
                <input type="text" class="form-control mb-1" id="purpose_outstation" name="purpose_outstation" maxlength="255">
                <sup><font style="color:red">*Max character 255 only including space and break</font></sup>
            </div>
        </div>
        <div id="outstation2" class="row mb-3" style="display: none;">
            <label for="dateend" class="col-sm-2 col-form-label">DETAILS</label>
            <div class="col-sm-4">
                <input type="text" class="form-control mb-1" id="details_outstation" name="details_outstation" maxlength="255">
                <sup><font style="color:red">*Max character 255 only including space and break</font></sup>
            </div>
            <label for="dateend" class="col-sm-2 col-form-label">AMOUNT</label>
            <div class="col-sm-4">
                <input type="text" class="form-control mb-1" id="amount" name="amount">
                <sup><font style="color:red">*Without 00.00, just enter amount! eg: 25</font></sup>
            </div>
        </div>

        <!-- wfh -->
        <div id="datewfh" class="row mb-3" style="display: none;">
            <label for="noic" class="col-sm-2 col-form-label">DATE</label>
            <div class="col-sm-4">
                <input type="date" class="form-control mb-3" id="datesign" name="datesign">
            </div>
        </div>

        <div id="wfh2" class="row mb-3" style="display: none;">
            <label for="dateend" class="col-sm-2 col-form-label">PURPOSE</label>
            <div class="col-sm-4">
                <input type="text" class="form-control mb-1" id="purpose_wfh" name="purpose_wfh" maxlength="255">
                <sup><font style="color:red">*Max character 255 only including space and break</font></sup>
            </div>
            <label for="dateend" class="col-sm-2 col-form-label">DETAILS</label>
            <div class="col-sm-4">
                <input type="text" class="form-control mb-1" id="details_wfh" name="details_wfh" maxlength="255">
                <sup><font style="color:red">*Max character 255 only including space and break</font></sup>
            </div>
        </div>

        <!-- office -->
        <div id="inoutoffice" class="row mb-3" style="display: none">
            <label for="time" class="col-sm-2 col-form-label">IN / OUT</label>
            <div class="col-sm-4">
                <select class="form-control" name="inout" id="inout">
                    <option value="" style="text-transform: uppercase">Please Choose...</option>
                    <option value="in">IN</option>
                    <option value="out">OUT</option>
                </select>
                <sup><font style="color:red">*Please Choose</font></sup>
            </div>
		</div>
		<div id="office" class="row mb-3" style="display: none">
            <label for="time" class="col-sm-2 col-form-label">TIME</label>
            <div class="col-sm-4">
                <input type="text" class="form-control mb-3" id="timeoffice" name="timeoffice" value="<?php echo $Date_now; ?>">
            </div>
            <label for="date" class="col-sm-2 col-form-label">DATE</label>
            <div class="col-sm-4">
                <input type="text" class="form-control mb-3" id="dateoffice" name="dateoffice" value="<?php echo $tarikh; ?>">
            </div>
		</div>
    </div>
    <div class="customer_records_dynamic"></div>
    <!-- <a for="plusinput" type="button" class="extra-fields-customer btn btn-primary mt-3" href="#">ADD MORE</a> -->
    <br>
    <button type="button" class="btn btn-primary mt-3" onClick="validateattendance()">SUBMIT</button>
    </form>
  </div>
</div>