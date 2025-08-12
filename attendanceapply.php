<?php include("components/header.php"); ?>
<?php include("components/sidenav.php"); ?>
<?php include("components/topnav.php"); ?>
<?php include("components/name.php"); ?>
<?php include("components/attendanceapplysection.php"); ?>
<?php include("components/footer.php"); ?>
<script>
  function validateattendance()  
  {
    form = document.attendance;
    present = form.present.value;

    if (present === 'outstation') {
      if (form.name_staff.value == null || form.name_staff.value=="")
      {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in Name Staff!',
          confirmButtonColor: '#1B95CF'
        })
        form.name_staff.focus();
        return;
      } else if (form.datestart.value == null || form.datestart.value=="") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in Date!',
          confirmButtonColor: '#1B95CF'
        })
        form.datestart.focus();
        return;
      } else if (form.amount.value == null || form.amount.value=="") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in Amount!',
          confirmButtonColor: '#1B95CF'
        })
        form.amount.focus();
        return;
      } else if (form.purpose_outstation.value == null || form.purpose_outstation.value=="") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in Purpose!',
          confirmButtonColor: '#1B95CF'
        })
        form.purpose_outstation.focus();
        return;
      } else if (form.details_outstation.value == null || form.details_outstation.value=="") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in Details!',
          confirmButtonColor: '#1B95CF'
        })
        form.details_outstation.focus();
        return;
      } else {
        swal.fire({
        text: "Please make sure everything is correct!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#1B95CF',
        cancelButtonColor: '#BF000E',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true,
        }).then((result) => {
          if (result.isConfirmed) {
          form.submit();
          }
        })
      }
    } else if (present === 'wfh') {
      if (form.name_staff.value == null || form.name_staff.value=="")
      {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in Name Staff!',
          confirmButtonColor: '#1B95CF'
        })
        form.name_staff.focus();
        return;
      } else if (form.purpose_wfh.value == null || form.purpose_wfh.value=="") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in Purpose!',
          confirmButtonColor: '#1B95CF'
        })
        form.purpose_wfh.focus();
        return;
      } else if (form.details_wfh.value == null || form.details_wfh.value=="") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in Details!',
          confirmButtonColor: '#1B95CF'
        })
        form.details_wfh.focus();
        return;
      } else if (form.datesign.value == null || form.datesign.value=="") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in Date!',
          confirmButtonColor: '#1B95CF'
        })
        form.datesign.focus();
        return;
      } else {
        swal.fire({
        text: "Please make sure everything is correct!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#1B95CF',
        cancelButtonColor: '#BF000E',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true,
        }).then((result) => {
          if (result.isConfirmed) {
          form.submit();
          }
        })
      }
    } else if (present === 'office') {
    	if (form.name_staff.value == null || form.name_staff.value=="")
      {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in Name Staff!',
          confirmButtonColor: '#1B95CF'
        })
        form.name_staff.focus();
        return;
      } else if (form.inout.value == null || form.inout.value=="") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in Purpose!',
          confirmButtonColor: '#1B95CF'
        })
        form.inout.focus();
        return;
      } else if (form.timeoffice.value == null || form.timeoffice.value=="") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in Details!',
          confirmButtonColor: '#1B95CF'
        })
        form.timeoffice.focus();
        return;
      } else if (form.dateoffice.value == null || form.dateoffice.value=="") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in Date!',
          confirmButtonColor: '#1B95CF'
        })
        form.dateoffice.focus();
        return;
      } else {
        swal.fire({
        text: "Please make sure everything is correct!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#1B95CF',
        cancelButtonColor: '#BF000E',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true,
        }).then((result) => {
          if (result.isConfirmed) {
          form.submit();
          }
        })
      }
    }
  }
</script>
<script>
function toggleDaysInput() {
    var selectBox = document.getElementById("present");

    // outstation
    var outstation1 = document.getElementById("outstation1");
    var outstation2 = document.getElementById("outstation2");

    // wfh
    var datewfh = document.getElementById("datewfh");
    var wfh2 = document.getElementById("wfh2");
    
	// office
	var office = document.getElementById("office");
	var inout = document.getElementById("inoutoffice");

    if (selectBox.value === "outstation") {
      // outstation
      outstation1.style.display = "flex";
      outstation2.style.display = "flex";

      // wfh
      datewfh.style.display = "none";
      wfh2.style.display = "none";
      
	// office
	office.style.display = "none";
	inout.style.display = "none";
    } else if (selectBox.value === "wfh") {
      // outstation
      outstation1.style.display = "none";
      outstation2.style.display = "none";

      // wfh
      datewfh.style.display = "flex";
      wfh2.style.display = "flex";
      
      //       office
	office.style.display = "none";
	inout.style.display = "none";

    } else if (selectBox.value === "office") {
    	// outstation
          outstation1.style.display = "none";
          outstation2.style.display = "none";
    
          // wfh
          datewfh.style.display = "none";
          wfh2.style.display = "none";
          
          //       office
    	office.style.display = "flex";
    	inout.style.display = "flex";
    } else {
      // outstation
      outstation1.style.display = "none";
      outstation2.style.display = "none";

      // wfh
      datewfh.style.display = "none";
      wfh2.style.display = "none";
      
    //       office
    office.style.display = "none";
    inout.style.display = "none";
    }


}
</script>