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
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logos/mim.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-title" content="MIM">
  
  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/styles.min.css">
  <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
  <style>
    .center-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh; /* Ambil penuh tinggi viewport */
}

.card {
  width: 900px; /* Ubah ikut saiz yang anda mahu */
  border: 3px solid #000;
}

  input.form-control, select.form-control {
    width: 100%; /* Gunakan penuh ruang */
    border: 2px solid black;
  }

  /* Optional: Tambah spacing jika sempit */
  .col-sm-4 {
    padding-right: 10px;
    padding-left: 10px;
  }
</style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-12">
            <div class="center-wrapper">
                <div class="card">
                <div class="card-body" align="middle">
                    <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                    <div class="text-center mb-3">
                      <img src="assets/images/logos/mra.png" width="120" style="margin: 0 10px;" alt="Logo 1">
                      <img src="assets/images/logos/letilica.png" width="80" style="margin: 0 10px;" alt="Logo 2">
                      <img src="assets/images/logos/mim.png" width="80" style="margin: 0 10px;" alt="Logo 3">
                    </div>
                    <h3><b>WANGSA MAJU (HQ)</b></h3>
                    </a>
                    <form name="pintu" action="pintuaction.php" method="post">
                        <button type="submit" onclick="" class="btn btn-primary">BUKA</button>
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
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sweetalert2.min.js"></script>
</body>
</html>