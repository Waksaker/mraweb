<?php include("components/header.php"); ?>
    <?php include("components/sidenav.php"); ?>
    <?php include("components/topnav.php"); ?>
    <?php include("components/name.php"); ?>
    <?php include("components/tableleavesection.php"); ?>
<?php include("components/footer.php"); ?> 

<script>
    new DataTable('#example', {
        scrollX: true,
        // layout: {
        //     topStart: {
        //         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        //     }
        // }
    });
</script>