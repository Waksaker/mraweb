<?php
set_time_limit(0);
// error_reporting(E_NOTICE);
include('conn.php');
if (empty($_POST['tahun']) || empty($_POST['ic'])) {
    die("Tahun atau IC tidak dihantar!");
}
$year = $_POST['tahun'] ?? $_GET['tahun'];
$noic = $_POST['ic'] ?? $_GET['ic'];

$sql_jan = "SELECT SUM(amount) AS sum_jan, status AS status_jan FROM `mra_claims` WHERE MONTH(date) = '01' AND noic = '$noic' AND YEAR(date) = '$year'";
$result_jan = mysqli_query($conn, $sql_jan);
$row_jan = mysqli_fetch_assoc($result_jan) ?? ['sum_jan' => 0];

$sql_feb = "SELECT SUM(amount) AS sum_feb, status AS status_feb FROM `mra_claims` WHERE MONTH(date) = '02' AND noic = '$noic' AND YEAR(date) = '$year'";
$result_feb = mysqli_query($conn, $sql_feb);
$row_feb = mysqli_fetch_assoc($result_feb);

$sql_mar = "SELECT SUM(amount) AS sum_mar, status AS status_mar FROM `mra_claims` WHERE MONTH(date) = '03' AND noic = '$noic' AND YEAR(date) = '$year'";
$result_mar = mysqli_query($conn, $sql_mar);
$row_mar = mysqli_fetch_assoc($result_mar);

$sql_apr = "SELECT SUM(amount) AS sum_apr, status AS status_apr FROM `mra_claims` WHERE MONTH(date) = '04' AND noic = '$noic' AND YEAR(date) = '$year'";
$result_apr = mysqli_query($conn, $sql_apr);   
$row_apr = mysqli_fetch_assoc($result_apr);

$sql_may = "SELECT SUM(amount) AS sum_may, status AS status_may FROM `mra_claims` WHERE MONTH(date) = '05' AND noic = '$noic' AND YEAR(date) = '$year'";
$result_may = mysqli_query($conn, $sql_may);   
$row_may = mysqli_fetch_assoc($result_may);

$sql_jun = "SELECT SUM(amount) AS sum_jun, status AS status_jun FROM `mra_claims` WHERE MONTH(date) = '06' AND noic = '$noic' AND YEAR(date) = '$year'";
$result_jun = mysqli_query($conn, $sql_jun);
$row_jun = mysqli_fetch_assoc($result_jun);

$sql_jul = "SELECT SUM(amount) AS sum_jul, status AS status_jul FROM `mra_claims` WHERE MONTH(date) = '07' AND noic = '$noic' AND YEAR(date) = '$year'";
$result_jul = mysqli_query($conn, $sql_jul);
$row_jul = mysqli_fetch_assoc($result_jul);

$sql_aug = "SELECT SUM(amount) AS sum_aug, status AS status_aug FROM `mra_claims` WHERE MONTH(date) = '08' AND noic = '$noic' AND YEAR(date) = '$year'";
$result_aug = mysqli_query($conn, $sql_aug);
$row_aug = mysqli_fetch_assoc($result_aug);

$sql_sep = "SELECT SUM(amount) AS sum_sep, status AS status_sep FROM `mra_claims` WHERE MONTH(date) = '09' AND noic = '$noic' AND YEAR(date) = '$year'";
$result_sep = mysqli_query($conn, $sql_sep);
$row_sep = mysqli_fetch_assoc($result_sep);

$sql_oct = "SELECT SUM(amount) AS sum_oct, status AS status_oct FROM `mra_claims` WHERE MONTH(date) = '10' AND noic = '$noic' AND YEAR(date) = '$year'";
$result_oct = mysqli_query($conn, $sql_oct);
$row_oct = mysqli_fetch_assoc($result_oct);

$sql_nov = "SELECT SUM(amount) AS sum_nov, status AS status_nov FROM `mra_claims` WHERE MONTH(date) = '11' AND noic = '$noic' AND YEAR(date) = '$year'";
$result_nov = mysqli_query($conn, $sql_nov);
$row_nov = mysqli_fetch_assoc($result_nov);

