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
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['bukticlaim'])) {
        $name_approve = $_POST['name'];
        $bulan_apply = $_POST['bulan'];
        $tahun_apply = $_POST['tahun'];
        $statusbukticlaim = $_POST['statusbukticlaim'];
        $resitbukti = $_FILES['resitbukti']['name'];
        $temp_resitbukti = $_FILES['resitbukti']['tmp_name'];
        $resitbukti1 = $_POST['resitbukti1'];
        $icno = $_POST['icno'];
        if ($resitbukti != '') {
            $target_dir = "./resitbukticlaim/";
            $target_file = $target_dir . basename($resitbukti);
            move_uploaded_file($temp_resitbukti, $target_file);
            $sql = "
                UPDATE `mra_claims` 
                SET 
                    `status`='$statusbukticlaim',
                    `nameapprove`='$name_approve',
                    `buktiresit`='$resitbukti'
                WHERE `noic`='$icno' 
                AND YEAR(date)='$tahun_apply' 
                AND MONTH(date)='$bulan_apply'
            ";
        } else {
            $sql = "
                UPDATE `mra_claims`
                SET 
                    `status`='$statusbukticlaim',
                    `nameapprove`='$name_approve',
                    `buktiresit`='$resitbukti1'
                WHERE `noic`='$icno' 
                AND YEAR(date)='$tahun_apply' 
                AND MONTH(date)='$bulan_apply'
            ";
        }
        $result2 = mysqli_query($conn, $sql);
        if ($result2) {
            echo "
                <script>
                    Swal.fire({
                        text: 'Submit Successful',
                        icon: 'success'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'claim1.php';
                        }
                    });
                </script>
            ";
        } else {
            echo "
                <script>
                    Swal.fire({
                        text: 'Submit Failed',
                        icon: 'error'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'claim1.php';
                        }
                    });
                </script>
            ";
        }
    }
}
?>