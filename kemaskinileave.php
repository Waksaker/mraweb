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
</body>

</html>