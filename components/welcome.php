<?php 
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];

$sql = "SELECT * FROM mra_staff where name = '$name'"; // SQL with parameters
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$name2 = $row['name'];
$position2 = $row['position'];
$noic = $row['icno'];
$Date_now=date('D, M d, Y H:i:s');
$Year_now = date('Y',strtotime($Date_now));
$sql_annual = "SELECT count(*) as annual FROM `mra_leave` WHERE noic = '$noic' AND matters = 'ANNUAL LEAVE'";
$result_annual = mysqli_query($conn, $sql_annual);
$row_annual = mysqli_fetch_assoc($result_annual);

$sql_medical = "SELECT count(*) as medical FROM `mra_leave` WHERE noic = '$noic' AND matters = 'MEDICAL LEAVE'";
$result_medical = mysqli_query($conn, $sql_medical);
$row_medical = mysqli_fetch_assoc($result_medical);

$sql_unpaid = "SELECT count(*) as unpaid FROM `mra_leave` WHERE noic = '$noic' AND matters = 'UNPAID LEAVE'";
$result_unpaid = mysqli_query($conn, $sql_unpaid);
$row_unpaid = mysqli_fetch_assoc($result_unpaid);

$sql_meternity = "SELECT count(*) as meternity FROM `mra_leave` WHERE noic = '$noic' AND matters = 'METERNITY LEAVE'";
$result_meternity = mysqli_query($conn, $sql_meternity);
$row_meternity = mysqli_fetch_assoc($result_meternity);

$sql_hospi = "SELECT count(*) as hospi FROM `mra_leave` WHERE noic = '$noic' AND matters = 'HOSPITALITY LEAVE'";
$result_hospi = mysqli_query($conn, $sql_hospi);
$row_hospi = mysqli_fetch_assoc($result_hospi);

$sql_emer = "SELECT count(*) as emer FROM `mra_leave` WHERE noic = '$noic' AND matters = 'EMERGENCY LEAVE'";
$result_emer = mysqli_query($conn, $sql_emer);
$row_emer = mysqli_fetch_assoc($result_emer);
?>
<div class="card">
    <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Hi, <?php echo $name; ?></h5>
    <p class="mb-0"><?php echo $position; ?></p>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List of Total of Each Leave</h5>
        <br>
        <table id="example" class="display nowrap" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Name Leave</th>
                    <th style="text-align: center;">Total Apply</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <td style="text-align: center;">1</td>
                    <td style="text-align: center;">ANNUAL LEAVE</td>
                    <td style="text-align: center;"><?php echo $row_annual['annual']; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">2</td>
                    <td style="text-align: center;">MEDICAL LEAVE</td>
                    <td style="text-align: center;"><?php echo $row_medical['medical']; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">3</td>
                    <td style="text-align: center;">UNPAID LEAVE</td>
                    <td style="text-align: center;"><?php echo $row_unpaid['unpaid']; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">4</td>
                    <td style="text-align: center;">METERNITY LEAVE</td>
                    <td style="text-align: center;"><?php echo $row_meternity['meternity']; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">5</td>
                    <td style="text-align: center;">HOSPITALITY LEAVE</td>
                    <td style="text-align: center;"><?php echo $row_hospi['hospi']; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">6</td>
                    <td style="text-align: center;">EMERGENCY LEAVE</td>
                    <td style="text-align: center;"><?php echo $row_emer['emer']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List total of each claim every month</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <h1 class="col-sm-4 col-form-label">Please Choose</h1>
                    <div class="col-sm-4">
                        <select class="form-control" name="tahun" id="tahun"  value='' onChange="getClaim(this.value,<?php echo $noic;?>); ">
                            <option value="" style="text-transform: uppercase"><?php echo 'Please Choose...' ?></option>
                            <?php  
                                $tahunmin = $Year_now;
                                $tahunmax = 2024;

                                while ($tahunmin >= $tahunmax)
                                {
                                    echo "<option value='".$tahunmin."'".$s.">".$tahunmin."</option>";
                                    $tahunmin--;
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="ic" id="ic" value=<?php echo $noic; ?>>
        <div class="text-center">
        	<div id="spinner-border3" class="spinner-border text-primary" role="status" style="display:none;">
        		<span class="sr-only">Loading...</span>
        	</div>
        </div>

        <div id="listclaim"></div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List Request of Staff</h5>
        <table id="request" class="display nowrap" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Appointment</th>
                    <th style="text-align: center;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $index = 1;
                    $sql_request = "SELECT * FROM `request` WHERE namestaff = '$name2'";
                    $result_request = mysqli_query($conn, $sql_request);
                    while ($row_request = mysqli_fetch_assoc($result_request)) {
                ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $index++; ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($row_request['namestaff']); ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($row_request['dateapply']); ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($row_request['appoiment']); ?></td>
                        <td style="text-align: center;">
                            <?php
                                if ($row_request['statusacc']=='1'){
                                    $statusacc = "<span class='badge bg-secondary'>Pending</span>";
                                } elseif ($row_request['statusacc']=='2') {
                                    $statusacc = "<span class='badge bg-success'>Approved</span>";
                                } elseif ($row_request['statusacc']=='3') {
                                    $statusacc = "<span class='badge bg-danger'>Rejected</span>";
                                }

                                if ($row_request['statusmana']=='1') {
                                    $statusmana = "<span class='badge bg-secondary'>Pending</span>";
                                } elseif ($row_request['statusmana']=='2') {
                                    $statusmana = "<span class='badge bg-success'>Approved</span>";
                                } elseif ($row_request['statusmana']=='3') {
                                    $statusmana = "<span class='badge bg-danger'>Rejected</span>";
                                }

                                if ($row_request['statusdirec']=='1') {
                                    $statusdirec = "<span class='badge bg-secondary'>Pending</span>";
                                } elseif ($row_request['statusdirec']=='2') {
                                    $statusdirec = "<span class='badge bg-success'>Approved</span>";
                                } elseif ($row_request['statusdirec']=='3') {
                                    $statusdirec = "<span class='badge bg-danger'>Rejected</span>";
                                }
                                
                                $status = "
                                    <div>
                                        <div style='display: flex; justify-content: space-between;'>
                                            <div><strong>Manager: </strong> {$statusmana}<br></div>
                                        </div>
                                        <div style='display: flex; justify-content: space-between;'>
                                            <div><strong>Accounting: </strong> {$statusacc}</div>
                                        </div>
                                        <div style='display: flex; justify-content: space-between;'>
                                            <div><strong>Director: </strong> {$statusdirec}</div>
                                        </div>
                                    </div>
                                ";
                            ?>
                            <?php echo $status; ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

    </div>
</div>
