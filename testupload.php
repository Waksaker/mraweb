<?php
if (isset($_POST['submit'])) {
    $namefile = $_FILES["namefile"]["name"];
    $temp_name = $_FILES['namefile']["tmp_name"];

    if ($namefile != '') {
        // Gunakan path absolut ke folder image
        $target_dir = "/var/www/html/image/";
        $target_file = $target_dir . basename($namefile);

        // Cek apakah file berhasil di-upload
        if (move_uploaded_file($temp_name, $target_file)) {
            echo "berjaya";
        } else {
            echo "gagal";
        }
    }
}
?>