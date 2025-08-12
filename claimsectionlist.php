<?php
set_time_limit(0);
//error_reporting(E_NOTICE);
include('conn.php');

$year = $_POST['tahun'];
$month = $_POST['bulan'];
$noic = $_POST['ic'];

?>
<div class="mt-3" align="right">
    <a href="printclaim1.php?id=<?php echo base64_encode($noic); ?>&month=<?php echo $month; ?>&year=<?php echo $year; ?>" target="_blank" class="btn btn-primary"><img src="assets/images/print.png" alt="" style="width: 24px; height: 24;"></a>
    <button href="" class="btn btn-warning" onclick="test('<?php echo $month; ?>')">Delete All</button>
</div>
<table id="claim" class="display nowrap" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Date</th>
            <th style="text-align: center;">Purpose</th>
            <th style="text-align: center;">Details</th>
            <th style="text-align: center;">Amounts</th>
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
    <?php
    $index = 1;
    $sql = "SELECT * FROM mra_staff, mra_claims where icno = '$noic' and icno = noic and YEAR(date) = $year AND MONTH(date) = $month"; // SQL with parameters
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $id = $row['id'];
        $datec = $row['date'];
        $date =  date('d/m/Y', strtotime($datec));
        $noic2  = $row['noic'];
        $purpose = $row['purpose'];
        $details = $row['details'];
        $amount = $row['amount'];
        $name  = $row['name'];
    
    ?>
    <tbody>
        <tr>
            <td style="text-align: center;"><?php echo ($index++); ?></td>
            <td style="text-align: center;"><?php echo $name; ?></td>
            <td style="text-align: center;"><?php echo $date; ?></td>
            <td style="text-align: center;"><?php echo $purpose; ?></td>
            <td style="text-align: center;"><?php echo $details; ?></td>
            <td style="text-align: center;"><?php echo $amount; ?></td>
            <td style="text-align: center;"><button class="btn btn-danger" onclick="test1('<?php echo $id; ?>')"><img src="assets/images/Trash_Can.png" alt="" style="width: 24px; height: 24px;"></button></td>
        </tr>
    </tbody>
    <?php } ?>
</table>

<script>
    new DataTable('#claim', {
        scrollX: true,
        // layout: {
        //     topStart: {
        //         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        //     }
        // }
    });
</script>
<script type="text/javascript">
    function test(date) {
        var result = confirm("Are you sure you want to delete all this data??");
        if (result) {
            window.location.href = "delete.php?date=" + date;
        }
    }

    function test1(no) {
        var result1 = confirm("Are you sure you want to delete this data?");

        if (result1) {
            window.location.href = "delete.php?id=" + no;
        }
    }
</script>