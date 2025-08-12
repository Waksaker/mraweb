<?php
include 'conn.php';
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date("Y-m-d");

$sql = "
    SELECT
        staff.name AS name,
        staff.phoneno AS phoneno,
        office.inoffice AS in_time,
        office.outoffice AS out_time,
        office.date_apply AS date_apply
    FROM mra_office AS office
    LEFT JOIN mra_staff AS staff
        ON staff.icno = office.ic
    WHERE office.date_apply = '$date'
";
$result = $conn->query($sql);

$sql1 = "SELECT * FROM `mra_outstation` WHERE datestart = '$date'";
$result1 = $conn->query($sql1);

$sql2 = "SELECT * FROM `mra_wfh` WHERE datesign = '$date'";
$result2 = $conn->query($sql2);

// Mulakan format HTML untuk email
$emailBody = "
    <html>
    <head>
        <style>
            table { border-collapse: collapse; width: 40%; }
            th, td { border: 1px solid black; padding: 8px; text-align: center; }
            th { background-color: #f2f2f2; }
        </style>
    </head>
    <body>
        <h2>138 Team Daily Attendance Report</h2>
        <br>
        <h4>OFFICE</h4>
        <table>
            <tr>
                <th>NAME</th>
                <th>DATE APPLY</th>
                <th>IN OFFICE</th>
                <th>OUT OFFICE</th>
            </tr>
";

// Jika ada data, papar rekod dari database
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $in_office = $row['in_time'];
        $out_office = $row['out_time'];
        $dateapply = $row['date_apply'];
        
        $emailBody .= "
            <tr>
                <td>$name</td>
                <td>$dateapply</td>
                <td>$in_office</td>
                <td>$out_office</td>
            </tr>
        ";
    }
} else {
    // Jika tiada rekod, papar satu baris "No Record"
    $emailBody .= "
        <tr>
            <td colspan='4'>No Record</td>
        </tr>
    ";
}

$emailBody .= "
        </table>
        <br>
        <h4>OUTSTATION</h4>
        <table>
            <tr>
                <th>NAME</th>
                <th>DATE APPLY</th>
                <th>DATE OUTSTATION</th>
                <th>PURPOSE</th>
                <th>DETAILS</th>
            </tr>
";

// Jika ada data, papar rekod dari database
if ($result1->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {
        $name1 = $row1['name'];
        $date_apply = $row['dateapply'];
        $datestart = $row['datestart'];
        $purpose1 = $row['purpose'];
        $details1 = $row['details'];
        
        $emailBody .= "
            <tr>
                <td>$name1</td>
                <td>$date_apply</td>
                <td>$datestart</td>
                <td>$purpose1</td>
                <td>$details1</td>
            </tr>
        ";
    }
} else {
    // Jika tiada rekod, papar satu baris "No Record"
    $emailBody .= "
        <tr>
            <td colspan='5'>No Record</td>
        </tr>
    ";
}

$emailBody .= "
        </table>
        <br>
        <h4>WORK FROM HOME</h4>
        <table>
            <tr>
                <th>NAME</th>
                <th>DATE APPLY</th>
                <th>DATE WORK FROM HOME</th>
                <th>PURPOSE</th>
                <th>DETAILS</th>
            </tr>
";

if ($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) {
        $name2 = $row2['name'];
        $dateapply2 = $row2['dateapply'];
        $datesign2 = $row2['datesign'];
        $purpose2 = $row2['purpose'];
        $details2 = $row2['details'];
        
        $emailBody .= "
            <tr>
                <td>$name2</td>
                <td>$dateapply2</td>
                <td>$datesign2</td>
                <td>$purpose2</td>
                <td>$details2</td>
            </tr>
        ";
    }
} else {
    // Jika tiada rekod, papar satu baris "No Record"
    $emailBody .= "
        <tr>
            <td colspan='5'>No Record</td>
        </tr>
    ";
}

$emailBody .= "
        </table>
    </body>
    </html>
";

// Hantar email melalui Google Apps Script
$recipient = "farishtukiman@gmail.com";
$subject = "138 Team Daily Attendance Report - $date";
$scriptUrl = "https://script.google.com/macros/s/AKfycbx3vNzkU170boiNFepArV3kfiR9j8jVM7mz2GuD40EPy6DG7BVaINhkD7izIbFIkcz7/exec";

$data = array(
   "recipient" => $recipient,
   "subject" => $subject,
   "body" => $emailBody,
   "isHTML" => 'true'
);

$ch = curl_init($scriptUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$result = curl_exec($ch);

echo "Email sent successfully!\n";
echo "$result\n";
?>