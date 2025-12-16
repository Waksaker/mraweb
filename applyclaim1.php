<?php include("components/header.php"); ?>
    <?php include("components/sidenav.php"); ?>
    <?php include("components/topnav.php"); ?>
    <?php include("components/name.php"); ?>
    <?php include("components/applyclaimsection1.php"); ?>
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
function validateapplyclaim1() {
  form1 = document.applyclaim1;
  if (form1.name.value == null || form1.name.value == "") {
    Swal.fire({
      icon: 'warning',
      text: 'Please fill in name!',
      confirmButtonColor: '#1B95CF'
    })
    form1.name.focus();
    return;
  } else if (form1.date.value == null || form1.date.value == "") {
    Swal.fire({
      icon: 'warning',
      text: 'Please fill in Date!',
      confirmButtonColor: '#1B95CF'
    })
    form1.date.focus();
    return;
  } else if (form1.purpose.value == null || form1.purpose.value == "") {
    Swal.fire({
      icon: 'warning',
      text: 'Please fill in Purpose!',
      confirmButtonColor: '#1B95CF'
    })
    form1.purpose.focus();
    return;
  } else if (form1.details.value == null || form1.details.value == "") {
    Swal.fire({
      icon: 'warning',
      text: 'Please fill in details!',
      confirmButtonColor: '#1B95CF'
    })
    form1.details.focus();
    return;
  } else if (form1.amount.value == null || form1.amount.value == "") {
    Swal.fire({
      icon: 'warning',
      text: 'Please fill in amount!',
      confirmButtonColor: '#1B95CF'
    })
    form1.amount.focus();
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
    }).then((result1) => {
      if (result1.isConfirmed) {
        form1.submit();
      }
    })
  }
}
</script>
<script>
  function validateapplyclaim2() {
    form2 = document.applyclaim2;
    if (form2.date.value == null || form2.date.value == "") {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Date!',
        confirmButtonColor: '#1B95CF'
      })
      form2.date.focus();
      return;
    } else if (form2.purpose.value == null || form2.purpose.value == "") {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in Purpose!',
        confirmButtonColor: '#1B95CF'
      })
      form2.purpose.focus();
      return;
    } else if (form2.details.value == null || form2.details.value == "") {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in details!',
        confirmButtonColor: '#1B95CF'
      })
      form2.details.focus();
      return;
    } else if (form2.amount.value == null || form2.amount.value == "") {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in amount!',
        confirmButtonColor: '#1B95CF'
      })
      form2.amount.focus();
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
      }).then((result2) => {
        if (result2.isConfirmed) {
          form2.submit();
        }
      })
    }
  }
</script>
</body>

</html>
