<?php include 'partials/main.php'; 

include('services/database.php');

$token = $_GET['token'];
$user_data = mysqli_query($conn, "SELECT * FROM `forget_password` WHERE `token` = '$token'");
$row_user_data = mysqli_fetch_assoc($user_data);
$user_id = $row_user_data['user_id'];


?> <head> <?php
    $title = "Forgot Password";
    include 'partials/title-meta.php'; ?> <?php include 'partials/head-css.php'; ?> </head>
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
              </div>
              <form action="#" method="post">
                <div class="mb-3">
                  <label for="password" class="form-label">New Password</label>
                  <input class="form-control" type="password" id="new_password" name="new_password" required="" placeholder="Enter new password">
                </div>
                <div class="mb-3">
                  <label for="confirm_new_password" class="form-label">Confirm New Password</label>
                  <input class="form-control" type="password" id="confirm_new_password" name="confirm_new_password" required="" placeholder="Enter password again">
                  <input type="hidden" name="user_id" id="user_id" value="
														<?php echo $user_id; ?>">
                </div>
                <div class="text-center d-grid">
                  <button class="btn btn-primary update_pass" name="update_pass" type="button"> Reset Password </button>
                </div>
              </form>
            </div>
            <!-- end card-body -->
          </div>
          <!-- end card -->
          <div class="row mt-3">
            <div class="col-12 text-center">
              <p class="text-white-50">Back to <a href="auth-login.php" class="text-white ms-1">
                  <b>Log in</b>
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
    </script> &copy; Televet <a href="" class="text-white-50">Spiderhunts</a>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Authentication js -->
  <script src="assets/js/pages/authentication.init.js"></script>
</body>
</html>