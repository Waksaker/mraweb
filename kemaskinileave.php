<?php include("components/header.php"); ?>
    <?php include("components/sidenav.php"); ?>
    <?php include("components/topnav.php"); ?>
    <?php include("components/name.php"); ?>
    <?php include("kemaskinileavesection.php"); ?>
<?php include("components/footer.php"); ?> 

<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
    const dateStartInput = document.getElementById('datestart');
    const dateEndInput = document.getElementById('dateend');
    const daysInput = document.getElementById('daysleave');

    function calculateDays() {
      const startDate = new Date(dateStartInput.value);
      const endDate = new Date(dateEndInput.value);

      if (isNaN(startDate) || isNaN(endDate)) {
        daysInput.value = '';
        return;
      }

      const timeDifference = endDate - startDate;
      let dayDifference = timeDifference / (1000 * 60 * 60 * 24);

      if (dayDifference >= 0) {
        // Add 1 to the dayDifference to count the same day as 1 day
        dayDifference += 1;
        daysInput.value = dayDifference;
      } else {
        daysInput.value = '';
      }
    }

    dateStartInput.addEventListener('change', calculateDays);
    dateEndInput.addEventListener('change', calculateDays);
  });
</script> -->


<!-- <script>
  function validateleave() 
  {
    form = document.leave;
    if	(form.dateapply.value == null || form.dateapply.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Date!',
        confirmButtonColor: '#1B95CF'
      })
      form.dateapply.focus();
      return;
    }
    else if (form.nameapply.value == null || form.nameapply.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Name!',
        confirmButtonColor: '#1B95CF'
      })
      form.nameapply.focus();
      return;
    }
    else if (form.noic.value == null || form.noic.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in No. IC!',
        confirmButtonColor: '#1B95CF'
      })
      form.noic.focus();
      return;
    }
    else if (form.position.value == null || form.position.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Position!',
        confirmButtonColor: '#1B95CF'
      })
      form.position.focus();
      return;
    }
    else if (form.datestart.value == null || form.datestart.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Date Start!',
        confirmButtonColor: '#1B95CF'
      })
      form.datestart.focus();
      return;
    }
    else if (form.dateend.value == null || form.dateend.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Date End!',
        confirmButtonColor: '#1B95CF'
      })
      form.dateend.focus();
      return;
    }
    else if (form.daysleave.value == null || form.daysleave.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Days!',
        confirmButtonColor: '#1B95CF'
      })
      form.days.focus();
      return;
    }
    else if (form.purpose.value == null || form.purpose.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Purpose!',
        confirmButtonColor: '#1B95CF'
      })
      form.purpose.focus();
      return;
    }
    else if (form.contactno.value == null || form.contactno.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Contact No!',
        confirmButtonColor: '#1B95CF'
      })
      form.contactno.focus();
      return;
    }
    else if (form.matters.value == null || form.matters.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Matters!',
        confirmButtonColor: '#1B95CF'
      })
      form.matters.focus();
      return;
    }
    else 
    {
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
</script> -->
</body>

</html>