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

$data = [
    "labels" => ["ANNUAL LEAVE", "MEDICAL LEAVE", "UNPAID LEAVE", "METERNITY LEAVE", "HOSPITALITY LEAVE", "EMERGENCY LEAVE"],
    "values" => [$row_annual['annual'], $row_medical['medical'], $row_unpaid['unpaid'], $row_meternity['meternity'], $row_hospi['hospi'], $row_emer['emer']]
];

$jasondata = json_encode($data);

$sql_jan = "SELECT SUM(amount) AS sum_jan, status AS status_jan FROM `mra_claims` WHERE MONTH(date) = '01' AND noic = '$noic' AND YEAR(date) = '$Year_now'";
$result_jan = mysqli_query($conn, $sql_jan);
$row_jan = mysqli_fetch_assoc($result_jan) ?? ['sum_jan' => 0];

$sql_feb = "SELECT SUM(amount) AS sum_feb, status AS status_feb FROM `mra_claims` WHERE MONTH(date) = '02' AND noic = '$noic' AND YEAR(date) = '$Year_now'";
$result_feb = mysqli_query($conn, $sql_feb);
$row_feb = mysqli_fetch_assoc($result_feb);

$sql_mar = "SELECT SUM(amount) AS sum_mar, status AS status_mar FROM `mra_claims` WHERE MONTH(date) = '03' AND noic = '$noic' AND YEAR(date) = '$Year_now'";
$result_mar = mysqli_query($conn, $sql_mar);
$row_mar = mysqli_fetch_assoc($result_mar);

$sql_apr = "SELECT SUM(amount) AS sum_apr, status AS status_apr FROM `mra_claims` WHERE MONTH(date) = '04' AND noic = '$noic' AND YEAR(date) = '$Year_now'";
$result_apr = mysqli_query($conn, $sql_apr);   
$row_apr = mysqli_fetch_assoc($result_apr);

$sql_may = "SELECT SUM(amount) AS sum_may, status AS status_may FROM `mra_claims` WHERE MONTH(date) = '05' AND noic = '$noic' AND YEAR(date) = '$Year_now'";
$result_may = mysqli_query($conn, $sql_may);   
$row_may = mysqli_fetch_assoc($result_may);

$sql_jun = "SELECT SUM(amount) AS sum_jun, status AS status_jun FROM `mra_claims` WHERE MONTH(date) = '06' AND noic = '$noic' AND YEAR(date) = '$Year_now'";
$result_jun = mysqli_query($conn, $sql_jun);
$row_jun = mysqli_fetch_assoc($result_jun);

$sql_jul = "SELECT SUM(amount) AS sum_jul, status AS status_jul FROM `mra_claims` WHERE MONTH(date) = '07' AND noic = '$noic' AND YEAR(date) = '$Year_now'";
$result_jul = mysqli_query($conn, $sql_jul);
$row_jul = mysqli_fetch_assoc($result_jul);

$sql_aug = "SELECT SUM(amount) AS sum_aug, status AS status_aug FROM `mra_claims` WHERE MONTH(date) = '08' AND noic = '$noic' AND YEAR(date) = '$Year_now'";
$result_aug = mysqli_query($conn, $sql_aug);
$row_aug = mysqli_fetch_assoc($result_aug);

$sql_sep = "SELECT SUM(amount) AS sum_sep, status AS status_sep FROM `mra_claims` WHERE MONTH(date) = '09' AND noic = '$noic' AND YEAR(date) = '$Year_now'";
$result_sep = mysqli_query($conn, $sql_sep);
$row_sep = mysqli_fetch_assoc($result_sep);

$sql_oct = "SELECT SUM(amount) AS sum_oct, status AS status_oct FROM `mra_claims` WHERE MONTH(date) = '10' AND noic = '$noic' AND YEAR(date) = '$Year_now'";
$result_oct = mysqli_query($conn, $sql_oct);
$row_oct = mysqli_fetch_assoc($result_oct);

$sql_nov = "SELECT SUM(amount) AS sum_nov, status AS status_nov FROM `mra_claims` WHERE MONTH(date) = '11' AND noic = '$noic' AND YEAR(date) = '$Year_now'";
$result_nov = mysqli_query($conn, $sql_nov);
$row_nov = mysqli_fetch_assoc($result_nov);

$sql_dec = "SELECT SUM(amount) AS sum_dec, status AS status_dec FROM `mra_claims` WHERE MONTH(date) = '12' AND noic = '$noic' AND YEAR(date) = '$Year_now'";
$result_dec = mysqli_query($conn, $sql_dec);
$row_dec = mysqli_fetch_assoc($result_dec); 

