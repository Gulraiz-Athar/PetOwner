<?php
session_start();
check_session($_SESSION['material_user']);

$id = $_GET['id'];

include('assets/php/function.php');
include('services/database.php');
include 'partials/main.php'; ?> <head> <?php
    $title = "Profile";
    include 'partials/title-meta.php'; ?> <?php include 'partials/head-css.php'; ?> </head>
<body>
  <!-- Begin page -->
  <div id="wrapper"> <?php include 'partials/menu.php'; ?>
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page"> <?php include 'partials/topbar.php'; ?> <div class="content">
        <!-- Start Content-->
        <div class="container-fluid"> <?php
            $title = "Profile";
            include 'partials/page-title.php'; ?>
          <!-- end page title -->
          <div class="row">
            <div class="col-lg-4 col-xl-4">
              <form action="assets/php/update_vet_profile.php" method="post" enctype="multipart/form-data">
                <div class="card text-center">
                  <div class="card-body">
                    <img src="assets/images/<?php echo get_result($conn,$id, 'user')['image']; ?>" 
                    class="rounded-circle avatar-lg img-thumbnail" style="width:50%;height:200px;" alt="profile-image">
                    <input type="hidden" name="flag" value="update_image">
                    <h4 class="mb-0"> <?php echo $_GET['name']; ?> </h4>
                    <div class="text-start mt-3"></div>
                    <br>
                  </div>
                </div>
                <!-- end card -->
                <form>
            </div>
            <!-- end col-->
            <div class="col-lg-8 col-xl-8">
              <div class="card">
                <div class="card-body">
                  <ul class="nav nav-pills nav-fill navtab-bg">
                  </ul>
                  <div class="tab-content">
                    <!-- end about me section content -->
                    <div class="tab-pane show active" id="settings">
                      <form action="assets/php/update_vet_profile.php" method="post">
                        <h5 class="mb-4 text-uppercase">
                          <i class="mdi mdi-account-circle me-1"></i> Personal Info
                        </h5>
                        <input type="hidden" name="flag" value="update_profile">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="name" class="form-label">Name: <?php echo get_result($conn,$id, 'user')['name']; ?> </label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="email" class="form-label">Email Address : <?php echo get_result($conn,$id, 'user')['email']; ?> </label>
                            </div>
                          </div>
                        </div>
                        <!-- end row --> 
                         <?php $role =  get_result($conn,$id, 'user')['role']; 
                               if($role == "petowner"){ ?> <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="pets_number" class="form-label">Pets No: <?php echo get_result_users($conn,$id)['pets_number']; ?> </label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="pet_species" class="form-label">Pet Species : <?php echo get_result_users($conn,$id)['pet_species']; ?> </label>
                            </div>
                          </div>
                          <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="address" class="form-label">Pets Address : <?php echo get_result_users($conn,$id)['address']; ?> </label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="phone" class="form-label">Phone: <?php echo get_result($conn,$id, 'user')['phone']; ?> </label>
                            </div>
                          </div>
                          <!-- end col -->
                        </div>
                        <!-- end row --> <?php }else if($role == "veterinarian"){ ?> <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="pharmacy_name" class="form-label">Pharmacy Name: <?php echo get_result_users($conn,$id)['pharmacy_name']; ?> </label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="pharmacy_code" class="form-label">Pharmacy Code : <?php echo get_result_users($conn,$id)['pharmacy_code']; ?> </label>
                            </div>
                          </div>
                          <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="pharmacy_address" class="form-label">Pharmacy Address: <?php echo get_result_users($conn,$id)['pharmacy_address']; ?> </label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="phone" class="form-label">Phone: <?php echo get_result($conn,$id, 'user')['phone']; ?> </label>
                            </div>
                          </div>
                          <!-- end col -->
                        </div>
                        <!-- end row --> <?php }else{} ?>
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
  </div>
  <!-- END wrapper --> <?php include 'partials/right-sidebar.php'; ?> <?php include 'partials/footer-scripts.php'; ?>
</body>
</html>