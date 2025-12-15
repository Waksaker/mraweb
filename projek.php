<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Project</h5>
        <div align="right">
            <a href="applyprojek1.php" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Apply Project</a>
        </div>
        <div class="row">
			<div class="col-md-12">
				<div class="form-group row">
					<h1 class="col-sm-4 col-form-label">Pleace Chooce</h1>
					<div class="col-sm-6">
						<select class="form-control mb-1" name="syarikat" id="syarikat" onchange="syarikat()">
							<option value="">Please Choose</option>
							<option value="MRA GLOBAL SDN BHD">MRA GLOBAL SDN BHD</option>
							<option value="LETILICA SDN BHD">LETILICA SDN BHD</option>
							<option value="MIM DEFENSE SDN BHD">MIM DEFENSE SDN BHD</option>
						</select>
					</div>
				</div>
			</div>
		</div>
        <div class="text-center">
			<div id="spinner-border3" class="spinner-border text-primary" role="status" style="display:none;">
				<span class="sr-only">Loading...</span>
			</div>
        </div>

        <div id="listprojet"></div>
    </div>
</div>
<?php include("./components/footer.php"); ?> 
<script>
	function syarikat() {
		let val = document.getElementById("syarikat").value;

		$('#spinner-border3').show();
		$('#listprojet').hide();
		$('#statistik').hide();
		$.ajax({
			type: "POST",
			url: "projeklist.php",
			data: {"syarikat": val},
			success: function(data){
				$('#spinner-border3').hide();
				$("#listprojet").show().html(data).fadeIn('fast');
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