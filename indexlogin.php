<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Favicon -->
  <!-- <link rel="shortcut icon" type="image/png" href="assets/images/logos/mim.PNG" /> -->
  
  <!-- Android PWA Manifest -->
  <link rel="manifest" href="manifest.json">

  <!-- Apple Touch Icon (iPhone/iPad) -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logos/mra-180.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-title" content="MIM">
  
  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/styles.min.css">
  <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <!-- <div class="text-center mb-3">
                    <img src="assets/images/logos/mra.png" width="100" style="margin: 0 10px;" alt="Logo 1">
                    <img src="assets/images/logos/letilica.png" width="50" style="margin: 0 10px;" alt="Logo 2">
                    <img src="assets/images/logos/mim.png" width="50" style="margin: 0 10px;" alt="Logo 3">
                  </div> -->
                  <h3><b>Sign In</b></h3>
                </a>
                <form name="login" action="loginaction.php" method="post">
                  <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="mb-4">
                    <label for="katalaluan" class="form-label">Password</label>
                    <input type="password" class="form-control" id="katalaluan" name="katalaluan">
                  </div>
                  <button type="button" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" onClick="validate()">Sign In</button>
                  <a href="signup.php" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</a>
                  <!-- <a href="indexlogin.php" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Office Door</a>
                  <a href="" class="w-100 py-8 fs-4 mb-4 rounded-2 text-center d-block">Click here if you forgot your password.</a> -->
                </form>
                <!-- <div align="center">
                    <p>Copytight &copy; MRA Global Sdn Bhd 2024</p>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sweetalert2.min.js"></script>
  <script>
    function validate() 
    {
      form = document.login;
      if	(form.email.value == null || form.email.value=="")
      {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in your correct e-mail!',
          confirmButtonColor: '#1B95CF'
        })
        form.email.focus();
        return;
      }
      else if (form.katalaluan.value == null || form.katalaluan.value=="")
      {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in your correct password!',
          confirmButtonColor: '#1B95CF'
        })
        form.katalaluan.focus();
        return;
      }
      form.submit();
    }
  </script>
</body>

</html>