$claim = [
    "label_claim" => ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"],
    "jumlah_claim" => [$row_jan['sum_jan'], $row_feb['sum_feb'], $row_mar['sum_mar'], $row_apr['sum_apr'], $row_may['sum_may'], $row_jun['sum_jun'], $row_jul['sum_jul'], $row_aug['sum_aug'], $row_sep['sum_sep'], $row_oct['sum_oct'], $row_nov['sum_nov'], $row_dec['sum_dec']]
];

$jasonclaim = json_encode($claim);

$sql_office_jan = "SELECT COUNT(*) AS jan FROM `mra_office` WHERE MONTH(date_apply) = '01' AND YEAR(date_apply) = '$Year_now' AND ic = '$noic'";
$result_office_jan = $conn->query($sql_office_jan);
$row_office_jan = $result_office_jan->fetch_assoc();
$total_office_jan = $row_office_jan['jan'] ? $row_office_jan['jan'] : 0;

$sql_office_feb = "SELECT COUNT(*) AS feb FROM `mra_office` WHERE MONTH(date_apply) = '02' AND YEAR(date_apply) = '$Year_now' AND ic = '$noic'";
$result_office_feb = $conn->query($sql_office_feb);
$row_office_feb = $result_office_feb->fetch_assoc();
$total_office_feb = $row_office_feb['feb'] ? $row_office_feb['feb'] : 0;

$sql_office_mar = "SELECT COUNT(*) AS mar FROM `mra_office` WHERE MONTH(date_apply) = '03' AND YEAR(date_apply) = '$Year_now' AND ic = '$noic'";
$result_office_mar = $conn->query($sql_office_mar);
$row_office_mar = $result_office_mar->fetch_assoc();
$total_office_mar = $row_office_mar['mar'] ? $row_office_mar['mar'] : 0;

$sql_office_apr = "SELECT COUNT(*) AS apr FROM `mra_office` WHERE MONTH(date_apply) = '04' AND YEAR(date_apply) = '$Year_now' AND ic = '$noic'";
$result_office_apr = $conn->query($sql_office_apr);
$row_office_apr = $result_office_apr->fetch_assoc();
$total_office_apr = $row_office_apr['apr'] ? $row_office_apr['apr'] : 0;

$sql_office_may = "SELECT COUNT(*) AS may FROM `mra_office` WHERE MONTH(date_apply) = '05' AND YEAR(date_apply) = '$Year_now' AND ic = '$noic'";
$result_office_may = $conn->query($sql_office_may);
$row_office_may = $result_office_may->fetch_assoc();
$total_office_may = $row_office_may['may'] ? $row_office_may['may'] : 0;

$sql_office_jun = "SELECT COUNT(*) AS jun FROM `mra_office` WHERE MONTH(date_apply) = '06' AND YEAR(date_apply) = '$Year_now' AND ic = '$noic'";
$result_office_jun = $conn->query($sql_office_jun);
$row_office_jun = $result_office_jun->fetch_assoc();
$total_office_jun = $row_office_jun['jun'] ? $row_office_jun['jun'] : 0;

$sql_office_jul = "SELECT COUNT(*) AS jul FROM `mra_office` WHERE MONTH(date_apply) = '07' AND YEAR(date_apply) = '$Year_now' AND ic = '$noic'";
$result_office_jul = $conn->query($sql_office_jul);
$row_office_jul = $result_office_jul->fetch_assoc();
$total_office_jul = $row_office_jul['jul'] ? $row_office_jul['jul'] : 0;

$sql_office_aug = "SELECT COUNT(*) AS aug FROM `mra_office` WHERE MONTH(date_apply) = '08' AND YEAR(date_apply) = '$Year_now' AND ic = '$noic'";
$result_office_aug = $conn->query($sql_office_aug);
$row_office_aug = $result_office_aug->fetch_assoc();
$total_office_aug = $row_office_aug['aug'] ? $row_office_aug['aug'] : 0;

$sql_office_sep = "SELECT COUNT(*) AS sep FROM `mra_office` WHERE MONTH(date_apply) = '09' AND YEAR(date_apply) = '$Year_now' AND ic = '$noic'";
$result_office_sep = $conn->query($sql_office_sep);
$row_office_sep = $result_office_sep->fetch_assoc();
$total_office_sep = $row_office_sep['sep'] ? $row_office_sep['sep'] : 0;

