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
$status= $row['status'];
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
    <h5 class="card-title fw-semibold mb-4">Claim</h5>
    <?php
        if ($status == 'HR STAFF' || $status == 'ADMIN STAFF') {
    ?>
    <form name="applyclaim1" action="applyclaimaction.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="funcclaim" value="1" style="display: none;">
        <div class="customer_records">
            <div class="row mb-3">
                <label for="dateend" class="col-sm-2 col-form-label">NAME</label>
                <div class="col-sm-4">
                    <select name="name" id="name" class="form-control mb-1">
                        <option value="">Please choose</option>
                        <?php
                            $result=mysqli_query($conn,"SELECT * FROM `mra_staff` WHERE status != 'MANAGER'");
                            while ($row=mysqli_fetch_assoc($result)) {
                                echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="dateend" class="col-sm-2 col-form-label">DATE</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control mb-1" id="date" name="date">
                    <sup><font style="color:red">Please fill the date start</font></sup>
                </div>
                <label for="dateend" class="col-sm-2 col-form-label">PURPOSE</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control mb-1" id="purpose" name="purpose">
                    <sup><font style="color:red">Please fill the purpose</font></sup>
                </div>
                <label for="dateend" class="col-sm-2 col-form-label">DETAILS</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control mb-1" id="details" name="details">
                    <sup><font style="color:red">Please fill the details</font></sup>
                </div>
                <label for="dateend" class="col-sm-2 col-form-label">AMOUNT</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control mb-1" id="amount" name="amount">
                    <sup><font style="color:red">*Without 00.00, just enter amount! eg: 25</font></sup>
                </div>
            </div>
            <div class="row mb-3">
                <label for="dateend" class="col-sm-2 col-form-label">RESIT</label>
                <div class="col-sm-4">
                    <input type="file" class="form-control mb-1" id="resit" name="resit" onchange="previewImageResit(event)">
                    <!-- <sup><font style="color:red">Please fill the resit</font></sup> -->
                </div>
                <div class="container-img">
                    <label for="input-file" id="drop-area">
                        <div id="img-view">
                            <img alt="" id="preview-img-sign">
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <br>
        <div align="right">
            <button type="button" class="btn btn-primary mt-3" onClick="validateapplyclaim1()">SUBMIT</button>
        </div>
    </form>
    <?php
        } else {
    ?>
    <form name="applyclaim2" action="applyclaimaction.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="funcclaim" value="2" style="display: none;">
        <div class="customer_records">
            <div class="row mb-3">
                <label for="dateend" class="col-sm-2 col-form-label">DATE</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control mb-1" id="date" name="date">
                    <sup><font style="color:red">Please fill the date</font></sup>
                </div>
                <label for="dateend" class="col-sm-2 col-form-label">PURPOSE</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control mb-1" id="purpose" name="purpose" maxlength="255">
                    <sup><font style="color:red">*Max character 255 only including space and break</font></sup>
                </div>
                <label for="dateend" class="col-sm-2 col-form-label">DETAILS</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control mb-1" id="details" name="details" maxlength="255">
                    <sup><font style="color:red">*Max character 255 only including space and break</font></sup>
                </div>
                <label for="dateend" class="col-sm-2 col-form-label">AMOUNT</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control mb-1" id="amount" name="amount">
                    <sup><font style="color:red">*Without 00.00, just enter amount! eg: 25</font></sup>
                </div>
                <label for="noic" class="col-sm-2 col-form-label">NO IC</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control mb-3" id="noic" name="noic" value="<?php echo $noic; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="dateend" class="col-sm-2 col-form-label">RESIT</label>
                <div class="col-sm-4">
                    <input type="file" class="form-control mb-1" id="resit" name="resit" onchange="previewImageResit(event)">
                    <!-- <sup><font style="color:red">Please fill the resit</font></sup> -->
                </div>
                <div class="container-img">
                    <label for="input-file" id="drop-area">
                        <div id="img-view">
                            <img alt="" id="preview-img-sign">
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div class="customer_records_dynamic"></div>
        <!-- <a for="plusinput" type="button" class="extra-fields-customer btn btn-primary mt-3" href="#">ADD MORE</a> -->
        <br>
        <div align="right">
            <button type="button" class="btn btn-primary mt-3" onClick="validateapplyclaim2()">SUBMIT</button>
        </div>
    </form>
    <?php
        }
    ?>
  </div>
</div>
<script>
function previewImageResit(event) {
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
