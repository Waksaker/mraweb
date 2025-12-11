<?php
include('conn.php');
if(!isset($_GET['idshow'])) exit("Not Found");
$id = base64_decode($_GET['idshow']);
$re=mysqli_query($conn, "SELECT * FROM `projekname` WHERE id = '$id'");
$row = mysqli_fetch_assoc($re);
$syarikat = $row['syarikat'];
$namepro = $row['namepro'];
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
        <div align="center">
            <h3><?php echo "$namepro";?></h3>
        </div>
        <br>
        <table >

        </table>
    </div>
</div>
<?php include("./components/footer.php"); ?>
