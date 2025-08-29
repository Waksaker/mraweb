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
    $namefile1 = $_POST['namefile1'];
    $temp_name = $_FILES['namefile']['tmp_name'];
    //$nameimage = $_FILES['nameimage']['name'];
    //$temp_name_user = $_FILES['nameimage']['tmp_name'];
    $id = $_POST['id'];
    //$status = $_POST['status'];
    $syarikat = $_POST['syarikat'];
    $portfolio = $_FILES['portfolio']['name'];
    $temp_portfolio = $_FILES['portfolio']['tmp_name'];	
    $portfolio1 = $_POST['portfolio1'];	

    if ($namefile != '' && $portfolio == '') {
        // Path fizikal untuk simpanan
        // $target_dir = "/var/www/html/image/";
        $target_dir = "./image/";
        $target_file = $target_dir . basename($namefile);

        // Pastikan move_uploaded_file berfungsi
        if (move_uploaded_file($temp_name, $target_file)) {
            $update = "UPDATE `mra_staff` SET name='$nameuser', email='$emailuser', icno='$icuser', position='$positionuser', password='$passuser', phoneno='$phoneuser', bank_name='$bankuser', acc_no='$accuser', image='$namefile', syarikat='$syarikat', portfolio='$portfolio1' WHERE id='$id'";
        } else {
            echo "Gagal memuat naik fail. Error: " . $_FILES['namefile']['error'];
        }

    } elseif ($namefile == '' && $portfolio != '') {
        $target_folio_dir = "./folio/";                                                                                                                              
	$target_folio_file = $target_folio_dir . basename($portfolio);

        // Pastikan move_uploaded_file berfungsi
        if (move_uploaded_file($temp_portfolio, $target_folio_file)) {
            $update = "UPDATE `mra_staff` SET name='$nameuser', email='$emailuser', icno='$icuser', position='$positionuser', password='$passuser', phoneno='$phoneuser', bank_name='$bankuser', acc_no='$accuser', image='$namefile1', syarikat='$syarikat', portfolio='$portfolio' WHERE id='$id'";
        } else {
            echo "Gagal memuat naik fail. Error: " . $_FILES['namefile']['error'];
        }
    } else {
        $update = "UPDATE `mra_staff` SET name='$nameuser', email='$emailuser', icno='$icuser', position='$positionuser', password='$passuser', phoneno='$phoneuser', bank_name='$bankuser', acc_no='$accuser', status='$status', syarikat='$syarikat', portfolio='$portfolio1' WHERE id='$id'";
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
