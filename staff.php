<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<?php include("./components/staff.php") ?>
<?php include("./components/footer.php"); ?>
<script>
  let table = new DataTable('#allstaff');
</script>
<script type="text/javascript">
  function deletestaff(id) {
    var result = confirm("Adakah anda ingin memadam data ini?");

    if (result) {
      window.location.href = "delete.php?idstaff=" + id;
    }
  }
</script>
<script>
  function send(id) {
    console.log("Hantar");
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText)
          Swal.fire({
              text: 'Berjaya hantar.',
              icon: 'success',
              showCancelButton: false,
              confirmButtonColor: '#F7E836',
              confirmButtonText: 'Ok'
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location = 'staff.php';
              }
          });
        else
          Swal.fire({
              text: 'Gagal hantar.',
              icon: 'warning',
              showCancelButton: false,
              confirmButtonColor: '#F7E836',
              confirmButtonText: 'Ok'
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location = 'staff.php';
              }
          });
      }
    };
    xhttp.open("GET", "send.php?iduser=" + id, true);
    xhttp.send();
  }
</script>
