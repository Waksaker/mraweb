<?php include("./components/header.php"); ?>
    <?php include("./components/sidenav.php"); ?>
    <?php include("./components/topnav.php"); ?>
    <?php include("./components/name.php"); ?>
    <?php include("./components/claimsection1.php"); ?>
<?php include("./components/footer.php"); ?> 

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
        scrollX: true,
        // layout: {
        //     topStart: {
        //         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        //     }
        // }
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