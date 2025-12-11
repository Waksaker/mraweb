<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mra Global</title>
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <script src="assets/js/sweetalert2.min.js"></script>
</head>
<body>
    
</body>
</html>
<?php
include('conn.php');
date_default_timezone_set('Asia/Kuala_Lumpur');
if (isset($_POST['apply'])) {
    if ($_POST['apply'] == 'apply1') {
        $namecreate = $_POST['namecreate'];
        $ic = $_POST['ic'];
        $date = $_POST['date'];
        $namepro = $_POST['namepro'];
        $func=$_POST['apply'];
        $syarikat=$_POST['syarikat'];
        $re=mysqli_query($conn, "INSERT INTO `projekname`(`name`, `ic`, `syarikat`, `namepro`, `datecreate`) VALUES ('$namecreate','$ic','$syarikat','$$namepro','$date')");
        if ($re) {
            header("Location: applyprojek2.php?date=" . urlencode($date) . "&ic=" . urlencode($ic) . "&namepro=" . urlencode($namepro)."&func=".urlencode($func)."&syarikat=" . urlencode($syarikat));
            exit();
        }
    } elseif ($_POST['apply'] == 'apply2') {
        $namecreate = $_POST['namecreate'];
        $namepro = $_POST['namepro'];
        $date1 = $_POST['date1'];
        $ic1 = $_POST['ic1'];
        $func = $_POST['apply'];
        $syarikat = $_POST['syarikat'];
        $lponum = $_POST['lponum'];
        $datestart = $_POST['datestart'];
        $dateend = $_POST['dateend'];
        $repair = $_POST['repair'];
        $payment = $_POST['payment'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $note = $_POST['note'];
        $invoicename = $_POST['invoicename'];
        $invoice = $_FILES['invoice']['name'];
        $invoice_temp = $_FILES['invoice']['tmp_name'];

        // kira jumlah hari
        $today = new DateTime();         // Tarikh hari ini
        $end = new DateTime($dateend);   // Tarikh akhir
        $diff = $today->diff($end);      
        $total_days = $diff->days;       // ✔ simpan jumlah hari dalam variable

        $target_dir = "./invoice/";
        $target_file = $target_dir . basename($invoice);
        if (move_uploaded_file($invoice_temp, $target_file)) {
            $sql = "INSERT INTO `projek`
            (`namecreate`, `ic`, `datecreate`, `nameprojek`, `syarikat`, `lponum`, `stardate`, `duedate`, `pembaikan`, `payment`, `price`, `invoice`, `invoicedoc`, `status`, `bildate`, `catatan`) 
            VALUES 
            ('$namecreate','$ic1','$date1','$namepro','$syarikat','$lponum','$datestart','$dateend','$repair','$payment','$price','$invoicename','$invoice','$status','$total_days','$note')";
            $re = mysqli_query($conn, $sql);
            if ($re) {
                // echo "$date1, $ic1, $namepro, $func, $syarikat";
                // header("Location: applyprojek2.php?date=" . urlencode($date1) . "&ic=" . urlencode($ic1) . "&namepro=" . urlencode($namepro)."&func=".urlencode($func)."&syarikat=" . urlencode($syarikat));
                // exit();
                echo "
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Upload document success.'
                        }).then(() => {
                            window.location.href = 'applyprojek2.php?date=" . urlencode($date1) . "&ic=" . urlencode($ic1) . "&namepro=" . urlencode($namepro) . "&func=" . urlencode('apply2') . "&syarikat=" . urlencode($syarikat) . "';
                        });
                    </script>
                ";

            }
        } else {
            echo "Failed upload invoice";
        }
    } elseif ($_POST['apply'] == 'apply3') {
        $date = $_POST['date'];
        $ic = $_POST['ic'];
        $namepro = $_POST['namepro'];
        $namecreate = $_POST['namecreate'];
        $document = $_FILES['document']['name'];
        $document_temp = $_FILES['document']['tmp_name'];

        $target_dir = "./document/";
        $target_file = $target_dir . basename($document);
        if (move_uploaded_file($document_temp, $target_file)) {
            $res = mysqli_query($conn, "INSERT INTO `document`(`namcretae`, `ic`, `datecreate`, `namprojek`, `document`) VALUES ('$namecreate','$ic','$date','$namepro','$document')");
            if ($res) {
                echo "
                    <script>
                        Swal.fire(
                            'Upload document success.'
                        ).then(() => {
                            window.location.href = 'applyprojek3.php?date=" . urlencode($date) . "&ic=" . urlencode($ic) . "&namepro=" . urlencode($namepro) . "&func=" . urlencode('apply2') . "';
                        });
                    </script>
                ";
            } else {

            }
        } else {
            echo "Failed upload document";
        }
    }
} elseif (isset($_GET['apply'])) {
    if (isset($_GET['apply']) == 'delete_doc') {
        $document = base64_decode($_GET['document']);
        $ic = base64_decode($_GET['ic']);
        $namepro = base64_decode($_GET['namepro']);
        $date = base64_decode($_GET['date']);
        $file = "document/$document";
        if (file_exists($file)) {
            if (unlink($file)) {
                mysqli_query($conn, "DELETE FROM `document` WHERE `document`='$document' AND `namprojek`='$namepro'");
                header("Location: applyprojek3.php?date=" . urlencode($date) . "&ic=" . urlencode($ic) . "&namepro=" . urlencode($namepro) . "&func=" . urlencode('apply2') . "&lponum=" . urlencode($lponum));
                exit();
            }
        } else {
            echo "file tidak dijumpai";
        }
    }
}
?>