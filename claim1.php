<?php include("./components/header.php"); ?>
    <?php include("./components/sidenav.php"); ?>
    <?php include("./components/topnav.php"); ?>
    <?php include("./components/name.php"); ?>
    <?php include("./components/claimsection1.php"); ?>
<?php include("./components/footer.php"); ?> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script>
	function getClaim(val,val2,val3) {
		
        val = $('#tahun').val();
		val2 = $('#bulan').val();
        val3 = $('#ic').val();

        // console.log(val, val2, val3);

		$('#spinner-border3').show();
		$('#list').hide();
		$('#statistik').hide();
		$.ajax({
			type: "POST",
			url: "claimsectionlist.php",
			data: {"tahun": val,"bulan": val2,"ic": val3},
			success: function(data){
				$('#spinner-border3').hide();
				$("#list").show().html(data).fadeIn('fast');
			}
		});
	}
	
</script>
<script>
	function getClaim1(val,val2,val3) {
		
    val = $('#tahun').val();
		val2 = $('#bulan').val();
    val3 = $('#ic').val();
    val4 = $('#name').val();

    console.log(val, val2, val3, val4);

		$('#spinner-border3').show();
		$('#list').hide();
		$('#statistik').hide();
		$.ajax({
			type: "POST",
			url: "claimsectionlist.php",
			data: {"tahun": val,"bulan": val2,"ic": val3,"name": val4},
			success: function(data){
				$('#spinner-border3').hide();
				$("#list").show().html(data).fadeIn('fast');
			}
		});
	}
	
</script>
<script>
	 new DataTable('#claim', {
      responsive: true,
      autoWidth: false,
      paging: true,
      searching: true,
      ordering: true,
      columnDefs: [
        { responsivePriority: 1, targets: 2 },  // Name
        { responsivePriority: 2, targets: 8 },  // Status
        { responsivePriority: 3, targets: -1 }, // Action
        { responsivePriority: 10001, targets: [1,3,4,5,6,7] }
      ]
    });
</script>
<script type="text/javascript">
  function test(claimid) {
    var result = confirm("Adakah anda ingin memadam data ini?");

    if (result) {
      window.location.href = "delete.php?claimid=" + claimid;
    }
  }
</script>