<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                Aplikasi Tamu
              </div>
              <h4>Selamat Datang!</h4>
              <?php 
    if(isset($_GET['pesan'])){
      if($_GET['pesan'] == "gagal"){
        echo "<div class='alert alert-danger'>Login gagal! Username dan password salah.</div>";
      }else if($_GET['pesan'] == "logout"){
        echo "<div class='alert alert-danger'>Anda telah logout.</div>";
      }else if($_GET['pesan'] == "belumlogin"){
        echo "<div class='alert alert-success'>Silahkan login dulu.</div>";
      }
    }
    ?>
              <h6 class="font-weight-light">Silakan login untuk melanjutkan</h6>
              <form method="post" action="<?php echo base_url().'welcome/login' ?>">
                    <div class="form-group">
                        <input type="text" name="username" placeholder="username" class="form-control">
                        <?php echo form_error('username'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="password" class="form-control">
                        <?php echo form_error('password'); ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn btn-primary">
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
