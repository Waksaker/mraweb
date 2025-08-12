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

<script>
  function validateclaim() 
  {
    form = document.claim;
    // if	(form.date.value == null || form.date.value=="")
    // {
    //   Swal.fire({
    //     icon: 'warning',
    //     text: 'Please fill in Date!',
    //     confirmButtonColor: '#1B95CF'
    //   })
    //   form.dateapply.focus();
    //   return;
    // }
    if (form.purpose.value == null || form.purpose.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Purpose!',
        confirmButtonColor: '#1B95CF'
      })
      form.purpose.focus();
      return;
    }
    else if (form.amount.value == null || form.amount.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Matters!',
        confirmButtonColor: '#1B95CF'
      })
      form.amount.focus();
      return;
    }
    else if (form.noic.value == null || form.noic.value=="")
    {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Ic No!',
        confirmButtonColor: '#1B95CF'
      })
      form.noic.focus();
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
</script>
</body>

</html>