$sql_office_oct = "SELECT COUNT(*) AS oct FROM `mra_office` WHERE MONTH(date_apply) = '10' AND YEAR(date_apply) = '$Year_now' AND ic = '$noic'";
$result_office_oct = $conn->query($sql_office_oct);
$row_office_oct = $result_office_oct->fetch_assoc();
$total_office_oct = $row_office_oct['oct'] ? $row_office_oct['oct'] : 0;

$sql_office_nov = "SELECT COUNT(*) AS nov FROM `mra_office` WHERE MONTH(date_apply) = '11' AND YEAR(date_apply) = '$Year_now' AND ic = '$noic'";
$result_office_nov = $conn->query($sql_office_nov);
$row_office_nov = $result_office_nov->fetch_assoc();
$total_office_nov = $row_office_nov['nov'] ? $row_office_nov['nov'] : 0;

$sql_office_dec = "SELECT COUNT(*) AS december FROM `mra_office` WHERE MONTH(date_apply) = '12' AND YEAR(date_apply) = '$Year_now' AND ic = '$noic'";
$result_office_dec = $conn->query($sql_office_dec);
$row_office_dec = $result_office_dec->fetch_assoc();
$total_office_dec = $row_office_dec['december'] ? $row_office_dec['december'] : 0;

$attan = [
    "label_attan" => ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"],
    "jumlah_attan" => [$total_office_jan, $total_office_feb, $total_office_mar, $total_office_apr, $total_office_may, $total_office_jun, $total_office_jul, $total_office_aug, $total_office_sep, $total_office_oct, $total_office_nov, $total_office_dec]
];

$jasonattan = json_encode($attan);

$sql_out_jan = "SELECT DATE_FORMAT(dateapply, '%Y-%m') AS bulan, COUNT(datestart) AS jan FROM mra_outstation WHERE YEAR(dateapply) = '$Year_now' AND MONTH(dateapply) = '01' AND ic = '$noic' GROUP BY bulan ORDER BY bulan";
$result_out_jan = $conn->query($sql_out_jan);
$row_out_jan = $result_out_jan->fetch_assoc();
$total_out_jan = $row_out_jan['jan'] ? $row_out_jan['jan'] : 0;

$sql_out_feb = "SELECT DATE_FORMAT(dateapply, '%Y-%m') AS bulan, COUNT(datestart) AS feb FROM mra_outstation WHERE YEAR(dateapply) = '$Year_now' AND MONTH(dateapply) = '02' AND ic = '$noic' GROUP BY bulan ORDER BY bulan";
$result_out_feb = $conn->query($sql_out_feb);
$row_out_feb = $result_out_feb->fetch_assoc();
$total_out_feb = $row_out_feb['feb'] ? $row_out_feb['feb'] : 0;

$sql_out_mar = "SELECT DATE_FORMAT(dateapply, '%Y-%m') AS bulan, COUNT(datestart) AS mar FROM mra_outstation WHERE YEAR(dateapply) = '$Year_now' AND MONTH(dateapply) = '03' AND ic = '$noic' GROUP BY bulan ORDER BY bulan";
$result_out_mar = $conn->query($sql_out_mar);
$row_out_mar = $result_out_mar->fetch_assoc();
$total_out_mar = $row_out_mar['mar'] ? $row_out_mar['mar'] : 0;

$sql_out_apr = "SELECT DATE_FORMAT(dateapply, '%Y-%m') AS bulan, COUNT(datestart) AS apr FROM mra_outstation WHERE YEAR(dateapply) = '$Year_now' AND MONTH(dateapply) = '04' AND ic = '$noic' GROUP BY bulan ORDER BY bulan";
$result_out_apr = $conn->query($sql_out_apr);
$row_out_apr = $result_out_apr->fetch_assoc();
$total_out_apr = $row_out_apr['apr'] ? $row_out_apr['apr'] : 0;

$sql_out_may = "SELECT DATE_FORMAT(dateapply, '%Y-%m') AS bulan, COUNT(datestart) AS may FROM mra_outstation WHERE YEAR(dateapply) = '$Year_now' AND MONTH(dateapply) = '05' AND ic = '$noic' GROUP BY bulan ORDER BY bulan";
$result_out_may = $conn->query($sql_out_may);
$row_out_may = $result_out_may->fetch_assoc();
$total_out_may = $row_out_may['may'] ? $row_out_may['may'] : 0;

