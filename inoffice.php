<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Print report attandance</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                <h1 class="col-sm-4 col-form-label">Please Choose</h1>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="date" onchange="date()">
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
		<h5 class="card-title fw-semibold mb-4">Present in office</h5>
        <div align="right">
        <?php
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $datetoday = date('Y-m-d');
            $res=mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE `dateattan` = '$datetoday'");
            if (mysqli_num_rows($res) > 0) {
                
            } else {
                echo '<a href="attendanceaction.php?updatedate=' . base64_encode("updatedate") . ' " class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Update</a>';
            }
        ?>
        </div>
        <table  id="office" class="display nowrap" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Time In</th>
                    <th style="text-align: center;">Time Out</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
                <?php 
                    $index = 1;
                    $result = mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE status != 'MANAGER'");
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td style="text-align: center;"><?php echo ($index++);?></td>
                        <td><?php echo $row['name'] ? $row['name'] : '';?></td>
                        <td style="text-align: center;">
                            <?php
                                switch ($row['statattan']) {
                                    case "1":
                                        echo "<span class='badge bg-danger'>Not present</span>";
                                        break;
                                    case "2":
                                        echo "<span class='badge bg-success'>Present</span>";
                                        break;
                                    case "3":
                                        echo "<span class='badge bg-success'>Outstation Present</span>";
                                        break;
                                    case "4":
                                        echo "<span class='badge bg-danger'>Holiday</span>";
                                        break;
                                    default:
                                        echo "NULL";
                                }
                            ?>
                        </td>
                        <td style="text-align: center;"><?php echo $row['dateattan'] ? $row['dateattan'] : 'NULL';?></td>
                        <td style="text-align: center;"><?php echo $row['timein'] ? $row['timein'] : 'NULL';?></td>
                        <td style="text-align: center;"><?php echo $row['timeout'] ? $row['timeout'] : 'NULL';?></td>
                        <td style="text-align: center;">
                            <?php
                                if ($row['statattan'] == '1') {
                            ?>
                                <a href="attendanceaction.php?idpresent=<?php echo base64_encode($row['id']);?>&statusattan=<?php echo base64_encode('masuk')?>" class="btn btn-danger"><img src="assets/images/clockin.png" alt="" style="width: 24px;  height: 24px;"></a>
                                <a href="outstation.php?idoutstation=<?php echo base64_encode($row['icno']);?>&funtion=<?php echo base64_encode('apply1');?>" class="btn btn-primary"><img src="assets/images/travel.png" alt="" style="width: 24px;  height: 24px;"></a>
                                <a href="notpresent.php?idnotpresent=<?php echo base64_encode($row['id']);?>" class="btn btn-danger"><img src="assets/images/close.png" alt="" style="width: 24px; height: 24px;"></a>
                            <?php
                                } elseif ($row['statattan'] == '2') {
                            ?>
                                <a href="attendanceaction.php?idpresent=<?php echo base64_encode($row['id']);?>&statusattan=<?php echo base64_encode('balik');?>" class="btn btn-success"><img src="assets/images/clockin.png" alt="" style="width: 24px;  height: 24px;"></a>	
                                <a href="attendanceaction.php?ic=<?php echo base64_encode($row['icno']);?>&reset=<?php echo base64_encode('resetinoffice')?>" class="btn btn-danger"><img src="assets/images/reset.png" alt="" style="width: 24px; height: 24px;"></a>
                            <?php
                                } elseif ($row['statattan'] == '3') {
                            ?>
				                <a href="attendanceaction.php?ic=<?php echo base64_encode($row['icno']);?>&reset=<?php echo base64_encode('resetoutstation')?>" class="btn btn-danger"><img src="assets/images/reset.png" alt="" style="width: 24px; height: 24px;"></a>
                            <?php
				}  elseif ($row['statattan'] == '4') {
			    ?>
				    <a href="attendanceaction.php?ic=<?php echo base64_encode($row['icno']);?>&reset=<?php echo base64_encode('resetnotpresent')?>" class="btn btn-danger"><img src="assets/images/reset.png" alt="" style="width: 24px; height: 24px;"></a>	
			    <?php
				}
                            ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include("./components/footer.php"); ?>
<script>
    new DataTable('#office', {
        scrollX: true
    });
</script>
<script>
function date() {
    let date = document.getElementById("date").value;
    if (date !== "") {
        let dateencode = btoa(date);
	let url = "printattandance.php?date=" + dateencode;
	window.open(url, "_blank");
    }
}
</script>
