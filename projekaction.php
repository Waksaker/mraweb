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
if (isset($_POST['apply']) && $_POST['apply'] == 'apply1') {

    $rendom = $_POST['rendom'];
    $namecreate = $_POST['namecreate'];
    $ic = $_POST['ic'];
    $date = $_POST['date'];
    $syarikat = $_POST['syarikat'];
    $namepro = $_POST['namepro'];

    $res = mysqli_query($conn,
            "INSERT INTO projekname (rendom, name, ic, syarikat, namepro, datecreate)
         VALUES ('$rendom','$namecreate','$ic','$syarikat','$namepro','$date')"
    );

    if($res){
        echo "
                <script>
                    Swal.fire(
                        'Step 1 success.'
                    ).then(() => {
                        window.location.href = 'applyprojek2.php?rendom=" . base64_encode($rendom) . "&ic=" . base64_encode($ic) . "&namepro=" . base64_encode($namepro) . "&func=" . base64_encode('apply2') . "';
                    });
                </script>
            ";
    } else {
        echo "Error database insert";
    }

} elseif (isset($_POST['apply']) && $_POST['apply'] == 'apply2') {
    $rendom = $_POST['rendom'];
    $namecreate = $_POST['namecreate'];
    $ic = $_POST['ic1'];
    $syarikat = $_POST['syarikat'];
    $datestart = $_POST['datestart'];
    $dateend = $_POST['dateend'];
    $lponum  = $_POST['lponum'];
    $repair = $_POST['repair'];
    $payment = $_POST['payment'];
    $price = $_POST['price'];
    $status  = $_POST['status'];
    $note = $_POST['note'];
    $invoicename = $_POST['invoicename'];
    $invoice = $_FILES['invoice']['name'];
    $invoice_temp = $_FILES['invoice']['tmp_name'];

    // kira jumlah hari
    $today = new DateTime();         // Tarikh hari ini
    $end = new DateTime($dateend);   // Tarikh akhir
    $diff = $today->diff($end);
    $total_days = $diff->days;

    $target_dir = "./invoice/";
    $target_file = $target_dir . basename($invoice);
    if (move_uploaded_file($invoice_temp, $target_file)) {
        $insert = "
        INSERT INTO `projek`
        (`rendom`, `namecreate`, `ic`, `syarikat`, `lponum`, `stardate`, `duedate`, `pembaikan`, `payment`, `price`, `invoice`, `invoicedoc`, `status`, `bildate`, `catatan`) 
        VALUES 
        ('$rendom','$namecreate','$ic','$syarikat','$lponum','$datestart','$dateend','$repair','$payment','$price','$invoicename','$invoice','$status','$total_days','$note')
        ";
        $ins = mysqli_query($conn, $insert);
        if ($ins) {
            echo "
                <script>
                    Swal.fire(
                        'Step 2 success.'
                    ).then(() => {
                        window.location.href = 'applyprojek2.php?rendom=" . base64_encode($rendom) . "&ic=" . base64_encode($ic) ."';
                    });
                </script>
            ";
        }
    }
} elseif (isset($_POST['apply']) && $_POST['apply'] == 'apply3') {
    $rendom = $_POST['rendom'];
    $ic = $_POST['ic'];
    $namecreate = $_POST['namecreate'];
    $lponum  = $_POST['lponum'];
    $document = $_FILES['document']['name'];
    $document_temp = $_FILES['document']['tmp_name'];
    $target_dir = "./document/";
    $target_file = $target_dir . basename($document);

    $res = mysqli_query($conn, "SELECT * FROM `projek` WHERE `lponum` = '$lponum'");
    $row = mysqli_fetch_assoc($res);
    $pembaikan = $row['pembaikan'];

    if (move_uploaded_file($document_temp, $target_file)) {
        $insert = "INSERT INTO `document`(`rendom`, `pembaikan`, `namcretae`, `ic`, `lponum`, `document`) VALUES ('$rendom','$pembaikan','$namecreate','$ic','$lponum','$document')";
        $ins = mysqli_query($conn, $insert);
        if ($ins) {
            echo "
                <script>
                    Swal.fire(
                        'Step 3 success.'
                    ).then(() => {
                        window.location.href = 'applyprojek3.php?rendom=" . base64_encode($rendom) . "&ic=" . base64_encode($ic) . "';
                    });
                </script>
            ";
        }
    }
} elseif (isset($_POST['editprojek']) && $_POST['editprojek'] == 'editprojek1') {
    $rendom = $_POST['rendom'];
    $namecreate = $_POST['namecreate'];
    $ic = $_POST['ic'];
    $date = $_POST['date'];
    $syarikat = $_POST['syarikat'];
    $namepro = $_POST['namepro'];

    $update = "UPDATE `projekname` SET `name`='$namecreate',`ic`='$ic',`syarikat`='$syarikat',`namepro`='$namepro',`datecreate`='$date' WHERE `rendom`='$rendom'";
    $res = mysqli_query($conn, $update);
    if ($res) {
        echo "
            <script>
                Swal.fire('Step 1 success.').then(() => {
                    window.location.href = 'editprojek2.php?rendom=" . base64_encode($rendom) . "';
                });
            </script>
        ";

    } else {
        echo "Error database update";
    }
} elseif (isset($_POST['editprojek']) && $_POST['editprojek'] == 'editprojek2') {
    $rendom = $_POST['rendom'];
    $namecreate = $_POST['namecreate'];
    $ic = $_POST['ic1'];
    $syarikat = $_POST['syarikat'];
    $datestart = $_POST['datestart'];
    $dateend = $_POST['dateend'];
    $lponum  = $_POST['lponum'];
    $repair = $_POST['repair'];
    $payment = $_POST['payment'];
    $price = $_POST['price'];
    $status  = $_POST['status'];
    $note = $_POST['note'];
    $invoicename = $_POST['invoicename'];
    $invoice = $_FILES['invoice']['name'];
    $invoice_temp = $_FILES['invoice']['tmp_name'];

    // kira jumlah hari
    $today = new DateTime();         // Tarikh hari ini
    $end = new DateTime($dateend);   // Tarikh akhir
    $diff = $today->diff($end);
    $total_days = $diff->days;

    $target_dir = "./invoice/";
    $target_file = $target_dir . basename($invoice);
    if (move_uploaded_file($invoice_temp, $target_file)) {
        $insert = "
        INSERT INTO `projek`
        (`rendom`, `namecreate`, `ic`, `syarikat`, `lponum`, `stardate`, `duedate`, `pembaikan`, `payment`, `price`, `invoice`, `invoicedoc`, `status`, `bildate`, `catatan`) 
        VALUES 
        ('$rendom','$namecreate','$ic','$syarikat','$lponum','$datestart','$dateend','$repair','$payment','$price','$invoicename','$invoice','$status','$total_days','$note')
        ";
        $ins = mysqli_query($conn, $insert);
        if ($ins) {
            echo "
                <script>
                    Swal.fire(
                        'Edit step 2 success.'
                    ).then(() => {
                        window.location.href = 'editprojek2.php?rendom=" . base64_encode($rendom) . "';
                    });
                </script>
            ";
        }
    }
} elseif (isset($_POST['editprojek']) && $_POST['editprojek'] == 'kemaskiniprojek2') {
    $rendom = $_POST['rendom'];
    $namecreate = $_POST['namecreate'];
    $ic = $_POST['ic1'];
    $syarikat = $_POST['syarikat'];
    $datestart = $_POST['datestart'];
    $dateend = $_POST['dateend'];
    $lponum  = $_POST['lponum'];
    $repair = $_POST['repair'];
    $payment = $_POST['payment'];
    $price = $_POST['price'];
    $status  = $_POST['status'];
    $note = $_POST['note'];
    $invoicename = $_POST['invoicename'];
    $invoice1 = $_POST['invoice1'];
    $invoice = $_FILES['invoice']['name'];
    $invoice_temp = $_FILES['invoice']['tmp_name'];
    $id = $_POST['id'];

    // kira jumlah hari
    $today = new DateTime();         // Tarikh hari ini
    $end = new DateTime($dateend);   // Tarikh akhir
    $diff = $today->diff($end);
    $total_days = $diff->days;

//    delete invoice dan masuk invoice yang baru
    if ($invoice != '') {
        $file = "invoice/$invoice1";
        if (file_exists($file)) {
            if (unlink($file)) {
                $target_dir = "./invoice/";
                $target_file = $target_dir . basename($invoice);
                if (move_uploaded_file($invoice_temp, $target_file)) {
                    $sql = "UPDATE `projek` SET `rendom`='$rendom',`namecreate`='$namecreate',`ic`='$ic',`syarikat`='$syarikat',`lponum`='$lponum',`stardate`='$datestart',`duedate`='$dateend',`pembaikan`='$repair',`payment`='$payment',`price`='$price',`invoice`='$invoicename',`invoicedoc`='$invoice',`status`='$status',`bildate`='$total_days',`catatan`='$note' WHERE id = '$id'";
                    $res = mysqli_query($conn, $sql);
                    if ($res) {
                        echo "
                            <script>
                                Swal.fire(
                                    'Update step 2 success.'
                                ).then(() => {
                                    window.location.href = 'editprojek2.php?rendom=" . base64_encode($rendom) . "';
                                });
                            </script>
                        ";
                    }
                }
            } else {
                echo "Error upload file invoice";
            }
        } else {
            echo "Invoice is empty";
        }
    } else {
        $sql = "UPDATE `projek` SET `rendom`='$rendom',`namecreate`='$namecreate',`ic`='$ic',`syarikat`='$syarikat',`lponum`='$lponum',`stardate`='$datestart',`duedate`='$dateend',`pembaikan`='$repair',`payment`='$payment',`price`='$price',`invoice`='$invoicename',`invoicedoc`='$invoice1',`status`='$status',`bildate`='$total_days',`catatan`='$note' WHERE id = '$id'";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "
                <script>
                    Swal.fire(
                        'Update step 2 success.'
                    ).then(() => {
                        window.location.href = 'editprojek2.php?rendom=" . base64_encode($rendom) . "';
                    });
                </script>
            ";
        }
    }
} elseif (isset($_POST['editprojek']) && $_POST['editprojek'] == 'editprojek3') {
    $rendom = $_POST['rendom'];
    $namecreate = $_POST['namecreate'];
    $ic = $_POST['ic'];
    $lponum = $_POST['lponum'];
    $document = $_FILES['document']['name'];
    $document_temp = $_FILES['document']['tmp_name'];
    $target_dir = "./document/";
    $target_file = $target_dir . basename($document);

    $res = mysqli_query($conn, "SELECT * FROM `projek` WHERE `lponum` = '$lponum'");
    $row = mysqli_fetch_assoc($res);
    $pembaikan = $row['pembaikan'];

    if (move_uploaded_file($document_temp, $target_file)) {
        $insert = "INSERT INTO `document`(`rendom`, `pembaikan`, `namcretae`, `ic`, `lponum`, `document`) VALUES ('$rendom','$pembaikan','$namecreate','$ic','$lponum','$document')";
        $ins = mysqli_query($conn, $insert);
        if ($ins) {
            echo "
                <script>
                    Swal.fire(
                        'Step 3 success.'
                    ).then(() => {
                        window.location.href = 'editprojek3.php?rendom=" . base64_encode($rendom) . "';
                    });
                </script>
            ";
        }
    }
}

