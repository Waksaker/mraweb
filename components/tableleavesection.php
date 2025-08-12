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
?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Annual Leave</h5>
    <div align="right">
      <a href="applyleave.php?id=<?php echo base64_encode($noic); ?>" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Apply Leave</a>
    </div>
    <div>
      <table id="example" class="display nowrap" style="width:100%">
        <thead class="bg-primary text-white">
          <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Date Apply</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Position</th>
            <th style="text-align: center;">Date Start</th>
            <th style="text-align: center;">Date End</th>
            <th style="text-align: center;">Days</th>
            <th style="text-align: center;">Purpose</th>
            <th style="text-align: center;">#</th>
          </tr>
        </thead>
        <?php
        $index = 1;
        $sql = "SELECT * FROM mra_leave where noic = '$noic'"; // SQL with parameters
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
          $leaveid = $row['leaveid'];
          $dateapplyc = $row['dateapply'];
          $dateapply =  date('d/m/Y', strtotime($dateapplyc));
          $nameapply = $row['nameapply'];
          $noic  = $row['noic'];
          $position = $row['position'];
          $datestartc = $row['datestart'];
          $datestart =  date('d/m/Y', strtotime($datestartc));
          $dateendc = $row['dateend'];
          $dateend =  date('d/m/Y', strtotime($dateendc));
          $daysleave = $row['daysleave'];
          $purpose = $row['purpose'];
          $contactno = $row['contactno'];
          $matters = $row['matters'];

        ?>
          <tbody>
            <tr>
              <td style="text-align: center;"><?php echo ($index++); ?></td>
              <td style="text-align: center;"><?php echo $dateapply; ?></td>
              <td style="text-align: center;"><?php echo $nameapply; ?></td>
              <td style="text-align: center;"><?php echo $position; ?></td>
              <td style="text-align: center;"><?php echo $datestart; ?></td>
              <td style="text-align: center;"><?php echo $dateend; ?></td>
              <td style="text-align: center;"><?php echo $daysleave; ?></td>
              <td style="text-align: center;"><?php echo $purpose; ?></td>
              <td style="text-align: center;">
                <a href="printleave.php?id=<?php echo $leaveid; ?>" target="_blank" class="btn btn-primary"><img src="assets/images/print.png" alt="" style="width: 24; height: 24px;"></a>
                <!-- <a href="kemaskinileave.php?id=<?php echo $leaveid; ?>" class="btn btn-secondary"><img src="assets/images/Pencil.png" alt="" style="width: 24px;  height: 24px;"></a> -->
                <button type="button" onclick="test('<?php echo $leaveid; ?>')" class="btn btn-danger"><img src="assets/images/Trash_Can.png" alt="" style="width: 24px;  height: 24px;"></button>
              </td>
            </tr>
          </tbody>
        <?php } ?>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
  function test(leaveid) {
    var result = confirm("Adakah anda ingin memadam data ini?");

    if (result) {
      window.location.href = "delete.php?leaveid=" + leaveid;
    }
  }
</script>