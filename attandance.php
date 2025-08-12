<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<?php include("./components/attendance.php") ?>
<?php include("./components/footer.php"); ?>
<script>
	function getattandence(val,val2,val3,val4) {
		
        val = $('#tahun').val();
		val2 = $('#bulan').val();
        val3 = $('#ic').val();
		val4 = $('#kehadiran').val();

		$('#spinner-border3').show();
		$('#list').hide();
		$('#statistik').hide();
		$.ajax({
			type: "POST",
			url: "components/attendancelist.php",
			data: {"tahun": val,"bulan": val2,"ic": val3,"kehadiran": val4},
			success: function(data){
				$('#spinner-border3').hide();
				$("#listattandence").show().html(data).fadeIn('fast');
			}
		});
	}

	function outatt(no, tar) {
        var result_atten = confirm("Welcome home!");

        if (result_atten) {
        	window.location.href = "func.php?outattan=" + no + "&tarikh=" + tar;
        } 
    }

    function outoffice(no, tar) {
	    var result_del_atten = confirm("Are you sure you want to update your 'Out of Office' status?");
	    
	    if (result_del_atten) {
	        var note = prompt("Please enter the reason for going out of office:");

	        if (note !== null && note.trim() !== "") {
	            // Hantar data ke PHP melalui URL
	            window.location.href = "func.php?outatts=" + no + "&tarikhout=" + tar + "&alasan=" + note;
	        } else {
	            alert("Update cancelled. A reason is required.");
	        }
	    }
	}
    
    function delet(no) {
        var result_del_atten = confirm("Are you sure you want to delete this data?");

        if (result_del_atten) {
        	window.location.href = "func.php?delattan=" + no;
        }
    }

    function inatt(ic) {
    	var result_upattan = confirm("Welcome and good morning!");

    	if (result_upattan) {
    		window.location.href = "func.php?inattan=" + ic;
    	}
    }

    function deletout(id) {
    	var result_upattan = confirm("Are you sure you want to delete this data?");

    	if (result_upattan) {
    		console.log(id);
    		window.location.href = "func.php?deletout=" + id;
    	}
    }

    function deletwfh(id) {
    	var result_upattan = confirm("Are you sure you want to delete this data?");

    	if (result_upattan) {
    		console.log(id);
    		window.location.href = "func.php?deletwfh=" + id;
    	}
    }
	
</script>