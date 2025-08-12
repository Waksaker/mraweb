<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<?php include("./components/staff.php") ?>
<?php include("./components/footer.php"); ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
            scrollX: true
        });
    });
</script>