$sql_out_jun = "SELECT DATE_FORMAT(dateapply, '%Y-%m') AS bulan, COUNT(datestart) AS jun FROM mra_outstation WHERE YEAR(dateapply) = '$Year_now' AND MONTH(dateapply) = '06' AND ic = '$noic' GROUP BY bulan ORDER BY bulan";
$result_out_jun = $conn->query($sql_out_jun);
$row_out_jun = $result_out_jun->fetch_assoc();
$total_out_jun = $row_out_jun['jun'] ? $row_out_jun['jun'] : 0;

$sql_out_jul = "SELECT DATE_FORMAT(dateapply, '%Y-%m') AS bulan, COUNT(datestart) AS jul FROM mra_outstation WHERE YEAR(dateapply) = '$Year_now' AND MONTH(dateapply) = '07' AND ic = '$noic' GROUP BY bulan ORDER BY bulan";
$result_out_jul = $conn->query($sql_out_jul);
$row_out_jul = $result_out_jul->fetch_assoc();
$total_out_jul = $row_out_jul['jul'] ? $row_out_jul['jul'] : 0;

$sql_out_aug = "SELECT DATE_FORMAT(dateapply, '%Y-%m') AS bulan, COUNT(datestart) AS aug FROM mra_outstation WHERE YEAR(dateapply) = '$Year_now' AND MONTH(dateapply) = '08' AND ic = '$noic' GROUP BY bulan ORDER BY bulan";
$result_out_aug = $conn->query($sql_out_aug);
$row_out_aug = $result_out_aug->fetch_assoc();
$total_out_aug = $row_out_aug['aug'] ? $row_out_aug['aug'] : 0;

$sql_out_sep = "SELECT DATE_FORMAT(dateapply, '%Y-%m') AS bulan, COUNT(datestart) AS sep FROM mra_outstation WHERE YEAR(dateapply) = '$Year_now' AND MONTH(dateapply) = '09' AND ic = '$noic' GROUP BY bulan ORDER BY bulan";
$result_out_sep = $conn->query($sql_out_sep);
$row_out_sep = $result_out_sep->fetch_assoc();
$total_out_sep = $row_out_sep['sep'] ? $row_out_sep['sep'] : 0;

$sql_out_oct = "SELECT DATE_FORMAT(dateapply, '%Y-%m') AS bulan, COUNT(datestart) AS oct FROM mra_outstation WHERE YEAR(dateapply) = '$Year_now' AND MONTH(dateapply) = '10' AND ic = '$noic' GROUP BY bulan ORDER BY bulan";
$result_out_oct = $conn->query($sql_out_oct);
$row_out_oct = $result_out_oct->fetch_assoc();
$total_out_oct = $row_out_oct['sep'] ? $row_out_oct['sep'] : 0;

$sql_out_nov = "SELECT DATE_FORMAT(dateapply, '%Y-%m') AS bulan, COUNT(datestart) AS nov FROM mra_outstation WHERE YEAR(dateapply) = '$Year_now' AND MONTH(dateapply) = '11' AND ic = '$noic' GROUP BY bulan ORDER BY bulan";
$result_out_nov = $conn->query($sql_out_nov);
$row_out_nov = $result_out_nov->fetch_assoc();
$total_out_nov = $row_out_nov['nov'] ? $row_out_nov['nov'] : 0;

$sql_out_dec = "SELECT DATE_FORMAT(dateapply, '%Y-%m') AS bulan, COUNT(datestart) AS december FROM mra_outstation WHERE YEAR(dateapply) = '$Year_now' AND MONTH(dateapply) = '12' AND ic = '$noic' GROUP BY bulan ORDER BY bulan";
$result_out_dec = $conn->query($sql_out_dec);
$row_out_dec = $result_out_dec->fetch_assoc();
$total_out_dec = $row_out_dec['december'] ? $row_out_dec['december'] : 0;

$attanout = [
    "label_out" => ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"],
    "jumlah_out" => [$total_out_jan, $total_out_feb, $total_out_mar, $total_out_apr, $total_out_may, $total_out_jun, $total_out_jul, $total_out_aug, $total_out_sep, $total_out_oct, $total_out_nov, $total_out_dec]
];

$jasonout = json_encode($attanout);

$sql_wfh_jan = "SELECT COUNT(*) AS wfhjan FROM `mra_wfh` WHERE YEAR(datesign) = '$Year_now' AND MONTH(datesign) = '01' AND ic = '$noic'";
$result_wfh_jan = $conn->query($sql_wfh_jan);
$row_wfh_jan = $result_wfh_jan->fetch_assoc();
$total_wfh_jan = $row_wfh_jan['wfhjan'] ? $row_out_dec['wfhjan'] : 0;

