<?php
set_time_limit(0);
//error_reporting(E_NOTICE);
include('conn.php');

$year = $_POST['tahun'];
$month = $_POST['bulan'];
$noic = $_POST['ic'];

?>
<div class="mt-3" align="right"><a href="printclaim?id=<?php echo base64_encode($noic); ?>&month=<?php echo $month; ?>&year=<?php echo $year; ?>" target="_blank" class="btn btn-primary"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-printer"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg></a></div>
<table id="claim" class="display nowrap" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
        <th>No</th>
        <th>Name</th>
        <th>Date</th>
        <th>Purpose</th>
        <th>Details</th>
        <th>Amounts</th>
        </tr>
    </thead>
    <?php
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
            <td><?php echo $id; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $date; ?></td>
            <td><?php echo $purpose; ?></td>
            <td><?php echo $details; ?></td>
            <td><?php echo $amount; ?></td>
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