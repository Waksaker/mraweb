<?php include("./components/header.php"); ?>
    <?php include("./components/sidenav.php"); ?>
    <?php include("./components/topnav.php"); ?>
    <?php include("./components/name.php"); ?>
    <?php include("./components/tableleavesection.php"); ?>
<?php include("./components/footer.php"); ?>
<script type="text/javascript">
  function test(leaveid) {
    var result = confirm("Adakah anda ingin memadam data ini?");

    if (result) {
      window.location.href = "delete.php?leaveid=" + leaveid;
    }
  }
</script>
<script>
    new DataTable('#leave', {
        scrollX: true,
        // layout: {
        //     topStart: {
        //         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        //     }
        // }
    });
</script>