$sql_wfh_feb = "SELECT COUNT(*) AS wfhfeb FROM `mra_wfh` WHERE YEAR(datesign) = '$Year_now' AND MONTH(datesign) = '02' AND ic = '$noic'";
$result_wfh_feb = $conn->query($sql_wfh_feb);
$row_wfh_feb = $result_wfh_feb->fetch_assoc();
$total_wfh_feb = $row_wfh_feb['wfhfeb'] ? $row_wfh_feb['wfhfeb'] : 0;

$sql_wfh_mar = "SELECT COUNT(*) AS wfhmar FROM `mra_wfh` WHERE YEAR(datesign) = '$Year_now' AND MONTH(datesign) = '03' AND ic = '$noic'";
$result_wfh_mar = $conn->query($sql_wfh_mar);
$row_wfh_mar = $result_wfh_mar->fetch_assoc();
$total_wfh_mar = $row_wfh_mar['wfhmar'] ? $row_wfh_mar['wfhmar'] : 0;

$sql_wfh_apr = "SELECT COUNT(*) AS wfhapr FROM `mra_wfh` WHERE YEAR(datesign) = '$Year_now' AND MONTH(datesign) = '04' AND ic = '$noic'";
$result_wfh_apr = $conn->query($sql_wfh_apr);
$row_wfh_apr = $result_wfh_apr->fetch_assoc();
$total_wfh_apr = $row_wfh_apr['wfhapr'] ? $row_wfh_apr['wfhapr'] : 0;

$sql_wfh_may = "SELECT COUNT(*) AS wfhmay FROM `mra_wfh` WHERE YEAR(datesign) = '$Year_now' AND MONTH(datesign) = '05' AND ic = '$noic'";
$result_wfh_may = $conn->query($sql_wfh_may);
$row_wfh_may = $result_wfh_may->fetch_assoc();
$total_wfh_may = $row_wfh_may['wfhmay'] ? $row_wfh_may['wfhmay'] : 0;

$sql_wfh_jun = "SELECT COUNT(*) AS wfhjun FROM `mra_wfh` WHERE YEAR(datesign) = '$Year_now' AND MONTH(datesign) = '06' AND ic = '$noic'";
$result_wfh_jun = $conn->query($sql_wfh_jun);
$row_wfh_jun = $result_wfh_jun->fetch_assoc();
$total_wfh_jun = $row_wfh_jun['wfhjun'] ? $row_wfh_jun['wfhjun'] : 0;

$sql_wfh_jul = "SELECT COUNT(*) AS wfhjul FROM `mra_wfh` WHERE YEAR(datesign) = '$Year_now' AND MONTH(datesign) = '07' AND ic = '$noic'";
$result_wfh_jul = $conn->query($sql_wfh_jul);
$row_wfh_jul = $result_wfh_jul->fetch_assoc();
$total_wfh_jul = $row_wfh_jul['wfhjul'] ? $row_wfh_jul['wfhjul'] : 0;

$sql_wfh_aug = "SELECT COUNT(*) AS wfhaug FROM `mra_wfh` WHERE YEAR(datesign) = '$Year_now' AND MONTH(datesign) = '08' AND ic = '$noic'";
$result_wfh_aug = $conn->query($sql_wfh_jul);
$row_wfh_aug = $result_wfh_jul->fetch_assoc();
$total_wfh_aug = $row_wfh_aug['wfhaug'] ? $row_wfh_aug['wfhaug'] : 0;

$sql_wfh_sep = "SELECT COUNT(*) AS wfhsep FROM `mra_wfh` WHERE YEAR(datesign) = '$Year_now' AND MONTH(datesign) = '09' AND ic = '$noic'";
$result_wfh_sep = $conn->query($sql_wfh_sep);
$row_wfh_sep = $result_wfh_sep->fetch_assoc();
$total_wfh_sep = $row_wfh_sep['wfhsep'] ? $row_wfh_sep['wfhsep'] : 0;

$sql_wfh_oct = "SELECT COUNT(*) AS wfhoct FROM `mra_wfh` WHERE YEAR(datesign) = '$Year_now' AND MONTH(datesign) = '10' AND ic = '$noic'";
$result_wfh_oct = $conn->query($sql_wfh_oct);
$row_wfh_oct = $result_wfh_oct->fetch_assoc();
$total_wfh_oct = $row_wfh_oct['wfhoct'] ? $row_wfh_oct['wfhoct'] : 0;

