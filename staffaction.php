<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wangsa Maju</title>
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <script src="assets/js/sweetalert2.min.js"></script>
</head>
<body>
</body>
</html>

<?php
session_start();
set_time_limit(0);
//error_reporting(E_NOTICE);
include('conn.php');

    // Rawat input pengguna
    $iduser = htmlspecialchars($_POST['iduser']);
    $nameuser     = htmlspecialchars($_POST['name']);
    $emailuser    = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $icuser       = htmlspecialchars($_POST['ic']);
    $positionuser = htmlspecialchars($_POST['position']);
    $phoneuser    = htmlspecialchars($_POST['number']);
    $bankuser     = htmlspecialchars($_POST['bankname']);
    $accuser      = htmlspecialchars($_POST['account']);
    $id           = htmlspecialchars($_POST['id']);
    $status       = htmlspecialchars($_POST['status']);
    $syarikat     = htmlspecialchars($_POST['syarikat']);
    $fungsi       = htmlspecialchars($_POST['fungsi']);

    // Jana password raw & hashed
    $random_pass  = rand(100000, 999999);

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
                    <td style='border: 1px solid #000; padding: 8px;'>$iduser</td>
                    <td style='border: 1px solid #000; padding: 8px;'>$random_pass</td>
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

    // Fungsi Tambah Staff
    if ($fungsi === "addstaff") {
        $stmt = $conn->prepare("INSERT INTO mra_staff 
            (id_user, name, email, icno, position, password, status, phoneno, bank_name, syarikat, acc_no) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss",$iduser, $nameuser, $emailuser, $icuser, $positionuser, $random_pass, $status, $phoneuser, $bankuser, $syarikat, $accuser);
        $result = $stmt->execute();
        $stmt->close();
        if ($result === TRUE) {
            // untuk window
            $ch = curl_init($scriptUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_exec($ch);
            curl_close($ch);
            echo "<script>
                    Swal.fire({
                        text: 'Data berjaya dihantar.',
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#F7E836',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'staff.php';
                        }
                    });
                </script>";
        }
    // Fungsi Kemaskini Staff
    } elseif ($fungsi === "kemaskinistaff") {
        $stmt2 = $conn->prepare("UPDATE mra_staff SET 
            id_user = ?, name = ?, email = ?, icno = ?, position = ?, status = ?, phoneno = ?, bank_name = ?, syarikat = ?, acc_no = ? 
            WHERE id = ?");
        $stmt2->bind_param("ssssssssssi",$iduser, $nameuser, $emailuser, $icuser, $positionuser, $status, $phoneuser, $bankuser, $syarikat, $accuser, $id);
        $result2 = $stmt2->execute();
        $stmt2->close();

        if ($result2 === TRUE) {
            echo "<script>
                    Swal.fire({
                        text: 'Data berjaya dikemaskini.',
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#F7E836',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'staff.php';
                        }
                    });
                </script>";
        }
    }
?>
