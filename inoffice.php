<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
		<h5 class="card-title fw-semibold mb-4">Present in office</h5>
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