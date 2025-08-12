<?php
set_time_limit(0);
//error_reporting(E_NOTICE);
include('/var/www/html/conn.php');

$year = $_POST['tahun'];
$month = $_POST['bulan'];
$noic = $_POST['ic'];

?>
<table id="claim" class="display nowrap" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Date</th>
            <th style="text-align: center;">Purpose</th>
            <th style="text-align: center;">Details</th>
            <th style="text-align: center;">Amounts</th>
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