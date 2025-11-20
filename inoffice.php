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
                    <select class="form-control" name="tahun" id="tahun"  value=''>
                        <?php
                            $Date_now=date('D, M d, Y H:i:s');
                            $Year_now = date('Y',strtotime($Date_now));
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
                <div class="col-sm-4">
                    <select class="form-control" name="bulan" id="bulan"  onChange="openPrintPage(this.value);">
                        <option value="" style="text-transform: uppercase"><?php echo 'Please Choose...' ?></option>
                        <option value='01'>JANUARY</option>
                        <option value='02'>FEBRUARY</option>
                        <option value='03'>MARCH</option>
                        <option value='04'>APRIL</option>
                        <option value='05'>MAY</option>
                        <option value='06'>JUNE</option>
                        <option value='07'>JULY</option>
                        <option value='08'>AUGUST</option>
                        <option value='09'>SEPTEMBER</option>
                        <option value='10'>OCTOBER</option>
                        <option value='11'>NOVEMBER</option>
                        <option value='12'>DECEMBER</option>
                    </select>
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
                $datetoday = date("Y-m-d");
                $result = mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE dateattan != '$datetoday'");
                if (mysqli_num_rows($result) > 0) {
            ?>
                <a href="attendanceaction.php?updatedate=<?php echo base64_encode('updatedate')?>" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Update date</a>
            <?php
                } else {
            ?>
                
            <?php
                }
            ?>
		</div>
        <table  id="office" class="display nowrap" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Position</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Time In</th>
                    <th style="text-align: center;">Time Out</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $index = 1;
                    $result = mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE status != 'MANAGER'");
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td style="text-align: center;"><?php echo ($index++);?></td>
                        <td><?php echo $row['name'] ? $row['name'] : '';?></td>
                        <td><?php echo $row['status'] ? $row['status'] : '';?></td>
                        <td style="text-align: center;">
                            <?php 
                                if ($row['statattan'] == '1') {
                                    echo "<span class='badge bg-danger'>Not present</span>";
                                } elseif ($row['statattan'] == '2') {
                                    echo "<span class='badge bg-success'>Present</span>";
                                } elseif ($row['statattan'] == '3') {
                                    echo "<span class='badge bg-success'>Outstation Present</span>";
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
                                <a href="attendanceaction.php?idpresent=<?php echo base64_encode($row['id']);?>&statusattan=<?php echo base64_encode('hadir')?>&ic=<?php echo base64_encode($row['icno']);?>" class="btn btn-danger"><img src="assets/images/clockin.png" alt="" style="width: 24px;  height: 24px;"></a>
                            <?php
                                } elseif ($row['statattan'] == '2') {
                            ?>
                                <a href="attendanceaction.php?idpresent=<?php echo base64_encode($row['id']);?>&statusattan=<?php echo base64_encode('tidak hadir')?>&ic=<?php echo base64_encode($row['icno']);?>" class="btn btn-success"><img src="assets/images/clockin.png" alt="" style="width: 24px;  height: 24px;"></a>
                            <?php
                                }
                            ?>
                            <a href="outstation.php?idoutstation=<?php echo base64_encode($row['icno']);?>" class="btn btn-primary"><img src="assets/images/travel.png" alt="" style="width: 24px;  height: 24px;"></a>   
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
	function openPrintPage(bulan) {
        tahun = $('#tahun').val();
        
        if (bulan !== "") {
            let bulanencoded = btoa(bulan);
            let tahunencoded = btoa(tahun);

            let url = "printattandance.php?bulan=" + bulanencoded + "&tahun=" + tahunencoded;

            window.open(url, "_blank");
        }
    }
	
</script>