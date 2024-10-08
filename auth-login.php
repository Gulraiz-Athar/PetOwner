<?php
include 'partials/main.php';
require_once('services/database.php');
?> 

<head> 
  <?php
    $title = "Log In";
    include 'partials/title-meta.php'; ?>
  <?php include 'partials/head-css.php'; ?>
</head>
<body class="authentication-bg authentication-bg-pattern">
  <div class="account-pages mt-5 mb-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card bg-pattern">
            <div class="card-body p-4">
              <div class="text-center w-75 m-auto">
                <div class="auth-brand">
                  <a href="index.php" class="logo logo-dark text-center">
                    <span class="logo-lg">
                      <img src="assets/images/mario_logo.png" alt="" height="132">
                    </span>
                  </a>
                  <a href="index.php" class="logo logo-light text-center">
                    <span class="logo-lg">
                      <img src="assets/images/mario_logo.png" alt="" height="22">
                    </span>
                  </a>
                </div>
                <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
              </div>
              <form method="POST" id="login_user">
                <div class="mb-3">
                  <label for="emailaddress" class="form-label">Email address</label>
                  <input class="form-control" type="email" id="emailaddress" placeholder="Enter your email"
                   name="email" value="">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" name="password" class="form-control" 
                    placeholder="Enter your password">
                    <div class="input-group-text" data-password="false">
                      <span class="password-eye" onclick="togglePasswordVisibility()"></span>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                  </div>
                </div>
                <div class="text-center d-grid">
                  <button class="btn btn-primary login_user" type="button"> Log In </button>
                </div>
              </form>
            </div>
            <!-- end card-body -->
          </div>
          <!-- end card -->
          <div class="row mt-3">
            <div class="col-12 text-center">
              <p>
                <a href="auth-recoverpw.php" class="text-white-50 ms-1">Forgot your password?</a>
              </p>
              <p class="text-white-50">Don't have an account? <a href="auth-register.php" class="text-white ms-1">
                  <b>Sign Up</b>
                </a>
              </p>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </div>
  <!-- end page -->
  <footer class="footer footer-alt"> 2015 - <script>
      document.write(new Date().getFullYear())
    </script> &copy; Televet <a href="" class="text-white-50"> &nbsp; Spiderhunts</a>
  </footer>
  <script src="assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- Sweet alert init js-->
  <script src="assets/js/pages/authentication.init.js"></script>
</body>
</html>