//Untuk delete step 3
if (isset($_GET['apply'])) {

    $apply = base64_decode($_GET['apply']);

    if ($apply == 'delete_doc') {

        $id = base64_decode($_GET['id']);   // decode ID betul

//        echo $id;

        $sql = mysqli_query($conn, "SELECT * FROM `document` WHERE `id`='$id'");
        $row = mysqli_fetch_assoc($sql);
        $document = $row['document'];
        $rendom = $row['rendom'];
        $ic = $row['ic'];

        $file = "document/$document";

        if (file_exists($file)) {
            if (unlink($file)) {
                mysqli_query($conn, "DELETE FROM `document` WHERE `id`='$id'");
                echo "
                    <script>
                        Swal.fire(
                            'Delete success.'
                        ).then(() => {
                            window.location.href = 'applyprojek3.php?rendom=" . base64_encode($rendom) . "&ic=" . base64_encode($ic) . "';
                        });
                    </script>
                ";
            }
        } else {
            mysqli_query($conn, "DELETE FROM `document` WHERE `id`='$id'");
            echo "
                <script>
                    Swal.fire(
                        'Delete document success.'
                    ).then(() => {
                        window.location.href = 'applyprojek3.php?rendom=" . base64_encode($rendom) . "&ic=" . base64_encode($ic) . "';
                    });
                </script>
            ";
        }

    } elseif ($apply == 'deleteeditprojek') {
        $id = base64_decode($_GET['id']);
        $sql = mysqli_query($conn, "SELECT * FROM `projek` WHERE `id`='$id'");
        $row = mysqli_fetch_assoc($sql);
        $invoicedoc = $row['invoicedoc'];
        $rendom = $row['rendom'];
        $file = "invoice/$invoicedoc";
        if (file_exists($file)) {
            if (unlink($file)) {
                mysqli_query($conn, "DELETE FROM `projek` WHERE `id`='$id'");
                echo "
                    <script>
                        Swal.fire(
                            'Delete document success.'
                        ).then(() => {
                            window.location.href = 'editprojek2.php?rendom=" . base64_encode($rendom) . "';
                        });
                    </script>
                ";
            }
        } else {
            mysqli_query($conn, "DELETE FROM `projek` WHERE `id`='$id'");
            echo "
                <script>
                    Swal.fire(
                        'Delete document success.'
                    ).then(() => {
                        window.location.href = 'editprojek2.php?rendom=" . base64_encode($rendom) . "';
                    });
                </script>
            ";
        }
    } elseif ($apply == 'deleteeditprojek3') {
        $id = base64_decode($_GET['id']);
        $sql = mysqli_query($conn, "SELECT * FROM `document` WHERE `id`='$id'");
        $row = mysqli_fetch_assoc($sql);
        $document = $row['document'];
        $rendom = $row['rendom'];
        $ic = $row['ic'];

        $file = "document/$document";

        if (file_exists($file)) {
            if (unlink($file)) {
                mysqli_query($conn, "DELETE FROM `document` WHERE `id`='$id'");
                echo "
                    <script>
                        Swal.fire(
                            'Delete success.'
                        ).then(() => {
                            window.location.href = 'editprojek3.php?rendom=" . base64_encode($rendom) . "';
                        });
                    </script>
                ";
            }
        } else {
            mysqli_query($conn, "DELETE FROM `document` WHERE `id`='$id'");
            echo "
                <script>
                    Swal.fire(
                        'Delete document success.'
                    ).then(() => {
                        window.location.href = 'editprojek3.php?rendom=" . base64_encode($rendom) . "';
                    });
                </script>
            ";
        }
    }
}
?>