<?php include("components/header.php"); ?>
    <?php include("components/sidenav.php"); ?>
    <?php include("components/topnav.php"); ?>
    <?php include("components/name.php"); ?>
    <?php include("components/applyclaimsection.php"); ?>
<?php include("components/footer.php"); ?> 

<script>
  $(document).ready(function() {
    $('.extra-fields-customer').click(function(e) {
      e.preventDefault();
      
      var newRow = $('.customer_records:first').clone();
      newRow.appendTo('.customer_records_dynamic');
      newRow.addClass('single remove');
      newRow.find('.extra-fields-customer').remove();
      newRow.append('<a href="#" class="remove-field btn-remove-customer">Remove</a>');

      newRow.find('input').each(function() {
        var originalValue = $(this).val();
        $(this).val(originalValue); // Retain the value in the new row
      });
    });

    $(document).on('click', '.remove-field', function(e) {
      e.preventDefault();
      $(this).closest('.remove').remove();
    });
  });
</script>
</body>

</html>