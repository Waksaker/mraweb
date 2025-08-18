<?php
include 'conn.php';
ini_set("error_log", "php-error.log");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date("Y-m-d");

if (isset($_GET['iduser'])) {
    $id = $_GET['iduser'];
    $sql = "SELECT * FROM `mra_staff` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $userid = $row['id_user'];
    $pass = $row['password'];
    $emailuser = $row['email'];

    echo "userid = $userid, pass = $pass, emailuser = $emailuser";

    // Email content
    $subject = "PASSWORD SYSTEM";
    $body = "
        <table style='border-collapse: collapse;'>
            <thead>
                <tr>
                    <th style='border: 1px solid #000; padding: 8px;'>ID</th>
                    <th style='border: 1px solid #000; padding: 8px;'>PASSWORD</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style='border: 1px solid #000; padding: 8px;'>$userid</td>
                    <td style='border: 1px solid #000; padding: 8px;'>$pass</td>
                </tr>
            </tbody>
        </table>
    ";


    $scriptUrl = "https://script.google.com/macros/s/AKfycbx3vNzkU170boiNFepArV3kfiR9j8jVM7mz2GuD40EPy6DG7BVaINhkD7izIbFIkcz7/exec";

    $data = array(
        "recipient" => $emailuser,
        "subject"   => $subject,
        "body"      => $body,
        "isHTML"    => 'true'
    );

    $ch = curl_init($scriptUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_exec($ch);
    curl_close($ch);
}
?>