$sql_wfh_nov = "SELECT COUNT(*) AS wfhoct FROM `mra_wfh` WHERE YEAR(datesign) = '$Year_now' AND MONTH(datesign) = '11' AND ic = '$noic'";
$result_wfh_nov = $conn->query($sql_wfh_nov);
$row_wfh_nov = $result_wfh_nov->fetch_assoc();
$total_wfh_nov = $row_wfh_nov['wfhoct'] ? $row_wfh_nov['wfhoct'] : 0;

$sql_wfh_dec = "SELECT COUNT(*) AS wfhoct FROM `mra_wfh` WHERE YEAR(datesign) = '$Year_now' AND MONTH(datesign) = '12' AND ic = '$noic'";
$result_wfh_dec = $conn->query($sql_wfh_dec);
$row_wfh_dec = $result_wfh_dec->fetch_assoc();
$total_wfh_dec = $row_wfh_dec['wfhoct'] ? $row_wfh_dec['wfhoct'] : 0;

$attanwfh = [
    "label_wfh" => ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"],
    "jumlah_wfh" => [$total_wfh_jan, $total_wfh_feb, $total_wfh_mar, $total_wfh_apr, $total_wfh_may, $total_wfh_jun, $$total_wfh_jul, $total_wfh_aug, $total_wfh_sep, $total_wfh_oct, $total_wfh_nov, $total_wfh_dec]
];

$jasonwfh = json_encode($attanwfh);
?>
<div class="card">
    <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Hi, <?php echo $name; ?></h5>
    <p class="mb-0"><?php echo $position; ?></p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List of Amount of Each Leave</h5>
        <br>
        <h6>ANNUAL LEAVE : <?php echo $row_annual['annual']; ?></h6>
        <h6>MEDICAL LEAVE : <?php echo $row_medical['medical'] ?></h6>
        <h6>UNPAID LEAVE : <?php echo $row_unpaid['unpaid'] ?></h6>
        <h6>METERNITY LEAVE : <?php echo $row_meternity['meternity'] ?></h6>
        <h6>HOSPITALITY LEAVE : <?php echo $row_hospi['hospi'] ?></h6>
        <h6>EMERGENCY LEAVE : <?php echo $row_emer['emer'] ?></h6>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <br>
        <h5 class="card-title fw-semibold mb-4">Graf leave</h5>
        <canvas id="barChart"></canvas>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List of Total Claims Every Month</h5>
        <div class="col-sm-4">
        </div>
        <br>
        <?php include("components/tablelistclaim.php"); ?>
    </div>
    <div class="card-body">
        <?php
            $total = $row_jan['sum_jan'] + $row_feb['sum_feb'] + $row_mar['sum_mar'] + $row_apr['sum_apr'] + $row_may['sum_may'] + $row_jun['sum_jun'] + $row_jul['sum_jul'] + $row_aug['sum_aug'] + $row_sep['sum_sep'] + $row_oct['sum_oct'] + $row_nov['sum_nov'] + $row_dec['sum_dec'];
        ?>
        <h1>TOTAL ALL MONTHS : <?php echo "RM" . $total; ?></h1>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Graf Claim</h5>
        <canvas id="barclaim"></canvas>
    </div>
</div>

<!-- <div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List of Total Day In Office Every Month</h5>
        <div class="col-sm-4">
        </div>
        <br>
        <h6>
            JANUARY : <?php if ($total_office_jan != "") {echo $total_office_jan . "DAY";} ?>
        </h6>
        <h6>
            FEBRUARY : <?php if ($total_office_feb != "") {echo $total_office_feb . "DAY";} ?>
        </h6>
        <h6>
            MARCH : <?php if ($total_office_mar != "") {echo $total_office_mar . "DAY";} ?>
        </h6>
        <h6>
            APRIL : <?php if ($total_office_apr != "") {echo $total_office_apr . "DAY";} ?>
        </h6>
        <h6>
            MAY : <?php if ($total_office_may != "") {echo $total_office_may . "DAY";} ?>
        </h6>
        <h6>
            JUNE : <?php if ($total_office_jun != "") {echo $total_office_jun . "DAY";} ?>
        </h6>
        <h6>
            JULY : <?php if ($total_office_jul != "") {echo $total_office_jul . "DAY";} ?>
        </h6>
        <h6>
            AUGUST : <?php if ($total_office_aug != "") {echo $total_office_aug . "DAY";} ?>
        </h6>
        <h6>
            SEPTEMBER : <?php if ($total_office_sep != "") {echo $total_office_sep . "DAY";} ?>
        </h6>
        <h6>
            OCTOBER : <?php if ($total_office_oct != "") {echo $total_office_oct . "DAY";} ?>
        </h6>
        <h6>
            NOVEMBER : <?php if ($total_office_nov != "") {echo $total_office_nov . "DAY";} ?>
        </h6>
        <h6>
            DECEMBER : <?php if ($total_office_dec != "") {echo $total_office_dec . "DAY";} ?>
        </h6>
    </div>
