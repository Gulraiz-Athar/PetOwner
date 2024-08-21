<?php
session_start();
  include('assets/php/function.php');
  include('services/database.php');
  include 'partials/main.php'; 
  
  $id = $_SESSION['login_users']['id'];
  check_session($_SESSION['material_user']);
  
  ?> 
<head> 
  <?php $title = "Profile";
  include 'partials/title-meta.php'; ?> <?php include 'partials/head-css.php'; ?>
 </head>
<body>
  <!-- Begin page -->
  <div id="wrapper"> <?php include 'partials/menu.php'; ?>
    <div class="content-page"> <?php include 'partials/topbar.php'; ?> 
      <div class="content">
        <!-- Start Content-->
        <div class="container-fluid"> <?php
            $title = "Profile";
            include 'partials/page-title.php'; ?>
          <!-- end page title -->
          <div class="row">
            <div class="col-lg-4 col-xl-4">
              <form action="assets/php/update_admin_profile.php" method="post" enctype="multipart/form-data">
                <div class="card text-center">
                  <div class="card-body">
                    <img src="assets/images/
											<?php echo get_result($conn, $id, 'user')['image']; ?>" class="rounded-circle avatar-lg img-thumbnail" 
                      alt="profile-image">
                    <input type="hidden" name="flag" value="update_image">
                    <h4 class="mb-0"> <?php echo $_SESSION['login_users']['name']; ?> </h4>
                    <div class="text-start mt-3">
                      <p class="text-muted mb-2 font-13">
                        <strong>Full Name :</strong>
                        <span class="ms-2"> <?php echo get_result($conn, $id, 'user')['name']; ?> </span>
                      </p>
                      <p class="text-muted mb-2 font-13">
                        <strong>Email :</strong>
                        <span class="ms-2"> <?php echo get_result($conn, $id, 'user')['email']; ?> </span>
                      </p>
                      <p class="text-muted mb-1 font-13">
                        <strong>Location :</strong>
                        <span class="ms-2">USA</span>
                      </p>
                    </div>
                    <br>
                    <input type="file" name="image">
                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2">
                      <i class="mdi mdi-content-save"></i> Save </button>
                  </div>
                </div>
                <!-- end card -->
                <form>
            </div>
            <!-- end col-->
            <div class="col-lg-8 col-xl-8">
              <div class="card">
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane show active" id="settings">
                      <form action="assets/php/update_admin_profile.php" method="post">
                        <h5 class="mb-4 text-uppercase">
                          <i class="mdi mdi-account-circle me-1"></i> Personal Info
                        </h5>
                        <input type="hidden" name="flag" value="update_profile">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="name" class="form-label">Name</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                               value="<?= get_result($conn, $id, 'user')['name']; ?>">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="useremail" class="form-label">Email Address</label>
                              <input type="email" class="form-control" id="useremail" readonly 
                              value="<?= $_SESSION['login_users']['email']; ?>">
                            </div>
                          </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" class="form-control" id="password" name="password" 
                              placeholder="Enter password" value="<?= $_SESSION['login_users']['password']; ?>">
                            </div>
                          </div>
                          <!-- end col -->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="phone" class="form-label">Phone</label>
                              <input type="text" class="form-control" id="phone" name="phone" placeholder="" 
                              value="<?= get_result($conn, $id, 'user')['phone']; ?>">
                            </div>
                          </div>
                          <!-- end col -->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="userpassword" class="form-label">Percentage</label>
                              <input type="text" class="form-control" id="percentage" name="percentage" placeholder="" 
                              value="<?= get_result($conn, $id, 'user')['percentage']; ?>">
                            </div>
                          </div>
                          <!-- end col -->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="userpassword" class="form-label">Delivery Fee</label>
                              <input type="text" class="form-control" id="delivery_fee" name="delivery_fee" placeholder="" 
                              value="<?= get_result($conn, $id, 'user')['delivery_fee']; ?>">
                            </div>
                          </div>
                          <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="text-end">
                          <button type="submit" class="btn btn-success waves-effect waves-light mt-2">
                            <i class="mdi mdi-content-save"></i> Save </button>
                        </div>
                      </form>
                    </div>
                    <!-- end settings content-->
                  </div>
                  <!-- end tab-content -->
                </div>
              </div>
              <!-- end card-->
            </div>
            <!-- end col -->
          </div>
          <!-- end row-->
        </div>
        <!-- container -->
      </div>
      <!-- content --> <?php include 'partials/footer.php'; ?> </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
  </div>
  <!-- END wrapper --> <?php include 'partials/right-sidebar.php'; ?> <?php include 'partials/footer-scripts.php'; ?>
</body>
</html>