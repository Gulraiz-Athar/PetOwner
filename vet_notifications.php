<?php
session_start();
check_session($_SESSION['material_user']);

?> <head> <?php
    $title = "Pet Owners";
    include 'partials/title-meta.php'; 
    include 'partials/head-css.php'; 
    include("services/database.php");
    include("assets/php/function.php");
    include 'partials/main.php';
    ?>
</head>
<body>
  <!-- Begin page -->
  <div id="wrapper"> <?php include 'partials/menu.php'; ?>
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page"> <?php include 'partials/topbar.php'; ?> <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box">
                <div class="page-title-right">
                  <form class="d-flex align-items-center mb-3">
                </div>
                <h4 class="page-title">Notifications</h4>
              </div>
            </div>
          </div>
          <!-- end page title -->
          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body" style="text-align:center;">
                  <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                    </div>
                  </div>
                  <?php
                      $id = $_SESSION['login_users']['id']; 
                      $role = $_SESSION['login_users']['role'];
                      if($role == "veterinarian"){
                         $trans_vet = mysqli_query($conn, "SELECT * FROM `transactions` WHERE `veterinarian_id` = '$id' GROUP by `created` DESC;");
                          while($row_trans = mysqli_fetch_assoc($trans_vet)){
                             $user_id = $row_trans['user_id'];
                             $amount = $row_trans['paid_amount'];
                             ?> <a href="#"> <?php echo get_result($conn,$user_id,'user')['name']; ?> have successfuly paid the $ <?php echo intval($amount); ?> invoice. </a>
                  <br> <?php } }else if($role == "admin"){
                        $trans_vet = mysqli_query($conn, "SELECT * FROM `transactions` GROUP by `created` DESC;");
                         while($row_trans = mysqli_fetch_assoc($trans_vet)){
                          $user_id = $row_trans['user_id'];
                          $amount = $row_trans['paid_amount'];
                          ?> <a href="#" style="border: 1px solid #212136;padding: 8px;font-size: 15px;color: #092D48;background: #5EC1CE;border-radius: 7px;"> 
                          <?php echo get_result($conn,$user_id,'user')['name']; ?> have successfuly paid the $ <?php echo intval($amount); ?> invoice. </a>
                  <br> <br>
                  <br>
                  <br> <?php } }  ?>
                </div>
              </div>
              <!-- end card-->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- container -->
      </div>
      <!-- content --> <?php include 'partials/footer.php'; ?> </div>
  </div>
  <!-- END wrapper --> <?php include 'partials/right-sidebar.php'; ?> <?php include 'partials/footer-scripts.php'; ?>
</body>
</html>