</div> -->

<!-- <div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Graf Total In Office  Every Month</h5>
        <canvas id="barattan"></canvas>
    </div>
</div> -->

<!-- <div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List of Total Day In Outstation Every Month</h5>
        <div class="col-sm-4">
        </div>
        <br>
        <h6>
            JANUARY : <?php if ($total_out_jan != "") {echo $total_out_jan . "DAY";} ?>
        </h6>
        <h6>
            FEBRUARY : <?php if ($total_out_feb != "") {echo $total_out_feb . "DAY";} ?>
        </h6>
        <h6>
            MARCH : <?php if ($total_out_mar != "") {echo $total_out_mar . "DAY";} ?>
        </h6>
        <h6>
            APRIL : <?php if ($total_out_apr != "") {echo $total_out_apr . "DAY";} ?>
        </h6>
        <h6>
            MAY : <?php if ($total_out_may != "") {echo $total_out_may . "DAY";} ?>
        </h6>
        <h6>
            JUNE : <?php if ($total_out_jun != "") {echo $total_out_jun . "DAY";} ?>
        </h6>
        <h6>
            JULY : <?php if ($total_out_jul != "") {echo $total_out_jul . "DAY";} ?>
        </h6>
        <h6>
            AUGUST : <?php if ($total_out_aug != "") {echo $total_out_aug . "DAY";} ?>
        </h6>
        <h6>
            SEPTEMBER : <?php if ($total_out_sep != "") {echo $total_out_sep . "DAY";} ?>
        </h6>
        <h6>
            OCTOBER : <?php if ($total_out_oct != "") {echo $total_out_oct . "DAY";} ?>
        </h6>
        <h6>
            NOVEMBER : <?php if ($total_out_nov != "") {echo $total_out_nov . "DAY";} ?>
        </h6>
        <h6>
            DECEMBER : <?php if ($total_out_dec != "") {echo $total_out_dec . "DAY";} ?>
        </h6>
    </div>
</div> -->

<!-- <div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Graf Total In Outstation Every Month</h5>
        <canvas id="barout"></canvas>
    </div>
</div> -->

<!-- <div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List of Total Day In Work From Home Every Month</h5>
        <div class="col-sm-4">
        </div>
        <br>
        <h6>
            JANUARY : <?php if ($total_wfh_jan != "") {echo $total_wfh_jan . "DAY";} ?>
        </h6>
        <h6>
            FEBRUARY : <?php if ($total_wfh_feb != "") {echo $total_wfh_feb . "DAY";} ?>
        </h6>
        <h6>
            MARCH : <?php if ($total_wfh_mar != "") {echo $total_wfh_mar . "DAY";} ?>
        </h6>
        <h6>
            APRIL : <?php if ($total_wfh_apr != "") {echo $total_wfh_apr . "DAY";} ?>
        </h6>
        <h6>
            MAY : <?php if ($total_wfh_may != "") {echo $total_wfh_may . "DAY";} ?>
        </h6>
        <h6>
            JUNE : <?php if ($total_wfh_jun != "") {echo $total_wfh_jun . "DAY";} ?>
        </h6>
        <h6>
            JULY : <?php if ($total_wfh_jul != "") {echo $total_wfh_jul . "DAY";} ?>
        </h6>
        <h6>
            AUGUST : <?php if ($total_wfh_aug != "") {echo $total_wfh_aug . "DAY";} ?>
        </h6>
        <h6>
            SEPTEMBER : <?php if ($total_wfh_sep != "") {echo $total_wfh_sep . "DAY";} ?>
        </h6>
        <h6>
            OCTOBER : <?php if ($total_wfh_oct != "") {echo $total_wfh_oct . "DAY";} ?>
        </h6>
        <h6>
            NOVEMBER : <?php if ($total_wfh_nov != "") {echo $total_wfh_nov . "DAY";} ?>
        </h6>
        <h6>
            DECEMBER : <?php if ($total_wfh_dec != "") {echo $total_wfh_dec . "DAY";} ?>
        </h6>
    </div>
</div> -->

<!-- <div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Graf Total In Work From Home Every Month</h5>
        <canvas id="barwfh"></canvas>
    </div>