$sql_dec = "SELECT SUM(amount) AS sum_dec, status AS status_dec FROM `mra_claims` WHERE MONTH(date) = '12' AND noic = '$noic' AND YEAR(date) = '$year'";
$result_dec = mysqli_query($conn, $sql_dec);
$row_dec = mysqli_fetch_assoc($result_dec);
?>
<table id="claim" class="display nowrap" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Month</th>
            <th style="text-align: center;">Amount</th>
            <th style="text-align: center;">Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: center;">1</td>
            <td style="text-align: center;">JANUARY</td>
            <td style="text-align: center;"><?php echo $row_jan['sum_jan'] ? 'RM' . $row_jan['sum_jan'] : 'RM 0'; ?></td>
            <td style="text-align: center;">
                <?php
                    if ($row_jan['status_jan'] != "" && $row_jan['status_jan'] == "1") {
                        echo "<span class='badge bg-secondary'>Pending</span>";
                    } elseif ($row_jan['status_jan'] != "" && $row_jan['status_jan'] == "2") {
                        echo "<span class='badge bg-success'>Approved</span>";
                    } elseif ($row_jan['status_jan'] != "" && $row_jan['status_jan'] == "3") {
                        echo "<span class='badge bg-danger'>Rejected</span>";
                    } else {
                        echo "<span class='badge bg-warning'>No Claim</span>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">2</td>
            <td style="text-align: center;">FEBRUARY</td>
            <td style="text-align: center;"><?php echo $row_feb['sum_feb'] ? 'RM' . $row_feb['sum_feb'] : 'RM 0'; ?></td>
            <td style="text-align: center;">
                <?php
                    if ($row_feb['status_feb'] != "" && $row_feb['status_feb'] == "1") {
                        echo "<span class='badge bg-secondary'>Pending</span>";
                    } elseif ($row_feb['status_feb'] != "" && $row_feb['status_feb'] == "2") {
                        echo "<span class='badge bg-success'>Approved</span>";
                    } elseif ($row_feb['status_feb'] != "" && $row_feb['status_feb'] == "3") {
                        echo "<span class='badge bg-danger'>Rejected</span>";
                    } else {
                        echo "<span class='badge bg-warning'>No Claim</span>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">3</td>
            <td style="text-align: center;">MARCH</td>
            <td style="text-align: center;"><?php echo $row_mar['sum_mar'] ? 'RM' . $row_mar['sum_mar'] : 'RM 0'; ?></td>
            <td style="text-align: center;">
                <?php
                    if ($row_mar['status_mar'] != "" && $row_mar['status_mar'] == "1") {
                        echo "<span class='badge bg-secondary'>Pending</span>";
                    } elseif ($row_mar['status_mar'] != "" && $row_mar['status_mar'] == "2") {
                        echo "<span class='badge bg-success'>Approved</span>";
                    } elseif ($row_mar['status_mar'] != "" && $row_mar['status_mar'] == "3") {
                        echo "<span class='badge bg-danger'>Rejected</span>";
                    } else {
                        echo "<span class='badge bg-warning'>No Claim</span>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">4</td>
            <td style="text-align: center;">APRIL</td>
            <td style="text-align: center;"><?php echo $row_apr['sum_apr'] ? 'RM' . $row_apr['sum_apr'] : 'RM 0'; ?></td>
            <td style="text-align: center;">
                <?php
                    if ($row_apr['status_apr'] != "" && $row_apr['status_apr'] == "1") {
                        echo "<span class='badge bg-secondary'>Pending</span>";
                    } elseif ($row_apr['status_apr'] != "" && $row_apr['status_apr'] == "2") {
                        echo "<span class='badge bg-success'>Approved</span>";
                    } elseif ($row_apr['status_apr'] != "" && $row_apr['status_apr'] == "3") {
                        echo "<span class='badge bg-danger'>Rejected</span>";
                    } else {
                        echo "<span class='badge bg-warning'>No Claim</span>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">5</td>
            <td style="text-align: center;">MAY</td>
            <td style="text-align: center;"><?php echo $row_may['sum_may'] ? 'RM' . $row_may['sum_may'] : 'RM 0'; ?></td>
            <td style="text-align: center;">
                <?php
                    if ($row_may['status_may'] != "" && $row_may['status_may'] == "1") {
                        echo "<span class='badge bg-secondary'>Pending</span>";
                    } elseif ($row_may['status_may'] != "" && $row_may['status_may'] == "2") {
                        echo "<span class='badge bg-success'>Approved</span>";
                    } elseif ($row_may['status_may'] != "" && $row_may['status_may'] == "3") {
                        echo "<span class='badge bg-danger'>Rejected</span>";
                    } else {
                        echo "<span class='badge bg-warning'>No Claim</span>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">6</td>
            <td style="text-align: center;">JUNE</td>
            <td style="text-align: center;"><?php echo $row_jun['sum_jun'] ? 'RM' . $row_jun['sum_jun'] : 'RM 0'; ?></td>
            <td style="text-align: center;">
                <?php
                    if ($row_jun['status_jun'] != "" && $row_jun['status_jun'] == "1") {
                        echo "<span class='badge bg-secondary'>Pending</span>";
                    } elseif ($row_jun['status_jun'] != "" && $row_jun['status_jun'] == "2") {
                        echo "<span class='badge bg-success'>Approved</span>";
                    } elseif ($row_jun['status_jun'] != "" && $row_jun['status_jun'] == "3") {
                        echo "<span class='badge bg-danger'>Rejected</span>";
                    } else {
                        echo "<span class='badge bg-warning'>No Claim</span>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">7</td>
            <td style="text-align: center;">JULY</td>
            <td style="text-align: center;"><?php echo $row_jul['sum_jul'] ? 'RM' . $row_jul['sum_jul'] : 'RM 0'; ?></td>
            <td style="text-align: center;">
                <?php
                    if ($row_jul['status_jul'] != "" && $row_jul['status_jul'] == "1") {
                        echo "<span class='badge bg-secondary'>Pending</span>";
                    } elseif ($row_jul['status_jul'] != "" && $row_jul['status_jul'] == "2") {
                        echo "<span class='badge bg-success'>Approved</span>";
                    } elseif ($row_jul['status_jul'] != "" && $row_jul['status_jul'] == "3") {
                        echo "<span class='badge bg-danger'>Rejected</span>";
                    } else {
                        echo "<span class='badge bg-warning'>No Claim</span>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">8</td>
            <td style="text-align: center;">AUGUST</td>
            <td style="text-align: center;"><?php echo $row_aug['sum_aug'] ? 'RM' . $row_aug['sum_aug'] : 'RM 0'; ?></td>
            <td style="text-align: center;">
                <?php
                    if ($row_aug['status_aug'] != "" && $row_aug['status_aug'] == "1") {
                        echo "<span class='badge bg-secondary'>Pending</span>";
                    } elseif ($row_aug['status_aug'] != "" && $row_aug['status_aug'] == "2") {
                        echo "<span class='badge bg-success'>Approved</span>";
                    } elseif ($row_aug['status_aug'] != "" && $row_aug['status_aug'] == "3") {
                        echo "<span class='badge bg-danger'>Rejected</span>";
                    } else {
                        echo "<span class='badge bg-warning'>No Claim</span>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">9</td>
            <td style="text-align: center;">SEPTEMBER</td>
            <td style="text-align: center;"><?php echo $row_sep['sum_sep'] ? 'RM' . $row_sep['sum_sep'] : 'RM 0'; ?></td>
            <td style="text-align: center;">
                <?php
                    if ($row_sep['status_sep'] != "" && $row_sep['status_sep'] == "1") {
                        echo "<span class='badge bg-secondary'>Pending</span>";
                    } elseif ($row_sep['status_sep'] != "" && $row_sep['status_sep'] == "2") {
                        echo "<span class='badge bg-success'>Approved</span>";
                    } elseif ($row_sep['status_sep'] != "" && $row_sep['status_sep'] == "3") {
                        echo "<span class='badge bg-danger'>Rejected</span>";
                    } else {
                        echo "<span class='badge bg-warning'>No Claim</span>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">10</td>
            <td style="text-align: center;">OCTOBER</td>
            <td style="text-align: center;"><?php echo $row_oct['sum_oct'] ? 'RM' . $row_oct['sum_oct'] : 'RM 0'; ?></td>
            <td style="text-align: center;">
                <?php
                    if ($row_oct['status_oct'] != "" && $row_oct['status_oct'] == "1") {
                        echo "<span class='badge bg-secondary'>Pending</span>";
                    } elseif ($row_oct['status_oct'] != "" && $row_oct['status_oct'] == "2") {
                        echo "<span class='badge bg-success'>Approved</span>";
                    } elseif ($row_oct['status_oct'] != "" && $row_oct['status_oct'] == "3") {
                        echo "<span class='badge bg-danger'>Rejected</span>";
                    } else {
                        echo "<span class='badge bg-warning'>No Claim</span>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">11</td>
            <td style="text-align: center;">NOVEMBER</td>
            <td style="text-align: center;"><?php echo $row_nov['sum_nov'] ? 'RM' . $row_nov['sum_nov'] : 'RM 0'; ?></td>
            <td style="text-align: center;">
                <?php
                    if ($row_nov['status_nov'] != "" && $row_nov['status_nov'] == "1") {
                        echo "<span class='badge bg-secondary'>Pending</span>";
                    } elseif ($row_nov['status_nov'] != "" && $row_nov['status_nov'] == "2") {
                        echo "<span class='badge bg-success'>Approved</span>";
                    } elseif ($row_nov['status_nov'] != "" && $row_nov['status_nov'] == "3") {
                        echo "<span class='badge bg-danger'>Rejected</span>";
                    } else {
                        echo "<span class='badge bg-warning'>No Claim</span>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">12</td>
            <td style="text-align: center;">DECEMBER</td>
            <td style="text-align: center;"><?php echo $row_dec['sum_dec'] ? 'RM' . $row_dec['sum_dec'] : 'RM 0'; ?></td>
            <td style="text-align: center;">
                <?php
                    if ($row_dec['status_dec'] != "" && $row_dec['status_dec'] == "1") {
                        echo "<span class='badge bg-secondary'>Pending</span>";
                    } elseif ($row_dec['status_dec'] != "" && $row_dec['status_dec'] == "2") {
                        echo "<span class='badge bg-success'>Approved</span>";
                    } elseif ($row_dec['status_dec'] != "" && $row_dec['status_dec'] == "3") {
                        echo "<span class='badge bg-danger'>Rejected</span>";
                    } else {
                        echo "<span class='badge bg-warning'>No Claim</span>";
                    }
                ?>
            </td>
        </tr>
    </tbody>
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