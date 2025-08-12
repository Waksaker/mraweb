<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/mim.PNG" />
  
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
                    <div class="text-center mb-3">
                        <img src="assets/images/logos/mra.png" width="100" style="margin: 0 10px;" alt="Logo 1">
                        <img src="assets/images/logos/letilica.png" width="50" style="margin: 0 10px;" alt="Logo 2">
                        <img src="assets/images/logos/mim.png" width="50" style="margin: 0 10px;" alt="Logo 3">
                    </div>
                  <h3><b>Sign Up</b></h3>
                </a>
                <form name="signup" action="signupaction.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="ic" class="form-label">Ic No</label>
                        <input type="text" class="form-control" id="ic" name="ic">
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" id="position" name="position">
                    </div>
                    <div class="mb-3">
                        <label for="nophone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="nophone" name="nophone">
                    </div>
                    <div class="mb-3">
                        <label for="namebank" class="form-label">Bank Name</label>
                        <select class="form-control" id="namebank" name="namebank">
                            <option value="">Please Choose</option>
                            <option value="Maybank">Maybank</option>
                            <option value="CIMB">CIMB</option>
                            <option value="Public Bank">Public Bank</option>
                            <option value="RHB Bank">RHB Bank</option>
                            <option value="Hong Leong Bank">Hong Leong Bank</option>
                            <option value="AmBank">AmBank</option>
                            <option value="Bank Islam">Bank Islam</option>
                            <option value="Bank Rakyat">Bank Rakyat</option>
                            <option value="Affin Bank">Affin Bank</option>
                            <option value="Alliance Bank">Alliance Bank</option>
                            <option value="HSBC Bank">HSBC Bank</option>
                            <option value="OCBC Bank">OCBC Bank</option>
                            <option value="Standard Chartered">Standard Chartered</option>
                            <option value="UOB Bank">UOB Bank</option>
                            <option value="Agrobank">Agrobank</option>
                            <option value="Bank Muamalat">Bank Muamalat</option>
                            <option value="BSN">Bank Simpanan Nasional (BSN)</option>
                            <option value="Kuwait Finance House">Kuwait Finance House</option>
                            <option value="Citibank">Citibank</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="acbank" class="form-label">Bank Account</label>
                        <input type="text" class="form-control" id="accbank" name="accbank">
                    </div>
                    <div class="mb-4">
                        <label for="katalaluan" class="form-label">Password</label>
                        <input type="password" class="form-control" id="katalaluan" name="katalaluan">
                    </div>
                    <div class="mb-4">
                        <label for="katalaluan" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="katalaluan1" name="katalaluan1">
                    </div>
                    <div class="mb-4">
                        <label for="syarikat" class="form-label">Company</label>
                        <select class="form-control mb-1" name="syarikat" id="syarikat">
                            <option value="">Please Choose</option>
                            <option value="MRA GLOBAL SDN BHD">MRA GLOBAL SDN BHD</option>
                            <option value="LETILICA SDN BHD">LETILICA SDN BHD</option>
                            <option value="MIM DEFENSE SDN BHD">MIM DEFENSE SDN BHD</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" onClick="validate()">Sign Up</button>
                    <a href="index.php" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</a>
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
    function validate() {
      var signup = document.signup;

      if (signup.name.value == null || signup.name.value == "") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in your correct name',
          confirmButtonColor: '#1B95CF'
        });
        signup.name.focus();
        return;
      } else if (signup.email.value == null || signup.email.value == "") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in your correct email!',
          confirmButtonColor: '#1B95CF'
        });
        signup.email.focus();
        return;
      } else if (signup.ic.value == null || signup.ic.value == "") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in your correct ic number!',
          confirmButtonColor: '#1B95CF'
        });
        signup.ic.focus();
        return;
      } else if (signup.position.value == null || signup.position.value == "") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in your correct position!',
          confirmButtonColor: '#1B95CF'
        });
        signup.position.focus();
        return;
      } else if (signup.nophone.value == null || signup.nophone.value == "") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in your correct phone number!',
          confirmButtonColor: '#1B95CF'
        });
        signup.nophone.focus();
        return;
      } else if (signup.namebank.value == null || signup.namebank.value == "") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in your correct bank name!',
          confirmButtonColor: '#1B95CF'
        });
        signup.namebank.focus();
        return;
      } else if (signup.accbank.value == null || signup.accbank.value == "") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in your correct account bank!',
          confirmButtonColor: '#1B95CF'
        });
        signup.accbank.focus();
        return;
      } else if (signup.katalaluan.value == null || signup.katalaluan.value == "") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in your correct password!',
          confirmButtonColor: '#1B95CF'
        });
        signup.katalaluan.focus();
        return;
      } else if (signup.katalaluan1.value == null || signup.katalaluan1.value == "") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in your correct confirm password!',
          confirmButtonColor: '#1B95CF'
        });
        signup.katalaluan1.focus();
        return;
      } else if (signup.syarikat.value == null || signup.syarikat.value == "") {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in your correct company!',
          confirmButtonColor: '#1B95CF'
        });
        signup.syarikat.focus();
        return;
      }

      signup.submit(); // <-- ini ganti dari form.submit()
    }
  </script>
</body>

</html>