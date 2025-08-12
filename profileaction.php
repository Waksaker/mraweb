<?php
include("conn.php");

if (isset($_POST['submit'])) {
    $nameuser = $_POST['name'];
    $emailuser = $_POST['email'];
    $icuser = $_POST['ic'];
    $positionuser = $_POST['position'];
    $phoneuser = $_POST['number'];
    $bankuser = $_POST['bankname'];
    $accuser   = $_POST['account'];
    $passuser = $_POST['password'];
    $namefile = $_FILES['namefile']['name'];
    $temp_name = $_FILES['namefile']['tmp_name'];
    $nameimage = $_FILES['nameimage']['name'];
    $temp_name_user = $_FILES['nameimage']['tmp_name'];
    $id = $_POST['id'];
    $status = $_POST['status'];
    $syarikat = $_POST['syarikat'];

    if ($namefile != '') {
        // Path fizikal untuk simpanan
        // $target_dir = "/var/www/html/image/";
        $target_dir = "./image/";
        $target_file = $target_dir . basename($namefile);

        // Pastikan move_uploaded_file berfungsi
        if (move_uploaded_file($temp_name, $target_file)) {
            $update = "UPDATE `mra_staff` SET name='$nameuser', email='$emailuser', icno='$icuser', position='$positionuser', password='$passuser', phoneno='$phoneuser', bank_name='$bankuser', acc_no='$accuser', image='$namefile', status='$status', syarikat='$syarikat' WHERE id='$id'";
        } else {
            echo "Gagal memuat naik fail. Error: " . $_FILES['namefile']['error'];
        }

    } elseif ($nameimage != '') {
        // $target_dir_user = "/var/www/html/image/";
        $target_dir_user = './imageuser/';
        $target_file_user = $target_dir_user . basename($nameimage);

        // Pastikan move_uploaded_file berfungsi
        if (move_uploaded_file($temp_name_user, $target_file_user)) {
            $update = "UPDATE `mra_staff` SET name='$nameuser', email='$emailuser', icno='$icuser', position='$positionuser', password='$passuser', phoneno='$phoneuser', bank_name='$bankuser', acc_no='$accuser', image='$nameimage', status='$status', syarikat='$syarikat' WHERE id='$id'";
        } else {
            echo "Gagal memuat naik fail. Error: " . $_FILES['namefile']['error'];
        }
    } else {
        $update = "UPDATE `mra_staff` SET name='$nameuser', email='$emailuser', icno='$icuser', position='$positionuser', password='$passuser', phoneno='$phoneuser', bank_name='$bankuser', acc_no='$accuser', status='$status', syarikat='$syarikat' WHERE id='$id'";
    }

    if (isset($update)) {
        $result_update = mysqli_query($conn, $update) or die(mysqli_error($conn));
        if ($result_update) {
            header("Location: dashboard.php");
            exit();
        } else {
            echo "TIDAK BERJAYA";
        }
    }
}
?>