</div> -->
<script>
    // Dapatkan data dari PHP
    const dataFromPHP = <?php echo $jasondata; ?>;

    // Konfigurasi graf untuk leave
    const config = {
        type: 'bar',
        data: {
            labels: dataFromPHP.labels,
            datasets: [{
                label: 'Jumlah',
                data: dataFromPHP.values,
                backgroundColor: '#5D87FF',
                borderColor: '#5D87FF',
                borderWidth: 1
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Rekod Pengambilan Ujian"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,  // Pastikan paksi y bermula dari 0
                        min: 0,             // Nilai minimum paksi y
                        max: Math.max(...dataFromPHP.values) + 5 // Sesuaikan dinamik
                    }
                }]
            }
        }
    };

    // Render graf pada elemen canvas
    const ctx = document.getElementById('barChart').getContext('2d');
    new Chart(ctx, config);
</script>
<script>
    // Dapatkan data dari PHP untuk klaim
    const claimData = <?php echo $jasonclaim; ?>;

    console.log(claimData);

    // Konfigurasi graf untuk klaim
    const config_claim = {
        type: 'bar',
        data: {
            labels: claimData.label_claim,
            datasets: [{
                label: 'RM',
                data: claimData.jumlah_claim,
                backgroundColor: '#5D87FF',
                borderColor: '#5D87FF',
                borderWidth: 1
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Rekod Pengambilan Ujian"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,  // Pastikan paksi y bermula dari 0
                        min: 0,             // Nilai minimum paksi y
                        max: Math.max(...dataFromPHP.values) + 5 // Sesuaikan dinamik
                    }
                }]
            }
        }
    };

    // Render graf pada elemen canvas
    const ctxClaim = document.getElementById('barclaim').getContext('2d');
    new Chart(ctxClaim, config_claim);
</script>
<script>
    // Dapatkan data dari PHP untuk klaim
    const attanData = <?php echo $jasonattan; ?>;

    console.log(attanData);

    // Konfigurasi graf untuk klaim
    const config_attan = {
        type: 'bar',
        data: {
            labels: attanData.label_attan,
            datasets: [{
                label: 'DAY',
                data: attanData.jumlah_attan,
                backgroundColor: '#5D87FF',
                borderColor: '#5D87FF',
                borderWidth: 1
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Rekod Pengambilan Ujian"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,  // Pastikan paksi y bermula dari 0
                        min: 0,             // Nilai minimum paksi y
                        max: Math.max(...dataFromPHP.values) + 5 // Sesuaikan dinamik
                    }
                }]
            }
        }
    };

    // Render graf pada elemen canvas
    const ctxattan = document.getElementById('barattan').getContext('2d');
    new Chart(ctxattan, config_attan);
</script>
<script>
    // Dapatkan data dari PHP untuk klaim
    const outData = <?php echo $jasonout; ?>;

    console.log(outData);

    // Konfigurasi graf untuk klaim
    const config_out = {
        type: 'bar',
        data: {
            labels: outData.label_out,
            datasets: [{
                label: 'DAY',
                data: outData.jumlah_out,
                backgroundColor: '#5D87FF',
                borderColor: '#5D87FF',
                borderWidth: 1
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Rekod Pengambilan Ujian"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,  // Pastikan paksi y bermula dari 0
                        min: 0,             // Nilai minimum paksi y
                        max: Math.max(...dataFromPHP.values) + 5 // Sesuaikan dinamik
                    }
                }]
            }
        }
    };

    // Render graf pada elemen canvas
    const ctxout = document.getElementById('barout').getContext('2d');
    new Chart(ctxout, config_out);
</script>
<script>
    // Dapatkan data dari PHP untuk klaim
    const wfhData = <?php echo $jasonwfh; ?>;

    // Konfigurasi graf untuk klaim
    const config_wfh = {
        type: 'bar',
        data: {
            labels: wfhData.label_wfh,
            datasets: [{
                label: 'DAY',
                data: wfhData.jumlah_wfh,
                backgroundColor: '#5D87FF',
                borderColor: '#5D87FF',
                borderWidth: 1
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Rekod Pengambilan Ujian"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,  // Pastikan paksi y bermula dari 0
                        min: 0,             // Nilai minimum paksi y
                        max: Math.max(...dataFromPHP.values) + 5 // Sesuaikan dinamik
                    }
                }]
            }
        }
    };

    // Render graf pada elemen canvas
    const ctxwfh = document.getElementById('barwfh').getContext('2d');
    new Chart(ctxwfh, config_wfh);
</script>