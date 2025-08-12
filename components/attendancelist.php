<?php
set_time_limit(0);
include('C:/xampp/htdocs/mraweb/conn.php');

$year = $_POST['tahun'];
$month = $_POST['bulan'];
$noic = $_POST['ic'];
$kehadiran = $_POST['kehadiran'];

if ($kehadiran == 'office') {
    echo '
    <table id="attendance" class="display nowrap" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Ic</th>
            <th style="text-align: center;">In</th>
            <th style="text-align: center;">Out</th>
            <th style="text-align: center;">Date</th>
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>';

    $index = 1;
    $sql = "
        SELECT 
        mra_office.id as id, 
        mra_staff.name,
        mra_office.ic as ic, 
        mra_office.inoffice as inoffice, 
        mra_office.outoffice as outoffice, 
        mra_office.date_apply as date_apply, 
        mra_office.updated_at as updated_at 
        FROM mra_office
        LEFT JOIN mra_staff 
        ON mra_office.ic = mra_staff.icno
        WHERE mra_staff.icno = '$noic' 
        AND YEAR(mra_office.date_apply) = '$year' 
        AND MONTH(mra_office.date_apply) = '$month'
    ";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $datec = $row['date_apply'];
        $date = date('d/m/Y', strtotime($datec));
        $noic2 = $row['ic'];
        $name = $row['name'];
        $in = $row['inoffice'];
        $out = $row['outoffice'];

        echo '<tr>
            <td style="text-align: center;">' . ($index++) . '</td>
            <td style="text-align: center;">' . $name . '</td>
            <td style="text-align: center;">' . $noic2 . '</td>
            <td style="text-align: center;">' . $in . '</td>
            <td style="text-align: center;">' . $out . '</td>
            <td style="text-align: center;">' . $date . '</td>
            <td style="text-align: center;">';

        if ($in != '00:00:00' && $out == '00:00:00') {
            echo '<button class="btn btn-danger" onclick="delet(' . $id . ')">
                    <img src="assets/images/Trash_Can.png" alt="" style="width: 24px; height: 24px;">
                  </button>';
        } elseif ($in != '00:00:00' && $out != '00:00:00') {
            echo '<button class="btn btn-danger" onclick="delet(' . $id . ')">
                    <img src="assets/images/Trash_Can.png" alt="" style="width: 24px; height: 24px;">
                  </button>';
        }

        echo '</td></tr>';
    }

    echo '</tbody></table>';
} elseif ($kehadiran == 'outstation') {
    echo '
    <table id="attendance" class="display nowrap" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Ic</th>
            <th style="text-align: center;">Date</th>
            <th style="text-align: center;">Date Apply</th>
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>'; 

    $index = 1;
    $sql = "
        SELECT * 
        FROM mra_staff
        LEFT JOIN mra_outstation
        ON mra_staff.icno = mra_outstation.ic
                    WHERE mra_staff.icno = '$noic' 
                    AND YEAR(mra_outstation.datestart) = '$year' 
                    AND MONTH(mra_outstation.datestart) = '$month'
    ";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $datec = $row['dateapply'];
        $date = date('d/m/Y', strtotime($datec));
        $noic2 = $row['ic'];
        $name = $row['name'];
        $dates = $row['datestart'];
        $datestart = date('d/m/Y', strtotime($dates));

        echo '<tr>
            <td style="text-align: center;">' . ($index++) . '</td>
            <td style="text-align: center;">' . $name . '</td>
            <td style="text-align: center;">' . $noic2 . '</td>
            <td style="text-align: center;">' . $datestart . '</td>
            <td style="text-align: center;">' . $date . '</td>
            <td style="text-align: center;">';

            echo '<button class="btn btn-danger" onclick="deletout(' . $id . ')">
            <img src="assets/images/Trash_Can.png" alt="" style="width: 24px; height: 24px;">
          </button>';

        echo '</td></tr>';
    }

    echo '</tbody></table>';
} elseif ($kehadiran == 'wfh') {
    echo '
    <table id="attendance" class="display nowrap" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Ic</th>
            <th style="text-align: center;">Purpose</th>
            <th style="text-align: center;">Details</th>
            <th style="text-align: center;">Date Sign</th>
            <th style="text-align: center;">Date Apply</th>
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>'; 

    $index = 1;
    $sql = "
        SELECT 
            mra_wfh.id as id,
            mra_wfh.name as name,
            mra_wfh.ic as ic,
            mra_wfh.purpose as purpose,
            mra_wfh.details as details,
            mra_wfh.datesign as datesign,
            mra_wfh.dateapply as dateapply
        FROM mra_staff
        LEFT JOIN mra_wfh
        ON mra_staff.icno = mra_wfh.ic
                    WHERE mra_staff.icno = '$noic' 
                    AND YEAR(mra_wfh.datesign) = '$year' 
                    AND MONTH(mra_wfh.datesign) = '$month'
    ";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $datec = $row['dateapply'];
        $date = date('d/m/Y', strtotime($datec));
        $noic2 = $row['ic'];
        $name = $row['name'];
        $purpose = $row['purpose'];
        $details = $row['details'];
        $dates = $row['datesign'];
        $datesign = date('d/m/Y', strtotime($dates));

        echo '<tr>
            <td style="text-align: center;">' . ($index++) . '</td>
            <td style="text-align: center;">' . $name . '</td>
            <td style="text-align: center;">' . $noic2 . '</td>
            <td style="text-align: center;">' . $purpose . '</td>
            <td style="text-align: center;">' . $details . '</td>
            <td style="text-align: center;">' . $datesign . '</td>
            <td style="text-align: center;">' . $date . '</td>
            <td style="text-align: center;">';

            echo '<button class="btn btn-danger" onclick="deletwfh(' . $id . ')">
            <img src="assets/images/Trash_Can.png" alt="" style="width: 24px; height: 24px;">
          </button>';

        echo '</td></tr>';
    }

    echo '</tbody></table>';
}
?>

<script>
    new DataTable('#attendance', {
        scrollX: true
    });
</script>
