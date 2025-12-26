<?php include("./components/header.php"); ?>
    <?php include("./components/sidenav.php"); ?>
    <?php include("./components/topnav.php"); ?>
    <?php include("./components/name.php"); ?>
    <?php include("./components/tableleavesection.php"); ?>
<?php include("./components/footer.php"); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
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
      responsive: true,
      autoWidth: false,
      paging: true,
      searching: true,
      ordering: true,
      columnDefs: [
        { responsivePriority: 1, targets: 2 },  // Name
        { responsivePriority: 2, targets: 9 },  // Status
        { responsivePriority: 3, targets: -1 }, // Action
        { responsivePriority: 10001, targets: [1,3,4,5,6,7] }
      ]
    });
</script>